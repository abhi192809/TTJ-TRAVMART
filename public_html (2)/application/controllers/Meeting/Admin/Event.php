<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

 public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        
        
        // Check if user is not logged in
        if (!$this->session->userdata('user_id')) {
            
            // Redirect to the login page or any other page as needed
            redirect('Meeting/login');
        }
        
        
         $user_type = $this->session->userdata('type');
         if($user_type == 'Admin'){
             
         }
         else{
            redirect('Meeting/login');
             
         }
    }
    
    public function EventCreat(){
        $this->load->model('Meeting_model/Event_model');
        $data['view_Event'] = $this->Event_model->View_Event();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Event_Creat_view',$data);
        $this->load->view('Meeting/dashboard/footer');   
    }
   
    public function ActiveEvent(){
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Active_Event_view');
        $this->load->view('Meeting/dashboard/footer');   
    }

    public function OldEvent(){
            $this->load->model('Meeting_model/Event_model');
            
        $data['view_Event'] = $this->Event_model->View_Event();
     
    
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Old_Event_view',$data);
        $this->load->view('Meeting/dashboard/footer');   
    }
    
    public function Report(){
        
        $this->load->model('Meeting_model/Event_model');
            
        $data['view_Event'] = $this->Event_model->get_Number_of_upcoming_Event();
     
        $this->load->model('Meeting_model/Event_model');
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Report',$data);
        $this->load->view('Meeting/dashboard/footer');
    }

    public function Event_Update() {
        $this->load->model('Meeting_model/Event_model', 'Event_model');
        $dataid = $this->input->post('EventID');
        $data = $this->input->post();
        
        if ($this->Event_model->Edit_EventID($dataid, $data)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
   public function EventCreatInsert(){
       
         $this->load->model('Meeting_model/Event_model');

        // Validate and process form data
        $eventData = $this->input->post();
        
        // Handle image upload
        $imagePath = $this->handleImageUpload();

        // Save data to the database or perform other actions as needed
        $this->Event_model->CreatEvent($eventData, $imagePath);

        // Return a response (you may customize this based on your needs)
        echo json_encode(['success' => true, 'message' => 'Event submitted successfully']);
  
   }
   
    private function handleImageUpload() {
        // Implement your image upload logic here
        // Example: Move uploaded image to a specific directory and return the path
        $config['upload_path'] = './assets/Meeting/Event_image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024; // 1MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('Event_image')) {
            $uploadData = $this->upload->data();
            return  $uploadData['file_name'];
        } else {
            return ''; // Handle upload error
        }
    }
    
    public function sendLoginCredentials() {
          $this->load->model('Meeting_model/Event_model');

    $email = $this->input->post('email');
    // Perform database query to retrieve user information based on email
    $user = $this->Event_model->getUserByEmail($email);
    if ($user) {
        // Send email to user with login credentials
        $to = $email;
        $subject = 'Login Credentials';
        $message = 'Your login credentials: Username: ' . $user->username . ', Password: ' . $user->password;
        $headers = 'From: info@ttjtravmart.com' . "\r\n" .
                   'Reply-To: info@ttjtravmart.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'User not found.'));
    }
}


}
