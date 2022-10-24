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
                            <div class="flex-grow-1 p-8 card-rounded bgi-no-repeat d-flex align-items-center"
                                style="background-color: #80cbc4; background-position: left bottom; background-size: auto 100%; background-image: url(assets/media/svg/humans/custom-2.svg)">

                                <div class="row">
                                    <div class="col-12 col-xl-5">

                                    </div>
                                    <div class="col-12 col-xl-7">
                                        <h4 class="text-danger font-weight-bolder">CMDS</h4>

                                        <p class="text-dark-50 my-5 font-size-xl font-weight-bold">
                                        Carlos Hilado Memorial State University - Document Management System
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Engage Widget 1-->
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
                                                class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Pending Invitation</a>
                                        </div>
                                    </div>
                                    <div
                                        class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base"><?= $Homepage->total_pending(); ?></div>
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
                                                class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Documents</a>
                                        </div>
                                    </div>
                                    <div
                                        class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base"><?= $Homepage->total_documents(); ?></div>
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
                                                class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Shared Documents</a>
                                        </div>
                                    </div>
                                    <div
                                        class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base"><?= $Homepage->total_shared_documents(); ?></div>
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
                                <span class="card-label font-weight-bolder text-dark">Pending Invitation</span>
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
                                            <th class="pl-0" style="min-width: 120px">Document name</th>
                                            <th style="min-width: 110px">Owner</th>
                                            <th style="min-width: 110px">Date created</th>
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
                
            <!--end::Row-->



            <!--begin::Advance Table Widget 5-->
           
            <!--end::Advance Table Widget 5-->

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<script>
    $(document).ready(function() {
        getEntries();
    });

    function getEntries() {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
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
                    start_date: start_date,
                    end_date: end_date
                }
            },
            "columns": [{
                    "data": "doc_name"
                },
                {
                    "data": "owner"
                },
                {
                    "data": "date_added"
                }

            ]
        });
    }
</script>