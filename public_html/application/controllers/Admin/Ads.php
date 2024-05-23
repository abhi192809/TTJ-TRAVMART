<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {
    
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
        $this->load->model('Admin_model/Ads_models');
        $data['city'] =  $this->Ads_models->getcity();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/ads',$data);
        $this->load->view('Adminmarkitplace/footer');
    }
    
    
    public function Adsdetail(){
        $this->load->model('Admin_model/Ads_models');
        $data['ads'] =  $this->Ads_models->getads();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/adsdetail',$data);
        $this->load->view('Adminmarkitplace/footer');
    }
    
    public function Removeads(){
         $this->load->model('Admin_model/Ads_models');
        $data['ads'] =  $this->Ads_models->getads();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/Remove_ads',$data);
        $this->load->view('Adminmarkitplace/footer');
    }
    
    public function oldads(){
         $this->load->model('Admin_model/Ads_models');
        $data['ads'] =  $this->Ads_models->getads();
        $this->load->view('Adminmarkitplace/header');
        $this->load->view('Adminmarkitplace/nav');
        $this->load->view('Adminmarkitplace/oldads',$data);
        $this->load->view('Adminmarkitplace/footer');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function addads(){
        $this->load->model('Admin_model/Ads_models');
        $city_id = $this->input->post('city_id');
        $Add_company = $this->input->post('Add_company');
        $start_time = $this->input->post('starting_time');
        $end_time = $this->input->post('End_time');
        $start_zone = $this->input->post('Time_Slot');
        $end_zone = $this->input->post('End_Slot');
       

        // File Upload
        $config['upload_path'] = './assets/Ads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 200480; // 20 MB
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('ads')) {
            // File uploaded successfully
            $data = $this->upload->data();
            $ads_filename = $data['file_name'];
              // Prepare data for database insertion
            $data_sql = [
            'Add_company' => $Add_company,
            'place_id' => $city_id,
            'ads' => $ads_filename,  // Use the uploaded file name
            'Staring_Date' => $start_time,
            'Ending_Date' => $end_time,  // Correct variable name
            'time_to_active' => $start_zone,
            'time_to_close' => $end_zone,
            'Status' => '1'
             ];
              
            $this->Ads_models->adsdatabase($data_sql);
            
            echo "File uploaded successfully!";
        } else {
            // File upload failed
            $upload_error = $this->upload->display_errors();
            echo "Error: $upload_error";
        }
    }
    
      public function sleepads(){
       $city_id = $this->input->post('dataMeta');
       $this->load->model('Admin_model/Ads_models');
       $this->Ads_models->sleepplace($city_id);
      }

}
