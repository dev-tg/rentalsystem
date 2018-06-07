<?php

class Clothing_Controller extends MY_Controller {
      
    function __construct() {
        parent::__construct();

        $this->load->model("Clothing_Model","modelObj");
        $this->load->model("Clothing_Model","automobileObj");
    }

    public function getClothingPostData() {
        $result = $this->modelObj->getClothingPostData();
        echo json_encode($result);
        
    }

     public function getClothingCategory() {
        $data = $this->modelObj->getClothingCategory();
        echo json_encode($data);
     }

    public function getClothingType() {
        
        $data = $this->modelObj->getClothingType();
        echo json_encode($data);
    }

    public function getClothingManufacturer() {
        
        $data = $this->modelObj->getClothingManufacturer();
        echo json_encode($data);
    }

    public function getClothingSizeDetails() {
        
        $data = $this->modelObj->getClothingSizeDetails();
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



