<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demoplace extends CI_Controller {

    public function index($country = NULL, $destination = NULL)
    {   
        
        $this->load->model('Destination_model');
        $data['Destination'] = $this->Destination_model->getPlaces($destination);
    
        $data['Market_Place_Visitor_Attractions'] = $this->Destination_model->Market_Place_Visitor_Attractions($data['Destination']->id);
        $data['Market_place_Air_lines'] = $this->Destination_model->Market_place_Air_lines($data['Destination']->id);
        $data['Market_place_Food'] = $this->Destination_model->Market_place_Food($data['Destination']->id);
        
        $data['Market_place'] = $this->Destination_model->Market_place_Find_Seller($country,$data['Destination']->Place);
        $data['Market_place_SellerEntry'] = $this->Destination_model->Market_place_SellerEntry($data['Market_place']->id);
        // print_r($data['Market_place_SellerEntry']);
        // die;
        $this->load->view('Website/header1');
        $this->load->view('Website/Demoplace', $data);
        $this->load->view('Website/footer1');
    }
    
}
