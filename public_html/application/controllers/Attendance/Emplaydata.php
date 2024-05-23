<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emplaydata extends CI_Controller {
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
   public function user($username) {
         $this->load->model('Attendance_model/AttendanceData_model');
        $data['attendance_data'] = $this->AttendanceData_model->get();
        $data['attendance_off'] = $this->AttendanceData_model->get_off_days();
        $data['attendance_users'] = $this->AttendanceData_model->get_users();
        $this->load->view('Attendance/header');
        $data['get'] =  $username;
        $this->load->view('Attendance/Emplaydata',$data);
        $this->load->view('Attendance/footer');
    
      
   }
}

?>