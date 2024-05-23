 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
    body {
      margin: 0;
      padding: 0;
    }

    .container-fluid {
    padding: 0px 20px 2px 20px;
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
          font-size: 13px !important;
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
    
     .view-details-btnn a{
      text-decoration: none;
    }
    .old-eventbtnnn i{
        color: #fff;
    }
    .lead-form-om{
       margin: 3px;
       padding: 0px;
       /*color: transparent;*/
       /*text-shadow: 0 0 5px rgba(0,0,0,0.5); */
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

.rotate-190 {
    transform: rotate(190deg);
  }
  
  .share-btnnn {
    border-radius: 5px;
    box-shadow: 2px 2px 11px 0px #747474;
    padding: 7px 5px 3px 5px;
    font-size: 16px;
    /* line-height: 14px; */
}

.small, small {
    font-size: 103%;
    font-weight: 400;
}
  </style>
</head>
<body>

  
   <!-------------------div-------------->
   <div class="container-fluid">
        
    
      <!------------2nd---row--------->

    <div class="margtoppp-data-form card">
      <div class="table-responsive card-body">
        <caption class="form-data-heading"><h4 class="my-2"> <a class="text-danger" href="<?php echo  base_url() ?>/Meeting/Admin/buyer/buyer_data_old_Event"><span class="share-btnnn"><i class="fa fa-share rotate-190" id="backButton"></i></span></a> All Buyer Data </h4> </caption><hr>
        <table class="table" id="dataTable">
        <thead>
        <tr>
          <th>No.</th>
          <th>Logo</th>
          <th>Event Name</th>
          <th> Event Place</th>
          <th>Event Date</th>
          <th>Location</th>
          <th>B.M</th>
          <th>Verified Meeting</th>
          <th>Meeting Prefixed</th>
        </tr>
        </thead>
        <tbody>
        <!-- Display first 5 entries with images -->
      <?php if(!empty($EventID)): ?>
    <?php if(!empty($Event_Data)): ?>
        <?php $i = 1; foreach($EventID as $Row_EventID_Map): ?>
            <?php foreach($Event_Data as $Row_EventID): ?>
                <?php if($Row_EventID->EventID == $Row_EventID_Map->Evet_ID): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><img src="<?= base_url() ?>/assets/Meeting/Event_image/<?php echo $Row_EventID->EventImage?>" width="100px"></td>
                        <td><?php echo $Row_EventID->EventName ?></td>
                        <td><?php echo $Row_EventID->EventPlace ?></td>
                        <td><?php echo $Row_EventID->EventStartDate ?></td>
                        <td><?php echo $Row_EventID->Location;  ?></td>
                        <td><?php echo  $data1 = $this->Buyer_model->Get_Meeting_done_Events($Row_EventID->EventID ,$id); ?></td>
                        <td> <a href="<?php echo base_url() ?>Meeting/Admin/Buyer/Get_the_Varefied_Event_Seller_Meeting/<?php echo $Row_EventID->EventID ?>/<?php echo $id ?>" class="btn btn-danger text-light"><?php echo  $data2 = $this->Buyer_model->Get_Verifed_Meeting_Event($Row_EventID->EventID, $id); ?></a><br><small>Click and View</small></td>
                        <td>
                            <a href="<?php echo base_url() ?>Meeting/Admin/Buyer/Get_the_Buyer_Realted_Event_Seller_Meeting/<?php echo $Row_EventID->EventID ?>/<?php echo $id ?>" class="event-details-button btn-secondary btn-icon-split reload-link" title="View" contenteditable="false" style="cursor: pointer;">
                                <span class="icon">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; // Increment $i inside the loop ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>


        <!-- Add more rows as needed -->
        </tbody>
      </table>

      <!------------pagination----start------->
     <!------------pagination----start---end--->


    </div>
  </div>
</div>
<!-- Bootstrap Modal -->
<div class="modal fade" id="sellerModal" tabindex="-1" role="dialog" aria-labelledby="sellerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sellerModalLabel">Seller Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="sellerModalBody">
        <!-- Seller data will be appended here -->
      </div>
    </div>
  </div>
</div>
<script>
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function showAllSellerData(encodedData) {
        // Decode the JSON string
        var decodedJSON = JSON.parse(atob(encodedData));

        // Log the decoded JSON data to the console
        console.log('Decoded JSON:', decodedJSON);

        // Append the decoded data to the Bootstrap modal
        var modalBody = document.getElementById('sellerModalBody');
        modalBody.innerHTML = ''; // Clear existing content

        // Display the logo (image)
        if (decodedJSON.logo) {
            var logoImage = document.createElement('img');
            logoImage.src = '<?php echo base_url();?>assets/Meeting/Buyer_logo/' + decodedJSON.logo;
            logoImage.alt = 'Logo';
            logoImage.style.width = '100%';
            modalBody.appendChild(logoImage);
        }

        // Loop through the properties and append them to the modal
        for (var key in decodedJSON) {
            if (decodedJSON.hasOwnProperty(key) && key !== 'id' && key !== 'logo') {
                var formattedKey = capitalizeFirstLetter(key.replace(/_/g, ' '));

                var listItem = document.createElement('p');
                listItem.textContent = formattedKey + ': ' + decodedJSON[key];
                modalBody.appendChild(listItem);
            }
        }

        // Show the Bootstrap modal
        $('#sellerModal').modal('show');
    }
</script>

<script>
    $(document).ready(function() {
        // Event listener for search input
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().toLowerCase();

            // Show/hide rows based on search input
            $('.buyer-row').each(function() {
                var rowText = $(this).text().toLowerCase();
                if (rowText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

<script>
    jQuery(document).ready(function ($) {
   $('#dataTable').DataTable();
});
</script>