<form id="club_form">
<div class="container contentbox">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 mt-4">
                    <h1>Join the Club TTJ 1</h1>
                     <br>
                    <div id="MainContent_Step1">
                       
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Name*</label>
                            </div>
                            <div class="col-md-4">
                                <input name="ctl00$MainContent$name" type="text" id="MainContent_name" class="form-control RequiredValid" autocomplete="off" validationgroup="b" placeholder="Enter name" maxlength="50">
                                <span id="MainContent_RequiredFieldValidator1" style="color:Red;font-style:italic;display:none;">Required!</span>
                                <span id="MainContent_RegularExpressionValidator1" style="color:Red;font-style:italic;display:none;">Req min 3 letters without special characters</span>
                            </div>
                            <div class="col-md-2 text-right">
                                <label>Company Name*</label>
                            </div>
                            <div class="col-md-4">
                                <input name="ctl00$MainContent$company" type="text" id="MainContent_company" class="form-control RequiredValid" autocomplete="off" placeholder="Enter company name" validationgroup="b" maxlength="100">
                                <span id="MainContent_RequiredFieldValidator3" style="color:Red;font-style:italic;display:none;">Required!</span>
                                <span id="MainContent_RegularExpressionValidator8" style="color:Red;font-style:italic;display:none;">Invalid format</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Address*</label>
                            </div>
                            <div class="col-md-4">
                                <input name="ctl00$MainContent$address" type="text" id="MainContent_address" class="form-control RequiredValid" autocomplete="off" maxlength="100" validationgroup="b" placeholder="Enter address">
                                <span id="MainContent_RequiredFieldValidator5" style="color:Red;font-style:italic;display:none;">Required!</span>
                            </div>
                            <div class="col-md-2 text-right">
                                <label>City*</label>
                            </div>
                            <div class="col-md-4">

                                <input name="ctl00$MainContent$city" type="text" id="MainContent_city" class="form-control RequiredValid" autocomplete="off" maxlength="50" validationgroup="b" placeholder="Enter city">
                                <span id="MainContent_RequiredFieldValidator6" style="color:Red;font-style:italic;display:none;">Required!</span>
                                <span id="MainContent_RegularExpressionValidator6" style="color:Red;font-style:italic;display:none;">Req min 3 letters without special characters</span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>State*</label>
                            </div>
                            <div class="col-md-4">

                                <input name="ctl00$MainContent$state" type="text" id="MainContent_state" class="form-control RequiredValid" autocomplete="off" maxlength="50" validationgroup="b" placeholder="Enter state">
                                <span id="MainContent_RequiredFieldValidator12" style="color:Red;font-style:italic;display:none;">Required!</span>
                                <span id="MainContent_RegularExpressionValidator9" style="color:Red;font-style:italic;display:none;">Req min 3 letters without special characters</span>

                            </div>
                            <div class="col-md-2 text-right">
                                <label>Country*</label>
                            </div>
                            <div class="col-md-4">
                                <select name="ctl00$MainContent$country" id="MainContent_country" class="form-control">
   <?php foreach($Master_model as $row):?>
   <option value="<?= $row->cities?>">
       <?= $row->cities?>
   </option>
   <?php endforeach;?>
</select>
                                <span id="MainContent_RequiredFieldValidator11" style="color:Red;font-style:italic;display:none;">Required!</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Pin/Zip Code*</label>
                            </div>
                            <div class="col-md-4">

                                <input name="ctl00$MainContent$pincode" type="text" id="MainContent_pincode" class="form-control RequiredValid" autocomplete="off" validationgroup="b" maxlength="10" placeholder="Enter pin/zip code">
                                <span id="MainContent_RequiredFieldValidator13" style="color:Red;font-style:italic;display:none;">Required!</span>
                            </div>
                            <div class="col-md-2 text-right">
                                <label>Contact No.*</label>
                            </div>
                            <div class="col-md-4">

                                <input name="ctl00$MainContent$mobile" type="text" id="MainContent_mobile" class="form-control RequiredValid number" autocomplete="off" maxlength="10" validationgroup="b" placeholder="Enter contact number">
                                <span id="MainContent_RequiredFieldValidator14" style="color:Red;font-style:italic;display:none;">Required!</span>
                                <span id="MainContent_RegularExpressionValidator7" style="color:Red;font-style:italic;display:none;">Enter 8-15 digit contact number!</span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Fax</label>
                            </div>
                            <div class="col-md-4">

                                <input name="ctl00$MainContent$fax" type="text" id="MainContent_fax" class="form-control RequiredValid" autocomplete="off" maxlength="15" placeholder="Enter fax">
                                
                                <span id="MainContent_RegularExpressionValidator4" style="color:Red;font-style:italic;display:none;">Enter fax number!</span>

                            </div>
                            <div class="col-md-2 text-right">
                                <label>Email*</label>
                            </div>
                            <div class="col-md-4">
                                <input name="ctl00$MainContent$email" type="text" id="MainContent_email" class="form-control RequiredValid" autocomplete="off" placeholder="Enter email" validationgroup="b">
                                <span id="MainContent_RequiredFieldValidator2" style="color:Red;font-style:italic;display:none;">Required!</span>
                                <span id="MainContent_RegularExpressionValidator2" style="color:Red;font-style:italic;display:none;">Invalid Email Format</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Company Website</label>
                            </div>
                            <div class="col-md-4">
                                <input name="ctl00$MainContent$cwebsite" type="text" id="MainContent_cwebsite" value="http://" class="form-control RequiredValid" autocomplete="off" validationgroup="b" placeholder="Enter company website" maxlength="100">
                                <span id="MainContent_RequiredFieldValidator7" style="color:Red;font-style:italic;display:none;">Required!</span>
                                <span id="MainContent_RegularExpressionValidator10" style="color:Red;font-style:italic;display:none;">Invalid format</span>
                            </div>
                            <div class="col-md-2 text-right">
                                <label>Query*</label>
                            </div>
                            <div class="col-md-4">
                                <textarea name="ctl00$MainContent$query" rows="4" cols="20" id="MainContent_query" class="form-control" autocomplete="off" placeholder="Enter your query"></textarea>
                                <span id="MainContent_RequiredFieldValidator8" style="color:Red;font-style:italic;display:none;">Required!</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 text-center">
                                <input type="submit" value="Submit" id="submit_form" class="btn btn-dark btn-lg" style="width:200px;">
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
</form>        
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#club_form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("CludTTJ/submit_form"); ?>',
                data: formData,
                success: function(response) {
                    console.log(response);
                     location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error response
                }
            });
        });
    });
</script>