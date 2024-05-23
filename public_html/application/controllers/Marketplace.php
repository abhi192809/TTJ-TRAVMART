<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace extends CI_Controller {

    public function index()
    {   
        $this->load->view('Website/header');
        $this->load->view('Website/marketplace');
        $this->load->view('Website/footer');
    }
    
    public function get_country() {
        $this->load->model('Marketplace_models');
        $searchTerm = $this->input->post('data');
        $data = $this->Marketplace_models->getCountry($searchTerm);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
    public function getCities() {
        $this->load->model('Marketplace_models');
        $searchTerm = $this->input->post('data');
        $countryId = $this->input->post('countryId');
        $data = $this->Marketplace_models->getCities($searchTerm, $countryId);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function led(){
        $this->load->model('Marketplace_models');
        $email = $this->input->post('email');
        $data = $this->Marketplace_models->insert_mail($email);
             echo '1';
    }
    
    
    public function Destination(){
        
        $this->load->view('Website/header1');
        $this->load->view('Website/marketplace');
        $this->load->view('Website/footer1');
    
    }
}
