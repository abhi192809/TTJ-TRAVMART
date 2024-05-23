<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

public function Get_User_data() {
    $this->db->select('ME.*, ML.username, ML.Type,ML.password'); // Fixed the typo in the select clause
    $this->db->from('Merket_place_employees ME');
    $this->db->join('Merket_place_Login ML', 'ME.email = ML.username', 'inner');
    $query = $this->db->get();
    return $query->result();
}

  public function City_Place_Country(){
        $this->db->select('country_name');
        $this->db->distinct('country_name');
        $query = $this->db->get("Marketplace_Master_City_Place_Country");
        return $query->result();
    }
    
    public function search_city($city,$get_country) {
            $this->db->select('country_name,city_name,id');
    
        $this->db->where('country_name',$get_country);
        $this->db->like('city_name', $city);
        $query = $this->db->get('Marketplace_Master_City_Place_Country');
        return $query->result();
         
        
    }
    
    
    public function update_city($id, $updatedCityName) {
        // Your logic to update the city with the provided ID
        // This could be a database update query or any other method you're using
        // Replace this with your actual implementation
        $data = array(
            'city_name' => $updatedCityName
        );
        $this->db->where('id', $id);
        $this->db->update('Marketplace_Master_City_Place_Country', $data);
    }


    public function delete_city($id) {
        $this->db->where('id', $id);
        $this->db->delete('Marketplace_Master_City_Place_Country');
    }

    public function insert_city($country, $city) {
        // Your logic to insert the city into the database
        // This could be a database insert query or any other method you're using
        // Replace this with your actual implementation
        $data = array(
            'country_name' => $country,
            'city_name' => $city
        );
        $this->db->insert('Marketplace_Master_City_Place_Country', $data);
    }
 
   public function get_seller_profile(){
        $user_id = $this->session->userdata('user_id');
        $this->db->where('SellerID',$user_id);
        $query = $this->db->get('Merket_place_Sellers');
        return $query->row();
       
   }
   
   public function Subscription_Process(){
        $query = $this->db->get('Merket_place_Plan');
        return $query->result();
       
   }
   
}
