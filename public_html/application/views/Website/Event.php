<section>
     <div class="container " style="padding-top:30px">
     <div class="row">
         <div class="col-md-12">
            <br class="d-md-block d-none">
            <br class="col-md-block d-none">
            <div class="site-heading text-center">
                <h2>Calendar<span> 2024 </span></h2>
                <!--<h5 style="font-size: 34px; margin-top:20px;margin-bottom:40px;color:#ed1a21">Register As <span style="color:black"> Trader, Hosted Buyer, Exhibitor </span></h5>-->
                
            </div>
        </div>
      <?php foreach ($events as $row): ?>
            <div class="col-md-2 col-sm-12 col-6">
                <div class="make_show">
                    <picture>
                        <source srcset="<?php echo base_url('assets/image/' . $row['Images_name']); ?>" type="image/png">
                        <img loading="lazy" src="<?php echo base_url('assets/image/' . $row['Images_name']); ?>" alt="<?php echo $row['Images_name']; ?>" width="100%">
                    </picture>
                    <div style="padding-left: 38px; padding-top: 12px;"><?php echo $row['Date']; ?></div>
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
