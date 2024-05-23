<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClubTTJ extends CI_Controller {

    public function index()
    {   
        $this->load->model('Meeting_model/Master_model');
        $data['Master_model'] = $this->Master_model->Marketplace_Master_City_Place_Country();
        $this->load->view('Website/header1');
        $this->load->view('Website/Clubttj',$data);
        $this->load->view('Website/footer1');
    }
    
    public function Clubttj1()
    {   
        $this->load->model('Meeting_model/Master_model');
        $data['Master_model'] = $this->Master_model->Marketplace_Master_City_Place_Country();
        $this->load->view('Website/header1');
        $this->load->view('Website/Clubttj1',$data);
        $this->load->view('Website/footer1');
    }
    
  public function submit_form() {
        $this->load->model('Event_models');
        $this->load->library('email');

        $is_unique = false;
        $make_id = '';

        // Loop until a unique MakeID is found
        while (!$is_unique) {
            // Generate a random MakeID
            $random_number = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $make_id = 'TCTJ' . $random_number;

            // Check if the MakeID already exists in the database
            if (!$this->Event_models->make_id_exists($make_id)) {
                $is_unique = true;
            }
        }

        // Prepare data array
        $data = array(
            'MakeID' => $make_id,
            'Name' => $this->input->post('ctl00$MainContent$name'),
            'CompanyName' => $this->input->post('ctl00$MainContent$company'),
            'Address' => $this->input->post('ctl00$MainContent$address'),
            'City' => $this->input->post('ctl00$MainContent$city'),
            'State' => $this->input->post('ctl00$MainContent$state'),
            'Country' => $this->input->post('ctl00$MainContent$country'),
            'PinCode' => $this->input->post('ctl00$MainContent$pincode'),
            'ContactNo' => $this->input->post('ctl00$MainContent$mobile'),
            'Fax' => $this->input->post('ctl00$MainContent$fax'),
            'Email' => $this->input->post('ctl00$MainContent$email'),
            'CompanyWebsite' => $this->input->post('ctl00$MainContent$cwebsite'),
            'Query' => $this->input->post('ctl00$MainContent$query'),
            'Created_at' => date('Y-m-d H:i:s')
        );

        // Insert data into the database
        $make_id_returned = $this->Event_models->insert_data($data);

        // Return JSON response
        if ($make_id_returned) {
            // Send email notification
            $this->send_confirmation_email($data['Email'], $make_id);
            echo json_encode(['status' => 1, 'message' => 'Form submitted successfully!', 'MakeID' => $make_id_returned]);
        } else {
            echo json_encode(['status' => 0, 'message' => 'Error occurred while submitting the form.']);
        }
    }

    private function send_confirmation_email($email, $make_id) {
        // Set email parameters
        $to = $email;
        $subject = 'Form Submission Confirmation';
        $message = "Dear Sir/Madam,\n\nThank you for your submission.\n\nYour ClubTTJ is: $make_id.\n\nPlease proceed to pay the required amount using the designated payment method.\nAfter you have submitted the payment, kindly share the payment details with kuldeep@ttjtravmart.com.\nEnsure you include your ClubTTJ ($make_id) in your communication to facilitate the processing of your transaction.\n\nIf you have any questions or require assistance, please do not hesitate to contact our dedicated support team.\n\nThank you for your cooperation.";

        $headers = 'From: kuldeep@ttjtravmart.com' . "\r\n" .
                   'Reply-To: kuldeep@ttjtravmart.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
    
        // Send email
        if (mail($to, $subject, $message, $headers)) {
            log_message('info', 'Confirmation email sent successfully to ' . $email);
        } else {
            log_message('error', 'Failed to send confirmation email to ' . $email);
            show_error('Failed to send confirmation email. Please check your server configuration.');
        }
    }

  
}
