<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_collection_service extends CI_Controller
{
    public function __construct(){
    parent::__construct();        
        $model_list = [
            'general_collection/General_collection_Model' => 'MCollection',
        ];
        $this->load->model($model_list);
    }

    public function save_particular(){                
        try{
            if(!empty($this->input->post('Particular', true)) && !empty($this->input->post('Category', true)) && !empty($this->input->post('Type', true))){
                $this->MCollection->Particular  = $this->input->post('Particular', true);
                $this->MCollection->Amount      = $this->input->post('Amount', true);
                $this->MCollection->Category    = $this->input->post('Category', true);               
                $this->MCollection->Group       = $this->input->post('Group', true);
                $this->MCollection->Collection_type = $this->input->post('Type', true);
                $this->MCollection->NewGroup    =   $this->input->post('NewGroup', true);

                $this->MCollection->save_particular();              
            }else{
                echo json_encode(array('error_message'=>'Check your data', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }    

    public function save_form_data(){            
        try{
            if($this->input->post('Particular', true) != null){
                $this->MCollection->Particular  =   $this->input->post('Particular', true);
                $this->MCollection->Quantity    =   $this->input->post('Quantity', true);
                $this->MCollection->Amount      =   $this->input->post('Amount', true);                
                $this->MCollection->Collector   =   $this->input->post('Collector', true);
                $this->MCollection->Accountable_form_number =   $this->input->post('Accountable_form_number', true);
                $this->MCollection->Collector_ID    =   $this->input->post('Collector_ID', true);
                if($this->input->post('Void', true) == true){                   
                    $this->MCollection->Remarks     =   $this->input->post('Remarks', true);
                    $this->MCollection->Void    =   "1";
                }
                $this->MCollection->save_form_data();                
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    public function save_all_data(){       
        try{
            if($this->input->post('Payor', true) != null && !empty($this->input->post('Accountable_form_number', true)) && !empty($this->input->post('Particulars', true))){
                $Particulars = json_decode($this->input->post('Particulars', true));                                   
                
                $this->MCollection->Particular  =   $Particulars;
                $this->MCollection->Total_amount = $this->input->post('Amounts', true);
                $this->MCollection->Payor       =   $this->input->post('Payor', true);
                $this->MCollection->Paid_by     =   $this->input->post('Paid_by', true);
                $this->MCollection->Date_paid   =   $this->input->post('Date_paid', true);                
                $this->MCollection->Accountable_form_number =   $this->input->post('Accountable_form_number', true);  
                $this->MCollection->Address     =   $this->input->post('Address', true);              
                                            
                $this->MCollection->save_all_data();
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
            if($this->input->post('Payor', true) != null && !empty($this->input->post('Particulars', true))){
                $Particulars = json_decode($this->input->post('Particulars', true));                      

                $this->MCollection->Particular  =   $Particulars;
                $this->MCollection->Payor       =   $this->input->post('Payor', true);
                $this->MCollection->Paid_by     =   $this->input->post('Paid_by', true);
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

    public function save_data_mixed_pmnt(){
        try{
            if(!empty($this->input->post('Payer')) || !empty($this->input->post('Particulars'))){
                $this->MCollection->Particular  =   json_decode($this->input->post('Particulars', true));
                $this->MCollection->Accountable_form_number =   $this->input->post('Accountable_form_number', true); 
                $this->MCollection->Payor       =   $this->input->post('Payer', true);
                $this->MCollection->Paid_by     =   $this->input->post('Paid_by', true);
                $this->MCollection->Address     =   $this->input->post('Address', true);     
                $this->MCollection->Date_paid   =   $this->input->post('Date_paid', true);                                                    
                $this->MCollection->Check_no    =   $this->input->post('Mix_cheque_no', true);
                $this->MCollection->Bank        =   $this->input->post('Mix_bank', true);  
                $this->MCollection->Check_date  =   $this->input->post('Mix_cheque_date', true);    
                $this->MCollection->Mix_cash_amount =   $this->input->post('Mix_cash_amount', true);
                $this->MCollection->Cash_amount     =   $this->input->post('Mix_cheque_total', true);             

                $this->MCollection->save_mixed_payment();
            }else{
                throw new Exception("Empty Payer or Particulars", true);
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function update_fees(){
        try{
            if(!empty($this->input->post('Data', true))){
                $this->MCollection->Data = $this->input->post('Data', true);
                $this->MCollection->update_fees();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    public function delete_fees(){
        try{
            if(!empty($this->input->post('ID', true))){
                $this->MCollection->ID = $this->input->post('ID', true);
                $this->MCollection->delete_fees();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    public function delete_particular(){
        try{
            if($this->input->post('ID') != null){
                $this->MCollection->ID  =   $this->input->post('ID');
                $this->MCollection->delete_particular();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    public function get_payer_name(){
        try{
            if(!empty($this->input->post('payer_name', true))){
                $this->MCollection->payer_name = $this->input->post('payer_name', true);
                $this->MCollection->get_payer();
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function search_particular(){
        try{
            if(!empty($this->input->post('particular', true))){
                $this->MCollection->Particular = $this->input->post('particular', true);
                $this->MCollection->getParticular();
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function search_particular_parent(){
        try{
            if(!empty($this->input->post('Parent', true))){
                $this->MCollection->Parent  =   $this->input->post('Parent', true);
                $this->MCollection->getParticular_parent();                
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    /** get particular information data */
    public function get_particular_info(){
        try{
            if(empty($this->input->get('PartID', true))){
                throw new Exception(ERROR_PROCESSING, true);
            }
            $this->MCollection->ID = $this->input->get('PartID', true);
            $this->MCollection->Type = $this->input->post('Type', true);
            $result = $this->MCollection->get_particular_info();
            echo json_encode($result);
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true)); 
        }
    }

    /* save updated data of particular */
    public function update_particular(){
        try{
            $this->MCollection->ID          = $this->input->post('ID', true);
            $this->MCollection->Particular  = $this->input->post('Particular', true);        
            $this->MCollection->Amount      = $this->input->post('Amount', true);      
            $this->MCollection->Group       = $this->input->post('Group', true);
            $this->MCollection->ColType     = $this->input->post('ColType', true);              
            if(empty($this->input->post('ColType', true))){
                throw new Exception("Please select collection type", true);
            }
            $this->MCollection->update_particular();            
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true)); 
        }
        if(empty($this->input->post('ID', true))){
            throw new Exception(ERROR_PROCESSING, true);
        }        
    }
}
