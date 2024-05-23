<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buyer extends CI_Controller
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
         if($user_type == 'Admin'){
             
         }
         else{
            redirect('Meeting/login');
             
         }
    }
    
    public function index()
    {
        $this->load->model('Meeting_model/Buyer_model');
        $this->load->model('Meeting_model/Master_model');
        $data['Event'] = $this->Buyer_model->All_Event();
        $data['Nature_of_Business'] = $this->Master_model->Merket_place_Nature_of_Business_Master();
           $data['Business_Category_Master'] = $this->Master_model->Merket_place_Business_Category_Master();
      
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/buyer_view', $data);  // Pass $data as an array
        $this->load->view('Meeting/dashboard/footer');
    }

    public function buyer_data_view(){
        $this->load->model('Meeting_model/Buyer_model');
        @$data['All_Event'] = $this->Buyer_model->All_Event_detels_id_name();
        
        @$data['Event_Related_Buyer'] = $this->Buyer_model->ALL_Event_map_persion_buyer();
        $data['Buyer_Data'] = $this->Buyer_model->Buyer_User_Data();
        // echo "<pre>";
        // print_r($data['Event_Related_Buyer'] );
        // echo "</pre>";
        // die;
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/buyer_data_view',$data);
        $this->load->view('Meeting/dashboard/footer');
  
    }
    
    public function Arrivedbuyer(){
        $this->load->model('Meeting_model/Buyer_model');
        @$data['All_Event'] = $this->Buyer_model->All_Event_detels_id_name();
        
        @$data['Event_Related_Buyer'] = $this->Buyer_model->ALL_Event_map_persion_buyer();
        $data['Buyer_Data'] = $this->Buyer_model->Buyer_User_Data();
        // echo "<pre>";
        // print_r($data['Event_Related_Buyer'] );
        // echo "</pre>";
        // die;
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Arrivedbuyer',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function buyer_ragistation_appreal_request(){
        $this->load->model('Meeting_model/Buyer_model');
        $data['Event'] = $this->Buyer_model->get_Event_detels();
        $data['Events'] = $this->Buyer_model->get_Event_details_map();
    
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/buyer_ragistation_appreal_request',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    public function buyer_data_old_Event(){
        $this->load->model('Meeting_model/Buyer_model');
        $data['Buyer_Data'] = $this->Buyer_model->Buyer_data_all();
        $data['Buyer_city'] = $this->Buyer_model->getDistinctCities();
        $data['Buyer_business_category'] = $this->Buyer_model->getDistinct_business_category();
      $data['Buyer_Plan'] = $this->Buyer_model->get_Buyer_Plan();
      
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/old_buyer_data',$data);
        $this->load->view('Meeting/dashboard/footer');
  
    }
    public function update_buyer_data(){
        $id = $this->uri->segment(5);
        $this->load->model('Meeting_model/Buyer_model');
         $data['Buyer'] = $this->Buyer_model->Get_Buyer_data($id);
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Update_buyer_data',$data);
        $this->load->view('Meeting/dashboard/footer');
  
    }
    
    
    public function remove_buyer() {
       $this->load->model('Meeting_model/Buyer_model');
        $id = $this->input->get('id');
        $email = $this->input->get('email');
        $this->Buyer_model->remove_buyer($id, $email);
        redirect('Meeting/Admin/buyer/buyer_data_old_Event');
    } 
    
    public function Live_Buyer_data(){
        $this->load->model('Meeting_model/Buyer_model');
        
        $this->load->model('Meeting_model/Seller_model');
        @$data['Active_Event'] = $this->Seller_model->Active_View_Event();
        @$data['Event_Related_Buyer'] = $this->Buyer_model->Event_map_persion_buyer($data['Active_Event']->EventID);
        if($data['Event_Related_Buyer'] != NULL){
        $data['Buyer_Data'] = $this->Buyer_model->Buyer_User_Data();
        }
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Live_buyer_data',$data);
        $this->load->view('Meeting/dashboard/footer');
  
    }
    
    
    public function Event_Related_data($eventID){
        $this->load->model('Meeting_model/Buyer_model');
        
        $this->load->model('Meeting_model/Seller_model');
        @$data['Event_Related_Buyer'] = $this->Buyer_model->Event_map_persion_buyer($eventID);
        if($data['Event_Related_Buyer'] != NULL){
        $data['Buyer_Data'] = $this->Buyer_model->Buyer_User_Data();
        }
        $data['eventID'] = $eventID;
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Old_Active_buyer_in_Event',$data);
        $this->load->view('Meeting/dashboard/footer');
  
    }
    
    public function Event_Related_data_Seller($eventID){
        $this->load->model('Meeting_model/Buyer_model');
        
        @$data['Event_Related_Seller'] = $this->Buyer_model->Event_map_persion_Seller($eventID);
          if($data['Event_Related_Seller'] != NULL){
        $data['Seller_Data'] = $this->Buyer_model->Seller_User_Data();
        }
      $data['eventID'] = $eventID;
         $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Related_to_Event_Seller',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function Buyer_Event(){
        $data['id'] = $id = $this->uri->segment(5);
        
        $this->load->model('Meeting_model/Booking_model');
         $this->load->model('Meeting_model/Buyer_model'); 
        $data['EventID'] = $this->Booking_model->Get_Buyer_Event_map($id);
        $data['Event_Data'] = $this->Booking_model->Get_map_Event();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Buyer_Event',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function Get_the_Buyer_Realted_Event_Seller_Meeting(){
        
          $EventID = $this->uri->segment(5);
          $BuyerID = $this->uri->segment(6);
           $this->load->model('Meeting_model/Booking_model');
        $data_fixed_Event =[
            
            'EventID' => $EventID,
            'BuyerID' => $BuyerID,
        
            ];
            
        $data['Get_Seller_from_fixed'] =$this->Booking_model->Get_Buyer_Event_fixed($data_fixed_Event);
    
        $data['Get_Seller_data'] = $this->Booking_model->Seller_Value();
    
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Get_the_Buyer_Realted_Event_Seller_Meeting',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    
     public function Get_the_Varefied_Event_Seller_Meeting(){
        
          $EventID = $this->uri->segment(5);
          $BuyerID = $this->uri->segment(6);
           $this->load->model('Meeting_model/Booking_model');
        $data_fixed_Event =[
            
            'EventID' => $EventID,
            'BuyerID' => $BuyerID,
        
            ];
            
        $data['Get_Seller_from_fixed'] =$this->Booking_model->Get_Buyer_Event_fixed($data_fixed_Event);
    
        $data['Get_Seller_data'] = $this->Booking_model->Seller_Value();
    
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Get_the_Varefied_Event_Seller_Meeting',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
     
    public function CheckDuplicate() {
        $this->load->model('Meeting_model/Buyer_model');
        $email = $this->input->post('email');
        $companyName = $this->input->post('companyName');

        $existingBuyer = $this->Buyer_model->getBuyerByEmailAndCompany($email, $companyName);
        
        if ($existingBuyer) {
            // If the combination exists, return an error response
            $response = array('status' => 'error', 'message' => 'A buyer with the same email and company already exists.');
        } else {
            // If the combination doesn't exist, return a success response
            $response = array('status' => 'success');
        }

        // Send JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    
    public function Submit_the_buyer_form() {
        $this->load->model('Meeting_model/Buyer_model');
    
        $config['upload_path'] = './assets/Meeting/Buyer_logo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '*';
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('Logo')) {
            $upload_data = $this->upload->data();
            $data = array(
                'Logo' => $upload_data['file_name'],
                'Name' => $this->input->post('Name'),
                'Designation' => $this->input->post('Designation'),
                'Your_Company_Name' => $this->input->post('Your_Company_Name'),
                'Nature_of_Business' => $this->input->post('Nature_of_Business'),
                'Business_Category' => $this->input->post('Business_Category'),
                'Company_Address' => $this->input->post('Company_Address'),
                'Annual_Turnover' => $this->input->post('Annual_Turnover'),
                'Year_Commencement' => $this->input->post('Year_Commencement'),
                'Destinations' => $this->input->post('Destinations'),
                'Trade_Associations' => $this->input->post('Trade_Associations'),
                'City' => $this->input->post('City'),
                'Pin_Code' => $this->input->post('Pin_Code'),
                'Email' => $this->input->post('Email'),
                'Mobile_Number' => $this->input->post('Mobile_Number'),
                'Country' => $this->input->post('Country'),
            );
             
                $EventID = $this->input->post('EventID');
             
             
            $buyer_id = $this->Buyer_model->insert_buyer($data);
             
            $Event_map_buyer =  $this->Buyer_model->map_buyer_entry($buyer_id,$EventID);
            
            // $buyer_Login = $this->Buyer_Model->Login();
            
            $response = array('status' => 'success', 'message' => 'Form submitted successfully!');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => $this->upload->display_errors());
            echo json_encode($response);
        }
    }
    
    
    public function delete_buyer_data() {
          $this->load->model('Meeting_model/Buyer_model');
        $BuyerId = $this->input->post('Buyer_ID');
        $EventId = $this->input->post('Event_ID');
 
        // Perform the deletion in the model
        $result = $this->Buyer_model->delete_buyer_entry($BuyerId,$EventId);

        if ($result) {
            echo json_encode(['success' => 'Entry deleted successfully']);
        } else {
            echo json_encode(['error' => 'Failed to delete entry']);
        }
    }
    
    
     public function approve_registration(){
        $this->load->model('Meeting_model/Buyer_model');
        $BuyerId = $this->input->post('Buyer_ID');
        $EventId = $this->input->post('Event_ID');
        $BuyerName = $this->input->post('BuyerName');
        
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $password = substr(str_shuffle($characters), 4, 8); // Adjust the length as needed
          $date = date('Y-m-d', strtotime('+1 year'));

        $this->Buyer_model->approve_buyer_entry($BuyerId,$EventId);
        $this->Buyer_model->delete_buyer_entry($BuyerId,$EventId);
        $result = $this->Buyer_model->Buyer_Login_Password($BuyerName,$password,'Buyer',$date);
        
        if($result == true){
            echo 1;
        }
        
     }
     
     public function mail_Buyer_password(){
      $this->load->model('Meeting_model/Buyer_model');
      $email = $this->input->post('email');
      $this->Buyer_model->get_the_id_password($email);
      
      
     }
     
     public function map_ID(){
             $this->load->model('Meeting_model/Buyer_model');
  
         $id = $this->input->post('mapID');
         $data_varify = [
              
              'Attand_or_not' =>1,
              
             ];
         if($this->Buyer_model->varity_persion($id,$data_varify)){
             echo 1;
         }
         else{
             echo 0;
         }
         
     }

public function upload_csv() {
    if ($_FILES['csv_file']['name']) {
        $file_path = './assets/Meeting/' . $_FILES['csv_file']['name'];

        // Upload CSV file
        move_uploaded_file($_FILES['csv_file']['tmp_name'], $file_path);

        // Read CSV file
        $csv_data = array_map('str_getcsv', file($file_path));

        // Remove header row
        $header = array_shift($csv_data);

        // Insert data into 'market_place_buyer' table
        foreach ($csv_data as $row) {
            $company_name = $row[2] ?? ''; // Company name
            $email = $row[8] ?? ''; // Email

            // Check if company name already exists
            $existing_company = $this->db->get_where('Market_place_Buyer', array('your_company_name' => $company_name))->row_array();

            // Check if email already exists
            $existing_email = $this->db->get_where('Market_place_Buyer', array('email' => $email))->row_array();

            // If either company name or email already exists, get the buyer's ID
            if ($existing_company || $existing_email) {
                $existing_buyer = $existing_company ? $existing_company : $existing_email;
                $buyer_id = $existing_buyer['id'];
            } else {
                // If neither company name nor email exists, proceed with insertion
                $data = array(
                    'name' => $row[0] ?? '',
                    'designation' => $row[1] ?? '',
                    'your_company_name' => $company_name,
                    'nature_of_business' => $row[3] ?? '',
                    'business_category' => $row[4] ?? '',
                    'company_address' => $row[5] ?? '',
                    'city' => $row[6] ?? '',
                    'pin_code' => $row[7] ?? '',
                    'email' => $email,
                    'mobile_number' => $row[9] ?? '',
                    'annual_turnover' => $row[10] ?? '',
                    'year_commencement' => $row[11] ?? '',
                    'destinations' => $row[12] ?? '',
                    'trade_associations' => $row[13] ?? '',
                    'Country' => $row[14] ?? '',
                    'logo' => 'no-image-icon-6.png', // Assuming default image name
                );

                $this->db->insert('Market_place_Buyer', $data);

                // Get the last inserted ID from 'market_place_buyer' table
                $buyer_id = $this->db->insert_id();
            }

            // Check if the buyer is already mapped to the event
            $existing_mapping = $this->db->get_where('Merket_place_Buyer_event_map', array('Buyer_ID' => $buyer_id))->row_array();
            $duration = date('Y-m-d', strtotime('+3 months'));
            // If the buyer is not already mapped to the event, insert the mapping
            if (!$existing_mapping) {
                // Insert data into 'merket_place_login' table
                $login_data = array(
                    'username' => $email, // You haven't specified a username here, adjust this as needed
                    'password' => $this->generatePassword(6),
                    'Type' => 'Buyer', // Assuming this is the type for buyer login
                    'Type_ID_prfile' => '', // Assuming this should be left empty for now
                    'Duration' => $duration, // Assuming this should be left empty for now
                    'Status' => '1' // Assuming the initial status should be 'Active'
                );

                $this->db->insert('Merket_place_Login', $login_data);

                // Get the last inserted ID from 'merket_place_login' table
                $event_id = $this->db->insert_id();

                // Insert data into 'merket_place_buyer_event_map' table
                $event_map_data = array(
                    'Buyer_ID' => $buyer_id,
                    'Evet_ID' => 27, // Assuming EventID is always 1
                    'Attand_or_not' => '1',
                );

                $this->db->insert('Merket_place_Buyer_event_map', $event_map_data);
            }
        }

        // Redirect or show success message
    } else {
        // Handle error if file is not uploaded
    }
}



    private function generatePassword($length = 6) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
    
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $password;
    }
    
    
    public function Update_subcription(){
        $Email = $this->input->post('email');
        $Plan = $this->input->post('plan');
        $price = $this->input->post('price');
        $Payment_method = $this->input->post('Payment_method');
        $extand = $this->input->post('extand');
        $this->load->model('Meeting_model/Buyer_model');
        $result = $this->Buyer_model->Merket_place_Plan($Email, $Plan, $price,$Payment_method,$extand);
        
        if ($result) {
            // Return success response
            echo json_encode(array('success' => true));
        } else {
            // Return error response
            echo json_encode(array('success' => false));
        }
    }

}