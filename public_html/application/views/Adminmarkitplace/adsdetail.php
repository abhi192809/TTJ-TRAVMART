<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="my-3"><span style="border-bottom:1px solid black">Ads Detail </span></h4>
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
          </tr>
          
          <!--show the ads-->
          <?php $i='1'; foreach($ads as $row): ?>
           
          <tr>
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
          </tr>
          <?php  $i++; endforeach;?>
        </table>

        
    </div>
</div>