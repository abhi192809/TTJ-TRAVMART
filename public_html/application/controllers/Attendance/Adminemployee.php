<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminemployee extends CI_Controller {
     public function __construct() {
    parent::__construct();
    $this->load->library('session');

    // Check if 'user' session data exists
    $adminSession = $this->session->userdata('user_data');
    if(!$adminSession) {
        // If 'user' session data doesn't exist, redirect to login page
        redirect('Attendance/Login');
    }
   
    // Continue with the constructor logic for authenticated users
}
    
    
    public function index()
    {  
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/Employee_entry');
        $this->load->view('Attendance/footer');
    }
}
