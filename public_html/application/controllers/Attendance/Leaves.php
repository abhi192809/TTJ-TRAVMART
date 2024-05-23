<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Leaves extends CI_Controller {

    public function index()
    {   
        $this->load->model('Attendance_model/Leaves_model');
       $data['leaves'] = $this->Leaves_model->getlevesData();
      
        $this->load->view('Attendance/header' );
        $this->load->view('Attendance/leaves',$data);
        $this->load->view('Attendance/footer');
    }
    
    public function Submit_leaves()
{   
    $userInput = $this->input->post();
    $data = [
        
        'Name' => $userInput['Name'], // Adjust this according to your data structure
        'Subject' => $userInput['Subject'], // Adjust this according to your data structure
        'Text' => $userInput['Text'], // Adjust this according to your data structure
        'Date' =>  $userInput['Dateleaves'],
        'Status'=> '2',
    ];
    

    $this->load->model('Attendance_model/Leaves_model');
    $q1 = $this->Leaves_model->submit_leaves($data);

    if ($q1 == 1) {
        echo 1;
    } 
}

       public function approved()
    {
        $data = $this->input->post();
        $this->load->model('Attendance_model/Leaves_model');
        $result = $this->Leaves_model->updateLeaveStatus($data['date'], $data['name'], $data['status']);
        if ($result) {
            echo '1';
        } else {
            echo '0';
        }
    }



    

    
    
}
