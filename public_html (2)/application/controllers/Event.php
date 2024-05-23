<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function index()
    {   
         
        $this->load->model('Event_models'); // Correct model name
        $data['events'] = $this->Event_models->Calendar_model(); // Call the correct method
        $this->load->view('Website/header');
        $this->load->view('Website/Event',$data);
        $this->load->view('Website/footer');
    }
    public function New_Event()
    {   
        $this->load->model('Event_models');
        $data['events'] = $this->Event_models->get_Number_of_upcoming_Event();
        $this->load->view('Website/header1');
        $this->load->view('Website/Events',$data);
        $this->load->view('Website/footer1');
    }
}
