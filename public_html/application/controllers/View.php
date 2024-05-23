<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class view extends CI_Controller {

    public function index()
    {   
    //   $this->load->model('DowanloadCertificate_model');
    //  $data['company_name'] = $this->DowanloadCertificate_model->Getdata();    
        $this->load->view('Website/header');
        $this->load->view('Website/View_pdf');
        $this->load->view('Website/footer');
    }
    
    //  public function submitForm() {
    //   $this->load->model('DowanloadCertificate_model');
    //     $name = $this->input->post('name');
    //     $company_name = $this->input->post('company_name');

    //     // Find certificate based on name and company_name
    //     $certificate = $this->DowanloadCertificate_model->find_certificate($name, $company_name);

    //     if ($certificate) {
    //         // Certificate found, you can do something with the data
    //         $response = array('status' => 'success', 'message' => 'Certificate found', 'data' => $certificate);
    //     } else {
    //         // No matching certificate found
    //         $response = array('status' => 'error', 'message' => 'Certificate not found');
    //     }

    //     // Return response
    //     echo json_encode($response);
    // }
}
