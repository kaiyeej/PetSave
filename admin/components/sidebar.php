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
                <i class="fa fa-home icon-lg"></i>
            </a>
        </li>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Adoption">
            <a href="./adopt" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'adopt' ? 'active' : '' ?>">
                <i class="fa fa-hand-holding-heart icon-lg"></i>
            </a>
        </li>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Pets">
            <a href="./animals" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'animals' ? 'active' : '' ?>">
                <i class="fas fa-paw icon-lg"></i>
            </a>
        </li>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Rescues">
            <a href="./rescue" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'rescue' ? 'active' : '' ?>">
                <i class="fa fa-first-aid icon-lg"></i>
            </a>
        </li>
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Rehab">
            <a href="./rehab" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'rehab' ? 'active' : '' ?>">
                <i class="fa fa-hospital icon-lg"></i>
            </a>
        </li>
        <!-- <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Post">
            <a href="./post" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'post' ? 'active' : '' ?>">
                <i class="flaticon-notes icon-lg"></i>
            </a>
        </li> -->
        <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Lost and Found">
            <a href="./users" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg <?= $page == 'users' ? 'active' : '' ?>">
                <i class="fa fa-users icon-lg"></i>
            </a>
        </li>
        
    </ul>
    <!--end::Nav-->
</div>