<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

   public function __construct() {
    parent::__construct();
    $this->load->model('Attendance_model/Gallery_model');
    }

   
    public function index()
    {  
         $this->load->view('Attendance/header');
         $this->load->view('Attendance/gellery');
         $this->load->view('Attendance/footer');
      
    }
    
   public function processUpload() {
    $config['upload_path'] = './assets/';
    $config['allowed_types'] = 'zip';
    $config['max_size'] = 500000000; // 50 MB

    $this->load->library('upload', $config);

    $response = array();

    if ($this->upload->do_upload('zip_file')) {
        $uploadData = $this->upload->data();
        $zipFilePath = $uploadData['full_path'];

        // Call the model method to handle file extraction and database operations
        $result = $this->Gallery_model->processImageFolderUpload($zipFilePath);

        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'The ZIP file contents have been processed successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to process ZIP file contents.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = $this->upload->display_errors();
    }

        // Return the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }
  public function insertGalleryData() {
    $config['upload_path'] = './assets/Gallerysetting';  // Set the upload directory
    $config['allowed_types'] = 'gif|jpg|png';  // Add the allowed file types
    $config['max_size'] = 2048;  // Set the maximum file size in kilobytes

    $this->load->library('upload', $config);

    $response = array();

    if ($this->upload->do_upload('image_upload')) {
        // File uploaded successfully
        $uploadData = $this->upload->data();
        $data = array(
            'gallery_file_id' => $this->input->post('gallery_file_id'),
            'file_name' => $this->input->post('file_name'),
            'year' => $this->input->post('year'),
            'image_path' => 'assets/Gallerysetting/' . $uploadData['file_name'],  // Use the uploaded file name
            'name' => $this->input->post('name'),
            'entry_date' => $this->input->post('entry_date')
        );

        $result = $this->Gallery_model->insertGalleryData($data);

        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Data inserted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error inserting data';
        }
    } else {
        // File upload failed
        $response['status'] = 'error';
        $response['message'] = $this->upload->display_errors();
    }

    // Return a response to AJAX
    header('Content-Type: application/json');
    echo json_encode($response);
}



}
