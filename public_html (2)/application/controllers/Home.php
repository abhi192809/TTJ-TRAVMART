<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {   
         
        $this->load->model('Home_models'); // Correct model name
        $data['events'] = $this->Home_models->Calendar_model(); // Call the correct method
        $data['services'] = $this->Home_models->Services_model();
        $data['seller_testimonials'] = $this->Home_models->getTestimonials('google_review_seller');
        $data['buyer_testimonials'] = $this->Home_models->getTestimonials('google_review');
        $data['Test'] = $this->Home_models->Services_model();
        $this->load->view('Website/header', );
        $this->load->view('Website/index',$data);
        $this->load->view('Website/footer');
    }
}
