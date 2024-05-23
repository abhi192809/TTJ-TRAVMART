

    <style type="text/css">
        .login-bg-color {
            background-color: #e8eced;
            padding: 110px;
        }
        

        .login-btn {
            background-color: #c60707;
            border: 1px solid #ddd;
            height: 44px;
            line-height: 15px;
            font-size: 18px;
        }

        .login-btn:hover {
            background-color: #000;
            border: 1px solid #ddd;
        }

        .login-heading h3 {
            color: white;
            background: #171515 !important;
            padding: 11px;
            text-align: center;
            font-weight: bold;
            border-radius: 9px;
            font-size: 23px;
            padding-bottom: 20px;
        }

        .Forgot-password a {
            color: #0068be !important;
            font-size: 15px;
            padding-bottom: 5px;
        }

        .login-form-img img {
            height: 455px !important;
        }

        .padding-bottom {
            padding: 5rem !important;
        }

        .border-bottom-color-red {
            border-bottom: 2px solid red;
        }

        @media only screen and (max-width: 600px) {
            .login-bg-color {
                padding: 10px !important;
            }

            .padding-bottom {
                padding: 1rem !important;
            }
        }
    </style>

    <style type="text/css">
        /* Your existing styles */

        @media only screen and (max-width: 600px) {
           

            .login-bg-color {
                padding: 10px !important;
            }
            .small, small {
             font-size: .675em;
            }

            .padding-bottom {
                padding: 1rem !important;
            }

            .card {
                width: 100%;
            }

            .login-form-img {
                display: none; /* Hide the image on smaller screens */
            }

            .login-heading h3 {
                padding-bottom: 10px; /* Adjust padding for smaller screens */
            }
        }
        
    .card-body a {
    background: #fff !important; 
    color: #000 !important; 
    padding: 0px !important; 
    border-radius: 3px;
    text-decoration: none;
    font-size: 12px;
}
    </style>

    <!-- Login Form -->
    <section class="padding-bottom login-bg-color p-3 p-md-4 p-xl-5">
        <div class="container-fluid">
            <div class="card border-light-subtle">
                <div class="row">
                    <!-- Image for larger screens -->
                    <div class="col-md-8 col-sm-12 col-12 d-md-block d-sm-block d-none">
                        <div class="login-form-img">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                src="<?php echo base_url();?>assets_meeting/img/login1.jpeg" alt="login">
                        </div>
                    </div>

                    <!-- Logo for smaller screens -->
                    <div class="col-md-8 col-sm-12 col-12 d-md-none d-sm-none d-block text-center">
                        <div class="">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover"
                                style="width: 137px !important;padding: 21px;margin: 20px;box-shadow: 0px 1px 6px 2px #dbdbdb"
                                loading="lazy"
                                src="https://www.ttjtravmart.com/assets/marketplace/Logo_2.png" alt="login"
                                width="100%">
                        </div>
                    </div>

                    <!-- Login Form -->
                    <div class="col-md-4 col-sm-12 col-12">
                        <div class="card-body mt-md-5">
                            <div class="mb-3 error_come">
                                <h3> <span class="border-bottom-color-red ">Login</span></h3>
                            </div>

                            <form id="loginForm">
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" value=""
                                            placeholder="name@example.com" autocomplete="username" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="" autocomplete="current-password" placeholder="************"
                                            required>
                                    </div>
                                    <div class="col-12 mt-4 ">
                                        <div class="d-grid">
                                            <button class=" form-control btn bsb-btn-xl btn-dark"
                                                style="background-color:black" type="button"
                                                onclick="submitForm()">Log in now</button>
                                        </div>
                                        <div class="row my-2 mb-4 px-2 ">
                                            <div class="col-md-6 col-6 text-left">
                                                <small>Forget Password</small>
                                            </div>
                                            <div class="col-md-6 col-6 text-right">
                                              <div class="login-signupp">
                                              <small>Signup as <a href="<?= base_url() ?>Seller_Registration"> Seller </a> / <a href="<?= base_url() ?>Buyer_Registration"> buyer </a> </small>
                                              </div>
                                            </div>
                                            <!--  <div class="col-md-4 col-6 text-right">-->
                                            <!--    <small>Signup as buyer</small>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!--<div class="row text-center">-->
                            <!--    <div class="col-md-12">-->
                            <!--        <i class="fa fa-facebook mx-2"></i>-->
                            <!--        <i class="fa fa-twitter mx-2"></i>-->
                            <!--        <i class="fa fa-instagram mx-2"></i>-->
                            <!--        <i class="fa fa-linkedin mx-2"></i>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    function submitForm() {
        // Serialize form data
        var formData = $('#loginForm').serialize();

        jQuery.ajax({
            type: 'POST',
            url: '<?= base_url();?>Meeting/Login/Loginpermistion',
            data: formData,
            dataType: 'json', // Assuming you expect JSON response
            success: function (response) {
                // Handle the response from the server
                console.log(response);

                // Check the 'status' value and perform actions accordingly
                if (response.status === 'success') {
                    if (response.type === 'Admin') {
                        window.location.href = "https://www.ttjtravmart.com/Meeting/Admin/dashboard";
                    } else if (response.type === 'Buyer') {
                        window.location.href = "https://www.ttjtravmart.com/Meeting/Buyer/dashboard";
                    } else if (response.type === 'Seller') {
                        window.location.href = "https://www.ttjtravmart.com/Meeting/Selleruser/seller";
                    } else if (response.type === 'Staff-Markating') {
                        window.location.href = "https://www.ttjtravmart.com/Meeting/Staffmarkating/dashboard";
                    } else if (response.type === 'User') {
                        window.location.href = "https://www.ttjtravmart.com/Meeting/Users/dashboard";
                    } else {
                        console.log('User type is not recognized');
                    }
                } else {
                    if (response.message === 'Invalid email or password') {
                        $('.error_come').after('<div class="error-message text-danger">Invalid email or password.</div>');
                        $('#email').addClass('border-danger');
                        $('#password').addClass('border-danger');
                    } else if (response.message === 'Your access has expired. Please contact administrator.') {
                        alert('Your access has expired. Please contact administrator.');
                    } else {
                        console.log('Unknown error:', response.message);
                    }
                }
            },
            error: function (error) {
                // Handle error
                console.error('Error:', error);
            }
        });
    }
</script>
