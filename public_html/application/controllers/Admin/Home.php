<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
    {   $this->load->model('Admin_model/Home_models');
       $data['city'] =  $this->Home_models->SeeAlldestination();

        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/Home',$data);
        $this->load->view('Adminmarkitplace/footer');
    }
    
    public function Cityid() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header("Access-Control-Allow-Headers: *");
        $this->load->model('Admin_model/Home_models');
        $value = $this->input->post('value');
        $data= $this->Home_models->Cityidget($value);
        header('Content-Type: application/json');
       echo json_encode($data);
    }
    
}
