<?php
    class Not_found extends CI_Controller
    {
        public function index(){
            $this->data['content'] = "not_found";
            $this->load->view('layout', $this->data);
        }
    }
?>