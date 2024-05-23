
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Club_TTJ extends CI_Controller
{
     public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        
        
        // Check if user is not logged in
        if (!$this->session->userdata('user_id')) {
            
            // Redirect to the login page or any other page as needed
            redirect('Meeting/login');
        }
        
        
         $user_type = $this->session->userdata('type');
         if($user_type == 'Admin'){
             
         }
         else{
            redirect('Meeting/login');
             
         }
    }
    
    public function index()
    {
        $this->load->model('Meeting_model/ClubTTJ_model');
        $data['Market_place_club_TTJ'] = $this->ClubTTJ_model->ClubTTJ_insert();
    
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Club_TTJ',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function Update_the_Club(){
        $this->load->model('Meeting_model/ClubTTJ_model');
        $data = $this->input->post();
        $id = $this->input->post('ID');
        
        $quary = $this->ClubTTJ_model->ClubTTJ_Update($data,$id);
        
    }
    
    public function delete_entry(){
       $this->load->model('Meeting_model/ClubTTJ_model');
        $id = $this->input->post('id');
        
        $quary = $this->ClubTTJ_model->ClubTTJ_remove($id);
        
      
    }
   
}
