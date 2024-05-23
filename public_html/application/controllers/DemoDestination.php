<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemoDestination extends CI_Controller {

    public function index() {   
        // Load the model
        $this->load->model('Destination_model');
        
        // Get the countries data from the model
        $data['country'] = $this->Destination_model->getCountries();
        
        // Load the views and pass the data
        $this->load->view('Website/header1');
        $this->load->view('Website/DemoDestination', $data);
        $this->load->view('Website/footer1');
    }
    
    public function Get_place() {
    $id = $this->input->post('id');
    $this->load->model('Destination_model');
    $place = $this->Destination_model->getPlace($id);

    // Return the response as JSON
    echo json_encode($place);
}

   public function Search_destination() {
        $query = $this->input->post('query');
        $this->load->model('Destination_model');
        $destinations = $this->Destination_model->searchDestinations($query);

        // Return the response as JSON
        echo json_encode($destinations);
    }

}
