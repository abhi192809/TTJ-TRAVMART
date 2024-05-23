
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thanks extends CI_Controller {

    public function index()
    {   
          $make_id = $this->input->get('MakeID');

        // Pass MakeID to the view
        $data['MakeID'] = $make_id;
        
        $this->load->view('Website/header1');
        $this->load->view('Website/Thanks',$data);
        $this->load->view('Website/footer1');
    }
}


