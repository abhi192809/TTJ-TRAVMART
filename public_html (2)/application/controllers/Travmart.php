<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travmart extends CI_Controller {

    public function index()
    {   
         
        $this->load->view('Website/header');
        $this->load->view('Website/Travmart');
        $this->load->view('Website/footer');
    }
}
