<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {
    
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
        $this->load->model('Attendance_model/Megazine_model');
        $data['Magazinpaymentprof'] = $this->Megazine_model->TTJ_Magazin();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/magazin', $data);
        $this->load->view('Attendance/footer');
    }

    public function transferData() {
        $this->load->model('Attendance_model/Megazine_model');
        
        // Retrieve the data from the POST request
      $rowData = $this->input->post('data', true);
     
        // Modify the data as needed before inserting into another table
        $modifiedData = array(
            'name' => $rowData['name'],
            'Campany_name' => $rowData['company_name'],
            'Number' => $rowData['number'],
            'Mail_ID' => $rowData['email'],
            'association_head' => $rowData['association'],
            'Designation' => $rowData['designation'],
            'add_1' => $rowData['address1'],
            'add_2' => $rowData['address2'],
            'magazine' => '1',
            'City' => $rowData['city'],
            'magazine_year' => date('Y'),
            'Date' => date('d') // Assuming you want to insert the current date and time
            // Add other fields as needed
        );

        // Insert data into TTJ_Travmart_Card table
        $this->Megazine_model->insertOrUpdateData($modifiedData);
        $this->Megazine_model->deleteDataFromMagazinPaymentProf($rowData['id']);

        // Respond with a success message or any relevant response
        $response = array('status' => 'success', 'message' => 'Data transferred successfully');
        echo json_encode($response);
    }
}
?>
