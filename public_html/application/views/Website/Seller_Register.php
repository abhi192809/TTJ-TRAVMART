<style>
    .form-row{
        border: 1px solid #ddd;
        padding: 37px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    /*.Seller-Register-form{*/
    /* padding: 30px 50px 50px 50px    */
    /*}*/
    .form-row i{
     margin-right: 5px;
    }
    
    .rotate-190 {
    transform: rotate(190deg);
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d7d7d7;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.375rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
    margin-bottom: 10px;
}

@media screen and (max-width: 992px) {
 .Seller-Register-form {
    padding: 9px 0px 0px 0px !important;
  }
}


.ul-li-list-icon li{
list-style-type: circle;     
}


.ul-li-list-icon li a{
    text-decoration: none;
}

.share-btnnn {
    border-radius: 5px;
    box-shadow: 2px 2px 11px 0px #747474;
    padding: 5px;
    font-size: 15px;
    margin: 8px;
}

.font-ss li {
    font-size: 18px;
    padding-bottom: 7px;
    font-weight: 500;
    list-style-type: circle;
  }
  
</style>

<section class="Seller-Register-form">
 <div class="container">
 <div class="mb-3 col-md-12">
            
            <h3 style="font-weight: bold;color: #343333;" class="mt-3" >
            <spam style="color:red;"><a class="text-danger " href="#" contenteditable="false" style="cursor: pointer;"></a> Register as a TTJ TRAVMART  </spam>  SELLER / EXHIBITOR
        </h3>
        </div>
  
  
  
  <p style="font-size: 18px; color: #2c2c2c;">ALL B2B Tour operators, Airticket consolidators,  Hotels, Transporters, Airlines, Cruiselines, Car rental companies, DMC's, Tourism boards,  Hotel Aggregators, Travel Tech companies and Visa Facilitation companies can register as a Seller/ Exhibitor  for our TTJ TRAVMARTS,  SITM & EITM, etc.</p>
   <ul class="font-ss ul-li-list-icon">
       <li> DOWNLOAD DETAILED BROCHURE FOR TTJ-TRAVMART <a href="<?= base_url();?>assets/Meeting/Event-pdf/TTJ_TRAVMART_2024-25_PPT.pdf" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Click now </a></li> 
       
       <li> DOWNLOAD DETAILED BROCHURE FOR EITM <a href="<?= base_url();?>assets/Meeting/Event-pdf/EITM.pdf" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Click now </a> </li>
       
       <li> DOWNLOAD DETAILED BROCHURE FOR SITM <a href="<?= base_url();?>assets/Meeting/Event-pdf/SITM.pdf" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Click now </a></li>
   </ul>
   
   <p style="font-size: 17px;">COMPLETE THE FORM BELOW AND OUR TEAM WILL GET IN TOUCH SOON AND  FINALISE YOUR PARTICIPATION  FORMALITIES.</p>
  
  
  
  <br>
  <!--<h4 class="form-data-heading mb-0"><span><i class="fas fa-arrow-left" id="backButton"></i></span> Seller Registration</h4>-->
  
<form id="sellerForm" enctype="multipart/form-data">


<div class="form-row">
 <div class="row">
     <!-- Reference ID -->

<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="companyName">
    <i class="fas fa-hashtag"></i>
  </label>
  
  <select class="form-control" name="ReferrerPerson" style="color:black">
  <option value="" selected="">Select Your Referrer Person</option>
  <?php foreach($Seller_Register as $row):?>
    <option value="<?= $row->id?>"><?= $row->fullName ?></option>
  <?php endforeach;?>
    <!-- Add more options as needed -->
</select>
</div>

<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="sellerName">
    <i class="fas fa-user"></i>
  </label>
  <input type="Name" class="form-control" id="sellerName" placeholder="Seller's Name" name="sellerName" required="">
</div>

<!-- Seller's Company Name -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="companyName">
    <i class="fas fa-building"></i>
  </label>
  <input type="company" class="form-control" id="companyName" name="companyName" placeholder="Seller's Company Name" required="">
</div>


<!-- Contact Information -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="phoneNumber">
    <i class="fas fa-phone"></i> 
  </label>
  <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Contact Information" required="">
</div>

<!-- Email -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="sellerEmail">
    <i class="fas fa-envelope"></i>
  </label>
  <input type="email" class="form-control" id="sellerEmail" name="sellerEmail" placeholder="Email" required="">
</div>

<!-- Physical Address -->
<div class="col-md-6 mb-3 d-flex align-items-center">
  <label for="physicalAddress">
    <i class="fas fa-map-marker-alt"></i> 
  </label>
  <textarea class="form-control" id="physicalAddress" name="physicalAddress" placeholder="Physical Address" required=""></textarea>
</div>

<!-- City -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="city">
    <i class="fas fa-city"></i> 
  </label>
  <input type="city" class="form-control" id="city" name="city" placeholder="City" required="">
</div>

<!-- County-->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="city">
    <i class="fas fa-city"></i> 
  </label>
  <input type="city" class="form-control" id="country" name="country" placeholder="Country" required="">
</div>

<!-- Pin Code -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="pinCode">
    <i class="fas fa-thumbtack"></i> 
  </label>
  <input type="text" class="form-control" id="pinCode" name="pinCode" placeholder="Pin Code" required="">
</div>

<!-- Website -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="website">
    <i class="fas fa-globe"></i> 
  </label>
  <input type="url" class="form-control" id="website" name="website" placeholder="Website">
</div>

<!-- PAN Number -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="panNumber">
    <i class="fas fa-id-card"></i> 
  </label>
  <input type="text" class="form-control" id="panNumber" placeholder="PAN Number" name="panNumber" ng-model="abc" ng-pattern="panCardRegex" title="Enter valid PAN number" required="">
</div>

<!-- GST Number -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="gstNumber">
    <i class="fas fa-id-badge"></i> 
  </label>
  <input type="text" class="form-control" id="gstNumber" name="gstNumber" placeholder="GST Number:" required="" title="Enter valid GST number">
</div>

<div class="col-md-3 mb-3 d-flex align-items-center">
    <label for="referenceId"><b>Logo Png</b></label>
    <input type="file" name="Logo" id="Logo" class="form-control" accept=".png" style="color:black">
</div>


<!-- License and Certifications -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="certifications">
    <i class="fas fa-certificate"></i> 
  </label>
   <input type="text" class="form-control" id="certifications" name="certifications" placeholder="License and Certifications" required="">
</div>

<!-- Experience -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="yearsInOperation">
    <i class="fas fa-calendar-alt"></i>
  </label>
  <input type="number" class="form-control" id="yearsInOperation" name="yearsInOperation" placeholder="Years in Operation" required="">
</div>

<!-- Industry Experience -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="industryExperience">
    <i class="fas fa-industry"></i> 
  </label>
  <input type="text" class="form-control" id="industryExperience" name="industryExperience" placeholder="Industry Experience" required="">
</div>

<!-- Annual Turnover -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="annualTurnover">
    <i class="fas fa-money-bill-alt"></i> 
  </label>
  <input type="number" class="form-control" id="annualTurnover" placeholder="Annual Turnover (INR)" name="annualTurnover" required="">
</div>
<!-- Services Offered -->

<!-- Contact Information -->
<div class="col-md-3 mb-3 d-flex align-items-center">
  <label for="phoneNumber">
    <i class="fas fa-phone"></i> 
  </label>
  <input type="tel" class="form-control" id="emergencyContacts" name="emergencyContacts" placeholder="Emergency Contacts" required="">
</div>

<div class="col-md-12">
    <h4>Select Your Event</h4>
    <hr>
    <br>
    <div class="row">
        <?php foreach($Event as $row): ?>
            <?php if($row->EventStartDate > date('Y-m-d')): ?>
                <div class="col-md-3">
                    <label>
                        <input type="checkbox" value="<?= $row->EventName ?>" data-eventid="<?= $row->EventName ?>"> <?= $row->EventName ?> 
                    </label>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
         <div class="col-md-3">
                    <label>
                        <input type="checkbox" value="ALL" data-eventid="ALl 2024"> ALL 2024
                    </label>
                </div>
                
         <div class="col-md-3">
                    <label>
                        <input type="checkbox" value="ALL" data-eventid="ALl 2025"> ALL 2025
                    </label>
                </div>
    </div>
</div>


  <div class="col-md-3 mb-3 d-flex align-items-center mt-4">
     <button class="om-submit-btn btn btn-danger" style="
    padding: 7px 24px 7px 19px; margin-bottom: 10px;">Submit</button>
   </div>
   
  
</div>
</div>
</form>
<br><br>

</div>
</section>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


$(document).ready(function() {
    $("#success-alert").hide(); // Hide the success alert initially

    // Function to check duplicate seller email
    $("#sellerEmail").on('keyup', function() {
        var email = $("#sellerEmail").val();
        if (email) {
            checkDuplicateSellerEmail(email);
        }
    });

    // Function to check duplicate company name
    $("#companyName").on('keyup', function() {
        var companyName = $("#companyName").val();
        if (companyName) {
            checkDuplicateCompanyName(companyName);
        }
    });

    function checkDuplicateSellerEmail(email) {
        $.ajax({
            url: '<?= base_url() ?>Seller_Registration/CheckDuplicateSellerEmail',
            type: 'post',
            data: { email: email },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'error') {
                    $("#sellerEmail").attr('placeholder', email).val('').addClass('is-invalid');
                     window.location.href = 'https://www.ttjtravmart.com/Meeting/login';
                } else {
                    $("#sellerEmail").removeClass('is-invalid');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function checkDuplicateCompanyName(companyName) {
        $.ajax({
            url: '<?= base_url() ?>Seller_Registration/CheckDuplicateCompanyName',
            type: 'post',
            data: { companyName: companyName },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'error') {
                    $("#companyName").attr('placeholder', companyName).val('').addClass('is-invalid');
                     window.location.href = 'https://www.ttjtravmart.com/Meeting/login';
                } else {
                    $("#companyName").removeClass('is-invalid');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
});

 $(document).ready(function() {
    $("#sellerForm").submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var logoFile = $("#Logo")[0].files[0];

        if (logoFile) {
            formData.append('Logo', logoFile);
        } else {
            console.error("No logo file selected");
            return;
        }

        var checkedEventNames = [];
        $("input[type=checkbox]:checked").each(function() {
            checkedEventNames.push($(this).val());
        });

        var eventNamesData = checkedEventNames.join(',');

        formData.append('EventNames', eventNamesData);

        submitForm(formData);
    });

    function submitForm(formData) {
        $.ajax({
            type: "POST",
            url: "<?= base_url()?>Seller_Registration/insertSeller",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response == 1) {
                    Swal.fire({
                        title: 'Success',
                        text: 'Seller Account Created Successfully. Please await verification.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        location.reload();
                    });
                }
            },
            error: function(error) {
                console.error("Error submitting form: " + JSON.stringify(error));
            }
        });
    }
});

</script>

