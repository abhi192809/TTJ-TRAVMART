<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventgallery extends CI_Controller {

    public function index($file_name = '', $name = '')
    {   
        // Now $file_name and $name contain the values from the URL
        $file_name = preg_replace('/[^a-zA-Z0-9_.]/', '', $file_name);
        $data['filename'] = $file_name;
        $data['name'] = $name;

        $this->load->view('Website/header1');
        $this->load->view('Website/Eventgallery', $data);
        $this->load->view('Website/footer1');
    }
}
