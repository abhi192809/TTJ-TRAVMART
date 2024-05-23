<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meeting extends CI_Controller
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
         if($user_type == 'Seller'){
             
         }
         else{
            redirect('Meeting/login');
             
         }
    }

    public function Meeting_already_ragister(){
        $this->load->model('Meeting_model/Booking_model');
        $this->load->model('Meeting_model/Seller_model');
        $sellerID = $this->session->userdata('user_id');
        // Event ID
        $data['Buyer'] = $this->Booking_model->Buyer_Comming_Event();
        
        // $BuyerID
        $data['Buyer_map_Event'] = $this->Booking_model->get_the_map_buyer($data['Buyer']->EventID);
        // Buyer Data
        $data['Buyer_get'] = $this->Booking_model->get_buyer();
         $data['Meeting_fixed'] = $this->Booking_model->meeting_related_data($data['Buyer']->EventID);
      
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/Meeting_already_ragister',$data);
        $this->load->view('Meeting/Seller/footer');
    }

    public function Old_meeting_in_that_seller_ragister(){
        
        $this->load->model('Meeting_model/Seller_model');
        $this->load->model('Meeting_model/Booking_model');
        $data['Get_Map'] = $this->Booking_model->Get_Event_Seller_Data();
   
        $data['Get_Event'] = $this->Seller_model->View_Event();
        
        $this->load->view('Meeting/Seller/header');
        $this->load->view('Meeting/Seller/sidebar');
        $this->load->view('Meeting/Seller/topbar');
        $this->load->view('Meeting/Seller/old_Event',$data);
        $this->load->view('Meeting/Seller/footer');
    }
    
     public function Filer_meeting(){
        
         $this->load->model('Meeting_model/Event_model');
         $this->load->model('Meeting_model/Buyer_model');
         $this->load->model('/Meeting_model/Booking_model');

         $event_id = $this->uri->segment(5);
        
         $data['Get_Event'] = $this->Event_model->Event_Get($event_id);
         
         $data['Get_Map_row'] = $this->Booking_model->Get_Event_Seller_Data_row($event_id);
        
        
         $data['Get_Meeting'] = $this->Booking_model->Get_Event_Seller_Data_map($event_id);
      
         $data['Get_Buyer'] = $this->Buyer_model->Buyer_data_all();
        
        
         $this->load->view('Meeting/Seller/header');
         $this->load->view('Meeting/Seller/sidebar');
         $this->load->view('Meeting/Seller/topbar');
         $this->load->view('Meeting/Seller/Filer_meeting',$data);
         $this->load->view('Meeting/Seller/footer');
    }
    
      public function give_verification() {
        
        $this->load->model('Meeting_model/Event_model');
        
        $meetingFixedID = $this->input->post('meetingFixedID');
        $feedback = $this->input->post('feedback');

        $result = $this->Event_model->verifyMeeting($meetingFixedID,$feedback);

        if ($result) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

public function give_verification_detels() {
    $this->load->model('Meeting_model/Event_model');

    // Set the time zone to Indian Standard Time (IST)
    date_default_timezone_set('Asia/Kolkata');

    // Get the data sent via POST
    $buyerID = $this->input->post('buyerID');
    $userID = $this->input->post('userID');
    $feedback = $this->input->post('feedback');
    $EventID = $this->input->post('EventID'); // Retrieve EventID from POST data

    // Get the current time in Indian Standard Time (IST)
    $indianTime = date('H:i:s A');
    
    // Get the current date in Indian Standard Time (IST) in Y-m-d format
    $indianDate = date('Y-m-d');

    // Call the model method to insert meeting details
    $result = $this->Event_model->insertMeeting($buyerID, $userID, $feedback, $indianTime, $indianDate, $EventID);
    
    // Get buyer's email
    $buyerEmail = $this->Event_model->get_the_buyer_Email($buyerID);

    // Get the session username
    $username = $this->session->userdata('username');

    // Prepare email content
    $subject = 'Feedback Received';
    $message = "Hello,\n\n";
    $message .= "You have received feedback from $username regarding the meeting:\n\n";
    $message .= "Feedback: $feedback\n\n";
    $message .= "Thank you.";

    // Send email to buyer
    $this->send_email($buyerEmail, $subject, $message);

    // Send email to session username (assuming it's an email address)
    $this->send_email($username, $subject, $message);

    // Prepare response
    $response = array('success' => $result);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

private function send_email($recipient, $subject, $message) {
    $this->load->library('email');

    // Email configuration
    $config['mailtype'] = 'text'; // Set email format to plain text
    $this->email->initialize($config);

    $this->email->from('your@example.com', 'Your Name');
    $this->email->to($recipient);
    $this->email->subject($subject);
    $this->email->message($message);

    // Send email
    $this->email->send();
}


    public function Get_Buyer_of_the_Event() {
        $this->load->model('Meeting_model/Booking_model');
    
        // Fetch event ID
        $eventID = $this->Booking_model->Buyer_Comming_Event()->EventID;
    
        // Fetch buyer map event data
        $buyer_map_event = $this->Booking_model->get_the_map_buyer($eventID);
    
        // Fetch all buyers
        $buyer_get = $this->Booking_model->get_buyer();
    
        // Filter buyers based on the condition
        $filtered_buyers = [];
        foreach ($buyer_get as $buyer) {
            foreach ($buyer_map_event as $map_event) {
                if ($buyer->id == $map_event->Buyer_ID) {
                    $filtered_buyers[] = $buyer;
                    break;
                }
            }
        }
    
        // Send the filtered buyers as JSON response
        header('Content-Type: application/json');
        echo json_encode($filtered_buyers);
    }

    
    
}
