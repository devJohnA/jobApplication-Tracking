<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';

include_once __DIR__ . '/../backend/controllers/JobApplicationController.php';
$controller = new JobApplicationController($pdo);
$totaljobapplications = $controller->countApplications();

?>

<style>
    .gradient-card-one {
        background: dodgerblue;
    }
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card gradient-card-one" style="height: 180px; padding: 20px;">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-white font-size-18 mb-3 fw-bold">Pending Applications</p>
                                    <h3 class="mb-3 text-white"> <?php echo $totaljobapplications; ?></h3>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-danger rounded-3">
                                        <i class="mdi mdi-format-list-bulleted font-size-28"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<?php
include 'partials/script.php';
?>