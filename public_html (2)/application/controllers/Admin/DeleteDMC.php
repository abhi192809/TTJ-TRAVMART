<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteDMC extends CI_Controller {

   public function __construct() {
    parent::__construct();
    $this->load->library('session');

    // Check if 'user' session data exists
    $adminSession = $this->session->userdata('user');
    if(!$adminSession) {
        // If 'user' session data doesn't exist, redirect to login page
        redirect('Admin/AdminLogin');
    }
   }


    public function index()
    {   
        $this->load->model("Admin_model/Accommodation_models");
        $data["Accommodation_get"] = $this->Accommodation_models->Accommodation_city();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/DeleteDMC',$data);
        $this->load->view('Adminmarkitplace/footer');
    }
     public function Showaccomodationentry(){
         $q = $this->input->post('data');
        $this->load->model("Admin_model/Accommodation_models");
        $data = $this->Accommodation_models->Accommodation_value($q);
        echo json_encode($data);
         
    }
    
    public function Removeentry(){
        $q = $this->input->post('id');
      
        $this->load->model("Admin_model/Dmc_models");
        $data = $this->Dmc_models->Removeentry($q);
        if($data == 1){
            echo 1;
        }
    }
    
    
}
