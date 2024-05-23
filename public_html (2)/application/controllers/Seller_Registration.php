
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_Registration extends CI_Controller {

    public function index()
    {   
        $this->load->model('Meeting_model/Buyer_model');
        $this->load->model('Meeting_model/Seller_model');
        $data['Event'] = $this->Buyer_model->All_Event();
         $data['Seller_Register'] = $this->Seller_model->View_marketing_Staff_Data();
        $this->load->view('Website/header1');
        $this->load->view('Website/Seller_Register',$data);
        $this->load->view('Website/footer1');
    }
    
    public function insertSeller()
{
    $this->load->model('Meeting_model/Seller_model');

    // Get the form data from POST
    $sellerData = array(
        'ReferrerPerson' => $this->input->post('ReferrerPerson'),
        'EventID' => $this->input->post('EventNames'),
        'SellerName' => $this->input->post('sellerName'),
        'CompanyName' => $this->input->post('companyName'),
        'PhoneNumber' => $this->input->post('phoneNumber'),
        'SellerEmail' => $this->input->post('sellerEmail'),
        'PhysicalAddress' => $this->input->post('physicalAddress'),
        'City' => $this->input->post('city'),
        'Country' => $this->input->post('country'),
        'PinCode' => $this->input->post('pinCode'),
        'Website' => $this->input->post('website'),
        'PanNumber' => $this->input->post('panNumber'),
        'GstNumber' => $this->input->post('gstNumber'),
        'Certifications' => $this->input->post('certifications'),
        'YearsInOperation' => $this->input->post('yearsInOperation'),
        'IndustryExperience' => $this->input->post('industryExperience'),
        'AnnualTurnover' => $this->input->post('annualTurnover'),
        'EmergencyContacts' => $this->input->post('emergencyContacts'),
    );

    // Handle the image upload
    $config['upload_path']   = './assets/Meeting/Seller_logo/';
    $config['allowed_types'] = 'png';
    $config['max_size']      = '*';
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('Logo')) {
        $uploadData = $this->upload->data();
        $sellerData['logo'] = $uploadData['file_name'];
    } else {
        $error = $this->upload->display_errors();
        echo "Error uploading file: " . $error;
        return;
    }
    
    $sellerId = $this->Seller_model->AprovalSeller($sellerData);
    
    // Sending email to the seller
    $to = $this->input->post('sellerEmail');
    $subject = 'Pre-registration for the Event';
    $message = '
            <html>
            <head>
                <title>Pre-registration Confirmation</title>
            </head>
            <body>
                <p>Dear ' . $this->input->post('sellerName')  . ',</p>
                <p>Thank you for pre-registering for the event hosted by TTJ Travmart.</p>
                <p>Your registration query has been received, and we will verify it shortly. Please expect a response within 24 hours. If you don\'t receive any update within this timeframe, please feel free to contact us at www.ttjtravmart.com </p>
                <p>Thank you for your patience and cooperation.</p>
                <p>Best regards,</p>
                <p>The TTJ Travmart Team</p>
            </body>
            </html>
        ';

    $headers = "From: info@ttjtravmat.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo 1;
    } else {
        echo 0;
    }
}
public function CheckDuplicateSellerEmail() {
    $this->load->model('Meeting_model/Seller_model');
    $email = $this->input->post('email');
    $existingSeller = $this->Seller_model->getSellerByEmail($email);
    if ($existingSeller) {
        $response = array('status' => 'error');
    } else {
        $response = array('status' => 'success');
    }
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
}

public function CheckDuplicateCompanyName() {
    $this->load->model('Meeting_model/Seller_model');
    $companyName = $this->input->post('companyName');
    $existingSeller = $this->Seller_model->getSellerByCompanyName($companyName);
    if ($existingSeller) {
        $response = array('status' => 'error');
    } else {
        $response = array('status' => 'success');
    }
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
}




}


