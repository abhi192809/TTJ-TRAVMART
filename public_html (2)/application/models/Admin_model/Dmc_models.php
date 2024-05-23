<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dmc_models extends CI_Model {
    
    public function dmc_city() {
        $this->load->database();
        $this->db->select('id, City_filter');
        $q = $this->db->get('city');
        return $q->result_array();
    }
     public function insert($insertData)
    {
        $this->load->database();
        $this->db->insert('DMC', $insertData);
    }
      public function DMC_value($q) {
        $this->load->database();
    
        // Use $q instead of $q1 in the get_where method
        $result = $this->db->get_where('DMC', array('id_city' => $q));
    
        // Return the result as an array
        return $result->result_array();
    }
     public function updateDMCData($data) {
            $this->load->database();
            $this->db->trans_start(); // Start a transaction
    
            foreach ($data as $entry) {
                if(@$entry['company_id'] == '' ){
                    
                }
                else{
                $this->db->set('name', $entry['company_name']);
                $this->db->set('address', $entry['address']);
                $this->db->set('number', $entry['number']);
                $this->db->where('id', $entry['company_id']);
                $this->db->update('DMC');
                }
            }
    
            $this->db->trans_complete(); // Complete the transaction
    
            return $this->db->trans_status(); // Return transaction status (true if successful, false otherwise)
    }
    
       public function Removeentry($id) {
    $this->load->database();
    $this->db->where('id', $id);
    $result = $this->db->delete('DMC');
    
    return $result ? '1' : '0';
}
   
   
}