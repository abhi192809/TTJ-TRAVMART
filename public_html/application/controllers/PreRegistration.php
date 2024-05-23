<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreRegistration extends CI_Controller {
   public function __construct() {
        parent::__construct();
        $this->load->model('PreRegistration_models');
    }

   public function register() {
        $name = $this->input->get('name');
        $asbuyer = $this->input->get('asbuyer');
        $this->load->view('Website/header');
        $this->load->view('Website/pre-registration');
        $this->load->view('Website/footer');
    }
  
    public function checkEmail() {
        if ($this->input->post('email')) {
            $mail = $this->input->post('email');
            $result = $this->PreRegistration_models->checkEmailExists($mail);

            if ($result) {
                echo 'not_ok';
            } else {
                echo 'ok';
            }
        }
    }

    public function processRegistration() {
        if ($this->input->post('Name')) {
            $name = $this->input->post("Name");
            $email = $this->input->post("Email");
            $number = $this->input->post("Number");
            $location = $this->input->post("Location");
            $place = $this->input->post("Place");
            $buyer = $this->input->post("Buyer");
            $page_namer = $this->input->post("page_name");

            $result = $this->PreRegistration_models->checkEmailExists($email);

            if ($result) {
                echo 'not_ok';
            } else {
                $data = array(
                    'Buyer' => $buyer,
                    'Place' => $place,
                    'Name' => $name,
                    'Email' => $email,
                    'Number' => $number,
                    'Location' => $location,
                    'page_name' => $page_namer,
                );

                $this->PreRegistration_models->insertRegistration($data);
                echo 1;
            }
        }
    }

}
