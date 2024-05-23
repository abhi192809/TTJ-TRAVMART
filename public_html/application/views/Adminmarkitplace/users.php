
<div class="container-fluid">
    <div class="row end_text">
    <div class="col-md-12">
        <h4 class="my-3"><spam style="border-bottom:1px solid black">Users</spam></h4>
    </div>
        <div class="col-md-10 mt-3 mb-3">
            <select id="select_value" class="form-select" >
                <option >Select an option</option>
                <option value="Sub Admin">Sub Admin</option>
                <option value="Normal Users">Normal Users</option>
            </select>
        </div>
        <div class="col-md-2 mt-3 mb-3"><button class="btn text-white" style="background:dimgrey" id="appand_input">Add Input Field</button></div>
        <div class="col-md-12">
            <div class="row  text-center">
                <div class="col-md-3 border">
                    So
                </div>
                <div class="col-md-3 border">
                    User Type
                </div>
                <div class="col-md-3 border">
                    Name
                </div>
                <div class="col-md-3 border">
                    Email
                </div>
            </div>
            <?php $i=1; foreach($User as $row): if($row['Place'] != 'Admin'){?>
            <div class="row text-center">
                <div class="col-md-3 p-2 border">
                    <?php echo $i ?>
                </div>
                <div class="col-md-3 p-2 border">
                    <?php echo $row['Place']?>
                </div>
                
                <div class="col-md-3 p-2 border">
                       <?php echo $row['Name']?>
                </div>
                
                <div class="col-md-3 p-2 border">
                       <?php echo $row['Email']?>
                </div>
                
            </div>
            <?php $i++;} endforeach;?>
            
        </div>
    </div>
</div>