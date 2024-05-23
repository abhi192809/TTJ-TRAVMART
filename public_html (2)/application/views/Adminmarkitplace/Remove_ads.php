<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="my-3"><span style="border-bottom:1px solid black">Remove Ads Details </span></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="add_find">
                <lable>Find Add Buy Company Name</lable>
                <input  type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="row px-3 mt-2 text-center">
        <table>
          <tr>
            <td class="col-md-1 border">
              <b> So .No </b>
            </td>
            <td class="col-md-2 border">
              <b> Company Name </b>
            </td>
            <td class="col-md-2 border">
              <b> Day to Start </b>
            </td>
           
            <td class="col-md-2 border">
              <b> Day to End </b>
            </td>
             
            <td class="col-md-2 border">
              <b> Start - End Time </b>
            </td>
            <td class="col-md-2 border">
              <b> Ads </b>
            </td>
            <td class="col-md-2 border">
              <b> Remove Ads </b>
            </td>
          </tr>
          
          <!--show the ads-->
          <?php $i='1'; foreach($ads as $row):  if($row['Status'] == 1){?>
           
          <tr class="get_id">
              <td><?php echo $i ?></td>
              <td><?php echo $row['City_filter']?></td>
              <td><?php echo $row['Staring_Date']?></td>
              <td><?php echo $row['Ending_Date']?></td>
              <td><?php echo $row['time_to_active']?> - <?php echo $row['time_to_close']?> </td>
              <td>
                <?php
                    $adsPathInfo = pathinfo($row['ads']);
                    $extension = strtolower($adsPathInfo['extension']);
            
                    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                        echo '<img src="'.base_url().'assets/Ads/'.$row['ads'].'"  width="220px" height="200px">';
                    } elseif (in_array($extension, ['mp4', 'avi', 'mov'])) {
                        echo '<video width="220" height="220" controls>
                                  <source src="'.base_url().'assets/Ads/'.$row['ads'].'" type="video/'.$extension.'">
                              </video>';
                    } else {
                        echo 'Unknown File Type';
                    }
                ?>
            </td>
                <td><button class="btn btn-success" type="submit"   data-meta="<?php echo $row['id']?>">Sleep</button> </td>
           
          </tr>
          
          <?php  $i++;} endforeach;?>
        </table>

        
    </div>
</div>
<script>
  $(document).ready(function() {
    // Declare currentButton outside the click event handler
    var currentButton;

    // Attach click event to the button
    $('.btn-success').on('click', function() {
      // Retrieve the data-meta attribute value
      var dataMetaValue = $(this).data('meta');

      // Assign the current button to the declared variable
      currentButton = $(this);

      // Use AJAX to send data to the server
      $.ajax({
        type: 'POST', // or 'GET' depending on your server-side code
        url: '<?php echo base_url(); ?>Admin/Ads/sleepads', // Replace with your server-side endpoint
        data: { dataMeta: dataMetaValue },
        success: function(response) {
          // Handle the server response if needed
          console.log('Server response:', response);

          // Show success pop-up using SweetAlert2
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Operation completed successfully!',
          });

          // Find the closest section with the class 'get_id' and remove it
          currentButton.closest('.get_id').remove();
        },
        error: function(error) {
          console.error('AJAX request failed:', error);

          // Show error pop-up using SweetAlert2
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Oops! Something went wrong.',
          });
        }
      });
    });
  });
</script>
