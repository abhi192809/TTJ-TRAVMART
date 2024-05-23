<style>
    .ksdfsdf{
        background:black;
    }
    .set {
        border-radius: 13px;
        overflow: hidden;
        position: relative;
    }
    .set img{
      opacity: 0.5;
    }
    .set h4 {
    position: absolute;
    top: 94px;
    right: 8px;
    color: white;
    z-index: 11111;
    font-size: 25px;
    font-weight: 600;
}
.head_line{
    color:white;
 
}

.set:hover{
    border: 3px solid white;
    box-shadow: 1px 1px 16px white;
}


.set:hover img{
     opacity: 1;
    
}
.pogistion {
    position: relative;
}
.move_to_mid {
    position: absolute;
    top: 20%;
}


.set_ul_li ul li b{
    font-size: 38px;
}
.set_ul_li ul li {
    font-size: 17px;
    font-weight: 800;
}
.blur_effect {
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
    padding: 20px;
    border: 1px solid #d1d1d1;
    border-radius: 7px;
    box-shadow: 0px 2px 172px 1px;
}
.two-column-list {
    display: flex;
    flex-wrap: wrap;
}

.two-column-list li {
    width: 50%;
    box-sizing: border-box;
    padding: 5px;
}

.op {
    position: relative;
    background: white;
    color: black;
    border-radius: 7px;
    padding: 0;
    margin: 0;
}

.op ul{
    padding:0px 11px;
    margin:0;
}

#destinationList li{
        cursor: pointer;
}
@media only screen and (max-width: 900px) {
 .pogistion {
    position: relative;
}
.move_to_mid {
    margin-top:20px;
    position: relative;
    top: 0%;
    color:white;
}
.set h4 {
    position: absolute;
    top: 85px;
    right: 8px;
    color: white;
    z-index: 11111;
    font-size: 25px;
    font-weight: 600;
}

.set_ul_li {
   display:none;
}
    .blur_effect {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border: 1px solid #d1d1d1;
        border-radius: 7px;
        box-shadow: 1px 1px 1px 1px !important; 
        margin-bottom: 29px;
    }

}
</style>

<section class="ksdfsdf">
    <div class="container-fluid  pogistion ">
        <div class="row">
            <div class="col-md-12 p-0">
                <img style="    opacity: 0.5;" src="<?php echo base_url();?>assets/Meeting/Dectination/MainImages/Main_images.jpg" width="100%">
            </div>
            <div class="col-md-12 move_to_mid">
               <div class="container">
                   
                    <div class="row">
                        <div class="col-md-9 text-white set_ul_li" >
                           <ul class="two-column-list">
                                <li>
                                    <b>Description:</b><br> Explore destinations and plan your dream vacation.
                                </li>
                                <li>
                                    <b>Visitor Attractions:</b><br> Discover top tourist spots.
                                </li>
                                <li>
                                    <b>Air Connectivity:</b><br> Choose airlines connecting to your destination.
                                </li>
                                <li>
                                    <b>Food:</b><br> Enjoy local cuisine at well-reviewed restaurants.
                                </li>
                                <li>
                                    <b>Accommodation:</b><br> Find hotels & resorts for every need & budget.
                                </li>
                                <li>
                                    <b>DMC/Tour Operator:</b><br> Get custom itineraries from travel experts.
                                </li>
                            </ul>



                        </div> 
                       <div class="col-md-3 text-white blur_effect">
                            <form id="myForm">
                                <h3 class="sent_font">Go Your Destination</h3>
                                <div class="my-1"><label>Country</label></div>
                                <select id="countrySelect" class="option_select form-control">
                                    <option value="">Select Country</option>
                                    <?php foreach($country as $row): ?>
                                        <option value="<?= $row->name ?>"><?= $row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="my-1"><label>Destination</label></div>
                                <input type="text" id="destinationInput" name="destination" class="form-control my-2" placeholder="Enter destination">
                                <div class="op">
                                    <ul id="destinationList"></ul>
                                </div>
                                <input type="submit" class="btn btn-danger my-2">
                            </form>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Listen for input changes in the destination input field
    $('#destinationInput').on('input', function() {
        var query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: '<?= base_url();?>DemoDestination/Search_destination',
                type: 'POST',
                data: { query: query },
                success: function(response) {
                    try {
                        var destinations = JSON.parse(response);
                        var destinationList = $('#destinationList');
                        destinationList.empty(); 
                        destinations.forEach(function(destination) {
                            destinationList.append('<li>' + destination.Place + '</li>');
                        });
                        
                        $('#destinationList li').click(function() {
                            $('#destinationInput').val($(this).text());
                            destinationList.empty();
                        });
                    } catch (e) {
                        console.error('Error parsing JSON response: ', e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                }
            });
        } else {
            $('#destinationList').empty();
        }
    });
});

document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    console.log('Form submitted'); // Check if form submission is occurring
    var country = document.getElementById('countrySelect').value;
    var destination = document.getElementById('destinationInput').value;
    console.log('Country:', country, 'Destination:', destination); // Log country and destination
    var url = 'https://www.ttjtravmart.com/Demoplace/' + encodeURIComponent(country) + '/' + encodeURIComponent(destination);
    console.log('Redirect URL:', url); // Log the generated URL
    window.location.href = url;
});


</script>

