<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceData extends CI_Controller {
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
        $this->load->model('Attendance_model/AttendanceData_model');
        $data['attendance_data'] = $this->AttendanceData_model->get();
        $data['attendance_off'] = $this->AttendanceData_model->get_off_days();
        $data['attendance_users'] = $this->AttendanceData_model->get_users();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/AttendanceData', $data);
        $this->load->view('Attendance/footer');
    }
    
     public function addHoliday()
    {
        // Get data from AJAX request
        $day = $this->input->post('day');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        // Insert data into database
        $this->load->model('Attendance_model/AttendanceData_model');
        $this->AttendanceData_model->insertHoliday($day, $month, $year);

        // Send success response
        echo json_encode(['success' => true]);
    }
     public function get_all_data() {
            $this->load->model('Attendance_model/AttendanceData_model');
     
        $name = $this->input->post('employee'); // Change to 'get' to match AJAX request
    
        $data['attendance_data'] = $this->AttendanceData_model->get_all_data($name);

        // Return data as JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data['attendance_data']));
    }
   
}
