<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="my-3"><span style="border-bottom:1px solid black">DMC / Tour</span></h4>
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
        $("#Go").click(function(){
            var demo = $("#select_value").val();
            console.log(demo);

            var data =` `;

            $.ajax({
                url: '<?php echo base_url("Admin/DMC/Showaccomodationentry"); ?>',
                type: 'POST',
                data: {data: demo},
                dataType: 'json',
                success: function (response) {
                    // Iterate over the response
                    $.each(response, function (index, value) {
                            // Check if at least one of the fields is not empty
                            if (value.name !== '' || value.address !== '' || value.number !== '') {
                                data += `
                                    <div class="col-md-4 my-3">
                                        <label class="mx-1">Company Name</label>
                                        <input type="text" class="form-control company-name"  placeholder="Company Name" value="${value.name}">
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <label class="mx-1">Address</label>
                                        <input type="text" class="form-control address" placeholder="Address" value="${value.address}">
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <label class="mx-1">Number</label>
                                        <input type="text" class="form-control number" placeholder="Number" value="${value.number}">
                                        <input type="hidden" class="id"  value="${value.id}">
                                    </div>
                                `;
                            }
                        
                    });
                    // Now 'data' contains the updated HTML based on the response data
                    $(".appandvalue").html(data);
                },
                error: function (error) {
                    console.error(error);
                    // Handle error, show an error message to the user
                }
            });
        });
        
        $("#save_data").click(function () {
    var inputData = [];

    $(".appandvalue > div").each(function () {
        var company_name = $(this).find(".company-name").val();
        var address = $(this).next().find(".address").val();
        var number = $(this).next().next().find(".number").val();
        var id = $(this).next().next().find(".id").val();
        

        if (company_name !== null || address !== null || number !== null) {
            inputData.push({
                company_name: company_name,
                address: address,
                number: number,
                company_id: id
            });
        }
    });

    $.ajax({
        url: '<?php echo base_url("Admin/DMC/UpdateDMCData"); ?>',
        type: 'POST',
        data: { data: inputData },
        success: function (response) {
            if(response == '1'){
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data Updated successfully!',
            });
        }
            $(".appandvalue").append().html(" ");
        },
        error: function (error) {
            console.error(error);
            // Handle error, show an error message to the user
        }
    });
});

    });
</script>
