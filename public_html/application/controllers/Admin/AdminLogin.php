<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

 
    public function index()
    {   
         
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/Login');
        $this->load->view('Adminmarkitplace/footer');
    }
    public function process_login() {
    $this->load->model('Admin_model/Login_models');
    $this->load->library('session');
    $username = $this->input->post('Username');
    $password = $this->input->post('Password');

    $user = $this->Login_models->verify_user($username, $password);

    if (!empty($user['Place'])) {
        $userdata = array(
            'user' => $user['Place'],
        );
        
        $userid = array(
            'id' => $user['id'],
        );

        $this->session->set_userdata($userdata);
        $this->session->set_userdata($userid);
        
        echo '1';
    } else {
        echo '0';
    }
    }

    public function logout() {
    $this->load->library('session');
    $this->session->sess_destroy(); 
     redirect('Admin/AdminLogin');
    }

}
