<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_model extends CI_Model {
    
    public function get_cities(){
        $this->db->select('country_name');
        $this->db->distinct('country_name');
        $query = $this->db->get("Marketplace_Master_City_Place_Country");
        return $query->result();
    }


    public function get_lead(){
     $this->db->order_by('id', 'DESC');
      $quary =  $this->db->get("Merket_Place_lead_form_data");
      return $quary->result();
        
    }
    
    public function get_seller(){
     $this->db->order_by('SellerID', 'DESC');
      $quary =  $this->db->get("Merket_place_Sellers");
      return $quary->result();
        
    }
     
    
    public function insert_lead_data($data){

    $query = $this->db->insert("Merket_Place_lead_form_data", $data);
       if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
   public function Approved_Entry_give($data) {
    $this->db->where('id', $data['id']);
    $this->db->update('Merket_Place_lead_form_data', $data);
    
    if ($this->db->affected_rows() > 0) {
        return true; // Return true if update was successful
    } else {
        return false; // Return false if update failed
    }
}
   
   public function Master_get_the_country_name(){
     $this->db->select('country_name');
     $this->db->distinct(); 
     $quary =  $this->db->get("Marketplace_Master_City_Place_Country");
     return $quary->result();
   }

   public function Master_get_the_city_name($country){
   
     $this->db->distinct(); 
     $this->db->where('country_name',$country);
     $quary =  $this->db->get("Marketplace_Master_City_Place_Country");
     return $quary->result();
   }
   
    public function Seller_Destination_insert($SellerID, $id){
    $data = array(
        'SellerID' => $SellerID,
        'DestinationID' => $id
    );

    $this->db->insert('Merket_place_Seller_Destination', $data);

    if ($this->db->affected_rows() > 0) {
        return true; 
    } else {
        return false;
    }
    } 
    
  public function Seller_Destination($SellerID){
    $this->db->select('*');
    $this->db->from('Merket_place_Seller_Destination');
    $this->db->join('Marketplace_Master_City_Place_Country', 'Marketplace_Master_City_Place_Country.id = Merket_place_Seller_Destination.DestinationID', 'inner');
    $this->db->where('SellerID',$SellerID);
    $query = $this->db->get();
    return $query->result();
}
public function Remove_Destination_insert($id){
    $this->db->where('id',$id);
    $query = $this->db->delete('Merket_place_Seller_Destination');
    if ($this->db->affected_rows() > 0) {
        return true; // Return true if deletion was successful
    } else {
        return false; // Return false if deletion failed
    }  
}
public function get_city_names($country_name) {
    $this->db->select('city_name');
    $this->db->where('country_name', $country_name);
    $query = $this->db->get('Marketplace_Master_City_Place_Country');
    
    // Check if query is successful
    if ($query) {
        // Return city names
        return $query->result();
    } else {
        // Return FALSE to indicate error
        return FALSE;
    }
}

 
    public function get_city_ID($city_name) {
        $this->db->select('id');
        $this->db->where('city_name',$city_name);
        $query = $this->db->get('Marketplace_Master_City_Place_Country');
        
        // Check if query is successful
        if ($query) {
            // Return city names
             return $query->row()->id;
        } else {
            // Return FALSE to indicate error
            return FALSE;
        }
   }
    public function get_sellers_ID($city_id) {
    
        $this->db->where('DestinationID',$city_id);
        $query = $this->db->get('Merket_place_Seller_Destination');
        return $query->result_array();
    }
    
    
    public function get_Seller_Name($Seller_id){
        $this->db->where('SellerID',$Seller_id);
        $query = $this->db->get('Merket_place_Sellers');
        return $query->result_array();
        
    }
    public function Lead_seller_Comapny_Name(){
        $this->db->select('SellerID,CompanyName');
        $query = $this->db->get('Merket_place_Sellers');
        return $query->result();
        
    }
    
    public function Lead_buyer_Comapny_Name(){
        $this->db->select('id,your_company_name');
        $query = $this->db->get('Market_place_Buyer');
        return $query->result();
        
    }
}
