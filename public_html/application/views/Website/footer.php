
<style>
    #model {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
            background: rgb(0 0 0 / 48%);
        z-index: 999999999;
    }
    #model-body {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 550px;
        height: auto;
        background: #fff;
        border-radius: 3px;
    }
    #close-btn {
        position: absolute;
        top: 0;
        right: 0;
        width: 40px;
        height: 40px;
        background: transparent;
        color: #000;
        display: grid;
        place-content: center;
        font-size: 22px;
        font-weight: 600;
        z-index: 9;
        cursor: pointer;
    }
    .travel_pop
    {
        background:url('<?php echo base_url();?>/assets/images/pexels-vojta-kovařík-3243090.jpg');
        background-size: cover;
        background-position: center;
    }
    @media(max-width:600px)
    {
        .travel_pop
        {
            display:none;
        }
        #model-body
        {
            width:90%;
        }
        .travel_pop1
        {
            width:100%;
        }
    }
    
    
  
	span.num{
		position: absolute;
    color: #ec8b00;
    left: -30%;
    bottom: -50%;
	}
	
	
	.follow_us_section {
    padding: 30px 0px;
}
.lets_txt {
    display: inline-block;
    vertical-align: middle;
    font-size: 18px;
    color: #2a386d;
    text-transform: uppercase;
    padding: 0 30px 0 0;
    font-weight: 500;
}
.lets_list {
    display: inline-block;
    vertical-align: middle;
    position: relative;
}
.lets_list .email_txt {
    border-style: solid !important;
    border-width: 1px !important;
    border-color: rgb(212, 217, 226) !important;
    border-radius: 6px;
    background-color: rgb(255, 255, 255) !important;
    width: 350px;
    height: 42px !important;
    padding: 0 45px 0 10px !important;
    color: #b0b0b3;
    font-size: 14px;
}
.lets_list .submit_btn {
    width: 20px;
    height: 20px;
    position: absolute;
    top: 11px;
    right: 15px;
    background: url(//d2hpxyoi44i7uq.cloudfront.net/wp-content/themes/yaxis-child/images/lets_bg.png) 0 0 no-repeat;
    overflow: hidden;
    border: 0;
    text-indent: 9999px;
    padding: 0;
}
.followus_info {
    float: right;
}
.followus_info .followus_txt {
    display: inline-block;
    vertical-align: middle;
    font-size: 14px;
    color: #696969;
    padding: 0 30px 0 0;
}
  
  .followus_info .followus_txt h5 {
    margin: 0;
    padding: 0;
    font-size: 18px;
    color: #2a386d;
    text-transform: uppercase;
    font-weight: 500;
}
.followus_info .followus_list {
    display: inline-block;
    vertical-align: middle;
}
.followus_info .followus_list ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.followus_info .followus_list ul li {
    display: inline-block;
    vertical-align: middle;
    margin: 0 5px;
    padding: 0;
    color: #b0b0b0;
    font-size: 20px;
}
.followus_info .followus_list ul li a {
    color: #2a386d;
    text-decoration: none;
}
.followus_info .followus_list ul li a em {
    text-indent: -9999px;
    display: inline-block;
    vertical-align: middle;
}
.lets_list .submit_btn {
    width: 20px;
    height: 20px;
    position: absolute;
    top: -4px;
    right: 15px;
    background: url(//d2hpxyoi44i7uq.cloudfront.net/wp-content/themes/yaxis-child/images/lets_bg.png) 0 0 no-repeat;
    overflow: hidden;
    border: 0;
    text-indent: 9999px;
    padding: 0;
}

.call-buton_2{
    position: fixed;
    z-index: 999999999999;
    bottom: 0px;
}

element.style {
}
.cbh-phone.cbh-show {
    visibility: visible;
}
.cbh-phone.cbh-show {
    visibility: visible;
}
.cbh-phone {
    display: block;
    position: fixed;
    right: -81px;
    bottom: -82px;
    visibility: hidden;
    background-color: transparent;
    width: 200px;
    height: 200px;
    cursor: pointer;
    z-index: 999;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    -webkit-transition: visibility .5s;
    -moz-transition: visibility .5s;
    -o-transition: visibility .5s;
    transition: visibility .5s;
}
#model {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgb(0 0 0 / 48%);
      z-index: 999999999;
    }

    #model-body {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%; /* Adjusted for small screens */
      max-width: 550px;
      height: auto;
      background: #fff;
      border-radius: 3px;
    }

    #close-btn {
      position: absolute;
      top: 0;
      right: 0;
      width: 40px;
      height: 40px;
      background: transparent;
      color: #000;
      display: grid;
      place-content: center;
      font-size: 22px;
      font-weight: 600;
      z-index: 9;
      cursor: pointer;
    }

    .travel_pop {
      background: url('<?php echo base_url();?>/assets/images/pexels-vojta-kovařík-3243090.jpg');
      background-size: cover;
      background-position: center;
    }

    /* Add media query for small screens */
    @media (max-width: 600px) {
      .travel_pop {
        display: none;
      }

      #model-body {
        width: 90%;
      }
    }

    span.num {
      position: absolute;
      color: #ec8b00;
      left: -30%;
      bottom: -50%;
    }

</style>

<!-- wpp-btn-mobile -->
<div class="" id="clbh_phone_div"><a style="position: fixed;
    bottom: 0px;
     color: green;
    right: 0px;
    z-index: 99999999999;
    font-size: 56px;
    /* border-radius: 65px; */
    padding: 0px;
    margin: 0px;
    list-style: none;
    text-decoration: none;
" class="fa-brands fa-whatsapp" id="WhatsApp-button" href="https://api.whatsapp.com/send?phone=918826612446" target="_blank"  aria-label="What app" class="phoneJs" title="WhatsApp 360imagem"></a></div>
<!-- wpp-btn-mobile -->

<!--call button-->
 <section class="call-buton_2 " style="bottom: 114px;">
    <div>
      <span id="non_po" style="background: aliceblue;
        color: black;
        border-radius: 30px;
        padding: 8px;
        font-weight: 600; cursor: pointer;">X</span>
    </div>
  </section>

  <section class="call-buton_2">
    <a href="<?php echo base_url();?>assets/magazine/TTJ-April-2024-1.pdf" target="__blank" alt="TTJ-October-2023" aria-label="Download January 2024 Magazine" style="width: 74px;">
      <picture>
        <source>
          <img src="<?php echo base_url();?>assets/magazine/TTJ_April_2024-1.jpg" alt="TTJ-December-2023" aria-label="January 2024 Magazine Cover" style="width: 74px;">
      </picture>
    </a>
  </section>


<section>
     

    </section>

<!-- Footer -->
  <footer class="text-lg-start bg-footer">
  <section class="fot-pd">
    <div class="container text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mb-4">
          
         <div class="bg_icon ">
             <img src="<?php echo base_url();?>/assets/images/tt_logo.png" alt="TTJ TRAVMART">
            
         </div>
        </div>
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
           Quick Links
          </h6>
          <div class="icon-1">
            <ul class="mobftlistch">
              <li><a href="https://www.ttjtravmart.com"  aria-label="Home" rel="nofollow">Home</a></li>
              <li><a href="<?php echo base_url();?>aboutus" aria-label="About Us" rel="nofollow">About Us</a></li>
              <li><a href="<?php echo base_url();?>event" aria-label="Events 2024" rel="nofollow">Events 2024</a></li>
              <li><a href="<?php echo base_url();?>travmart" rel="nofollow">TRAVMART</a></li>
              <li><a href="<?php echo base_url();?>services" rel="nofollow">Services</a></li>
              <li><a href="<?php echo base_url();?>contact" rel="nofollow">Contact Us</a></li>
              <li><a href="<?php echo base_url();?>gallery" rel="nofollow">Gallery</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
           Services
          </h6>
          <ul class="mobftlistch" >
            <li style="color:red">Publications</li>
            <li style="color:red">Travel Trade Shows, Events, and Exhibitions</li>
            <li style="color:red">Rural Marketing and Activations</li>
            <li style="color:red">Marketing and Market Research</li>
            <li style="color:red">Creative Designing</li>
            <li style="color:red">Media Planning and Buying</li>
            <li style="color:red">Digital Marketing</li>
            <li style="color:red">PR and Publicity</li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact Information
          </h6>
       
        
        <div class="footer_call d-flex">
           <div class="footer_no">
               <span>
                   <a href="https://www.google.com/maps/place/13,+Navin+Shahdara,+Shahdara,+New+Delhi,+Delhi+110032/@28.6777352,77.2815732,16.89z/data=!4m6!3m5!1s0x390cfc7facc5f17d:0xc52b2fff61606847!8m2!3d28.6779368!4d77.2836697!16s%2Fg%2F11rptgpr1h"><i class="fa-solid fa-location-dot"></i><span>B-20, 1st Floor, Nangal Dewat, Vasant Kunj, New Delhi - 110070</span> </a> 
           </div>
           <div class="">
               <span></span>
           </div>
        </div>
        <div class="footer_call d-flex">
           <div class="footer_no">
               <span><a href="tel:8826612446"><i class="fa-solid fa-phone"></i> <span>+91 8826612446

</span> </a> 
           </div>
           <div class="">
               <span></span>
           </div>
        </div>
        <div class="footer_call d-flex">
           <div class="footer_no">
               <span><a href="mailto:info@ttjtravmart.com"><i class="fa-solid fa-envelope"></i> <span>info@ttjtravmart.com</span> </a> </span>
            
           </div>
           <div class="footer_no">
              <p></p>
           </div>
        </div>
          </div>
          </section>
          </div>
    </div>
    </section>
    </footer>
    
    <div class="bottom-footer">
              <div class="copyrighttext">
                  Copyright © <span id="year"><?php echo Date("Y")?></span> TTJTRAVMART
              </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

 <script>
		// gallery.js
$(document).ready(function() {
    
     $("#non_po").on("click", function() {
        $(".call-buton_2 ").css("display","none");
    });
    
    
    $(".gallery ul li").on("click", function() {
        var imgSrc = $(this).find("img").attr("src");
        var imgAlt = $(this).find("img").attr("alt");

        $("#lightbox img").attr("src", imgSrc);
        $("#lightbox p").text(imgAlt);

        $("#lightbox").fadeIn();
    });

    $("#lightbox").on("click", function() {
        $(this).fadeOut();
    });
});

	</script>
<script>
    jQuery("#owl-1").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 1,
        responsiveClass: true,
        autoHeight: false,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            350: {
                items: 1
            },
            600: {
                items: 1
            },
            768: {
                items: 1
            },
            1024: {
                items: 1
            }

            // 1366: {
            //     items: 4
            // }
        }
    });
</script>
<script>
    jQuery("#owl-2").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 1,
        responsiveClass: true,
        autoHeight: false,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            350: {
                items: 1
            },
            600: {
                items: 2
            },
            768: {
                items: 3
            },
            1024: {
                items: 3
            }

            // 1366: {
            //     items: 4
            // }
        }
    });
</script>
<script>
    jQuery("#owl-3").owlCarousel({

        stagePadding: 0,
        // loop:true,
        // margin:10,
        nav: false,
        // autoplay: true,
        slideTransition: 'linear',
        autoplayTimeout: 3000,
        autoplaySpeed: 3000,
        autoplayHoverPause: true,


        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 1,
        responsiveClass: true,
        autoHeight: false,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        nav: false,
        responsive: {
            0: {
                items: 2
            },
            350: {
                items: 3
            },
            600: {
                items: 5
            },
            768: {
                items: 6
            },
            1024: {
                items: 6
            }

            // 1366: {
            //     items: 4
            // }
        }
    });
</script>
<script>
    $('.btn-travel').on('click', function() {
        $('#model').fadeIn();
    });
    $('#close-btn').on('click', function() {
        $('#model').fadeOut();
    });
</script>

</body>
</html>
