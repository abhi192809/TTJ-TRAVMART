<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_model extends CI_Model {
    
    public function View_Event(){
         $this->db->order_by('EventID', 'DESC'); // Assuming 'EventID' is the column you want to use for ordering
    return $this->db->get('Market_place_Events')->result();
    }
    
    public function View_Login_seller_Meeing($sellerID){
     $this->db->order_by('EventID', 'DESC'); // Assuming 'EventID' is the column you want to use for ordering
    return $this->db->get('Market_place_Events')->row();
    }
    
      public function insertSeller($sellerData)
    {
        // Insert seller data into the database
        $this->db->insert('Merket_place_Sellers', $sellerData);

        // Return the inserted seller ID
        return $this->db->insert_id();
    }
    
    public function AprovalSeller($sellerData){
     $this->db->insert('Merket_place_Sellers_pending', $sellerData);

        // Return the inserted seller ID
        return $this->db->insert_id();
        
    }
    
      public function UpdateSeller($sellerData)
    {
        // Insert seller data into the database
        $this->db->insert('Merket_place_Sellers', $sellerData);

        // Return the inserted seller ID
        return $this->db->insert_id();
    }
       public function insertSellerEventMap($mapData)
    {
        $this->db->insert('Merket_place_seller_event_map', $mapData);
        return $this->db->insert_id(); // Return the inserted map ID if needed
    }
    public function SellerIDPasword($ID_Password){

        $this->db->insert('Merket_place_Login',$ID_Password);
        
    }
    public function View_Seller(){
        
        $this->db->order_by('SellerID', 'DESC'); // Assuming 'EventID' is the column you want to use for ordering
        return $this->db->get('Merket_place_Sellers')->result();
  
    }
    
    public function Seller_User_id_password($User_name){
    
        $this->db->Where('username',$User_name); // Assuming 'EventID' is the column you want to use for ordering
        return $this->db->get('Merket_place_Login')->row();
      
    }
   
   public function insertAmounts($amountData){
        $this->db->insert('Merket_place_seller_Amounts', $amountData);

        // You can optionally return the insert ID if needed
        return $this->db->insert_id();
   }
    
     public function update_seller_password($user_name, $new_password) {
          $this->db->set('password', $new_password);
    $this->db->where('username', $user_name);
    return $this->db->update('Merket_place_Login');
    }
    
    
   public function Seller_Entry_get($md5_hash){
        $this->db->Where('SellerID',$md5_hash); // Assuming 'EventID' is the column you want to use for ordering
         return $this->db->get('Merket_place_Sellers')->result();
   }
     
     public function updateSellerentry($sellerId, $data) {
        // Assuming you have a 'sellers' table in your database
        $this->db->where('SellerID', $sellerId);
        $this->db->update('Merket_place_Sellers', $data);

        return $this->db->affected_rows();  // Return the number of affected rows
    }
     public function getSellerDetails($sellerId) {
        $this->db->where('SellerID', $sellerId);
        return $this->db->get('Merket_place_Sellers')->row();
    }
    
    public function Seller_pending_data(){
        return $this->db->get('Merket_place_Sellers_pending')->result();
    }
 public function get_Seller_pending_data($seller_id) {
    $this->db->where('SellerID', $seller_id);
    $query = $this->db->get('Merket_place_Sellers_pending');

    if ($query->num_rows() > 0) {
        return $query->row(); // Return seller data as an object
    } else {
        return array(); // Return an empty array if no data found
    }        
}

    public function Seller_pending($sellerID){
    return $this->db->select("`ReferrerPerson`, `SellerName`, `CompanyName`, `PhoneNumber`, `SellerEmail`, `PhysicalAddress`, `City`, `Country`, `PinCode`, `Website`, `PanNumber`, `GstNumber`, `Logo`, `Certifications`, `YearsInOperation`, `IndustryExperience`, `AnnualTurnover`, `EmergencyContacts`, `Category`, `Created_by`")
                    ->where('SellerID', $sellerID)
                    ->get('Merket_place_Sellers_pending')
                    ->row_array();
    }


    public function Seller_Active($panding_Data) {
      $this->db->insert('Merket_place_Sellers', $panding_Data);
        return $this->db->insert_id();
    }
    public function Seller_Number() {
        $query = $this->db->get('Merket_place_Sellers');
        return $query->num_rows();
    }
    
    public function Seller_pending_delete($sellerID) {
        $this->db->where('SellerID', $sellerID)
                 ->delete('Merket_place_Sellers_pending');
    }

    public function Seller_Amount_Add($Seller_Active,$paymentAmount){
            $this->db->where('SellerID', $sellerID)
                 ->delete('Merket_place_Sellers_pending');
    }
    
    public function View_marketing_Staff_Data() {
    $this->db->where('department', 'Staff-Markating'); // Assuming it's 'Staff-Marketing' with a typo corrected
    $query = $this->db->get('Merket_place_employees');
    return $query->result();
    }
    
    public function View_marketing_Staff_Data_fixed($data) {
    $this->db->where('department', 'Staff-Markating');
    $this->db->where('id', $data); 
    $query = $this->db->get('Merket_place_employees');
    return $query->result();
    }
    
    public function View_marketing_Staff_Data_fixeds($data) {

    $this->db->where('id', $data); 
    $query = $this->db->get('Merket_place_employees');
    return $query->row();
    }
    
    
    public function Employ_Name_get(){
    $query = $this->db->get('Merket_place_employees');
    return $query->result();
        
    }
    
   public function Active_View_Event(){
        $this->db->from('Market_place_Events');
        $this->db->where('EventStartDate >= CURDATE()');
        $this->db->order_by('EventStartDate', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    
    public function Get_Seller_Map_Data($data){
           
           $this->db->where('event_id', $data); // Assuming it's 'Staff-Marketing' with a typo corrected
           $query = $this->db->get('Merket_place_seller_event_map');
           return $query->result();
 
    }
       
    public function varity_persion($id, $data_varify){
        $this->db->where('map_id', $id);
        if ($this->db->update('Merket_place_seller_event_map', $data_varify)) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }
    
    public function Merket_place_Sellers_pendings($id){
        $this->db->where('SellerID',$id); // Assuming 'EventID' is the column you want to use for ordering
          $query = $this->db->get('Merket_place_Sellers_pending');
         
           return $query->row();
  
   }
     
    public function Approved_Delete_Seller($D){
        $this->db->where($D);
        $this->db->delete('Merket_place_Sellers_pending');
    }
    
    public function Update_Amount($Amount,$inputId){
        $this->db->where('id',$inputId);
        $this->db->update('Merket_place_seller_Amounts',$Amount);
    }
    
    
    
    public function getBuyerByEmailAndCompany($email, $companyName) {
        // Query to check if a buyer with the given email and company name exists
        $this->db->where('SellerEmail', $email);
        $this->db->where('CompanyName', $companyName);
        $query = $this->db->get('Merket_place_Sellers');

        if ($query->num_rows() > 0) {
            // If a buyer exists, return the row
            return $query->row();
        } else {
            // If no buyer exists, return null
            return null;
        }
    }
    
        
    public function get_meeting_seller_live_Event($id,$SellerID){
        $this->db->where('SellerID', $SellerID);
        $this->db->where('EventID', $id);
        $this->db->where('Varifed', '1');
        $query = $this->db->get('Market_place_meeting_fixed');

        return $query->num_rows(); // Use num_rows() to get the count of rows
        
    }

  public function Get_the_Event_Name($EventID){
    $this->db->where('EventID', $EventID);
    $query = $this->db->get('Market_place_Events');
    
    // Check if a row with the given EventID exists
    if ($query->num_rows() > 0) {
        // Fetch the first row (assuming EventID is unique)
        $row = $query->row();
        // Return the EventName field of the retrieved row
        return $row->EventName;
    } else {
        // Return a default value or handle the case where the EventID is not found
        return "Event Not Found";
    }
}


public function getSellerByEmail($email) {
    $this->db->where('SellerEmail', $email);
    $query = $this->db->get('Merket_place_Sellers');
    return $query->row();
}

public function getSellerByCompanyName($companyName) {
    $this->db->where('CompanyName', $companyName);
    $query = $this->db->get('Merket_place_Sellers');
    return $query->row();
}


 public function get_Seller_Plan(){
      $this->db->where('Plan','Seller');
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

