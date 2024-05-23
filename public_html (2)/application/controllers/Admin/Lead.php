<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {
   
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
    public function index()
    {   
        $this->load->model('Admin_model/Lead_models');
        $data['mail'] = $this->Lead_models->get_all_mail();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/lead',$data);
        $this->load->view('Adminmarkitplace/footer');
    }
     public function get_mail() {
        $search_value = $this->input->post('value');
          $this->load->model('Admin_model/Lead_models');

        // Check if the model is loaded successfully
        if ($this->Lead_models) {
            $result = $this->Lead_models->get_filter_mail($search_value);

            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            // Model not loaded, handle the error
            header('Content-Type: application/json', true, 500);
            echo json_encode(array('error' => 'Internal Server Error - Model not loaded'));
        }
    }
     public function download_csv() {
        $this->load->model('Admin_model/Lead_models');

    // Fetch data from the model
    $data = $this->Lead_models->get_all_mail();

    // Prepare CSV data
    $csv_data = 'Mail' . PHP_EOL; // Header

    foreach ($data as $row) {
        $csv_data .= $row['mail'] . PHP_EOL;
    }

    // Set the file name
    $file_name = 'led_data.csv';

    // Set the content type and headers for download
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $file_name . '"');

    // Output the CSV data
    echo $csv_data;
    exit();

    }

}
