<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #1c1c1c; /* Black background */
        color: #ffffff; /* White text */
    }
    
    .table {
    width: 100%;
    margin-bottom: 1px;
    color: #757575;
}

    .dashboard {
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
        padding-top: 5px;
        
    }

    .section {
        background-color: #1c1c1c; /* Black background */
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }
    .section1 {
    background-color: #3abaf4;
   padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
   }
    .section2 {
        background-color: #66bb6a; /* Black background */
        padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    .section3 {
        background-color: #fc544b; /* Black background */
       padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }


    .section4 {
    background-color: #1c1c1c; /* Black background */
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    
    .section5 {
    background-color: #225076; /* Black background */
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    
    .section54 {
    background-color: #665076; /* Black background */
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    
    .section6 {
    background-color: #0d9d7e; /* Black background */
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    
    .section7 {
    background-color: #56833e; /* Black background */
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    
    .section8 {
    background-color: #c5852f; /* Black background */
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    
    
    .section9 {
    background-color: var(--pink); /* Black background */
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    
    .section10 {
    background-color: var(--gray); /* Black background */
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }

    h2 {
        margin-bottom: 10px;
         color: #ffffff; /* White text */
         font-size: 24px;
    }
   .omp-admin-dashboard h2 {
    font-size: 19px;
    border-bottom: 1px solid #d0d0d052;
    padding-bottom: 7px;
}
    
    .h4, h4 {
    font-size: 1.2rem;
    font-weight: 500;
   }

    p {
        color: #ffffff; /* White text */
    }
    
    .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #e3e6f0;
    font-size: 14px;
    font-weight: 300;
}

.btn-icon-split .icon {
    background: rgb(242 59 63 / 97%);
    display: inline-block;
    padding: 0.375rem 0.75rem;
}

.bg-dark {
    background-color: #36373e!important;
}

.table td, .table th {
    padding: 0.4rem;
    vertical-align: middle;
    border-top: 1px solid #e3e6f0;
    font-size: 14px;
}

.btn-icon-split .icon {
    background: rgb(58 58 58);
    display: inline-block;
    padding: 0.275rem 0.55rem;
}

.pb-2, .py-2 {
    padding-bottom: 0.5rem!important;
    color: #353434;
}

@media only screen and (max-width: 600px) {
  .table thead th{
    font-size: 12px !important;
  }
  .table td, .table th{
      font-size: 12px !important; 
      border: 1px solid #ddd;
  }
 .omp-admin-dashboard h2 {
    font-size: 20px;
    padding-bottom: 7px;
    font-weight: 500;
}
   .section1, .section2, .section3, .section4{
       padding: 8px !important;
   }
   .mobile-view-scroll{
    display: block; 
    overflow-x: auto; 
    white-space: nowrap;
    padding-bottom: 22px;
   }
}

    
</style>


<div class="omp-admin-dashboard dashboard">
   <div class="container-fluid">
     <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-6">
        <div class="section1">
            <h2>Sellers List</h2>
            <p id="sellerCount"><?php echo $Seler_number ?></p>
         </div>
        </div>
        
         <div class="col-lg-3 col-md-6 col-sm-6 col-6">   
        <div class="section2">
            <h2>Buyers List</h2>
            <p id="buyerCount"><?php echo $Buyer_number ?></p>
         </div>
        </div>
        
        
      <div class="col-lg-3 col-md-6 col-sm-6 col-6">
        <div class="section5">
            <h2>Club TTJ </h2>
            <p id="sellerCount"><?php echo $ClubTTJ ?></p>
         </div>
        </div>
       <div class="col-lg-3 col-md-6 col-sm-6 col-6">       
        <div class="section3">
            <h2>Average Meeting</h2>
            <p id="eventsDone"><?php echo $Meeting_number ?></p>
        </div>
        </div> 
      </div>
      <!-----1st---end--------------->
      <div class="row">
          
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">   
        <div class="section4">
            <h2> Events</h2>
            <p id="activeEvents"><?php echo $view_Number ?></p>
        </div>
        </div>
        
       <div class="col-lg-3 col-md-6 col-sm-6 col-6">       
        <div class="section7">
            <h2>Upcoming Events</h2>
            <p id="eventsDone"><?php echo $view_Events_view ?></p>
        </div>
        </div> 
        
         
         <div class="col-lg-3 col-md-6 col-sm-6 col-6">   
        <div class="section6">
            <h2>Meeting</h2>
            <p id="buyerCount"><?php echo $Meeting_number_fixed ?> / <?php echo $Meeting_number ?></p>
         </div>
        </div>
        
       
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">   
        <div class="section8">
            <h2>Upcoming Virtual Meeting</h2>
            <p id="activeEvents">0</p>
        </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">   
        <div class="section9">
            <h2>Buyer Request</h2>
            <p id="activeEvents"><?php echo $Meeting_Buyer_Request ?></p>
        </div>
        </div>
        
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">   
        <div class="section10">
            <h2>Seller Request</h2>
            <p id="activeEvents"><?php echo $Meeting_Seller_Request ?></p>
        </div>
        </div>
        
         <div class="col-lg-3 col-md-6 col-sm-6 col-6">
        <div class="section54">
            <h2>Club TTJ Registration </h2>
            <p id="sellerCount"><?php echo $ClubTTJ ?></p>
         </div>
        </div>
        
      </div>
      
      
     </div>
    </div>
    
    
    
   <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                 <h4 class="pb-2 fw-5"> Up Coming Event</h4>
                 <table class="mobile-view-scroll table table-bordered table-striped text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Event Name</th>
                            <th>Location</th>
                            <th>Place</th>
                            <th>Date</th>
                            <th>No. Buyer </th>
                            <th>No. Seller</th>
                            <th>Meeting</th>
                            <th>View More</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Display first 5 entries with images -->
    <?php $i = '1';
foreach ($view_Event as $row) {
    $this->load->model('Meeting_model/Event_model');
    $row->sellerCount = $this->Event_model->getSellerCount($row->EventID);
    $row->buyerCount = $this->Event_model->getBuyerCount($row->EventID);
    $row->meetingCount = $this->Event_model->getMeetingCount($row->EventID);
      if ($row->EventStartDate > date('Y-m-d')) {
   ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= $row->EventName ?></td>
        <td><?= $row->EventPlace ?></td>
        <td><?= $row->Country ?></td>
        <td><?= $row->EventStartDate ?></td>
        <td><?= $row->buyerCount ?></td>
        <td><?= $row->sellerCount ?></td>
        <td><?= $row->meetingCount ?></td>
        <td class="old-eventbtnnn">
            <a href="<?= base_url()?>Meeting/Admin/Meeting_Details/filter/<?php echo $row->EventID?>" class="event-details-button btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                </span>
            </a>


        </td>
    </tr>
<?php
    $i++;
    }
}

?>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                 <h4 class="pb-2 fw-5"> Previous event</h4>
                 <table class="mobile-view-scroll table table-bordered table-striped text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Event Name</th>
                            <th>Location</th>
                            <th>Place</th>
                            <th>Date</th>
                            <th>No. Buyer </th>
                            <th>No. Seller</th>
                            <th>Meeting</th>
                            <th>View More</th>
                        </tr>
                    </thead>
                    <tbody>
                                             <!-- Display first 5 entries with images -->
   <?php 
$i = '1';
foreach ($view_Event as $row) {
    $this->load->model('Meeting_model/Event_model');
    $row->sellerCount = $this->Event_model->getSellerCount($row->EventID);
    $row->buyerCount = $this->Event_model->getBuyerCount($row->EventID);
    $row->meetingCount = $this->Event_model->getMeetingCount($row->EventID);
    if ($row->EventStartDate < date('Y-m-d')) {
?>
 <tr>
        <td><?= $i ?></td>
        <td><?= $row->EventName ?></td>
        <td><?= $row->EventPlace ?></td>
        <td><?= $row->Country ?></td>
        <td><?= $row->EventStartDate ?></td>
        <td><?= $row->buyerCount ?></td>
        <td><?= $row->sellerCount ?></td>
        <td><?= $row->meetingCount ?></td>
        <td class="old-eventbtnnn">
            <a href="<?= base_url()?>Meeting/Admin/Meeting_Details/filter/<?php echo $row->EventID?>" class="event-details-button btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                </span>
            </a>


        </td>
    </tr>
<?php
    $i++;
    break; // Break the loop after displaying one entry
    }
}
?>

                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    