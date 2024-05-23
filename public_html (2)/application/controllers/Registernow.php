<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registernow extends CI_Controller {

    public function index()
    {   
        $this->load->model('Registernow_models');
        $data['eventdata'] = $this->Registernow_models->submit_Registernow();
        $this->load->view('Website/header');
        $this->load->view('Website/Registernow',$data);
        $this->load->view('Website/footer');
    }
    public function registration_form_submit()
    { 
        $this->load->model('Registernow_models');
        $data = array(
            'Event_Name' => '', // replace with actual value
            'Venue' => '', // replace with actual value
            'Name' => $this->input->post('Name'),
            'Designation' => $this->input->post('Designation'),
            'Your_Company_Name' => $this->input->post('Your_Company_Name'),
            'Nature_of_Business' => $this->input->post('Nature_of_Business'),
            'Business_Category' => $this->input->post('Business_Category'),
            'Company_Address' => $this->input->post('Company_Address'),
            'City' => $this->input->post('City'),
            'Pin_Code' => $this->input->post('Pin_Code'),
            'Email' => $this->input->post('Email'),
            'Mobile_Number' => $this->input->post('Mobile_Number'),
            'Annual_Turnover' => $this->input->post('Annual_Turnover'),
            'Year_Commencement' => $this->input->post('Year_Commencement'),
            'Destinations' => $this->input->post('Destinations'),
            'Trade_Associations' => $this->input->post('Trade_Associations'),
        );
             $table_name =  $this->input->post('table_name');
       
         
        // Insert data into the database
        $result = $this->Registernow_models->insert_data($table_name,$data);

        if ($result) {
            ?>
            <script>
                alert("Thank You For Registering.");
                // Redirect to another page (replace 'target_page.php' with the actual URL)
                window.location.href = '<?php echo base_url();?>';
            </script>
            <?php
        } else {
            echo "Error: " . $this->db->error();
        }
    }
    
}
