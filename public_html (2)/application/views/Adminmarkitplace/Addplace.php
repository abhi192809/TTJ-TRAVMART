<style>
    .lable{
        font-size:20px;
    }
</style>

<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<form method="post" action="<?php echo base_url()?>Admin/Addplace/addplace" enctype="multipart/form-data">
    <div class="container flex-grow-1 container-p-y">
  <div class="card px-5">  
    <div class="row mt-4">
        <div class="col-md-4 col-sm-6">
            <lable class="fs-4">India & Internasnal</lable>
            <select class="form-control" name="Country_id">
                <option >Select Any One</option>
                <option value="1">India</option>
                <option value="2">international</option>
            </select>
        </div>
        <div class="col-md-4 col-sm-6">
            <lable class="fs-4">Place</lable>
            <input type="text" name="City_filter" class="form-control">
        </div>
        <div class="col-md-4 col-sm-6">
            <lable class="fs-4">Location</lable>
            <input type="text" name="Location" class="form-control">
        </div>
    </div>
    <div class="row mt-4 ">
         <div class="col-md-12">
              <h4>
                  * Slider
              </h4>
         </div>
        <div class="col-md-4 col-sm-6">
            <lable class="fs-4">1 Slider </lable>
            <input type="file" name="Main_image" class="form-control">
            <lable class="fs-4">1 Slider Name </lable>
            <input type="text" name="main_img_alt" class="form-control">
        </div>
        <div class="col-md-4 col-sm-6">
            <lable class="fs-4">2 Slider </lable>
            <input type="file" name="Image1" class="form-control">
            <lable class="fs-4">2 Slider Name </lable>
            <input type="text" name="imag_1_alt" class="form-control">
        </div>
        <div class="col-md-4 col-sm-6">
            <lable class="fs-4">3 Slider </lable>
            <input type="file" name="Image2" class="form-control">
            <lable class="fs-4">3 Slider Name </lable>
            <input type="text" name="imag_2_alt" class="form-control">
        </div>
        <div class="col-md-4 col-sm-6 mt-md-4">
            <lable class="fs-4 ">4 Slider </lable>
            <input type="file" name="Image3" class="form-control">
            <lable class="fs-4">4 Slider Name </lable>
            <input type="text" name="imag_3_alt" class="form-control">
        </div>
        
        <div class="col-md-8 col-sm-6 mt-md-4">
            <lable class="fs-4">5 Slider </lable>
            <input type="file" name="Image4" class="form-control">
            <lable class="fs-4">5 Slider Name </lable>
            <input type="text" name="imag_4_alt" class="form-control">
        </div>
  
    </div>
    <div class="row mt-4">
         <div class="col-md-12">
              <h4>
                  * 4 Boxes
              </h4>
         </div>
        <div class="col-md-6 col-sm-6">
            <lable  class="fs-4">Air Connectivity</lable>
            <textarea name="point_1" rows="3" cols="100" class="from-control"></textarea>
        </div>
        <div class="col-md-6 col-sm-6">
            <lable class="fs-4">Vibrant Cities</lable>
            <textarea name="point_2" rows="3" cols="100" class="from-control"></textarea>
        </div>
        <div class="col-md-6 col-sm-6 mt-md-4">
            <lable class="fs-4">Visitor Attractions</lable>
            <textarea name="point_3" rows="3" cols="100" class="from-control"></textarea>
        </div>
        <div class="col-md-6 col-sm-6 mt-md-4">
            <lable class="fs-4">Food</lable>
            <textarea name="point_4" rows="3" cols="100" class="from-control"></textarea>
        </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-12 mt-3 col-sm-6">
            <lable class="fs-4">Fist Section</lable>
            <textarea name="Fist_section" rows="3" cols="100" class="from-control"></textarea>
      </div>
      <div class="col-md-12 mt-3 col-sm-6">
            <lable class="fs-4">Second Section</lable>
            <textarea name="Second_section" rows="3" cols="100" class="from-control"></textarea>
      </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12 col-sm-12">
            <h4>Must Visit Spots</h4>
        </div>
        <div class="col-md-3 col-sm-6">
           1.<input type="text" name="populer_place_1" class="form-control">
        </div>
        <div class="col-md-3 col-sm-6">
            2.<input type="text" name="populer_place_2" class="form-control">
        </div>
        <div class="col-md-3 col-sm-6">
             3.<input type="text" name="populer_place_3" class="form-control">
        </div>
        <div class="col-md-3 col-sm-6">
            4.<input type="text" name="populer_place_4" class="form-control">
        </div>
        <div class="col-md-3 mt-2 col-sm-6">
            5.<input type="text" name="populer_place_5" class="form-control">
        </div>
    </div>
    <div class="row mt-4 mb-4">
     <div class="col-md-4">
        <input type="submit" class="btn" style="background:red;color:white" value="Submit">
     </div>
    </div>
  </div>
 </div>
</div>
</form>
<script>
 CKEDITOR.replace('Fist_section');
 CKEDITOR.replace('Second_section');
 CKEDITOR.replace('point_1');
 CKEDITOR.replace('point_2');
 CKEDITOR.replace('point_3');
 CKEDITOR.replace('point_4');
 CKEDITOR.replace('point_5');
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
