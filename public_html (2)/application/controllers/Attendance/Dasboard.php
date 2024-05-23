<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        $adminSession = $this->session->userdata('user_data');
        
        if(!$adminSession) {
            redirect('Attendance/Login');
        }
        
        
    }   
    
    public function index(){
        $this->load->model('Attendance_model/Leaves_model');
        $data['Comeing_data'] = $this->Leaves_model->get_current_month_data();

        $data['leaves'] = $this->Leaves_model->getlevesData();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/Dasboard',$data);
        $this->load->view('Attendance/footer');
    
    }
}