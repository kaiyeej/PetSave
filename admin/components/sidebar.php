<?php
$request = $_SERVER['REQUEST_URI'];
$page = str_replace("/petsave/admin/", "", $request);
?>
<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pt-7">
    <!--begin::Nav-->
    <ul class="nav flex-column">
        <!--begin::Item-->
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Dashboard">
            <a href="./" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == "" || $page == "homepage" || $page == null ? 'active' : '' ?>">
                <i class="flaticon-dashboard icon-lg"></i>
            </a>
        </li>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Adoption">
            <a href="./adopt" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'adopt' ? 'active' : '' ?>">
                <i class="flaticon-folder-1 icon-lg"></i>
            </a>
        </li>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Animals">
            <a href="./animals" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'animals' ? 'active' : '' ?>">
                <i class="flaticon2-shelter icon-lg"></i>
            </a>
        </li>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Lost and Found">
            <a href="./lost-found" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'lost-found' ? 'active' : '' ?>">
                <i class="flaticon-open-box icon-lg"></i>
            </a>
        </li>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Lost and Found">
            <a href="./users" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'users' ? 'active' : '' ?>">
                <i class="flaticon-user-add icon-lg"></i>
            </a>
        </li>
        
    </ul>
    <!--end::Nav-->
</div>