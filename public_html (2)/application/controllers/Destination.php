<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination extends CI_Controller {

    public function index()
    {   
    //   $this->load->model('DowanloadCertificate_model');
    //  $data['company_name'] = $this->DowanloadCertificate_model->Getdata();    
        $this->load->view('Website/header1');
        $this->load->view('Website/marketplace');
        $this->load->view('Website/footer1');
    }
    
   
}
