<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Attendance_model/Logout_Model');
        $this->load->library('session');
    }

    public function logout() {
        date_default_timezone_set("Asia/Kolkata");

         $username = $this->session->userdata('user_data')['username'] ?? null;
        
        $login_data = $this->Logout_Model->getLoginDataForToday($username);
             $current_time = date('H:i:s');
        if ($username) {
           
            if ($login_data  AND $current_time > '18:30:00') {
                $this->Logout_Model->updateAttendanceData($username, $login_data['Date'], array(
                    'Time_to_go' => date('H:i:s'),
                ));

                $this->session->sess_destroy();
                echo json_encode(array('status' => 1));
            } else {
                echo json_encode(array('status' => 1));
            }
        } else {
            echo json_encode(array('status' => 0));
        }
    }

    public function autoLogoutCron() {
        $username = 'specify_a_username'; // You may need to specify a user for this case

        if ($username) {
            $this->Logout_Model->autoLogout($username);
        } else {
            // Handle the case where the username is not specified
        }
    }
}
