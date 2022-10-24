<?php
$request = $_SERVER['REQUEST_URI'];
$page = str_replace("/CDMS/", "", $request);
?>
<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pt-7">
    <!--begin::Nav-->
    <ul class="nav flex-column">
        <!--begin::Item-->
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Homepage">
            <a href="./" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == "" || $page == "homepage" || $page == null ? 'active' : '' ?>">
                <i class="flaticon2-protection icon-lg"></i>
            </a>
        </li>
    <?php if($_SESSION['cdms_user_category'] == 'A'){ ?>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Document Type">
            <a href="./document-type" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'document-type' ? 'active' : '' ?>">
                <i class="flaticon-signs-1 icon-lg"></i>
            </a>
        </li>
    <?php } ?>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="My Documents">
            <a href="./documents" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'documents' ? 'active' : '' ?>">
                <i class="flaticon-folder-1 icon-lg"></i>
            </a>
        </li>
    <?php if($_SESSION['cdms_user_category'] != 'A'){ ?>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Shared with me">
            <a href="./shared-documents" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'shared-documents' ? 'active' : '' ?>">
                <i class="flaticon-users icon-lg"></i>
            </a>
        </li>

        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Recent items">
            <a href="./recents" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'recents' ? 'active' : '' ?>">
                <i class="flaticon-time-1 icon-lg"></i>
            </a>
        </li>
    <?php } ?>    
    <?php 
    if($_SESSION['cdms_user_category'] == 'A'){ ?>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Manage users">
            <a href="./users" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'users' ? 'active' : '' ?>">
                <i class="flaticon-user-add icon-lg"></i>
            </a>
        </li>
        <!--end::Item-->
    <?php } ?>
    </ul>
    <!--end::Nav-->
</div>