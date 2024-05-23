
<div class="container-fluid">
    <!--<?php print_r($events)?>-->
    <form method="POST" action="<?php echo base_url();?>Attendance/Event/downloadTableData">
    <div class="row mt-3">
        <div class="col-md-10">
            <select name="Business_Category" id="business_category" class="form-control" required="" fdprocessedid="2x02c">
                <option value="">Select Your Business Category</option>
                <option value="All">All</option>
                <option value="B2B">B2B</option>
                <option value="B2C">B2C</option>
                <option value="B2B &amp; B2C">B2B &amp; B2C</option>
                <option value="MICE">Wedding Planner</option>
                <option value="MICE">Event Planner</option>
                <option value="MICE">Corporates</option>
       
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn text-white" style="background:#2c3e50" id="downloadCsvButton">Filter Download</button>
        </div>
    </div>
</form>
    <div class="row ">
        
        <div class="col-md-2 py-2">
            <span id="b2bCount" class="mx-1">All: <?php echo $All ?> </span>
        </div>
        <div class="col-md-2 py-2">
            <span id="b2bCount" class="mx-1">Number of B2B: <?php echo $B2B ?> </span>
        </div>
        <div class="col-md-2 py-2">
        <spam id="b2cCount"  class="mx-1">Number of B2C: <?php echo $B2C ?> </spam>
            
        </div>
        <div class="col-md-2 py-2">
        <spam id="b2bAndB2cCount"  class="mx-1"> Local <?php echo $inplace ?> </spam>
        </div>
        
        <div class="col-md-2 py-2">
        <spam id="b2bAndB2cCount"  class="mx-1">Out Station <?php echo $outplace ?> </spam>
        </div>
    </div>
    <div class="row data px-2">
        <div class="col-12">
            <div class="table-responsive overflow-x-auto">
                <table class="table table-bordered mt-2" style="width: 310%;">
                    <tr>
                         <th>So.No</th>
                        <th>Edit</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Your Company Name</th>
                        <th>Nature of Business</th>
                        <th>Business Category</th>
                        <th>Company Address</th>
                        <th>City</th>
                        <th>Pin Code</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Annual Turnover</th>
                        <th>Year Commencement</th>
                        <th>Destinations</th>
                        <th>Trade Associations</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $i = '1';
                    foreach ($events as $row) {
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td> <i class="fas fa-edit" data-meta=\'' . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . '\'></i></td>';
                        echo '<td>' . $row->Name . '</td>';
                        echo '<td>' . $row->Designation . '</td>';
                        echo '<td>' . $row->Your_Company_Name . '</td>';
                        echo '<td>' . $row->Nature_of_Business . '</td>';
                        echo '<td>' . $row->Business_Category . '</td>';
                        echo '<td>' . $row->Company_Address . '</td>';
                        echo '<td>' . $row->City . '</td>';
                        echo '<td>' . $row->Pin_Code . '</td>';
                        echo '<td>' . $row->Email . '</td>';
                        echo '<td>' . $row->Mobile_Number . '</td>';
                        echo '<td>' . $row->Annual_Turnover . '</td>';
                        echo '<td>' . $row->Year_Commencement . '</td>';
                        echo '<td>' . $row->Destinations . '</td>';
                        echo '<td>' . $row->Trade_Associations . '</td>';
                        echo '<td><i class="fas fa-trash" data-meta="'.$row->id.'"></i><td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal for Details -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <form id="updateForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Update</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detailsModalBody">
                <!-- Details of the selected row will be displayed here -->
            </div>
        </div>
    </div>
    </form>
</div>
<script>
$(document).ready(function () {
    
    $('.close').click( function(){
        
        $('#detailsModal').modal('hide');
    });
    
    $('.fa-edit').on('click', function () {
        var rowData = $(this).data('meta');
        // Populate modal with details
        populateModal(rowData);
        // Show the modal
        $('#detailsModal').modal('show');
    });

    var updatedFormData = {}; // Object to store updated form data

    function populateModal(rowData) {
        var modalBody = $('#detailsModalBody');
        modalBody.empty(); // Clear previous content

        // Add details to the modal body and update the object
        addFormField('id', rowData.id, true);
        addFormField('Name', rowData.Name);
        addFormField('Designation', rowData.Designation);
        addFormField('Your_Company_Name', rowData.Your_Company_Name);
        addFormField('Nature_of_Business', rowData.Nature_of_Business);
        addFormField('Business_Category', rowData.Business_Category);
        addFormField('Company_Address', rowData.Company_Address);
        addFormField('City', rowData.City);
        addFormField('Pin_Code', rowData.Pin_Code);
        addFormField('Email', rowData.Email);
        addFormField('Mobile_Number', rowData.Mobile_Number);
        addFormField('Annual_Turnover', rowData.Annual_Turnover);
        addFormField('Year_Commencement', rowData.Year_Commencement);
        addFormField('Destinations', rowData.Destinations);
        addFormField('Trade_Associations', rowData.Trade_Associations);

        modalBody.append('<button type="button" class="btn btn-primary" id="updateButton">Update</button>');

        // Attach event listeners to update the object when input fields change
        $('.form-control').on('input', function () {
            var fieldName = $(this).attr('name');
            var fieldValue = $(this).val();
            updatedFormData[fieldName] = fieldValue;
        });
    }

    function addFormField(name, value, hidden = false) {
        updatedFormData[name] = value; // Update the object with the form field
        var modalBody = $('#detailsModalBody');
        if (hidden) {
            modalBody.append('<input type="hidden" name="' + name + '" value="' + value + '">');
        } else {
            modalBody.append('<div class="mb-3"><label for="' + name + 'Input" class="form-label">' + name + '</label><input type="text" class="form-control" id="' + name + 'Input" name="' + name + '" value="' + value + '"></div>');
        }
    }
});
$(document).on('click', '#updateButton', function (e) {
    e.preventDefault();

    // Collect form data manually
    var formData = $('#updateForm').serialize();

    // Send an Ajax request to the server for updating data
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>Attendance/ResentEvent/updateDataAjax',
        data: formData,
        dataType: 'json',
        success: function (response) {
            // Check if the update was successful
            if (response == '1') {
                // Show success pop-up using SweetAlert2
                Swal.fire({
                    icon: 'success',
                    title: 'Updated!',
                    text: 'The data has been updated successfully.',
                }).then((result) => {
                    // Reload the page
                    location.reload();
                });
            } else {
                // Handle other cases (e.g., display an error message)
                console.error('Error updating data:', response.status);
            }
        },
        error: function () {
            // Handle error
            console.error('Error updating data.');
        }
    });
});
    $(document).ready(function () {
        $('.fa-trash').on('click', function () {
            // Get the ID from the data attribute
            var id = $(this).data('meta');

            // Show a confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with the deletion
                    deleteData(id);
                } else {
                    // User canceled the deletion
                    console.log('Deletion canceled');
                }
            });
        });

        function deleteData(id) {
            // Make an AJAX call to delete data
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>Attendance/ResentEvent/DeleteDataAjax',
                data: { id: id },
                dataType: 'json',
                success: function (response) {
                    // Check if the update was successful
                    if (response == '1') {
                        // Show success pop-up using SweetAlert2
                        Swal.fire({
                            icon: 'success',
                            title: 'Delete!',
                            text: 'The data has been deleted successfully.',
                        }).then((result) => {
                            // Reload the page
                            location.reload();
                        });
                    } else {
                        // Handle other cases (e.g., display an error message)
                        console.error('Error deleting data:', response.status);
                    }
                },
                error: function () {
                    // Handle error
                    console.error('Error deleting data.');
                }
            });
        }
    });
</script>
