<?php 
include 'link.php';

?>

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="maincontent.php" class="logo">
                    <span class="logo-lg">
                        <h4 class="mt-3 text-black">Job Tracking</h4>
                    </span> 
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        <div class="d-flex">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="./image/user.png" alt="User">
                    <span class="d-none d-xl-inline-block ms-1">Test</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
          
                        <a class="dropdown-item text-danger" href="./logout.php"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>