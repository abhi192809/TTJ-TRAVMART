
<div id="sidebar">
    <h4 class="border-bottom">Marketplace</h4>
    <ul class="nav flex-column">
        
  
        <?php
            $CI =& get_instance();
            $CI->load->library('session');
            $CI->load->database();
            $CI->load->model('Admin_model/Manu_model');
            $user_Id = $CI->session->userdata('id');
            $result = $CI->Manu_model->Manu_get_all_row($user_Id);
            foreach ($result as $row) {
                $data_manu = $row['market_manu_id'];
            $resultmanu = $CI->Manu_model->Manu_get_all_array($data_manu);
             foreach ($resultmanu as $resultmanus) {
                   echo ' <li class="nav-item">
                        <a class="text-white nav-link active" href="'.base_url().$resultmanus['url'].'">'.$resultmanus['manu'].'</a>
                   </li>
        <li class="nav-item">';
             }
          
           
            
            }
            
        ?>
      
        <!-- Add more menu items as needed -->
    </ul>
</div>
<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 nav_top text-end">
                <span> <a  href="<?php echo base_url()?>Admin/AdminLogin/logout" class="p-2 m-0 logout btn text-white" style="background:black">Logout</a></span>
                <!--<i class="fa-solid fa-bell h4" style="color: dimgrey "><i class="notification">1</i></i>-->
            </div>
        </div>
    </div>
   
