
<style>
    .make_show span{
    font-size:35px;color:#ed1a21;padding:0;margin:0
}

.make_show span:hover{
    font-size:35px;color:#ed1a21;padding:0;margin:0
}
.make_show img {
    width:100%;
}
@media only screen and (min-width: 600px) {
 
 .make_show img {
    width:50%;
}
}
</style>
 <section>
<div class="container " style="padding-top:90px">
     <h2 class="text-center">
         <spam style="border-bottom:1px solid black">
          <?php
            include('config.php');
            
            
            $currentURL = $_SERVER['REQUEST_URI'];
            
$segments = explode('/', trim(parse_url($currentURL, PHP_URL_PATH), '/'));

// Get the last two segments
if (count($segments) >= 2) {
    $lastSegment = $segments[count($segments) - 1];
    $secondToLastSegment = $segments[count($segments) - 2];

    // echo "Last Segment: " . $lastSegment . "<br>";

} else {
    // Handle the case where there are not enough segments
    echo "URL doesn't have at least two segments.";
}

            $parts = explode('/', $currentURL);
            $lastValue = end($parts);
            $query = "SELECT * FROM calendar WHERE `Name`='$secondToLastSegment'";
            $result = mysqli_query($config, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            $demo_give =  $row['Name'];
            
                echo  strtoupper($row['Name']) . ' | '  ?><spam style="color:red"><?php echo $row['Date'];?></spam><?php 
            }
            ?>
            </spam>
     </h2>
     <br>
    <div class="row border mb-4 pb-4 pt-4">
        <div class="col-md-6 col-sm-6 col-12">
             <?php
            include('config.php');
                    $currentURL = $_SERVER['REQUEST_URI'];
                                
                    $segments = explode('/', trim(parse_url($currentURL, PHP_URL_PATH), '/'));
                    
                    // Get the last two segments
                    if (count($segments) >= 2) {
                        $lastSegment = $segments[count($segments) - 1];
                        $secondToLastSegment = $segments[count($segments) - 2];
                    
                        // echo "Last Segment: " . $lastSegment . "<br>";
                    }
            $query = "SELECT * FROM calendar WHERE `Name`='$secondToLastSegment'";
            $result = mysqli_query($config, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="make_show">
              <a href="pre-registration/<?php echo $row['Name']?>">
               <img src="<?php echo base_url();?>assets/image/<?php echo $row['Images_name']?>" alt="<?php echo $secondToLastSegment?>">
              </a>
            </div>
            <?php
            }
            ?>          
        </div>
        <div class="col-md-6">
         <div class="row">
              <div class="col-md-12 py-1">
                  <h5>Name <spam style="color:red">*</spam></h5>
                   <input type="text" class="form-control" placeholder="abcd" id="Name" required>
              </div>
              <div class="col-md-12 py-1">
                  <h5>Email <spam style="color:red">*</spam></h5>
                  <input type="email" class="form-control"  placeholder="abc@gmail.com" id="Email" required>
              </div>
              <div class="col-md-12 py-1">
                  <h5>Number <spam style="color:red">*</spam></h5>
                  <input type="tel" maxlength="10" class="form-control" placeholder="9999999999" id="Number" required>
              </div>
              <div class="col-md-12 py-1">
                  <h5>Buyer <spam style="color:red">*</spam></h5>
                  <?php 
                  $currentURL = $_SERVER['REQUEST_URI'];
                        
            $segments = explode('/', trim(parse_url($currentURL, PHP_URL_PATH), '/'));
            
            // Get the last two segments
            if (count($segments) >= 2) {
                $lastSegment = $segments[count($segments) - 1];
                $secondToLastSegment = $segments[count($segments) - 2];
            
                
            if($lastSegment == 'asbuyer' ){
                 ?>
                  
                  <select class="form-control form-select" id="Buyer">
                       <option >Select Category</option>
                        <option value="Day Buyer">Day Buyer</option>
                        <option value="Hosted Buyer"> Hosted Buyer</option>
                   </select>
                 
                 <?php
            }
            
            if($lastSegment == 'asHosted' ){
                ?>
                 <select class="form-control form-select" id="Buyer">
                      <option >Select Category</option>
                         <option value="Destination Management Companies">Destination Management Companies</option>
                        <option value="International/State Tourism Boards">International/State Tourism Boards</option>
                        <option value="Hotels & Resorts">Hotels & Resorts</option>
                          <option value="Visa Facilitation Companies">Visa Facilitation Companies</option>
                           <option value="Cruise Lines">Cruise Lines</option>
                           <option value="Cruise Specialist">Cruise Specialist</option>
                           <option value="Airlines">Airlines</option>
                           <option value="Car Rental Companies">Car Rental Companies</option>
                           <option value="Rail Services">Rail Services</option>
                           <option value="B2B Travel Consolidators">B2B Travel Consolidators</option>
                           <option value="Travel Technology">Travel Technology</option>
                           <option value="Other">Other</option>
                   </select>
                <?php
            }
            } else {
                // Handle the case where there are not enough segments
                echo "URL doesn't have at least two segments.";
            }
                  ?>
              </div>
              <div class="col-md-12 py-1">
                   <h5>Location <spam style="color:red">*</spam></h5>
                  <input type="text" class="form-control" id="Location" required>
              </div>
              <div class="col-md-12 py-1 text-center">
                  <input type="hidden" class="btn" id="Place" value="<?php echo $lastValue ?>" style="background:#ed1a21;color:white">
                  <input type="Submit"  id="form_submited"  class=" btn " style="background:#ed1a21;color:white">
              </div>
              <div class="col-md-12">
                 <b> Note<span class="text-danger"> *</span></b> <br>
                 <p><b>Day Buyer</b>: For Local Travel Agents </p>
                 <p><b>Hosted Buyer</b>: For Outstation Travel Agents </p>
                 
              </div>
         </div> 
         
        </div>
    </div>
</div>
</section>
<script>
     
      
      $(document).ready(function () {
            
            $("#Email").blur(function() {
                var email = $("#Email").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>PreRegistration/checkEmail", // Replace with your server-side script
                    data: { email: email }, // Pass email as a key-value pair
                    success: function(response) {
                        if (response === 'not_ok') {
                            $("input[type='text']").val('');
                                $("input[type='email']").val('');
                            alert("Mail id is already submitted");
                        }
                    }
                });
            });
     
     
     
            $("#form_submited").click(function (e) {
                    e.preventDefault(); // Prevent the default form submission
                var page_name = "<?php echo $demo_give  ?>";
                var name = $("#Name").val();
                var email = $("#Email").val();
                var number = $("#Number").val();
                var location = $("#Location").val();
                var Place = $("#Place").val();
                var Buyer = $("#Buyer").val();
                // Validate form data here if needed

                // Prepare the data to send
                var formData = {
                    Name: name,
                    Email: email,
                    Number: number,
                    Location: location,
                    Place : Place,
                    Buyer : Buyer,
                    page_name : page_name
                };

                // Send the data to the server using AJAX
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>PreRegistration/processRegistration", // Replace with your server-side script
                    data: formData,
                    success: function (response) {
                        if(response == '1'){
                          alert("Thank you For Registertion");  
                           $("input[type='text']").val('');
                             $("input[type='email']").val('');
                              $("input[type='tel']").val('');
                        }
                        if(response == 'not_ok'){
                            alert("Change The email ID");
                             $("input[type='text']").val('');
                              $("input[type='tel']").val('');
                        }
                    }
                });
            });
        });
</script>