<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home1 extends CI_Controller {

    public function index()
    {   
        $this->load->model('Event_models');
        $this->load->model('Home_models');
        $data['Test'] = $this->Home_models->Services_model();
        $data['events'] = $this->Event_models->get_Number_of_upcoming_Event();
        $data['testimonials'] = $this->Home_models->getTestimonials('google_review');
        
        $this->load->view('Website/header1' );
        $this->load->view('Website/Home1' ,$data);
        $this->load->view('Website/footer1' );
    }
}
