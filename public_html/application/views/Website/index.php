<style>
     .main-container p{
         font-size:13px;
         
     }
 .banner-slider {
    width: 100%;
    overflow: hidden;
    position: relative;
}

.banner {
    display: none;
    width: 100%;
    position: relative;
    background-color:white !important;
}

.banner-image img {
    width: 100%;
    height: auto;
    background: linear-gradient(173deg, rgba(0, 0, 0, 0.57) 8%, rgba(0, 0, 0, 0.43) 58%, rgba(0, 0, 0, 0.39) 100%);
    color: #fff;
    padding: 10px;
    text-align: center;
    font-size: 18px;
}

.banner-text {

    position: absolute;
    bottom: 106px;
    left: 0;
    right: 0;
    /* background-color: rgba(0, 0, 0, 0.5); */
    color: #fff;
    padding: 10px;
    color:white;
}
.font_size{
    font-size: 75px;
    padding-left:40px;
    
    
}
.doc1{
    font-size: 72px;color: white;
}
.doc2{
    font-size: 42px;color: white;
}
.doc3{
    font-size: 32px;color: white;
}
.make_show {
    /*box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;*/
     padding:20px;
    /*border-radius: 44%;*/
    /* padding: 79px; */
    /*text-align: center;*/
    /*padding-top: 72px;*/
    /*padding-bottom: 68px;*/
    /*font-weight: 700;*/
}
.make_show  a{
         color: black;
    text-decoration: none;
 }
 
 .make_show  a:hover{
         color: black;
    text-decoration: none;
 }
.make_show:hover {
    box-shadow: rgb(225 56 56 / 25%) 0px 3px 8px;
    
}
.make_show span{
    font-size:35px;color:#ed1a21;padding:0;margin:0
}

.make_show span:hover{
    font-size:35px;color:#ed1a21;padding:0;margin:0
}

@media only screen and (max-width: 600px) {
 
.doc1{
    font-size: 52px;color: white;
}
.doc2{
    font-size: 22px;color: white;
}
.doc3{
    font-size: 22px;color: white;
}
}
 </style>

  <h1 class="d-none">Traveel Trade Journal Travmart B2B and B2C Event</h1>
 <section class="section_banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 p-0">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <picture>
                                    <source srcset="<?php echo base_url(); ?>assets/image/promo-bg-2.jpg" type="image/webp">
                                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/image/promo-bg-2.jpg" alt="Promotional Background Image 1" loading="lazy">
                                </picture>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<section id="ads">
    <div class="container border mt-2 mb-2">
        <div  class="text-center"><small> Ads</small></div>
        <div class="row text-center">
            <div class="col-md-4 col-sm-4 col-12 d-md-block d-sm-block d-block  mx-auto ">
                <img src="https://traveltradejournal.com/wp-content/uploads/2023/10/600x120.png" alt="ads" width="100%" height="70px">
            </div>
            
            <div class="col-md-4 col-sm-4 col-12 d-md-block d-sm-block d-none mx-auto ">
                <img src="https://traveltradejournal.com/wp-content/uploads/2023/10/600x120.png" alt="ads1"  width="100%" height="70px">
            </div>
            
            <div class="col-md-4 col-sm-4 col-12 mx-auto  d-md-block d-sm-block d-none">
                <img src="https://traveltradejournal.com/wp-content/uploads/2023/10/600x120.png" alt="ads2"  width="100%" height="70px">
            </div>
        </div>
    </div>
</section>

<br>
<section class="announcement-section">
  <div class="site-heading text-center" style="
    background: #000000cf;
    padding-top: 10px;
    padding-bottom: 20px;
  ">
    <article><p class="doc1 h3 mt-2">Announcing The <span>7th Edition</span></p></article>
    <article><p class="doc2 h5">Nationwide Networking</p></article>
    <br>
    <br>
 <a href="<?php echo base_url(); ?>assets/Doc/TTJ PPT.pdf" class="doc3 btn btn-danger"  target="_blank" rel="noopener noreferrer">Click to Know More</a>
 </div>
</section>
<br>
<section >
     <div class="container">
     <div class="row ">
         <div class="col-md-12 ">
            <br class="d-md-block d-none">
            <br class="col-md-block d-none">
            <div class="site-heading text-center">
                <h2>Calendar<span> 2024 /2025 </span></h2>
                
            </div>
        </div>
      <?php foreach ($events as $row): ?>
           <div class="col-md-2 col-sm-12 col-6">
                <div class="make_show">
                    <picture>
                        <source srcset="<?php echo base_url('assets/image/' . $row['Images_name']); ?>" type="image/png">
                        <img loading="lazy" src="<?php echo base_url('assets/image/' . $row['Images_name']); ?>" alt="<?php echo $row['Images_name']; ?>" width="100%">
                    </picture>
                    <div style="padding-left: 17px; padding-top: 12px;"><?php echo $row['Date']; ?></div>
                    <a href="<?php echo base_url();?>preregistration/register/<?php echo $row['Name']; ?>/asbuyer">
                        <div class="text-center"><button class="btn btn-danger">Register as Buyer</button></div>
                    </a>
                    <br>
                    <a href="<?php echo base_url();?>PreRegistration/register/<?php echo $row['Name']; ?>/asHosted">
                        <div class="text-center"><button class="btn btn-danger"> Register as Seller</button></div>
                    </a>
                    <br>
                </div>
            </div>
        <?php endforeach; ?>  
     </div>
     </div>
</section>



<style>
.post .post-media.post-image {
    width: calc(100% - 40px);
    margin: 0 auto 5px auto;
    position: relative;
}
.post-body {
    box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.05);
}
.ts-blog .post .post-body .entry-header .entry-title {
    font-size: 24px;
    font-weight: 700;
}
.post .post-body .entry-content p {
    line-height: 26px;
    color: #888888;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}

.post .post-body {
    padding: 150px 20px 25px 30px;
    margin: -130px 0px 30px;
    box-shadow:0px 4px 21px 9px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}
.post-meta {
    font-size: 13px;
    margin-bottom: 15px;
}
.ts-blog .post .post-body .entry-header .entry-title {
    font-size: 24px;
    font-weight: 700;
}
.entry-content p {
    line-height: 26px;
    color: #888888;
}
</style>

    <section class="we-offer-area ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <br>
                    <div class="site-heading text-center">
                     <article>   <h2>Our <span>Services</span></h2></article>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row our-offer-items less-carousel" style="position: relative;">
                  <?php
                 foreach($services as $row){
                ?>
               <div class="col-md-3 col-sm-4 col-6">
                    <picture>
                        <!-- Add multiple source elements for different image formats or sizes if needed -->
                        <source srcset="<?= base_url('assets/image/' . $row['images'] . '.webp') ?>" type="image/webp">
                        <img style="border-radius: 6px;" class="mt-2 mb-2" loading="lazy" src="<?= base_url('assets/image/' . $row['images']) ?>" alt="" width="100%">
                    </picture>
                </div>

                <?php
                }
                ?>
            </div>
        </div>

</section>
<!--testimonials-->
<style>
    .add_section_testimonials{
        box-shadow: 0px 4px 21px 9px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    height: 600px;
    }
    .text-border {
  -webkit-text-stroke: 1px brown; 
  text-stroke: 1px brown;
  color: white; 
}
</style>
<section>
    <div class="container">
        <div class="site-heading text-center">
            <article>
            <h2>TEST<span>IMONIALS</span></h2>
            </article>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading text-center">
                 <br>
                 <article>
                  <h2 style="margin-top: 0px;">Seller<span></span></h2>
               </article>
               <br>
               </div>
            </div>
            <?php foreach ($seller_testimonials as $row):
                $stars = $row['star'];
            ?>
            <div class="col-md-3 col-sm-12 col-12 py-md-3 py-sm-2 py-2">
                <div class="add_section_testimonials">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-8">
                            <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $stars) {
                                        echo '<span class="fa fa-star" style="color: brown;"></span>';
                                    } elseif ($i - 0.5 == $stars) {
                                        echo '<span class="fa fa-star-half" style="color: brown;"></span>';
                                    } else {
                                        echo '<span class="fa fa-star text-border"></span>';
                                    }
                                }
                                ?>    
                            <article><p class="pt-2"><?php echo $row['name']; ?></p></article>
                            </div>
                            <div class="col-md-4">
                                <?php
                                if($row['image'] != NULL){
                                ?>
                            <picture>
                                <source srcset="<?= base_url('assets/testimonials/' . $row['image'] . '.webp') ?>" type="image/webp">
                                <img src="<?= base_url('assets/testimonials/' . $row['image']) ?>" alt="Description" style="border-radius: 22px 7px; width: 62px; height: 59px;" loading="lazy">
                            </picture>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <article><p class="pt-1 h6"><?php echo $row['pogison']; ?></p></article>
                        <p class="pt-1" style="color: #adabab;"><?php echo $row['text']; ?></p>
                    </div>
                </div>
            </div>
            <?php
            
            endforeach; 
            ?>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading text-center">
                 <br>
                 <article>
                  <h2 style="margin-top: 0px;">Buyer<span></span></h2>
               </article>
               <br>
               </div>
            </div>
            <?php foreach ($buyer_testimonials as $row):
                $stars = $row['star'];
            ?>
            <div class="col-md-3 col-sm-12 col-12 py-md-3 py-sm-2 py-2">
                <div class="add_section_testimonials">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-8">
                            <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $stars) {
                                        echo '<span class="fa fa-star" style="color: brown;"></span>';
                                    } elseif ($i - 0.5 == $stars) {
                                        echo '<span class="fa fa-star-half" style="color: brown;"></span>';
                                    } else {
                                        echo '<span class="fa fa-star text-border"></span>';
                                    }
                                }
                                ?>    
                            <article><p class="pt-2 h6"><?php echo $row['name']; ?></p></article>
                            </div>
                            <div class="col-md-4">
                                <?php
                                if($row['image'] != NULL){
                                ?>
                                <img src="<?php echo base_url(); ?>/assets/testimonials/<?php echo $row['image']; ?>" style="border-radius: 22px 7px; width: 62px; height: 59px;">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <article><p class="pt-1 h6"><?php echo $row['pogison']; ?></p></article>
                        <p class="pt-1" style="color: #adabab;"><?php echo $row['text']; ?></p>
                    </div>
                </div>
            </div>
            <?php
            
            endforeach; 
            ?>
        </div>
    </div>
</section>
<br>
<br>
<section class="section_main">
    <div class="container">
        
        <div class="site-heading text-center">
           <article>
            <h2>Our<span> Partners</span></h2>
            </article>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme owl-pd owl-loaded owl-drag" id="owl-3">
                    <div class="item">
                        <div class="client_carousel">
                            <img src="<?php echo base_url(); ?>/assets/images/adtoi.png" alt="adtoi.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="item">
                        <div class="client_carousel">
                            <img src="<?php echo base_url(); ?>/assets/images/etaa.png" alt="etaa.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="item">
                        <div class="client_carousel">
                            <img src="<?php echo base_url(); ?>/assets/images/taai.png" alt="taai.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="item">
                        <div class="client_carousel">
                            <img src="<?php echo base_url(); ?>/assets/images/iato.png" alt="iato.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="item">
                        <div class="client_carousel">
                            <img src="<?php echo base_url(); ?>/assets/images/skal.png" alt="skal.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="item">
                        <div class="client_carousel">
                            <img src="<?php echo base_url(); ?>/assets/images/otoai.png" alt="otoai.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="item">
                        <div class="client_carousel">
                            <img src="<?php echo base_url(); ?>/assets/images/tafi.png" alt="tafi.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="item">
                        <div class="client_carousel">
                            <img src="<?php echo base_url(); ?>/assets/images/uten.png" alt="uten.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
</section>
<?php

if (isset($_POST['click_submit'])) {
    $to = "info@ttjtravmart.com ";
    $subject = "Contact Us";
    $full_name = $_POST['full_name'];
    $mobile_no = $_POST['mobile_no'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    
    $message = "Name: $full_name\n";
    $message .= "Mobile Number: $mobile_no\n";
    $message .= "Location: $location\n";
    $message .= "Description:\n$description\n";
    
    $headers = "From: Demo@example.com";
    mail($to, $subject, $message, $headers);
}
?>
<section class="contact-background mt-5">
      <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-7">
                <div class="appointment-box">
                    <div class="section-title-wrapper section-title-wrapper1">
                        <div class="title-wrap">
                           <article> <p class="sub-title h6">Get in Touch</p></article>
                            <!--<h2 class="section-title">-->
                                <!--<span class="title-prefix"> Lets Start Your <span class="architecture_color">Journeys </span></span> -->
                            <!--</h2>-->
                            <form class="contact-form" action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control"  id="full_name" name="full_name" placeholder="Enter Full Name" required="" fdprocessedid="f83hgp">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" maxlength="10" minlength="10" pattern="[7-9]{1}[0-9]{9}" id="mobile_no" name="mobile_no" placeholder="Enter Number" required="" fdprocessedid="ygwhrt">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" required="" fdprocessedid="k8bmmd">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="" rows="3" name="description" placeholder="Project Description" required="" data-gramm="false" wt-ignore-input="true"></textarea>
                                </div>
                                <button type="submit" name="click_submit" style="background:#de2a30" class=" btn-default">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
  
</section>


<script>
    let currentBanner = 1;
const totalBanners = 3; // Update this to the total number of banners

function showBanner(n) {
    if (n < 1) {
        currentBanner = totalBanners;
    } else if (n > totalBanners) {
        currentBanner = 1;
    }

    // Hide all banners
    const banners = document.querySelectorAll('.banner');
    banners.forEach(banner => {
        banner.style.display = 'none';
    });

    // Show the current banner
    const currentBannerElement = document.getElementById(`banner${currentBanner}`);
    currentBannerElement.style.display = 'block';
}

function changeBanner(n) {
    showBanner(currentBanner += n);
}

showBanner(currentBanner);

// Auto-rotate the banners every 5 seconds (5000 milliseconds)
setInterval(() => {
    changeBanner(1);
}, 5000);
</script>