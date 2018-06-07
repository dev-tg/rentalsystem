<?php

class Furniture_Controller extends MY_Controller {
      
    function __construct() {
        parent::__construct();

        $this->load->model("Furniture_Model","modelObj");
        $this->load->model("Furniture_Model","automobileObj");
    }

    public function getFurniturePostData() {
        $result = $this->modelObj->getFurniturePostData();
        echo json_encode($result);
        
    }

     public function getFurnitureCategory() {
        $data = $this->modelObj->getFurnitureCategory();
        echo json_encode($data);
     }

    public function getFurnitureMaterial() {
        $data = $this->modelObj->getFurnitureMaterial();
        echo json_encode($data);
    }

    public function getFurnitureType() {
        

       $data = $this->modelObj->getFurnitureType();
        echo json_encode($data);
    }

   
    public function savePostData() {
        $data= json_decode($this->input->raw_input_stream,true);
        
        $result = $this->modelObj->savePostData($data);
        if($result){
        
            echo printCustomMsg("SUCCESS","Add Successfully Posted",1);
        
        }
    }
}





