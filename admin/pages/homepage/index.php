<?php
$Homepage = new Homepage();
?>
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-12">
                    <!--begin::Engage Widget 1-->
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body d-flex p-0">
                            <div class="flex-grow-1 p-12 card-rounded bgi-no-repeat d-flex flex-column justify-content-center align-items-start" style="background-color: #ffcc80; background-position: right bottom; background-size: auto 100%; background-image: url(assets/media/svg/humans/custom-8.svg)">
                                <h4 class="text-danger font-weight-bolder m-0">PetSave</h4>

                                <p class="text-dark-50 my-5 font-size-xl font-weight-bold" style="width: 70%;">
                                    Our mission is to rescue dogs and cats that have been abandoned, abused, or neglected throughout the Philippines and to make sure that each animal is given "Life with a New Leash"
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-4">
                    <!--begin::Tiles Widget 8-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <div class="card-title">
                                <div class="card-label">
                                    <div class="font-weight-bolder">Stats</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column p-0">
                            <!--begin::Items-->
                            <div class="flex-grow-1 card-spacer">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center justify-content-between mb-10">
                                    <div class="d-flex align-items-center mr-2">
                                        <div
                                            class="symbol symbol-40 symbol-light-danger mr-3 flex-shrink-0">
                                            <div class="symbol-label">
                                                <span class="flaticon-bell" style="font-size:20px;"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Rescued Animals <br><label onclick="showRescued()" class="badge badge-success">View</label></a>
                                        </div>
                                    </div>
                                    <div
                                        class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base"><?= $Homepage->rescued_animals_shelter() ?></div>
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex align-items-center justify-content-between mb-10">
                                    <div class="d-flex align-items-center mr-2">
                                        <div
                                            class="symbol symbol-40 symbol-light-warning mr-3 flex-shrink-0">
                                            <div class="symbol-label">
                                                <span class="flaticon-file" style="font-size:20px;"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Available Animals</a>
                                        </div>
                                    </div>
                                    <div
                                        class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base"><?= $Homepage->available_animals_shelter() ?></div>
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex align-items-center justify-content-between mb-10">
                                    <div class="d-flex align-items-center mr-2">
                                        <div
                                            class="symbol symbol-40 symbol-light-success mr-3 flex-shrink-0">
                                            <div class="symbol-label">
                                                <span class="flaticon-network" style="font-size:20px;"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Adopted Animals</a>
                                        </div>
                                    </div>
                                    <div
                                        class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base"><?= $Homepage->adopted_animals_shelter() ?></div>
                                </div>
                                <!--end::Item-->

                            </div>
                            <!--end::Items-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 8-->
                </div>
                <div class="col-xl-8">

                    <!--begin::Advance Table Widget 10-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Rescue Animals</span>
                            </h3>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body py-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-head-custom table-vertical-center"
                                    id="dt_entries">
                                    <thead>
                                        <tr class="text-left">
                                            <th class="pl-0" style="min-width: 120px"></th>
                                            <th class="pl-0" style="min-width: 120px">Image</th>
                                            <th style="min-width: 110px">Location</th>
                                            <th style="min-width: 110px">Description</th>
                                            <th style="min-width: 110px">Date Reported</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 10-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "modal_rescued.php"; ?>
<?php include "modal_image.php"; ?>

<script>
    $(document).ready(function() {
        getEntries();
    });

    function getEntries() {
        $("#dt_entries").DataTable().destroy();
        $("#dt_entries").DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "processing": true,
            "ajax": {
                "url": "controllers/sql.php?c=" + route_settings.class_name + "&q=pending",
                "dataSrc": "data",
                "data": {
                }
            },
            "columns": [
                {
                    "mRender": function(data, type, row) {
                        return "<center><button title='Rescue Animal' class='btn btn-icon btn-sm btn-light-success' onclick='rescueAnimal(" + row.rescue_id + ")'><i class='flaticon2-check-mark'></i></button></center>";

                    }
                },
                {
                    "mRender": function(data, type, row) {
                        return "<img src='assets/lost_found/" + row.img_file + "' style='width:50px;' onclick=\"uploadImage('" + row.img_file + "')\">";
                    }
                },
                {
                    "data": "location"
                },
                {
                    "data": "description"
                },
                {
                    "data": "date_added"
                }

            ]
        });
    }

    function uploadImage(img) {
      // alert(id);
      $("#div_img").html("<img style='width:100%;' src='assets/lost_found/" + img + "'\">");
      $("#modalUpload").modal('show');

    }

    function showRescued() {
      // alert(id);
      getEntries2();
      $("#modalRescued").modal('show');

    }

    function getEntries2() {
        $("#dt_entries2").DataTable().destroy();
        $("#dt_entries2").DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "processing": true,
            "ajax": {
                "url": "controllers/sql.php?c=" + route_settings.class_name + "&q=show",
                "dataSrc": "data",
                "data": {
                }
            },
            "columns": [
                {
                    "mRender": function(data, type, row) {
                        return "<img src='assets/lost_found/" + row.img_file + "' style='width:50px;' onclick=\"uploadImage('" + row.img_file + "')\">";
                    }
                },
                {
                    "data": "location"
                },
                {
                    "data": "description"
                },
                {
                    "data": "date_added"
                }

            ]
        });
    }


    function rescueAnimal(id) {
        swal({
            title: "Are you sure to rescue animal?",
            text: "This entries will be finished!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-info",
            cancelButtonClass: "btn-danger",
            confirmButtonText: "Yes, rescue it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm) {
            if (isConfirm) {
              $.ajax({
                type: "POST",
                url: "controllers/sql.php?c=" + route_settings.class_name + "&q=rescue",
                data: {
                  input: {
                    id: id
                  }
                },
                success: function(data) {
                  var json = JSON.parse(data);
                  if (json.data == 1) {
                    swal("Success!", "Successfully saved animal!", "success");
                    window.location.reload();
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

</script>