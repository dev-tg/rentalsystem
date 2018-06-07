<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class userRegistration_Model extends CI_Model {

    public function saveUserRegistrationData($regData) {

        $this->db->insert('user_reg_details', $regData);
        if ($this->db->affected_rows()) {

            return true;
        } else {
            return false;
        }
    }

    public function getAllRegDetails() {
        $this->db->select("*");
        $this->db->from("user_reg_details");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function checkUserName($uname) {
        $user=$uname;
        $this->db->select("username");
        $this->db->from("user_reg_details");
        $result = $this->db->get()->result_array();

        foreach ($result as $value) {
            
            if($value['username']==$uname) {
                return true;
            } 
        }
     
     
    }
   
}
