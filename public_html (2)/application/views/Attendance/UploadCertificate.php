<form id="myForm">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <lable>Name</lable>
            <input class="form-control" type="text" name="name">
            <lable>Company Name</lable>
            <input class="form-control" type="text" name="Company Name">
            <lable>Upload Certificate </lable>
            <input class="form-control" type="File" name="File">
            <br>
            <button class="btn text-white" style="background:#2c3e50"  name="File">Submit</button>
      
        </div>
    </div>
</div>
</form>
<script>
    $(document).ready(function () {
        $('#myForm').submit(function (e) {
            e.preventDefault(); // Prevent default form submission

            // Gather form data
            var formData = new FormData(this);

            // Send Ajax request
            $.ajax({
                url: '<?php echo base_url()?>Attendance/UploadCertificate/insertcertificate', // Replace with your server endpoint
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Show success pop-up
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Your form has been submitted successfully.',
                    });

                    // You can also redirect the user or perform other actions if needed

                    console.log(response);
                },
                error: function (error) {
                    // Handle error
                    console.error(error);
                }
            });
        });
    });
</script>
