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
                    <img style="border-radius: 6px;" class="mt-2 mb-2" src="<?php echo base_url(); ?>/assets/image/<?php echo $row['images']; ?>" alt="" width="100%" >
                </div>
                <?php
                }
                ?>
            </div>
        </div>

</section>