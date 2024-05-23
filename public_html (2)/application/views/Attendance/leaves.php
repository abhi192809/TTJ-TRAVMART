<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php if($this->session->userdata('user_data')['username'] != 'Admin'){
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 pt-3">
            <h5 class="p-2">Apply For Leaves</h5>
            <label class="p-2">Name</label>
           <input type="text" name="Name" class="form-control" value="<?php echo $this->session->userdata('user_data')['username']; ?>" readonly>
            <label class="p-2">Date</label>
           <input type="text" name="Date" class="form-control"  >
            <label class="p-2">Subject</label>
            <input type="text" name="Subject" class="form-control">
            <label class="p-2">Text</label>
            <textarea name="Text" rows="10" cols="140" class="form-control"></textarea>
            <br>
            <button type="button" onclick="submitForm()" style="background-color:#2c3e50;color:white" class="form-control">Submit</button>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        var name = $('input[name="Name"]').val();
        var subject = $('input[name="Subject"]').val();
        var text = $('textarea[name="Text"]').val();
        var Dateleaves = $('input[name="Date"]').val();
        // Perform AJAX request to submit the form data
        $.ajax({
            type: 'POST', // Change the method as needed
            url: '<?php echo base_url();?>Attendance/Leaves/Submit_leaves', 
            data: {
                Name: name,
                Subject: subject,
                 Dateleaves: Dateleaves,
                Text: text
            },
            success: function(response) {
              if (response == '1') {
                    // Use SweetAlert2 for success popup
                    Swal.fire({
                        icon: 'success',
                        title: 'Leave submitted successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    // Use SweetAlert2 for error popup
                    Swal.fire({
                        icon: 'error',
                        title: 'Error submitting leave. Please try again.',
                        showConfirmButton: true
                    });
                }
            },
            error: function(error) {
                // Handle errors, if any
                console.error(error);
            }
        });
    }
</script>
<?php
}?>



<!--Admin-->
<?php 
 if($this->session->userdata('user_data')['username'] == 'Admin'){
 ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h5 class="mt-5">Leaves Status</h5>
        </div>
        <div class="col-md-12">
            <table width="100%"  id="leaves-table-container">
                <tr>
                    <th class="border">Name</th>
                    <th class="border">Subject</th>
                    <th class="border">Date</th>
                    <th class="border">Status</th>
                </tr>
                <?php foreach ($leaves as $row): ?>
                    <tr>
                        <td class="border"><?php echo $row['Name']; ?></td>
                        <td class="border"><?php echo $row['Subject']; ?></td>
                        <td class="border"><?php echo $row['Date']; ?></td>
                        <td class="border" data-date="<?php echo $row['Date'] ?>" data-name="<?php echo $row['Name'] ?>">

                            <?php
                                if($row['Status'] == '1'){
                                    ?>
                                    <button class="btn text-white btn-non-approved" style="background:green"><i class="fa fa-check" aria-hidden="true"></i></button>
                                    <?php
                                } elseif ($row['Status'] == '0' || $row['Status'] == '2') {
                                    ?>
                                    <button class="btn text-white   btn-approved" style="background:red"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <?php
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<script>
// Event listener for the "Approved" button
$(document).on('click', '.btn-approved', function() {
    var date = $(this).parent().data('date');
    var name = $(this).parent().data('name');

    // Log values to the console for verification
    console.log("Date:", date);
    console.log("Name:", name);

    // Perform AJAX request to update leave status to "Approved"
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>Attendance/Leaves/Approved',
        data: {
            date: date,
            name: name,
            status: '1'
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Leaves Approved',
            });
         location.reload();
        },
        error: function(error) {
            // Handle errors, if any
            console.error(error);
        }
    });
});

// Event listener for the "Non-Approved" button
$(document).on('click', '.btn-non-approved', function() {
    var date = $(this).parent().data('date');
    var name = $(this).parent().data('name');

    // Log values to the console for verification
    console.log("Date:", date);
    console.log("Name:", name);

    // Perform AJAX request to update leave status to "Non-Approved"
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>Attendance/Leaves/Approved',
        data: {
            date: date,
            name: name,
            status: '0'
        },
        success: function(response) {
            // Reload the leaves status table after successful update
            Swal.fire({
                icon: 'success',
                title: 'Non Approved',
            });
               location.reload();
        },
        error: function(error) {
            // Handle errors, if any
            console.error(error);
        }
    });
});

</script>
<?php } ?>
