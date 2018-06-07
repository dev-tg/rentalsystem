<?php

class Furniture_Model extends CI_Model {

    public function getFurniturePostData() {
        $this->db->select("DATE_FORMAT(fpd.created_on,'%d%M%Y') as created_on,CONCAT(urd.first_name,' ' ,urd.last_name) as post_by ,fpd.availability_duration,fd.file_path as thumbnail,urd.contact_number,urd.email_id,fpd.post_category_id ,fpd.title,fpd.description,fcd.category,fmd.material,ftd.type,states.state_name,scd.city_name,fpd.charge_per_day,fpd.post_image_id");
        $this->db->from("furniture_post_details as fpd")->join("user_reg_details as urd",'urd.id=fpd.posted_by');
        $this->db->join('furniture_category_details as fcd', 'fcd.id=fpd.category_id')->join('files_details as fd',"fpd.thumbnail=fd.id",'left');
        $this->db->join('furniture_material_details as fmd', 'fmd.id=fpd.material_id');
        $this->db->join('furniture_type_details as ftd', 'ftd.id=fpd.type_id');
        $this->db->join('states', 'states.id=fpd.state');
        $this->db->join('state_city_details as scd', 'scd.id=fpd.city');

        //   $this->db->where("posted_by", 1);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getFurnitureCategory() {
        $this->db->select("*");
        $this->db->from("furniture_category_details");
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function getFurnitureMaterial() {
        $this->db->select("*");
        $this->db->from("furniture_material_details");
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function getFurnitureType() {
        $this->db->select("*");
        $this->db->from("furniture_type_details");
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function savePostData($data) {
        if (isset($data['id'])) {
            $data["post_image_id"] = json_encode($data["post_image_id"]);
            $upAr = [];
            $upAr["id"] = $data['id'];
            $upAr["city"] = $data["city"];
            $upAr["post_category_id"] = $data["post_category_id"];
            $upAr["title"] = $data["title"];
            $upAr["description"] = $data["description"];
            $upAr["type_id"] = $data["type_id"];
            $upAr["state"] = $data["state"];
            $upAr["material_id"] = $data["material_id"];
            $upAr["type_id"] = $data["type_id"];
            $upAr["post_image_id"] = ($data["post_image_id"]) ? $data["post_image_id"] : '';
            $upAr["thumbnail"] = $data["thumbnail"] = ( isset($data["thumbnail"])) ? $data["thumbnail"] : '';
            $upAr["charge_per_day"] = $data["charge_per_day"];
            $upAr["availability_duration"] = $data["availability_duration"];
            $upAr["updated_on"] = date("Y-m-d");
            $this->db->where('id', $data["id"])->update("furniture_post_details", $upAr);
            return ($this->db->affected_rows()) ? true : false;
        } else {
            $data["post_image_id"] = json_encode($data["post_image_id"]);
            $data["posted_by"] = GetLoggedInUserId();
            $data["created_on"] = date("y-m-d H:i:s");
            $this->db->insert("furniture_post_details", $data);

            return ($this->db->affected_rows()) ? true : false;
        }
    }

}
