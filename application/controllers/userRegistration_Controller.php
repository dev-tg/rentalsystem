<?php

class userRegistration_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("userRegistration_Model", "regModel");
    }

    public function index() {
        
        if (isset($this->session->username)&&isset($this->session->user_type)&&isset($this->session->id)) {
           
                
                $this->load->view('home/home_view');
            }
         else {
            $this->load->view('user_view');
        }
    }

    public function saveUserRegistrationData() {

        $regData = json_decode($this->input->raw_input_stream, true);
        if (isset($regData)) {
            $insert_res = $this->regModel->saveUserRegistrationData($regData);
            if ($insert_res) {

                echo printCustomMsg("SUCCESS", "Registered successfully", 1);
            }
        } else {
            echo printCustomMsg("ERR", "Please Provide User Registration Details ", -1);
        }
    }

    public function getRegDetails() {

        $regDetail = $this->regModel->getAllRegDetails();
        echo json_encode($regDetail);
    }

    public function checkRegisteredUserNames() {
        $username = $this->input->raw_input_stream;
        $unStatus = $this->regModel->checkUserName($username);

        if ($unStatus) {


            echo json_encode(array('isExist' => $unStatus));
        } else {

            echo json_encode(array('isExist' => false));
        }
    }

}
