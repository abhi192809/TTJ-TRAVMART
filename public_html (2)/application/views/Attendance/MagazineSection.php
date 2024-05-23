<div class="controler-fluid">
    <div class="row">
         <div class="col-md-12">
            <h4 class="mx-2 mt-3">Upload Magazine</h4>
         </div>
    </div>
   <form id="uploadForm">
    <div class="row mx-2">
        <div class="col-md-12 p-2">
            <label for="Magazin_images">File Cover page</label>
            <input type="file" id="Magazin_images" name="Magazin_images" class="form-control">
        </div>
        <div class="col-md-12 p-2">
            <label for="Magazin_pdf">Magazine PDF File</label>
            <input type="file" id="Magazin_pdf" name="Magazin_pdf" class="form-control">
        </div>
        <div class="col-md-12 p-2">
            <label for="Magazin_Date">Date</label>
            <input type="date" id="Magazin_Date" name="Magazin_Date" class="form-control">
        </div>
        <div class="col-md-12 p-2">
            <label for="Magazin_Text">Text</label>
            <input type="text" id="Magazin_Text" name="Magazin_Text" class="form-control">
        </div>
        <div class="col-md-12 p-2">
            <button type="button" id="Submit" class="form-control btn text-white" style="background:#2c3e50">Submit</button>
        </div>
    </div>
</form>

</div>

<div class="controler-fluid">
    <div  class="row">
         <div class="col-md-12">
             <h3 class='mx-3 mt-2 mb-3'> All Data</h3>
         </div>
    </div>
    <div class="row mx-2">
         <?php foreach($data as $row):?>
         <div class="col-md-4 text-center">
             <a href="<?php echo base_url();?>assets/magazine/<?php echo $row['Magazin_pdf']; ?>" target="_blank"><img src="<?php echo base_url();?>/assets/magazine/<?php echo $row['Magazin_images']; ?>"  width="50%"></a>
             <h4> <?php echo $row['Magazin_Date']?></h4>
         </div>
         <?php endforeach;?>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#Submit").on("click", function() {
        submitForm();
    });
});

function submitForm() {
    // Serialize the form data
    var formData = new FormData($("#uploadForm")[0]);

    // Use AJAX to submit the form data
    $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>Attendance/MagazineSection/insertdata",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);

            // Show the success message using SweetAlert2
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data inserted successfully.',
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>
