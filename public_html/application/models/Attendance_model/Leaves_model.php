<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves_model extends CI_Model {
  
  public function getlevesData() {
        $data = $this->db->order_by('Date', 'DESC')->get('Attendance_leaves');
        if ($data->num_rows() > 0) {
            return $data->result_array();
        }
  }  
    
  public function submit_leaves($data) {
        if ($this->db->insert('Attendance_leaves', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
   public function updateLeaveStatus($date, $name, $status) {
        $this->db->where('Date', $date);
        $this->db->where('Name', $name);
        $this->db->update('Attendance_leaves', array('Status' => $status));
        return $this->db->affected_rows() > 0;
    }
    public function insertAttendanceTime($data) {
        $this->db->insert('Attendance_time', $data);

        return $this->db->affected_rows() > 0;
    }
    
public function get_current_month_data() {
    // Get the current month and year
    $currentMonth = date('m');
    $currentYear = date('Y');

    // Assuming 'Attendance_time' is the name of your table
    $this->db->where('Month', date('F', mktime(0, 0, 0, $currentMonth, 1)));
    $this->db->where('Year', $currentYear);
    
    // Adding condition for the current user's name
    $adminSession = $this->session->userdata('user_data');
    if (!empty($adminSession) && isset($adminSession['username'])) {
        $this->db->where('Name', $adminSession['username']);
    } else {
        // Handle the case where username is not available in session data
        // You might want to log this or display an error message
        // Example:
        log_message('error', 'Username not found in session data.');
    }

    $query = $this->db->get('Attendance_time');
    
    // Debugging: Echo the generated SQL query
    // echo $this->db->last_query();

    // Check if there are any results
    if ($query->num_rows() > 0) {
        // Return the result set as an associative array
        return $query->result_array();
    } else {
        // If no results found, return an empty array or handle the situation accordingly
        return array();
    }
}

}
?>