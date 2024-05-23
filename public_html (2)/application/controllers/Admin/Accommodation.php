<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accommodation extends CI_Controller {
 public function __construct() {
    parent::__construct();
    $this->load->library('session');

    // Check if 'user' session data exists
    $adminSession = $this->session->userdata('user');
    if(!$adminSession) {
        // If 'user' session data doesn't exist, redirect to login page
        redirect('Admin/AdminLogin');
    }
    
    // Continue with the constructor logic for authenticated users
}
  

     public function index()
    {   
        $this->load->model("Admin_model/Accommodation_models");
        $data["Accommodation_get"] = $this->Accommodation_models->Accommodation_city();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/Accommodation', $data);
        $this->load->view('Adminmarkitplace/footer');
    }
    public function saveFormData()
    {
        $postData = $this->input->post('data');
        $select = $this->input->post('select');
        $i = 0; // Initialize counter
        $this->load->model('Admin_model/Accommodation_models');
         
        if (!empty($postData) && is_array($postData)) {
            foreach ($postData as $data) {
               if (!empty(array_filter($data))) {
                $insertData = array(
                    'name' => isset($data['company_name']) ? $data['company_name'] : null,
                    'address' => isset($data['address']) ? $data['address'] : null,
                    'number' => isset($data['number']) ? $data['number'] : null,
                    'id_city' => $select,
                );
            
                $this->Accommodation_models->insert($insertData);
                $i++;  
               }
               else{
                   
               }
               
            }
        } else {
            echo 'No data received'; // Add some debugging info
        }
    
        echo $i;
    }
    
    public function UpdateAccomodation(){
       $this->load->model("Admin_model/Accommodation_models");
        $data["Accommodation_get"] = $this->Accommodation_models->Accommodation_city();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/Update_Accomodation', $data);
        $this->load->view('Adminmarkitplace/footer');  
    }
    public function Showaccomodationentry(){
         $q = $this->input->post('data');
        $this->load->model("Admin_model/Accommodation_models");
        $data = $this->Accommodation_models->Accommodation_value($q);
        echo json_encode($data);
         
    }
     public function UpdateAccommodationData() {
        $postData = $this->input->post('data');
        $this->load->model("Admin_model/Accommodation_models");
        $result = $this->Accommodation_models->updateAccommodationData($postData);
        echo 1;
    }
}
