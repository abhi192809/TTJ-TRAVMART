<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Destionation extends CI_Controller
{
     public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        
        
        if (!$this->session->userdata('user_id')) {
            
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
        $this->load->model('Meeting_model/Destination_from');
        $data['Destination'] = $this->Destination_from->Get_Destination();
        
        $data['Get_AirLine'] = $this->Destination_from->Get_AirLine();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Destionation',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function VisitorAttraction(){
        $this->load->model('Meeting_model/Destination_from');
        $data['VisitorAttraction'] = $this->Destination_from->Get_VisitorAttraction();
        
        $data['Get_Places'] = $this->Destination_from->Get_Places();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Visitorattraction',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function Air_Connectivity(){
        $this->load->model('Meeting_model/Destination_from');
        $data['Air_Connectivity'] = $this->Destination_from->Get_Air_Connectivity();
        
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Air_Connectivity',$data);
        $this->load->view('Meeting/dashboard/footer');
    }
    
    public function Food(){
        $this->load->model('Meeting_model/Destination_from');
        $data['Food'] = $this->Destination_from->Get_Food();
        
        $data['Get_Places'] = $this->Destination_from->Get_Places();
        $this->load->view('Meeting/dashboard/header');
        $this->load->view('Meeting/dashboard/sidebar');
        $this->load->view('Meeting/dashboard/topbar');
        $this->load->view('Meeting/dashboard/Food',$data);
        $this->load->view('Meeting/dashboard/footer');
    }


    public function add_destination() {
        $this->load->model('Meeting_model/Destination_from');
        if ($this->input->post()) {
           
            $id = $this->input->post('destinationType');
            $name = $this->input->post('name');
            $titleLine = $this->input->post('titleLine');
            $description = $this->input->post('description');
            $selectedCountries = $this->input->post('multiSelect');
            
            $data = [
                'Market_Place_Country_id' => $id,
                'Place' => $name,
                'Tagline' => $titleLine,
                'Description' => $description,
            ];
    
            $new_entry = $this->Destination_from->insert_destination($data);
    
            
            if ($new_entry) {
                $mapData = [];
                foreach ($selectedCountries as $countryId) {
                    $mapData[] = [
                        'Market_Place_Destination' => $new_entry['id'],
                        'Market_place_Air_line_id' => $countryId
                    ];
                     
                    $mapInsertResult = $this->Destination_from->insert_AirLine_Map_place($mapData);
               
                }
            
                if ($mapInsertResult) {
                    echo json_encode(['success' => true, 'entry' => $new_entry]);
                } else {
           
                    $this->Destination_from->rollback_destination($new_entry['id']);
                    echo json_encode(['success' => false, 'message' => 'Failed to add destination']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add destination']);
            }
        }
    }


    public function delete_destination() {
        $this->load->model('Meeting_model/Destination_from');
        $id = $this->input->post('id');
    
        if ($id) {
            $result = $this->Destination_from->delete_destination($id);
            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete destination']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid destination ID']);
        }
    }


    public function add_Visitor_Attractions()
    {
        $this->load->model('Meeting_model/Destination_from');
    
        if (!empty($_FILES['images']['name'][0])) {
            $destination_id = $this->input->post('select_value');
            $images = $_FILES['images'];
            $texts = $this->input->post('texts');
    
            $data_to_insert = array();
            foreach ($images['tmp_name'] as $key => $tmp_name) {
           
           
                $image_name = $images['name'][$key];
                $image_path = 'assets/Meeting/Destination/' . $image_name; 
                move_uploaded_file($tmp_name, $image_path);
    
                $data_to_insert[] = array(
                    'Market_Place_Destination_id'=> $destination_id,
                    'Images' => $image_path, 
                    'Visitor_Attractions' => $texts[$key]
                );
            }
            $inserted = $this->Destination_from->insertVisitorAttractions($data_to_insert);
    
            if ($inserted) {
                echo json_encode(['success' => true, 'message' => 'Data inserted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to insert data']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No files uploaded']);
        }
    }

    public function delete_Visitor_Attraction(){
        
         $this->load->model('Meeting_model/Destination_from');
         $id = $this->input->post('id');
         $go = $this->Destination_from->delete_Visitor_Attraction($id);
         if($go == 1){
             echo 1;
         }
         else{
             0;
         }
    }
  
  
    public function add_Food()
    {
        $this->load->model('Meeting_model/Destination_from');
    
        if (!empty($_FILES['images']['name'][0])) {
            $destination_id = $this->input->post('select_value');
            $images = $_FILES['images'];
            $texts = $this->input->post('texts');
    
            $data_to_insert = array();
            foreach ($images['tmp_name'] as $key => $tmp_name) {
          
                $image_name = $images['name'][$key];
                $image_path = 'assets/Meeting/Destination/' . $image_name; 
                move_uploaded_file($tmp_name, $image_path);
    
                $data_to_insert[] = array(
                    'Market_Place_Destination_id'=> $destination_id,
                    'Images' => $image_path, 
                    'Food' => $texts[$key]
                );
            }
            $inserted = $this->Destination_from->insertFood($data_to_insert);
    
            if ($inserted) {
                echo json_encode(['success' => true, 'message' => 'Data inserted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to insert data']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No files uploaded']);
        }
    }


    public function delete_Food(){
        
         $this->load->model('Meeting_model/Destination_from');
         $id = $this->input->post('id');
         $go = $this->Destination_from->delete_Food($id);
         if($go == 1){
             echo 1;
         }
         else{
             0;
         }
    }
  

     public function Update_Air_Lines()
    {
          $this->load->model('Meeting_model/Destination_from');
           
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $Air_Lines = $this->input->post('Air_Lines');
            $Url = $this->input->post('Url');
            $data = [
                  'Air_Lines' => $Air_Lines,
                  'Url' => $Url,
                ];
            $newImagePath = null;
    
            if (!empty($_FILES['image_path']['name'])) {
                $config['upload_path'] = './assets/Meeting/Destination/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['image_path']['name'];
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('image_path')) {
                    $uploadData = $this->upload->data();
                    $newImagePath = 'assets/Meeting/Destination/' . $uploadData['file_name'];
                    $data['Images'] = $newImagePath;
                } else {
                    echo json_encode(['success' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
    
            $updateStatus = $this->Destination_from->Update_Air_Lines($id, $data);
    
            if ($updateStatus) {
                echo json_encode(['success' => true, 'new_image_path' => $newImagePath, 'id' => $id]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update visitor attraction']);
            }
        }
    }

  
    
    
   public function update_Visitor_Attraction()
    {
          $this->load->model('Meeting_model/Destination_from');
           
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $visitorAttraction = $this->input->post('visitor_attraction');
            
            $data = ['Visitor_Attractions' => $visitorAttraction];
            $newImagePath = null;
    
            if (!empty($_FILES['image_path']['name'])) {
                $config['upload_path'] = './assets/Meeting/Destination/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['image_path']['name'];
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('image_path')) {
                    $uploadData = $this->upload->data();
                    $newImagePath = 'assets/Meeting/Destination/' . $uploadData['file_name'];
                    $data['Images'] = $newImagePath;
                } else {
                    echo json_encode(['success' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
    
            $updateStatus = $this->Destination_from->update_Visitor_Attraction($id, $data);
    
            if ($updateStatus) {
                echo json_encode(['success' => true, 'new_image_path' => $newImagePath, 'id' => $id]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update visitor attraction']);
            }
        }
    }


    public function update_Food()
    {
          $this->load->model('Meeting_model/Destination_from');
           
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $Food = $this->input->post('Food');
            
            $data = ['Food' => $Food];
            $newImagePath = null;
    
            if (!empty($_FILES['image_path']['name'])) {
                $config['upload_path'] = './assets/Meeting/Destination/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['image_path']['name'];
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('image_path')) {
                    $uploadData = $this->upload->data();
                    $newImagePath = 'assets/Meeting/Destination/' . $uploadData['file_name'];
                    $data['Images'] = $newImagePath;
                } else {
                    echo json_encode(['success' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
    
            $updateStatus = $this->Destination_from->update_Food($id, $data);
    
            if ($updateStatus) {
                echo json_encode(['success' => true, 'new_image_path' => $newImagePath, 'id' => $id]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update visitor attraction']);
            }
        }
    }


    public function Air_lines() {
        $this->load->model('Meeting_model/Destination_from');
        
        if ($this->input->post()) {
            $config['upload_path'] = './assets/Meeting/Destination/'; 
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image')) {
                $data = $this->upload->data();
                $image_path = $data['file_name'];
                $airline = $this->input->post('airline');
                $url = $this->input->post('url');
                
                $id = $this->Destination_from->save_airline($airline, $url, $image_path);
                $entry = $this->Destination_from->ID_entry($id);
                echo json_encode($entry);
            }
        }
    }

    
    
    public function delete_Air_lines() {
        $this->load->model('Meeting_model/Destination_from');

        $id = $this->input->post('id');

        $result = $this->Destination_from->delete_Air_lines($id);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Row deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete row']);
        }
    }
    
    


}

