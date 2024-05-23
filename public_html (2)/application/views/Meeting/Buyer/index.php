<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #1c1c1c; /* Black background */
        color: #ffffff; /* White text */
    }

    .dashboard {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
        padding: 20px;
    }

    .section {
        background-color: #1c1c1c; /* Black background */
        padding: 14px 10px 3px 10px;
        line-height: 22px;
        border-radius: 10px;
        text-align: center;
    }
    .section1 {
        background-color:#3abaf4; /* Black background */
        padding: 14px 10px 3px 10px;
        line-height: 22px;
        border-radius: 10px;
        text-align: center;
    }
    .section2 {
        background-color: #66bb6a; /* Black background */
        padding: 14px 10px 3px 10px;
        line-height: 22px;
        border-radius: 10px;
        text-align: center;
    }
    .section3 {
        background-color: #fc544b; /* Black background */
        padding: 14px 10px 3px 10px;
        line-height: 22px;
        border-radius: 10px;
        text-align: center;
    }


    .section4 {
        background-color: #bd007a; /* Black background */
        padding: 14px 10px 3px 10px;
        line-height: 22px;
        border-radius: 10px;
        text-align: center;
    }
    
    .section5 {
        background-color: #548969; /* Black background */
        padding: 14px 10px 3px 10px;
        line-height: 22px;
        border-radius: 10px;
        text-align: center;
    }
    
    .section6 {
        background-color: #775489; /* Black background */
        padding: 14px 10px 3px 10px;
        line-height: 22px;
        border-radius: 10px;
        text-align: center;
    }


    h2 {
        margin-bottom: 10px;
         color: #ffffff; /* White text */
         font-size: 21px;
    }
    
    .section1, .section2, .section3, .section4, .section5, .section6, .section7, .section8 {
     margin-top: 10px;
     }

    p {
        color: #ffffff; /* White text */
    }
    
    @media only screen and (max-width: 600px) {
    .section1, .section2, .section3, .section4, .section5, .section6, .section7, .section8 {
    margin-bottom: 10px;
   }
  }
</style>

    <div class="dashboard1">
        
        <div class="container-fluid">
            <h6>Total Event </h2>
        <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
        <div class="section2">
            <h2> Event </h2>
            <p id="sellerCount"><?php echo @$Event?></p>
        </div>
        </div>
        
       <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
        <div class="section3">
            <h2>Travmart Meeting</h2>
            <p id="eventsDone"><?php echo @$travemart_meeting ?></p>
        </div>
        </div>
        
       <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
        <div class="section4">
            <h2> Lead / conversion</h2>
            <p id="activeEvents"><?php echo @$Lead ?></p>
        </div>
        </div>
      

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">     
        <div class="section5">
            <h2>Virtual Networking </h2>
            <p id="buyerCount">0</p>
        </div>
       </div>
       </div>
        <?php foreach(@$Event_know as $row):?>
          
       <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-12">
           <h6 class="my-3">Active Event</h6>
          </div> 
          
              <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="section5">
            <h2> Event </h2>
            <p id="buyerCount"><?php echo @$row->EventName ?></p>
           </div>
          </div>   
           
      
        <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
        <div class="section6">
            <h2> Meeting Scheduling </h2>
            <p id="sellerCount"> <?php echo $this->Event_model->get_Meeting_buyer($row->EventID)?> </p>
        </div>
        </div>
    
       </DIV>
      </div>
          <?php endforeach;?>
    </div>
    
    
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                 <h4 class="pb-3 fw-5"> All Event</h4>
                 <table class="table table-bordered table-striped text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Event Name</th>
                            <th>Place</th>
                            <th>Location</th>
                            <th>Event Starting Date</th>
                            <th>Event End Date</th>
                            <th>Book Event</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($Events as $row):?>
                            <?php if($row->EventStartDate > date('Y-m-d')):?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row->EventName ?></td>
                                    <td><?php echo $row->EventPlace ?></td>
                                    <td><?php echo $row->Location ?></td>
                                    <td><?php echo $row->EventStartDate ?></td>
                                    <td><?php echo $row->EventEndDate ?></td>
                                    <td><a href="<?php echo base_url();?>Meeting/Buyer/Event/EventCreat" class="btn btn-danger">Book Event</a></td>
                                </tr>
                                <?php $i++; endif; ?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




   
    