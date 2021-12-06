<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_payer_service extends CI_Controller
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
            if(!empty($this->input->post('Name', true) || $this->input->post('Address', true))){
                $this->Mpay->Name = $this->input->post('Name', true);
                $this->Mpay->Address = $this->input->post('Address', true);

                $this->Mpay->save();
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}
?>