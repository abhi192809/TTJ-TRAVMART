<style>
    .background-images {
        background: url('<?php echo base_url()?>/assets/marketplace/1920x401.png') center center no-repeat;
        /* Using a random image from Lorem Picsum */
        background-size: cover;
        /* This ensures the image covers the entire element */
        height: 400px; /* Set a height for the element to see the background */
        color: white; /* For better contrast with the background */
        position: relative; /* Ensure the .background-images container is positioned */
    }

    .background-images::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
        z-index: 1; /* Ensure the overlay is above the content */
    }

    /* Adjust carousel image height */
    .carousel-item img {
        height: 100%;
        object-fit: cover;
    }

    .sent_text_size{
        font-size:140px;
        font-weight: 900;
    }
    .z_index_add{
        z-index:1111111;
    }

    .ooponm_ne{
        z-index: 999999999999999;
    }
    .Marget_place{
        background:black;
        color:white;
    }

    .backround-white{
        border:1px solid white;
        border-radius: 30px;
    }

    .backround-white ul {
        display: flex;
        justify-content: space-between;
    }

    .backround-white ul li:hover {
      border-bottom: 1px solid white;
    }
    
    .import_the_entry{
        text-align:justify;
    }

    .active{
        /* background:while !implements;
        color:black; */
    }

   .bolder_bottom{
    font-weight: 800;
   }

   .bolder_bottom span{
    border-bottom:1px solid white;
   }

   .image_detels{
    border:1px solid white;
   }

   .Air_connectivity{
    position: relative;
   }
   .Air_connectivity img{
     position: absolute;
     z-index: 1;
    }
  

    .not_show{
        color:white;
    }
    
    .demo{
        text-align:center;
        padding: 5px;
    }
    
     .demo{
        text-align:center;
        padding: 5px;
    }
    
    .image_detels img{
        margin-bottom: 7px;
    }
    
    .opo img{
        margin-top: 7px;
    }
    
    .sticky {
    position: sticky;
    top: 59px !important;
    background: black;
    z-index: 1000;
}

@media only screen and (max-width: 600px){
.form-control {
    height: 26px;
    font-size: 12px;
    margin-bottom: 4px;
}
.sent_text_size {
    font-size: 32px;
    font-weight: 900;
}
.mobilee-vieww-none{
    display: none;
}
.background-images {
    background: url(https://www.ttjtravmart.com//assets/marketplace/1920x401.png) center center no-repeat;
    background-size: cover;
    height: 209px;
    color: white;
    position: relative;
}
.backround-white ul {
    display: block;
    justify-content: space-between;
}
.backround-white {
     border: none;
}
.backround-white li {
    padding-bottom: 5px;
    font-size: 13px;
}

.op_aurch input {
    width: 100%;
    text-align: center;
    margin-bottom: 4px !important;
}


.background-white li {
    width: 50%; /* Each list item takes up half of the container */
}

}
.op_aurch input {
    width: 100%;
    text-align: center;
}

.btn_btn{
    border: 0px;
    border-radius: 2px;
    color: white;
    background: crimson;
    margin: 0px;
    padding: 3px 9px;

}

.set_a_tag{
    text-decoration: none;
    color: white;
}
.set_a_tag:hover{
    text-decoration: none;
    color: white;
}
</style>

<section class="Marget_place">
    <div class="container-fluid pt-2 pb-2 op_aurch">
        <div class="row" style="align-items: center;">
            
              <div class="col-md-6">
                <small> Home <i class="fas fa-chevron-right"></i> Destination <span class="material-icons"> <i class="fas fa-chevron-right"></i>  </span> <?= $Destination->Place?> </small>   
              </div>
              
              
              
             <div class="col-md-6">
                  <div class="row">
                      <div class="col-md-5" style="
    max-width: 100%;
">
                         <input type="text" placeholder="City" style="
    max-width: 100%;
    padding: 6px;
    /* padding: 0; */
    margin: 0;
">
                      </div>
                      <div class="col-md-5">
                        <input type="text" placeholder="Place" style="
    max-width: 100%;
    padding: 6px;
    /* padding: 0; */
    margin: 0;
">
                      </div>
                      <div class="col-md-2 " style="
    max-width: 100%;
    padding: 6px;
    /* padding: 0; */
    margin: 0;
">
                         <button class="btn_btn form-control">GO</button>
                  </div>
              </div>
          </div>
          
          
          
          
        </div>
    </div>
<div class="container-fluid background-images">
    <div class="container pt-md-5">
        <div class="row " style="align-items: center;">
            <div class="col-md-7 co-sm-6 col-12 z_index_add">
                <h1 class="sent_text_size"><?= $Destination->Place ?></h1>
                <h4 class="mobilee-vieww-none" style="text-align: justify;"><?= $Destination->Tagline ?></h4>
            </div>
            <div class="col-md-5 col-sm-6 col-12 z_index_add">
                <!-- Bootstrap Slider -->
                <div>
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php
                            $value = 10000;
                            $active = true;
                            foreach ($Market_Place_Visitor_Attractions as $index => $row) :
                            ?>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $index ?>" <?= $active ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $index + 1 ?>"></button>
                            <?php
                                $active = false;
                            endforeach;
                            ?>
                        </div>
                        <div class="carousel-inner">
                            <?php
                            foreach ($Market_Place_Visitor_Attractions as $index => $row) :
                            ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-bs-interval="<?= $value ?>">
                                    <img src="<?= $row->Images ?>" class="d-block w-100" alt="...">
                                </div>
                                <?php
                                $value -= 2000;
                            endforeach;
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<style>
     .sticky {
            position: sticky;
            top: 0;
           background:black;
            z-index: 1000; /* Ensure the sticky element appears above other content */
        }
</style>
<div class="container sticky">
    <div class="row">
        <!-------------------om----add---navbar------------->
        
        <!---------------om---navbar-----end------------>
        <div class="col-md-12 col-sm-12 col-12 backround-white">
            <ul class="p-0 m-0 p-2">
                <li id="Description" class="active" onclick="scrollToSection('descriptionSection')">Description</li>
                <li onclick="scrollToSection('visitorAttractionsSection')">Visitor Attractions</li>
                <li onclick="scrollToSection('airConnectivitySection')">Air Connectivity</li>
                <li onclick="scrollToSection('foodSection')">Food</li>
                <li onclick="scrollToSection('accommodationSection')">Accommodation</li>
                <li onclick="scrollToSection('DMCSection')">DMC/Tour Operator</li>
            </ul>
        </div>
        <div class="col-md-12"></div>

      
    </div>
</div>
<div>
<section id="descriptionSection" class="section">
    <!-- Description section content -->

<div class="container mt-3">
   <div class="row">
        <div class="col-md-12"> 
            <h2 class="bolder_bottom"><span>Decription</span></h2>
            <div class="import_the_entry">
              <?= $Destination->Description ?>
             <div>
        </div>
    </div>
</div>
</section>

<section id="visitorAttractionsSection" class="section" >
    <!-- Visitor Attractions section content -->

<div class="container mt-3">
   <div class="row">
        <div class="col-md-12"> 
            <h2 class="bolder_bottom mb-4"><span>Visitor Attractions</span></h2>
            <div class="row"> 
                <?php foreach($Market_Place_Visitor_Attractions as $row){
                      ?>
                        <div class="col-md-2  col-sm-3 col-6  position-relative"> 
                                <img src="<?php echo $row->Images ?>" alt="" srcset="" width="100%">
                                    <div class="demo">
                                        <?php echo $row->Visitor_Attractions ?>
                                    </div>
                        </div>
                      <?php
                    }
                    ?>
                <div class="col-md-2 col-sm-12 col-12 position-relative">
                        <img style="height: 145px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQzVTYU4lGRaXhKu_UUtJRBxq-fhyKcTY239Vn2RbzaDXKDnJgAPSfOhZRmAwADQNbsYQ&usqp=CAU" alt="" srcset="" width="100%">
                </div>
            </div>
            
        </div>
    </div>
</div>

</section>

<section id="airConnectivitySection" class="section">
    

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 "> 
                <h2 class="bolder_bottom mb-4"><span>Air Connectivity</span></h2>
                <div class="row">
                    <?php foreach($Market_place_Air_lines as $row){
                      ?>
                        <div class="col-md-2  col-sm-3 col-6  position-relative"> 
                            <a href="<?php echo $row->Url ?>" class="set_a_tag"  target="_blank">
                                <img src="<?php echo base_url();?>assets/Meeting/Destination/<?php echo $row->image ?>" alt="" srcset="" width="100%">
                                    <div class="demo">
                                        <?php echo $row->Air_Lines ?>
                                    </div>
                            </a>    
                        </div>
                      <?php
                    }
                    
                    ?>
                    
                    <div class="col-md-2 col-sm-12 col-12 position-relative"> <!-- Added position-relative class -->
                        <img style="height: 145px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQzVTYU4lGRaXhKu_UUtJRBxq-fhyKcTY239Vn2RbzaDXKDnJgAPSfOhZRmAwADQNbsYQ&usqp=CAU" alt="" srcset="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="foodSection" class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12"> 
                <h2 class="bolder_bottom mb-4"><span>Food</span></h2>
                <div class="row">
                    <?php foreach($Market_place_Food as $row){
                      ?>
                        <div class="col-md-2  col-sm-3 col-6  position-relative"> 
                            <img src="<?php echo $row->Images ?>" alt="" srcset="" width="100%">
                                <div class="demo">
                                    <?php echo $row->Food ?>
                                </div>
                        </div>
                      <?php
                    }
                    ?>
                    <div class="col-md-2  col-sm-3 col-6 position-relative"> <!-- Added position-relative class -->
                        <img style="height: 130px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQzVTYU4lGRaXhKu_UUtJRBxq-fhyKcTY239Vn2RbzaDXKDnJgAPSfOhZRmAwADQNbsYQ&usqp=CAU" alt="" srcset="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="accommodationSection" class="section" >
 
 <div style="overflow-x:auto;">
     <div class="container remove_class mt-5">
<h2 class="bolder_bottom mb-3 "><span>Accommodation</span></h2> 
      <div class="row ">
   
   
       
            <div class="table-container">
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
            <tr class="not_show">
          <th scope="row">1</th>
          <td>Indore Marriott Hotel</td>
          <td>H-2 Scheme No 54, Meghdoot Garden, Vijay Nagar</td>
          <td>0731 477 7777</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
               <tr class="not_show">
          <th scope="row">2</th>
          <td>Sayaji Hotel Indore</td>
          <td>H/1 , Scheme No.54, Vijay Nagar, Indore</td>
          <td>0731 400 6666</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
               <tr class="not_show">
          <th scope="row">3</th>
          <td>Pride Hotel &amp; Convention Centre Indore</td>
          <td>35, PW5H+6VQ, 1, Bicholi Mardana, near pride hotel</td>
          <td>0731 675 5555</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
               <tr class="not_show">
          <th scope="row">4</th>
          <td>Radisson Blu Hotel Indore</td>
          <td>, C Ring Road, Scheme No 94 Sector EB</td>
          <td>0731 673 8888</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
               <tr class="not_show">
          <th scope="row">5</th>
          <td>WOW Crest, Indore </td>
          <td>PU - 3 Commercial, Plot No. 106, AB Rd, Scheme 54 PU4</td>
          <td>0731 671 1111</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
         </tbody>
</table>
    
            </div>
            </div>
        </div>         
     </div>
 </section>
 <br>
 <br>
  <section class="opo">
        <div class="container">
            <div class="row">
                <div class="col-md-4"> <!-- Added position-relative class -->
                    <img  src="data:image/png;base64,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" width="100%"> 
                </div>
                <div class="col-md-4"> <!-- Added position-relative class -->
                    <img  src="data:image/png;base64,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" width="100%"> 
                </div>
                <div class="col-md-4"> <!-- Added position-relative class -->
                    <img  src="data:image/png;base64,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" width="100%"> 
                </div>
            </div>
        </div>
  </section>



 <section id="DMCSection" class="section" >
   <div style="overflow-x:auto;">
 <div class="container  remove_class mt-5">
<h2 class="bolder_bottom mb-3 "><span> DMC/Tour Operaror</span></h2> 
    
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
                         <tr class="not_show">
          <th scope="row">1</th>
          <td>Garha Tours and Travels</td>
          <td>10C Radhadeep, Ratlam Koti, Kanchan Bhag Road</td>
          <td>(0731) 2522563</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
               <tr class="not_show">
          <th scope="row">2</th>
          <td>Genius Globe Travels</td>
          <td>M-2 City Plaza, 564, MG Road Near Regal Talkies</td>
          <td>(0731) 2432766 </td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
               <tr class="not_show">
          <th scope="row">3</th>
          <td>Sanghi Travels</td>
          <td>Prop.Sanghi Brothers (Indore) Pvt.Ltd 6, Manormaganj</td>
          <td>(0731) 5066748</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
               <tr class="not_show">
          <th scope="row">4</th>
          <td>International Travel Forum</td>
          <td>Ind. Supermarket Pvt. Ltd. 109 Man Herritage 6/2 South Tukoganj</td>
          <td>(0731) 4040080</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
               <tr class="not_show">
          <th scope="row">5</th>
          <td>Frequent Travels and Cargo Pvt Ltd</td>
          <td>MZ 35-37 Bansi Trade Centre, 581 M.G. Road</td>
          <td>09826636669</td>
          <!--<td></td>-->
          <!-- <td></td>-->
         </tr>
                     </tbody>
              
            </table>
        </div>         
     </div>
 </div>
 </div>
</section>


</section>


<script>
    function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    section.scrollIntoView({
        behavior: 'smooth',
        block: 'center' // Aligns the section in the middle of the viewport
    });
}
</script>