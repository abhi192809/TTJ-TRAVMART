<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

    public function index()
    {   
         
        $this->load->view('Website/header');
        $this->load->view('Website/Contactus');
        $this->load->view('Website/footer');
    }
    
    public function Getintuch()
    {   
         
        $this->load->view('Website/header1');
        $this->load->view('Website/Contactus');
        $this->load->view('Website/footer1');
    }
    
    
    public function mailsendme()
    {   
            $to = "info@ttjtravmart.com";
            $subject = "Contact Us";
            $full_name = $this->input->post('full_name');
            $mobile_no = $this->input->post('mobile_no');
            $location = $this->input->post('location');
            $description = $this->input->post('description');
            
    
            $message = "Name: $full_name\n";
            $message .= "Mobile Number: $mobile_no\n";
            $message .= "Location: $location\n";
            $message .= "Description:\n$description\n";

            $headers = "From: Demo@example.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Email sent successfully.";
            } else {
                echo "Email sending failed.";
            }
    }
}
