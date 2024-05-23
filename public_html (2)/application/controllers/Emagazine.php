<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emagazine extends CI_Controller {

    public function index()
    {   
         $this->load->model('Emagazine_model');
        $data['get'] = $this->Emagazine_model->MagazineSection_upload();
        $this->load->view('Website/header');
        $this->load->view('Website/emagazine',$data);
        $this->load->view('Website/footer');
    }
}
