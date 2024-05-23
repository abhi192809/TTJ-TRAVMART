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


</style>
<div class="container-fluid top_bar_new ">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="header_top_location">
                                    <ul>
                                        <li>
                                            <a href="tel:+918826612446"  aria-label="Call +918826612446">Call +91 8826 612 446</a>
                                        </li>
                                        <li style="border:none;">
                                            <a href="mailto:info@ttjtravmart.com" aria-label="mailto:info@ttjtravmart.com">
                                                <span>info@ttjtravmart.com</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
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
<div class="navbar navbar-expand-lg navbar-dark nav-bg-home" style="position: sticky !important;top: 0;">
    <div class="container-fluid">
        <a href="<?php echo base_url();?>" class="navbar-brand logo-wd">
              <picture>
                    <source>
                     <img class="d-inline-block mx-2 logo-1" src="<?php echo base_url() ?>/assets/images/tt_logo.png" alt="TTJ Logo" aria-label="Logo">
              </picture>
                
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-nav-2">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>">Home <span
                            class="caret"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>aboutus">About <span
                            class="caret"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>travmart">TRAVMART <span
                            class="caret"></span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>event">EVENT 2024<span
                            class="caret"></span></a>
                </li>
                 
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>marketplace"> Market Place <span
                            class="caret"></span></a>
                </li>
                
                
                
                <li class="nav-item dropdown" onclick="onHover()">
                    <a class="nav-link nav-link1 dropdown-toggle"  id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Magazine
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="header_div">
                       
                    <a class="dropdown-item" href="<?php echo base_url();?>emagazine">emagazine</a>
                     <a class="dropdown-item" href="<?php echo base_url();?>magazine/magazinesubscription">Magazine Subscription </a>
                    </div>
                </li>
                
                 <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>services">Services<span
                            class="caret"></span></a>
                </li>
                
                <!-- <li class="nav-item dropdown">-->
                <!--    <a class="nav-link nav-link1" href="<?php echo base_url();?>emagazine">Emagazine<span-->
                <!--            class="caret"></span></a>-->
                <!--</li>-->
                
                 <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>View">View<span
                            class="caret"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>gallery"> Gallery <span
                            class="caret"></span></a>
                </li>
                 <li class="nav-item dropdown" onclick="onHover()">
                <li class="nav-item">
                    <a class="nav-link nav-link1" href="<?php echo base_url();?>Contactus">Contact Us</a>
                </li>

            </ul>
            <!--onclick="makePayment()"-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn-trav" style="background:#de2a30" aria-label="Pune Event" href="<?php echo base_url();?>registernow">Lucknow Event</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end nav bar -->