<?php

class vehicleMaster_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("vehicleMaster_Model", "modelObj");
    }

    public function getVehicleTypes() {
        

        $result = $this->modelObj->getVehicleTypes();
        echo json_encode($result);
//        print_r($result);
    }

    public function getRentCategory() {
        $data = $this->modelObj->getRentCategory();
        echo json_encode($data);
    }

    public function getAutomobileType() {
        $data = $this->modelObj->getAutomobileType();
        echo json_encode($data);
    }

    public function getAutomobileManufacturer() {
        $type_id = $this->input->raw_input_stream;

        $data = $this->modelObj->getAutomobileManufacturer($type_id);
        echo json_encode($data);
    }

    public function getManufacturerModels() {
        $mf_id = $this->input->raw_input_stream;

        $data = $this->modelObj->getManufacturerModels($mf_id);
        echo json_encode($data);
    }

    public function getStates() {
        $states = $this->modelObj->getStates();
        echo json_encode($states);
    }

    public function getStateWizeCity() {
        $state_id = $this->input->raw_input_stream;
        $cities = $this->modelObj->getStateWizeCity($state_id);
        echo json_encode($cities);
    }

    public function savePostData() {
        $data = json_decode($this->input->raw_input_stream, true);
//        print_r($data);
//        exit;
        $result = $this->modelObj->savePostData($data);
        if ($result) {

            echo printCustomMsg("SUCCESS", "Add Successfully Posted", 1);
        }
    }

    public function uploadAttachment() {
        if (!empty($_FILES["file"])) {
            $file_name = $_FILES["file"]["name"];
            $temp_name = $_FILES["file"]["tmp_name"];
            $imgtype = $_FILES["file"]["type"];
            $pathToUpload = "upload/addimages/";

            if (!is_dir($pathToUpload)) {
                mkdir($pathToUpload, 0777, true);
            }

            $filePath = $pathToUpload . $_FILES["file"]["name"];
            if (move_uploaded_file($temp_name, $filePath)) {
                $insertArr = array(
                    'file_name' => $file_name,
                    'upload_hint' => "",
                    'file_path' => $filePath,
                );

                $result = $this->modelObj->InsertUploadedFIleData($insertArr);

                echo printCustomMsg("SUCCESS", "File Uploaded", $result);
            } else {
                echo printCustomMsg("ERROR", "File Upload Failed", -1);
            }
        }
    }

    public function getFilePaths() {
        $fileIds= json_decode($this->input->raw_input_stream,true);
        $result = $this->modelObj->getFilePaths($fileIds);
        echo json_encode($result);
    }

}
