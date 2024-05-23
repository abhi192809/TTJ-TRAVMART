<div class="container-fluid">
    
    <form id="Addholidaydate">
        <div class="row mt-4">
            <div class="col-md-12">
                <h4 class="mx-2">Add Holiday</h4>
            </div>
            <div class="col-md-2">
                <input type="date" value="<?php echo Date('Y-m-d')?>" id="date" class="form-control" placeholder="Date">
            </div>
            <div class="col-md-2">
                <input type="text" value="<?php echo date('l')?>" id="day" class="form-control" placeholder="Day">
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo Date('F')?>" id="month" class="form-control" placeholder="Month">
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo Date('Y')?>" id="year" class="form-control" placeholder="Year">
            </div>
            <div class="col-md-2">
                <button class="btn text-white" name="holiday_leaves" style="background:#2c3e50">Add Holiday Data</button>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid my-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <h4 class="mx-2">See Data of Employee</h4>
        </div>
        <?php
            foreach($attendance_users as $data) {
            ?>
            <div class='col-md-4'>
                 <div class="p-4" style="color:black;box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                     <a class="h4"  href="<?php echo base_url()?>Attendance/Emplaydata/user/<?php 
echo md5(strtolower($data['User_name']));
?>
">
                     <?php echo $data['User_name'] ?>
                 </a>
                 </div>
            </div>
            <?php
            }
        ?>
    </div>
</div>



<script>
$(document).ready(function() {
    $("#Addholidaydate").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission
        // Get form data
        var day = $("#day").val();
        var month = $("#month").val();
        var year = $("#year").val();

        // Send AJAX request
        $.ajax({
            url: "<?php echo base_url('Attendance/AttendanceData/addHoliday'); ?>", // Adjust the URL to match your controller method
            type: "POST",
            data: { day: day, month: month, year: year },
            dataType: "json",
            success: function(response) {
                // Show success popup
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data inserted successfully!',
                });
            },
            error: function(xhr, status, error) {
                // Handle errors if needed
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
<script>
        $(document).ready(function() {
            // Function to update Day and Month when Date changes
            $('#date').on('input', function() {
                var selectedDate = new Date($(this).val());
                var day = selectedDate.toLocaleDateString('en-US', { weekday: 'long' });
                var month = selectedDate.toLocaleDateString('en-US', { month: 'long' });

                // Update Day and Month inputs
                $('#day').val(day);
                $('#month').val(month);
            });
        });
</script>
<script>
$(document).ready(function() {
    $("#applyFilter").click(function() {
        // Get the selected user from the dropdown
        var selectedUser = $("#userFilter").val();

        // Show or hide rows based on the selected user
        $("#attendanceTable tbody tr").each(function() {
            var rowUsername = $(this).data('username');

            if (selectedUser === '' || selectedUser === rowUsername) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
</script>

    