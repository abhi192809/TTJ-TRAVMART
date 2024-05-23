    <div class="container-fluid">
        <div class="row mt-4">
             <div class="col-md-12">
                 <span  style="color:#2c3e50;border-bottom:1px solid #2c3e50"><h2>Employee Entry</h2></span>
             </div>  
               <form id="employeeForm">
            <div class="row mt-3">
            <div class="col-md-6">
                <lable >Photo</lable>
                <input type="file" name="Photo"  class="form-control" placeholder="Photo" required>
            </div>
            
            <div class="col-md-6">
                <lable> Name</lable>
                <input type="text"  name="Name" class="form-control" placeholder="Name" required>
            </div>
            
            </div>
            <div class="row mt-3">
            <div class="col-md-6">
                <lable>Employee Post</lable>
                <input type="text" name="Employ_Post" class="form-control" placeholder="Empaly Post" required>
            </div>
            <div class="col-md-6">
                <lable>Contact Number</lable>
                <input type="text" class="form-control" name="Contact_Number" placeholder="Contact Number" required>
            </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                <lable>Date Of Joining</lable>
                <input type="text" class="form-control" name="Date_of_Joining" placeholder="Date of joining" required>
            </div>
            <div class="col-md-6">
                <lable>Last Working Job</lable>
                <input type="text" class="form-control" name="Last_Working_job" placeholder="Last Working job" required>
            </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                <lable>Education id proof</lable>
                <input type="file" class="form-control" name="Education_id_Proof" placeholder="Date of joining" required>
            </div>
            <div class="col-md-6">
                <lable>Any  ID Prof</lable>
                <input type="file" name="ID_prof" class="form-control" placeholder="ID" required>
            </div>
            <div class="row mt-3">
            <div class='text-center my-3'> <small>That make User ID Password for Attendance </small></div>
            <div class="col-md-6">
                <lable>TTJ Mail ID</lable>
                <input type="text" name="mail_id" class="form-control" placeholder="abc@ttjtravmart.com" required>
            </div>
            <div class="col-md-6">
                <lable>Password</lable>
                <input type="Password" name="Password" class="form-control" placeholder="Password" required>
            </div>
            </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                <input type="Submit" name="Submit"  class="btn text-white" style="background:#2c3e50" value="Submit">
            </div>
            </div>
          </form>    
        </div>
    </div>
<script>
    $(document).ready(function () {
        // When the form is submitted
        $("#employeeForm").submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Create a FormData object to easily handle file uploads
            var formData = new FormData(this);

            // Make an AJAX request to your CodeIgniter controller
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Attendance/Employ_all_operations/insert", // Update this with the actual URL
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Handle the response from the server
                    console.log(response);

                    // Show a success popup using SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Employee data submitted successfully.',
                    });
                },
                error: function (error) {
                    // Handle any errors that occurred during the request
                    console.error("Error:", error);

                    // Show an error popup using SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while submitting the form.',
                    });
                }
            });
        });
    });
</script>