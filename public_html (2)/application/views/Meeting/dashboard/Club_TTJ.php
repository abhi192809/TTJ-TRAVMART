
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.css">

<style>
    body {
      margin: 0;
      padding: 0;
    }

    .container-fluid {
      padding: 0px 20px 20px 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #dee2e6;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #ca2327;
      color: #fff;
    }

    .actions {
      display: flex;
      justify-content: space-between;
    }
    table th, table td {
    text-align: center;
  }
    .action-icons {
      font-size: 11px;
      cursor: pointer;
      margin-right: 7px;
      color: #5d5a5a;
    }

    .show-all-btn {
      margin-top: 10px;
    }

    
element.style {
    right: 0px;
}
#animationSection {
    position: fixed;
    top: 0;
    right: -100%;
    height: 600px;
    margin: 71px 0px;
    width: 25%;
    background-color: #fff;
    overflow-y: auto;
    z-index: 1000;
    transition: right 0.5s ease-in-out;
    padding: 20px;
    border: 1px solid black;
}

    #closeBtn {
      position: absolute;
      top: 10px;
      right: 20px;
      cursor: pointer;
    }

    #allSellerData {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
    max-height: 600px; /* Set a fixed height for the content */
    /* overflow-y: auto; */ /* Remove this line to disable scrollbar */
  }
  .active-status {
    background-color: #28a745; /* Green color for Active */
    color: #fff; /* White text for better contrast */
  }

  .inactive-status {
    background-color: #dc3545; /* Red color for Inactive */
    color: #fff; /* White text for better contrast */
  }

  .margtoppp-data-form{
    margin-top: 11px;
   }

   .form-data-heading{
    line-height: 53px;
   }
  .event-details-button {
    font-size: 13px;
    height: 30px;
    line-height: 17px;
    }
    
    .view-details-btnn a{
      text-decoration: none;
    }
  
  .lead-form-om{
       margin: 3px;
       padding: 0px;
       /*color: transparent;*/
       /*text-shadow: 0 0 5px rgba(0,0,0,0.5); */
    }
    .view-details-btnn a{
      text-decoration: none;
    }
    .old-eventbtnnn i{
        color: #fff;
    }
    
    .lead-form-om li{
        list-style: none;
        padding-top: 6px;
        font-size:15px;
    }
   .om-lead-formselect {
    padding: 5px;
    background-color: #040404;
    height: 42px;
    color: #fff;
}

@media only screen and (max-width: 768px) {
  .text-right {
    text-align: left !important;
  }
}

  </style>
</head>
<body>


<!------------2nd---row---------->

<!-------------end----------------->
<div class="margtoppp-data-form card">
    
<div class="container-fluid">
  <!-------------------div-------------->
  <div class="row">
    <div class="col-lg-6 col-md-5 col-sm-12">
      <div class="card-header1">
        <h4 class="form-data-heading mb-0">  Club TTJ </h4>
      </div>
    </div>
     
     <div class="col-lg-6 col-md-2 col-sm-12 text-right">
             <div class="card-header1 mt-3">
             <button type="button" class="Meeting-Download-btbn btn btn-success"><i class="download-iconn fas fa-download action-icons" title="Download"></i> Enquiry Download</button>
             <!--<a href="<?= base_url()?>Meeting/Admin/Lead" type="button" class=" btn btn-danger text-white " >+ Add Lead </a>-->
            
            </div>
            
    </div>

  

  </div>
</div>
  <div class="table-responsive card-body">
<!-- Club_TTJ.php -->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table mt-4" id="dataTable">
            <thead class="thead-danger">
                <tr>
                    <th>So</th>
                    <th>Club TTJ ID</th>
                    <th>Company Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Pin Code</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
       <?php $i=1; foreach($Market_place_club_TTJ as $row):?>
    <tr>
        <td> <?= $i ?></td>
        <td data-full="<?= $row->MakeID ?>"> 
            <?= strlen($row->MakeID) > 5 ? substr($row->MakeID, 0, 5) . '...' : $row->MakeID ?>
        </td>
        <td data-full="<?= $row->CompanyName ?>"> 
            <?= strlen($row->CompanyName) > 5 ? substr($row->CompanyName, 0, 5) . '...' : $row->CompanyName ?>
        </td>
        <td data-full="<?= $row->City ?>"> 
            <?= strlen($row->City) > 5 ? substr($row->City, 0, 5) . '...' : $row->City ?>
        </td>
        <td data-full="<?= $row->State ?>"> 
            <?= strlen($row->State) > 5 ? substr($row->State, 0, 5) . '...' : $row->State ?>
        </td>
        
        <td data-full="<?= $row->Country ?>"> 
            <?= strlen($row->Country) > 5 ? substr($row->Country, 0, 5) . '...' : $row->Country ?>
        </td>
        
        <td data-full="<?= $row->PinCode ?>"> 
            <?= strlen($row->PinCode) > 5 ? substr($row->PinCode, 0, 5) . '...' : $row->PinCode ?>
        </td>
        <td data-full="<?= $row->ContactNo ?>"> 
            <?= strlen($row->ContactNo) > 5 ? substr($row->ContactNo, 0, 5) . '...' : $row->ContactNo ?>
        </td>
        
        <td data-full="<?= $row->Email ?>"> 
            <?= strlen($row->Email) > 5 ? substr($row->Email, 0, 5) . '...' : $row->Email ?>
        </td>
        
        
        <td>
            <i class="edit fas fa-pencil-alt px-2" data-toggle="modal" data-target="#editModal" data-row="<?= base64_encode(json_encode($row)); ?>"></i>
            <li class="px-2 fas fa-trash" data-remove="<?= $row->ID ?>"></li>
        </td>
    </tr>
<?php $i++; endforeach; ?>


           </tbody>
        </table>
    </div>
</div>


    <!------------popup----start--------->
    


  </div>
</div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="editModalBody">
        <!-- Input fields will be dynamically added here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>

<style>
    td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<script>
$(document).ready(function() {
    $('.Meeting-Download-btbn').click(function() {
        downloadTable();
    });

    function downloadTable() {
        var table = document.getElementById('dataTable');
        var rows = table.getElementsByTagName('tr');
        var csvContent = [];

        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll('td, th');

            for (var j = 0; j < cols.length; j++) {
                var cellContent = cols[j].innerText.trim();
                var fullContent = cols[j].getAttribute('data-full');
                // Check if the cell has the data-full attribute, use it if available
                if (fullContent) {
                    cellContent = fullContent;
                }
                row.push(cellContent);
            }

            csvContent.push(row.join(','));
        }

        var csvBlob = new Blob([csvContent.join('\n')], { type: 'text/csv;charset=utf-8' });
        saveAs(csvBlob, 'meeting_data.csv');
    }

    function saveAs(blob, filename) {
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = filename;

        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);
    }
});
</script>

<script>
    $(document).ready(function() {
        $('td').hover(function() {
            var fullText = $(this).attr('data-full');
            $(this).text(fullText);
        }, function() {
            var truncatedText = $(this).attr('data-full');
            $(this).text(truncatedText.substr(0, 5));
        });
    });
</script>

<script>
$(document).ready(function() {
    // Trash icon click event
    $('.fa-trash').click(function() {
        // Get the ID of the entry to be deleted
        var id = $(this).data('remove');
        
        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this entry!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed deletion, send AJAX request
                $.ajax({
                    url: '<?= base_url()?>/Meeting/Admin/Club_TTJ/delete_entry', // Replace with your delete script URL
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        // Handle success response
                        Swal.fire(
                            'Deleted!',
                            'Your entry has been deleted.',
                            'success'
                        ).then(() => {
                            // Reload the page or update UI as needed
                            window.location.reload(); // Reload the page
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error('Error deleting entry:', error);
                        Swal.fire(
                            'Error!',
                            'Failed to delete entry.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

$(document).ready(function() {
  $('.edit').click(function() {
    var rowData = JSON.parse(atob($(this).data('row')));
    var modalBody = $('#editModalBody');
    modalBody.empty(); // Clear existing content

    // Dynamically generate input fields for each property
    for (var key in rowData) {
      if (rowData.hasOwnProperty(key)) {
        var inputField = $('<div class="form-group">' +
          '<label for="' + key + '">' + key + '</label>' +
          '<input type="text" name="' + key + '" class="form-control" id="' + key + '" value="' + rowData[key] + '">' +
          '</div>');
        modalBody.append(inputField);
      }
    }
  });

  $('#saveChanges').click(function() {
    var updatedData = {};
    $('#editModalBody input').each(function() {
      updatedData[$(this).attr('id')] = $(this).val();
    });
    $.ajax({
      url: '<?= base_url()?>/Meeting/Admin/Club_TTJ/Update_the_Club', // Replace with your update script URL
      type: 'POST',
      data: updatedData,
      success: function(response) {
        // Handle success (e.g., refresh table)
     window.location.href = window.location.href;
      },
      error: function(xhr, status, error) {
        // Handle error
        console.error('Error updating entry:', error);
      }
    });
  });
});

jQuery(document).ready(function ($) {
  $('#dataTable').DataTable();
});
</script>



<style>
.icon {
  cursor: pointer;
}
</style>

