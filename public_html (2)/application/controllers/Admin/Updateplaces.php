<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updateplaces extends CI_Controller {

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
    public function index() {
        $this->load->model("Admin_model/City_models");
        $data["City"] = $this->City_models->getcity();
        $data["place"] = $this->City_models->getplace();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/Updated_places', $data);
        $this->load->view('Adminmarkitplace/footer');
    }

    public function place() {
        $total_segments = $this->uri->total_segments();
        $last_segment = $this->uri->segment($total_segments);
        $this->load->model("Admin_model/Updateplace_models");
        $data['place'] = $this->Updateplace_models->updateplace($last_segment);
        // Load views
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/place', $data);
        $this->load->view('Adminmarkitplace/footer');

        // Stop script execution (remove in production)
    }

    public function updateentry() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // Sanitize input data
            $data_hidden = $this->input->post('place');
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
            );

            // Handle file uploads
            $fileNames = array('Main_image', 'Image1', 'Image2', 'Image3', 'Image4');
            foreach ($fileNames as $fileName) {
                $this->uploadFile($fileName);
            }
        }

        $this->load->model("Admin_model/Updateplace_models");
        $q1 = $this->Updateplace_models->updateCity($data, $data_hidden);
        if ($q1) {
             $cityFilter = $this->input->post('City_filter');
            $base_url = base_url();
            $this->session->set_flashdata('success_message', "Thank you for The Update $cityFilter");
           ?>
            <script>
                alert('<?php echo $cityFilter ?> Updated');
                window.location.href = "https://www.ttjtravmart.com/Spam/Admin/Updateplaces/";
            </script>

            <?php
          
        } else {
            // Handle database update failure
           ?>
              <script>
                alert('<?php echo $cityFilter ?> No Updated  your copy The data samething Rong or Imges are not good');
                window.location.href = "https://www.ttjtravmart.com/Spam/Admin/Updateplaces/";
            </script>
           <?php
        }
    }

    private function uploadFile($fieldName) {
        $uploadDirectory = FCPATH . 'assets/marketplace/';
        $fileName = $_FILES[$fieldName]['name'];

        // Check if the file name is not empty
        if ($fileName !== '') {
            $uploadPath = $uploadDirectory . $fileName;
            // Check if the file upload was successful
            if ($_FILES[$fieldName]['error'] == UPLOAD_ERR_OK) {
                move_uploaded_file($_FILES[$fieldName]["tmp_name"], $uploadPath);
            } else {
                // Handle the case when the file upload failed
                $this->session->set_flashdata('error_message', "Failed to upload '{$fieldName}' file. Error code: {$_FILES[$fieldName]['error']}");
            }
        }
    }
}
