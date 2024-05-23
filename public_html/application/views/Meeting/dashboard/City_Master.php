<div class="container-fuid px-3">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                 <div class="col-md-12">
                        <h5 class="mt-4">Find City</h5>
                            <div class="my-2">
                                <lable for="County"> County </lable>
                             <Select id="get_country" class="form-control">
                                 <option value=" "> Select  Country</option>
                                 <?php
                                 foreach($City_Place_Country as $row){
                                     echo"<option value='".$row->country_name."'>".$row->country_name."</option>";
                                 }
                                 ?>
                             </Select>
                            </div>
                            <div class="my-2">
                            <lable for="City"> City</lable>
                            <input type="text" id="find_city" class="form-control">
                            
                            </div>
                        <button class="btn btn-danger"> Submit New City</button>
                 </div>
            </div>
          </div>
        
            <div class="col-md-6 mt-2" style="border-left:1px solid black">
                <div class="table-responsive">
                    <table class="table text-center" id="city_table">
                        <!-- Table header row -->
                        <tr class="bg-dark text-white">
                            <th>No</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                        <!-- Table data row -->
                    </table>
                </div>
            </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    // Add keyup event listener to the input field
    $("#find_city").keyup(function () {
        var get_country = $('#get_country').val();
        // Check if the input value has at least 3 characters
        if ($(this).val().length >= 2) {
            $.ajax({
                url: "<?php echo base_url()?>/Meeting/Admin/Settings/find_city",
                method: "GET",
                data: { city: $(this).val(), get_country: get_country },
                success: function (response) {
                    // Clear existing rows
                    $('#city_table').find("tr:gt(0)").remove();
                    // Parse the JSON response into a JavaScript object
                    var data = JSON.parse(response);
                    // Append new rows for each item in the response
                    $.each(data, function(index, item) {
                        var newRow = '<tr>' +
                            '<td><p>' + (index + 1) + '</p></td>' +
                            '<td><p>' + item.country_name + '</p></td>' +
                            '<td><p>' + item.city_name + '</p></td>' +
                            '<td>' +
                            '<a href="#" class="btn btn-warning btn-sm m-1 update-btn" data-id="' + item.id + '" data-name="'+  item.city_name +'" role="button" title="Information Update">' +
                            '<i class="fas fa-arrow-right"></i>' +
                            '</a>' +
                            '<a href="#" class="btn btn-warning btn-sm delete-btn"  data-id="' + item.id + '" role="button" title="Information Update">' +
                            '<i class="fa fa-trash"></i>' +
                            '</a>' +
                            '</td>' +
                            '</tr>';
                        $('#city_table').append(newRow);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                }
            });
        }
    });

    // Add click event listener to update buttons
    $(document).on("click", ".update-btn", function() {
        var cityId = $(this).data("id");
        var countryName = $(this).data("name");
        var updatedCityName = prompt("Enter updated '" + countryName + "' city name:", ""); // Example: prompt for updated city name

        // If user cancels or leaves input blank, do nothing
        if (!updatedCityName) return;

        // Here you can perform the AJAX request to update the city
        $.ajax({
            url: "<?php echo base_url()?>/Meeting/Admin/Settings/update_city",
            method: "POST",
            data: { id: cityId, city_name: updatedCityName }, // Pass the updated city name along with city ID
            success: function(response) {
                // Handle success response
                console.log("Update successful");
                 location.reload();
            },
            error: function(xhr, status, error) {
                console.error("Update failed:", status, error);
            }
        });
    });
    
    $(document).on("click", ".delete-btn", function() {
    var cityId = $(this).data("id");
    var confirmDelete = confirm("Are you sure you want to delete this city?");

    // If user cancels deletion, do nothing
    if (!confirmDelete) return;

    // Here you can perform the AJAX request to delete the city
    $.ajax({
        url: "<?php echo base_url()?>/Meeting/Admin/Settings/delete_city",
        method: "POST",
        data: { id: cityId },
        success: function(response) {
            // Handle success response
            console.log("Deletion successful");
             location.reload();
        },
        error: function(xhr, status, error) {
            console.error("Deletion failed:", status, error);
        }
    });
});

});
</script>
<script>
$(document).ready(function () {
    // Add click event listener to the "Submit New City" button
    $(".btn-danger").click(function () {
        // Get the values of the input fields
        var country = $('#get_country').val();
        var city = $('#find_city').val();

        // Check if the country and city fields are not empty
        if (country.trim() !== '' && city.trim() !== '') {
            // Perform AJAX request to insert data into the database
            $.ajax({
                url: "<?php echo base_url()?>/Meeting/Admin/Settings/insert_city",
                method: "POST",
                data: { country: country, city: city },
                success: function (response) {
                    // Handle success response
                    console.log("Insertion successful");
                    // Reload the page after successful insertion
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Insertion failed:", status, error);
                }
            });
        } else {
            alert("Please enter both country and city.");
        }
    });
});
</script>