<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container ">
        <!--begin::Notice-->
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b " style="border: 1.5px dashed #ff9800;background: #f9f0e3;padding:10px;" role="alert">
            <div class="alert-icon">
                <span class="svg-icon svg-icon-primary svg-icon-xl">
                    <i class="menu-icon flaticon-open-box text-warning"></i>
                </span>
            </div>
            <div class="alert-text" style="color: #ff9800;font-weight: 500;">
                Rescue
            </div>
            <div class="card-toolbar btn-group" style="padding-top: 5px">
                <a href="#" onclick="addModal()" data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Add New Entry" style="padding:10px;" class="btn btn-primary  btn-sm">
                    <i class="flaticon2-add"></i> Add
                </a>
                <!-- <a href="#" data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Resolve Selected Entry" onclick='resolveEntry()' style="padding:10px;" class="btn btn-success btn-sm">
                    <i class="flaticon2-check-mark"></i> Accepted
                </a> -->
                <a href="#" data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Cancel Selected Entry" onclick='cancelEntry()' style="padding:10px;" class="btn btn-warning btn-sm">
                    <i class="flaticon2-cancel"></i> Cancel
                </a>
                <a href="#" data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Delete Selected Entry" onclick='deleteEntry()' style="padding:10px;" class="btn btn-danger btn-sm">
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
                                Rescue
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
                                        <th>Pet</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Type</th>
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
<?php require_once 'modal_rescue.php'; ?>
<?php require_once 'modal_animals.php'; ?>
<script type="text/javascript">
</script>
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
                        return row.status == "A" ? "" : "<input type='checkbox' value=" + row.rescue_id + " class='dt_id' style='position: initial; opacity:1;'>";
                    }
                },
                {
                    "mRender": function(data, type, row) {
                        return "<center><button class='btn btn-icon btn-sm btn-light-primary' onclick='getEntryDetails(" + row.rescue_id + ")'><i class='flaticon-edit-1'></i></button></center>";

                    }
                },
                {
                    "data": "pet_name"
                },
                {
                    "data": "location"
                },
                {
                    "data": "description"
                },
                {
                    "data": "type"
                },
                {
                    "mRender": function(data, type, row) {
                        return row.status == "A" ? "<span class='badge badge-success'>Accepted</span>" : (row.status == "C" ? "<span class='badge badge-danger'>CANCEL</span>" : "<span class='badge badge-warning'>Pending</span>");

                    }
                },
                {
                    "data": "date_added"
                }
            ]
        });
    }

    $(document).ready(function() {
        getEntries();
    });

    $('#approveButton').click(function () {
        var rescue_id = $("#hidden_id").val();
        if (confirm('Are you sure you want to accept this rescue?')) {
            $("#pet_rescue_id").val(rescue_id);
            $('#modalPet').modal('show');
            $('#modalEntry').modal('hide');
        }
    });
</script>