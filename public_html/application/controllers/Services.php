<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function index()
    {   
         
        $this->load->model('Home_models'); // Correct model name
        $data['services'] = $this->Home_models->Services_model();
        $this->load->view('Website/header');
        $this->load->view('Website/Services',$data);
        $this->load->view('Website/footer');
    }
}
