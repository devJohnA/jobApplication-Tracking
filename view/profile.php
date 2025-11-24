<?php
session_start();
include 'partials/navbar.php';
include 'partials/sidebar.php';

require_once '../backend/models/User.php';
$userName = $_SESSION['user_name'];

$userModel = new User($pdo);
$userData = $userModel->getUserByEmail($userName);
?>
<style>
    .dataTables_length select {
        appearance: auto !important;
        padding-right: 30px;
    }
    .edit-icon {
        cursor: pointer;
        margin-left: 8px;
        color: #6c757d;
    }
    .name-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .profile-form {
        max-width: 600px;
        margin: 0 auto;
    }
    .profile-form .form-control {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }
    .profile-form .form-label {
        text-align: left;
        display: block;
        margin-bottom: 0.5rem;
        color: #6c757d;
    }

</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-sm-0">Profile Account</h4>
                        <div class="card shadow-sm rounded-4">
                            <div class="card-body text-center p-5">
                                <img src="image/cellphieffix.png" class="rounded-circle mb-4" style="width: 150px; height: 150px; object-fit: cover;">
                                <div class="name-container">
                                    <p class="text-center mb-0"><?php echo htmlspecialchars($userData['email']); ?></p>
                                    <i class="ri-edit-line edit-icon" id="toggleUpdateForm"></i>
                                </div>
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <small class="badge bg-success text-white rounded-pill">✔ Verified</small>
                                </div>

                                <div class="bg-light p-3 rounded-3 mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <small class="text-muted">Account ID</small>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($userData['id']); ?></h6>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Email</small>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($userData['email']); ?></h6>
                                        </div>
                                    </div>
                                </div>

                                <!-- Update Form (Hidden Initially) -->
                                <div id="updateProfileForm" class="mt-4 profile-form" style="display: none;">
                                    <form action="../backend/api/update_profile.php" method="POST">
                                      <input type="hidden" name="id" value="<?= $userData['id'] ?>">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>

                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password">
                                        </div>

                                        <button type="submit" class="btn btn-warning">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        document.getElementById("toggleUpdateForm").addEventListener("click", function() {
            let form = document.getElementById("updateProfileForm");
            form.style.display = form.style.display === "none" ? "block" : "none";
        });

        // Handle form submission
        document.querySelector('#updateProfileForm form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Check if passwords match when password field is not empty
            const password = this.querySelector('[name="password"]').value;
            const confirmPassword = this.querySelector('[name="confirm_password"]').value;
            
            if (password && password !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Passwords do not match!',
                });
                return;
            }

            // If validation passes, submit the form
            this.submit();
        });

    </script>

<?php include 'partials/script.php'; ?>