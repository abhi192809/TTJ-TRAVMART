<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employ_all_operations extends CI_Controller {
    
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
    
    public function insert()
    {  
          
           $uploaded_files = array();

        // Define target directories for each file
        $target_directories = array(
            'Photo' => './assets/Employee_photo/',
            'Education_id_Proof' => './assets/Employee_Study/',
            'ID_prof' => './assets/Employee_ID/'
        );

        foreach ($_FILES as $field_name => $file) {
            // Check if the file field exists in target_directories array
            if (array_key_exists($field_name, $target_directories)) {
                $target_directory = $target_directories[$field_name];
                $target_file = $target_directory . basename($file['name']);

                if (move_uploaded_file($file['tmp_name'], $target_file)) {
                    $uploaded_files[$field_name] = $file['name'];
                } else {
                    // Handle file upload error
                    echo json_encode(array('status' => 'error', 'message' => 'Failed to upload file.'));
                    return;
                }
            } else {
                // Handle unknown file field
                echo json_encode(array('status' => 'error', 'message' => 'Unknown file field.'));
                return;
            }
        }

        // Process other form data
        $data = array(
            'name' => $this->input->post('Name'),
            'employ_post' => $this->input->post('Employ_Post'),
            'contact_number' => $this->input->post('Contact_Number'),
            'TTJ_mail_id' => $this->input->post('mail_id'),
            'date_of_joining' => $this->input->post('Date_of_Joining'),
            'last_working_job' => $this->input->post('Last_Working_job'),
            'photo' => $uploaded_files['Photo'],
            'education_id_proof' => $uploaded_files['Education_id_Proof'],
            'id_prof' => $uploaded_files['ID_prof'],
            'Status' => '1',
        );
        
        $data_login =[
              
              'User_name' =>  $this->input->post('mail_id'),
              'Password' => $this->input->post('Password'),
              'on_or_off' => "on",
        ];
        // Insert data into the database
        $this->load->model('Attendance_model/Employee_Model');
        $this->load->model('Attendance_model/Login_Model');
        $this->Employee_Model->insertEmployee($data);
        $this->Login_Model->insertlogindata($data_login);

        // Return a success response
        echo json_encode(array('status' => 'success', 'message' => 'Employee data submitted successfully.'));

    }
}
