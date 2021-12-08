<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_payer extends CI_Controller
{
    public function __construct(){
    parent::__construct();        
        $model_list = [
            
        ];
        $this->load->model($model_list);
    }

    public function index(){
        $this->data['content'] = "index";
        $this->load->view('layout', $this->data);
    }
}
?>