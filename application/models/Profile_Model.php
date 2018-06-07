<?php

class Profile_Model extends CI_Model{
    function getProfile(){
        return $data=$this->db->select('*')->get_where("user_reg_details",array("username"=> GetLoggedInUser()))->row_array();
        
    }
    
    function updateProfile($input){
    if(empty($input["password"])){
        unset($input["password"]);
    }    
        $this->db->where("username", GetLoggedInUser())->update("user_reg_details",$input);
    
        if($this->db->affected_rows()){
            return true;
        }
        
        
    }
}