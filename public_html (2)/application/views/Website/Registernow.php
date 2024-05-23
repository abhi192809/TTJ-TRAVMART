<style>
    label span{
        color:red;
    }
</style>
<form action="<?php echo base_url(); ?>registernow/registration_form_submit" method="POST">
<div class="container">
    <div class="row">
        <div Class="text-center py-4 col-md-12"><h3 style="font-weight: bold;color: #343333;">
            <?php
            foreach($eventdata as $row){
             echo "<spam style='color:red'>".$row['Place']."</spam> Register Now ".$row['Date'];
            }
            ?>
            
        </h3></div>
        <div class="col-md-5 col-sm-12 col-12">
            <?php
                foreach($eventdata as $row){
            ?>
            <img src="<?php echo base_url()?>/assets/TTJ_Travmart_Event/<?php echo $row['images'] ?>" width="100%">
            <p class="mt-2" style="font-size: small;"><b>Venue</b>:- <?php echo $row['Venue']?></p>
            <p class="mt-2" style="font-size: small;"><b>Number</b>:- <?php echo $row['Contact']?></p>
            <p class="mt-2" style="font-size: small;"><b>Email ID</b>:- info@sampanmedia.com | info@ttjtravmart.com</p>
            
             <?php      
            }
            ?>
        </div>
        <div class="col-md-7 col-sm-12 col-12 border">
            <div class="row">
                <div class="col-md-6 p-2">
                    <label for="name">Name: <span>*</span></label>
                    <input type="text" name="Name" id="name" class="form-control" required>
                    
                </div>
                <div class="col-md-6 p-2">
                    <label for="designation">Designation: <span>*</span></label>
                     <input type="text" name="Designation" id="designation" class="form-control" required>
                </div>
                <div class="col-md-6 p-2">
                    <label for="company_name">Your Company Name: <span>*</span></label>
                    <input type="text" name="Your_Company_Name" id="company_name" class="form-control" required>
                </div>
                <div class="col-md-6 p-2">
                    <label for="nature_of_business">Nature of Business: <span>*</span></label>
                        <select name="Nature_of_Business" id="nature_of_business" class="form-control" required>
                        <option value="">Select Your Nature of Business</option>
                        <option value="Outbound">Outbound</option>
                        <option value="Inbound">Inbound</option>
                        <option value="Domestic">Domestic</option>
                        <option value="Corporate">Corporate</option>
                        <option value="Event Planner">Event Planner</option>
                        <option value="Other">Other</option>
                    </select>        
                </div>
                <div class="col-md-6 p-2">
                    <label for="business_category">Business Category: <span>*</span></label>
                        <select name="Business_Category" id="business_category" class="form-control" required>
                            <option value="">Select Your Business Category</option>
                            <option value="B2B">B2B</option>
                            <option value="B2C">B2C</option>
                            <option value="B2B & B2C">B2B & B2C</option>
                            <option value="Wedding Planner">Wedding Planner</option>
                            <option value="Event Planner">Event Planner</option>
                            <option value="Corporates">Corporates</option>
                        </select>        
                </div>
                <div class="col-md-6 p-2">
                    <label for="company_address">Company Address: <span>*</span></label>
                    <input type="text" name="Company_Address" id="company_address" class="form-control" required>        
                </div>
                <div class="col-md-6 p-2">
                    <label for="annual_turnover">Annual Turnover: <span>*</span></label>
                    <input type="text" name="Annual_Turnover" id="annual_turnover" class="form-control" required>
                </div>
                <div class="col-md-6 p-2">
                    <label for="year_commencement">Year of Commencement of Business: <span>*</span></label>
                    <input type="text" name="Year_Commencement" id="year_commencement" class="form-control" required>
                </div>
                <div class="col-md-6 p-2">
                    <label for="destinations">Destinations: <span>*</span></label>
                    <input type="text" name="Destinations" id="destinations" class="form-control" required>
                </div>
                <div class="col-md-6 p-2">
                    <label for="trade_associations">Trade Associations: <span>*</span></label>
                    <input type="text" name="Trade_Associations" id="trade_associations" class="form-control" required>
                                
                </div>
                <div class="col-md-2 p-2">
                    <label for="city">City <span>*</span></label>
                    <input type="text" name="City" id="city" class="form-control" required>
                </div>
                <div class="col-md-2 p-2">
                    <label for="pin_code">Pin Code: <span>*</span></label>
                    <input type="text" name="Pin_Code" id="pin_code" class="form-control" required>
                </div>
                <div class="col-md-4 p-2">
                    <label for="email">Email: <span>*</span></label>
                    <input type="email" name="Email" id="email" class="form-control" required>
                </div>
                <div class="col-md-4 p-2">
                    <label for="mobile_number">Mobile Number: <span>*</span></label>
                    <input type="tel" name="Mobile_Number" id="mobile_number" class="form-control" required>
                </div>
                <div class="col-md-12 mb-5">
                    <?php
                    include("config.php");
                       $query = mysqli_query($config, "SELECT * FROM `TTJ_Travmart_Event`WHERE `Active`='1'");
                        $data = mysqli_fetch_array($query);
                       echo"<input type='hidden' name='table_name' value='".$data['store_table_name']."'>";
                    ?>
                    <input type="submit" class="form-control btn btn-success mt-5" value="Submit">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="">
                <h5>TERMS & CONDITIONS</h5>
        
                <p class="mt-3">
                    1. Pre-registration is mandatory.<br>
                    2. Reimbursement up to ₹ 4,000/.<br>
                    • Refundable travel fare to be processed within 20 business days post-event, upon submission of original air/train/bus tickets<br>
                    3. Airlines, Hotels, DMCs, and consolidators cannot register as buyers. They must register as exhibitors.<br>
                    3. Information submitted in this form will go through a qualification process to ensure that they meet the criteria
                    of a registered/hosted buyer, after which a confirmation email will be sent to you. Only Outstation buyers can avail our Hosted buyer Programme by Paying a Token amount of Rs 1200/- *conditions apply*<br>
                    4. Sampan Media reserves the right to cancel a Registred/hosted buyer registration if it becomes clear that the buyer is unable to fulfill their commitment to us or has provided false Information.<br>
                    5. The first 20 outstation buyers will get the same venue hotel.<br>
                    6. You can pool in the car (subject to mini. 3/4 buyers) from your city and fuel cost will be reimbursed @ rs 8 per km. <br>
                </p>
        
                <p class="mt-1">
                    <ul class="m-0 p-0">
                        The hosted buyers program includes:
                        <li>
                            a. Accommodation on twin sharing<br> b. Dinner on  20 April<br> c. Breakfast on  21 April
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
</div>
</form>