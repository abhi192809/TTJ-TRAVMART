<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #1c1c1c; /* Black background */
        color: #ffffff; /* White text */
    }

    .dashboard {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
        padding: 20px;
    }
    
    .omp-admin-dashboard h2 {
    font-size: 19px;
    border-bottom: 1px solid #d0d0d052;
    padding-bottom: 7px;
    }

    .section {
        background-color: #1c1c1c; /* Black background */
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }
    .section1 {
    background-color: #3abaf4;
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
    }
    .section2 {
    background-color: #66bb6a;
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
}
   .section3 {
    background-color: #fc544b;
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
}


    .section4 {
    background-color: #1c1c1c;
    padding: 11px 0px 1px 0px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 12px;
    line-height: 13px;
}

    h2 {
        margin-bottom: 10px;
         color: #ffffff; /* White text */
    }

    p {
        color: #ffffff; /* White text */
    }
</style>

    <!--<div class="dashboard">-->
    <!--    <div class="section1">-->
    <!--        <h2>Number of Sellers</h2>-->
    <!--        <p id="sellerCount">100</p>-->
    <!--    </div>-->
    <!--    <div class="section2">-->
    <!--        <h2>Number of Buyers</h2>-->
    <!--        <p id="buyerCount">200</p>-->
    <!--    </div>-->
    <!--    <div class="section3">-->
    <!--        <h2>Events Done</h2>-->
    <!--        <p id="eventsDone">50</p>-->
    <!--    </div>-->
    <!--    <div class="section4">-->
    <!--        <h2>Active Event Data</h2>-->
    <!--        <p id="activeEvents">5</p>-->
    <!--    </div>-->
    <!--</div>-->
    
    <div class="omp-admin-dashboard">
   <div class="container-fluid">
     <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-6">
        <div class="section1">
            <h2>Number of Sellers</h2>
            <p id="sellerCount">100</p>
         </div>
        </div>
        
         <div class="col-lg-3 col-md-6 col-sm-6 col-6">   
        <div class="section2">
            <h2>Number of Buyers</h2>
            <p id="buyerCount">200</p>
         </div>
        </div>
        
       <div class="col-lg-3 col-md-6 col-sm-6 col-6">       
        <div class="section3">
            <h2>Events Done</h2>
            <p id="eventsDone">50</p>
        </div>
        </div> 
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">   
        <div class="section4">
            <h2> Active Event Data</h2>
            <p id="activeEvents">5</p>
        </div>
        </div>
      </div>
      <!-----1st---end--------------->

     </div>
    </div>
    
    
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                 <h4 class="pb-3 fw-5"> Active Meeting Data</h4>
                 <table class="table table-bordered table-striped text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Event Name</th>
                            <th>Place</th>
                            <th>Location</th>
                            <th>View Event Data</th>
                            <th>View Buyer Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data, replace with actual data -->
                         <tr>
                            <td>1</td>
                            <td>Event A</td>
                            <td>Location A</td>
                            <td>Place A</td>
                            <td> <i class="fas fa-eye"></i> </td>
                            <td> <i class="fas fa-eye"></i> </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row" style="align-items: center;">
            <div class="col-md-6">
                <h4 class="pb-3 fw-5"> Top 5 Seller of the travmart Event </h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Seller Name</th>
                            <th>Number of Meeting</th>
                            <th> Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data, replace with actual data -->
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>Event A</td>
                            <td> <i class="fas fa-eye"></i>  </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>Event B</td>
                            <td> <i class="fas fa-eye"></i> </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            </div>
            <div class="col-md-6 px-4">
                <div class="text-right">
                    <h4 class="pb-3 fw-5">Copy URL</h4>
                    <div class="input-group">
                        <input class="form-control" type="text" id="urlInput" value="https://example.com">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="copyUrl()">Copy URL</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                function copyUrl() {
                    var urlInput = document.getElementById('urlInput');
                    urlInput.select();
                    document.execCommand('copy');
                    alert('URL copied to clipboard: ' + urlInput.value);
                }
            </script>

        </div>
    </div>
    
    