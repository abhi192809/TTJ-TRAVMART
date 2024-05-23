<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
           <h4 class="my-3"><spam style="border-bottom:1px solid black"> User Permition</spam></h4>
        </div>
    </div>
    <div class="row border mx-2">
        <div class="col-md-6 pt-4">
            <lable>User Name</lable>
            <select class="form-control" name="users">
                <?php foreach($users as $row): if($row['Email'] != 'Admin'){ ?>
                <option value="<?php echo $row['id']?> "> <?php echo $row['User_name']?> </option>
                <?php } endforeach;?>
            </select>
            <br><small>After Select checkbox Then Submit the button</small><br>
            <button class="btn btn-success mt-4" id="countCheckboxesBtn">Give Permission</button>
        </div>
        <div class="col-md-6 pt-4 text-center border">
            <p class="border-bottom pb-2">All Manu</p>
            <div class="row">
            <?php foreach($Manuprofile as $row): 
                ?>
                <div class="col-md-12">
                       <p><input type="checkbox" class="myCheckbox" data-meta="<?php echo $row['id'] ?>"><?php echo $row['manu'] ?> </p>
                </div>
                <?php

            endforeach; 
            ?>
            </div>
        </div>
        
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#countCheckboxesBtn').on('click', function() {
            var select = $('select[name="users"]').val();
            var selectedCheckboxes = $('.myCheckbox:checked');
            
            // Create an array to store selected checkbox values
            var selectedValues = [];

            selectedCheckboxes.each(function() {
                var metaValue = $(this).data('meta');
                selectedValues.push(metaValue);
            });

            // Send data to the server using AJAX
            $.ajax({
                url: '<?php echo base_url();?>Attendance/Manupermition/insertPremition',
                method: 'POST',
                data: {
                    users: select,
                    selectedCheckboxes: selectedValues
                },
                success: function(response) {
                    // Handle the response if needed
                    console.log(response);
 $('.myCheckbox').prop('checked', false);
                    // Show SweetAlert success pop-up
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data has been successfully saved.',
                    });
                }
            });
        });
    });
</script>