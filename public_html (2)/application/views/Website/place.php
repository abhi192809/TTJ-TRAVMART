
<?php
include("config.php");
?>
<!-- Website/place.php -->
<?php foreach($city as $row): ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "TouristDestination",
        "name": "<?php echo $row['City_filter']?>",
        "description": "<?php echo strip_tags($row['First_section']); ?> <?php echo strip_tags($row['Second_section']); ?>",
        "url": "https://www.ttjtravmart.com/place/international/<?php echo $row['City_filter']?>",
        "image": [
            "https://www.ttjtravmart.com<?php echo base_url()?>/assets/marketplace/<?php echo strip_tags($row['Main_image']); ?>",
            "https://www.ttjtravmart.com<?php echo base_url()?>/assets/marketplace/<?php echo strip_tags($row['Image1']); ?>",
            "https://www.ttjtravmart.com<?php echo base_url()?>/assets/marketplace/<?php echo strip_tags($row['Image2']); ?>",
            "https://www.ttjtravmart.com<?php echo base_url()?>/assets/marketplace/<?php echo strip_tags($row['Image3']); ?>",
            "https://www.ttjtravmart.com<?php echo base_url()?>/assets/marketplace/<?php echo strip_tags($row['Image4']); ?>"
        ],
        "touristType": {
            "@type": "Audience",
            "audienceType": [
                "Adventure seekers",
                "Nature enthusiasts",
                "Culture seekers",
                "History buffs",
                "Beach lovers",
                "Foodies",
                "Art and music enthusiasts",
                "Outdoor adventurers",
                "Wellness seekers",
                "Family travelers"
            ]
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "YourLatitudeHere",
            "longitude": "YourLongitudeHere"
        },
        "hasMap": {
            "@type": "Map",
            "name": "Location Map",
            "url": "<?php echo $row['Location'] ?>"
        },
        "mustVisitSpots": [
            "<?php echo $row['populer_place_1']?>",
            "<?php echo $row['populer_place_2']?>",
            "<?php echo $row['populer_place_3']?>",
            "<?php echo $row['populer_place_4']?>",
            "<?php echo $row['populer_place_5']?>"
        ],
        "accommodations": [
            <?php
            $id_get = $row['id'];
            $accommodations = $this->Place_models->get_accommodations($id_get);
            foreach ($accommodations as $row1):
            ?>
            {
                "@type": "LodgingBusiness",
                "name": "<?php echo $row1['name'] ?>",
                "address": "<?php echo $row1['address'] ?>",
                "telephone": "<?php echo $row1['number'] ?>"
            },
            <?php endforeach; ?>
        ],
        "tourOperators": [
            <?php
            $tourOperators = $this->Place_models->get_tour_operators($id_get);
            foreach ($tourOperators as $row2):
            ?>
            {
                "@type": "TravelAgency",
                "name": "<?php echo $row2['name'] ?>",
                "address": "<?php echo $row2['address'] ?>",
                "telephone": "<?php echo $row2['number'] ?>"
            },
            <?php endforeach; ?>
        ]
    }
    </script>
<?php endforeach; ?>



<style>
    textarea:focus, input:focus{
     outline: none !important;
    }

    .span_seton span{
        margin-right:2px;
        margin-left:2px;
    }
    
    .span_seton span{
        position: relative;
    }
    .form-control{
        border-radius: 0px;
    }
    .ok{
        position: absolute;
        top:28px;
        left:10px;
    }
    .border_set_option{
    width: 100%;
    margin-top: 2px;
    background: red;
    border-radius: 2px;
    box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
    display:none;
    }
    .set_border_sh{
        
    box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.16);
    }
    .most_li{
            padding: 19px;
    }
    .most_li li{
        font-size:17px;
     margin: 12px 10px;
    border-bottom: 1px dotted;
    }
      .on_click_slide_slow_down {
            display: none;
    }
    
         .td_name{
           width:80%;   
         }
         
         .td_add{
           width:20%;   
         }
         
        
        @media only screen and (max-width: 600px) {
        
         .td_name, .td_add {
         /*display: block;*/
         font-size:12px;
         width: 100%;
        }
    }
  
  .slider-container {
  position: relative;
  overflow: hidden;
  width: 100%;
}

.slider {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.slide {
  min-width: 100%;
  box-sizing: border-box;
}

.button_me {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 24px;
  background: none;
  border: none;
  cursor: pointer;
}

.prev {
  left: 10px;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  background: black;
}

.next {
  right: 10px;
    width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  background: black;

}

 .border_set_option1{display:none};


.form-control:focus {
    color: none;
    background-color: none;
     border-color:none; 
    outline: 0;
     box-shadow: none; 
}
</style>

<!-- That Form  teptop-->
 <?php

 foreach ($city as $row) {
$userIP = $_SERVER['REMOTE_ADDR'];
$id = $row['id'];

?>   
<section >

<div class="container" >

<div style="margin-top:45px" class=" d-md-block d-sm-none d-none mb-5">
   <span style="color:cornflowerblue" >Home - Marketplace - <span style="color:red" ><?php echo $row['City_filter']?></span> </span>
</div>

  <div class="d-none" id="set_place_id"> <?php echo $row['id'] ?></div>
<div class="text-center  d-md-none d-sm-block d-block" style="margin-top:32px">
    <p class="h1" style="color:red"><?php echo ucfirst(strtolower($row['City_filter'])); ?></p>

</div>
  <div class="row ">
    <div class="col-md-1"></div>
    <div class="col-md-4 d-md-block d-sm-none d-none" style="border: 1px solid red;">
        <div class="text-center">
            <img src="<?php echo base_url();?>assets/marketplace/Logo_2.png" width="60%" style="
    padding: 34px;
    padding-bottom: 0px;
" alt="Markit place">
        </div>
       <!--<h6 class="text-center pt-2 m-0  mt-3"> Discover  <span style="color:red">More Places </span></h6>-->
       <br>
      <form  id="Form">
         <div  class="set_option">
             <span class="span_seton">
                 
              <span  style="width: 100%;">
                <div class="ok">
                  <i class="fa-solid fa-archway" style="color:red;"></i>
                </div>
                
                <input type="text" style="color:red;padding-left: 31px;" name="location" class="form-control key_up_country" Placeholder="Select India OR International">
                <div class="border_set_option" >
                <div class="form-control w-100 "id="set_country_show"></div>
                
                </div>
              </span>
             
              <span  style="width: 100%;">
                <div class="ok">
                  <i class="fa-solid fa-location-dot" style="color: red;"></i>
                </div>
                <input type="text" style="color:red;padding-left: 31px;" name="city" class="form-control key_up_city" placeholder="Location Of the Place">
                <div class="border_set_option1" id="1">
                     <div class="form-control w-100 " id="set_city_show"></div>
                </div>
              </span>
              <input type="submit" class="form-control mt-2 mb-2 btn btn-primary set_avalue" style="background:red;border:0px" value="Discover">
             </span>
             </div>
         
      </form>
        <h4 class=" pt-2 pb-2  mb-3 m-0" style="border-bottom:1px solid black"><span style="color:red">Map </span></h4>
     <iframe src="<?php echo $row['Location']?>" width="100%" height="220" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"  title="Description Location of  <?php echo $row['City_filter']?> "></iframe>
     
    </div>
    
    <div class="col-md-6 col-sm-12 col-12">
        <div class="row">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="padding: 0px;margin: 0px;border:1px solid red">
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <picture>
                      <source >
                        <img src="<?php echo base_url()?>assets/marketplace/<?php echo $row['Main_image']?>" alt="<?php echo $row['main_img_alt']?>" class="d-block w-100" height="350px"  loading="lazy">
                    </picture>
                </div>
                <div class="carousel-item">
                    <picture>
                      <source>
                        <img src="<?php echo base_url()?>assets/marketplace/<?php echo $row['Image1']?>" alt="<?php echo $row['imag_1_alt']?>" class="d-block w-100" height="350px"  loading="lazy">
                    </picture>
                </div>
                <div class="carousel-item">
                    <picture>
                      <source >
                        <img src="<?php echo base_url()?>assets/marketplace/<?php echo $row['Image2']?>" alt="<?php echo $row['imag_2_alt']?>" class="d-block w-100" height="350px"  loading="lazy">
                    </picture>
                </div>
                
                <div class="carousel-item">
                    <picture>
                      <source >
                       <img src="<?php echo base_url()?>assets/marketplace/<?php echo $row['Image3']?>" alt="<?php echo $row['imag_3_alt']?>" class="d-block w-100" height="350px"  loading="lazy">
                    </picture>
                </div>
                
                <div class="carousel-item">
                    <picture>
                      <source >
                         <img src="<?php echo base_url()?>assets/marketplace/<?php echo $row['Image4']?>" alt="<?php echo $row['imag_4_alt']?>" class="d-block w-100" height="350px"  loading="lazy">
                    </picture>
                </div>
                
              <!--  <div class="carousel-item">-->
              <!--    <img src="<?php echo $row['Image5']?>" alt="<?php echo $row['imag_5_alt']?>" class="d-block w-100" height="350px">-->
              <!--  </div>-->
              <!--</div>-->
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
        </div>
        <div class="row p-0 m-0 d-none">
            <div class="col-md-4 p-0 m-0">
                  <img src="<?php echo $row['add1']?>" alt="<?php echo $row['add1']?>" class="d-block w-100" height="100%">
            
            </div>
            <div class="col-md-4 p-0 m-0">
                   <img src="<?php echo $row['add2']?>" alt="<?php echo $row['add2']?>" class="d-block w-100" height="100%">
            
            </div>
            <div class="col-md-4 p-0 m-0">
                      <img src="<?php echo $row['add3']?>" alt="<?php echo $row['add3']?>" class="d-block w-100" height="100%">
            
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
</section>

<!-- Mobile submit-->
<section>
    <div class="container-fluid">
        
<div class="row">
    <div class="col-md-12 col-sm-12 col-12 d-md-none d-sm-block d-block">
         <form  id="Form1">
         <div  class="set_option">
             <span class="span_seton">
                 
              <span  style="width: 100%;">
                <div class="ok">
                  <i class="fa-solid fa-archway" style="color:red;"></i>
                </div>
                <input type="text" style="color:red;padding-left: 31px;" name="location1" class="form-control key_up_country1" Placeholder="Select India OR International">
                <div class="border_set_option1" >
                <div class="form-control w-100 "id="set_country_show1"></div>
                
                </div>
              </span>
              <span  style="width: 100%;">
                <div class="ok">
                  <i class="fa-solid fa-location-dot" style="color: red;"></i>
                </div>
                <input type="text" style="color:red;padding-left: 31px;" name="city1" class="form-control key_up_city1" placeholder="Location Of the Place">
                <div class="border_set_option1" id="1">
                     <div class="form-control w-100 " id="set_city_show1"></div>
                </div>
              </span>
              <input type="submit" class="form-control mt-2 mb-2 btn btn-primary set_avalue1" style="background:red;border:0px" value="Discover">
             </span>
             </div>
         
      </form>
    </div>
</div>
    </div>
</section>
<!--   leptop -->


<section class="d-md-block d-sm-none d-none">
    <div class="container mt-1" style=" text-align: justify;">
      <div class="row ">
         <div class="col-md-6 col-sm-6 col-3  px-1 text-center">
             <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                Air Connectivity
                            </p>
                        </td>
                        <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon">+</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="border on_click_slide_slow_down toggle-content">
                      <?php echo $row['point_1']?>
            </div>
         </div>
         <!--<div class="col-md-4 col-sm-6 col-3  px-1 text-center">-->
         <!--    <div class="border mt-1 mb-1 toggle-section">-->
         <!--        <table style="width:100%">-->
         <!--           <tr>-->
         <!--               <td class="td_name">-->
         <!--                   <p class="pt-3">   -->
         <!--                           Vibrant Cities-->
         <!--                   </p>-->
         <!--               </td>-->
         <!--               <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">-->
         <!--                    <span class="icon">+</span>-->
         <!--               </td>-->
         <!--           </tr>-->
         <!--       </table>-->
         <!--   </div>-->
         <!--   <div class="border on_click_slide_slow_down toggle-content">-->
         <!--             <?php echo $row['point_2']?>-->
         <!--   </div>-->
         <!--</div>-->
         <div class="col-md-6 col-sm-6 col-3  px-1 text-center">
             <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                    Visitor Attractions
                            </p>
                        </td>
                        <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon">+</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="border on_click_slide_slow_down toggle-content">
                      <?php echo $row['point_3']?>
            </div>
         </div>
          <div class="col-md-4 col-sm-6 col-3  px-1 text-center">
            <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p  class="pt-3">   
                                Accommodation
                            </p>
                        </td>
                        <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon3">+</span>
                        </td>
                    </tr>
                </table>
            </div>
         </div>
         <div class="col-md-4  col-sm-6 col-3 px-1 text-center">
              <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                 Food
                            </p>
                        </td>
                        <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon">+</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="border on_click_slide_slow_down toggle-content">
                 <?php echo $row['point_4']?>
            </div>
         </div>
         <div class="col-md-4  col-sm-6 col-3 px-1 text-center">
             <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                   DMC/Tour Operaror
                            </p>
                        </td>
                        <td  class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon3">+</span>
                        </td>
                    </tr>
                </table>
            </div>
         </div>
         <div>
      </div>
    </div>    
</section>


<!--Mobile-->

<section class="d-md-none d-sm-block d-block">
    <div class="container mt-1" style=" text-align: justify;">
      <div class="row ">
         <div class="col-md-4 col-sm-6 col-6  px-1 text-center">
             <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                  Air Connectivity
                            </p>
                        </td>
                        <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon1">+</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="border on_click_slide_slow_down toggle-content">
                      <?php echo $row['point_1']?>
            </div>
         </div>
        
         <!--<div class="col-md-4 col-sm-6 col-6  px-1 text-center">-->
         <!--    <div class="border mt-1 mb-1 toggle-section">-->
         <!--        <table style="width:100%">-->
         <!--           <tr>-->
         <!--               <td class="td_name">-->
         <!--                   <p class="pt-3">   -->
         <!--                          Vibrant Cities-->
         <!--                   </p>-->
         <!--               </td>-->
         <!--               <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">-->
         <!--                    <span class="icon1">+</span>-->
         <!--               </td>-->
         <!--           </tr>-->
         <!--       </table>-->
         <!--   </div>-->
         <!--   <div class="border on_click_slide_slow_down toggle-content">-->
         <!--        <?php echo $row['point_2']?>-->
         <!--   </div>-->
         <!--</div>-->
         <div class="col-md-4 col-sm-6 col-6  px-1 text-center">
             <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                    Visitor Attractions
                            </p>
                        </td>
                        <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon1">+</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="border on_click_slide_slow_down toggle-content">
                      <?php echo $row['point_3']?>
            </div>
         </div>
         <div class="col-md-3  col-sm-6 col-12 px-1 text-center">
              <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                 Food
                            </p>
                        </td>
                        <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon1">+</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="border on_click_slide_slow_down toggle-content">
                 <?php echo $row['point_4']?>
            </div>
         </div>
          <div class="col-md-4 col-sm-6 col-6  px-1 text-center">
            <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                Accommodation
                            </p>
                        </td>
                        <td class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon3">+</span>
                        </td>
                    </tr>
                </table>
            </div>
         </div>
         <div class="col-md-4  col-sm-6 col-6 px-1 text-center">
             <div class="border mt-1 mb-1 toggle-section">
                 <table style="width:100%">
                    <tr>
                        <td class="td_name">
                            <p class="pt-3">   
                                    DMC/Tour Operaror
                            </p>
                        </td>
                        <td  class="td_add" style="font-size: 25px;color: cornflowerblue;font-weight: 800;">
                             <span class="icon3">+</span>
                        </td>
                    </tr>
                </table>
            </div>
         </div>
        
         <div>
      </div>
    </div>    
</section>

<br>
<div class="text-center d-md-block d-sm-none d-none">
    <h1 style="color:red"><?php echo ucfirst(strtolower($row['City_filter'])); ?></h1>
</div>
<br>

<section>
    <div class="container mt-1" style="text-align: justify;">
      <div class="row ">
        <div class="col-md-9">
            <?php echo $row['Fist_section']?>
        </div>
        <div class="col-md-3">
             <div style="background: cornsilk;border: 1px solid red;">
                 <ul class="most_li">
                     <li><h5>Must Visit Spots in <?php echo ucfirst(strtolower($row['City_filter'])); ?></h5></li>
                     <li><?php echo $row['populer_place_1']?></li>
                     <li><?php echo $row['populer_place_2']?></li>
                     <li><?php echo $row['populer_place_3']?></li>
                     <li><?php echo $row['populer_place_4']?></li>
                     <li><?php echo $row['populer_place_5']?></li>
                 </ul>
             </div>
        </div>
        <div class="col-md-12">
            <?php echo $row['Second_section']?>
        </div>
          <div class="alert alert-primary mt-2" role="alert">
        <marquee>Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor! <span style="color:red">Register Now </span> </marquee>
</div>
      </div>
 </div>
</section>
<br>
 <!-- Mobile version-->
<section class="d-md-none d-sm-block d-block blurred ">
 <h2 class="mx-3 mb-3 pb-3" style="border-bottom:1px solid black">Accommodation</h2>
    <div class="container mt-1 " style="    text-align: justify;">
      <div class="row ">
<?php
    $config = mysqli_connect('localhost','u125051193_ttj','Ahishek@123','u125051193_ttj');
    
    $userIP = $_SERVER['REMOTE_ADDR'];
    

// Construct the SQL query
$sql = "SELECT * FROM `led` WHERE ip='$userIP'";

// Execute the query
$result = $config->query($sql);

// Check for errors
if ($result) {
    $url = $_SERVER['REQUEST_URI'];
$lastSegment = basename($url);
$sql = "SELECT * FROM city WHERE City_filter = '$lastSegment'";
$result = mysqli_query($config,$sql); 

 if($row = mysqli_fetch_array($result)) {
     $id_get  =  $row['id'];
    $sql1 = "SELECT * FROM   Accommodation WHERE id_city = '$id_get'";
    $result1 = mysqli_query($config,$sql1);
    if($result1){
       $i= 1;
       while($row1 = $row = mysqli_fetch_array($result1) ){
         
      
       ?>
         <div class="col-sm-12 col-12 not_show ">
                <div CLASS="mx-1 px-3 pt-2 pb-2 "  style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                <h4 style="color: red;padding-bottom: 0px;"><?php echo $row['name'] ?></h4>
                <small style="color: darkgray;"><?php echo $row['address'] ?></small>
                <p style="color: darkgray;margin:0px">Number - <?php echo $row['number'] ?> </p>
                <p style="color: darkgray;margin:0px">Email ID - <?php echo $row['mail'] ?>  </p>    
                <p style="color: darkgray;margin:0px">Web - <?php echo $row['website'] ?>  </p>    
            </div>
        </div>
       <?php
       $i++;
       }
        
    }
    else{
        ?>
        <!-- Entry 1 -->
          <div class="col-sm-12 col-12  ">
                <div CLASS="mx-1 px-3 pt-2 pb-2"  style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                <h4 style="color: red;padding-bottom: 0px;">xxxxx</h4>
                <small style="color: darkgray;">xxxxxxxxxxxxxxx</small>
                <p style="color: darkgray;margin:0px">Number - xxxxxxxxxxxxxxx </p>
                <p style="color: darkgray;margin:0px">Email ID - xxxxxxxxxxxxx  </p>    
                <p style="color: darkgray;margin:0px">Web - xxxxxxxxxxxx  </p>    
            </div>
        </div> 
        <?php
    }
    ?>
   
    <?php
 }
}
?>
        
      </div>
 </div>
</section>

<section class="mobile_not_show">
   <div class="container-fluid text-center d-md-none d-sm-block d-block">
       <div class="row">
           <div class="col-md-4 col-sm-4 col-12">
               
           </div>
           <div class="col-md-4 col-sm-4 col-12">
             <form id="form2"  class="submit_leed">
                <small>Submit Your Mail To See that Entry</small>
                <input type="email" class="form-control" name="mail" id="mail1" placeholder="abc@example.com" required> 
                <br>
                <input type="button" class="btn btn-danger" value="Submit" id="submitBtn2">
            </form>
           </div>
           <div class="col-md-4 col-sm-4 col-12 ">
               
           </div>
       </div>
   </div>        
</section>
 <section class="d-md-none d-sm-block d-block blurred  ">
      <h2 class="mx-3 mb-3 pb-3 mt-3" style="border-bottom:1px solid black"> DMC/Tour Operaror</h2>
    <div class="container mt-1 " style="    text-align: justify;">
      <div class="row ">
                             <?php
    $config = mysqli_connect('localhost','u125051193_ttj','Ahishek@123','u125051193_ttj');
    
    $userIP = $_SERVER['REMOTE_ADDR'];
    

// Construct the SQL query
$sql = "SELECT * FROM `led` WHERE ip='$userIP'";

// Execute the query
$result = $config->query($sql);

// Check for errors
if ($result) {
    $url = $_SERVER['REQUEST_URI'];
$lastSegment = basename($url);
$sql = "SELECT * FROM city WHERE City_filter = '$lastSegment'";
$result = mysqli_query($config,$sql); 

 if($row = mysqli_fetch_array($result)) {
     $id_get  =  $row['id'];
    $sql1 = "SELECT * FROM  DMC WHERE id_city = '$id_get'";
    $result1 = mysqli_query($config,$sql1);
    if($result1){
       $i= 1;
       while($row1 = $row = mysqli_fetch_array($result1) ){
         
      
       ?>
         <div class="col-sm-12 col-12 not_show">
                <div CLASS="mx-1 px-3 pt-2 pb-2"  style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                <h4 style="color: red;padding-bottom: 0px;"><?php echo $row['name'] ?></h4>
                <small style="color: darkgray;"><?php echo $row['address'] ?></small>
                <p style="color: darkgray;margin:0px">Number - <?php echo $row['number'] ?> </p>
                <p style="color: darkgray;margin:0px">Email ID - <?php echo $row['mail'] ?>  </p>    
                <p style="color: darkgray;margin:0px">Web - <?php echo $row['website'] ?>  </p>    
            </div>
        </div>
       <?php
       $i++;
       }
        
    }
    else{
        ?>
        <!-- Entry 1 -->
          <div class="col-sm-12 col-12  ">
                <div CLASS="mx-1 px-3 pt-2 pb-2"  style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                <h4 style="color: red;padding-bottom: 0px;">xxxxx</h4>
                <small style="color: darkgray;">xxxxxxxxxxxxxxx</small>
                <p style="color: darkgray;margin:0px">Number - xxxxxxxxxxxxxxx </p>
                <p style="color: darkgray;margin:0px">Email ID - xxxxxxxxxxxxx  </p>    
                <p style="color: darkgray;margin:0px">Web - xxxxxxxxxxxx  </p>    
            </div>
        </div> 
        <?php
    }
    ?>
   
    <?php
 }
}
?>
          
      </div>
      </div>
</section>
 
<style>
  
<?php
include("config.php");

// Get the user's IP address
$userIP = md5($_SERVER['REMOTE_ADDR']);
// Check if the IP address is valid
    $query = "SELECT * FROM `led` WHERE ip='$userIP'";

    // Execute the query
    $result = $config->query($query);
    // Rows found, do something with the data
        if($row = $result->fetch_assoc()) {
            if($row['ip'] === $userIP ){
                ?>
                .mobile_not_show{
                    display:none;
                }
                .leptop_show_sub{
                    display:none;
                }
                <?php
            }
         
        }
           else{
              ?>
              
            .blurred {
                filter: blur(5px);
            }

            .blurred1 {
                filter: blur(5px);
            }
        
              <?php
                
            }
?>
  
    /* Optional: Style for the button */
    .button-container {
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1000;
    }

    /* Optional: Style for the button */
    .button1 {
      padding: 10px 20px;
      background-color: #3498db;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Optional: Style for the input field */
    .form-container {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: 1000;
    }

    /* Optional: Style for the input field */
    .form-input {
      margin-bottom: 10px;
      padding: 5px;
    }
  </style>
 <!--Leptop Version-->
 <section>
     <div class='container d-md-block d-sm-none d-none remove_class'>
<h2 class="mx-3 mb-3 pb-3" style="border-bottom:1px solid black">Accommodation</h2>
 
      <div class="row ">
   
<!-- HTML table with entries -->
<table class="table one_of_ee blurred1">
  <thead class="text-white" style="background:black">
    <tr>
      <th scope="col">So NO.</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Contact No</th>
      <!--<th scope="col">Mail ID</th>-->
      <!--<th scope="col">Website</th>-->
    </tr>
  </thead>
  <tbody>
    <?php
    include("config.php");
    
    $userIP = $_SERVER['REMOTE_ADDR'];
    

// Construct the SQL query
$sql = "SELECT * FROM `led` WHERE ip='$userIP'";

// Execute the query
$result = $config->query($sql);

// Check for errors
if ($result) {
    $url = $_SERVER['REQUEST_URI'];
$lastSegment = basename($url);
$sql = "SELECT * FROM city WHERE City_filter = '$lastSegment'";
$result = mysqli_query($config,$sql); 

 if($row = mysqli_fetch_array($result)) {
     $id_get  =  $row['id'];
    $sql1 = "SELECT * FROM  Accommodation WHERE id_city = '$id_get'";
    $result1 = mysqli_query($config,$sql1);
    if($result1){
       $i= 1;
       while($row1 = $row = mysqli_fetch_array($result1) ){
         
      
       ?>
        <tr class="not_show">
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['address'] ?></td>
          <td><?php echo $row['number'] ?></td>
          <!--<td><?php echo $row['mail'] ?></td>-->
          <!-- <td><?php echo $row['website'] ?></td>-->
         </tr>
       <?php
       $i++;
       }
        
    }
    
 }
}
?>
  </tbody>
</table>
        </div>         
     </div>
 </section>
 <br>
 <br>
<section class="leptop_show_sub">
   <div class="container-fluid text-center d-md-block d-sm-none d-none ">
       <div class="row">
           <div class="col-md-4 col-sm-4 col-12">
               
           </div>
           <div class="col-md-4 col-sm-4 col-12">
             <form id="form1"  class="submit_leed">
                <small>Submit Your Mail To See that Entry</small>
                <input type="email" class="form-control" name="mail" id="mail1" placeholder="abc@example.com" required> 
                <br>
                <input type="button" class="btn btn-danger" value="Submit" id="submitBtn1">
            </form>
           </div>
           <div class="col-md-4 col-sm-4 col-12 ">
               
           </div>
       </div>
   </div>        
</section>
 <section>
     <div class='container d-md-block d-sm-none d-none  remove_class'>
     <h2 class="mx-3 mb-3 pb-3 mt-3" style="border-bottom:1px solid black"> DMC/Tour Operaror</h2>
 
      <div class="row ">
          <div class="col-md-1">
              
          </div>
        <div class="col-md-12">
            <table class="table one_of_ee blurred1">
              <thead class="text-white" style="background:black">
                <tr>
                  <th scope="col">So NO.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Contect No</th>
                  <!--<th scope="col">Mail ID</th>-->
                  <!--<th scope="col">Website</th>-->
                </tr>
              </thead>
              <tbody>
                 <?php
    include("config.php");
    
    $userIP = $_SERVER['REMOTE_ADDR'];
    

// Construct the SQL query
$sql = "SELECT * FROM `led` WHERE ip='$userIP'";

// Execute the query
$result = $config->query($sql);

// Check for errors
if ($result) {
    $url = $_SERVER['REQUEST_URI'];
$lastSegment = basename($url);
$sql = "SELECT * FROM city WHERE City_filter = '$lastSegment'";
$result = mysqli_query($config,$sql); 

 if($row = mysqli_fetch_array($result)) {
     $id_get  =  $row['id'];
    $sql1 = "SELECT * FROM  DMC WHERE id_city = '$id_get'";
    $result1 = mysqli_query($config,$sql1);
    if($result1){
       $i= 1;
       while($row1 = $row = mysqli_fetch_array($result1) ){
         
      
       ?>
        <tr class="not_show">
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['address'] ?></td>
          <td><?php echo $row['number'] ?></td>
          <!--<td><?php echo $row['mail'] ?></td>-->
          <!-- <td><?php echo $row['website'] ?></td>-->
         </tr>
       <?php
       $i++;
       }
        
    }
  }
}
?>
              </tbody>
              
            </table>
        </div>         
     </div>
 </section>
 
<?php
     
 }

?>
<script>
 $(document).ready(function () {
        // Use event delegation to handle click events on elements with the class "icon"
          $(document).on("click", ".icon", function () {
            // Find the closest parent div with class "toggle-section" and get the text content
            var contentText = $(this).closest('.toggle-section').find('p').text().trim();

            // Toggle the visibility of the element with class "on_click_slide_slow_down"
            $(this).closest('.toggle-section').next('.on_click_slide_slow_down').slideToggle();

            // Toggle text and class between "+" and "-"
            $(this).text(function (_, text) {
                return text === "+" ? "--" : "+";
            });

            // Log or do something with the dynamic text content
            console.log(contentText);
        });
    });
</script>

<script>
$(document).ready(function() {
    // Wait for the document to be ready
    $(".key_up_country").keyup(function() {
         $(".key_up_city").val("");
           $("#set_city_show").html("");
        // When a key is released in the input field
           var inputValue = $(".key_up_country").val(); // Get the current value of the input
        if(inputValue.trim() !== ''){
        var borderSetOption = $("#set_country_show");
        // Display a loading indicator
        borderSetOption.html("<div>Loading...</div>");
         $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>Marketplace/get_country", // Update this with the correct URL
                        data: { data: inputValue },
                        success: function(response) {
                            console.log("Raw Response:", response);
                            $("#set_country_show").css("display", "block");
                            $(".border_set_option").css("display", "block");

                            if (response.length > 0) {
                                var html = "";
                                $.each(response, function(index, value) {
                                    html += "<div class='form-control w-100 take_that_value' style='color: red; border: 0; border-bottom: 1px solid red;' id='" + value.id + "'>" + value.name + "</div>";
                                });
                                borderSetOption.html(html);
                            } else {
                                borderSetOption.html("Select Any One India OR International.");
                            }
                        },
        }); 
        }
        else{
             $("#border_set_option").html("");
                 $(".border_set_option").css("display", "none");
            
        }
    });

    $(".border_set_option").on("click", ".take_that_value", function() {
    // Your code to handle the click event goes here
    var selectedValue = $(this).text();
    var id = $(this).attr("id");

    $(".key_up_country")
        .val(selectedValue)
        .attr("id", id);
    // Stop displaying the results
     $("#set_country_show").css("display","none");
    });








$(".key_up_city").keyup(function() {
    // When a key is released in the input field
    var countryId = $(".key_up_country").attr("id"); // Get the country ID
    var inputValue = $(".key_up_city").val(); // Get the current value of the input
   
    if (inputValue.trim() !== '') {
        var borderSetOption = $("#set_city_show");
        // Display a loading indicator
        borderSetOption.html("<div>Loading...</div>");

        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Marketplace/getCities", // Replace with your server endpoint
            data: {countryId: countryId,data:inputValue}, // Data to send to the server
            dataType: 'json', // Specify the expected response type
            success: function(responseData) {
                
                if (responseData.length > 0) {
                     $("#set_city_show").css("display","block");
                $(".border_set_option1").css("display", "block");
                    var html = "";
                    $.each(responseData, function(index,value) {
                        console.log(value.City_filter);
                        // Exclude 'id' from the result
                        html += "<div class='form-control w-100 set_city_show' style='color: red;border:0;border-bottom:1px solid red;'>" + value.City_filter + "</div>";
                    });
                    // Update the result list
                    borderSetOption.html(html);
                } else {
                    // Handle case when no data is found
                    borderSetOption.html("Soon To be added");
                }
            },
        });
    } else {
        // $("#set_country_show").html("");
        
    }
});
  
  
  
$(".border_set_option1").on("click", ".set_city_show", function() {
    // Your code to handle the click event goes here
    var selectedValue = $(this).text();

    $(".key_up_city")
        .val(selectedValue)
     
    // Stop displaying the results
    $("#set_city_show").css("display","none");
    });
    
  $("#Form").on('submit', function (event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the values of the input fields
    var locationValue = $("input[name='location']").val().replace(/[%\s]+/g, '');
    var cityValue = $("input[name='city']").val();

    // Construct a more SEO-friendly URL
    var url = "https://www.ttjtravmart.com/place/" + locationValue + "/" + cityValue;

    // Redirect to the constructed URL
    window.location.href = url;
  });
  
  
  
//   mobile

$(document).ready(function() {
    // Wait for the document to be ready
    $(".key_up_country").keyup(function() {
         $(".key_up_city").val("");
           $("#set_city_show").html("");
        // When a key is released in the input field
           var inputValue = $(".key_up_country").val(); // Get the current value of the input
        if(inputValue.trim() !== ''){
        var borderSetOption = $("#set_country_show");
        // Display a loading indicator
        borderSetOption.html("<div>Loading...</div>");
         $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>Marketplace/get_country", // Update this with the correct URL
                        data: { data: inputValue },
                        success: function(response) {
                            console.log("Raw Response:", response);
                            $("#set_country_show").css("display", "block");
                            $(".border_set_option").css("display", "block");

                            if (response.length > 0) {
                                var html = "";
                                $.each(response, function(index, value) {
                                    html += "<div class='form-control w-100 take_that_value' style='color: red; border: 0; border-bottom: 1px solid red;' id='" + value.id + "'>" + value.name + "</div>";
                                });
                                borderSetOption.html(html);
                            } else {
                                borderSetOption.html("Select Any One India OR International.");
                            }
                        },
        }); 
        }
        else{
             $("#border_set_option").html("");
                 $(".border_set_option").css("display", "none");
            
        }
    });

    $(".border_set_option").on("click", ".take_that_value", function() {
    // Your code to handle the click event goes here
    var selectedValue = $(this).text();
    var id = $(this).attr("id");

    $(".key_up_country")
        .val(selectedValue)
        .attr("id", id);
    // Stop displaying the results
     $("#set_country_show").css("display","none");
    });








$(".key_up_city").keyup(function() {
    // When a key is released in the input field
    var countryId = $(".key_up_country").attr("id"); // Get the country ID
    var inputValue = $(".key_up_city").val(); // Get the current value of the input
   
    if (inputValue.trim() !== '') {
        var borderSetOption = $("#set_city_show");
        // Display a loading indicator
        borderSetOption.html("<div>Loading...</div>");

        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Marketplace/getCities", // Replace with your server endpoint
            data: {countryId: countryId,data:inputValue}, // Data to send to the server
            dataType: 'json', // Specify the expected response type
            success: function(responseData) {
                
                if (responseData.length > 0) {
                     $("#set_city_show").css("display","block");
                $(".border_set_option1").css("display", "block");
                    var html = "";
                    $.each(responseData, function(index,value) {
                        console.log(value.City_filter);
                        // Exclude 'id' from the result
                        html += "<div class='form-control w-100 set_city_show' style='color: red;border:0;border-bottom:1px solid red;'>" + value.City_filter + "</div>";
                    });
                    // Update the result list
                    borderSetOption.html(html);
                } else {
                    // Handle case when no data is found
                    borderSetOption.html("Soon To be added");
                }
            },
        });
    } else {
        // $("#set_country_show").html("");
        
    }
});
  
  
  
$(".border_set_option1").on("click", ".set_city_show", function() {
    // Your code to handle the click event goes here
    var selectedValue = $(this).text();

    $(".key_up_city")
        .val(selectedValue)
     
    // Stop displaying the results
    $("#set_city_show").css("display","none");
    });
    
  $("#Form").on('submit', function (event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the values of the input fields
    var locationValue = $("input[name='location']").val().replace(/[%\s]+/g, '');
    var cityValue = $("input[name='city']").val();

    // Construct a more SEO-friendly URL
    var url = "https://www.ttjtravmart.com/place/" + locationValue + "/" + cityValue;

    // Redirect to the constructed URL
    window.location.href = url;
  });
 
  
  
  
  
//    mobile 


$(".key_up_country1").keyup(function() {
            $(".key_up_city1").val("");
            $("#set_city_show1").html("");
            // When a key is released in the input field
            var inputValue = $(".key_up_country1").val(); // Get the current value of the input
            if (inputValue.trim() !== '') {
                var borderSetOption = $("#set_country_show1");
                // Display a loading indicator
                borderSetOption.html("<div>Loading...</div>");

                $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>Marketplace/get_country", // Update this with the correct URL
                        data: { data: inputValue },
                        success: function(response) {
                            console.log("Raw Response:", response);
                            $("#set_country_show1").css("display", "block");
                            $(".border_set_option1").css("display", "block");

                            if (response.length > 0) {
                                var html = "";
                                $.each(response, function(index, value) {
                                    html += "<div class='form-control w-100 take_that_value1' style='color: red; border: 0; border-bottom: 1px solid red;' id='" + value.id + "'>" + value.name + "</div>";
                                });
                                borderSetOption.html(html);
                            } else {
                                borderSetOption.html("Select Any One India OR International.");
                            }
                        },

                });
            } else {
                $("#border_set_option1").html("");
                $(".border_set_option1").css("display", "none");

            }
        });

        $(".border_set_option1").on("click", ".take_that_value1", function() {
            // Your code to handle the click event goes here
            var selectedValue = $(this).text();
            var id = $(this).attr("id");

            $(".key_up_country1")
                .val(selectedValue)
                .attr("id", id);
            // Stop displaying the results
            $("#set_country_show1").css("display", "none");
        });

        $(".key_up_city1").keyup(function() {
            // When a key is released in the input field
            var countryId = $(".key_up_country1").attr("id"); // Get the country ID
            var inputValue = $(".key_up_city1").val(); // Get the current value of the input

            if (inputValue.trim() !== '') {
                var borderSetOption = $("#set_city_show1");
                // Display a loading indicator
                borderSetOption.html("<div>Loading...</div>");

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Marketplace/getCities", // Replace with your server endpoint
                    data: { countryId: countryId, data: inputValue }, // Data to send to the server
                    dataType: 'json', // Specify the expected response type
                    success: function(responseData) {

                        if (responseData > []) {
                            $("#set_city_show1").css("display", "block");
                            $(".border_set_option1").css("display", "block");
                            var html = "";
                            $.each(responseData, function(index, value) {
                                console.log(value.City_filter);
                                // Exclude 'id' from the result
                                html += "<div class='form-control w-100 set_city_show1' style='color: red;border:0;border-bottom:1px solid red;'>" + value.City_filter + "</div>";
                            });
                            // Update the result list
                            borderSetOption.html(html);
                        } else {
                            // Handle case when no data is found
                            borderSetOption.html("Soon To be added");
                        }
                    },
                });
            } else {
                // $("#set_country_show").html("");

            }
        });

        $(".border_set_option1").on("click", ".set_city_show1", function() {
            // Your code to handle the click event goes here
            var selectedValue = $(this).text();

            $(".key_up_city1")
                .val(selectedValue)

            // Stop displaying the results
            $("#set_city_show1").css("display", "none");
        });

        $("#Form1").on('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get the values of the input fields
            var locationValue = $("input[name='location1']").val();
            var cityValue = $("input[name='city1']").val();

            // Construct a more SEO-friendly URL
            var url = "<?php echo base_url();?>place/" + locationValue + "/" + cityValue;

            // Redirect to the constructed URL
            window.location.href = url;
        });
    });
  
  
  
  
  
  
  
  
   $(".icon3").click(function() {
                // Check screen width and scroll accordingly
                if ($(window).width() <= 767) {
                    // Scroll up by 50 pixels for mobile view
                    $('html, body').animate({
                        scrollTop: '+=2100px'
                    }, 500);
                } else {
                    // Scroll up by 100 pixels for desktop view
                    $('html, body').animate({
                        scrollTop: '+=1000px'
                    }, 500);
                }
            });
        
});


      // Add click event handler to elements with class 'icon1'
    $('.icon1').click(function() {
        // Find the closest toggle-content element within the same parent
        var toggleContent = $(this).closest('.toggle-section').next('.toggle-content');

        // Create a Bootstrap modal
        var modal = $('<div class="modal fade" tabindex="-1" role="dialog">\
                          <div class="modal-dialog" role="document">\
                            <div class="modal-content">\
                              <div class="modal-header">\
                                <h5 class="modal-title">Content Details</h5>\
                                <button type="button" class="close border-0" style="background:white" data-dismiss="modal" aria-label="Close">\
                                  <span aria-hidden="true">&times;</span>\
                                </button>\
                              </div>\
                              <div class="modal-body">' + toggleContent.html() + '</div>\
                            </div>\
                          </div>\
                        </div>');

        // Append the modal to the body
        $('body').append(modal);

        // Show the modal
        modal.modal('show');

        // Add click event handler for the close button
        modal.find('.close').click(function() {
            // Hide the modal
            modal.modal('hide');
        });

        // Remove the modal from the DOM when it is closed
        modal.on('hidden.bs.modal', function () {
            modal.remove();
        });
    });
 function submitForm(formId) {
            // Get the email value
            var email = $("#" + formId + " input[type=email]").val();

            // Perform AJAX request
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Marketplace/led", // Replace with your backend endpoint
                data: { email: email },
                success: function(response) {
                    // Update the CSS class based on the response
                    if (response == '1') {
                        $("table").removeClass("blurred1");
                        $(".leptop_show_sub").css("display","none");
                          location.reload();
                    } else {
                        alert("Submission failed. Please try again.");
                    }
                },
                error: function() {
                    alert("Error in AJAX request.");
                }
            });
        }

        // Attach event listeners using jQuery
        $("#submitBtn1").on("click", function() {
            submitForm('form1');
        });

        $("#submitBtn2").on("click", function() {
            submitForm('form2');
        });
</script>
