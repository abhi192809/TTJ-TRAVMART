<section class="contact-background mt-5">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-7">
                <div class="appointment-box">
                    <div class="section-title-wrapper section-title-wrapper1">
                        <div class="title-wrap">
                            <h6 class="sub-title">Get in Touch</h6>
                            <!--<h2 class="section-title"><span class="title-prefix"> Lets Start Your <span class="architecture_color">Journeys </span></span> </h2>-->
                            <form class="contact-form" action="<?php echo base_url();?>Contactus/mailsendme" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control"  id="full_name" name="full_name" placeholder="Enter Full Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" maxlength="10" minlength="10" pattern="[7-9]{1}[0-9]{9}" id="mobile_no" name="mobile_no" placeholder="Enter Number" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" required="">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="description" placeholder="Project Description" required=""></textarea>
                                </div>
                                <button type="submit" name="click_submit" class="btn-default">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="contact_map">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.8442146315715!2d77.31774231508328!3d28.664382882405256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd5c7724b8f3a668e!2zMjjCsDM5JzUxLjgiTiA3N8KwMTknMTEuOCJF!5e0!3m2!1sen!2sin!4v1672232375586!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>