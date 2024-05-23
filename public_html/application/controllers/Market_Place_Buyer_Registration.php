
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Market_Place_Buyer_Registration extends CI_Controller {

    public function index()
    {   
        $this->load->model('Meeting_model/Buyer_model');
        $this->load->model('Meeting_model/Master_model');
        $data['Event'] = $this->Buyer_model->All_Event();
        $data['Nature_of_Business'] = $this->Master_model->Merket_place_Nature_of_Business_Master();
        $data['Business_Category_Master'] = $this->Master_model->Merket_place_Business_Category_Master();
           
        $this->load->view('Website/header1');
        $this->load->view('Website/market_place_Buyer_Register',$data);
        $this->load->view('Website/footer1');
    }
    public function Submit_the_buyer_form() {
    $this->load->model('Meeting_model/Buyer_model');

    $config['upload_path'] = './assets/Meeting/Buyer_logo/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '*';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('Logo')) {
        $upload_data = $this->upload->data();
        $data = array(
            'Logo' => $upload_data['file_name'],
            'Name' => $this->input->post('Name'),
            'Designation' => $this->input->post('Designation'),
            'Your_Company_Name' => $this->input->post('Your_Company_Name'),
            'Nature_of_Business' => $this->input->post('Nature_of_Business'),
            'Business_Category' => $this->input->post('Business_Category'),
            'Company_Address' => $this->input->post('Company_Address'),
            'Annual_Turnover' => $this->input->post('Annual_Turnover'),
            'Year_Commencement' => $this->input->post('Year_Commencement'),
            'Destinations' => $this->input->post('Destinations'),
            'Trade_Associations' => $this->input->post('Trade_Associations'),
            'City' => $this->input->post('City'),
            'Pin_Code' => $this->input->post('Pin_Code'),
            'Email' => $this->input->post('Email'),
            'Mobile_Number' => $this->input->post('Mobile_Number'),
            'Country' => $this->input->post('Country'),
        );

        $BuyerName = $this->input->post('Email');
        
        $buyer_id = $this->Buyer_model->insert_buyer($data);
        
        
        $Market_Place = 'Market_Place';
        
        $Event_map_buyer =  $this->Buyer_model->map_buyer_entry_Market_place($buyer_id,$Market_Place);
          
        // $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        // $password = substr(str_shuffle($characters), 4, 8); // Adjust the length as needed
        //   $date = date('Y-m-d', strtotime('+1 year'));

        // $result = $this->Buyer_model->Buyer_Login_Password($BuyerName,$password,'Buyer',$date);
        
        
    
        $to = $this->input->post('Email');
        $subject = 'Pre-registration for the Event';
        $message = 'Dear ' . $this->input->post('Name') . ',<br><br>Thank you for your pre-registration for the Event. Your request is being processed. Please wait for confirmation.';
        $headers = "From: info@ttjtravmat.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        if (mail($to, $subject, $message, $headers)) {
            $response = array('status' => 'success', 'message' => 'Form submitted successfully and email sent!');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to send email.');
            echo json_encode($response);
        }
    } else {
        $response = array('status' => 'error', 'message' => $this->upload->display_errors());
        echo json_encode($response);
    }
}

    public function CheckDuplicate() {
        $this->load->model('Meeting_model/Buyer_model');
        $email = $this->input->post('email');
        $companyName = $this->input->post('companyName');

        $existingBuyer = $this->Buyer_model->getBuyerByEmailAndCompany($email, $companyName);
        
        if ($existingBuyer) {
            // If the combination exists, return an error response
            $response = array('status' => 'error', 'message' => 'A buyer with the same email and company already exists.');
        } else {
            // If the combination doesn't exist, return a success response
            $response = array('status' => 'success');
        }

        // Send JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
}

