<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

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
    public function index(){
         $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav1');
        $this->load->view('Adminmarkitplace/Demo');
        $this->load->view('Adminmarkitplace/footer'); 
    }
}
