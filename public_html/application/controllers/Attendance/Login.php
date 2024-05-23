<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {  
        $this->load->view('Attendance/Login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $clientIP = $_SERVER['REMOTE_ADDR']; // Get client's IP address

        // Define the allowed IP address
        $allowedIP = '103.3.204.161'; // Change this to your desired IP address

        // Check if the user is an admin
        $isAdmin = 'Admin';
         $isdeb = 'deb@ttjtravmart.com';

        // Check if the user is an admin or if the client's IP matches the allowed IP
        if ($isAdmin || ($username == $isdeb) || $clientIP == $allowedIP) {
            // IP is allowed or user is an admin, proceed with login
            date_default_timezone_set('Asia/Kolkata');
            $attendance_data = array(
                'Name' => $username,
                'Time_to_in' => date('H:i:s'),
                'Time_to_go' => '',
                'Date' => date('Y-m-d'),
                'Day' => date('l'),
                'Month' => date('F'),
                'Year' => date('Y'),
            );

            $this->load->model('Attendance_model/Login_Model');
            $result = $this->Login_Model->Data_from($username, $password);

            if ($result['result']) {
                // Set both 'username' and 'id' in the session
                $user_data = array('username' => $result['user_data']['User_name'], 'id' => $result['user_data']['id']);
                $this->Login_Model->Logintime($attendance_data);
                $this->session->set_userdata('user_data', $user_data);
                 
                echo 1; // Successful login
            } else {
                echo 0; // Invalid credentials
            }
        } else {
            echo -1; // IP not authorized for non-admin users
        }
    }

    // Function to check if the user is an admin
    private function isAdmin($username) {
        // Implement your logic to check if $username is an admin
        // Return true if user is an admin, false otherwise
        // For example, you may check a database or a configuration setting
        return ($username === 'admin'); // Change 'admin' to your admin username
    }
}