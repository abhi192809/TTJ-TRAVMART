<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MagazineSection extends CI_Controller {
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
        $this->load->model('Attendance_model/MagazineSection_model');
        $getdata['data'] = $this->MagazineSection_model->get();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/MagazineSection',$getdata);
        $this->load->view('Attendance/footer');
    }
    public function upload_magazinesection(){
         $this->load->model('Attendance_model/MagazineSection_model');
        $this->MagazineSection_model->insertdata();
        
    }
    public function insertdata() {
        // Get form data
        $magazineImage = $_FILES['Magazin_images']['name'];
        $magazinePdf = $_FILES['Magazin_pdf']['name'];
        $magazineDate = $this->input->post('Magazin_Date');
        $magazineText = $this->input->post('Magazin_Text');

        // Upload images and move them to the desired directory
        $targetDirectory = "./assets/magazine/";

        move_uploaded_file($_FILES["Magazin_images"]["tmp_name"], $targetDirectory . $magazineImage);
        move_uploaded_file($_FILES["Magazin_pdf"]["tmp_name"], $targetDirectory . $magazinePdf);

        // Insert data into the database
        $data = array(
            'Magazin_images' => $magazineImage,
            'Magazin_pdf' => $magazinePdf,
            'Magazin_Date' => $magazineDate,
            'Magazin_Text' => $magazineText,
            'Active'=>'1'
        );
        $this->db->Update('MagazineSection_upload', array('Active'=>'0'));
        $this->db->insert('MagazineSection_upload', $data);
        echo "1";
    }
    



}
?>
