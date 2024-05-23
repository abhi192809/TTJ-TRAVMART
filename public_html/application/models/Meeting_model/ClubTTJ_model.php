<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClubTTJ_model extends CI_Model {

    public function ClubTTJ_insert() {
        // Fetch data ordered by primary key in descending order
        $this->db->order_by('ID', 'DESC');
        $query = $this->db->get('Market_place_club_TTJ');

        return $query->result(); // Return the result
    }
    
    public function ClubTTJ_Update($data,$id){
        $this->db->where('ID',$id);
        $this->db->update('Market_place_club_TTJ',$data);
    }
    
    public function ClubTTJ_remove($id){
        $this->db->where('ID',$id);
        $this->db->delete('Market_place_club_TTJ');
    }
   
    public function Market_place_ClubTTJ(){
         $query = $this->db->get('Market_place_club_TTJ');
        return $query->num_rows();
      
    }
}
