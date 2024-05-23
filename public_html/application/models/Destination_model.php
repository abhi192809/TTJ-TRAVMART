<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination_model extends CI_Model {

    public function getCountries() {
        return $this->db->get('Market_Place_Country')->result();
    }
    
   public function getPlace($query) {
    $this->db->where('name', $query);
    $this->db->select('id');
    $destination_query = $this->db->get('Market_Place_Destination');
    
    if ($destination_query->num_rows() > 0) {
        $destination_row = $destination_query->row();
        $destination_id = $destination_row->id;
        
        // Query the database to get the place name based on the destination ID
        $this->db->where('id', $destination_id);
        $this->db->select('Place');
        $place_query = $this->db->get('Market_Place_Destination');
        
        // Check if a result is found
        if ($place_query->num_rows() > 0) {
            return $place_query->row()->Place; // Return the place name
        } else {
            return null; // No place found for the given destination ID
        }
    } else {
        return null; // No destination found for the given name
    }
}

    public function searchDestinations($query) {
    $this->db->like('Place', $query); // Search for 'Place' containing the query string
    $query = $this->db->get('Market_Place_Destination'); // Assuming 'Market_Place_Destination' is your table name
    
    return $query->result_array(); // Return an array of results
    }

    public function getPlaces($destination){
    $this->db->where('Place',$destination);
    $destination_query = $this->db->get('Market_Place_Destination');
    return $destination_query->row();
    }
    
    public function Market_Place_Visitor_Attractions($id){
        $this->db->where('Market_Place_Destination_id', $id);
        $destination_query = $this->db->get('Market_Place_Visitor_Attractions');
        
        if ($this->db->affected_rows() > 0) {
            return $destination_query->result();
        } else {
            return null; 
        }
    }
    
   public function Market_place_Air_lines($destination_id) {
        $this->db->select('ma.id, ma.Air_Lines, ma.Url, ma.image, map.Market_Place_Destination, map.Created_At');
        $this->db->from('Market_place_Air_lines_Map map');
        $this->db->join('Market_place_Air_lines ma', 'map.Market_place_Air_line_id = ma.id');
        $this->db->where('map.Market_Place_Destination', $destination_id);
    
        $query = $this->db->get();
        return $query->result();
    }

    public function Market_place_Food($id){
        $this->db->where('Market_Place_Destination_id',$id);
        $destination_query = $this->db->get('Market_place_Food');
        return $destination_query->result();
    }


    public function Market_place_Find_Seller($country,$Place){
        $this->db->select('id');
        $this->db->where('country_name',$country);
        $this->db->where('city_name',$Place);
        $destination_query = $this->db->get('Marketplace_Master_City_Place_Country');
        return $destination_query->row();
    }
    
    public function Market_place_SellerEntry($DestinationID){
        
        $this->db->where('DestinationID',$DestinationID);
        $destination_query = $this->db->get('Merket_place_Seller_Destination');
        return $destination_query->result();
        print_r($destination_query->result());
        
    }
}