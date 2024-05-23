<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResentEvent extends CI_Controller {

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
        $this->load->model('Attendance_model/ResentEvent_Model');
        $data['events'] = $this->ResentEvent_Model->getresentEvent();
        $data['All'] = $this->ResentEvent_Model->AllEvent();
        $data['B2B'] = $this->ResentEvent_Model->B2BEvent();
        $data['B2C'] = $this->ResentEvent_Model->B2CEvent();
        $data['inplace'] = $this->ResentEvent_Model->inplaceEvent();
        $data['outplace'] = $this->ResentEvent_Model->outplaceEvent();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/Resent_Event', $data);
        $this->load->view('Attendance/footer');
    }
    
    public function updateDataAjax() {
    $this->load->model('Attendance_model/ResentEvent_Model');

    // Get data from the Ajax request
    $id = $this->input->post('id');
    $data = $this->input->post();
    
    // Log the received data
    error_log('Received data: ' . json_encode($data));

    $status = $this->ResentEvent_Model->updateData($id, $data);
    if($status == '1'){
        echo 1;
    }
    }


    public function DeleteDataAjax(){
        $this->load->model('Attendance_model/ResentEvent_Model');
        $id = $this->input->post('id');
        $q1 = $this->ResentEvent_Model->DeleteresentEvent($id);
       if($q1 == 1){
           echo 1;
       }
        
        
    }
}
?>
