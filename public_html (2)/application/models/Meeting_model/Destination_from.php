<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination_from extends CI_Model {

     public function insert_destination($data) {
        // Check if data is provided
        if (empty($data)) {
            return false; // Return false if data is empty
        }

        $success = $this->db->insert('Market_Place_Destination', $data);
        if (!$success) {
            $error_message = $this->db->error()['message'];
            log_message('error', 'Failed to insert destination: ' . $error_message);
            return false;
        }

        $inserted_id = $this->db->insert_id();

        $new_entry = $this->get_destination_by_id($inserted_id);
        
        return $new_entry;
    }

    public function delete_destination($id) {
    $this->db->where('id', $id);
    $success = $this->db->delete('Market_Place_Destination');

    if (!$success) {
        $error_message = $this->db->error()['message'];
        log_message('error', 'Failed to delete destination: ' . $error_message);
        return false;
    }
    return true;
}
    public function get_destination_by_id($id) {
        $query = $this->db->get_where('Market_Place_Destination', ['id' => $id]);
        return $query->row_array();
    }
    
     public function insert_AirLine_Map_place($mapData){
        $query = $this->db->insert_batch('Market_place_Air_lines_Map', $mapData);
        return $query;
    }
    public function Get_Destination(){
        $query = $this->db->get('Market_Place_Destination');
        return $query->result();
    }
  
    public function insertVisitorAttractions($data)
    {
        if (!empty($data)) {
            $inserted = $this->db->insert_batch('Market_Place_Visitor_Attractions', $data);
            return $inserted;
        }
        return false;
    }
    
     public function insertFood($data)
    {
        if (!empty($data)) {
            $inserted = $this->db->insert_batch('Market_place_Food', $data);
            return $inserted;
        }
        return false;
    }
    
    public function Get_VisitorAttraction(){
        $query = $this->db->get('Market_Place_Visitor_Attractions');
        return $query->result();
        
    }
    public function Get_The_Place_Name($id){
        $this->db->select('Place');
        $this->db->where('id',$id);
        $query = $this->db->get('Market_Place_Destination');
        return $query->row('Place');
    }
    public function delete_Visitor_Attraction($id){
         $this->db->where('id',$id);
         if($this->db->delete('Market_Place_Visitor_Attractions')){
             echo 1;
         }
         else{
             echo 0;
         }
    }
    
    public function delete_Food($id){
         $this->db->where('id',$id);
         if($this->db->delete('Market_place_Food')){
             echo 1;
         }
         else{
             echo 0;
         }
    }
    
    
    
     public function delete_Air_lines($id) {
        $this->db->where('id', $id);
        return $this->db->delete('Market_place_Air_lines');
    }
    
      public function update_Visitor_Attraction($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('Market_Place_Visitor_Attractions', $data);
    }
    
    
      public function Update_Air_Lines($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('Market_place_Air_lines', $data);
    }
    
      public function update_Food($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('Market_place_Food', $data);
    }
    
    
    public function Get_Food(){
        
        $query = $this->db->get('Market_place_Food');
        return $query->result();
    }
    
    public function Get_Air_Connectivity(){
        $query = $this->db->get('Market_place_Air_lines');
        return $query->result();
    }
    
     public function insert_airline($airline, $url, $image) {
        // Insert data into the Market_place_Air_lines table
        $data = array(
            'Air_Lines' => $airline,
            'Url' => $url,
            'image' => $image
        );
        $this->db->insert('Market_place_Air_lines', $data);
        
        // Return the ID of the inserted row
        return $this->db->insert_id();
    }
    
     public function save_airline($airline, $url, $image_path) {
        $data = array(
            'Air_Lines' => $airline,
            'Url' => $url,
            'image' => $image_path
        );
        // Insert data into database table
        $this->db->insert('Market_place_Air_lines', $data);
        return $this->db->insert_id();
    }
    
    public function ID_entry($id){
        $this->db->where('id', $id);
        $query = $this->db->get('Market_place_Air_lines');
        return $query->row();
    }
    
    public function Get_AirLine(){
        $query = $this->db->get('Market_place_Air_lines');
        return $query->result();
    }
    
    
    public function insert_AirLine_Map($data){
          $this->db->insert('Market_place_Air_lines', $data);
        return $this->db->insert_id();
    
    }
    
    public function Get_Places(){
        $query = $this->db->get('Market_Place_Destination');
        return $query->result();
    }
    
}
