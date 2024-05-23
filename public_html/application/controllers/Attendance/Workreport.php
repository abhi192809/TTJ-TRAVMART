<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workreport extends CI_Controller {
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
    public function index()
    {
        $this->load->model('Attendance_model/WorkReportEmplay_model');

        // Retrieve data from the model
        $data['report'] = $this->WorkReportEmplay_model->get_data();

        // Load views
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/work_report', $data);
        $this->load->view('Attendance/footer');
    }

   public function submit_form()
{
    // File Upload Configuration
    $config['upload_path'] = './assets/Workreport/'; // Set the path where you want to upload the file
    $config['allowed_types'] = '*'; // Allow only Excel files
    $config['max_size'] = '*'; // Maximum file size in kilobytes (10 MB)

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('File_Upload')) {
        // Handle file upload error
        $response = array('status' => 'error', 'message' => $this->upload->display_errors());
        echo json_encode($response);
        return;
    }

    // File uploaded successfully, proceed with data processing
    $file_data = $this->upload->data();

    // Handle form submission
    $data = array(
        'Name' => $this->input->post('Name'),
        'Work_report' => $this->input->post('point_4'),
        'Day' => Date('d-m-Y'),
        'File_Upload' => $file_data['file_name'] // Add the file name to the data array
        // Add other form fields as needed
    );

    // Load the 'WorkReportEmplay_model' model
    $this->load->model('Attendance_model/WorkReportEmplay_model');

    // Call the model function to insert data into the database
    $result = $this->WorkReportEmplay_model->insert_data($data);

    // Check the result and send appropriate response
    if ($result > 0) {
        // Success
        $response = array('status' => 'success', 'message' => 'Form submitted successfully.');
    } else {
        // Error
        $response = array('status' => 'error', 'message' => 'Error submitting the form.');
    }

    // Return the response as JSON
    echo json_encode($response);
}

}
?>
