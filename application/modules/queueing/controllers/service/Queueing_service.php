<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queueing_service extends CI_Controller 
{

    public function __construct()
	{
        parent::__construct();
        $model_list = [
            'Queueing_model' => 'MQueueing',
        ];

        $this->load->model($model_list);
    }
    


    public function Done(){
        try{    
            // $this->MQueueing->Application_ID = $this->input->post('application',TRUE);
            $now_serving = $this->input->post('now_serving',TRUE);

            if(empty($now_serving)){
                throw new Exception("No current queue", 1);
            }

            if($this->input->post('application',TRUE) != $now_serving){
                throw new Exception("Current queue conflict to selected applicant", 1);
            }
            $this->MQueueing->Application_ID = $this->input->post('application',TRUE);
            $this->MQueueing->Number = $this->input->post('number',TRUE);
            $this->MQueueing->Task_dept = 'collection';

            $response = $this->MQueueing->Done();
            if($response['has_error']){
                throw new Exception($response['message'], 1);
            }else{
                echo json_encode( array('has_error' => false, 'message' => $response['message']));
            }
        }catch(Exception $e){
            echo json_encode(array('has_error' => true , 'message' => $e->getMessage()));
        }
    }

    public function applicants(){
        try{    
            // $this->MQueueing->Number_type = $this->input->post('type',TRUE);
            // $this->MQueueing->Application_ID = 1;
            $response = $this->MQueueing->Get_all();
            if($response['has_error']){
                throw new Exception($response['message'], 1);
            }else{
                echo json_encode( array('has_error' => false, 'message' => $response['message']));
            }
        }catch(Exception $e){
            echo json_encode(array('has_error' => true , 'message' => $e->getMessage()));
        }
    }

    public function Pass(){
        try{

            $this->MQueueing->Task_dept = 'collection';
            $this->MQueueing->Number = $this->input->post('number',TRUE);
            $this->MQueueing->User_ID = $_SESSION['User_details']->ID;
            
            $response = $this->MQueueing->Pass();
            if($response['has_error']){
                throw new Exception($response['message'], 1);
            }else{
                echo json_encode( array('has_error' => false, 'message' => $response['message']));
            }
        }catch(Exception $e){
            echo json_encode(array('has_error' => true , 'message' => $e->getMessage()));
        }
     
    }

    public function Service_status(){
        try{

            $this->MQueueing->Task_dept = 'collection';
            $this->MQueueing->Window = $this->input->post('window',TRUE);
            $this->MQueueing->User_ID = $_SESSION['User_details']->ID;
            
            $response = $this->MQueueing->Update_window_status($this->input->post('status',TRUE));
            if($response['has_error']){
                throw new Exception($response['message'], 1);
            }else{
                echo json_encode( array('has_error' => false, 'message' => $response['message']));
            }
        }catch(Exception $e){
            echo json_encode(array('has_error' => true , 'message' => $e->getMessage()));
        }
    }
    public function Get_service_status(){
        try{
            
            $this->MQueueing->User_ID = $_SESSION['User_details']->ID;
            
            $response = $this->MQueueing->Get_status();
            if($response['has_error']){
                throw new Exception($response['message'], 1);
            }else{
                echo json_encode( array('has_error' => false, 'message' => $response['message']));
            }
        }catch(Exception $e){
            echo json_encode(array('has_error' => true , 'message' => $e->getMessage()));
        }
    }
    public function Assign(){
        try{
            $this->MQueueing->Number = $this->input->post('number',TRUE);
            $this->MQueueing->User_ID = $_SESSION['User_details']->ID;
            $this->MQueueing->Task_dept = 'collection';
            $this->MQueueing->Window = $this->input->post('window',TRUE);
            $response = $this->MQueueing->Assign();     
            if($response['has_error']){
                throw new Exception($response['message'], 1);
            }else{
                echo json_encode( array('has_error' => false, 'message' => $response['message']));
            }
        }catch(Exception $e){
            echo json_encode(array('has_error' => true , 'message' => $e->getMessage()));
        }
     
    }

    public function Update_applicant_payment_status(){
        try{    
            // $this->MQueueing->Application_ID = $this->input->post('application',TRUE);
           
            $this->MQueueing->Application_ID = $this->input->post('application',TRUE);
            
            $response = $this->MQueueing->Add_to_payment();
            if($response['has_error']){
                throw new Exception($response['message'], 1);
            }else{
                echo json_encode( array('has_error' => false, 'message' => $response['message']));
            }
        }catch(Exception $e){
            echo json_encode(array('has_error' => true , 'message' => $e->getMessage()));
        }
    }
    public function call(){
        try{    
            // $this->MQueueing->Application_ID = $this->input->post('application',TRUE);
            
            $this->MQueueing->Application_ID = $this->input->post('application',TRUE);
            $response = $this->MQueueing->Call_attention();
            if($response['has_error']){
                throw new Exception($response['message'], 1);
            }else{
                echo json_encode( array('has_error' => false, 'message' => $response['message']));
            }
        }catch(Exception $e){
            echo json_encode(array('has_error' => true , 'message' => $e->getMessage()));
        }
    }



    
}