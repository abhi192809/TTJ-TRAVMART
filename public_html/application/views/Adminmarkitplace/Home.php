<div class="container-fluid">
    <div class="row">
        <div id="ok" class="mt-2"></div>
        <div class="filter mt-2">
            <select class="form-control "  name="select" id="select_value">
                <option value="NULL">Select India or International Filer </option>
                <option value="1"> India </option>
                <option value="2"> International </option>
            </select>
            <input type="submit" value="GO" class="btn" id="click_value" style="color:white;background:dimgrey">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row id_on">
        <?php foreach($city as $row):?>
            <div class="col-md-2 col-sm-2 col-12">
             <a href=""><i class="fa fa-link" aria-hidden="true"></i></a>
             <div class="p-4 m-2"style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
            <?php echo $row['City_filter'];?>
             </div>
            </div>
        <?php endforeach ;?>
    </div>
</div>
<script>
   $(document).ready(function(){
    $("#click_value").click(function(){
        var value = $("#select_value").val();
        if(value != 'NULL'){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Admin/Home/Cityid",
                data: {value: value},
                dataType: 'json', // Specify the expected response type
                success: function(data){
                    // Handle successful response
                     var htmlContent = "";
                    // Iterate over each entry in the data array
                    data.forEach(function(value, index) {
                        // Append the HTML content for each entry
                        htmlContent += `
                            <div class="col-md-2 col-sm-2 col-12">
                                <div class="p-4 m-2" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                                    ${value.City_filter}
                                </div>
                            </div>
                        `;
                    });
                
                    // Set the accumulated HTML content to the .id_on element
                    $(".id_on").html(htmlContent);


                    // Display a success message
                    var alertMessage = '<div class="alert alert-success" role="alert" style="display: none;">See Your Result</div>';
                    $('#ok').html(alertMessage);
                    $('#ok .alert').fadeIn(1000, function() {
                        setTimeout(function(){
                            $('#ok .alert').fadeOut(1000);
                        }, 2000);
                    });
                },
                error: function(error){
                    // Handle errors
                    console.log("Error: ", error);
                }
            });
        } else {
            // Display a message if 'value' is NULL
            var alertMessage = '<div class="alert alert-primary" role="alert" style="display: none;">Please select Any One.</div>';
            $('#ok').html(alertMessage);
            $('#ok .alert').fadeIn(1000, function() {
                setTimeout(function(){
                    $('#ok .alert').fadeOut(1000);
                }, 2000);
            });
        }
    });
});

</script>
