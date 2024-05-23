<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {
    
    public function View_Event(){
        $this->db->order_by('EventID', 'ASC'); // Assuming 'EventID' is the column you want to use for ordering
    return $this->db->get('Market_place_Events')->result();
    }
    
    public function View_Event_where() {
    $this->db->order_by('EventID', 'ASC');
    $this->db->where('EventStartDate >', date('Y-m-d')); // Assuming 'EventStartDate' is the column name
    return $this->db->get('Market_place_Events')->num_rows();
}

       
     public function View_Active_Event_data() {
        $this->db->order_by('EventStartDate', 'ASC');
        $this->db->limit(1); // Limit the result to only one row
          $this->db->distinct();
        return $this->db->get('Market_place_Events')->row();
    }
    
    public function CreatEvent($eventData, $imagePath) {
        $data = array(
            'EventName' => $eventData['Event_Name'],
            'EventPlace' => $eventData['Event_Place'],
            'EventStartDate' => $eventData['Event_Start_Date'],
            'EventEndDate' => $eventData['Event_End_Date'],
            'Location' => $eventData['Location'],
            'EventImage' => $imagePath,
            'Phone_Number' => $eventData['Phone_Number'],
            'Email' => $eventData['Email'],
            'Description' => $eventData['Description'],
            'Country' =>$eventData['Country'],
        );
        $this->db->insert('Market_place_Events', $data);
    }
    
    public function Event_Request($data){
        
        $this->db->insert('Marketplace_Events_request',$data);
    }
    public function View_Event_show_of_the_seller($already_map){
    if($already_map != NULL){
    $this->db->where('EventID <>', $already_map);
    $query = $this->db->get(' Market_place_Events');

    // Return the result as an array
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array();
    }
    }
    }
 
    public function View_Event_show_Event_seller_aproval($already_map){
       
    $this->db->where('EventID ', $already_map);
    
    $query = $this->db->get(' Market_place_Events');

    // Return the result as an array
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array();
    }
    
    }
    
    public function View_Event_show_the_seller_Panding_Event(){
        
    $query = $this->db->get('Marketplace_Events_request');

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array();
    }
    }
    
  public function Seller_ragister_for_already_Approved($User_id){
    $this->db->select('*');
    $this->db->from('Merket_place_seller_event_map mpe');
    $this->db->join('Market_place_Events e', 'mpe.event_ID = e.EventID');
    $this->db->where('mpe.seller_id', $User_id);
    $this->db->order_by('mpe.map_id', 'DESC');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return 1;
    }
    }
    
     public function Seller_ragister_for_Event($User_id) {
    $this->db->select('mpe.EventID, mpe.EventPlace, mpe.EventStartDate, mpe.EventEndDate, mpe.Location ,mpe.EventImage ');
    $this->db->from('Market_place_Events mpe');
    $this->db->join('Merket_place_Sellers ms', 'ms.SellerID = '.$User_id, 'LEFT');
    $this->db->join('Marketplace_Events_request mer', 'mpe.EventID = mer.EventID', 'LEFT');
    $this->db->where('ms.SellerID', $User_id);

    // Subquery to exclude entries where both seller and event names are available
    $subquery = '(SELECT 1 
                  FROM Merket_place_seller_event_map map
                  WHERE map.seller_id = '.$User_id.' AND map.event_id = mpe.EventID
                  LIMIT 1) IS NULL';

    $this->db->where($subquery, NULL, FALSE);

    $query = $this->db->get();

    return $query->result();
} 
    public function Seller_ragister_Request($User_id){
    $this->db->order_by('EventID', 'DESC'); 
    $query = $this->db->get('Market_place_Events');
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    }

    public function isEventRequested($eventId) {
        // Assuming you have a table named Marketplace_Events_request
        $this->db->select('Event_Request_ID');
        $this->db->where('EventID', $eventId);
        $query = $this->db->get('Marketplace_Events_request');

        if ($query->num_rows() > 0) {
        return $query->result();
       }
    }

    // Other methods of your Event_model...

   public function Event_Chack_Request($date){
    $this->db->where('Buyer_ID', $date); // Corrected from $data to $date
    $query = $this->db->get('Merket_place_Buyer_Request');
    return $query->result();
   }
   public function Event_Approved_Buyer($date){
    $this->db->where('Buyer_ID', $date); // Corrected from $data to $date
    $query = $this->db->get('Merket_place_Buyer_event_map');
    return $query->result();
   }
   
  public function Event_Approval($data){
    return $this->db->insert('Merket_place_Buyer_Request', $data);
  }
  
  public function See_Only_Approved_Event($BuyerID){
     
    $this->db->where('Buyer_ID',$BuyerID); // Corrected from $data to $date
    $query = $this->db->get('Merket_place_Buyer_event_map');
    return $query->result();
      
  }
   
  public function Event_Get($event_id){
      
    $this->db->where('EventID',$event_id); // Corrected from $data to $date
    $query = $this->db->get('Market_place_Events');
    return $query->result();
      
  }

public function Event_ID_Buyer_ID($EventID, $BuyerID){
    $this->db->where('EventID', $EventID);
    $this->db->where('BuyerID', $BuyerID);
    $query = $this->db->get('Market_place_meeting_fixed');
    return $query->num_rows(); // Corrected from num_row() to num_rows()
}

public function getSellerCount($eventID)
    {
        $this->db->where('event_id', $eventID);
        $this->db->from('Merket_place_seller_event_map');
        return $this->db->count_all_results();
    }

    public function getBuyerCount($eventID)
    {
        $this->db->where('Evet_ID', $eventID);
        $this->db->from('Merket_place_Buyer_event_map');
        return $this->db->count_all_results();
    }

    public function getMeetingCount($eventID)
    {
        $this->db->where('EventID', $eventID);
        $this->db->from('Market_place_meeting_fixed');
        return $this->db->count_all_results();
    }
    
    public function get_Number_of_buyer_Event_book($BuyerID){
      $this->db->where('Buyer_ID', $BuyerID);
     $query =    $this->db->get('Merket_place_Buyer_event_map');
       if($query->num_rows() > 0){
          return $query->num_rows(); 
       }
       else{
            return 0;
       }
    }
    
    public function get_Number_of_seller_Event_book($SellerID){
      $this->db->where('seller_id', $SellerID);
     $query =    $this->db->get('Merket_place_seller_event_map');
       return $query->num_rows();
    }
    
    public function get_Meeting_buyer($EventID){
      $this->db->where('BuyerID', $this->session->userdata('user_id'));
      $this->db->where('EventID', $EventID);
     $query =    $this->db->get('Market_place_meeting_fixed');
       return $query->num_rows();
        
    }
    
        public function Get_the_meeting($SellerID){
      $this->db->where('SellerID', $SellerID);
     $query =    $this->db->get('Market_place_meeting_fixed');
       return $query->num_rows();
    }
    
    
    
        public function Lead_making($SellerID){
      $this->db->where('seller_ID', $SellerID);
     $query =    $this->db->get('Merket_Place_lead_form_data');
       return $query->num_rows();
    }
    
    public function get_Number_of_Event_book(){
     $query =    $this->db->get('Market_place_Events');
       return $query->num_rows();
        
    }
  
    
    public function get_Number_buyer_Event_book_Meeting($BuyerID){
      $this->db->where('BuyerID', $BuyerID);
     $query =    $this->db->get('Market_place_meeting_fixed');
       return $query->num_rows();
        
    }
    
  public function get_Number_of_upcoming_Event() {
    $current_date = date('Y-m-d'); 
    $this->db->where('EventStartDate >=', $current_date);
    $this->db->limit(1); 
    $query = $this->db->get('Market_place_Events');
    return $query->result(); 
}


    public function Meeting_scheduling($EventID,$BuyerID){
       $this->db->where('EventID', $EventID);
       $this->db->where('BuyerID', $BuyerID);
       $query =  $this->db->get('Market_place_meeting_fixed');
       return $query->result();
           
    } 
    
    public function get_Meeting($SellerID, $EventID){
       $this->db->where('EventID', $EventID);
       $this->db->where('SellerID', $SellerID);
       $query =  $this->db->get('Market_place_meeting_fixed');
         return $query->num_rows();
    }
    public function Lead($BuyerID){
     $this->db->where('buyer_ID', $BuyerID);
     $query =  $this->db->get('Merket_Place_lead_form_data');
     return $query->num_rows();
    }
 
    public function verifyMeeting($meetingFixedID,$feedback) {
        $currentTimeIST = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $currentTimeISTFormatted = $currentTimeIST->format('h:i:s A');
    
        $data = array(
            'Meeting_End' => $currentTimeISTFormatted,
            'Varifed' => 1,
            'feedback' => $feedback
        );
    
        $this->db->where('Meeting_Fixed_ID', $meetingFixedID);
        $this->db->update('Market_place_meeting_fixed', $data);
    
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false;
        }
    }
    
     public function getUserByEmail($email) {
        // Query the database to retrieve user information based on email
        $this->db->select('*');
        $this->db->from('Merket_place_Login');
        $this->db->where('username', $email);
        $query = $this->db->get();
        
        // Check if a user with the given email exists
        if ($query->num_rows() > 0) {
            return $query->row(); // Return user object
        } else {
            return false; // User not found
        }
    }
    
  public function insertMeeting($buyerID, $userID, $feedback, $indianTime, $indianDate, $EventID) {
    $data = array(
        'BuyerID' => $buyerID,
        'SellerID' => $userID,
        'Feedback' => $feedback,
        'Meeting_End' => $indianTime,
        'Date' => $indianDate, // Corrected variable name
        'Varifed' => '1',
        'EventID' => $EventID
    );

    $this->db->insert('Market_place_meeting_fixed', $data);

    return $this->db->affected_rows() > 0; // Return true if insertion was successful
}

public function Edit_EventID($dataid, $data) {
    $this->db->where('EventID', $dataid);
    $query = $this->db->update('Market_place_Events', $data);
    return $this->db->affected_rows() > 0;
}

public function get_the_buyer_Email($buyerID){
    $this->db->where('id',$buyerID);
    $query = $this->db->get('Market_place_Buyer');
    return $query->row('email'); 
}


public function getEventById($eventId) {
        $this->db->select('*');
        $this->db->from('Market_place_Events'); // Assuming your events table is named 'events'
        $this->db->where('EventID', $eventId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }


}
