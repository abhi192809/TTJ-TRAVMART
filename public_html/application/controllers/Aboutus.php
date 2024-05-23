<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {

    public function index()
    {   
         
        $this->load->view('Website/header');
        $this->load->view('Website/Aboutus');
        $this->load->view('Website/footer');
    }
    
    public function AboutTTJ()
    {   
         
        $this->load->view('Website/header1');
        $this->load->view('Website/Aboutus');
        $this->load->view('Website/footer1');
    }
    
}
