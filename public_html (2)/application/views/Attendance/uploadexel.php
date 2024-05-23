<form id="uploadexel">
    <div class="container-fluid">
    <h4 class="p-1">Upload Event Exel Data </h4>
      <div class="row">
          <div class="col-md-12 p-2">
              <lable>Upload Exel Event Data</lable>
              <input class="form-control" type="file" name="Upload_Exel_File">
          </div>
          <div class="col-md-12 p-2">
              <lable>Event Name</lable>
              <input class="form-control" type="name" name="Exel_Name">
          </div>
          
          <div class="col-md-12 p-2">
              <lable>Event Date</lable>
              <input class="form-control" type="date" name="Event_Date">
          </div>
          
          <div class="col-md-12 p-2">
              <button class="btn" style="color:white;background:#2c3e50">Submit</button>
          </div>
      </div>
</div>

</form>
<script>
    $(document).ready(function() {
        $('#uploadexel').submit(function(e) {
            e.preventDefault();

            // Create a FormData object to handle file uploads
            var formData = new FormData(this);

            $.ajax({
                url: '<?php echo site_url("Attendance/UploadExel/uploadExeldata"); ?>',
                type: 'post',
                data: formData,
                dataType: 'json',
                processData: false,  // Important: tell jQuery not to process the data
                contentType: false,  // Important: tell jQuery not to set contentType
                success: function(response) {
                    if (response == 1) {
                        alert('Form submitted successfully!');
                        // You can redirect or perform other actions upon success
                    } else {
                        alert('Failed to submit form!');
                    }
                },
                error: function() {
                    alert('Error submitting form!');
                }
            });
        });
    });
</script>
