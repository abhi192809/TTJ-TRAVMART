<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_model extends CI_Model {

    public function View_Event_where() {
    $this->db->order_by('EventID', 'ASC');
    $this->db->where('EventStartDate >', date('Y-m-d')); // Assuming 'EventStartDate' is the column name
    return $this->db->get('Market_place_Events')->row();
    }


    
}