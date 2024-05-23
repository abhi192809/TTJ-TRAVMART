<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seller extends CI_Controller
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
         if($user_type == 'Seller'){
             
         }
         else{
            redirect('Meeting/login');
             
         }
    }
    public function index()
    {
        $SellerID = $this->session->userdata('user_id');
        $this->load->model("Meeting_model/Event_model");
        $data['Event_Book'] = $this->Event_model->get_Number_of_seller_Event_book($SellerID);
        $data['Meeting_Done'] = $this->Event_model->Get_the_meeting($SellerID);
        $data['Lead'] = $this->Event_model->Lead_making($SellerID);
        $data['Event'] = $this->Event_model->View_Event();
    
        $data['Event_data'] = $this->Event_model->get_Number_of_upcoming_Event();
         if (!empty($data['Event_data'])) {
        foreach ($data['Event_data'] as $event) {
         
         $data['Meeting'] = $this->Event_model->get_Meeting($SellerID, $event->EventName);
            }
        }
       
        
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/index',$data);
        $this->load->view('Meeting/Seller/footer');
    }
}
