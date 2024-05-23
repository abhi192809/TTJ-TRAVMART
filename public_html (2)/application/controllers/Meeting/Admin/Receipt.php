<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Receipt extends CI_Controller
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
      
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Receipt'); 
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function Seller_Receipt(){
        $this->load->model('Meeting_model/Seller_model');
        $data['View_Seller'] = $this->Seller_model->View_Seller();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Seller_Receipt',$data); 
        $this->load->view('Meeting/dashboard/footer');
    }
}

?>