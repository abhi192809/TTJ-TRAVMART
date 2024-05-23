<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form id="myForm" enctype="multipart/form-data"> <!-- Important: Set enctype to allow file uploads -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <label class="mx-1 my-2">Email ID</label>
                <input type="text" name="Name" value="<?php echo $this->session->userdata('user_data')['username'] ?? ''; ?>" class="form-control" readonly>
                
                <label class="mx-1 my-2">File upload</label>
                <input type="file" name="File_Upload" class="form-control" > <!-- Input type changed to file for file upload -->
                
                <label class="mx-1 my-2">Report</label>
                <textarea name="point_4" class="form-control"></textarea>
                <br>
                <button type="button" id="submitBtn" style="background: rgb(44, 62, 80); cursor: pointer;" class="form-control btn text-white mt">Submit</button>
            </div>
        </div>
    </div>
</form>

<script>
    CKEDITOR.replace('point_4');

    $(document).ready(function () {
        $("#submitBtn").click(function () {
            var formData = new FormData($("#myForm")[0]);
            formData.append('point_4', CKEDITOR.instances.point_4.getData());

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Attendance/Workreport/submit_form'); ?>",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json', // Specify dataType as JSON
                success: function (response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Reload the page after successful submission
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while processing the form.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
