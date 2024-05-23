<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer_model extends CI_Model {

      public function insert_buyer($data) {
        // Insert data into the database
        $this->db->insert('Market_place_Buyer', $data);

        // Return the ID of the inserted row
        return $this->db->insert_id();
    }
    
    
    public function Buyer_Number() {
        $query = $this->db->get('Market_place_Buyer');
        return $query->num_rows();
    }
    
    public function Market_place_meeting_fixed(){
         $query = $this->db->get('Market_place_meeting_fixed');
        return $query->num_rows();
    }
    
    public function Market_place_meeting_fixeds(){
        $this->db->where('Varifed','1');
        
         $query = $this->db->get('Market_place_meeting_fixed');
        return $query->num_rows();
    }


    public function Market_place_Buyer_Request(){
         $query = $this->db->get('Merket_place_Buyer_Request');
        return $query->num_rows();
    }
    
    public function Meeting_Seller_Request(){
         $query = $this->db->get('Merket_place_Sellers_pending');
        return $query->num_rows();
    }
    
    public function Event_detels(){
        $this->db->select('EventID, EventName, EventPlace, EventStartDate, EventEndDate, Location, EventImage, Phone_Number, Email, Description, Status');
        $this->db->from('Market_place_Events');
        $this->db->where('EventStartDate > NOW()');
        $this->db->order_by('EventStartDate', 'ASC');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    
    public function All_Event(){
        $query = $this->db->get('Market_place_Events');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    public function map_buyer_entry($buyer_id,$EventID){
        $data=[
            'Buyer_ID'=>$buyer_id,
            'Evet_ID'=>$EventID
            ];
            
        $this->db->insert(' Merket_place_Buyer_Request',$data);
    }
    
    
    public function map_buyer_entry_Market_place($buyer_id,$Market_Place){
        $data=[
            'Buyer_ID'=>$buyer_id,
            'Market_Place'=>$Market_Place,
            'Evet_ID' => '00',
            ];
        $this->db->insert(' Merket_place_Buyer_Request',$data);
    }
    
    
  public function get_Event_detels(){
    $this->db->select('*');
    $this->db->from('Merket_place_Buyer_Request');
    $this->db->join('Market_place_Buyer', 'Merket_place_Buyer_Request.Buyer_ID = Market_place_Buyer.id');
    $this->db->join('Market_place_Events', 'Merket_place_Buyer_Request.Evet_ID = Market_place_Events.EventID');
    $query = $this->db->get();
    return $query->result();
}

public function get_Event_details_map(){
    $this->db->select('*');
     $this->db->from('Merket_place_Buyer_Request');
    $this->db->join('Market_place_Buyer', 'Merket_place_Buyer_Request.Buyer_ID = Market_place_Buyer.id');
  
    $this->db->where('Merket_place_Buyer_Request.Market_Place', 'Market_Place');
    $query = $this->db->get();
    return $query->result();
    print_r($query->result());
}

  public function Get_Buyer_data($id){
      $this->db->where('id',$id);
     $query = $this->db->get('Market_place_Buyer'); 
     return $query->result();
  }

  public function delete_buyer_entry($BuyerId, $EventId) {
    $this->db->where(array('Buyer_ID' => $BuyerId, 'Evet_ID' => $EventId));
    $this->db->delete('Merket_place_Buyer_Request');
    
    // Return true if deletion is successful, else return false
    return true; // Replace with your actual deletion logic
}
public function approve_buyer_entry($BuyerId, $EventId){
    // Assuming 'Buyer_ID' and 'Evet_ID' are columns in your 'Merket_place_Buyer_event_map' table
    $data = array(
        'Buyer_ID' => $BuyerId,
        'Evet_ID' => $EventId
    );

    // Use the 'insert' method with the data array
    $this->db->insert('Merket_place_Buyer_event_map', $data);
}

public function Active_Event_detels_id_name() {
    $this->db->select('EventID, EventName,EventStartDate');
    $this->db->where('EventStartDate >=', date('Y-m-d'), false);
    $this->db->order_by('ABS(DATEDIFF(Market_place_Events.EventStartDate, NOW())) ASC');
    $this->db->limit(1);  // Add limit to get only the first entry

    $query = $this->db->get('Market_place_Events');

    return $query->row();  // Use row() to get only the first row
}


public function All_Event_detels_id_name() {
    
    $query = $this->db->get('Market_place_Events');

    return $query->result();  // Use row() to get only the first row
}

    
    public function Active_Event_detels_id_name_old() {
    $this->db->select('EventID, EventName,EventStartDate');
    $this->db->where('EventStartDate <', date('Y-m-d'), false);
    $this->db->order_by('ABS(DATEDIFF(Market_place_Events.EventStartDate, NOW())) ASC');
    $this->db->limit(1);  // Add limit to get only the first entry

    $query = $this->db->get('Market_place_Events');

    return $query->row();  // Use row() to get only the first row
}
    
    
    
    public function Event_map_persion_buyer($data){
     
    $this->db->select('*');
    $this->db->where('Evet_ID',$data);
    $this->db->order_by('Map_ID','DESC');

    $query = $this->db->get('Merket_place_Buyer_event_map');

    return $query->result();  // Use row() to get only the first row
        
    }
    
    
       public function Event_map_persion_Seller($data){
     
    $this->db->select('*');
    $this->db->where('event_id',$data);
    $this->db->order_by('Map_ID','DESC');

    $query = $this->db->get(' Merket_place_seller_event_map');

    return $query->result();  // Use row() to get only the first row
        
    }
    
    
    
    
    
    public function ALL_Event_map_persion_buyer(){
     
   
    $query = $this->db->get('Merket_place_Buyer_event_map');

    return $query->result();  // Use row() to get only the first row
        
    }
    
    
 
    
    public function Buyer_User_Data(){
    
    $query = $this->db->get('Market_place_Buyer');
    
    return $query->result(); 
    
    }
    
    
    
    public function Seller_User_Data(){
    
    $query = $this->db->get('Merket_place_Sellers');
    
    return $query->result(); 
    
    }
    
    
    
    
    
    
    public function Buyer_filter_data($Buyer_ID){
     $this->db->distinct();
    $this->db->where('id',$Buyer_ID);
    
    $query = $this->db->get('Market_place_Buyer');
    
    return $query->result(); 
        
    }


    public function Buyer_data_all(){
   
    $query = $this->db->get('Market_place_Buyer');
    
    return $query->result(); 
        
    }
    
    public function getDistinctCities() {
    $this->db->select('city');
    $this->db->distinct();
    $this->db->from('Market_place_Buyer');
    
    $query = $this->db->get();

    return $query->result();
    }
    
    
    public function getDistinct_business_category() {
    $this->db->select('business_category');
    $this->db->distinct();
    $this->db->from('Market_place_Buyer');
    
    $query = $this->db->get();

    return $query->result();
    
        
    }

    public function Buyer_Login_Password($BuyerName,$Password,$tipe,$date){
        $data=[
             'username'=>$BuyerName,
             'password'=>$Password,
             'Type'=>$tipe,
             'Duration'=>$date
            ];
            
         $q1= $this->db->insert('Merket_place_Login',$data);
         if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
        

    public function get_Buyer_profile(){
        $user_id = $this->session->userdata('user_id');
        $this->db->where('id',$user_id);
        $query = $this->db->get('Market_place_Buyer');
        return $query->row();
       
   } 
   
   public function updateBuyerentry($BuyerId, $data){
       $this->db->where('id',$BuyerId);
       if($this->db->update('Market_place_Buyer',$data)){
                return true;
        } else {
            return false;
        }
   }
   
   public function get_the_id_password($email){
       $this->db->where('User_name',$email);
       $userid = $this->db->get('Attendance_login');
       return $userid->result();
   }
   
public function varity_persion($id, $data_varify){
    $this->db->where('Map_ID', $id);
    if ($this->db->update('Merket_place_Buyer_event_map', $data_varify)) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}

 public function Get_Meeting_done_Event($id) {
        $this->db->where('EventID', $id);
        $query = $this->db->get('Market_place_meeting_fixed');

        if ($query !== false) {
            return $query->num_rows(); // Use num_rows() to get the count of rows
        } else {
            return false; // Return false if query fails
        }
    }
    
     public function Get_Meeting_done_Events($id,$Buyer) {
      
      
        $this->db->where('EventID', $id);
        
        $this->db->where('BuyerID', $Buyer);
    
        $query = $this->db->get('Market_place_meeting_fixed');

        if ($query !== false) {
            return $query->num_rows(); // Use num_rows() to get the count of rows
        } else {
            return false; // Return false if query fails
        }
    }
    
    public function Get_Verifed_Meeting_Event($id ,$Buyer){
        
        $this->db->where('EventID', $id);
        
        $this->db->where('BuyerID', $Buyer);
    
        $this->db->where('Varifed', '1');
        $query = $this->db->get('Market_place_meeting_fixed');

        if ($query !== false) {
            return $query->num_rows(); // Use num_rows() to get the count of rows
        } else {
            return false; // Return false if query fails
        }
    
    }
    
    // public function getBuyerByEmailAndCompany($email, $companyName) {
    //     // Query to check if a buyer with the given email and company name exists
    //     $this->db->where('email', $email);
    //     $this->db->where('your_company_name', $companyName);
    //     $query = $this->db->get('Market_place_Buyer');

    //     if ($query->num_rows() > 0) {
    //         // If a buyer exists, return the row
    //         return $query->row();
    //     } else {
    //         // If no buyer exists, return null
    //         return null;
    //     }
    // }
    
      public function getBuyerByEmail($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('Market_place_Buyer');

        return $query->row();
    }

    public function getBuyerByCompanyName($companyName) {
        $this->db->where('your_company_name', $companyName);
        $query = $this->db->get('Market_place_Buyer');

        return $query->row();
    }
    
    public function get_meeting_buyer_live_Event($id,$BuyerID){
        $this->db->where('BuyerID', $BuyerID);
        $this->db->where('EventID', $id);
        $query = $this->db->get('Market_place_meeting_fixed');

        if ($query !== false) {
            return $query->num_rows(); // Use num_rows() to get the count of rows
        } else {
            return false; // Return false if query fails
        }
    }


    public function remove_buyer($id, $email) {
        // Delete record from 'market_place_buyer' table
        $this->db->where('id', $id);
        $this->db->delete('Market_place_Buyer');

        // Delete record from 'merket_place_login' table
        $this->db->where('username', $email);
        $this->db->delete('Merket_place_Login');
    }
    
    
    public function get_Buyer_Plan(){
      $this->db->where('Plan','Buyer');
      $userid = $this->db->get('Merket_place_Plan');
      return $userid->result();
  }
  
 public function Merket_place_Plan($Email, $Plan, $price, $Payment_method, $exred){
    // Retrieve current duration
    $this->db->where('username', $Email);
    $this->db->select('Duration');
    $query = $this->db->get('Merket_place_Login');
    $result = $query->row();

    if ($result) {
        $currentDuration = $result->Duration;

        // Convert current duration to DateTime object
        $currentDateTime = new DateTime($currentDuration);

        // Increment months by $exred
        $currentDateTime->add(new DateInterval("P{$exred}M"));

        // Get the new duration
        $newDuration = $currentDateTime->format('Y-m-d');

        // Update latest date with the new duration in Market_place_Subscription table
        $subscriptionData = [
            'Subscription_Plan' => $Plan, 
            'User_Email' => $Email,
            'Amount' => $price,
            'Payment_method' => $Payment_method,
        ];

        $this->db->insert('Market_place_Subscription', $subscriptionData);

        // Update Duration column in Merket_place_Login table
        $loginData = [
            'Duration' => $newDuration // Update with the new duration
        ];

        $this->db->where('username', $Email);
        $this->db->update('Merket_place_Login', $loginData);

        // Return the new duration for further processing if needed
        return $newDuration;
    } else {
        return false; // Unable to retrieve current duration
    }
}




}
