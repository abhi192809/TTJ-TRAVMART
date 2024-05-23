<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card px-5">  
        <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <h3>Image Folder Upload</h3>
                <form id="uploadForm" enctype="multipart/form-data">
                    <input type="file" name="zip_file" id="zip_file" class="form-control" accept=".zip" />
                    <br>
                    <button type="button" id="uploadBtn" class=" text-white form-control" style="background:#2c3e50">Upload Folder</button>
                </form>
            </div>
        </div>
              <form id="galleryForm"  method="post" enctype="multipart/form-data">
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <h4>Select File</h4>
                    <select class="form-control" name="gallery_file_id">
                         <option>Select Image File </option>
                        <?php
                        
 $config = mysqli_connect('localhost','u125051193_ttj','Ahishek@123','u125051193_ttj');
                            if (!$config) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            
                            // SQL query
                            $sql = "SELECT `id`, `file_name` FROM `gallery_file`";
                            
                            // Execute the query
                            $result = mysqli_query($config, $sql);
                            
                            // Check for errors
                            if (!$result) {
                                die("Error in SQL query: " . mysqli_error($config));
                            }
                            
                            // Fetch and print the results
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['id']}'>{$row['file_name']}</option>";
                            }
                            
                            // Close the connection
                         
                            
                            ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <h4 class="my-2">File Name</h4>
                    <input type="text" class="form-control" name="file_name">
                </div>
                <div class="col-md-6">
                    <h4 class="my-2">Year</h4>
                    <input type="text" value="<?php echo date("Y"); ?>" class="form-control" name="year">
                </div>
                <div class="col-md-6">
                    <h4 class="my-2">Images</h4>
                    <input type="file" class="form-control" name="image_upload">
                </div>
                <div class="col-md-6">
                    <h4 class="my-2">Name</h4>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-6">
                    <h4 class="my-2">Date</h4>
                    <input type="date" class="form-control" name="entry_date">
                </div>
                <div class="col-md-12 mt-3">
                    <button type="button" id="submitBtn" class="btn text-white" style="background:#2c3e50">Submit</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
<script>
    $(document).ready(function () {
    $('#uploadBtn').on('click', function () {
        var formData = new FormData($('#uploadForm')[0]);

        $.ajax({
            url: '<?php echo base_url();?>Attendance/Gallery/processUpload',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status === 'success') {
                    // Show success popup
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    }).then(function () {
                        // Reload the page
                        location.reload();
                    });
                } else {
                    // Show error popup
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error: ' + response.message,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function () {
                // Show error popup
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error uploading file.',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
$(document).ready(function () {
    $('#submitBtn').on('click', function () {
        // Gather form data
        var formData = new FormData($('#galleryForm')[0]);

        // Make AJAX request to insert data
        $.ajax({
            url: '<?php echo base_url();?>Attendance/Gallery/insertGalleryData',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status === 'success') {
                    // Show success popup
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    }).then(function () {
                        // Clear form fields
                        $('#galleryForm')[0].reset();
                        // Reload the page
                        location.reload();
                    });
                } else {
                    // Show error popup
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error: ' + response.message,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function () {
                // Show error popup
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error submitting form.',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

</script>