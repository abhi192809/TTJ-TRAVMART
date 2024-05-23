<section>
        <form action="<?php echo base_url();?>Magazine/MagazineSubscriptionform" id="subscriptionForm" method="post" enctype="multipart/form-data">
        <div class="container" style="padding-top:10px">
            <h2 class="text-center">
                <span style="border-bottom:1px solid black">
                    MAGAZINE <span style="color:red">SUBSCRIPTION</span>
                </span>
            </h2>
            <br>
            <div class="row border mb-4 pb-4 pt-4">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="make_show">
                        <a href="" contenteditable="false" style="cursor: pointer;">
                            <img src="<?php echo base_url();?>assets/image/Untitled-1.png" width="100%" alt="SUBSCRIPTION Form">
                        </a>
                        
                    </div>
                    <div>
                         <h5>Upload Payment Screen Short<span style="color:red">*</span></h5>
                         <input type="file" class="form-control" id="paymentScreenshot" name="paymentScreenshot" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                            <div class="col-md-12 py-1">
                                <h5>Name <span style="color:red">*</span></h5>
                                <input type="text" class="form-control" placeholder="abcd" id="Name" name="Name" required="">
                            </div>
                            <div class="col-md-12 py-1">
                                <h5>Email <span style="color:red">*</span></h5>
                                <input type="email" class="form-control" placeholder="abc@gmail.com" id="Email" name="Email" required="">
                            </div>
                            <div class="col-md-12 py-1">
                                <h5>Number <span style="color:red">*</span></h5>
                                <input type="tel" maxlength="10" class="form-control" placeholder="9999999999" id="Number" name="Number" required="">
                            </div>
                            <div class="col-md-12 py-1">
                                <h5>Association <span style="color:red">*</span></h5>
                                <input type="text" class="form-control" id="Association" name="Association" required="">
                            </div>
                            <div class="col-md-12 py-1">
                                <h5>Designation <span style="color:red">*</span></h5>
                                <input type="text" class="form-control" id="Designation" name="Designation" required="">
                            </div>
                            <div class="col-md-12 py-1">
                                <h5>Company Name <span style="color:red">*</span></h5>
                                <input type="text" class="form-control" placeholder="abcd pvt.ltd." id="CompanyName" name="CompanyName" required="">
                            </div>
                            <div class="col-md-12 py-1">
                                <h5>Address1 <span style="color:red">*</span></h5>
                                <textarea id="Address1" class="form-control" placeholder="Company address" rows="4" cols="50" name="Address1" required=""></textarea>
                            </div>
                            <div class="col-md-12 py-1">
                                <h5>Address2 <span style="color:red">*</span></h5>
                                <textarea id="Address2" class="form-control" placeholder="Home address" rows="4" cols="50" name="Address2" required=""></textarea>
                            </div>
                            <div class="col-md-12 py-1">
                                <h5>City <span style="color:red">*</span></h5>
                                <input type="text" class="form-control" id="City" name="City" required="">
                            </div>
                            <div class="col-md-12 py-1 text-center">
                                <input type="hidden" name="Place" value="asbuyer">
                                <input type="submit" id="form_submitted" class="btn" style="background:#ed1a21;color:white" value="Submit">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

