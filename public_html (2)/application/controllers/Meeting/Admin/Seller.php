<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seller extends CI_Controller
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
    
    public function index()
    {
        $this->load->model('Meeting_model/Seller_model');
        $data['View_Event'] = $this->Seller_model->View_Event();
         $data['Seller_staff'] = $this->Seller_model->View_marketing_Staff_Data();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/seller_view',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    public function Seller_data_view(){
        
        $this->load->model('Meeting_model/Seller_model');
        $data['View_Seller'] = $this->Seller_model->View_Seller();
           $data['Seller_Plan'] = $this->Seller_model->get_Seller_Plan();
    
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Seller_data_view',$data);
        $this->load->view('Meeting/dashboard/footer');
  
    }
    
    
    public function Live_Seller_data(){
             $this->load->model('Meeting_model/Seller_model');
        $data['View_Event'] = $this->Seller_model->Active_View_Event();
         $data['Seller_Map'] = $this->Seller_model->Get_Seller_Map_Data($data['View_Event']->EventID);
       
         $data['Seller'] = $this->Seller_model->View_Seller();
       
            $this->load->view('Meeting/dashboard/header');
            $this->load->view('Meeting/dashboard/sidebar');
            $this->load->view('Meeting/dashboard/topbar');
            $this->load->view('Meeting/dashboard/Live_Seller_data',$data);
            $this->load->view('Meeting/dashboard/footer');
         
    }
    
     public function seller_register_data(){
        $this->load->model('Meeting_model/Seller_model');
        $this->load->model('Meeting_model/Booking_model');
        $data['Approved_Seller'] = $this->Booking_model->approvedeventView();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/seller_register_data',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    
     public function seller_event_data(){
        $data['id'] = $SellerID = $this->uri->segment(5);
        $this->load->model('Meeting_model/Booking_model');
        @$data['EventID'] = $this->Booking_model->Get_Seller_Event_map($SellerID);
        @$data['Event_Data'] = $this->Booking_model->Get_map_Event();
    
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/seller_event_data',$data);
        $this->load->view('Meeting/dashboard/footer');
  
    }
    
    
    public function Get_the_Seller_Realted_Event_Buyer_Meeting(){
        
          $EventID = $this->uri->segment(5);
          $SellerID = $this->uri->segment(6);
           $this->load->model('Meeting_model/Booking_model');
        $data_fixed_Event =[
            
            'EventID' => $EventID,
            'SellerID' =>  $SellerID,
        
            ];
            
        $data['Get_Seller_from_fixed'] =$this->Booking_model->Get_seller_event_fixed($data_fixed_Event);
    
        $data['Get_Buyer_data'] = $this->Booking_model->get_buyer();
    
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Get_the_Seller_Realted_Event_Buyer_Meeting',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function seller_information_update($md5_hash){
        
        $this->load->model('Meeting_model/Seller_model');
        $data['View_Seller'] = $this->Seller_model->Seller_Entry_get($md5_hash);
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/seller_information_update',$data);
        $this->load->view('Meeting/dashboard/footer');
  
    }
    public function seller_lead(){
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/seller_lead');
        $this->load->view('Meeting/dashboard/footer');
  
    }
    public function lessor($ID){
         $this->load->model('Meeting_model/Amount_model');
        $data['View_Seller'] = $this->Amount_model->Amount_get($ID);
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/lessor',$data);
        $this->load->view('Meeting/dashboard/footer');
        
    }
    
    public function Seller_request(){
        $this->load->model('Meeting_model/Seller_model');
        $data['View_Seller_pending'] = $this->Seller_model->Seller_pending_data();
     
            if (!empty($data['View_Seller_pending'])) {
                $data['call_Employ_Name'] = $this->Seller_model->Employ_Name_get();
            }
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Seller_request',$data);
        $this->load->view('Meeting/dashboard/footer');
        
    }
 public function insertSeller()
{
    $this->load->model('Meeting_model/Seller_model');
$date = date('Y-m-d', strtotime('+3 months'));

    // Get the form data from POST
    $sellerData = array(
        'ReferrerPerson' => $this->input->post('ReferrerPerson'),
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

    // Call the model method to insert seller data
    $sellerId = $this->Seller_model->insertSeller($sellerData);
    $checkboxValues = $this->input->post('checkboxValues');
    $amounts = $this->input->post('amounts');
    $PaymentMethod = $this->input->post('PaymentMethod');
    $Payment = $this->input->post('Payment');
    $prices = $this->input->post('prices');
    // Insert data into Merket_place_seller_event_map table
    if (!empty($checkboxValues) && $sellerId) {
        foreach ($checkboxValues as $index => $eventId) {
            // Insert into the Merket_place_seller_event_map table
            $mapData = array(
                'seller_id' => $sellerId,
                'event_id' => $eventId,
               
            );

            $this->Seller_model->insertSellerEventMap($mapData);

            // Insert into the Amounts table
            $amountData = array(
                'seller_id' => $sellerId,
                'event_id' => $eventId,
                'amount' => $amounts[$index],
                'PaymentMethod' => $PaymentMethod[$index],
                'PaymentID' => $Payment[$index],
                'Event_Price' => $prices[$index]
                
            );

            $this->Seller_model->insertAmounts($amountData);
        }
    }

    // Mail and make an ID password
    $ID_password = [
        'username' => $this->input->post('Username'),
        'password' => $this->input->post('Password'),
        'Type' => 'Seller',
        'Status' => '1',
        'Duration'=>$date
    ];

    $this->Seller_model->SellerIDPasword($ID_password);
     echo 1;
    // $recipientEmail = $sellerData['SellerEmail'];
    //     $subject = 'Your New Account Details';
    //     $message = 'Dear User,' . "\r\n\r\n";
    //     $message .= 'Your account has been created successfully.' . "\r\n";
    //     $message .= 'Username: ' . $ID_password['username'] . "\r\n";
    //     $message .= 'Password: ' . $ID_password['password'] . "\r\n\r\n";
    //     $message .= 'Duration: ' . $ID_password['Duration'] . "\r\n\r\n";
    //     $message .= 'Thank you for joining us!' . "\r\n";
    //     $message .= 'Best regards,' . "\r\n";
    //     $message .= 'Your Company Name';
        
    //     // Set additional headers
    //     $headers = 'From: info@ttjtravmart.com' . "\r\n";
    //     $headers .= 'Reply-To: info@ttjtravmart.com' . "\r\n";
    //     $headers .= 'X-Mailer: PHP/' . phpversion();
    //     $headers .= 'MIME-Version: 1.0' . "\r\n";
    //     $headers .= 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        
    //     // Send email
    //     if (mail($recipientEmail, $subject, $message, $headers)) {
    //         echo '1'; // Email sent successfully
    //     } else {
    //         echo 'Email could not be sent.';
    //     }
}

public function insertSellerApproved()
{  
    $this->load->model('Meeting_model/Seller_model');
$date = date('Y-m-d', strtotime('+3 months'));

    // Get the form data from POST
    $sellerData = array(
        'ReferrerPerson' => $this->input->post('ReferrerPerson'),
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
        'Logo' => $this->input->post('Logo') // Include Logo field
    );

    // Call the model method to insert seller data
    $sellerId = $this->Seller_model->insertSeller($sellerData);

    // Insert data into Merket_place_seller_event_map table
    $checkboxValues = $this->input->post('checkboxValues');
    $amounts = $this->input->post('amounts');
    $PaymentMethod = $this->input->post('PaymentMethod');
    $Payment = $this->input->post('Payment');
    $prices = $this->input->post('prices');
    if (!empty($checkboxValues) && $sellerId) {
        foreach ($checkboxValues as $index => $eventId) {
            // Insert into the Merket_place_seller_event_map table
            $mapData = array(
                'seller_id' => $sellerId,
                'event_id' => $eventId
            );
            $this->Seller_model->insertSellerEventMap($mapData);

            // Insert into the Amounts table
            $amountData = array(
                'seller_id' => $sellerId,
                'event_id' => $eventId,
                'amount' => $amounts[$index],
                'PaymentMethod' => $PaymentMethod[$index],
                'PaymentID' => $Payment[$index],
                'Event_Price' => $prices[$index]
          
            );
            $this->Seller_model->insertAmounts($amountData);
        }
    }

    // Mail and create an ID password
    $ID_password = array(
        'username' => $this->input->post('Username'),
        'password' => $this->input->post('Password'),
        'Type' => 'Seller',
        'Status' => '1',
         'Duration'=>$date
    );
    
    
    $this->Seller_model->SellerIDPasword($ID_password);
    
    $deleteData = array(
        'SellerID' => $this->input->post('id')
    );
    
    
    $this->Seller_model->Approved_Delete_Seller($deleteData);
$recipientEmail = $sellerData['SellerEmail'];
$subject = 'Your New Account Details';
$message = 'Dear'.$this->input->post('sellerName').',' . "\r\n\r\n";
$message .= 'We are pleased to inform you that your account has been successfully created with us.' . "\r\n";
$message .= 'Here are your login credentials:' . "\r\n";
$message .= 'Username: ' . $ID_password['username'] . "\r\n";
$message .= 'Password: ' . $ID_password['password'] . "\r\n\r\n";
$message .= 'Thank you for choosing to partner with us. We look forward to a fruitful collaboration!' . "\r\n";
$message .= 'Best Regards,' . "\r\n";
$message .= 'TTJTRAVMART';

// Set additional headers
$headers = 'From: info@ttjtravmart.com' . "\r\n";
$headers .= 'Reply-To: info@ttjtravmart.com' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/plain; charset=utf-8' . "\r\n";

// Send email
if (mail($recipientEmail, $subject, $message, $headers)) {
    echo '1'; // Email sent successfully
} else {
    echo 'Email could not be sent.';
}

}



      public function show_seller_password() {
            $this->load->model('Meeting_model/Seller_model');
        $user_name = $this->input->post('sellerName');
     
        $data = $this->Seller_model->Seller_User_id_password($user_name);

        // Return data as JSON
        echo json_encode($data);
    }
    
      public function Change_seller_password() {
                $this->load->model('Meeting_model/Seller_model');
      
        $user_name = $this->input->post('sellerName');
        $new_password = $this->input->post('newPassword');

        // Update the seller's password
        $update_result = $this->Seller_model->update_seller_password($user_name, $new_password);

        // Return a response (you can customize this based on your needs)
        if ($update_result) {
        $recipientEmail = $user_name;
        $subject = 'Your New Account Details';
        $message = 'Dear User,' . "\r\n\r\n";
        $message .= 'Your account has been created successfully.' . "\r\n";
        $message .= 'Username: ' . $user_name . "\r\n";
        $message .= 'Password: ' . $new_password . "\r\n\r\n";
        $message .= 'Thank you for joining us!' . "\r\n";
        $message .= 'Best regards,' . "\r\n";
        $message .= 'Your Company Name';
        
        // Set additional headers
        $headers = 'From: info@ttjtravmart.com' . "\r\n";
        $headers .= 'Reply-To: info@ttjtravmart.com' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        
        // Send email
        if (mail($recipientEmail, $subject, $message, $headers)) {
   
            echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
        } 
        else {
            echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
        }
        } 
        else {
            echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
        }
    }


 public function updateSeller() {
        // Get seller ID from the form or session, assuming it's stored in $sellerId variable
        $sellerId = $this->input->post('SellerID');  // Make sure you have a hidden input field for sellerId in your form

        // Load the Seller_model
         $this->load->model('Meeting_model/Seller_model');

        // Get the existing seller details from the database
        $existingDetails = $this->Seller_model->getSellerDetails($sellerId);

        // Check if the details have changed
        $data = $this->input->post();
        $updatedData = array();

        foreach ($data as $key => $value) {
            // Check if the value has changed and is not empty
            if ($existingDetails->$key !== $value && !empty($value)) {
                $updatedData[$key] = $value;
            }
        }

        // Check if a new logo file is uploaded
        if (!empty($_FILES['Logo']['name'])) {
            $updatedData['Logo'] = $this->uploadLogo();
        }

        // Update the seller details in the database
        $result = $this->Seller_model->updateSellerentry($sellerId, $updatedData);

        echo $result;  // Return the result to the AJAX call
    }

    // Function to handle logo upload
    private function uploadLogo() {
        $config['upload_path'] = './assets/Meeting/Seller_logo/';  // Specify the upload path
        $config['allowed_types'] = 'gif|jpg|png';  // Specify the allowed file types
        $config['max_size'] = 1024;  // Specify the maximum file size in kilobytes

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Logo')) {
            // Handle the upload failure (you might want to improve error handling)
            $error = array('error' => $this->upload->display_errors());
            print_r($error);  // You might want to log or display the error
            return false;  // Return false to indicate the failure
        } else {
            // Upload successful, retrieve the file name
            $data = $this->upload->data();
            return $data['file_name'];
        }
    }
    
      public function get_Seller_pending_data() {
         $this->db->select('SellerName, CompanyName, PhoneNumber, SellerEmail, PhysicalAddress, City, Country, PinCode, Website, PanNumber, GstNumber, Certifications, YearsInOperation, IndustryExperience, AnnualTurnover');
       
        $seller_id = $this->input->post('sellerId'); // Use seller_id as the key
        $this->load->model('Meeting_model/Seller_model');
        $sellerData = $this->Seller_model->get_Seller_pending_data($seller_id);
      
        $this->output->set_content_type('application/json');
        echo json_encode($sellerData);
    }

public function toggleActiveInactive() {
    $this->load->model('Meeting_model/Seller_model');

    $sellerID = $this->input->post('sellerID');
    $sellerEmail = $this->input->post('UserName');
    $password = $this->input->post('password');

    // Retrieve Seller_pending data
    $panding_Data = $this->Seller_model->Seller_pending($sellerID);

    // Move seller_make_id initialization here
    $seller_make_id = [
        'username' => $sellerEmail,
        'password' => $password,
        'Type' => 'Seller',
        'Status' => '1'
    ];

    // Delete Seller_pending
    $this->Seller_model->Seller_pending_delete($sellerID);

    // Add Seller_Active
    $Seller_Active = $this->Seller_model->Seller_Active($panding_Data);
     $this->Seller_model->SellerIDPasword($seller_make_id );

    // Perform other operations as needed, such as adding paymentAmount to Seller_Active

    echo 1;
}


  public function map_ID(){
             $this->load->model('Meeting_model/Seller_model');
  
         $id = $this->input->post('mapID');
         $data_varify = [
              
              'Attand_or_not' =>1,
              
             ];
         if($this->Seller_model->varity_persion($id,$data_varify)){
             echo 1;
         }
         else{
             echo 0;
         }
         
     }
     
     
    public function Seller_Varify($id){
         
        $this->load->model('Meeting_model/Seller_model');
        @$data['View_Event'] = $this->Seller_model->View_Event();
        @$data['Seller_data'] = $this->Seller_model->Merket_place_Sellers_pendings($id);
        @$data['Name'] = $this->Seller_model->View_marketing_Staff_Data_fixeds($data['Seller_data']->ReferrerPerson);

        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Seller_Varify',$data);
        $this->load->view('Meeting/dashboard/footer');   
        
    }
    
    public function Add_Amount(){
       $this->load->model('Meeting_model/Seller_model');
       $Amount =  $this->input->post('inputValue');
       $inputId =  $this->input->post('inputId');
       $data =[
           'amount' => $Amount,
           ];
       if($this->Seller_model->Update_Amount($data,$inputId)){
        echo 1;   
       }
       else{
           echo 0;
       }
    
    }
   
   
   
    public function CheckDuplicateSelller() {
        $this->load->model('Meeting_model/Seller_model');
        $email = $this->input->post('email');
        $companyName = $this->input->post('companyName');

        $existingBuyer = $this->Seller_model->getBuyerByEmailAndCompany($email, $companyName);
        
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
    
    
     public function Update_subcription(){
        $Email = $this->input->post('email');
        $Plan = $this->input->post('plan');
        $price = $this->input->post('price');
        $Payment_method = $this->input->post('Payment_method');
        $extand = $this->input->post('extand');
        $this->load->model('Meeting_model/Seller_model');
        $result = $this->Seller_model->Merket_place_Plan($Email, $Plan, $price,$Payment_method,$extand);
        print_r($result);
        if ($result) {
            // Return success response
            echo json_encode(array('success' => true));
        } else {
            // Return error response
            echo json_encode(array('success' => false));
        }
    }
   public function upload_csv() {
        if ($_FILES['csv_file']['name']) {
            $file_path = './assets/Meeting/' . $_FILES['csv_file']['name'];
    
            // Upload CSV file
            move_uploaded_file($_FILES['csv_file']['tmp_name'], $file_path);
    
            // Read CSV file
            $csv_data = array_map('str_getcsv', file($file_path));
    
            // Remove header row
            $header = array_shift($csv_data);
    
            // Insert data into 'market_place_buyer' table
            foreach ($csv_data as $row) {
                $company_name = $row[2] ?? ''; // Company name
                $email = $row[4] ?? ''; // Email
    
                // Check if company name already exists
                $existing_company = $this->db->get_where('Merket_place_Sellers', array('CompanyName' => $company_name))->row_array();
    
                // Check if email already exists
                $existing_email = $this->db->get_where('Merket_place_Sellers', array('SellerEmail' => $email))->row_array();
    
                // If either company name or email already exists, get the buyer's ID
                if ($existing_company || $existing_email) {
                    $existing_buyer = $existing_company ? $existing_company : $existing_email;
                    $buyer_id = $existing_buyer['SellerID'];
                } else {
                    // If neither company name nor email exists, proceed with insertion
                    $data = array(
                        'ReferrerPerson' => $row[0] ?? '',
                        'SellerName' => $row[1] ?? '',
                        'CompanyName' => $company_name,
                        'PhoneNumber' => $row[3] ?? '',
                        'SellerEmail' => $email ?? '',
                        'PhysicalAddress' => $row[5] ?? '',
                        'City' => $row[6] ?? '',
                        'Country' => $row[7] ?? '',
                        'PinCode' => $row[8],
                        'Website' => $row[9] ?? '',
                        'PanNumber' => $row[10] ?? '',
                        'GstNumber' => $row[11] ?? '',
                        'Certifications' => $row[12] ?? '',
                        'YearsInOperation' => $row[13] ?? '',
                        'IndustryExperience' => $row[14] ?? '',
                        'AnnualTurnover' => $row[15] ?? '',
                        'EmergencyContacts' => $row[16] ?? '',
                        'Category' => '' ?? '',
                        'Logo' => 'no-image-icon-6.png', // Assuming default image name
                    );
    
                    $this->db->insert('Merket_place_Sellers', $data);
    
                    // Get the last inserted ID from 'market_place_buyer' table
                    $buyer_id = $this->db->insert_id();
                }
    
                $duration = date('Y-m-d', strtotime('+3 months'));
                // If the buyer is not already mapped to the event, insert the mapping
               
                    // Insert data into 'merket_place_login' table
                    $login_data = array(
                        'username' => $email, // You haven't specified a username here, adjust this as needed
                        'password' => $this->generatePassword(6),
                        'Type' => 'Seller', // Assuming this is the type for buyer login
                        'Type_ID_prfile' => '', // Assuming this should be left empty for now
                        'Duration' => $duration, // Assuming this should be left empty for now
                        'Status' => '1' // Assuming the initial status should be 'Active'
                    );
                    $this->db->insert('Merket_place_Login', $login_data);
                    $event_id = $this->db->insert_id();
            }
    
            // Redirect or show success message
        } else {
            // Handle error if file is not uploaded
        }
    }
    private function generatePassword($length = 6) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
    
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $password;
    }
   
}