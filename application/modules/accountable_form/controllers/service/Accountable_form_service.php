<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accountable_form_service extends CI_Controller
{
    public function __construct(){
        parent::__construct();        
        $model_list = [
            'accountable_form/Accountable_Model' => 'MAccountable',
        ];
        $this->load->model($model_list);
    }

    public function save_accountable_form(){
        try {            
            if ($this->input->post('Collector_ID', true) != null && !empty($this->input->post('Or_type', true))) {
                $this->MAccountable->or_type    =   $this->input->post('Or_type', true);
                $this->MAccountable->stub_no    =   $this->input->post('Stub_no', true);
                $this->MAccountable->or_for     =   $this->input->post('OR_for', true);
                $this->MAccountable->start_or   =   $this->input->post('Start_or', true);
                $this->MAccountable->end_or     =   $this->input->post('End_or', true);
                $this->MAccountable->date_release   =   $this->input->post('Date_release', true);
                $this->MAccountable->release_by =   $this->input->post('Release_by', true);
                $this->MAccountable->collector_ID   =   $this->input->post('Collector_ID', true);

                $this->MAccountable->save_accountable_form();
            }else{
                echo json_encode(array('error_message' => 'Processing Error', 'has_error' => true));
            }
        } 
        catch (exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }
    public function save_account_form(){
        try{
            if(!empty($this->input->post('Data', true))){
                $this->MAccountable->Data = $this->input->post('Data', true);
                $this->MAccountable->or_type = $this->input->post('Or_type', true);
                $this->MAccountable->date_release = $this->input->post('Date_release', true);
                $this->MAccountable->release_by = $this->input->post('Release_by', true);
                $this->MAccountable->collector_ID = $this->input->post('Collector_ID', true);
                $this->MAccountable->Save_account_form();
            }
        }
        catch(Exception $ex){
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
}
?>