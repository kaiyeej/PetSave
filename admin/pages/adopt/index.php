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
                Adoption
            </div>
            <div class="card-toolbar btn-group" style="padding-top: 5px">
                <a href="#" onclick="addAdopt()" data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Add New Entry" style="padding:10px;" class="btn btn-primary  btn-sm">
                    <i class="flaticon2-add"></i> Add
                </a>
                <a href="#"  data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Cancel Selected Entry" onclick='cancelEntry()' style="padding:10px;" class="btn btn-warning btn-sm">
                    <i class="flaticon2-cancel"></i> Cancel
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
                                List of Adoption
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
                                        <th>Animal</th>
                                        <th>Status</th>
                                        <th>Date Added</th>
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
<?php require_once 'modal_adopt.php'; ?>
<script type="text/javascript">
</script>
<script type="text/javascript">
    function addAdopt(){
        $("#btn_approve").hide();
        // $('#div_adopt').css('pointer-events', 'auto');
        addModal();
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
                        return row.status == "A" ? "" : "<input type='checkbox' value=" + row.adoption_id + " class='dt_id' style='position: initial; opacity:1;'>";
                    }
                },
                {
                    "mRender": function(data, type, row) {
                        return "<center><button class='btn btn-icon btn-sm btn-light-primary' onclick='getDetails(" + row.adoption_id + ")'><i class='flaticon-edit-1'></i></button></center>";

                    }
                },
                {
                    "data": "fullname"
                },
                {
                    "data": "animal"
                },
                {
                    "mRender": function(data, type, row) {
                        return row.status == "A" ? "<span class='badge badge-success'>Approved</span>" : (row.status == "C" ? "<span class='badge badge-danger'>Cancel</span>" : "<span class='badge badge-warning'>Pending</span>");

                    }
                },
                {
                    "data": "date_added"
                }
            ]
        });
    }

    function getDetails(id){
        getEntryDetails(id);
        $("#btn_approve").show();
    }

    function approveNow() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover these entries!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-primary",
            confirmButtonText: "Yes, approve it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        },function(isConfirm) {
            if (isConfirm) {
                var id = $("#hidden_id").val();

                $.ajax({
                    type: "POST",
                    url: "controllers/sql.php?c=" + route_settings.class_name + "&q=approve",
                    data: {
                        input: {
                            id: id
                        }
                    },
                    success: function(data) {
                        getEntries();
                        var json = JSON.parse(data);
                        console.log(json);
                        if (json.data == 1) {
                            success_approve();
                        } else if(json.data == -1){
                            swal("Cannot proceed!", "Selected animal is not available!", "warning");
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


    $(document).ready(function() {
        getEntries();
        getSelectOption('Pets', 'pet_id', 'pet_name', "pet_status='' OR pet_status='P'");
        getSelectOption('Users', 'user_id', 'user_fullname', "user_category !='A'");
    });
</script>