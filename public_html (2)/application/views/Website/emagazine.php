
<div class="container" style="padding-top:0px">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="mt-4 mb-4">E-<span style="color:red">magazine</span></h1>
        </div>
        <?php foreach($get as $row):?>
         <div class="col-md-4 text-center">
             <a href="<?php echo base_url();?>assets/magazine/<?php echo $row['Magazin_pdf']; ?>" target="_blank"><img src="<?php echo base_url();?>/assets/magazine/<?php echo $row['Magazin_images']; ?>" alt="<?php echo $row['Magazin_Text']?>"  width="50%"></a>
             <h4> <?php echo $row['Magazin_Date']?></h4>
         </div>
         <?php endforeach;?>
    </div>
</div>