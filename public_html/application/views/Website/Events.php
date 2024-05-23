
<style>
    .event-details {
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .event-details img {
    margin-bottom: 12px;
    height: 175px;
    width: 100%;
}
    .btn-colorful {
        background-color: #41464b;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 6px 14px;
        cursor: pointer;
        width: 48%;
    }
    
    .btn-colorful1 {
        background-color:#00697e;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 6px 14px;
        cursor: pointer;
        width: 48%;
    }
    
    .btn-colorful:hover {
        background-color: #000;
        color: #fff;
    }
    .btn-colorful1:hover {
        background-color: #de2a30;
        color: #fff;
    }
    
    .events-body {
     padding: 38px 0px 58px 0px;
    }
    .event-name-heading{
        font-size: 22px;
        padding: 5px 0px 25px 0px;
        font-weight: 600;
       
    }
    .event-details p{
        border-bottom: 1px solid #ddd;
        padding-bottom: 2px;
    }
    .event-details strong {
    font-size: 17px;
    padding-right: 5px;
    color: #dc4435;
    }
</style>


<section class="events-body">
   <div class="container">
       <div class="row">
<?php 
// Initialize an empty array to store events grouped by year
$eventsByYear = [];

// Group events by year
foreach($events as $row){
    $year = date('Y', strtotime($row->EventStartDate));
    $eventsByYear[$year][] = $row;
}

// Sort the years in ascending order
ksort($eventsByYear);

// Loop through each year and display events
foreach($eventsByYear as $year => $events):
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
    <div class="event-name-heading text-left">
       <h2>Events <?= $year ?></h2> <!-- Display the year -->
    </div>
</div>
<?php foreach($events as $event):?>
<div class="col-lg-3 col-md-3 col-sm-12 col-12 pb-2">
    <div class="event-details">
        <img src="<?php echo base_url();?>assets/Meeting/Event_image/<?= $event->EventImage ?>" class="img-fluid" alt="Event Image">
        <p><strong>Event Name:</strong> <?= $event->EventName ?></p>
        <p><strong>Location:</strong> <?= $event->Location ?></p>
        <p><strong>Date:</strong> <?= $event->EventStartDate ?> <?php if($event->EventEndDate == $event->EventStartDate ){ } else { echo "- ".$event->EventEndDate; } ?></p>
        <p><strong>Email:</strong> <?= $event->Email ?></p>
        <p><strong>Phone Number:</strong> <?= $event->Phone_Number ?></p>
        <!--<p><strong> Hosted Buyer Fee:</strong><?= $event->Hosted_Buyer_Fees ?></p>-->
        <!--<p><strong>Seller Fee:</strong><?= $event->Seller_fees ?></p>-->
    
        <div class="event-details-btn">
            <a href="<?php echo base_url();?>Seller_Registration"><button class="btn btn-colorful1">Reg as Seller</button></a>
            <a href="<?php echo base_url();?>Buyer_Registration"><button class="btn btn-colorful">Reg as Buyer</button></a>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php endforeach;?>

      </div>
    </div>
  </section>
