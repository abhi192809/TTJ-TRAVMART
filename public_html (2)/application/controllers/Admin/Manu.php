<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manu extends CI_Controller {

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
    public function index(){
         $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/market_place_users');
        $this->load->view('Adminmarkitplace/footer'); 
    }
 
    public function Userpermition()
    {
        $this->load->model('Admin_model/Manu_model');
        $data['manu'] = $this->Manu_model->merket_manu();
        $data['users']= $this->Manu_model->merket_place_user();
        
        $data['users']= $this->Manu_model->merket_place_user();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/manu_permition',$data);
        $this->load->view('Adminmarkitplace/footer'); 
    }
     public function insertPremition() {
        $this->load->model('Admin_model/Manu_model');
        // Get selected user and checkboxes
        $select = $this->input->post('users');
        $selectedCheckboxes = $this->input->post('selectedCheckboxes');

        // Insert data into the database for each selected checkbox
        foreach ($selectedCheckboxes as $metaValue) {
            $this->Manu_model->insertPremition($metaValue, $select);
        }
    }
    public function signup() {
    $this->load->database();
    
    $email = $this->input->post('email');
    $name = $this->input->post('name');
    $password = $this->input->post('password');
    $user_type = $this->input->post('user_type');

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $data = array(
        'Email' => $email,
        'Name' => $name,
        'Password' => $hashedPassword,
        'Place' => $user_type,
    );

    if ($this->db->insert('merket_place_user', $data)) {
        
        // Email content
        $subject = "Login ID Password";
        $message = "Hello $name,\n\n";
        $message .= "Your Login ID Password as $user_type  !\n";
        $message .= "Your username: $email\n";
        $message .= "Your password: $password\n\n";
        $message .= "Note: This is your temporary password. Please consider changing it immediately after login for security reasons.";

        // Additional headers
        $headers = "From: info@ttjtravmart.com\r\n";
        $headers .= "Reply-To: info@ttjtravmart.com\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        $additional_parameters = "-f info@ttjtravmart.com";

        // Send email
        if (mail($email, $subject, $message, $headers, $additional_parameters)) {
            echo 1;
        } else {
            echo "Error sending email.";
        }
    } else {
        echo 2;
    }
    
    
    
}

}
