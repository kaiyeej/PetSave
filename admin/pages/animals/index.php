<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container ">
        <!--begin::Notice-->
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b " style="border: 1.5px dashed #ff9800;background: #f9f0e3;padding:10px;" role="alert">
            <div class="alert-icon">
                <span class="svg-icon svg-icon-primary svg-icon-xl">
                <i class="menu-icon flaticon2-shelter text-warning"></i>
                </span>
            </div>
            <div class="alert-text" style="color: #ff9800;font-weight: 500;">
                Pets
            </div>
            <div class="card-toolbar btn-group" style="padding-top: 5px">
                <a href="#" onclick="addAnimal()" data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Add New Entry" style="padding:10px;" class="btn btn-primary  btn-sm">
                    <i class="flaticon2-add"></i> Add
                </a>
                <a href="#"  data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Delete Selected Entry" onclick='deleteEntry()' style="padding:10px;" class="btn btn-danger btn-sm">
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
                                List of Rescued Pets
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
                                        <th>Image</th>
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
<?php require_once 'modal_animals.php'; ?>
<?php require_once 'modal_upload.php'; ?>
<script type="text/javascript">
</script>
<script type="text/javascript">
    function addAnimal() {
      modal_detail_status = 0;
      $("#hidden_id").val(0);
      document.getElementById("frm_submit").reset();

      $("#div_image").show();
      $("#if_pet_image").prop('required');

      $("#modalLabel").html("<i class='flaticon2-add'></i> Add Entry");
      $("#modalEntry").modal('show');
    }

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
                        return row.status == "A" ? "" : "<input type='checkbox' value=" + row.pet_id + " class='dt_id' style='position: initial; opacity:1;'>";
                    }
                },
                {
                    "mRender": function(data, type, row) {
                        return "<center><button class='btn btn-icon btn-sm btn-light-primary' onclick='getAnimalDetails(" + row.pet_id + ")'><i class='flaticon-edit-1'></i></button></center>";

                    }
                },
                {
                    "data": "pet_name"
                },
                {
                    "data": "pet_type"
                },
                {
                    "mRender": function(data, type, row) {
                        return row.pet_image == "" ? "<img style='width:50px;' src='assets/media/error/no_image.png' onclick=\"uploadImage('" + row.pet_id + "')\">" : "<img src='assets/file/" + row.pet_image + "' style='width:50px;' onclick=\"uploadImage('" + row.pet_id + "')\">";
                    }
                },
                {
                    "data": "date_added"
                }
            ]
        });
    }

    function getAnimalDetails(id){
        $("#div_image").hide();
        $("#if_pet_image").removeAttr('required');
        getEntryDetails(id);
    }

    function uploadImage(id) {
      // alert(id);
      $("#hidden_id_3").val(id);
      $("#modalUpload").modal('show');

    }

    $("#frm_upload_img_animal").submit(function(e) {
      e.preventDefault();

      //var formData = new FormData(this);
      $("#btn_submit").prop('disabled', true);
      $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span>");
      // console.log(formData);

      var url = "controllers/sql.php?c=" + route_settings.class_name + "&q=uploadImage";
      $.ajax({
        url: url,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {

          var json = JSON.parse(data);
          if (json.data == 1) {
            $("#modalUpload").modal('hide');
            success_update();
            getEntries();

          }
            $("#btn_submit").prop('disabled', false);
            $("#btn_submit").html("Submit");
        }
      });

    });


    $(document).ready(function() {
        getEntries();
    });
</script>