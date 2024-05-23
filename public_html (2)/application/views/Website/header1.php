<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="Ll6M9C2Den8nhErtklgnkkpJD8rSR8R67Niof2uI9fc" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" async="async" />
 	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/carousel.min.css">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/image/title-logo.jpg">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>



<?php
if ($_SERVER['HTTP_HOST'] == 'www.ttjtravmart.com') {
    echo "<base href='https://www.ttjtravmart.com/'>";
} else {
    echo "<base href='https://ttjtravmart.com/'>";
}
?>
    
    <?php
      include('config.php');
      $url_parts = $_SERVER['REQUEST_URI'];
      $q1 = mysqli_query( $config,"SELECT * FROM `url`");
      while($data_fatch = mysqli_fetch_array($q1)){
       if($data_fatch['url'] == $url_parts){
          ?>
    <meta name="description" content="<?php echo $data_fatch['decription'] ?>">
	<title><?php echo $data_fatch['title']?></title>   
	<meta name="keywords" content="<?php echo $data_fatch['keyword'] ?>">
	<link rel="canonical" href="<?php echo $data_fatch['canonical'] ?>" />
          <?php
       }
       
      }
      
      if($url_parts == "/gallery"){
       ?>
       <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
       <?php
       }
    ?>    
</head>

<body>
<!-- nav bar -->


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "TTJ Travmart Logo",
  "alternateName": "TTj logo",
  "url": "https://www.ttjtravmart.com",
  "logo": "<?php echo base_url();?>assets/images/tt_logo.png"
}
</script>
<style>

@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');

    .section_banner{
        margin:0;
    }
    .site-heading h2 {
    display: block;
    font-weight: 700;
     margin-bottom: 15px; 
    text-transform: uppercase;
     margin-top: 0px; */
}


 .navbar-toggler:focus {
    /* text-decoration: none; */
    /* outline: 0; */
   box-shadow: 0 0 0 #000; 
}

.logo-1 {
    margin: 0 auto;
    width: 75%;
    /* box-shadow: 1px 1px 4px 2px #0000003b; */
    padding: -8px;
    object-fit: contain;
}
.lucknoww span{
    font-size: 25px;
    text-align: center;
    color: #ed1a21;
    font-weight: 600;
}

.navbar-dark .navbar-nav .nav-link {
    color: #0d81ac !important;
    font-size: 17px;
    font-weight: 400;
    padding-right: 11px;
}


.ok a{
    background: #ffffff;
    color: red !important;
    text-decoration: none !important;
    border-radius: 5px;
   
    box-shadow: 1px 1px 4px 2px #0000003b;
}

.ttj-new-header-img img{
    width: 100%;
}

.btn-colorful45 {
  background-color: #ff0000d1 !important;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 22px;  
    padding: 5px 28px 5px 28px;
}

.btn-colorful47 {
    background-color: gray !important;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 22px;
}

.btn-colorful46 {
    background-color: #343a40;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 22px;
}
.btn-colorful46:hover{
   background-color: #343a40 !important; 
}

.datevenue254{
    color: #de2a30;
    text-align: center;
    margin-top: 12px;
    
}
.datevenue255{
    color: #de2a30;
    text-align: center;
    margin-top: 14px;
}

.header_top_location li a{
     font-size: 17px !important;
}

</style>
<style>
    .navbar.navbar-expand-lg.navbar-dark.nav-bg-home {
        box-shadow: none;
    }
    .navbar-dark .navbar-nav .nav-link {
    color: white !important;
}
 .navbar-nav {
    display: flex;
    justify-content: center;
    /* align-items: center; */
    padding-left: 26px;
}
        
.navbar-toggler-icon {
    background-color: #fff;
    padding: 23px;
    margin: 6px;
}
.datevenue2545 img {
    width: 96%;
    height: 49px;
    object-fit: contain;
    margin-top: 2px;
}
.ttj-new-header-img img {
    width: 100%;
    height: 73px;
    object-fit: contain;
    margin-top: 16px;
}

.ttj-new-header-img2 img {
    width: 100%;
    height: 47px;
    object-fit: contain;
}

.event-details-btn21 a:hover{
     color: #fff;
}


.lucknoww{
    font-size: 16px;
    margin:0;
}
.display-nonee1{
    display: none;
}

@media only screen and (max-width: 1225px) {
 .navbar-dark .navbar-nav .nav-link{
    font-size: 13px !important;
    font-weight: 400;
    padding-right: 2px !important;
}
}


@media only screen and (max-width: 768px) {
  .navbar-nav {
   margin-bottom: 30px;
}
.display-new-none{
  display: none !important;  
}
.navbar-toggler-icon {
    background-color: #fff;
    padding: 15px !important;
    margin: 6px;
}


.lucknoww span{
    font-size: 17px !important;
     
}

.logo-1 {
    margin: 0 auto;
    width: 100% !important;
    margin-top: 12px;
}
.display-nonee1{
    display: block !important;
}


.lucknoww{
    font-size: 14px !important;
}
.btn-trav{
  margin-left: 1px;
}
.event-details-btn21 {
  margin-top: 1px !important; 
}

    .header-section-img-mobile-view-hide{
        display: none1 !important;
    }
    .displa-none-omp{
        display: none !important;  
    }
    
    .btn-colorful45{
       width: 100% !important; 
       margin-top: 5px !important;
    }
    .btn-colorful46{
       width: 100% !important; 
       margin-top: 5px !important;
        margin-bottom: 8px !important;
    }
    .btn-colorful47 {
     width: 100% !important; 
    
     
     
    }
}
body,.nav-bg-home {
  font-family: "Rajdhani", sans-serif !important;
   font-weight: 600;
  font-style: normal;
}

.navbar-expand-lg .navbar-nav .dropdown-menu {
    border-radius: 0px;
    top: 100%;
    border-top: 2px solid #ed1a21;
    font-size: 17px;
    font-weight: 900;

}
</style>

<div class="container-fluid d-md-none d-sm-none" style="background:black">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 text-center py-2">
            <p class="text-light p-0 m-0">( Beta )</p>
        </div>
    </div>
</div>

<div class="container-fluid top_bar_new " style="background:black">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="header_top_location">
                                    <ul>
                                        <li>
                                            <a href="tel:+918826869446"  aria-label="Call +918826612446">Call +91 8826 869 446</a>
                                        </li>
                                        <li style="border:none;">
                                            <a href="mailto:info@ttjtravmart.com" aria-label="mailto:info@ttjtravmart.com">
                                                <span>info@ttjtravmart.com</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                (Beta)
                            </div>
                            <div class="col-md-4">
                                <div class="top-bar">
                                    <ul class="top_head">
                                        <li style="border:none;">
                                            <a href="https://www.facebook.com/profile.php?id=61551885617197" aria-label="Facebook">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/travel_kick20" aria-label="Twitter">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/channel/UCOjdVNrldoA53-Xx8BYVBcw" aria-label="YouTube">
                                                <i class="fa-brands fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/company/92567079/admin/" aria-label="LinkedIn">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/travel_kick20/?theme=light" aria-label="Instagram">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
 <div class="container d-md-block1 d-sm-none1 d-none1 header-section-img-mobile-view-hide">
    <div class="row  pt-2 " >
         <div class="col-md-3 col-sm-6 col-6 text-center">
             <picture>
                    <source>
                     <img class="d-inline-block  logo-1" src="<?php echo base_url() ?>/assets/images/tt_logo.png" alt="TTJ Logo" aria-label="Logo">
                     <p class="lucknoww ">
                     <?php 
                            $CI =& get_instance();
                            $CI->load->model('Header_model'); 
                            $event_count = $CI->Header_model->View_Event_where();
                             $formatted_date = date('d - F - Y', strtotime($event_count->EventStartDate));
                             echo '<span style="font-size:15px;">'.$formatted_date.' '.$event_count->EventPlace.'</span><br>';  
                            ?>
                     </span>  
                     <?php
                             echo  '<span class="p-0 m-0" style="font-size:15px;color:black">'. $event_count->Location .'</span>'; 
                     ?>
                     </p>
                    </source>
                      
              </picture>
         </div>
         
      <div class="col-md-1 col-sm-12 col-12 d-md-block d-sm-none d-none"></div> 
      
      
           <div class="col-md-2 col-sm-12 col-12 d-md-block d-sm-none d-none">
             <div class="displa-none-omp datevenue2545">
             <picture>
                    <div class="datevenue254">
                    <strong>Official Media Partner</strong>
                    </div>
                    <source>
                     <a href="https://traveltradejournal.com/" target="_blank"><img class="d-inline-block  logo-1" src="https://traveltradejournal.com/wp-content/uploads/2022/08/TTJ-Logo-PNG-e1661531371256.png" alt="TTJ Logo" aria-label="Logo"></a> 
              </source>
        
              
              </picture>
          </div>
         </div>
         
         <div class="col-md-2 col-sm-12 col-12 d-md-block d-sm-none d-none" >
             <div class="displa-none-omp ttj-new-header-img2">
             <picture>
                  
                    <div class="datevenue255">
                    <strong>Official Tech Partner</strong>
                    </div>
                    <source>
                   <a href="https://www.sampantech.com/" target="_blank"><img class="d-inline-block logo-1"  src="https://sampantech.com/assets/imgs/logo11.png" alt="sampantech" aria-label="Logo"></a>
             </source>
              </picture>
          </div>
         </div>
         
         <div class="col-md-1 col-sm-12 col-12 d-md-block d-sm-none d-none"></div> 
         
           <div class="col-md-2 col-sm-12 col-12 d-md-block d-sm-none d-none">
             <div class="displa-none-omp datevenue2545 ttj-new-header-img">
             <picture>
                <source>
                  <a href="https://www.ttjtravmart.com/Marketplace/Destination" target="_blank"> <img class="d-inline-block  logo-1 " src="<?php echo base_url() ?>assets/marketplace/Logo_2.png  " alt="marketplace" aria-label="Logo"></a>
                </source>
              </picture>
           </div>
         </div>
         
         <div class="col-md-1 col-sm-6 col-6 display-nonee1">
           <div class="event-details-btn21">
                <a href="<?php echo base_url();?>Meeting/login" class="btn btn-colorful47">Login</a>
                <a href="<?php echo base_url();?>Seller_Registration" class="btn btn-colorful45">Seller</a>
                <a href="<?php echo base_url();?>Buyer_Registration" class="btn btn-colorful46">Buyer</a>
            </div>
         </div> 
    </div>
</div>


<div class="navbar navbar-expand-lg navbar-dark nav-bg-home" style="position: sticky !important;top: -1px;background:black;border-bottom:1px solid white;z-index: 99999999999999;">
    <div class="container-fluid">
 
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <!-- Your navigation links here -->
        </div>



        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>Home1">Home <span
                            class="caret"></span></a>
                </li>
                <li class="nav-item">
                    <a  href="<?php echo base_url();?>Aboutus/AboutTTJ" class="nav-link nav-link1" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About Us
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1 dropdown-toggle" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       TTJ TRAVMART
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="header_div">
                        <a class="dropdown-item" href="<?php echo base_url();?>Buyer_Registration"> Buyer Registration</a>
                        <a class="dropdown-item" href="<?php echo base_url();?>Seller_Registration">Seller Registration</a>
                    </div>
                </li>
                
                
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1 dropdown-toggle" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Market Place
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="header_div">
                        <a class="dropdown-item" href="<?php echo base_url();?>Marketplace/Destination">Destination</a>
                        <a class="dropdown-item" href="<?php echo base_url();?>Market_Place_Buyer_Registration">Register as a Buyer</a>
                        <a class="dropdown-item" href="<?php echo base_url();?>Market_place_Seller_Register">Register as a Seller</a>
                    </div>
                </li>
                
                 <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>ClubTTJ"> Club TTJ<span
                            class="caret"></span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1 dropdown-toggle" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Media & Tech
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="header_div">
                        <a class="dropdown-item" href="https://traveltradejournal.com/" target="_blank">Travel Trade Journal</a>
                        <a class="dropdown-item" href="http://sampantech.com/" target="_blank">Sampan Tech</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>Comingsoon">Virtual Event<span
                            class="caret"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url(); ?>Event/New_Event">Events<span
                            class="caret"></span></a>
                </li>
                
               
                
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>Gallery/TTJEvent">Event Gallery <span
                            class="caret"></span></a>
                </li>
                <li class="nav-item dropdown" onclick="onHover()">
                    <li class="nav-item">
                        <a class="nav-link nav-link1" href="<?php echo base_url();?>Contactus/Getintuch">Contact Us</a>
                    </li>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                  
            <div class="display-new-none event-details-btn21">
            <a href="<?php echo base_url();?>Meeting/login"><button class="btn btn-colorful45"> Login</button></a>
            </div>

        
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- end nav bar -->