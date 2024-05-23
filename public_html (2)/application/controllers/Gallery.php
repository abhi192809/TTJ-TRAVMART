<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function index()
    {   
        $this->load->model('Gallery_models');
        $data['distinct_years'] = $this->Gallery_models->getDistinctYears();
        $this->load->view('Website/header');
        $this->load->view('Website/Gallery',$data);
        $this->load->view('Website/footer');
    }
    
    
    public function TTJEvent()
    {   
        $this->load->model('Gallery_models');
        $data['distinct_years'] = $this->Gallery_models->getDistinctYears();
        $this->load->view('Website/header1');
        $this->load->view('Website/Gallery',$data);
        $this->load->view('Website/footer1');
    }
}
