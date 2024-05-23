<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {

    public function MagazineSubscription()
    {   
         $this->load->view('Website/header');
        $this->load->view('Website/Magazine-Subscription');
        $this->load->view('Website/footer');
    }
    public function MagazineSubscriptionform()
    {   
        // Process the file upload
        $targetDirectory = FCPATH . "assets/Paymentonline/"; // Change this to the directory where you want to store the uploaded files

        // Validate and sanitize user inputs
        $name = $this->input->post("Name", TRUE);
        $email = $this->input->post("Email", TRUE);
        $number = $this->input->post("Number", TRUE);
        $association = $this->input->post("Association", TRUE);
        $designation = $this->input->post("Designation", TRUE);
        $companyName = $this->input->post("CompanyName", TRUE);
        $address1 = $this->input->post("Address1", TRUE);
        $address2 = $this->input->post("Address2", TRUE);
        $city = $this->input->post("City", TRUE);
        $place = $this->input->post("Place", TRUE);

        $config['upload_path']   = $targetDirectory;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100000;
        $config['max_width']     = 10240;
        $config['max_height']    = 7680;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('paymentScreenshot')) {
            // Upload successful
            $uploadData = $this->upload->data();
            $targetFile = $targetDirectory . $uploadData['file_name'];

            // Current timestamp and timestamp one year later
            $currentTimestamp = time();
            $oneYearLaterTimestamp = strtotime('+1 year', $currentTimestamp);
            $created_at = date('Y-m-d H:i:s', $oneYearLaterTimestamp);

            // Load the Subscription_model
            $this->load->model('Magazine_Subscription_form_submit');

            // Data to be inserted into the subscriptions table
            $data = array(
                'name' => $name,
                'email' => $email,
                'number' => $number,
                'association' => $association,
                'designation' => $designation,
                'company_name' => $companyName,
                'address1' => $address1,
                'address2' => $address2,
                'city' => $city,
                'place' => $place,
                'payment_screenshot' => $targetFile,
                'created_at' => $created_at
            );

            // Call the submit_subscription method of the Subscription_model
            $this->Magazine_Subscription_form_submit->submit_subscription($data);

            echo "<script>alert('Thank you for being a part of TTJ TRAVMART');</script>";
            echo "<script>window.location.href='https://www.ttjtravmart.com/magazine/magazinesubscription';</script>";
  
        } else {
            // Upload failed
            echo "Error: " . $this->upload->display_errors();
        }
    }
}
