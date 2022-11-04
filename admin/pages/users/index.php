<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container ">
        <!--begin::Notice-->
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b " role="alert">
            <div class="alert-icon">
                <span class="svg-icon svg-icon-primary svg-icon-xl">
                <i class="menu-icon flaticon-users text-warning"></i>
                </span>
            </div>
            <div class="alert-text">
                Users
            </div>
            <div class="card-toolbar">
                <a href="#" onclick="addUser()" data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Add New Entry" class="btn btn-success">
                    <i class="flaticon2-add"></i>
                </a>
                <a href="#"  data-container="body" data-offset="20px 20px" data-toggle="popover" data-placement="top" data-content="Delete Selected Entry" onclick='deleteEntry()' class="btn btn-danger">
                    <i class="flaticon-delete-1"></i>
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
                                Manage Users
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
                                        <th>Fullname</th>
                                        <th>Category</th>
                                        <th>Contact #</th>
                                        <th>Username</th>
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
<?php require_once 'modal_user.php'; ?>
<script type="text/javascript">
    function addUser(){
        addModal();
        $("#div_password").show();
    }

    function getUserDetails(id){
        $("#div_password").hide();
        getEntryDetails(id);
    }

    
    function getEntries() {
        $("#dt_entries").DataTable().destroy();
        $("#dt_entries").DataTable({
            "processing": true,
            "ajax": {
                "url": "controllers/sql.php?c=" + route_settings.class_name + "&q=show",
                "dataSrc": "data"
            },
            "columns": [{
                    "mRender": function(data, type, row) {
                        return row.user_category == "S" ? "<input type='checkbox' value=" + row.user_id + " class='dt_id' style='position: initial; opacity:1;'>" : "";
                    }
                },
                {
                    "mRender": function(data, type, row) {
                        return "<center><button class='btn btn-icon btn-sm btn-light-info' onclick='getUserDetails(" + row.user_id + ")'><span class='flaticon-edit-1'></span></button></center>";
                    }
                },
                {
                    "data": "user_fullname"
                },
                {
                    "data": "category"
                },
                {
                    "data": "user_contact_num"
                },
                {
                    "data": "username"
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
    $(document).ready(function() {
        getEntries();
    });
</script>