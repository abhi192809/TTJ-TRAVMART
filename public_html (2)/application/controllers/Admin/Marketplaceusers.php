<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplaceusers extends CI_Controller {

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
        $this->load->model("Admin_model/User_models");
        $data["User"] = $this->User_models->marketplaceuser();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/users',$data);
        $this->load->view('Adminmarkitplace/footer');
    }

}
