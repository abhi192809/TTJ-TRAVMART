<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meeting extends CI_Controller
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

    public function Recent_event_meeting(){
          $this->load->model('Meeting_model/Booking_model');
        $this->load->model('Meeting_model/Seller_model');
          $Buyer = $this->session->userdata('user_id');
        // Event ID
        $data['Event'] = $this->Booking_model->Buyer_Comming_Event();
        
        // $BuyerID
        $data['Buyer_map_Event'] = $this->Booking_model->get_the_map_buyer($data['Event']->EventID);
        // Buyer Data
        $data['Seller_get'] = $this->Booking_model->Seller_Value();
         $data['Meeting_fixed'] = $this->Booking_model->meeting_related_data($data['Event']->EventID);
      
        $this->load->view('Meeting/Buyer/header');
        $this->load->view('Meeting/Buyer/sidebar');
        $this->load->view('Meeting/Buyer/topbar');
        $this->load->view('Meeting/Buyer/Recent_event_meeting',$data);
        $this->load->view('Meeting/Buyer/footer');
    }

    public function Old_meeting_in_that_Buyer_ragister(){
        
        $this->load->model('Meeting_model/Seller_model');
        $this->load->model('Meeting_model/Booking_model');
        $data['Get_Map'] = $this->Booking_model->Get_Event_Buyer_Data();
   
        $data['Get_Event'] = $this->Seller_model->View_Event();
         
        
        $this->load->view('Meeting/Buyer/header');
        $this->load->view('Meeting/Buyer/sidebar');
        $this->load->view('Meeting/Buyer/topbar');
        $this->load->view('Meeting/Buyer/old_Event',$data);
        $this->load->view('Meeting/Buyer/footer');
    }
    
    public function Old_meeting_data(){
        $this->load->view('Meeting/Buyer/header');
        $this->load->view('Meeting/Buyer/sidebar');
        $this->load->view('Meeting/Buyer/topbar');
        $this->load->view('Meeting/Buyer/old_meeting_data');
        $this->load->view('Meeting/Buyer/footer');
    }
    
     public function Filer_meeting(){
        
         $this->load->model('Meeting_model/Event_model');
         $this->load->model('Meeting_model/Buyer_model');
         $this->load->model('/Meeting_model/Booking_model');

         $event_id = $this->uri->segment(5);
        
         $data['Get_Event'] = $this->Event_model->Event_Get($event_id);
         
         $data['Get_Map_row'] = $this->Booking_model->Get_Event_Seller_Data_row($event_id);
        
        
         $data['Get_Meeting'] = $this->Booking_model->Get_Event_Buyer_Data_map($event_id);
      
         $data['Get_Seller'] = $this->Booking_model->Seller_Value();
        
        
         $this->load->view('Meeting/Buyer/header');
         $this->load->view('Meeting/Buyer/sidebar');
         $this->load->view('Meeting/Buyer/topbar');
         $this->load->view('Meeting/Buyer/Filer_meeting',$data);
         $this->load->view('Meeting/Buyer/footer');
    }
    
    
    
}
