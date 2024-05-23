<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->model('Meeting_model/Event_model');
        $this->load->model('Meeting_model/Seller_model');
        $this->load->model('Meeting_model/Buyer_model');
        $this->load->model('Meeting_model/ClubTTJ_model');
        $data['view_Event'] = $this->Event_model->View_Event();
        $data['view_Events_view'] = $this->Event_model->View_Event_where();
         $data['view_Number'] = $this->Event_model->get_Number_of_Event_book();
       
        $data['Seler_number'] = $this->Seller_model->Seller_Number();
        $data['Buyer_number'] = $this->Buyer_model->Buyer_Number();
        $data['Meeting_number'] = $this->Buyer_model->Market_place_meeting_fixed();
        
        $data['Meeting_number_fixed'] = $this->Buyer_model->Market_place_meeting_fixeds();
        $data['Meeting_Buyer_Request'] = $this->Buyer_model->Market_place_Buyer_Request();
        $data['Meeting_Seller_Request'] = $this->Buyer_model->Meeting_Seller_Request();
        $data['ClubTTJ'] = $this->ClubTTJ_model->Market_place_ClubTTJ();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/index',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
}
