<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lead extends CI_Controller
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
    
    public function lead_seller_data()
    {
        $this->load->model('Meeting_model/Lead_model');
        $this->load->model('Meeting_model/Buyer_model');
        $data['lead'] = $this->Lead_model->get_lead();
        $data['buyer'] = $this->Buyer_model->Buyer_User_Data();
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/lead_seller_data',$data);
        $this->load->view('Meeting/Seller/footer');
    }
    
    public function Enquiry_seller_data(){
         $this->load->model('Meeting_model/Lead_model');
        $this->load->model('Meeting_model/Buyer_model');
        $data['lead'] = $this->Lead_model->get_lead();
        $data['buyer'] = $this->Buyer_model->Buyer_User_Data();
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/Enquiry_seller_data',$data);
        $this->load->view('Meeting/Seller/footer');
    }
    
    public function Approved_Lead()
    {
        $this->load->model('Meeting_model/Lead_model');
        $this->load->model('Meeting_model/Buyer_model');
        $data['lead'] = $this->Lead_model->get_lead();
        $data['buyer'] = $this->Buyer_model->Buyer_User_Data();
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/Approved_Lead',$data);
        $this->load->view('Meeting/Seller/footer');
    }
    
    public function Your_Destination(){
        $this->load->model('Meeting_model/Lead_model');
        $data['Lead_country_name'] = $this->Lead_model->Master_get_the_country_name();
        
        $SellerID  = $this->session->userdata('user_id'); 
        $data['success'] = $this->Lead_model->Seller_Destination($SellerID);

        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/Your_Destination',$data);
        $this->load->view('Meeting/Seller/footer');
    }
    
    public function Get_city_name(){
    $this->load->model('Meeting_model/Lead_model');
    $country = $this->input->post('country_name');
    $data['city_name'] = $this->Lead_model->Master_get_the_city_name($country);
    echo json_encode($data);
    }

   public function Approved_the_lead(){
    $this->load->model('Meeting_model/Lead_model');
    $sellerID = $this->session->userdata('user_id');
    $status = $this->input->post('status');
    $lead_id = $this->input->post('rowId');
     $data = [
         
          'seller_ID'=> $sellerID,
          'Status'=> $status,
          'id' => $lead_id,
          'enquiry' => '0'
         ];
        
    $quary = $this->Lead_model->Approved_Entry_give($data);
    
    if($quary == true ){
         echo 1;
    }
    else{
        echo 0;
    }
    }
    
    
   public function Add_Seller_chackbox(){
    $this->load->model('Meeting_model/Lead_model');
    $SellerID  = $this->session->userdata('user_id'); 
    $id = $this->input->post('id');
    
    $success = $this->Lead_model->Seller_Destination_insert($SellerID, $id);
    // Check if the insertion was successful
    if ($success) {
        // Handle success, if needed
    } else {
        // Handle failure, if needed
    }
    } 
    
 public function Remove_Seller_chackbox(){
    $this->load->model('Meeting_model/Lead_model');
    $id = $this->input->post('id');
    $success = $this->Lead_model->Remove_Destination_insert($id);
}

   
}

