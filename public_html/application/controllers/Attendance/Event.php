<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // Check if 'user' session data exists
        $adminSession = $this->session->userdata('user_data');
        if(!$adminSession) {
            // If 'user' session data doesn't exist, redirect to login page
            redirect('Attendance/Login');
        }
   
        // Continue with the constructor logic for authenticated users
    }

    public function index() {
        $this->load->model('Attendance_model/Event_model');
        $data['event'] = $this->Event_model->TTJ_Travmart_Event();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/Event', $data);
        $this->load->view('Attendance/footer');
    }
    
    public function Event_Sheet() {
        $this->load->model('Attendance_model/Event_model');
        $data['event'] = $this->Event_model->TTJ_Travmart_Event_Name();
        $this->load->view('Attendance/header');
        $this->load->view('Attendance/Event_See', $data);
        $this->load->view('Attendance/footer');
    }
    
public function submitEvent() {
    $this->load->model('Attendance_model/Event_model');

    // File upload configuration
    $config['upload_path'] = 'assets/TTJ_Travmart_Event/';
    $config['allowed_types'] = '*';
    $config['max_size'] =  '*'; // 5MB max size (adjust as needed)

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('Eventimag')) {
        // File uploaded successfully
        $upload_data = $this->upload->data();

        // Get form data
        $eventData = array(
            'images' => $upload_data['file_name'],
            'store_table_name' => $this->input->post('Event_Name'). '_' . date('Y'),
            'Date' => $this->input->post('Date'),
            'Place' => $this->input->post('Place'),
            'Venue' => $this->input->post('Venue'),
            'Active' => '0', // Set to 1 for the new record
        );

        // Call the model method to insert data
        $this->Event_model->insertEvent($eventData);

        // Set Active to 0 for all other records

        // Create a table dynamically
        $this->createEventTable($eventData['store_table_name']);

        // Send success response
        echo 'success';
    } else {
        // File upload failed
        echo $this->upload->display_errors();
    }
}


    
    public function Unactive() {
        $this->load->model('Attendance_model/Event_model');
        $id = $this->input->post('id');
        $this->Event_model->active_event($id);
    }
    
    public function getTableNames() {
        $prefix = $this->input->post('prefix');
        $this->load->model('Attendance_model/Event_model');
        $tableNames = $this->Event_model->getTableNamesByPrefix($prefix);
        echo json_encode(array('status' => 'success', 'message' => $tableNames));
    }
    
  public function downloadTableData() {
    $this->load->model('Attendance_model/Event_model');

    $data = $this->Event_model->getselectedCategory();

    $get_name = $this->input->post('Business_Category');

    $response = $this->Event_model->dowanloaddata($get_name, $data);
  $this->downloadCsv($response);
}

private function downloadCsv($data) {
    // Set response headers for CSV file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="EventData.csv"');
    header('Cache-Control: max-age=0');

    // Open the file handle for writing
    $fileHandle = fopen('php://output', 'w');

    // Set headers
    $headers = array(
        'So.No', 'Name', 'Designation', 'Your Company Name',
        'Nature of Business', 'Business Category', 'Company Address',
        'City', 'Pin Code', 'Email', 'Mobile Number', 'Annual Turnover',
        'Year Commencement', 'Destinations', 'Trade Associations'
    );

    // Write headers to the file
    fputcsv($fileHandle, $headers);

    // Write data
    $serialNumber = 1; // Initialize the serial number
    foreach ($data as $row) {
        // Add the serial number to each row
        array_unshift($row, $serialNumber++);
        // Write the row to the file
        fputcsv($fileHandle, $row);
    }

    // Close the file handle
    fclose($fileHandle);

    // Exit to prevent further output
    exit;
}



      public function dowaloadoldtable() {
        $this->load->model('Attendance_model/Event_model');
        $tableName = $this->input->post('table_name');
        $tableData = $this->Event_model->gettable($tableName);

        // Send the table data back to the client
        echo json_encode(array('status' => 'success', 'data' => $tableData));
    }

    private function createEventTable($tableName) {
        // SQL statement for creating the table
        $sql = "CREATE TABLE $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY,
            Event_Name VARCHAR(255),
            Venue VARCHAR(255),
            Name VARCHAR(255),
            Designation VARCHAR(255),
            Your_Company_Name VARCHAR(255),
            Nature_of_Business VARCHAR(255),
            Business_Category VARCHAR(255),
            Company_Address VARCHAR(255),
            City VARCHAR(255),
            Pin_Code VARCHAR(255),
            Email VARCHAR(255),
            Mobile_Number VARCHAR(255),
            Annual_Turnover VARCHAR(255),
            Year_Commencement VARCHAR(255),
            Destinations VARCHAR(255),
            Trade_Associations VARCHAR(255),
            Active INT DEFAULT '0'  -- Add this line for the Active column
        )";

        // Execute the SQL statement
        $this->db->query($sql);
    }
    
}
?>
