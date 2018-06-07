<?php

class Clothing_Model extends CI_Model {

    public function getClothingPostData() {
        $this->db->select("CONCAT(urd.first_name,' ' ,urd.last_name) as post_by ,urd.contact_number,urd.email_id,cpd.post_category_id ,fd.file_path as thumbnail,cpd.post_image_id,cpd.availability_duration,cpd.charge_per_day,cpd.title,cpd.description,ccd.category,cmd.manufacturer,czd.size,states.state_name,scd.city_name, DATE_FORMAT(cpd.created_on, '%d% %M %Y') as created_on");
        $this->db->from("clothing_post_details as cpd")->join("user_reg_details as urd",'urd.id=cpd.posted_by');
        $this->db->join('clothing_category_details as ccd', 'ccd.id=cpd.category_id')->join('files_details as fd',"cpd.thumbnail=fd.id",'left');
        $this->db->join('clothing_manufacturer_details as cmd', 'cmd.id=cpd.manufacturer_id');
        $this->db->join('clothing_size_details as czd', 'czd.id=cpd.size_id');
        $this->db->join('states', 'states.id=cpd.state');
        $this->db->join('state_city_details as scd', 'scd.id=cpd.city');

        //  $this->db->where("posted_by", 1);
        $result = $this->db->get()->result_array();
        return $result;
   
    }

    public function getClothingCategory() {
        $this->db->select("*");
        $this->db->from("clothing_category_details");
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function getClothingType() {
        $this->db->select("*");
        $this->db->from("clothing_type_details");
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function getClothingManufacturer() {
        $this->db->select("*");
        $this->db->from("clothing_manufacturer_details");
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function getClothingSizeDetails() {
        $this->db->select("*");
        $this->db->from("clothing_size_details");
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function savePostData($data) {
        if (isset($data['id'])) {
            $upAr = [];
            $upAr["id"] = $data['id'];
            $upAr["city"] = $data["city"];
            $upAr["post_category_id"] = $data["post_category_id"];
            $upAr["title"] = $data["title"];
            $upAr["description"] = $data["description"];
            $upAr["type_id"] = $data["type_id"];
            $upAr["state"] = $data["state"];
            $upAr["size_id"] = $data["size_id"];
            $upAr["manufacturer_id"] = $data["manufacturer_id"];
            $upAr["post_image_id"] = ($data["post_image_id"]) ? $data["post_image_id"] : '';
            $upAr["thumbnail"] = $data["thumbnail"]=( isset($data["thumbnail"]))? $data["thumbnail"]:'';
            $upAr["charge_per_day"] = $data["charge_per_day"];
            $upAr["availability_duration"] = $data["availability_duration"];
            $upAr["updated_on"] = date("Y-m-d");
            $upAr["post_image_id"] = json_encode($data["post_image_id"]);
            $this->db->where('id', $data["id"])->update("clothing_post_details", $upAr);
            return ($this->db->affected_rows()) ? true : false;
        } else {

            $data["post_image_id"] = json_encode($data["post_image_id"]);
            $data["posted_by"] = GetLoggedInUserId();
            $data["created_on"] = date("y-m-d H:i:s");
            $this->db->insert("clothing_post_details", $data);

            return ($this->db->affected_rows()) ? true : false;
        }
    }

}
