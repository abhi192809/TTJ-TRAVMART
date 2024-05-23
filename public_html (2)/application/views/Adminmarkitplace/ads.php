<style>
 #loader-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        z-index: 9999;
        backdrop-filter: blur(10px); /* Apply a blur effect to the background */
    }

    #loader {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        z-index: 10000;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>
     <div id="loader-overlay">
        <div id="loader"></div>
    </div>
    <form method="POST"   id="uploadForm" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="my-3"><span style="border-bottom:1px solid black">Ads</span></h4>
                </div>
                
                <div class="col-md-6">
                    <label>Place</label>
                    <select name="city_id" class="form-control">
                        <option>Select place</option>
                        <?php foreach($city as $row):?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['City_filter']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                 <div class="col-md-6">
                    <label>Company name</label>
                    <input name="Add_company" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Date To Start</label>
                    <input name="starting_time" type="date" class="form-control">
                </div>
                
                <div class="col-md-6">
                    <label>Date To End</label>
                    <input name="End_time" type="date" class="form-control">
                </div>
                
                <div class="col-md-6">
                    <label>Time Slot Start</label>
                    <input name="Time_Slot" type="time" class="form-control">
                </div>
                
                <div class="col-md-6">
                    <label>Time Slot End</label>
                    <input name="End_Slot" type="time" class="form-control">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <label class="mx-2">Ads</label>
                    <input name="ads" type="file" class="form-control">
                </div>
            </div>

            <div class="row mt-4 px-2">
                <input type="submit" class="btn btn-success"  onclick="submitForm()" value="Submit Ads">
            </div>
        </div>
    </form>

<script>
$(document).ready(function() {
    $('#uploadForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
      var formData = new FormData($('#uploadForm')[0]);
  $('#loader-overlay').show();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>Admin/ads/addads',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
             $('#loader-overlay').hide();
           if (response.includes('File uploaded successfully')) {
                    // Show a success pop-up
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'File uploaded successfully!',
                    });
                } else {
                    // Handle other cases if needed
                    console.log(response);
                }
        },
       
    });    
    });
});
</script>
