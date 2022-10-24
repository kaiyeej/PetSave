
<!--begin::Container-->
<div class=" container ">
    <!--begin::Todo Files-->
    <div class="d-flex flex-row">
        <!--begin::Aside-->
        <div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px" id="kt_todo_aside">
            <!--begin::Card-->
            <div class="card card-custom card-stretch">
                <!--begin::Body-->
                <div class="card-body px-5">
                    <div
                        class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">

                    </div>
                    <!--begin:Nav-->
                    <div
                        class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">

                        <!--begin:Section-->
                        <div class="navi-section mt-7 mb-2 font-size-h6 font-weight-bold pb-0">
                            Recent Documents</div>
                        <!--end:Section-->

                        <!--begin:Item-->
                        <div class="navi-item my-2">
                            <a href="#" onclick="getDocType(-1)" id="nav_all" class="navi-link">
                                <span class="navi-icon mr-4">
                                    <i class="fa fa-genderless text-default"></i>
                                </span>
                                <span class="navi-text font-weight-bolder font-size-lg">ALL</span>
                            </a>
                        </div>
                        <!--end:Item-->

                        <!--begin:Item-->
                        <div id="doc_type_canvas">

                        </div>
                        <!--end:Item-->

                    </div>
                    <!--end:Nav-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Aside-->

        <!--begin::List-->
        <div class="flex-row-fluid d-flex flex-column ml-lg-8">
            <div class="d-flex flex-column flex-grow-1">
                <!--begin::Row-->
                <div class="row" id="doc_canvas">
                    <!--begin::Col-->
                    
                    <!--end::Col-->

                </div>
                <!--end::Row-->

            </div>
        </div>
        <!--end::List-->
    </div>
    <!--end::Todo Files-->
</div>
<!--end::Container-->
<?php require_once 'modal_recipients.php'; ?>
<?php require_once 'modal_document.php'; ?>
<script type="text/javascript">

$(document).ready(function() {
    getDocType(-1);
    getSelectOption('Users', 'user_id', 'user_fullname',"user_category='S'",'','remove');

    getSelectOption('DocumentType', 'doc_type_id', 'doc_type');
        $('.summernote').summernote({ 
    });
});

var type_id = "";

function getDocDetails(id) {
    $("#div_doc").hide();
    $('#doc_file').removeAttr('required');
    $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=Documents&q=view",
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

function getDocType(doc_type_id){
    type_id = doc_type_id;
    documentType();

    $("#doc_canvas").html("");

    $.ajax({
        type: 'POST',
        url:  "controllers/sql.php?c=Documents&q=docByTypeRecents",
        data: {
            doc_type_id:doc_type_id
        },
        success: function(data) {
            console.log(data);
            var json = JSON.parse(data);
            var arr_count = json.data.length;
            var i = 0;
            while (i < arr_count) {

                if(json.data[i].status != 1){
                    var accept = "";
                }else{
                    var accept = "display:none;";
                }

                    $("#doc_canvas").append('<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">'+
                        '<div class="card card-custom gutter-b card-stretch">'+
                            '<div class="card-header border-0">'+
                                '<h3 class="card-title"></h3>'+
                                '<div class="card-toolbar">'+
                                    '<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">'+
                                        '<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ki ki-bold-more-hor"></i></a>'+
                                        '<div class="dropdown-menu dropdown-menu-md dropdown-menu-right"> '+
                                            '<ul class="navi navi-hover py-5">'+
                                                '<li class="navi-item"><a href="#" class="navi-link"><span class="navi-icon"><i class="flaticon2-user"></i></span><span class="navi-text">Owner:'+json.data[i].user+' </span></a></li>'+

                                                '<li class="navi-separator my-3"></li>'+

                                                '<li class="navi-item"><a href="#" onclick="getRecipients('+json.data[i].doc_id+')" class="navi-link"><span class="navi-icon"><i class="flaticon-users"></i></span><span class="navi-text">Access</span></a></li>'+
                                                
                                                '<li class="navi-item" style="'+accept+'"> <a href="#" class="navi-link" onclick="acceptDoc('+json.data[i].doc_id+')"><span class="navi-icon"><i  style="color:#03a9f4;" class="flaticon2-accept"></i></span><span class="navi-text" style="color:#03a9f4;">Accept</span></a></li>'+

                                                '<li class="navi-item"> <a href="#" onclick="removeDoc('+json.data[i].doc_id+')" class="navi-link"><span class="navi-icon"><i class="flaticon-delete"></i></span><span class="navi-text">Remove</span></a></li>'+
                                            '</ul>'+
                                        '</div></div></div></div>'+
                            '<div class="card-body" onclick="getDocDetails('+json.data[i].doc_id+')"><div class="d-flex flex-column align-items-center"><span class="flaticon-file" style="font-size: 3.08rem;color: #00bcd4;"></span><a href="#"class="text-dark-75 font-weight-bold mt-15 font-size-lg">'
                            +json.data[i].doc_name+
                                    '</a></div></div></div></div>');
                i++;
            }

            if(arr_count <= 0){
                $("#doc_canvas").html('<div class="col-xl-12"><div class="card card-custom gutter-b card-stretch"><div class="card-header border-0"><div class="card-body"><h4>No document found.</h4></div></div></div></div>');
            }

        }
    });
}

function acceptDoc(doc_id){
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover these entries!",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        cancelButtonClass: "btn-default",
        confirmButtonText: "Yes, accept it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: "POST",
                url: "controllers/sql.php?c=" + route_settings.class_name + "&q=accept",
                data: {
                    doc_id:doc_id
                },
                success: function(data) {
                    var json = JSON.parse(data);
                    console.log(json);
                    if (json.data == 1) {
                        success_update();
                        getDocType(type_id);
                    } else {
                        failed_query(json);
                    }
                }
            });

        } else {
            swal("Cancelled", "Entries are safe :)", "error");
        }
    });
}

function removeDoc(doc_id){
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover these entries!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        cancelButtonClass: "btn-default",
        confirmButtonText: "Yes, remove it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: "POST",
                url: "controllers/sql.php?c=" + route_settings.class_name + "&q=remove",
                data: {
                    doc_id:doc_id
                },
                success: function(data) {
                    var json = JSON.parse(data);
                    console.log(json);
                    if (json.data == 1) {
                        success_delete();
                        getDocType(type_id);
                    } else {
                        failed_query(json);
                    }
                }
            });

        } else {
            swal("Cancelled", "Entries are safe :)", "error");
        }
    });
}

function getRecipients(id){
    $("#modalRecipients").modal('show');

    $("#hidden_doc_id").val(id);

    $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=Documents&q=selectedRecipient",
        data: {
            id:id
        },
        success: function(data) {
            var jsonParse = JSON.parse(data);
            $('#user_id').val(jsonParse.data).change();
        }
      });
}

function documentType() {
    $("#doc_type_canvas").html("");
    $.ajax({
        type: 'POST',
        url:  "controllers/sql.php?c=DocumentType&q=show",
        data: {
            
        },
        success: function(data) {
            console.log(data);
            var json = JSON.parse(data);
            var arr_count = json.data.length;
            var i = 0;
            while (i < arr_count) {

                if(json.data[i].doc_type_id == type_id){
                    var active = "active";
                    $("#nav_all").removeClass("active");
                    $("#nav_pending").removeClass("active");
                }else if(type_id == -1){
                    $("#nav_all").addClass("active");
                    $("#nav_pending").removeClass("active");
                    var active = "";
                }else if(type_id == -2){
                    $("#nav_pending").addClass("active");
                    $("#nav_all").removeClass("active");
                    var active = "";
                }else{
                    var active = "";
                    $("#nav_all").removeClass("active");
                    $("#nav_pending").removeClass("active");
                }
                
                    $("#doc_type_canvas").append('<div class="navi-item my-2"><a href="#" onclick="getDocType('+json.data[i].doc_type_id+')" class="navi-link '+active+'"><span class="navi-icon mr-4"><i class="fa fa-genderless text-default"></i> </span><span class="navi-text font-weight-bolder font-size-lg">'+json.data[i].doc_type+'</span></a></div>');
                i++;
            }

        }
    });
}
</script>