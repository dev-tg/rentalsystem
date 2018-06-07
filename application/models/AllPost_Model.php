<?php

class AllPost_Model extends CI_Model {

    public function getVehiclePostData($postedBy = null) {
        $this->db->select("vpd.id,vpd.city,vpd.post_category_id,vpd.title,vpd.description,vpd.type_id,vpd.state,vpd.model_id,vpd.post_image_id,vpd.manufacturer_id,vpd.post_image_id,fd.file_path as thumbnail ,vpd.charge_per_day,vpd.milage,vpd.availability_duration,atd.type,amd.manufacturer_name,ammd.model_name,states.state_name,scd.city_name,DATE_FORMAT(vpd.created_on, '%d% %M %Y') as created_on");
        $this->db->from("vehicles_post_details as vpd");
        $this->db->join('automobiles_type_details as atd', 'atd.id=vpd.type_id');
        $this->db->join('automobile_manufacturer_details as amd', 'amd.id=vpd.manufacturer_id');
        $this->db->join('automobile_manufacturer_model_details as ammd', 'ammd.id=vpd.model_id');
        $this->db->join('states', 'states.id=vpd.state');
        $this->db->join('files_details as fd', 'fd.id=vpd.thumbnail', 'left');
        $this->db->join('state_city_details as scd', 'scd.id=vpd.city');
//        $this->db->limit($pagination["end"],$pagination["start"]);
        if ($postedBy) {
            $this->db->where("posted_by", $postedBy);
        }
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getClothingPostData($postedBy = null) {
        $this->db->select("cpd.id,cpd.category_id,cpd.type_id,cpd.manufacturer_id,cpd.size_id,cpd.state,cpd.post_image_id,cpd.availability_duration,fd.file_path as thumbnail,cpd.charge_per_day,cpd.city,cpd.post_category_id,cpd.title,cpd.description,ccd.category,cmd.manufacturer,czd.size,states.state_name,scd.city_name");
        $this->db->from("clothing_post_details as cpd");
        $this->db->join('clothing_category_details as ccd', 'ccd.id=cpd.category_id');
        $this->db->join('clothing_manufacturer_details as cmd', 'cmd.id=cpd.manufacturer_id');
        $this->db->join('clothing_size_details as czd', 'czd.id=cpd.size_id');
        $this->db->join('states', 'states.id=cpd.state');
        $this->db->join('state_city_details as scd', 'scd.id=cpd.city');
        $this->db->join('files_details as fd', 'fd.id=cpd.thumbnail', 'left');
        if ($postedBy) {
            $this->db->where("posted_by", $postedBy);
        }
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function getFurniturePostData($postedBy = null) {
        $this->db->select("fpd.id,fpd.state,fpd.type_id,fpd.category_id,fpd.material_id,fpd.availability_duration,fpd.post_image_id,fd.file_path as thumbnail,fpd.charge_per_day,fpd.city,fpd.post_category_id,fpd.title,fpd.description,fcd.category,fmd.material,ftd.type,states.state_name,scd.city_name");
        $this->db->from("furniture_post_details as fpd");
        $this->db->join('furniture_category_details as fcd', 'fcd.id=fpd.category_id');
        $this->db->join('furniture_material_details as fmd', 'fmd.id=fpd.material_id');
        $this->db->join('furniture_type_details as ftd', 'ftd.id=fpd.type_id');
        $this->db->join('states', 'states.id=fpd.state');
        $this->db->join('state_city_details as scd', 'scd.id=fpd.city');
        $this->db->join('files_details as fd', 'fd.id=fpd.thumbnail', 'left');
        if ($postedBy) {
            $this->db->where("posted_by", $postedBy);
        }
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getAllPosts($postedBy = null) {
        $allPosts = [];
        $data1 = $this->getVehiclePostData($postedBy);
        $data2 = $this->getClothingPostData($postedBy);
        $data3 = $this->getFurniturePostData($postedBy);
        foreach ($data1 as $val) {
            $allPosts[] = $val;
        };
        foreach ($data2 as $val) {
            $allPosts[] = $val;
        };
        foreach ($data3 as $val) {
            $allPosts[] = $val;
        };

        return $allPosts;
    }

    public function getPostTableName($PostCat_id) {
        $table_name = $this->db->select("post_table_name")->get_where("product_categories", array("id" => $PostCat_id))->row_array();
        return $table_name['post_table_name'];
    }

    public function deletePost($input) {
        $tb_nm = $this->getPostTableName($input['post_category_id']);
        if (empty(!$tb_nm)) {
            $this->db->where('id', $input['id'])->delete($tb_nm);
            if ($this->db->affected_rows()) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getPostsCount() {
        $totalClothing = $this->db->select("COUNT('id') as posts")->from("clothing_post_details")->get()->row_array();
    }

}
