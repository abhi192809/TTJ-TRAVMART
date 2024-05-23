<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends CI_Controller {
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

    public function index() {
        $this->load->model('Attendance_model/Card_model');
        $data['Card'] = $this->Card_model->TTJ_Travmart_Card();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/Card', $data);
        $this->load->view('Attendance/footer');
    }
    
    public function insertCard(){
          $this->load->model('Attendance_model/Card_model');
          $data = array(
            'name' => $this->input->post('Name'),
            'association_head' => $this->input->post('association_head'),
            'Designation' => $this->input->post('Designation'),
            'Campany_name' => $this->input->post('Company_Name'),
            'Number' => $this->input->post('Number'),
            'Mail_ID' => $this->input->post('Email'),
            'add_1' => $this->input->post('Addressl'),
            'add_2' => $this->input->post('Address2'),
            'City' => $this->input->post('City'),
        );

        $this->Card_model->insertFormData($data);

        // You can handle success or redirect to another page
        echo json_encode(array('status' => 'success'));
    }
     public function updateCard() {
        // Handle updating the card data
        $this->load->model('Attendance_model/Card_model');
        $data = array(
            'name' => $this->input->post('Name'),
            'Designation' => $this->input->post('Designation'),
            'Campany_name' => $this->input->post('Your_Company_Name'),
            'Number' => $this->input->post('Number'),
            'Mail_ID' => $this->input->post('Email'),
            'add_1' => $this->input->post('Address1'),
            'add_2' => $this->input->post('Address2'),
            'City' => $this->input->post('City'),
            'Date' => $this->input->post('Date'),
            'magazine_year' => $this->input->post('magazine_year'),
            'Month' => $this->input->post('Month')
            // Add other fields as needed
        );

        $id = $this->input->post('id');
        $this->Card_model->updateCardData($id, $data);
    }
    public function magazineactive(){
    $this->load->model('Attendance_model/Card_model');

    // Get the value of metaData from the POST request
    $metaData = $this->input->post('metaData');

    // Convert the JSON string to an associative array
    $id = json_decode($metaData, true);

    // Update the data array
    $data = [
        'magazine' => '1',
        'magazine_year' => date('Y'),
            'Month' => date('F'),
        'Date' => date('d'), // Fix the typo here
    ];
    $get =   $this->Card_model->magazineactive($id, $data);
    // Call the magazineactive method of Card_model and pass the updated data
    if ($get == 1) {
        echo 1;
    }
}

    public function magazineunactive(){
        $this->load->model('Attendance_model/Card_model');
    
        // Get the value of metaData from the POST request
        $metaData = $this->input->post('metaData');
     
        // Convert the JSON string to an associative array
        $id = json_decode($metaData, true);
    
        // Update the data array
        $data = [
            'magazine' => '',
            'magazine_year' => '',
             'Month' => '',
            'Date' => '' // Fix the typo here
        ];
        $get =   $this->Card_model->magazineunactive($id, $data);
        
        // Call the magazineactive method of Card_model and pass the updated data
        if ($get == 1) {
            echo 1;
        }
    }


public function downloadData() {
    // Your code to fetch magazine subscription data
    $this->load->model('Attendance_model/Card_model');
    $magazineData = $this->Card_model->TTJ_Travmart_Card_dowaload(); // Replace with your actual data fetching logic
     header('Content-Type: application/json');
    echo json_encode($magazineData);
}







}
?>
