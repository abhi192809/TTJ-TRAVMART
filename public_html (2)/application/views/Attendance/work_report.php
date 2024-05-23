<div class="container-fluid">
    <div class="row">
        <?php 
            foreach($report as $row){
                $columnClass = (strlen($row['Work_report']) > 100) ? 'col-md-12' : 'col-md-6';

                echo "<div class='col-md-4'>";
                    echo "<div class='m-2 p-4' style='box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;'>";
                        echo "<h4>".  $row['Name'] ."</h4>";
                        echo "<div>".  $row['Work_report']." </div>";
                        echo "<div class='mt-2'>".  $row['Day']." </div>";
                        
                        if($row['File_Upload'] != NULL ){
                            $excelFileUrl = base_url().'assets/Workreport/'.$row['File_Upload'];
                            // Add a download link instead of the iframe
                            echo "<div class='pt-4'><a class='btn btn-danger p-2' href='$excelFileUrl' download>Download File</a></div>";
                        } 
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>
