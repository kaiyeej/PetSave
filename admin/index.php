<?php
include 'core/config.php';


$User = new Users();
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>CDMS</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/sweetalert/sweetalert.css">


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <script src='https://cdn.jsdelivr.net/gh/naptha/tesseract.js@v1.0.14/dist/tesseract.min.js'></script>
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="assets/media/logos/CHMSU.png" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">

    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile  header-mobile-fixed ">
        <!--begin::Logo-->
        <a href="./">
            <img alt="Logo" src="assets/media/logos/CHMSU.png" class="logo-default max-h-30px" />
        </a>
        <!--end::Logo-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->

            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span> </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left d-flex flex-column " id="kt_aside">
                <!--begin::Brand-->
                <div class="aside-brand d-flex flex-column align-items-center flex-column-auto py-4 py-lg-8">
                    <!--begin::Logo-->
                    <a href="./">
                        <img alt="Logo" src="assets/media/logos/CHMSU.png" class="max-h-70px" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Brand-->

                <!--begin::Nav Wrapper-->
                  <?php include "components/sidebar.php"; ?>
                <!--end::Nav Wrapper-->
            </div>
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header bg-white  header-fixed ">
                    <!--begin::Container-->
                    <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
                        <!--begin::Left-->
                        <div class="d-flex align-items-stretch mr-2">
                            <!--begin::Page Title-->
                            <h3 class="d-none d-lg-flex align-items-center mr-10 mb-0" style="color:#00695c;">
                                CHMSU Document Management System </h3>
                            <!--end::Page Title-->

                            <!--begin::Header Menu Wrapper-->

                            <!--end::Header Menu Wrapper-->
                        </div>
                        <!--end::Left-->

                        <!--begin::Topbar-->
                        <div class="topbar">

                            <!--begin::User-->
                            <div class="topbar-item">
                                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                    <div class="d-flex flex-column text-right pr-3">
                                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline"><?= $User->dataRow($_SESSION["cdms_user_id"],'user_fname') ?></span>
                                        <span class="text-dark-75 font-weight-bolder font-size-base d-none d-md-inline"><?= $_SESSION['cdms_user_cat']; ?></span>
                                    </div>
                                    <span class="symbol symbol-35 symbol-light-warning">
                                        <span class="symbol-label font-size-h5 font-weight-bold"><?= strtoupper(substr($User->dataRow($_SESSION["cdms_user_id"],'user_fname'), 0, 1)); ?></span>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->

                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content" style="padding-top: 50px;">
                    
          <?php require 'routes/routes.php'; ?>
                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
                    <!--begin::Container-->
                    <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">2022&copy;</span>
                            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Carlos Hilado Memorial State University</a>
                        </div>
                        <!--end::Copyright-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->


    <!--begin::Search Panel-->
    <div id="kt_quick_search" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between mb-5">
            <h3 class="font-weight-bold m-0">
                Search
                <small class="text-muted font-size-sm ml-2">files, reports, members</small>
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_search_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->

        <!--begin::Content-->
        <div class="offcanvas-content">
            <!--begin::Container-->
            <div class="quick-search quick-search-offcanvas quick-search-has-result" id="kt_quick_search_offcanvas">
                <!--begin::Form-->
                <form method="get" class="quick-search-form border-bottom pt-5 pb-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span> </span>
                        </div>
                        <input type="text" class="form-control " placeholder="Search..." />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                            </span>
                        </div>
                    </div>
                </form>
                <!--end::Form-->

                <!--begin::Wrapper-->
                <div class="quick-search-wrapper pt-5">
                    <div class="quick-search-result">
                        <!--begin::Message-->
                        <div class="text-muted d-none">
                            No record found
                        </div>
                        <!--end::Message-->

                        <!--begin::Section-->
                        <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
                            Documents
                        </div>
                        <div class="mb-10">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                                    <img src="assets/media/svg/files/doc.svg" alt="" />
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        AirPlus Requirements
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        by Grog John
                                    </span>
                                </div>
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                                    <img src="assets/media/svg/files/pdf.svg" alt="" />
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        TechNav Documentation
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        by Mary Broun
                                    </span>
                                </div>
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                                    <img src="assets/media/svg/files/xml.svg" alt="" />
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        All Framework Docs
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        by Nick Stone
                                    </span>
                                </div>
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                                    <img src="assets/media/svg/files/csv.svg" alt="" />
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        Finance & Accounting Reports
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        by Jhon Larson
                                    </span>
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Section-->
                        <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
                            Members
                        </div>
                        <div class="mb-10">
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 flex-shrink-0">
                                    <div class="symbol-label" style="background-image:url('assets/media/users/300_20.jpg')"></div>
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        Milena Gibson
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        UI Designer
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 flex-shrink-0">
                                    <div class="symbol-label" style="background-image:url('assets/media/users/300_15.jpg')"></div>
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        Stefan JohnStefan
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        Marketing Manager
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 flex-shrink-0">
                                    <div class="symbol-label" style="background-image:url('assets/media/users/300_12.jpg')"></div>
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        Anna Strong
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        Software Developer
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 flex-shrink-0">
                                    <div class="symbol-label" style="background-image:url('assets/media/users/300_16.jpg')"></div>
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        Nick Bold
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        Project Coordinator
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--end::Section-->

                        <!--begin::Section-->
                        <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
                            Files
                        </div>
                        <div class="mb-10">
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 flex-shrink-0">
                                    <div class="symbol-label">
                                        <i class="flaticon-psd text-primary"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        79 PSD files generated
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        by Grog John
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 flex-shrink-0">
                                    <div class="symbol-label">
                                        <i class="flaticon2-supermarket text-warning"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        $2900 worth products sold
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        Total 234 items
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 flex-shrink-0">
                                    <div class="symbol-label">
                                        <i class="flaticon-safe-shield-protection text-info"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        4 New items submitted
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        Marketing Manager
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-grow-1 mb-2">
                                <div class="symbol symbol-30 flex-shrink-0">
                                    <div class="symbol-label">
                                        <i class="flaticon-safe-shield-protection text-warning"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column ml-3 mt-2 mb-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                        4 New items submitted
                                    </a>
                                    <span class="font-size-sm font-weight-bold text-muted">
                                        Marketing Manager
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Search Panel-->



    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">
                User Profile
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->

        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <div class="symbol-label"><span class="flaticon-profile-1" style="font-size: 6.5rem !important;color: purple;"></span></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    <?= $User->fullname($_SESSION["cdms_user_id"])  ?>
                    </a>
                    <div class="text-muted mt-1">
                     <?= $_SESSION["cdms_user_cat"] ?>
                    </div>
                    <div class="navi mt-2">
                        <a href="#" class="navi-item">
                            <span class="navi-link p-0 pb-2">
                                <span class="navi-icon mr-1">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span> </span>
                                <span class="navi-text text-muted text-hover-primary"><?= $User->dataRow($_SESSION["cdms_user_id"],'user_email') ?></span>
                            </span>
                        </a>

                        <a href="#" onclick="logout()" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                    </div>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->
            <!--end::Separator-->

            <!--begin::Notifications-->
            <div>
                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-success rounded p-5 gutter-b">
                    <span class="svg-icon svg-icon-success mr-5">
                        <i class="flaticon-profile"></i>
                    </span>

                    <div class="d-flex flex-column flex-grow-1 mr-2">
                        <a href="./profile" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Profile</a>
                        <span class="text-muted font-size-sm">User's profile and settings</span>
                    </div>

                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-danger rounded p-5 gutter-b">
                    <span class="svg-icon svg-icon-danger mr-5">
                        <i class="flaticon-list-1"></i>
                    </span>

                    <a href="./logs" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Logs
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <span class="text-muted font-size-sm">User's activities</span>
                        </div>
                    </a>

                </div>
                <!--end::Item-->
            </div>
            <!--end::Notifications-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->
    <script type='text/javascript'>
    <?php
    echo "var route_settings = " . $route_settings . ";\n";
    ?>
  </script>
<script type="text/javascript">
    var modal_detail_status = 0;
    $(document).ready(function() {
      $(".select2").select2();

      $(".select2").css({
        "width": "100%"
      });

      $(".input-item").css({"color": "#fff;"});

      $('ul li a').click(function(){
        $('li a').removeClass("active");
        $(this).addClass("active");
      });
    });

    function logout() {
      var confirm_export = confirm("You are about to logout.");
      if (confirm_export == true) {
        var url = "controllers/sql.php?c=LoginUser&q=logout";
        $.ajax({
          url: url,
          success: function(data) {

            location.reload();

          }
        });
      }
      
    }

    function schema() {
      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=" + route_settings.class_name + "&q=schema",
        data: [],
        success: function(data) {
          var json = JSON.parse(data);
          console.log(json.data);
        }
      });
    }

    function success_add() {
      swal("Success!", "Successfully added entry!", "success");
    }

    function success_update() {
      swal("Success!", "Successfully updated entry!", "success");
    }

    function success_delete() {
      swal("Success!", "Successfully deleted entry!", "success");
    }

    function entry_already_exists() {
      swal("Cannot proceed!", "Entry already exists!", "warning");
    }

    function amount_is_greater() {
      swal("Cannot proceed!", "Amount is greater than balance!", "warning");
    }

    function failed_query(data) {
      swal("Failed to execute query!", data, "warning");
      //alert('Something is wrong. Failed to execute query. Please try again.');
    }

    function checkAll(ele, ref) {
      var checkboxes = document.getElementsByClassName(ref);
      if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = true;
          }
        }
      } else {
        for (var i = 0; i < checkboxes.length; i++) {
          //console.log(i)
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = false;
          }
        }
      }
    }


    function addModal() {
      modal_detail_status = 0;
      $("#hidden_id").val(0);
      document.getElementById("frm_submit").reset();

      var element = document.getElementById('reference_code');
      if (typeof(element) != 'undefined' && element != null) {
        generateReference(route_settings.class_name);
      }

      $("#modalLabel").html("<i class='flaticon2-add'></i> Add Entry");
      $("#modalEntry").modal('show');
    }

    $("#frm_submit").submit(function(e) {
      e.preventDefault();

      $("#btn_submit").prop('disabled', true);
      $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

      var hidden_id = $("#hidden_id").val();
      var q = hidden_id > 0 ? "edit" : "add";
      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=" + route_settings.class_name + "&q=" + q,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          route_settings.class_name != "SharedDocuments" ? getEntries() : "" ;
          
          var json = JSON.parse(data);
          if (route_settings.has_detail == 1) {
            if (json.data > 0) {
              $("#modalEntry").modal('hide')
              hidden_id > 0 ? success_update() : success_add();
              hidden_id > 0 ? $("#modalEntry2").modal('hide') : '';
              hidden_id > 0 ? getEntryDetails2(hidden_id) : getEntryDetails2(json.data);
            } else if (json.data == -2) {
              entry_already_exists();
            } else {
              failed_query(json);
            }
          } else {
            if (json.data == 1) {
              hidden_id > 0 ? success_update() : success_add();
              $("#modalEntry").modal('hide');
            } else if (json.data == 2) {
              entry_already_exists();
            } else {
              failed_query(json);
            }
          }
          $("#btn_submit").prop('disabled', false);
          $("#btn_submit").html("<span class='fa fa-check-circle'></span> Submit");
        }
      });
    });

    function getEntryDetails(id, is_det = 0) {
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

          $("#hidden_id").val(id);

          $('.input-item').map(function() {
            //console.log(this.id);
            const id_name = this.id;
            this.value = json[id_name];
          });

          //$(".select2").select2().trigger('change');

          $("#modalLabel").html("<i class='flaticon-edit'></i> Update Entry");
          $("#modalEntry").modal('show');
        }
      });

      if (is_det == 1) {
        modal_detail_status == 1 ? setTimeout(() => {
          $("#modalEntry2").modal('hide')
        }, 500) : '';
      } else {
        modal_detail_status = 0;
      }
    }

    function deleteEntry() {

      var count_checked = $("input[class='dt_id']:checked").length;

      if (count_checked > 0) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover these entries!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-primary",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm) {
            if (isConfirm) {
              var checkedValues = $("input[class='dt_id']:checked").map(function() {
                return this.value;
              }).get();

              $.ajax({
                type: "POST",
                url: "controllers/sql.php?c=" + route_settings.class_name + "&q=remove",
                data: {
                  input: {
                    ids: checkedValues
                  }
                },
                success: function(data) {
                  getEntries();
                  var json = JSON.parse(data);
                  console.log(json);
                  if (json.data == 1) {
                    success_delete();
                  } else {
                    failed_query(json);
                  }
                }
              });

              $("#btn_delete").prop('disabled', true);

            } else {
              swal("Cancelled", "Entries are safe :)", "error");
            }
          });
      } else {
        swal("Cannot proceed!", "Please select entries to delete!", "warning");
      }
    }

    // MODULE WITH DETAILS LIKE SALES

    function getEntryDetails2(id) {
      $("#hidden_id_2").val(id);
      modal_detail_status = 1;
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

          $('.label-item').map(function() {
            const id_name = this.id;
            const new_id = id_name.replace('_label', '');
            this.innerHTML = json[new_id];
          });

          var transaction_edit = document.getElementById("menu-edit-transaction");
          var transaction_delete_items = document.getElementById("menu-delete-selected-items");
          var transaction_finish = document.getElementById("menu-finish-transaction");
          var col_list = document.getElementById("col-list");
          var col_item = document.getElementById("col-item");

          if (json.status == 'F') {
            transaction_edit.classList.add('disabled');
            (typeof(transaction_delete_items) != 'undefined' && transaction_delete_items != null) ? transaction_delete_items.classList.add('disabled'): '';
            transaction_finish.classList.add('disabled');

            transaction_edit.setAttribute("onclick", "");
            (typeof(transaction_delete_items) != 'undefined' && transaction_delete_items != null) ? transaction_delete_items.setAttribute("onclick", ""): '';
            transaction_finish.setAttribute("onclick", "");

            (typeof(col_item) != 'undefined' && col_item != null) ? col_item.style.display = "none": '';
            (typeof(col_list) != 'undefined' && col_list != null) ? col_list.classList.remove('col-8'): '';
            (typeof(col_list) != 'undefined' && col_list != null) ? col_list.classList.add('col-12'): '';
          } else {
            transaction_edit.classList.remove('disabled');
            (typeof(transaction_delete_items) != 'undefined' && transaction_delete_items != null) ? transaction_delete_items.classList.remove('disabled'): '';
            transaction_finish.classList.remove('disabled');

            transaction_edit.setAttribute("onclick", "getEntryDetails(" + id + ",1)");
            (typeof(transaction_delete_items) != 'undefined' && transaction_delete_items != null) ? transaction_delete_items.setAttribute("onclick", "deleteEntry2()"): '';
            transaction_finish.setAttribute("onclick", "finishTransaction()");

            (typeof(col_item) != 'undefined' && col_item != null) ? col_item.style.display = "block": '';
            (typeof(col_list) != 'undefined' && col_list != null) ? col_list.classList.remove('col-12'): '';
            (typeof(col_list) != 'undefined' && col_list != null) ? col_list.classList.add('col-8'): '';
          }
          getEntries2();
          $("#modalEntry2").modal('show');
        }
      });
    }

    $("#frm_submit_2").submit(function(e) {
      e.preventDefault();

      $("#btn_submit_2").prop('disabled', true);
      $("#btn_submit_2").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=" + route_settings.class_name + "&q=add_detail",
        data: $("#frm_submit_2").serialize(),
        success: function(data) {
          getEntries2();
          var json = JSON.parse(data);
          if (json.data == 1) {
            success_add();
            document.getElementById("frm_submit_2").reset();
            $('.select2').select2().trigger('change');
          } else if (json.data == 2) {
            entry_already_exists();
          } else if (json.data == 3) {
            amount_is_greater();
          } else {
            failed_query(json);
            $("#modalEntry2").modal('hide');
          }
          $("#btn_submit_2").prop('disabled', false);
          $("#btn_submit_2").html("<span class='fa fa-check-circle'></span> Submit");
        }
      });
    });

    function deleteEntry2() {

      var count_checked = $("input[class='dt_id_2']:checked").length;

      if (count_checked > 0) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover these entries!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-primary",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm) {
            if (isConfirm) {
              var checkedValues = $("input[class='dt_id_2']:checked").map(function() {
                return this.value;
              }).get();

              $.ajax({
                type: "POST",
                url: "controllers/sql.php?c=" + route_settings.class_name + "&q=remove_detail",
                data: {
                  input: {
                    ids: checkedValues
                  }
                },
                success: function(data) {
                  getEntries2();
                  var json = JSON.parse(data);
                  console.log(json);
                  if (json.data == 1) {
                    success_delete();
                  } else {
                    failed_query(json);
                  }
                }
              });

              $("#btn_delete").prop('disabled', true);

            } else {
              swal("Cancelled", "Entries are safe :)", "error");
            }
          });
      } else {
        swal("Cannot proceed!", "Please select entries to delete!", "warning");
      }
    }

    function finishTransaction() {
      var id = $("#hidden_id_2").val();

      var count_checked = $("input[class='dt_id_2']").length;
      if (count_checked > 0) {
        swal({
            title: "Are you sure?",
            text: "This entries will be finished!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-info",
            cancelButtonClass: "btn-primary",
            confirmButtonText: "Yes, finish it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm) {
            if (isConfirm) {
              $.ajax({
                type: "POST",
                url: "controllers/sql.php?c=" + route_settings.class_name + "&q=finish",
                data: {
                  input: {
                    id: id
                  }
                },
                success: function(data) {
                  getEntries();
                  var json = JSON.parse(data);
                  if (json.data == 1) {
                    success_add();
                    $("#modalEntry2").modal('hide');
                  } else {
                    failed_query(json);
                  }
                }
              });
            } else {
              swal("Cancelled", "Entries are safe :)", "error");
            }
          });
      } else {
        swal("Cannot proceed!", "No entries found!", "warning");
      }
    }
    // END MODULE

    function getSelectOption(class_name, primary_id, label, param = '', attributes = [], pre_value='', pre_label = 'Please Select') {
      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=" + class_name + "&q=show",
        data: {
          input: {
            param: param
          }
        },
        success: function(data) {
          var json = JSON.parse(data);
          if(pre_value != "remove"){
            $("#" + primary_id).html("<option value='" + pre_value + "'> &mdash; " + pre_label + " &mdash; </option>");
          }

          for (list_index = 0; list_index < json.data.length; list_index++) {
            const list = json.data[list_index];
            var data_attributes = {};
            data_attributes['value'] = list[primary_id];
            for (var attr_index in attributes) {
              const attr = attributes[attr_index];
              data_attributes[attr] = list[attr];
            }
            $('#' + primary_id).append($("<option></option>").attr(data_attributes).text(list[label]));
          }
        }
      });
    }

    function generateReference(class_name) {
      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=" + class_name + "&q=generate",
        data: [],
        success: function(data) {
          var json = JSON.parse(data);
          $("#reference_code").val(json.data);
        }
      });
    }

    function printCanvas() {
      var printContents = document.getElementById('print_canvas').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      window.close();
      location.reload();

    }
  </script>



    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->

    
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/sweetalert/sweetalert.js"></script>

    <!--begin::Page Vendors(used by this page)-->
    <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
    <script src="assets/js/pages/crud/forms/editors/summernote.js"></script>
    <!--end::Page Vendors-->

</body>
<!--end::Body-->

</html>