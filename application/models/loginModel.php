<?php

class loginModel extends CI_Model {

    public function CheckLoginDetails($dataObj) {
        $this->db->select("id,type,first_name,last_name,email_id");
        $this->db->where("username", $dataObj["username"]);
        $this->db->where("password", $dataObj["password"]);
        $this->db->from("user_reg_details");
        $userResult = $this->db->get()->row_array();
        if (!empty($userResult)) {
            $sessionArr = array(
                'id'=>$userResult["id"],
                'user_type'=>$userResult["type"],
                "username" => $dataObj['username'],
                "name" => $userResult['first_name'] . ' ' . $userResult['last_name'],
                "email_id" => $userResult['email_id']);
            
            $this->session->set_userdata($sessionArr);
            return printCustomMsg("TRUE","Login Successfull",$sessionArr);
        } else {
            return false
            ;
        }
    }

}
