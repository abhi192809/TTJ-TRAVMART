<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Place extends CI_Controller {

    public function index($param1, $param2)
{   
  
    $this->load->model('Place_models');
    $data['city'] = $this->Place_models->get_all_data_of_city($param2);
   
    $this->load->view('Website/header1');
    $this->load->view('Website/place',$data);
    $this->load->view('Website/footer1');
}

    public function location($param1, $param2)
{   
  
    $this->load->model('Place_models');
    $data['city'] = $this->Place_models->get_all_data_of_city($param2);
   
    $this->load->view('Website/header1');
    $this->load->view('Website/place',$data);
    $this->load->view('Website/footer1');
}
}
