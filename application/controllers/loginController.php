<?php

Class loginController extends CI_Controller {
public function __construct() {
        parent::__construct();
        $this->load->model('loginModel', 'modelObj');
     }

    public function authlogin() {
        $dataObj = json_decode($this->input->raw_input_stream, true);

        if (isset($dataObj['username']) && isset($dataObj['password'])) {
            if ($dataObj['username'] != '' && $dataObj['password'] != '') {
               $result= $this->modelObj->CheckLoginDetails($dataObj);
               if($result)
                   {
                   echo $result;
                   }
                   else
                   {
                       echo printCustomMsg("SUCCESS","Invaid Username and Password",1);
                   }
               
            } else {
                echo printCustomMsg("ERROR", "Username or Password cannot be blank");
            }
        } else {
            echo printCustomMsg("ERROR", "Please Provide the Username and Password");
        }
    }
    public function getLoggedInUserSession() {
        if(isset($this->session->userdata["id"])&&isset($this->session->userdata["username"])){
         $usrData=$this->session->userdata;
         echo printCustomMsg("SUCCESS","Data Loaded Successfully",$usrData);
    }else{
         echo 'false';
    }
    }
    public function logout(){
         
         $this->session->sess_destroy();
         redirect(base_url());
      
     }


}
