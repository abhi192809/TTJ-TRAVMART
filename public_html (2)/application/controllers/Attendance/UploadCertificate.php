
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadCertificate extends CI_Controller {
    // public function __construct() {
    //     parent::__construct();
    //     $this->load->library('session');

    //     // Check if 'user' session data exists
    //     $adminSession = $this->session->userdata('user_data');
    //     if(!$adminSession) {
    //         // If 'user' session data doesn't exist, redirect to login page
    //         redirect('Attendance/Login');
    //     }
   
    //     // Continue with the constructor logic for authenticated users
    // }
    public function index() {
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/UploadCertificate');
        $this->load->view('Attendance/footer');
    }

    public function insertcertificate() {
        $this->load->model('Attendance_model/Certificate_model');

        // Gather form data
        $name = $this->input->post('name');
        $company_name = $this->input->post('Company_Name'); // Corrected the name attribute
        $file_data = $this->upload_file();

        // Example: Add more validation and error handling

        // Create an array with the data to be inserted
        $data = array(
            'name' => $name,
            'company_name' => $company_name,
            'file_data' => $file_data, // Change this based on your file handling logic
        );

        // Insert data into the database
        $insert_id = $this->Certificate_model->insert_certificate($data);

        // Return response to Ajax
        echo json_encode(array('insert_id' => $insert_id));
    }
    private function upload_file() {
        $config['upload_path']   = './assets/Eventcertificate/'; // Set the path where the file will be uploaded
        $config['allowed_types'] = 'gif|jpg|png|pdf'; // Define allowed file types
        $config['max_size']      = 99999; // Set the maximum file size in kilobytes

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('File')) {
            $file_data = $this->upload->data();
            return $file_data['file_name']; // Return the uploaded file name
        } else {
            // Handle file upload error
            $error = array('error' => $this->upload->display_errors());
            // You may want to customize the error handling based on your needs
            return '';
        }
    }
}
?>
