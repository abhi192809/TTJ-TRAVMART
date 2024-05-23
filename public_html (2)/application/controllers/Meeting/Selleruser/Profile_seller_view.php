<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_seller_view extends CI_Controller
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
        $this->load->model('Meeting_model/Setting_model');
        $data['SellerProfile'] = $this->Setting_model->get_seller_profile();
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/Profile_seller_view',$data);
        $this->load->view('Meeting/Seller/footer');
    }
    
    public function updateSeller() {
        // Get seller ID from the form or session, assuming it's stored in $sellerId variable
        $sellerId = $this->input->post('SellerID');  // Make sure you have a hidden input field for sellerId in your form

        // Load the Seller_model
         $this->load->model('Meeting_model/Seller_model');

        // Get the existing seller details from the database
        $existingDetails = $this->Seller_model->getSellerDetails($sellerId);

        // Check if the details have changed
        $data = $this->input->post();
        $updatedData = array();

        foreach ($data as $key => $value) {
            // Check if the value has changed and is not empty
            if ($existingDetails->$key !== $value && !empty($value)) {
                $updatedData[$key] = $value;
            }
        }

        // Check if a new logo file is uploaded
        if (!empty($_FILES['Logo']['name'])) {
            $updatedData['Logo'] = $this->uploadLogo();
        }

        // Update the seller details in the database
        $result = $this->Seller_model->updateSellerentry($sellerId, $updatedData);

        echo $result;  // Return the result to the AJAX call
    }

}
