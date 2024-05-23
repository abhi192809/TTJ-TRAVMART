<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manupermition extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // Check if 'user' session data exists
        $adminSession = $this->session->userdata('user_data');
        if (!$adminSession) {
            // If 'user' session data doesn't exist, redirect to login page
            redirect('Attendance/Login');
        }
       
        // Continue with the constructor logic for authenticated users
    } 

    public function index() {
        $this->load->model('Attendance_model/Manu_model');
        $data['Manuprofile'] = $this->Manu_model->Attendance_manu();
        $data['users'] = $this->Manu_model->merket_place_user();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/Manu_permition', $data);
        $this->load->view('Attendance/footer');
    }
      public function insertPremition() {
        $this->load->model('Attendance_model/Manu_model');
        // Get selected user and checkboxes
        $select = $this->input->post('users');
        $selectedCheckboxes = $this->input->post('selectedCheckboxes');

        // Insert data into the database for each selected checkbox
        foreach ($selectedCheckboxes as $metaValue) {
            $this->Manu_model->insertPremition($metaValue, $select);
        }
    }
}
?>
