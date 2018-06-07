<?php

class AllPost_controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("AllPost_Model", "modelObj");
    }

    public function getAllPosts() {
        $result = $this->modelObj->getAllPosts();
          echo json_encode($result);
    }
     public function getMyAllPosts() {
        $result = $this->modelObj->getAllPosts(GetLoggedInUserId());
          echo json_encode($result);
    }
    public function getFilePaths() {
        $fileIds= json_decode($this->input->raw_input_stream,true);
        $result = $this->modelObj->getFilePaths($fileIds);
        echo json_encode($result);
    }
    
    public function deletePost() {
        $input= json_decode($this->input->raw_input_stream,true);
        $result = $this->modelObj->deletePost($input);
        if($result){
            echo printCustomMsg('SUCCESS','Post Deleted Successfully',1);
        }
        else{
            echo printCustomMsg('ERROR','Error in Deleting Post',-1);
        }
       
    }
    public function getPostsCount() {
        echo json_encode($this->modelObj->getPostsCount());
    }
    

}
