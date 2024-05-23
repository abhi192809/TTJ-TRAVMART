<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
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
    
    public function Active_Event()
    {
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/Active_Event_Seller');
        $this->load->view('Meeting/Seller/footer');
    }
    
    public function Old_Event_Seller_ragister(){
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/Old_Event_Seller_ragister');
        $this->load->view('Meeting/Seller/footer');
    }
    
    
    public function Live_Buyer_data(){
        $this->load->model('Meeting_model/Buyer_model');
        
        $this->load->model('Meeting_model/Seller_model');
        @$data['Active_Event'] = $this->Seller_model->Active_View_Event();
        @$data['Event_Related_Buyer'] = $this->Buyer_model->Event_map_persion_buyer($data['Active_Event']->EventID);
        if($data['Event_Related_Buyer'] != NULL){
        $data['Buyer_Data'] = $this->Buyer_model->Buyer_User_Data();
        }
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/Live_buyer_data',$data);
        $this->load->view('Meeting/Seller/footer');
  
    }
    
}
