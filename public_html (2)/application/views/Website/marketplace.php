<style>
    textarea:focus, input:focus{
    outline: none;
    }
    .set_option{
        width:100%; text-align: center;position: absolute;top:95%
    }
   .span_seton {
    width: 69%;
    display: inline-flex;
    padding: 8px;
    background: #6f6f6f;
    border-radius: 4px;
    border: 1px solid #c8c8c8;
    box-shadow: rgb(0 0 0 / 25%) 0px 14px 28px, rgb(0 0 0 / 22%) 0px 10px 10px;
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
        top:8px;
        left:10px;
    }
    .border_set_option{
       position: absolute;
    width: 100%;
    margin-top: 2px;
    background: red;
    border: 1px solid #6495ed80;
    border-radius: 2px;
        cursor: pointer;
    box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
    display:none;
    }
    .border_set_option1{
       position: absolute;
    width: 100%;
    margin-top: 2px;
    background: red;
    border: 1px solid #6495ed80;
    border-radius: 2px;
        cursor: pointer;
    box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
    display:none;
    }
    .set_border_sh{
        
    box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.16);
    }
    
    
     @media only screen and (max-width: 800px) {
        
    .set_option {
    width: 100%;
    text-align: center;
    position: relative;
    /* top: 95%; */
    margin-top: 20px;
}
/*.span_seton {*/
/*    width: 89%;*/
/*    display: inline-flex;*/
/*    padding: 4px;*/
/*    background: white;*/
/*    border-radius: 4px;*/
/*    border: 1px solid red;*/
/*    flex-direction: column;*/
/*}*/

.span_seton span {
    position: relative;
    margin: 10px 0px;
}
        
    }
  .set_option1 {
        width: 100%;
        text-align: center;
        position: absolute;
        top: 95%;
    }

    .span_seton1 {
        width: 69%;
        display: inline-flex;
        padding: 4px;
        background: white;
        border-radius: 4px;
        border: 1px solid red;
    }

    .span_seton1 span {
        margin-right: 2px;
        margin-left: 2px;
    }

    .span_seton1 span {
        position: relative;
    }

    .form-control1 {
        border-radius: 0px;
    }

    .ok1 {
        position: absolute;
        top: 8px;
        left: 10px;
    }

    .border_set_option1 {
        position: absolute;
        width: 100%;
        margin-top: 2px;
        background: red;
        border: 1px solid #6495ed80;
        border-radius: 2px;
        cursor: pointer;
        box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
        display: none;
        z-index:99;
    }

    .border_set_option11 {
        position: absolute;
        width: 100%;
        margin-top: 2px;
        background: red;
        border: 1px solid #6495ed80;
        border-radius: 2px;
        cursor: pointer;
        box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
        display: none;
        z-index:99;
    }

    .set_border_sh1 {
        box-shadow: 0px 2px 8px 0px rgba(0, 0, 0, 0.16);
    }

    @media only screen and (max-width: 800px) {
        .set_option1 {
            width: 100%;
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        .span_seton1 {
            width: 89%;
            display: inline-flex;
            padding: 4px;
            background: white;
            border-radius: 4px;
            border: 1px solid red;
            flex-direction: column;
        }

        .span_seton1 span {
            position: relative;
            margin: 10px 0px;
        }
    }
</style>
<section>
<div class="container-fluid " >
  <div class="row ">
       <form id="Form1">
           <div class="col-md-12 p-0 d-md-none d-sm-block d-block " style="position: relative;">
                <img src="https://r-xx.bstatic.com/xdata/images/xphoto/2880x868/279346280.jpeg?k=1f5ef835475595e138026356cdf0664eafb17cc2fc5aa9d09d90407d7ca866a1&o=" width="100%">
                <div class="set_option1">
                    <span class="span_seton1">
            
                        <span style="width: 100%;">
                            <div class="ok1">
                                <i class="fa-solid fa-archway" style="color: red;"></i>
                            </div>
                            <input type="text" style="color:red;padding-left: 31px;" name="location1" class="form-control key_up_country1" Placeholder="Select India OR International">
                            <div class="border_set_option1">
                                <div class="form-control w-100 " id="set_country_show1"></div>
            
                            </div>
                        </span>
            
                        <span style="width: 100%;">
                            <div class="ok1">
                                <i class="fa-solid fa-location-dot" style="color: red;"></i>
                            </div>
                            <input type="text" style="color:red;padding-left: 31px;" name="city1" class="form-control key_up_city1" placeholder="Location Of the Place">
                            <div class="border_set_option11" id="1">
                                <div class="form-control w-100 " id="set_city_show1"></div>
                            </div>
                        </span>
                        <input type="submit" class="btn btn-primary set_avalue1" style="background:red;border:0px" value="Discover">
                    </span>
                </div>
            
            </div>

       </form>
      <!--Leptop-->
      <form  id="Form">
          
         
          <div class="col-md-12 p-0 d-md-block d-sm-none d-none " style="position: relative;">
          <img src="https://r-xx.bstatic.com/xdata/images/xphoto/2880x868/279346280.jpeg?k=1f5ef835475595e138026356cdf0664eafb17cc2fc5aa9d09d90407d7ca866a1&o=" width="100%">
         <div  class="set_option">
             <span class="span_seton">
                 
              <span  style="width: 100%;">
                <div class="ok">
                  <i class="fa-solid fa-archway" style="color: red;"></i>
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
              <input type="submit"   class="btn btn-primary set_avalue" style="background:red;border:0px" value="Discover">
             </span>
             </div>
             
         </div>
      </div>
      </form>
  </div>
</div>
</section>
<br>
<br>

<section>
<div class="container">
  <div class="row ">
  
  </div>
</div>
</section>
<br>
<br>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    // Use event delegation to handle click events on elements with the class "icon"
    $(document).on("click", ".icon", function () {
        // Find the closest parent div with class "border" and get the text content
        var contentText = $(this).closest('.border').find('p').text().trim();

        // Toggle the visibility of the element with class "on_click_slide_slow_down"
        $(this).closest('.border').next('.on_click_slide_slow_down').slideToggle("slow");

        // Toggle text and class between "+" and "-"
        $(this).text(function (_, text) {
            return text === "+" ? "--" : "+";
        });

        // Log or do something with the dynamic text content
        console.log(contentText);
    });
    
    
$('.icon').on('click', function () {
            var toggleClass = $(this).data('toggle');
            var content = $(toggleClass).html();
            var showClass = toggleClass.replace('.toggle-content-', '.ok_pop_show-');
            $(showClass).html(content);
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
    var url = "<?php echo base_url();?>place/" + locationValue + "/" + cityValue;

    // Redirect to the constructed URL
    window.location.href = url;
  });
});



</script>
<script>
    $(document).ready(function() {
        // Wait for the document to be ready
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
                            $(".border_set_option11").css("display", "block");
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

        $(".border_set_option11").on("click", ".set_city_show1", function() {
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

</script>