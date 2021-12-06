<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trust_collection extends CI_Controller
{
    public function __construct(){
        parent::__construct();        
        $model_list = [
            'trust_collection/Trust_collection_Model' => 'MTrust',
        ];
        $this->load->model($model_list);
    }

    public function index(){        
        $this->data['Result'] = $this->MTrust->get_particullar_amount(); 
        $this->data['banks'] = $this->MTrust->get_bank();        
        $this->data['content']  = "trust_collection";
        $this->load->view('layout', $this->data);
    }

    public function load_form_data(){
        $this->data['Result'] = $this->MTrust->get_particulars();
        $this->data['content'] = "load_form_data";
        $this->load->view('layout', $this->data);
    }

    public function load_payment_summary(){
        $this->data['Type'] = $this->MTrust->get_or_type();                   
        if(!empty($this->data['Type'])){
            $validity = $this->MTrust->check_validity($this->data['Type']->Accountable_form_number);     
            $same = $this->MTrust->check_same_or($this->data['Type']->Accountable_form_number);  
            $or_cedula = $this->MTrust->check_cedula($this->data['Type']->Accountable_form_number);
        }              
        if(!empty($this->data['Type'])){
            if(!empty($validity) || $this->data['Type']->Accountable_form_number === ''){ 
                $this->data['check_validity'] = 1;                   
            }else{
                $this->data['check_validity'] = 0;   
            }   
        }         
        $this->data['Checker'] = $this->MTrust->get_report_by_day();
        $this->data['Result'] = $this->MTrust->get_report_by_day();       
        $this->data['content'] = "load_payment_summary";
        $this->load->view('layout', $this->data);
    }

    public function print_receipt(){
        $data = json_decode($this->input->get('get', true))[0];
        if($data->bank === null){
            $data->check_no = null;
            $data->check_no = null;
            $data->check_date = null;
            $data->check_amount = null;
        }
        $this->data['Data'] = $data;                
        $this->data['content'] = "trust_print_receipt";
        $this->load->view('layout', $this->data);
    }
}
?>