<?php

class Profile_controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("Profile_Model", "modelObj");
    }

    public function getProfile() {
        $result = $this->modelObj->getProfile();
          echo json_encode($result);
    }
    public function updateProfile() {
        $input= json_decode($this->input->raw_input_stream,true);
        $result = $this->modelObj->updateProfile($input);
        if($result){
            echo printCustomMsg("SUCCESS","Profile Updated Successfully",1);  
        }
        else{
            echo printCustomMsg("SUCCESS","No Data Changed",1);  
        }
          
    }
    public function getFilePaths() {
        $fileIds= json_decode($this->input->raw_input_stream,true);
        $result = $this->modelObj->getFilePaths($fileIds);
        echo json_encode($result);
    }

}
