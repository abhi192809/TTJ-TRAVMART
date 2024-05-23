<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodayReport extends CI_Controller {
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
        $this->load->model('Attendance_model/Employee_report_model');
        $data['today'] = $this->Employee_report_model->Employee_Today_report();
        $data['Leaves'] = $this->Employee_report_model->Leaves_report();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/Today_Report',$data);
        $this->load->view('Attendance/footer');
    }
}
