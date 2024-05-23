   <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<style type="text/css">
  .body-bg-color .mb-2 {
    padding: 0px 15px 6px 10px;
  }

  .body-bg-color h4 {
    padding-bottom: 6px;
  }

  label {
    display: inline-block;
    margin-bottom: 0.5rem;
    font-size: 14px;
    color: #353535;
  }

  .form-control {
    display: block;
    width: 100%;
    height: 36px;
    padding: 0.375rem 0.75rem;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.5;
    color: #777777;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #b3b3b3;
    border-radius: 0.25rem;
    -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
    
  }

  .form-body-padding {
    padding: 20px;
    border: 1px solid #ddd;
    background-color: #fff;
  }

  .om-submit-btn {
    padding: 5px 10px 5px 10px !important;
    background-color: #ec1e24;
    width: 120px;
    margin-bottom: 25px;
    border: 1px solid #da0c12;
  }

  .event-detailss h2 {
    padding-bottom: 15px;
    font-size: 25px;
  }

  .event-detailss {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    padding: 10px;
  }

  .event-detailss-list li {
    padding: 6px 0px 6px 0px !important;
    font-size: 15px;
    padding-bottom: 13px !important;
  }

  .event-detailss img {
    margin-bottom: 12px;
  }
  .p-0 {
    padding: 0!important;
    color: red;
    font-weight: 500;
    border-bottom: 1px solid #c3c1c1;
    padding-bottom: 7px !important;
   }
   
   .h4, h4 {
    font-size: 1.4rem !important;
    padding-bottom: 15px !important;
    padding-top: 8px !important;
}
.ql-editor p, .ql-editor ol, .ql-editor ul, .ql-editor pre, .ql-editor blockquote, .ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6 {
    margin: 0;
    padding: 0;
    counter-reset: list-1 list-2 list-3 list-4 list-5 list-6 list-7 list-8 list-9;
    line-height: 30px;
}

.ql-snow .ql-editor h5 {
    font-size: 18px;
    font-weight: 600;
    padding-top: 15px;
    color: #212121;
    padding-bottom: 15px;
}

.last-event-imgg img {
    height: 100%;
    width: 100%;
}

</style>



 <style type="text/css">
   .event-details-body img{
    margin-bottom: 10px !important;
}
    .event-details-body p{
        padding-top: 5px;
    }
    
     .event-details-body span{
        font-size: 15px; 
        margin-bottom: 10px !important;
        padding-left: 10px;
        color: #3c3c3c;
    }

    .event-details-body{
        border: 1px solid #ccc;
        padding: 10px;
    }
    .event-details-body i{
        color: #000;
    }

    .active-event-heading-phone{
        float: right;
    }

    .gt-event-status-phone i{
        color: red !important;
    }

    .gt-event-status i{
     color: #fff !important;
     margin-right: 5px;
    }
    #wrapper #content-wrapper{
        background-color: #fff;
    }

    .gt-event-status {
    position: absolute;
    z-index: 1;
    bottom: 337px;
    left: 31px;
    font-size: 13px;
    text-transform: uppercase;
    list-style: none;
    margin: 0;
    background: #ea2024;
    padding: 7px 20px;
    border-radius: 10px;
    font-weight: 300;
    padding: 8px !important;
    color: #fff;
}

.gt-event-status-phone {
    position: absolute;
    z-index: 1;
    bottom: 337px;
    left: 270px;
    font-size: 13px;
    text-transform: uppercase;
    list-style: none;
    margin: 0;
    background: #fdfdfd;
    padding: 7px 20px;
    border-radius: 10px;
    font-weight: 300;
    padding: 8px !important;
    color: #131313;
}

.bottom-text-ii {
      overflow: auto;
    height: 640px;
    }
    /* Customize the main body scrollbar */
.body-bg-color {
    scrollbar-width: thin;
    scrollbar-color: #232121 #fff; /* thumb and track color */
}

/* WebKit browsers (Chrome, Safari) */
.body-bg-color::-webkit-scrollbar {
    width: 12px;
}

.body-bg-color::-webkit-scrollbar-thumb {
    background-color: #ec1e24; /* thumb color */
}

.body-bg-color::-webkit-scrollbar-track {
    background-color: #fff; /* track color */
}

/* Customize the scrollbar inside the .bottom-text-ii container */
.bottom-text-ii {
    scrollbar-width: thin;
    scrollbar-color: #232121 #fff;
}

.bottom-text-ii::-webkit-scrollbar {
    width: 12px;
}

.bottom-text-ii::-webkit-scrollbar-thumb {
    background-color: #232121;
}

.bottom-text-ii::-webkit-scrollbar-track {
    background-color: #fff;
}

 .last-event-imgg {
    background-color: #f7f7f7;
    padding: 21px;
    border-radius: 5px;
}

.form-body-padding {
    padding: 20px;
    border: 1px solid #ddd;
    background-color: #fff;
    margin-top: 26px;
}

.last-event-imgg {
    background-color: #f7f7f7;
    padding: 21px;
    border-radius: 5px;
    margin-top: 20px;
}

@media only screen and (max-width: 600px) {
  .p-0 {
    padding: 11px 0px 11px 0px !important;
  }
  
.form-body-padding {
    padding: 10px !important;
    margin-top: 15px !important;
}
.bottom-text-ii {
   scrollbar-width: none !important;
}
}


 </style>


<section class="body-bg-color">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 bottom-text-ii">
              <h4 class="mb-4">Event Create</h4>

        <form id="eventForm" class="form-body-padding">
          <div class="form-row">
            <!--  Event ID -->
            <div class="col-md-12 mb-2">
              <label for="EventName">
                <i class="fas fa-user"></i> Event Name
              </label>
              <input type="name" class="form-control" id="Event_Name" name="Event_Name" placeholder="Event Name"
                required>
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="Country">
                <i class="fas fa-user"></i> Country
              </label>
              <input type="name" class="form-control" id="Country" name="Country" placeholder="Country"
                required>
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="EventName">
                <i class="fas fa-user"></i> Place
              </label>
              <input type="name" class="form-control" id="Event_Place" name="Event_Place" placeholder="Event Place"
                required>
            </div>
            
           
            <!--Event Start Date -->
            <div class="col-md-12 mb-2">
              <label for="EventTime">
                <i class="fas fa-calendar-alt"></i> Event Start Date
              </label>
              <input type="date" class="form-control" id="Event_Start_Date" name="Event_Start_Date"
                placeholder="Event Start Date" required>
            </div>

            <!--Event End Date ---->
            <div class="col-md-12 mb-2">
              <label for="EventTime">
                <i class="fas fa-calendar-alt"></i> Event End Date
              </label>
              <input type="date" class="form-control" id="Event_End_Date" name="Event_End_Date"
                placeholder="Event End Date" required>
            </div>
           
             <!-- Location-->
             
           <div class="col-md-12 mb-2">
              <label for="Location">
                <i class="fas fa-map-marker-alt"></i> Location
              </label>
              <input type="text" class="form-control" id="Location" name="Location" placeholder="Location">
            </div>
            
            <!----------Event image---->
            <div class="col-md-12 mb-2">
              <label for="Eventimg">
                <i class="fas fa-users"></i> Event image
              </label>
              <!-- <input type="file" id="img" name="img" accept="image/*"> -->
             <input type="file" class="form-control" id="Event_image" name="Event_image" placeholder="Event image" required accept=".jpg, .jpeg">
            </div>

            <!-- Event Name -->
           
            <div class="col-md-6 mb-2">
              <label for="PhoneNumber mx-2">
                <i class="fas fa-phone"></i> Phone Number
              </label>
              <input type="number" class="form-control" id="Phone_Number" name="Phone_Number" placeholder=" Phone Number">
            </div>

            
            <!-- Email ID -->
            <div class="col-md-6 mb-2">
              <label for="EmailID mx-2">
                <i class="fas fa-envelope"></i> Email ID
              </label>
              <input type="email" class="form-control" id="Email" name="Email" placeholder="Email ID">
            </div>
             <div class="col-md-4 p-2" >
                    <label for="Seller_fees"  class="mx-3">Seller fees: <span>*</span></label>
                    <input type="tel" name="Seller_fees" id="Seller_fees" class="form-control" required="">
                    
                </div>
                <div class="col-md-4 p-2" >
                    <label for="Hosted_Buyer"  class="mx-3">Hosted Buyer: <span>*</span></label>
                    <input type="tel" name="Hosted_Buyer_Fees" id="Hosted_Buyer" class="form-control" required="">
                    
                </div>
                
                <div class="col-md-4 p-2" >
                    <label for="Non_Hosted_Buyer"  class="mx-3">Non Hosted Buyer: <span>*</span></label>
                    <input type="tel" name="Non_Hosted_Buyer_Fees" id="Non_Hosted_Buyer" class="form-control" required="">
                    
                </div>
              <div class="col-md-12 mb-2">
               <div >
                <label for="editor">Type your text:</label>
                <div id="editor" style="height: 300px;" name="Description">
                    <div class="">
                <h5>TERMS &amp; CONDITIONS</h5>
        
                <p class="mt-3">
                    1. Pre-registration is mandatory.<br>
                    2. Reimbursement up to ₹ 4,000/.<br>
                    3 Refundable travel fare to be processed within 20 business days post-event, upon submission of original air/train/bus tickets<br>
                    4. Airlines, Hotels, DMCs, and consolidators cannot register as buyers. They must register as exhibitors.<br>
                    5. Information submitted in this form will go through a qualification process to ensure that they meet the criteria
                    of a registered/hosted buyer, after which a confirmation email will be sent to you. Only Outstation buyers can avail our Hosted buyer Programme by Paying a Token amount of Rs 1200/- *conditions apply*<br>
                    6. Sampan Media reserves the right to cancel a Registred/hosted buyer registration if it becomes clear that the buyer is unable to fulfill their commitment to us or has provided false Information.<br>
                    7. The first 20 outstation buyers will get the same venue hotel.<br>
                    8. You can pool in the car (subject to mini. 3/4 buyers) from your city and fuel cost will be reimbursed @ rs 8 per km. <br>
                </p>
        
                <p class="mt-1">
                    </p><ul class="m-0 p-0">
                        The hosted buyers program includes:
                        <li>
                            a. Accommodation on twin sharing<br> b. Dinner on 16 March<br> c. Breakfast on 17 March
                        </li>
                    </ul>
                <p></p>
            </div>
                </div>

    <!--          <textarea class="form-control" id="text-area"  style="width: 100%;-->
    <!--height: 281px;-->
    <!--padding: 0;-->
    <!--margin: 0;">-->
    <!--          </textarea>-->
             </div>
             </div>

            <div class="col-md-12 mb-2">
             <div class="form-group">
                <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                 <input type="checkbox" class="custom-control-input" id="customCheck">
                 <label class="custom-control-label" for="customCheck">Approved
                     </label>
                    </div>
                 </div>
                    
            <button  type="submit" id="submitEvent" class="om-submit-btn btn btn-primary mt-3 mx-3">Submit</button>
             </div>
          </div>
        </form>
      </div>
      
      
      
      
       <!-- Last Event Done -->
<div class="col-lg-6 bottom-text-ii">
    <div class="row">
        <div class="col-lg-12">
            <?php
            $upcoming_event_exists = false;
            $first_event = true;
            foreach ($view_Event as $row) {
                   if ($row->EventStartDate > date("Y-m-d H:i:s") ) {
                if ($first_event && $row->EventStartDate >= date("Y-m-d H:i:s") ) {
                    ?>
                    <h4>Active Event</h4>
                    <div class="last-event-imgg">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <img src="<?= base_url() ?>assets/Meeting/Event_image/<?= $row->EventImage ?>" style="border-radius: 20px;" width="100%">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12" style="position: relative">
                                <h5 class="p-0 m-0"><?= $row->EventName ?></h5>
                                <small>Event Place: <?= $row->EventPlace ?></small>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small>Event Start Time: <?= $row->EventStartDate ?></small>
                                        </div>
                                        <div class="col-md-6">
                                            <small>Event End Time: <?= $row->EventEndDate ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <small>Location: <?= $row->Location ?></small>
                                </div>
                                
                                <div class="mt-2">
                                         <button class="btn btn-danger update-event-btn" data-event-id="<?= $row->EventID ?>" data-event-data="<?= base64_encode(json_encode($row)) ?>" style="font-size: 12px;">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                    $first_event = false;
                } else {
                    if (!$upcoming_event_exists) {
                        echo "<h4>Upcoming Events</h4>";
                        $upcoming_event_exists = true;
                    }
                    ?>
                    <div class="last-event-imgg">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <img src="<?= base_url() ?>assets/Meeting/Event_image/<?= $row->EventImage ?>" style="border-radius: 20px;" width="100%">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12" style="position: relative">
                                <h5 class="p-0 m-0"><?= $row->EventName ?></h5>
                                <small>Event Place: <?= $row->EventPlace ?></small>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small>Event Start Time: <?= $row->EventStartDate ?></small>
                                        </div>
                                        <div class="col-md-6">
                                            <small>Event End Time: <?= $row->EventEndDate ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <small>Location: <?= $row->Location ?></small>
                                </div>
                                <div class="mt-2">
                                         <button class="btn btn-danger update-event-btn" data-event-id="<?= $row->EventID ?>" data-event-data="<?= base64_encode(json_encode($row)) ?>" style="font-size: 12px;">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
            }
            }
            if (!$upcoming_event_exists) {
                echo "<p>No upcoming events currently.</p>";
            }
            ?>
        </div>
    </div>
</div>


<!-- Update Event Modal -->
<div class="modal" id="updateEventModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Event</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="updateEventForm">
                    <div class="form-group" id="eventDataDisplay">
                      
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script >
$(document).ready(function(){
    $('.update-event-btn').click(function(){
        // Get the event data from the button's data attributes
      var eventDataString = $(this).data('event-data');
        var eventDataJson = atob(eventDataString); // Decode base64 string
        var eventData = JSON.parse(eventDataJson); // Parse as JSON
    
        // Set event details as inputs in a form
        var html = `
            <form id="updateEventForm">
                    <input type="hidden" id="eventIdInput" name="EventID" class="form-control" value="${eventData.EventID}">
                <div class="form-group">
                    <label for="countryInput">Country:</label>
                    <input type="text" id="countryInput" name="Country" class="form-control" value="${eventData.Country}">
                </div>
                <div class="form-group">
                    <label for="eventNameInput">Event Name:</label>
                    <input type="text" id="eventNameInput" name="EventName" class="form-control" value="${eventData.EventName}">
                </div>
                <div class="form-group">
                    <label for="eventPlaceInput">Event Place:</label>
                    <input type="text" id="eventPlaceInput" name="EventPlace" class="form-control" value="${eventData.EventPlace}">
                </div>
                <div class="form-group">
                    <label for="eventStartDateInput">Event Start Date:</label>
                    <input type="text" id="eventStartDateInput" name="EventStartDate" class="form-control" value="${eventData.EventStartDate}">
                </div>
                <div class="form-group">
                    <label for="eventEndDateInput">Event End Date:</label>
                    <input type="text" id="eventEndDateInput" name="EventEndDate" class="form-control" value="${eventData.EventEndDate}">
                </div>
                <div class="form-group">
                    <label for="locationInput">Location:</label>
                    <input type="text" id="locationInput" name="Location" class="form-control" value="${eventData.Location}">
                </div>
                <div class="form-group">
                    <label for="phoneNumberInput">Phone Number:</label>
                    <input type="text" id="phoneNumberInput" name="Phone_Number" class="form-control" value="${eventData.Phone_Number}">
                </div>
                <div class="form-group">
                    <label for="emailInput">Email:</label>
                    <input type="text" id="emailInput" name="Email" class="form-control" value="${eventData.Email}">
                </div>
                 <div class="form-group" >
                    <label for="Seller_fees"  class="mx-3">Seller fees: <span>*</span></label>
                    <input type="number" name="Seller_fees" id="Seller_fees" class="form-control" required="" value="${eventData.Seller_fees}">
                    
                </div>
                <div class="form-group" >
                    <label for="Hosted_Buyer"  class="mx-3">Hosted Buyer: <span>*</span></label>
                    <input type="number" name="Hosted_Buyer_Fees" id="Hosted_Buyer" class="form-control" required="" value="${eventData.Hosted_Buyer_Fees}">
                    
                </div>
                
                <div class="form-group" >
                    <label for="Non_Hosted_Buyer"  class="mx-3">Non Hosted Buyer: <span>*</span></label>
                    <input type="number" name="Non_Hosted_Buyer_Fees" id="Non_Hosted_Buyer" class="form-control" required="" value="${eventData.Non_Hosted_Buyer_Fees}">
                    
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        `;

        // Set modal body HTML
        $('#eventDataDisplay').html(html);

        // Open the modal
        $('#updateEventModal').modal('show');

        // AJAX to update the event
        $('#updateEventForm').submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '<?php base_url();?>/Meeting/Admin/Event/Event_Update',
                type: 'POST',
                data: formData,
                success: function(response){
                     $('#updateEventModal').modal('hide');
                     location.reload();
                },
                error: function(xhr, status, error){
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
    });
});
</script>

<script>
$(document).ready(function() {
    // Attach a submit handler to the form
    $('#eventForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Create a FormData object to store form data, including the image
        var quillContent = quill.root.innerHTML;

        // Set the HTML content to the hidden input
        $('#Description').val(quillContent);

        // Continue with your form submission logic
        var formData = new FormData($(this)[0]);

        // Append Quill content to FormData
        formData.append('Description', quillContent);

        // Perform the AJAX request
        $.ajax({
            url: '<?php echo base_url()?>Meeting/Admin/Event/EventCreatInsert',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle the success response
                console.log(response);

                // Show success pop-up using SweetAlert2
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Event Creat successfully.',
                }).then(function() {
                    // Reload the page after the user clicks "OK" on the success pop-up
                    location.reload();
                });
            },
            error: function(error) {
                // Handle the error
                console.error(error);
            }
        });
    });
});

</script>

    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
            