<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deleteplace extends CI_Controller {
    
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
         $this->load->model("Admin_model/City_models");
        $data["City"] = $this->City_models->getcity();
        $data["place"] = $this->City_models->getplace();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/Deleteplace',$data);
        $this->load->view('Adminmarkitplace/footer');
    }
    
    public function Deleteplaceform()
    {   
       
           $data = $this->input->post('meta');
        
        $this->load->model("Admin_model/Delete_place");
        $data = $this->Delete_place->deleteplace( $data);
        echo 1;
    }
}
