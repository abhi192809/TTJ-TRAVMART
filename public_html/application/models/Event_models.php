<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_models extends CI_Model {

    public function Calendar_model() {
        $this->load->database();
        $query = $this->db->get('calendar'); 
        return $query->result_array();
    }
      public function get_Number_of_upcoming_Event(){
        $this->db->where('EventStartDate >', 'NOW()', false);
        $query = $this->db->get('Market_place_Events');
        return $query->result(); // Return the single row
    }
    
    public function make_id_exists($make_id) {
        // Check if the MakeID exists in the table
        $this->db->where('MakeID', $make_id);
        $query = $this->db->get('Market_place_club_TTJ');

        // Return true if the MakeID exists, false otherwise
        return $query->num_rows() > 0;
    }
    
     public function insert_data($data) {
        if ($this->db->insert('Market_place_club_TTJ', $data)) {
            return $data['MakeID']; 
        } else {
            return false; 
        }
    }
}