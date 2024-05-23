 
  <style>


* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.bg-dark {
    background-color: #040404!important;
}

.nav ul {
    display: flex;
    justify-content: space-around;
    list-style-type: none;
    height: 40px;
    background: #d41d21 !important;
    box-shadow: 0px 2px 5px rgb(0 0 0 / 30%);
    color: #fff;
    /* margin-left: 27px; */
    width: 100%;
}

.nav ul li.active {
    box-shadow: 0px -3px 0px rgb(255 255 255) inset !important;
}

.profile-header {
  background: #fff;
  width: 100%;
  display: flex;
  height: 190px;
  position: relative;
}

.profile-img {
  float: left;
  width: 340px;
  height: 200px;
  
}

.profile-img img {
    /* border-radius: 50%; */
    height: 191px;
    width: 348px;
    border: 5px solid #fff;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    left: 50px;
    top: 20px;
    z-index: 5;
    background: #fff;
    padding: 34px;
}

.profile-nav-info {
  float: left;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-top: 60px;
}

.profile-nav-info h3 {
  font-variant: small-caps;
  font-size: 2rem;
  font-family: sans-serif;
  font-weight: bold;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 7px);
    padding: 0.375rem 0.75rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #807171;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d3d4d5;
    border-radius: 0.25rem;
    -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
}

.pb-3, .py-3 {
    padding-bottom: 1rem!important;
    text-align: left;
}

.profile-nav-info .address {
  display: flex;
  font-weight: bold;
  color: #777;
}

.profile-nav-info .address p {
  margin-right: 5px;
}

.profile-option {
  width: 40px;
  height: 40px;
  position: absolute;
  right: 50px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: all 0.5s ease-in-out;
  outline: none;
  background: #e40046;
}

.profile-option:hover {
  background: #fff;
  border: 1px solid #e40046;
}
.profile-option:hover .notification i {
  color: #e40046;
}

.profile-option:hover span {
  background: #e40046;
}

.profile-option .notification i {
  color: #fff;
  font-size: 1.2rem;
  transition: all 0.5s ease-in-out;
}

.profile-option .notification .alert-message {
  position: absolute;
  top: -5px;
  right: -5px;
  background: #fff;
  color: #e40046;
  border: 1px solid #e40046;
  padding: 5px;
  border-radius: 50%;
  height: 20px;
  width: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 0.8rem;
  font-weight: bold;
}

.main-bd {
  width: 100%;
  display: flex;
  padding-right: 15px;
}

.nav ul li {
    padding: 5px 25px 5px 25px;
}
.profile-side {
  width: 300px;
  background: #fff;
  box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
  padding: 26px 30px 20px;
  font-family: "Bree Serif", serif;
  margin-left: 1px;
  z-index: 99;
  margin-top:49px;
}

.profile-side p {
  margin-bottom: 7px;
  color: #333;
  font-size: 14px;
}

.profile-side p i {
  color: #ec1e16;
  margin-right: 10px;
}

.mobile-no i {
  transform: rotateY(180deg);
  color: #e40046;
}

.profile-btn {
  display: flex;
}

button.chatbtn,
button.createbtn {
  border: 0;
  padding: 10px;
  width: 100%;
  border-radius: 3px;
  background: #040404;
  color: #fff;
  font-family: "Bree Serif";
  font-size: 1rem;
  margin: 5px 2px;
  cursor: pointer;
  outline: none;
  margin-bottom: 10px;
  transition: background 0.3s ease-in-out;
  box-shadow: 0px 5px 7px 0px rgba(0, 0, 0, 0.3);
}

button.chatbtn:hover,
button.createbtn:hover {
  background: rgba(288, 0, 70, 0.9);
}

button.chatbtn i,
button.createbtn i {
  margin-right: 5px;
}

.user-rating {
  display: flex;
}

.user-rating h3 {
  font-size: 2.5rem;
  font-weight: 200;
  margin-right: 5px;
  letter-spacing: 1px;
  color: #666;
}

.user-rating .no-of-user-rate {
  font-size: 0.9rem;
}

.rate {
  padding-top: 6px;
}

.rate i {
  font-size: 0.9rem;
  color: rgb(236 30 22);
}

.nav {
  width: 100%;
  z-index: -1;
}

.nav ul {
  display: flex;
  justify-content: space-around;
  list-style-type: none;
  height: 40px;
  background: #fff;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}


.nav ul li:hover,
.nav ul li.active {
  box-shadow: 0px -3px 0px rgba(288, 0, 70, 0.9) inset;
}

.profile-body {
  width: 100%;
  z-index: -1;
}

.tab {
  display: none;
}

.tab {
  padding: 3px;
  width: 100%;
  text-align: center;
}

@media (max-width: 1100px) {
  .profile-side {
    width: 250px;
    padding: 90px 15px 20px;
  }

  .profile-img img {
    height: 200px;
    width: 200px;
    left: 50px;
    top: 50px;
  }
}

@media (max-width: 900px) {
  body {
    margin: 0 20px;
  }

  .profile-header {
    display: flex;
    height: 100%;
    flex-direction: column;
    text-align: center;
    padding-bottom: 20px;
  }

  .profile-img {
    float: left;
    width: 100%;
    height: 200px;
  }

  .profile-img img {
    position: relative;
    height: 200px;
    width: 200px;
    left: 0px;
  }

  .profile-nav-info {
    text-align: center;
  }

  .profile-option {
    right: 20px;
    top: 75%;
    transform: translateY(50%);
  }

  .main-bd {
    flex-direction: column;
    padding-right: 0;
  }

  .profile-side {
    width: 100%;
    text-align: center;
    padding: 20px;
    margin: 5px 0;
  }

  .profile-nav-info .address {
    justify-content: center;
  }

  .user-rating {
    justify-content: center;
  }
}

@media (max-width: 400px) {
  body {
    margin: ;
  }

  .profile-header h3 {
  }

  .profile-option {
    width: 30px;
    height: 30px;
    position: absolute;
    right: 15px;
    top: 83%;
  }

  .profile-option .notification .alert-message {
    top: -3px;
    right: -4px;
    padding: 4px;
    height: 15px;
    width: 15px;
    font-size: 0.7rem;
  }

  .profile-nav-info h3 {
    font-size: 1.9rem;
  }

  .profile-nav-info .address p,
  .profile-nav-info .address span {
    font-size: 0.7rem;
  }
}
#see-more-bio,
#see-less-bio {
  color: blue;
  cursor: pointer;
  text-transform: lowercase;
}
.tab h1 {
  font-family: "Bree Serif", sans-serif;
  display: flex;
  justify-content: center;
  margin: 20px auto;
}

.right-side {
    margin-top: 0px;
    border: 1px solid #ddd;
    padding: 13px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}


  </style>

<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-12"> 
  <div class="profile-header">
    <div class="profile-img">
      <img src="<?php echo base_url();?>assets/Meeting/Buyer_logo/<?php echo $BuyerProfile->logo ?>" width="200" alt="Profile Image">
    </div>
  </div>
   <!-----row----new--start------>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
          <div class="main-bd">
    <div class="left-side">
      <div class="profile-side">
                  <!-- Assuming you are using Font Awesome 5 -->
        
        <p class="user-mail m-2"><i class="fas fa-building"></i> <?php echo $BuyerProfile->your_company_name?></p>
        <p class="user-mail m-2"><i class="fas fa-user"></i> <?php echo $BuyerProfile->name?> </p>
        
        <p class="mobile-no m-2"><i class="fas fa-phone"></i> <?php echo $BuyerProfile->mobile_number?> </p>
        <p class="user-mail m-2"><i class="fas fa-envelope"></i> <?php echo $BuyerProfile->email ?> </p>
        
        <p class="user-mail m-2"><i class="fas fa-map-marker"></i> <?php echo $BuyerProfile->city ?> </p>
        
      </div>

    </div>
    
  </div>
      </div>   
        
    </div>
   
  </div> 
  
  <div class="col-lg-8 col-md-8 col-sm-4 col-12">
      <div class="right-side">
      <div class="nav">
     
      </div>
      <div class="profile-body">
        <div class="profile-posts tab">
         <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <form id="sellerForm" enctype="multipart/form-data">

      <div class="form-row">
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="sellerName">
            <i class="fas fa-user mx-2"></i>
          </label>
           <input type="text" class="form-control" id="SellerName" value="<?php echo $BuyerProfile->name?>" name="name"  required="">
        </div>

        <!-- Seller's Company Name -->
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="companyName">
            <i class="fas fa-building mx-2"></i>
          </label>
          <input type="text" class="form-control" id="companyName" name="your_company_name"  value="<?php echo $BuyerProfile->your_company_name?>" required="">
        </div>

        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="gstNumber">
            <i class="fas fa-id-badge mx-2"></i>
          </label>
          <input type="text" class="form-control" id="designation" name="designation" placeholder="GST Number:" value="<?php echo $BuyerProfile->designation ?>" title="designation" required="">
        </div>


        <!-- Contact Information -->
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="phoneNumber ">
            <i class="fas fa-phone mx-2"></i>
          </label>
          <input type="tel" class="form-control" id="phoneNumber" name="mobile_number" value="<?php echo $BuyerProfile->mobile_number?>" required="">
        </div>

        <!-- Email -->
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="sellerEmail">
            <i class="fas fa-envelope mx-2"></i>
          </label>
          <input type="email" class="form-control" id="sellerEmail" name="email"   value="<?php echo $BuyerProfile->email ?>" readonly  required="">
        </div>

        <!-- Physical Address -->
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="physicalAddress">
            <i class="fas fa-map-marker-alt mx-2"></i>
          </label>
          <textarea class="form-control" id="physicalAddress" name="company_address" required=""> <?php echo $BuyerProfile->company_address ?>   </textarea>
        </div>
        

        <!-- City -->
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="city">
            <i class="fas fa-city mx-2"></i>
          </label>
          <input type="text" class="form-control" id="city" name="city" value="<?php echo $BuyerProfile->city ?>"  required="">
        </div>
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="city">
            <i class="fas fa-city mx-2"></i>
          </label>
          <input type="text" class="form-control" id="country" name="Country"   value="<?php echo $BuyerProfile->Country ?>"  required="">
        </div>
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="pinCode">
            <i class="fas fa-thumbtack mx-2"></i>
          </label>
          <input type="text" class="form-control" id="pinCode" name="pin_code"  value="<?php echo $BuyerProfile->pin_code ?>" required="">
        </div>

        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="website">
            <i class="fas fa-globe mx-2"></i>
          </label>
          <input type="text" class="form-control" id="website" name="nature_of_business"  value="<?php echo $BuyerProfile->nature_of_business ?>">
        </div>

        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="panNumber">
            <i class="fas fa-id-card mx-2"></i>
          </label>
          <input type="text" class="form-control" id="panNumber" name="business_category" value="<?php echo $BuyerProfile->business_category ?>" title="business_category" required="">
        </div>
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="certifications">
            <i class="fas fa-certificate mx-2"></i>
          </label>
          <input type="text" class="form-control" id="certifications" name="annual_turnover"  value="<?php echo $BuyerProfile->annual_turnover ?>"  placeholder="annual_turnover" required="">
        </div>
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="yearsInOperation">
            <i class="fas fa-calendar-alt mx-2"></i>
          </label>
          <input type="number" class="form-control" id="yearsInOperation" name="year_commencement" value="<?php echo $BuyerProfile->year_commencement ?>" placeholder="year_commencement" required="">
        </div>
        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="annualTurnover">
            <i class="fas fa-money-bill-alt mx-2"></i>
          </label>
          <input type="text" class="form-control" id="annual_turnover"  value="<?php echo $BuyerProfile->annual_turnover ?>" name="annual_turnover" required="">
        </div>
          <div class="col-md-12 mb-3 d-flex align-items-center">
          <span>Account Creat</span>
        </div>

        <div class="col-md-12 mb-3 d-flex align-items-center">
          <label for="industryExperience">
            <i class="fas fa-industry mx-2"></i>
          </label>
          <input type="text" class="form-control" id="industryExperience" name="created_at" value="<?php echo $BuyerProfile->created_at ?>" placeholder="created at" readonly required="">
        </div>

        <div class="col-md-12 d-flex align-items-center">
            <input type="Hidden" name="id" value="<?php echo $BuyerProfile->id?>">
          <button class="om-submit-btn btn btn-danger mt-3">GO</button>
        </div>
      </div>
    </form>
            </div>
        </div>
    </div>
</div>
      </div>
    </div>
  </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>

<script>
    $(".nav ul li").click(function() {
  $(this)
    .addClass("active")
    .siblings()
    .removeClass("active");
});

const tabBtn = document.querySelectorAll(".nav ul li");
const tab = document.querySelectorAll(".tab");

function tabs(panelIndex) {
  tab.forEach(function(node) {
    node.style.display = "none";
  });
  tab[panelIndex].style.display = "block";
}
tabs(0);

let bio = document.querySelector(".bio");
const bioMore = document.querySelector("#see-more-bio");
const bioLength = bio.innerText.length;

function bioText() {
  bio.oldText = bio.innerText;

  bio.innerText = bio.innerText.substring(0, 100) + "...";
  bio.innerHTML += `<span onclick='addLength()' id='see-more-bio'>See More</span>`;
}
//        console.log(bio.innerText)

bioText();

function addLength() {
  bio.innerText = bio.oldText;
  bio.innerHTML +=
    "&nbsp;" + `<span onclick='bioText()' id='see-less-bio'>See Less</span>`;
  document.getElementById("see-less-bio").addEventListener("click", () => {
    document.getElementById("see-less-bio").style.display = "none";
  });
}
if (document.querySelector(".alert-message").innerText > 9) {
  document.querySelector(".alert-message").style.fontSize = ".7rem";
}
</script>

<script>
  $(document).ready(function () {
    // Function to handle form submission
    $("#sellerForm").submit(function (e) {
      e.preventDefault();

      var formData = new FormData(this);
     
      // AJAX request
      $.ajax({
        type: "POST",
        url: "<?= base_url()?>Meeting/Buyer/Profile_buyer_view/updateBuyer",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          if (response == 1) {
            Swal.fire({
              title: 'Success',
              text: 'Seller Update',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(function () {
              location.reload();
            });
          }
        },
        error: function (error) {
          console.error("Error submitting form: " + JSON.stringify(error));
        }
      });
    });
  });
</script>
