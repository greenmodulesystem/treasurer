<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trust_collection_service extends CI_Controller
{
    public function __construct(){
        parent::__construct();        
        $model_list = [
            'trust_collection/Trust_collection_Model' => 'MTrust',
            'general_collection/General_collection_Model' => 'MCollection'
        ];
        $this->load->model($model_list);
    }

    function save_form_data(){
        try{
            if($this->input->post('Particular', true) != null){
                $this->MTrust->Particular  =   $this->input->post('Particular', true);
                $this->MTrust->Quantity    =   $this->input->post('Quantity', true);
                $this->MTrust->Amount      =   $this->input->post('Amount', true);                
                $this->MTrust->Collector   =   $this->input->post('Collector', true);
                $this->MTrust->Accountable_form_number =   $this->input->post('Accountable_form_number', true);
                $this->MTrust->Collector_ID    =   $this->input->post('Collector_ID', true);
                if($this->input->post('Void', true) == true){                   
                    $this->MTrust->Remarks     =   $this->input->post('Remarks', true);
                    $this->MTrust->Void    =   "1";
                }
                $this->MTrust->save_form_data();                
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function delete_particular(){
        try{
            if($this->input->post('ID') != null){
                $this->MTrust->ID  =   $this->input->post('ID');
                $this->MTrust->delete_particular();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function save_all_data(){
        try{
            if(!empty($this->input->post('Payor', true)) && !empty($this->input->post('Particulars', true)) && !empty($this->input->post('Accountable_form_number', true))){       

                $this->MTrust->Accountable_form_number =   $this->input->post('Accountable_form_number', true);
                $this->MTrust->Particular  =   json_decode($this->input->post('Particulars', true));
                $this->MTrust->Payor       =   $this->input->post('Payor', true);
                $this->MTrust->paid_by  =   $this->input->post('Paid_by', true);
                $this->MTrust->Date_paid   =   $this->input->post('Date_paid', true);                               
                $this->MTrust->Address     =   $this->input->post('Address', true);  
                $this->MTrust->Amount   =   $this->input->post('Amount', true); 

                $this->MTrust->save_all_data();
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    public function save_data_with_bank(){
        try{
            if($this->input->post('Payor', true) != null){                 
                $this->MCollection->Particular  =   json_decode($this->input->post('Particulars', true));
                $this->MCollection->Payor       =   $this->input->post('Payor', true);
                $this->MCollection->Date_paid   =   $this->input->post('Date_paid', true);                
                $this->MCollection->Accountable_form_number =   $this->input->post('Accountable_form_number', true);  
                $this->MCollection->Address     =   $this->input->post('Address', true);        
                $this->MCollection->Check_no    =   $this->input->post('Che_no', true);
                $this->MCollection->Bank        =   $this->input->post('Bank', true);  
                $this->MCollection->Check_date  =   $this->input->post('Che_date', true);  
                                            
                $this->MCollection->save_all_data();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    public function save_data_mix_payment(){
        try{
            if(!empty($this->input->post('Particulars', true))){

                $this->MTrust->Accountable_form_number =   $this->input->post('Accountable_form_number', true);
                $this->MTrust->Particular  =   json_decode($this->input->post('Particulars', true));
                $this->MTrust->Payor       =   $this->input->post('Payor', true);
                $this->MTrust->paid_by  =   $this->input->post('Paid_by', true);
                $this->MTrust->Date_paid   =   $this->input->post('Date_paid', true);                               
                $this->MTrust->Address     =   $this->input->post('Address', true);  
                $this->MTrust->Bank   =   $this->input->post('Bank', true); 
                $this->MTrust->Check_no     =   $this->input->post('Che_no', true);
                $this->MTrust->Check_date   =   $this->input->post('Che_date', true);
                $this->MTrust->Amount   =   $this->input->post('C_amount', true);
                $this->MTrust->Mix_cash_amount  =  $this->input->post('C_cash_amount', true);
                $this->MTrust->save_data_mix_payment();

            }else{
                echo json_encode(array('error_message'=>'Error Processing'));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function search_particular(){
        try{
            if(!empty($this->input->post('particular', true))){
                $this->MTrust->Particular  =   $this->input->post('particular', true);
                $this->MTrust->search_particular();
            }else{                
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function search_particular_parent(){
        try{
            if(!empty($this->input->post('Parent', true))){
                $this->MTrust->Parent  =   $this->input->post('Parent', true);
                $this->MTrust->getParticular_parent();                
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}
?>