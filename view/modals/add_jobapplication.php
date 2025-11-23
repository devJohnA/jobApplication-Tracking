<div id="Application" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myApplicationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myApplicationLabel">Add New Job Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="applicationForm">

                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Job Role</label>
                        <input type="text" name="job_role" id="job_role" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date Applied</label>
                        <input type="date" name="date_applied" id="date_applied" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Job Link</label>
                        <input type="text" name="link" id="link" class="form-control" placeholder="https://example.com/job">
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveApplicationBtn">Save</button>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#saveApplicationBtn").on("click", function() {

            let formData = $("#applicationForm").serialize();

            function validateForm() {
                let isValid = true;
                const companyname = document.getElementById('company_name').value.trim();
                const jobrole = document.getElementById('job_role').value.trim();
                const dateapplied = document.getElementById('date_applied').value.trim();
                const joblink = document.getElementById('link').value.trim();
                if (companyname === "" || jobrole === "" || dateapplied === "" || joblink === "") {

                    Swal.fire(
                        'Validation Error',
                        'All fields is required!',
                        'warning'
                    );
                    isValid = false;
                }
                return isValid;
            }

            if (validateForm()) {

                $.ajax({
                    url: "../backend/api/job_application_api.php",
                    type: "POST",
                    data: formData + "&action=create",
                    success: function(response) {

                        let res = response;

                        if (res.status === "success") {
                            Swal.fire(
                                'Success!',
                                'Job application added successfully.',
                                'success',
                            ).then(() => {
                                location.reload();
                            });

                        } else {
                            Swal.fire(
                                'Error!',
                                'Failed to add job application.',
                                'error' + res.message
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Ajax request failed.',
                            'error'
                        );
                    }
                });
            }
        });
    });
</script>