<div id="editApplication" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myEditApplicationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myEditApplicationLabel">Update Job Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="updateapplication">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company_name" id="edit_company_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Job Role</label>
                        <input type="text" name="job_role" id="edit_job_role" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date Applied</label>
                        <input type="date" name="date_applied" id="edit_date_applied" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Job Link</label>
                        <input type="text" name="link" id="edit_link" class="form-control" placeholder="https://example.com/job" required>
                    </div>

               
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
             </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $(document).on('click', '.edit-application', function() {
            var id = $(this).data('application-id');

            //fetch data using ajax
            $.ajax({
                type: "GET",
                url: "../backend/api/get_application.php",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(applicationData) {

                    $('#edit_id').val(applicationData.id);
                    $('#edit_company_name').val(applicationData.company_name);
                    $('#edit_job_role').val(applicationData.job_role);
                    $('#edit_date_applied').val(applicationData.date_applied);
                    $('#edit_link').val(applicationData.link);

                    //show the modal
                    $('#editApplication').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                    alert('Failed to fetch application data.');
                }


            });
        });


        //update application data
        $('#updateapplication').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "../backend/api/update_application.php",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.updated > 0) {
                        Swal.fire(
                            'Updated!',
                            'Job application updated successfully.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Info!',
                            'No changes were made to the application.',
                            'info'
                        );
                    }
                }
            });
        });
    });
</script>

 <!-- if (response.status === "success") {
                        Swal.fire("Updated!", response.message, "success").then(() => {
                            location.reload();
                        });
                    } else if (response.status === "info") {
                        Swal.fire("Info!", response.message, "info");
                    }  else {
                        Swal.fire("Error!", response.message, "error");
                    } -->