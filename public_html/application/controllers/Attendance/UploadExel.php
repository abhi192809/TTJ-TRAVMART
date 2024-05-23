<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  UploadExel extends CI_Controller {

    public function index()
    {   
    //     $this->load->model('Attendance_model/uploadexel_model');
    //   $data['UploadExel'] = $this->UploadExel_model->UploadExel();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/uploadexel');
        $this->load->view('Attendance/footer');
    }
    
    
    public function ViewExelData(){
         $this->load->model('Attendance_model/Uploadexel_model');
      $data['UploadExel'] = $this->Uploadexel_model->UploadExel();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/View-All-Event-Exel',$data);
        $this->load->view('Attendance/footer');

    }
    
    public function uploadExeldata() {
    $this->load->model('Attendance_model/Uploadexel_model');

    // Check if the form is submitted
    if ($this->input->post()) {
        // Configuring file upload
        $config['upload_path']   = './assets/EventExelFile'; // Corrected path
        $config['allowed_types'] = '*'; // Add more file types if needed
        $config['max_size']      = '100000'; // Set the maximum file size in KB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('Upload_Exel_File')) {
            // File uploaded successfully
            $fileInfo = $this->upload->data();
            $data = $this->input->post();
            
            // Store the uploaded file name in the $data array
            $data['Upload_Exel_File'] = $fileInfo['file_name'];
            
            // Pass the $data array to the model for processing
            $this->Uploadexel_model->processFile($data);
            echo 1;
        } else {
            // File upload failed, display error messages
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    }
    }


}
