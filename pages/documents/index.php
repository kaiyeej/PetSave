<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container ">
        <!--begin::Notice-->
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b " style="border: 1.5px dashed #ff9800;background: #f9f0e3;padding:10px;" role="alert">
            <div class="alert-icon">
                <span class="svg-icon svg-icon-primary svg-icon-xl">
                <i class="menu-icon flaticon-folder-1 text-warning"></i>
                </span>
            </div>
            <div class="alert-text" style="color: #ff9800;font-weight: 500;">
                My Documents
            </div>
            <div class="card-toolbar" style="padding-top: 5px">
                <a href="#" onclick="addDoc()" data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Add New Entry" class="btn btn-success  btn-sm">
                    <i class="flaticon2-add"></i> Add
                </a>
                <a href="#"  data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Delete Selected Entry" onclick='deleteEntry()' class="btn btn-danger btn-sm">
                    <i class="flaticon-delete-1"></i> Delete
                </a>
            </div>
        </div>
        <!--end::Notice-->

        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Example-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                Manage Documents
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dt_entries" class="table table-hover mb-6">
                                <thead class="">
                                    <tr>
                                        <th><input type='checkbox' onchange="checkAll(this, 'dt_id')"></th>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Preview</th>
                                        <th>Date Added</th>
                                        <th>Date Modified</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<?php require_once 'modal_document.php'; ?>
<?php require_once 'modal_recipients.php'; ?>
<?php require_once 'modal_image.php'; ?>

<script type="text/javascript">
    function getEntries() {
        $("#dt_entries").DataTable().destroy();
        $("#dt_entries").DataTable({
            "processing": true,
            //"serverSide": true,
            "ajax": {
                "url": "controllers/sql.php?c=" + route_settings.class_name + "&q=show",
                "dataSrc": "data"
            },
            "columns": [{
                    "mRender": function(data, type, row) {
                        return "<input type='checkbox' value=" + row.doc_id + " class='dt_id' style='position: initial; opacity:1;'>";
                    }
                },
                {
                    "mRender": function(data, type, row) {
                        //return "<center><button class='btn btn-icon btn-sm btn-light-info' onclick='getDocDetails(" + row.doc_id + ")'><i class='flaticon-edit-1'></i></button></center>";

                        return '<div class="btn-group"><button type="button" class="btn btn-primary btn-sm"><i class="flaticon-settings"></i></button><button type="button" class="btn btn-primary  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>'+
                        '<div class="dropdown-menu" style="">'+
                            '<a class="dropdown-item" href="#" onclick="getDocDetails('+row.doc_id+')">View</a>'+
                            '<a class="dropdown-item" onclick="getRecipient('+row.doc_id+')" href="#">Share</a>'+
                        '</div>';
                    }
                },
                {
                    "data": "doc_name"
                },
                {
                    "data": "doc_type"
                },
                {
                    "mRender": function(data, type, row) {
                        return "<img src='assets/file/" + row.doc_file + "' style='max-height: 35px !important;' onclick=previewImage('" + row.doc_file + "')>";
                    }
                },
                {
                    "data": "date_added"
                },
                {
                    "data": "date_last_modified"
                }
            ]
        });
    }

    function previewImage(doc_file) {
        var src = "assets/file/"+doc_file;
        $("#img_doc").attr('src',src);
        $("#modalUpload").modal('show');
    }

    function getDocDetails(id) {
        //$("#div_doc").hide();
        //$('#doc_file').removeAttr('required');
        $.ajax({
            type: "POST",
            url: "controllers/sql.php?c=" + route_settings.class_name + "&q=view",
            data: {
            input: {
                id: id
            }
            },
            success: function(data) {
            var jsonParse = JSON.parse(data);
            const json = jsonParse.data;

          $(".select2").select2().trigger('change');
            $("#hidden_id").val(id);

            $('.input-item').map(function() {
                console.log(this.id);
                const id_name = this.id;
                this.value = json[id_name];
                if(this.id == "doc_converted_text"){
                    $('#doc_converted_text').summernote('code', this.value);
                }else if(this.id == "doc_type_id"){
                    $('.select2').val(this.value).trigger('change');
                }
            });


            $("#modalLabel").html("<i class='flaticon-edit'></i> Update Entry");
            $("#modalEntry").modal('show');
            }
        });
    }

    function getRecipient(id){
        $("#modalRecipients").modal('show');

        $("#hidden_doc_id").val(id);

        selectedRecipient(id);
    }

    function selectedRecipient(id) {
      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=" + route_settings.class_name + "&q=selectedRecipient",
        data: {
            id:id
        },
        success: function(data) {
            var jsonParse = JSON.parse(data);
            $('#user_id').val(jsonParse.data).change();
        }
      });

    }
    
    function addRecipient(){

        var doc_id = $("#hidden_doc_id").val();
        var user_id = $("#user_id").val();

        $("#btn_add_recipient").prop('disabled', true);
        $("#btn_add_recipient").html("<span class='fa fa-spinner fa-spin'></span>");

        $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=" + route_settings.class_name + "&q=addRecipients",
        data: {
            user_id:user_id,
            doc_id:doc_id
        },
        success: function(data) {
            success_update();
            $("#btn_add_recipient").prop('disabled', false);
            $("#btn_add_recipient").html("<span class='flaticon2-check-mark'></span>");
            //alert(data);
        }
        });
    }

    function addDoc(){
        $("#hidden_id").val(0);
        document.getElementById("frm_submit").reset();

        $("doc_file").prop('required',true);
        $("#div_doc").show();
        $('#doc_converted_text').summernote('code','');

        $("#modalLabel").html("<i class='flaticon2-add'></i> Add Entry");
        $("#modalEntry").modal('show');
    }

    $(document).ready(function() {
        getEntries();
        getSelectOption('DocumentType', 'doc_type_id', 'doc_type');
        $('.summernote').summernote({ 
        });
        
        getSelectOption('Users', 'user_id', 'user_fullname',"user_category='S'",'','remove');
    });
</script>