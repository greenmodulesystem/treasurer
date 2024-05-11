<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class accountable_form extends CI_Controller
{
    public function __construct(){
    parent::__construct();        
        $model_list = [
            'accountable_form/Accountable_Model' => 'MAccountable',
        ];
        $this->load->model($model_list);
    }   

    public function index(){
        $result = $this->MAccountable->get_or_type();
        if($result != null){
            $this->data['Result'] = $result;
            $this->data['Collectors'] = $this->MAccountable->get_collectors();
            $this->data['content'] = "accountable_form";
            $this->load->view('layout', $this->data);
        }        
    }
}
?>