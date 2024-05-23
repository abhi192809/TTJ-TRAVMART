<style type="text/css">
  .body-bg-color .mb-3 {
    padding: 0px 15px 6px 10px;
}
.form-control {
    display: block;
    width: 100%;
    height: 35px;
    padding: 0.275rem 0.45rem;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.5;
    color: #6f6767;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: 0.25rem;
    -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    margin-left: 10px;
}

.border {
    border: 1px solid #dee2e6 !important;
    padding: 10px 30px 10px 10px;
}
.p-2 {
    padding: 0.5rem!important;
}
label{
  font-size: 16px !important;
}
.buyer-submit-btn{
  background-color: #ff1400;
  color: #fff;
  padding: 5px;
}
.term-condition-content h5 {
    padding-top: 20px;
    font-weight: 700;
    font-size: 22px;
    letter-spacing: 1px;
}
.term-condition-content li{
  line-height: 39px;
}
.rotate-190 {
    transform: rotate(190deg);
  }
  
  .share-btnnn {
    border-radius: 5px;
    box-shadow: 2px 2px 11px 0px #747474;
    padding: 5px;
    font-size: 15px;
    margin: 8px;
}
  
</style>
  
  
  <h3 style="font-weight: bold;color: #343333;">
            <spam style="color:red"><a class="text-danger" href="<?php echo  base_url() ?>/Meeting/Admin/buyer/buyer_ragistation_appreal_request"><span class="share-btnnn"><i class="fa fa-share rotate-190" id="backButton"></i> Last </span></a> Event </spam> Buyer  Entry <small class="text-danger">CSV file upload </small>
  </h3>
<br>

    <form action="<?php echo base_url('Meeting/Admin/Buyer/upload_csv');?>" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <input type="file" name="csv_file" class="form-control" id="csv_file" accept=".csv" required>
                    <br>
                </div>
                <div  class="col-md-6 col-sm-6 col-12">
                    <button class="btn btn-danger" type="submit">Upload</button>
                </div>
            </div>
        </div>
    </form>





<?php if($Event):?>
<form id="buyerForm"   enctype="multipart/form-data">
<section class="body-bg-color">

<div class="container-fluid ">
    <div class="row p-2">
        <div class="mb-3 col-md-12">
            
            <h3 style="font-weight: bold;color: #343333;">
            <spam style="color:red"><a class="text-danger" href="<?php echo  base_url() ?>/Meeting/Admin/buyer/buyer_ragistation_appreal_request"><span class="share-btnnn"><i class="fa fa-share rotate-190" id="backButton"></i> Back</span></a> Buyer</spam>  Register Now 
        </h3>
        </div>
        <div class="col-md-12 col-sm-12 col-12 border" style="      box-shadow: 14px 0px 0px 12px #dcd6d6;
    padding: 24px;
    border-radius: 44px 7px 10px 10px">
            <div class="row">
                <div class="col-md-4">
                     <label for="name" class="mx-3">Select The Event: <span>*</span></label>
                        <select name="EventID" class="form-control">
                            <?php
                            echo '<option value="">Select The Event</option>';
                            foreach($Event as $row){
                                if($row->EventStartDate > date('Y-m-d')){
                                    echo '<option value="'.$row->EventID.'">'.$row->EventName.'</option>';           
                                }
                            }
                            ?>
                        </select>
                </div>
                <div class="col-md-4 p-2">
                    <label for="name"  class="mx-3">Logo: <span>*</span></label>
                    <input type="file" name="Logo" id="Logo" class="form-control" required="" accept=".png, .jpg">

                </div>
                <div class="col-md-4 p-2">
                    <label for="name"  class="mx-3">Name: <span>*</span></label>
                    <input type="text" name="Name" id="name" class="form-control" required="">
                </div>
                <div class="col-md-4 p-2">
                    <label for="designation"  class="mx-3">Designation: <span>*</span></label>
                     <input type="text" name="Designation" id="designation" class="form-control" required="">
                </div>
                <div class="col-md-4 p-2">
                    <label for="company_name"  class="mx-3">Your Company Name: <span>*</span></label>
                    <input type="text" name="Your_Company_Name" id="company_name" class="form-control" required="">
                </div>
                <div class="col-md-4 p-2">
                    <label for="nature_of_business"  class="mx-3">Nature of Business: <span>*</span></label>
                        <select name="Nature_of_Business" id="nature_of_business" class="form-control" required="">
                        <option value="">Select Your Nature of Business</option>
                        <?php foreach($Nature_of_Business as $row):?>
                        <option value="<?= $row->Nature_of_Business ?>"><?= $row->Nature_of_Business ?></option>
                        <?php endforeach;?>
                      
                    </select>        
                </div>
                <div class="col-md-4 p-2">
                    <label for="business_category"  class="mx-3">Business Category: <span>*</span></label>
                        <select name="Business_Category" id="business_category" class="form-control" required="">
                            <option value="">Select Your Business Category</option>
                            <?php foreach($Business_Category_Master as $row):?>
                            <option value="<?= $row->Business_Category ?>"><?= $row->Business_Category ?></option>
                            <?php endforeach;?>
                        </select>        
                </div>
                <div class="col-md-4 p-2">
                    <label for="company_address"  class="mx-3">Company Address: <span>*</span></label>
                    <input type="text" name="Company_Address" id="company_address" class="form-control" required="">        
                </div>
                <div class="col-md-4 p-2">
                    <label for="annual_turnover"  class="mx-3">Annual Turnover: <span>*</span></label>
                    <input type="text" name="Annual_Turnover" id="annual_turnover" class="form-control" required="">
                </div>
                <div class="col-md-4 p-2">
                    <label for="year_commencement"  class="mx-3">Year of Commencement of Business: <span>*</span></label>
                    <input type="text" name="Year_Commencement" id="year_commencement" class="form-control" required="">
                </div>
                <div class="col-md-4 p-2">
                    <label for="destinations"  class="mx-3">Destinations: <span>*</span></label>
                    <input type="text" name="Destinations" id="destinations" class="form-control" required="">
                </div>
                <div class="col-md-4 p-2">
                    <label for="trade_associations"  class="mx-3">Trade Associations: <span>*</span></label>
                    <input type="text" name="Trade_Associations" id="trade_associations" class="form-control" required="">
                                
                </div>
                <div class="col-md-3 p-2">
                    <label for="Country"  class="mx-3">Country <span>*</span></label>
                    <input type="text" name="Country" id="Country" class="form-control" required="">
                </div>
                <div class="col-md-3 p-2">
                    <label for="city"  class="mx-3">City <span>*</span></label>
                    <input type="text" name="City" id="city" class="form-control" required="">
                </div>
                <div class="col-md-3 p-2">
                    <label for="pin_code"  class="mx-3">Pin Code: <span>*</span></label>
                    <input type="text" name="Pin_Code" id="pin_code" class="form-control" required="">
                </div>
                <div class="col-md-3 p-2">
                    <label for="email"  class="mx-3">Email: <span>*</span></label>
                    <input type="email" name="Email" id="email" class="form-control" required="">
                </div>
                <div class="col-md-4 p-2" >
                    <label for="mobile_number"  class="mx-3">Mobile Number: <span>*</span></label>
                    <input type="tel" name="Mobile_Number" id="mobile_number" class="form-control" required="">
                    
                </div>
        
                <div class="col-md-4 mb-2">
                    <input type="hidden" > <input type="submit" class="buyer-submit-btn form-control btn btn-success mt-5" value="Submit">
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
</form>
<?php endif;?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(document).ready(function() {
  
    $("#email, #company_name").on('keyup', function() {
        // Retrieve the values of email and company name
        var email = $("#email").val();
        var companyName = $("#company_name").val();

        // Check if both email and company name are filled out
        if (email && companyName) {
            // Send AJAX request to check for duplicate
            $.ajax({
                url: '<?= base_url() ?>Meeting/Admin/Buyer/CheckDuplicate',
                type: 'post',
                data: {email: email, companyName: companyName},
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'error') {
                        // If duplicate entry is found, transfer input values to placeholders and make input fields red
                        $("#email").attr('placeholder', email).val('').addClass('is-invalid');
                        $("#company_name").attr('placeholder', companyName).val('').addClass('is-invalid');
                    } else {
                        // If no duplicate, remove red color from input fields
                        $("#email, #company_name").removeClass('is-invalid');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
});

    $(document).ready(function() {
        $("#buyerForm").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url() ?>Meeting/Admin/Buyer/Submit_the_buyer_form',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Form Submitted Successfully!',
                            text: response.message,
                        });
                         $("#buyerForm")[0].reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops... Something went wrong!',
                            text: response.message,
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
