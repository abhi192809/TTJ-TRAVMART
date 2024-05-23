<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lead extends CI_Controller
{
    
   public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        
        
        // Check if user is not logged in
        if (!$this->session->userdata('user_id')) {
            
            // Redirect to the login page or any other page as needed
            redirect('Meeting/login');
        }
        
        
         $user_type = $this->session->userdata('type');
         if($user_type == 'Buyer'){
             
         }
         else{
            redirect('Meeting/login');
             
         }
    }
    
    public function index()
    {
         $this->load->model("Meeting_model/Lead_model");
        $data['city'] = $this->Lead_model->get_cities();
       
       
        $this->load->view('Meeting/Buyer/header');
        $this->load->view('Meeting/Buyer/sidebar');
        $this->load->view('Meeting/Buyer/topbar');
        $this->load->view('Meeting/Buyer/lead_form',$data);
        $this->load->view('Meeting/Buyer/footer');
    }
    public function lead_buyer_data()
    {
         $this->load->model("Meeting_model/Lead_model");
         $data['lead'] = $this->Lead_model->get_lead();
         $data['Seller'] = $this->Lead_model->get_seller();
     
        $this->load->view('Meeting/Buyer/header');
        $this->load->view('Meeting/Buyer/sidebar');
        $this->load->view('Meeting/Buyer/topbar');
        $this->load->view('Meeting/Buyer/lead_Buyer_data',$data);
        $this->load->view('Meeting/Buyer/footer');
    }
    
    
public function get_place_related_to_country() {
    $this->load->model("Meeting_model/Lead_model");
    $country_name = $this->input->post('country_name');
    $city_names = $this->Lead_model->get_city_names($country_name);
    
    // Check if city names are retrieved successfully
    if ($city_names !== FALSE) {
        // Return JSON response with city names
        echo json_encode($city_names);
    } else {
        // Handle error, perhaps return an empty array or an error message
        echo json_encode(array());
    }
}

    
    
    
    
    
    
    
    
    
        public function insert_lead_data() {
        // Get all posted data
             $this->load->model("Meeting_model/Lead_model");
    
          if( $this->input->post('seller_name') == '00'){
              $value_enquary = 1;
              $seller_name = '0';
          }  
          else{
              $seller_name = $this->input->post('seller_name');
              $value_enquary = 0;
          }
      
         $data = array(
            'seller_ID' => $seller_name,
            'buyer_ID' => $this->session->userdata('user_id'),
            'buyer_name' => $this->input->post('txtFullName'),
            'email' => $this->input->post('txtEmail'),
            'contact_number' => $this->input->post('txtPhone'),
            'trip_category' => $this->input->post('ddlBudget'),
            'departure_country' => $this->input->post('txtDepCountry'),
            'departure_city' => $this->input->post('txtDepCity'),
            'arrival_country' => $this->input->post('txtArriveCountry'),
            'arrival_city' => $this->input->post('txtArriveCity'),
            'departure_date' => $this->input->post('txtDepDate'),
            'number_of_nights' => $this->input->post('txtNights'),
            'number_of_adults' => $this->input->post('txtNoOfAdults'),
            'number_of_minors' => $this->input->post('txtNoOfMinor'),
            'enquiry' =>  $value_enquary,
        );
      $result = $this->Lead_model->insert_lead_data($data);
    
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to insert data'));
        }
    }
    
  public function find_Seller_Base_on_ArriveCity() {
    $this->load->model("Meeting_model/Lead_model");
    $city_name = $this->input->post('city_name');
    $city_id = $this->Lead_model->get_city_ID($city_name);
    $seller_ids = $this->Lead_model->get_sellers_ID($city_id);
    $seller_company_names = array();

    foreach ($seller_ids as $seller_id) {
        $seller_Name = $this->Lead_model->get_Seller_Name($seller_id['SellerID']);
        $seller_company_names[] = $seller_Name;
    }

    echo json_encode($seller_company_names);
}

    

}
