        <?php
        include 'partials/navbar.php';
        include 'partials/sidebar.php';

        include_once __DIR__ . '/../backend/controllers/JobApplicationController.php';

        $controller = new JobApplicationController($pdo);
        $applications = $controller->listApplications();
        ?>

        <style>
            .dataTables_length select {
                appearance: auto !important;
                padding-right: 30px;
            }
        </style>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Applications</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body ">
                                    <button type="button" class="btn btn-dark waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#Application">Add New Applications</button>

                                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CompanyName</th>
                                                <th>Job Role</th>
                                                <th>Date Applied</th>
                                                <th>Website Link</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($applications as $application): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($application['id']); ?></td>
                                                    <td><?php echo htmlspecialchars($application['company_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($application['job_role']); ?></td>
                                                    <td><?= (new DateTime($application['date_applied']))->format('M d, Y'); ?></td>
                                                    <td><a href="https://example.com" target="_blank"><?php echo htmlspecialchars($application['link']); ?></a></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info edit-application" data-application-id="<?= $application['id']; ?>">Edit</button>
                                                        <button class="btn btn-sm btn-danger delete-application" data-application-id="<?= $application['id']; ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable();

                $(document).on('click', '.delete-application', function() {
                    var id = $(this).data('application-id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "../backend/api/delete_application.php",
                                data: {
                                    id: id
                                },
                                dataType: "json",
                                success: function(response) {
                                    if (response.status === "success") {
                                        Swal.fire(
                                            'Deleted!',
                                            response.message,
                                            'success'
                                        ).then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            response.message,
                                            'error'
                                        );
                                    }
                                }
                            });
                        }
                    });
                });
            });
        </script>

        <?php
        include 'partials/script.php';
        include 'modals/add_jobapplication.php';
        include 'modals/edit_jobapplication.php';

        ?>