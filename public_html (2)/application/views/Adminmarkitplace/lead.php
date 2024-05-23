<div class="container-fluid">
    <div class="row">
        <div id="ok" class="mt-2"></div>
        <div class="filter mt-2">
            <input class="form-control"  name="select" id="select_value" typle="text">
        </div>
    </div>
    <div class=" text-end mt-3">
        <!--<button class="btn  btn-success" id="download_button">Downalod The mail Data</button>-->
    </div>
</div>
<div class="container-fluid">
    <div class="row id_on">
        <?php foreach($mail as $row):?>
            <div class="col-md-4 col-sm-4 col-12">
             <a href=""><i class="fa fa-link" aria-hidden="true"></i></a>
             <div class="p-4 m-2"style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
            <?php echo $row['mail'];?>
             </div>
            </div>
        <?php endforeach ;?>
    </div>
</div>
<script>
  $(document).ready(function () {
    // Attach the change event handler to the input element
    $('#select_value').on('keyup', function () {
        // Get the input value
        var inputValue = $(this).val();

        // Make an AJAX request
        $.ajax({
            url: '<?php echo base_url()?>Admin/Lead/get_mail',
            method: 'POST',
            data: { value: inputValue },
            success: function (response) {
                console.log('Complete AJAX Response:', response); // Log the complete response for debugging

                // Clear existing content in the id_on row
                $('.id_on').empty();

                // Check if response.mail is an array
                if (Array.isArray(response.mail)) {
                    // Append new content to the id_on row
                    $.each(response.mail, function (index, row) {
                        var newHtml = '<div class="col-md-4 col-sm-4 col-12">' +
                            '<a href=""><i class="fa fa-link" aria-hidden="true"></i></a>' +
                            '<div class="p-4 m-2" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">' +
                            row.mail +
                            '</div>' +
                            '</div>';
                        $('.id_on').append(newHtml);
                    });
                } else {
                    console.error('Invalid response format. Expected an array.');
                }
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });
});

$(document).ready(function () {
    // Attach the click event handler to the download button
    $('#download_button').on('click', function () {
        // Make an AJAX request to trigger the download
        $.ajax({
            url: '<?php echo base_url()?>Admin/Lead/download_csv',
            method: 'GET',
            success: function (response) {
                // Handle success if needed
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
