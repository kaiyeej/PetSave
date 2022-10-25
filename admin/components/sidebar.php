<?php
$request = $_SERVER['REQUEST_URI'];
$page = str_replace("/petsave/admin/", "", $request);
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
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Adoption">
            <a href="./adopt" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'adopt' ? 'active' : '' ?>">
                <i class="flaticon-folder-1 icon-lg"></i>
            </a>
        </li>
    </ul>
    <!--end::Nav-->
</div>