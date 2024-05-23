<div class="container-fluid">
    <div class="row px-1 py-2">
        <div class="col-md-12">
                <h3><span style="color:#2c3e50;border-bottom:1px solid #2c3e50">Card Data</span></h3>
        </div>  
        <form method="POST" id="myForm">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-6">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name" id="Name">
                </div>
                <div class="col-md-4 col-sm-6 col-6">
                    <label for="Name">Association</label>
                    <input type="text" class="form-control" name="association_head" id="Name">
                </div>
                <div class="col-md-4 col-sm-6 col-6">
                    <label for="Name">Designation</label>
                    <input type="text" class="form-control" name="Designation" id="Name">
                </div>
                <div class="col-md-4 col-sm-6 col-6">
                    <label for="Company_Name">Company Name</label>
                    <input type="text" class="form-control" name="Company_Name" id="Company_Name">
                </div>
                <div class="col-md-4 col-sm-6 col-6">
                    <label for="Number">Number</label>
                    <input type="text" class="form-control" name="Number" id="Number">
                </div>
                <div class="col-md-4 col-sm-6 col-6">
                    <label for="Email">E-mail</label>
                    <input type="text" class="form-control" name="Email" id="Email">
                </div>
                <div class="col-md-12 col-sm-12 col-12">
                    <label for="Address 1">Address 1</label>
                    <input type="text" class="form-control" name="Addressl" id="Addressl">
                </div>
                
                <div class="col-md-12 col-sm-12 col-12">
                    <label for="Address 2">Address 2</label>
                    <input type="text" class="form-control" name="Address2" id="Address2">
                </div>
                <div class="col-md-12 col-sm-12 col-12">
                    <label for="Email">City</label>
                    <input type="text" class="form-control" name="City" id="City">
                </div>
                
                <div class="col-md-12 col-sm-12 col-12">
                    <label for="Submit">Submit</label><br>
                    <input type="Submit" class="btn" style="background:red;color:white" name="Submit" id="Submit">
                </div>
            </div>
        </form>
    </div>
    <div class="row px-2 my-2">
        <div class="col-md-6">
             <lable class="filter_data"> Filter table</lable>
            <input type="text" class="filter form-control">
        </div>
        <div class="col-md-6 text-end">
               <lable class="filter_data"> Dowanload</lable>
            <input type="submit " value="Dowanload Magazine Subscriptions Data" id="downloadButton"  class=" form-control btn btn-danger">
        </div>
    </div>
    <div class="row px-2">
   <div class="table-responsive text-center">
                <table class="table table-bordered " style="width:600%;">
                    <thead>
                        <tr>
                            <th>So.No</th>
                            <td>Edit</td>
                            <td>magazine Subcriber</td>
                            <th>Name</th>
                            <th>Association Head</th>
                            <th>Designation</th>
                            <th>Company Name</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>City</th>
                            <th>Starting Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
         <?php $i='1'; foreach ($Card as $card): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <i class="fas fa-edit" data-meta="<?= htmlspecialchars(json_encode($card), ENT_QUOTES, 'UTF-8'); ?>" onclick="editRow(this)"></i>
                </td>
                <td>
               <?php
$magazineIsActive = ($card['magazine'] == '1' AND strtotime($card['Date'] . '-' . $card['Month'] . '-' . $card['magazine_year']) < strtotime($card['Date'] . date('-F-').$card['magazine_year'].'-01'));
?>

<?php echo ($magazineIsActive) ? '<i class="fas fa-newspaper UnActive" data-meta="' . $card['id'] . '" style="color:#2c3e50"></i>' : '<i class="fas fa-newspaper Active" data-meta="' . $card['id'] . '"  style="color:red"></i>'; ?>

                </td>
                <td><?= $card['name']; ?></td>
                <td><?= $card['association_head']; ?></td>
                <td><?= $card['Designation']; ?></td>
                <td><?= $card['Campany_name']; ?></td>
                <td><?= $card['Number']; ?></td>
                <td><?= $card['Mail_ID']; ?></td>
                <td><?= $card['add_1']; ?></td>
                <td><?= $card['add_2']; ?></td>
                <td><?= $card['City']; ?></td>
                <td><?= $card['Date'] ?> -<?= $card['Month']?>-<?= $card['magazine_year'] ?></td>
            </tr>
        <?php endforeach; ?>



                    </tbody>
                </table>
            </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#myForm').submit(function(e) {
        e.preventDefault(); // Prevents the default form submission

        // Serialize form data
        var formData = $(this).serialize();

        // AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>Attendance/Card/insertCard', // Replace with the actual PHP script URL
            data: formData,
            success: function(response) {
                // Handle the response from the server
                console.log(response);

                // Show a success pop-up using SweetAlert2
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Form submitted successfully.',
                });

                // You can also reset the form or perform other actions here
            },
            error: function(error) {
                // Handle errors
                console.log(error);

                // Show an error pop-up using SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Form submission failed. Please try again.',
                });
            }
        });
    });
});
</script>
 

<!-- ... Your previous HTML code ... -->

<!-- Bootstrap Modal for Editing -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form fields for editing -->
                <form id="editForm">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="Name">
                    </div>
                    
                    <!-- ID (hidden) -->
                    <input type="hidden" id="editId" name="id">

                    <!-- Add an empty container for other dynamic form fields -->
                    <div id="editFormFields"></div>
                    
                    <!-- Save changes button -->
                    <button type="button" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function editRow(icon) {
        var rowData = JSON.parse(icon.getAttribute('data-meta'));
        
        // Set the values of the form fields
        $('#editId').val(rowData.id);
        $('#editName').val(rowData.name);

        // Clear previous dynamic form fields
        $('#editFormFields').html('');

        // Add other form fields dynamically based on the rowData
        addFormField('Designation', rowData.Designation);
        addFormField('Your_Company_Name', rowData.Campany_name);
        addFormField('Number', rowData.Number);
        addFormField('Email', rowData.Mail_ID);
        addFormField('Address1', rowData.add_1);
        addFormField('Address2', rowData.add_2);
        addFormField('City', rowData.City);
        addFormField('Date', rowData.Date);
        addFormField('Month', rowData.Month);
        addFormField('magazine_year', rowData.magazine_year);
        // Add other form fields as needed

        // Show the modal
        $('#editModal').modal('show');
    }

    function addFormField(fieldName, fieldValue) {
        // Create a new input field and add it to the form
        var input = $('<input>')
            .attr('type', 'text')
            .attr('name', fieldName)
            .attr('id', 'edit' + fieldName)
            .attr('value', fieldValue)
            .addClass('form-control');

        // Create a label for the input
        var label = $('<label>')
            .attr('for', 'edit' + fieldName)
            .text(fieldName);

        // Add the label and input to the form
        $('#editFormFields').append(label).append(input);
    }

    function saveChanges() {
        // Handle saving changes here
        // You can use the form fields and make an AJAX request to update the data in the database

        var formData = $('#editForm').serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>Attendance/Card/updateCard', // Replace with your actual controller and method
            data: formData,
            success: function(response) {
                // Handle success response
                console.log(response);
                 Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data updated successfully!',
                });
                // Close the modal after saving changes
                $('#editModal').modal('hide');
                 location.reload();
            },
            error: function(error) {
                // Handle error response
                console.error(error);
            }
        });
    }
    $(document).ready(function() {
    // ...

    // Filter table based on input
    $('.filter').on('input', function() {
        var filterValue = $(this).val().toLowerCase();

        // Iterate through each row in the table
        $('tbody tr').each(function() {
            // Check if any of the row's cells contain the filter value
            var rowText = $(this).text().toLowerCase();
            if (rowText.indexOf(filterValue) !== -1) {
                // If found, show the row
                $(this).show();
            } else {
                // If not found, hide the row
                $(this).hide();
            }
        });
    });
});

</script>
<script>
$(document).ready(function () {
    // ...

    $('.table').on('dblclick', '.UnActive', function () {
        var metaData = $(this).data('meta');

        // AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>Attendance/Card/magazineunactive',
            data: { metaData: metaData },
            success: function (response) {
                if (response == '1') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Magazine Unactivated successfully.',
                    }).then(function() {
                        location.reload();
                    });
                }
            },
            error: function (error) {
                console.error('AJAX Error:', error);
                // Handle AJAX error here
            }
        });
    });

    $('.table').on('dblclick', '.Active', function () {
        var metaData = $(this).data('meta');

        // AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>Attendance/Card/magazineactive',
            data: { metaData: metaData },
            success: function (response) {
                if (response == '1') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Magazine activated successfully.',
                        onClose: function () {
                            location.reload();
                        }
                    });
                }
            },
            error: function (error) {
                console.error('AJAX Error:', error);
                // Handle AJAX error here
            }
        });
    });
});

</script>
<script>
    $(document).ready(function () {
        $('#downloadButton').click(function () {
            // AJAX request for downloading data
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>Attendance/Card/downloadData',
                success: function (response) {
                    // Create a new HTML document with the HTML-formatted data
                    var printDocument = document.createElement('html');
                    var htmlContent = '<style>';
                    htmlContent += 'td.print-page { width: 50%; height: 47mm; text-align: left; vertical-align: top; padding: 5px; }';
                    htmlContent += 'td.print-page div { font-size: 10px; margin: 5px; }'; // Adjust font size and margin

                    // Add margin-top style inside @media print
                    htmlContent += '@media print { td.print-page h4 { margin-top: 25px; } }';

                    htmlContent += '@media print { @page { size: A4; margin: 0; } body { margin: 1cm; } }';
                    htmlContent += '</style>';
                    htmlContent += '<table>';

                    // Iterate through the response data and add table rows
                    for (var i = 0; i < response.length; i += 2) {
                        // Add a new row after every 12 entries
                        if (i % 12 === 0) {
                            htmlContent += '</table>'; // Close the previous table
                            htmlContent += '<div style="page-break-after: always;"></div>'; // Add page break
                            htmlContent += '<table>'; // Open a new table
                        }

                        htmlContent += '<tr>';

                        // Add cell for the first entry
                        htmlContent += '<td class="print-page">';
                        htmlContent += '<div style="margin-top: 25px">';
                        htmlContent += '<b >Name:-</b> ' + response[i].name + '<br>';
                        htmlContent += '<b> Company Name:-</b>' + response[i].Campany_name + '</br>';
                        htmlContent += '<b>Designation:-</b> ' + response[i].Designation + '<br>';
                        htmlContent += '<b>Address 1:-</b> ' + response[i].add_1 + '<br>';
                        htmlContent += '<b>Address 2:-</b> ' + response[i].add_2 + '<br>';
                        htmlContent += '<b>City:-</b> ' + response[i].City + '<br>';
                        htmlContent += '<b>Tel:-</b> ' + response[i].Number + '<br>';
                        htmlContent += '</div>';
                        htmlContent += '</td>';

                        // Add cell for the second entry (if available)
                        if (i + 1 < response.length) {
                            htmlContent += '<td class="print-page">';
                            htmlContent += '<div  style="margin-top: 25px">';
                            htmlContent += '<b >Name:-</b> ' + response[i + 1].name + '<br>';
                            htmlContent += '<b>Designation:-</b> ' + response[i + 1].Designation + '<br>';
                            htmlContent += '<b> Company Name:-</b>' + response[i].Campany_name + '</br>';
                            htmlContent += '<b>Address 1:-</b> ' + response[i + 1].add_1 + '<br>';
                            htmlContent += '<b>Address 2:-</b> ' + response[i + 1].add_2 + '<br>';
                            htmlContent += '<b>City:-</b> ' + response[i + 1].City + '<br>';
                            htmlContent += '<b>Tel:-</b> ' + response[i + 1].Number + '<br>';
                            htmlContent += '</div>';
                            htmlContent += '</td>';
                        }

                        htmlContent += '</tr>';
                    }

                    htmlContent += '</table>';
                    printDocument.innerHTML = htmlContent;

                    // Open the new window for print preview
                    var printWindow = window.open('', '_blank');
                    printWindow.document.write(printDocument.outerHTML);

                    // Trigger browser's print functionality
                    printWindow.print();
                },
                error: function (error) {
                    console.error('AJAX Error:', error);
                    // Handle AJAX error here
                }
            });
        });
    });
</script>

