<?php

class Automobile_Model extends CI_Model {

    public function getVehiclePostData($pagination) {
        $this->db->select("CONCAT(urd.first_name,' ' ,urd.last_name) as post_by ,urd.contact_number,urd.email_id,vpd.post_category_id  ,vpd.title,vpd.description,vpd.post_image_id,fd.file_path as thumbnail ,vpd.availability_duration,vpd.charge_per_day,vpd.milage,vpd.availability_duration,atd.type,amd.manufacturer_name,ammd.model_name,states.state_name,scd.city_name,DATE_FORMAT(vpd.created_on, '%d% %M %Y') as created_on");
        $this->db->from("vehicles_post_details as vpd");
        $this->db->join('automobiles_type_details as atd', 'atd.id=vpd.type_id')->join("user_reg_details as urd",'urd.id=vpd.posted_by');
        $this->db->join('automobile_manufacturer_details as amd', 'amd.id=vpd.manufacturer_id');
        $this->db->join('automobile_manufacturer_model_details as ammd', 'ammd.id=vpd.model_id');
        $this->db->join('states', 'states.id=vpd.state');
        $this->db->join('files_details as fd', 'fd.id=vpd.thumbnail','left');
        $this->db->join('state_city_details as scd', 'scd.id=vpd.city');
//        $this->db->limit($pagination["end"],$pagination["start"]);
        //   $this->db->where("posted_by", 1);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getRentCategory() {
        $data = $this->db->select("*")->from("product_categories")->get()->result_array();
        return $data;
    }

    public function getAutomobileType() {
        $data = $this->db->select("*")->from("automobiles_type_details")->get()->result_array();
        return $data;
    }

    public function getAutomobileManufacturer($type_id) {
        $data = $this->db->select("*")->get_where("automobile_manufacturer_details", array("type_id" => $type_id))->result_array();
        return $data;
    }

    public function getManufacturerModels($mf_id) {
        $data = $this->db->select("*")->get_where("automobile_manufacturer_model_details", array("manufacturer_id" => $mf_id))->result_array();
        return $data;
    }

    public function getStates() {
        $data = $this->db->select("*")->get("states")->result_array();
        return $data;
    }

    public function getStateWizeCity($state_id) {
        $data = $this->db->select("id,city_name")->get_where("state_city_details", array("state_id" => $state_id))->result_array();
        return $data;
    }

    public function savePostData($data) {
        if(isset($data['id'])){
            $upAr=[];
            $upAr["id"]=$data['id'];
            $upAr["city"]=$data["city"];
            $upAr["post_category_id"]=$data["post_category_id"];
            $upAr["title"]=$data["title"];
            $upAr["description"]=$data["description"];
            $upAr["type_id"]=$data["type_id"];
            $upAr["state"]=$data["state"];
            $upAr["model_id"]=$data["model_id"];
            $upAr["manufacturer_id"]=$data["manufacturer_id"];
            $upAr["post_image_id"]=($data["post_image_id"])?json_encode($data["post_image_id"]):'';
            $upAr["thumbnail"] = $data["thumbnail"]=( isset($data["thumbnail"]))? $data["thumbnail"]:'';
            $upAr["charge_per_day"]=$data["charge_per_day"];
            $upAr["milage"]=$data["milage"];
            $upAr["availability_duration"]=$data["availability_duration"];
            $upAr["updated_on"]=date("Y-m-d");
            $this->db->where('id',$data["id"])->update("vehicles_post_details",$upAr);
            return ($this->db->affected_rows()) ? true : false;
        }
        else{
    $data["posted_by"]= GetLoggedInUserId();
        $data["post_image_id"]= json_encode( $data["post_image_id"]);
        $data["created_on"] = date("y-m-d H:i:s");
        $this->db->insert("vehicles_post_details", $data);

        return ($this->db->affected_rows()) ? true : false;
        }
    }

    public function InsertUploadedFIleData($insertArr) {
        $this->db->insert('files_details', $insertArr);
        $file_id = $this->db->insert_id();
        
        return array("file_id" => $file_id);
    }
     public function getFilePaths($file_ids) {
        $this->db->select("id,file_name,file_path");
        $this->db->from(" files_details");
        $this->db->where_in("id", $file_ids);
        $result = $this->db->get()->result_array();
        return $result;
    }


}
