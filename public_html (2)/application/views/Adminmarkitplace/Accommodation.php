<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="my-3"><spam style="border-bottom:1px solid black">Accommodation</spam></h4>
    </div>
    <div class="row end_text">
        <div class="col-md-10 mt-3 mb-3">
            <select id="select_value" class="form-select" >
                <option >Select an option</option>
                <?php foreach ($Accommodation_get as $value) :?>
                <option value="<?php echo  $value['id']?>"><?php echo  $value['City_filter']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-md-2 mt-3 mb-3"><button class="btn text-white" style="background:dimgrey" id="appand_input">Add Input Field</button></div>
        <div class="col-md-2 mt-3 mb-3"><button class="btn text-white" style="background:dimgrey" id="save_data">Add Accommodation</button></div>
        <div class="col-md-12">
            <div class="row appandvalue">
                    
            </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function(){
      $("#appand_input").click(function(){
          var data = `<div class="col-md-4 my-3">
                         <lable class="mx-1">Company Name</lable>
                         <input typle="text" class="form-control company-name" placeholder="Company Name">
                    </div>
                    <div class="col-md-4 my-3">
                         <lable class="mx-1">Address</lable>
                         <input typle="text" class="form-control address" placeholder="Address">
                    </div>
                    <div class="col-md-4 my-3">
                         <lable class="mx-1">Number</lable>
                         <input typle="text" class="form-control number" placeholder="Number">
                    </div>`;
        $(".appandvalue").append(data);
      });
      $("#save_data").click(function () {
        var selectedValue = $("#select_value").val();
    
        var inputData = [];
    
        $(".appandvalue > div").each(function () {
            var company_name = $(this).find(".company-name").val();
            var address = $(this).next().find(".address").val();
            var number = $(this).next().next().find(".number").val();
    
            if (company_name !== null || address !== null || number !== null) {
                inputData.push({
                    company_name: company_name,
                    address: address,
                    number: number,
                });
            }
        });
    
        $.ajax({
            url: '<?php echo base_url("Admin/Accommodation/saveFormData"); ?>',
            type: 'POST',
            data: { data: inputData, select: selectedValue },
            dataType: 'json',
            success: function (response) {
                 Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data saved successfully!',
            });
            $(".appandvalue").append().html(" ");
                // Handle success, maybe show a message to the user
            },
            error: function (error) {
                console.error(error);
                // Handle error, show an error message to the user
            }
        });
    });

    });
</script>