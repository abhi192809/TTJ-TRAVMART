<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo base_url();?>assets/Admin_Css/style_Attendance.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
     <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Include jQueryUI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>
<body>
    
<div id="sidebar" style="background: #2c3e50;" class="d-md-block d-none">
    <div class="text-center"><h4 class="border-bottom">TTJ Attendance </h4>
    </div>
    
    
    
    <ul class="nav flex-column">
        <li class="nav-item">
                    <a class="text-white nav-link active" href="<?= base_url() ?>Attendance/Dasboard">Dasboard</a>       
          
        </li>
                         <?php
            $CI =& get_instance();
            $CI->load->library('session');
            $CI->load->database();
            $CI->load->model('Attendance_model/Manu_model');
             $user_data = $CI->session->userdata('user_data');
            $user_Id = $user_data['id'];
          
            $result = $CI->Manu_model->Manu_get_all_row($user_Id);
            foreach ($result as $row) {
                $data_manu = $row['Attendance_manu_id'];
            $resultmanu = $CI->Manu_model->Manu_get_all_array($data_manu);
             foreach ($resultmanu as $resultmanus) {
                  echo ' <li class="nav-item">
                        <a class="text-white nav-link active" href="'.base_url().$resultmanus['url'].'">'.$resultmanus['manu'].'</a>
                  </li>';
             }
          
           
            
            }
            
        ?>
    </ul>
</div>
<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-2  text-left d-md-none d-block" style="border:1px solid #2c3e50;">
                <span class="p-2 m-0  btn"  onclick="w3_open()" style="color:black !important"> <i class="fas fa-bars"></i></span>
            </div>
            
            <div class="col-md-12 col-10 text-end" style="border:1px solid #2c3e50;">
                <span> <a  id="logout" class="p-2 m-0 logout btn text-white" style="background: #2c3e50;">Logout</a></span>
                <!--<i class="fa-solid fa-bell h4" style="color: dimgrey "><i class="notification">1</i></i>-->
            </div>
        </div>
    </div>
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;background: rgb(44, 62, 80);" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
            <?php
            $CI =& get_instance();
            $CI->load->library('session');
            $CI->load->database();
            $CI->load->model('Attendance_model/Manu_model');
             $user_data = $CI->session->userdata('user_data');
            $user_Id = $user_data['id'];
          
            $result = $CI->Manu_model->Manu_get_all_row($user_Id);
            foreach ($result as $row) {
                $data_manu = $row['Attendance_manu_id'];
            $resultmanu = $CI->Manu_model->Manu_get_all_array($data_manu);
             foreach ($resultmanu as $resultmanus) {
                  echo '
                        <a class="m-2 text-white nav-link " href="'.base_url().$resultmanus['url'].'">'.$resultmanus['manu'].'</a>
                  ';
             }
          
           
            
            }
            
        ?>

 </div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
  
<script>
$(document).ready(function () {
    // Click event for the logout button
    $('#logout').click(function () {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>Attendance/Logout/logout',
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function (data) {
                try {
                    var response = JSON.parse(data);

                    if (response.status === 1) {
                        window.location.href = "<?php echo base_url();?>Attendance/Login/";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Logout Failed',
                            text: 'Please try again.',
                        });
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                    alert('An error occurred. Please try again later.');
                }
            },
            error: function (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again later.');
            },
        });
    });
});
</script>
