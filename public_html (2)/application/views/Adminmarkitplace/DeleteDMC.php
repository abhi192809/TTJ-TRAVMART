<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="my-3"><span style="border-bottom:1px solid black">Delete DMC </span></h4>
    </div>
    <div class="row end_text">
        <div class="col-md-11 mt-3 mb-3">
            <select id="select_value" class="form-select" >
                <option>Select an option</option>
                <?php foreach ($Accommodation_get as $value) :?>
                    <option value="<?php echo $value['id']?>"><?php echo $value['City_filter']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-md-1 mt-3 mb-3"><button class="btn text-white" style="background:dimgrey" id="Go">GO</button></div>
        <div class="col-md-3 mt-3 mb-3"><button class="btn text-white" style="background:dimgrey" id="save_data">Update Accommodation</button></div>
        
        <div class="col-md-12">
            <div class="row appandvalue">
                    
            </div>
        </div>
    </div>
</div>

<script>
 $(document).ready(function(){
    // Event handler for the "#Go" button click
    $("#Go").click(function(){
        var demo = $("#select_value").val();

        $.ajax({
            url: '<?php echo base_url("Admin/DMC/Showaccomodationentry"); ?>',
            type: 'POST',
            data: {data: demo},
            dataType: 'json',
            success: function (response) {
                // Check if the response is an array and has elements
                if (Array.isArray(response) && response.length > 0) {
                    var data = '';

                    // Iterate over the response
                    $.each(response, function (index, value) {
                        // Check if at least one of the fields is not empty
                        if (value.name !== '' || value.address !== '' || value.number !== '') {
                            data += `
                                <div class="row">
                                    <div class="col-md-2 my-3">
                                        <label class="mx-1">Company Name</label>
                                        <input type="text" class="form-control company-name" placeholder="Company Name" value="${value.name}" readonly>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <label class="mx-1">Address</label>
                                        <input type="text" class="form-control address" placeholder="Address" value="${value.address}" readonly>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <label class="mx-1">Number</label>
                                        <input type="text" class="form-control number" placeholder="Number" value="${value.number}" readonly>
                                        <input type="hidden" class="id" value="${value.id}">
                                    </div>
                                    <div class="col-md-2 my-3">
                                        <button data-meta="${value.id}" class="btn btn-danger delete-button mt-4">Delete</button>
                                    </div>
                                </div>`;
                        }
                    });

                    // Update the HTML with the constructed data
                    $(".appandvalue").html(data);
                } else {
                    // Handle the case where the response is empty or not an array
                    $(".appandvalue").html('<p>No data found.</p>');
                }
            },
            error: function (error) {
                console.error(error);
                // Handle error, show an error message to the user
            }
        });
    });

    // Event handler for delete button click
    $(document).on("click", ".delete-button", function () {
        var entryId = $(this).data("meta");

        $.ajax({
            url: '<?php echo base_url("Admin/DeleteDMC/Removeentry"); ?>',
            type: 'POST',
            data: { id: entryId },
            success: function (response) {
                if (response == '1') {
                    // Success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data Deleted successfully!',
                    });

                    // Remove the deleted entry from the UI
                    $(`[data-meta="${entryId}"]`).closest(".row").remove();
                } else {
                    // Error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to delete data!',
                    });
                }
            },
            error: function (error) {
                console.error(error);
                // Handle error, show an error message to the user
            }
        });
    });
});

</script>
