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
        <h4 class="form-data-heading mb-0"> Enquiry </h4>
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
    
  <table class="table mt-4" id="dataTable">
    <thead class="thead-danger">
      <tr>
        <th>LeadID</th>
        <th>Seller Name</th>
        <th>Buyer Name</th>
         <th>Departure Date</th>
        <th>Destination</th>
        <th>Arrival</th>
        <th>Number of Pax</th>
        <th>Status</th>
       
      </tr>
    </thead>
    <tbody>
      <?php $i= '1'; foreach($Lead as $row):?>
      <?php if($row->enquiry =='1'): ?>
      <?php foreach($get_buyer as $buyer_row):?>
      <?php if($row->seller_ID =='0' AND $buyer_row->id == $row->buyer_ID AND  $row->enquiry == '1'):?>
      <tr>
        <td><?= $i ?></td>
        <td>Enquiry</td>
        <td><?= $buyer_row->your_company_name ?></td>
        <td><?php echo $row->departure_date ?></td>
        <td><?php echo $row->departure_country ?> / <?php echo $row->departure_city ?></td>
        <td><?php echo $row->arrival_country ?> / <?php echo $row->arrival_city ?></td>
        <td><?php echo $row->number_of_adults ?></td>
        <td>
            <?php 
                if ($row->Status == NULL) {
                    echo "on processing";
                } else {
                    echo $row->Status;
                }
            ?>
        </td>
      </tr>
      <?php endif;?>
      <?php endforeach;?>
      <?php endif;?>
      <?php $i++; endforeach;?>
    </tbody>
  </table>

    <!------------popup----start--------->
    <!-- Your modal -->


    <!------------popup----start--------->
    <!-- Your modal -->
<div class="modal fade bookingModal" id="allTimeSlotsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 820px;">
    <div class="modal-content">
      <!-- Modal content goes here -->
      <div class="modal-header">
          <div class="container-fluid">
              <div class="row">
              <div class="col-md-6">
                   <h5 class="modal-title" id="exampleModalLabel"></h5>
              </div>
              <div class="col-md-6 Event_duration">
                  
              </div>
          </div>
          </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >X</button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row appande_col">
              
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Additional buttons or actions go here -->
      </div>
    </div>
  </div>
</div>


     


  </div>
</div>
</div>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>




<script>
  bulmaCarousel.attach('#trend-slide', {
    slidesToScroll: 2,
    slidesToShow: 4,
    pagination: false,
    loop: true,
    autoplay: true,
    autoplaySpeed: 5000,
  });
</script>

<script>
    jQuery(document).ready(function ($) {
    
   $('#dataTable').DataTable();
});
</script>

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

                // Example: Exclude the "Operation" column (index 9)
                for (var j = 0; j < cols.length; j++) {
                    if (j !== 1  ) {
                        row.push(cols[j].innerText.trim());
                    }
                    
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


<style>
.icon {
  cursor: pointer;
}
</style>
</head>
<body>
