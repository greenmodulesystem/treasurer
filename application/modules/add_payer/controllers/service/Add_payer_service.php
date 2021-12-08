<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class add_payer_service extends CI_Controller
{
    public function __construct(){
    parent::__construct();        
        $model_list = [
            'add_payer_model' => 'Mpay'
        ];
        $this->load->model($model_list);
    }

    public function save(){
        try{
            if(empty($this->input->post('Name', true)) || empty( $this->input->post('Address', true))){
                throw new Exception(ERROR_PROCESSING, true);   
            }

            $this->Mpay->Name = $this->input->post('Name', true);
            $this->Mpay->Address = $this->input->post('Address', true);

            $this->Mpay->save();
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}
?>