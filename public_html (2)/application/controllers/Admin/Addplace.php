<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addplace extends CI_Controller {

    public function __construct() {
    parent::__construct();
    $this->load->library('session');

    // Check if 'user' session data exists
    $adminSession = $this->session->userdata('user');
    if(!$adminSession) {
        // If 'user' session data doesn't exist, redirect to login page
        redirect('Admin/AdminLogin');
    }
    
    // Continue with the constructor logic for authenticated users
}
    public function index()
    {   
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/Addplace');
        $this->load->view('Adminmarkitplace/footer');
    }
    
 public function addplace()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // Sanitize input data
            $data = array(
                'Country_id' => $this->input->post('Country_id'),
                'City_filter' => $this->input->post('City_filter'),
                'Location' => $this->input->post('Location'),
                'main_img_alt' => $this->input->post('main_img_alt'),
                'imag_1_alt' => $this->input->post('imag_1_alt'),
                'imag_2_alt' => $this->input->post('imag_2_alt'),
                'imag_3_alt' => $this->input->post('imag_3_alt'),
                'imag_4_alt' => $this->input->post('imag_4_alt'),
                'Fist_section' => $this->input->post('Fist_section'),
                'Second_section' => $this->input->post('Second_section'),
                'populer_place_1' => $this->input->post('populer_place_1'),
                'populer_place_2' => $this->input->post('populer_place_2'),
                'populer_place_3' => $this->input->post('populer_place_3'),
                'populer_place_4' => $this->input->post('populer_place_4'),
                'populer_place_5' => $this->input->post('populer_place_5'),
                'point_1' => $this->input->post('point_1'),
                'point_2' => $this->input->post('point_2'),
                'point_3' => $this->input->post('point_3'),
                'point_4' => $this->input->post('point_4'),
                'Main_image'   => $_FILES['Main_image']['name'],
                'Image1'       => $_FILES['Image1']['name'],
                'Image2'       => $_FILES['Image2']['name'],
                'Image3'       => $_FILES['Image3']['name'],
                'Image4'       => $_FILES['Image4']['name'],
            );

            // Handle file uploads
            $fileNames = array('Main_image', 'Image1', 'Image2', 'Image3', 'Image4');
            foreach ($fileNames as $fileName) {
                $uploadResult = $this->uploadFile($fileName);
                 $uploadResult;
            }
        }

         $this->load->model("Admin_model/Addplace_models");
         $q1 = $this->Addplace_models->insertCity($data);
        if ($q1) {
            $cityFilter = $data['City_filter'];
            $base_url = base_url();
            echo "<script>
                alert('Thank you for adding $cityFilter');
                window.location.href = '$base_url/Admin/Addplace'; // Redirect to success page
            </script>";
        }
    }
    private function uploadFile($fieldName)
    {
        $uploadDirectory = FCPATH . 'assets/marketplace/';
        $fileName =  $_FILES[$fieldName]['name'];
        $uploadPath = $uploadDirectory . $fileName;
        return move_uploaded_file($_FILES[$fieldName]["tmp_name"], $uploadPath)
            ? "File '{$fieldName}' uploaded successfully!"
            : "Failed to upload '{$fieldName}' file.";
    }
}
