<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meeting_Details extends CI_Controller
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
    
    
    public function filter($eventID)
    {
        $this->load->model('Meeting_model/Booking_model');
        
        $this->load->model('Meeting_model/Seller_model');
        
        $data['Event'] =  $this->Booking_model->EventFilter($eventID);
       
       
        $data['Buyer'] =  $this->Booking_model->getBuyerCount($eventID);
        
        $data['Seller'] =  $this->Booking_model->getSellerCount($eventID);
        
        $data['Meeting_count'] = $this->Booking_model->getMeetingCount($eventID);
        
      
       $data['Meeting_Fixed'] = $this->Booking_model->meeting_related_data($eventID);
       
       $data['All_Seller'] = $this->Booking_model->Seller_Data();
       
        $data['All_Seller_map'] = $this->Booking_model->Seller_Data_map();
       
       $data['EventID'] = $eventID;
       
        
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Meeting_Details',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
 public function downloadArrivedBuyerData($eventID) {
    // Load the Booking_model
    $this->load->model('Meeting_model/Booking_model');

    // Call the model method to get the data of arrived buyers
    $arrivedBuyers = $this->Booking_model->getArrivedBuyersData($eventID);

    // Check if any arrived buyers data is found
    if (!empty($arrivedBuyers)) {
        // You can now use the $arrivedBuyers data to generate and download the file
        // For example, you can convert the data to CSV format and force download it
        $csvData = '';
        foreach ($arrivedBuyers as $buyer) {
            $csvData .= $buyer->id . ',' . $buyer->logo . ',' . $buyer->name . ',' . $buyer->designation . ',' . $buyer->your_company_name . ',' . $buyer->nature_of_business . ',' . $buyer->business_category . ',' . $buyer->company_address . ',' . $buyer->annual_turnover . ',' . $buyer->year_commencement . ',' . $buyer->destinations . ',' . $buyer->trade_associations . ',' . $buyer->Country . ',' . $buyer->city . ',' . $buyer->pin_code . ',' . $buyer->email . ',' . $buyer->mobile_number . ',' . $buyer->table_name . ',' . $buyer->created_at . "\n";
        }

        // Set the file name
        $filename = 'arrived_buyers_data.csv';

        // Force download the file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo $csvData;
        exit;
    } else {
        // Handle the case where no arrived buyers data is found
        echo "No arrived buyers data found for the event.";
    }
}


}
