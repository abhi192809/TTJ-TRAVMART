<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_buyer_view extends CI_Controller
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
         if($user_type == 'Buyer'){
             
         }
         else{
            redirect('Meeting/login');
             
         }
    }
    
    public function index()
    {
        $this->load->model('Meeting_model/Buyer_model');
        $data['BuyerProfile'] = $this->Buyer_model->get_Buyer_profile();
    
        $this->load->view('Meeting/Buyer/header');
        $this->load->view('Meeting/Buyer/sidebar');
        $this->load->view('Meeting/Buyer/topbar');
        $this->load->view('Meeting/Buyer/Profile_buyer_view',$data);
        $this->load->view('Meeting/Buyer/footer');
    }
    
    public function updateBuyer() {
        $BuyerId = $this->input->post('id'); 

     
         $this->load->model('Meeting_model/Buyer_model');

         $data = $this->input->post();
        
       

        $result = $this->Buyer_model->updateBuyerentry($BuyerId,$data);

        if($result == true){
            echo 1;
        }
        else{
            echo 0;
        }; 
    }

}
