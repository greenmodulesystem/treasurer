<?php
    class Order_of_payment_services_model extends CI_Model
    {
        private $table = array(
            "particular"    => "tbl_particular",
            "payment"       =>  "tbl_payment",
            "pPaid"         =>  "tbl_particular_paid",
            "accnt_form"    =>  "tbl_accountable_form",
            "temporary"     =>  "tbl_temporary_payment",
            "bank"          =>  "tbl_banks",
            "cheque"        =>  "tbl_cheque",
            'payer'         =>  'tbl_payer',
            "order"         =>  "tbl_order_payment",
            "depart"        =>  "tbl_departments",
            'pay_veri'      =>  "tbl_payment_verification"
        );

        public function __construct(){
            parent::__construct();    
            
            $this->ctodb = $this->load->database('ctodb', true);
        }

        public $ID;

        /** search particular */
        public function getParticular(){
            try{
                if(!empty($this->Particular)){
                    $this->ctodb->select(
                        'p.Particular, '. 
                        'p.Parent, '. 
                        'p.Amount, '. 
                        'p.ID'
                    );
                    $this->ctodb->from($this->table['particular'].' p');                    
                    $this->ctodb->where('p.Parent !=', NULL); 
                    $this->ctodb->like('p.Particular', $this->Particular);
                    $this->ctodb->or_like('p.Parent', $this->Particular);                                       
                    $query = $this->ctodb->get()->result();
    
                    foreach ($query as $key => $value) {
                        if(empty($value->Parent)){
                            $query[$key]->Parent = "";
                        }else{
                            $query[$key]->Parent = $value->Parent;
                        }                    
                    }
    
                    if(!empty($query)){
                        echo json_encode(array('error_message'=>$query, 'has_error'=>false));
                    }              
                }else{
                    echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
                }
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }            
        }
        
        /** save payment in cash */
        public function save_payment_cash(){
            try{
                if(empty($this->orNumber) || empty($this->Particulars)){
                    throw new Exception(ERROR_PROCESSING, true);
                }

                if(strlen($this->orNumber) !== 7){
                    throw new Exception('Please double check your OR Number', true);
                }                

                $data = array(
                    'Accountable_form_number'   =>  $this->orNumber,
                    'Accountable_form_origin'   => $this->OriginOR,
                    'Order_ID'      =>  $this->oopID,
                    'Payor'         =>  $this->Firstname.' '.$this->Lastname,
                    'Paid_by'       =>  $this->Paid_by,
                    'Address'       =>  $this->Address,                                      
                    'Collector'     =>  $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name,                       
                    'Collector_ID'  =>  $_SESSION['User_details']->ID,
                );
               
                $this->ctodb->trans_start();
                $this->ctodb->insert($this->table['payment'], $data);
                $this->ID = $this->ctodb->insert_id();
                $this->ctodb->trans_complete();

                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {
                    $this->ctodb->trans_commit();    
                    $this->save_particular_paid();                                        
                }    
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** save particulars payments */
        public function save_particular_paid(){
            try{
                if(empty($this->Particulars)){
                    throw new Exception(ERROR_PROCESSING, true);
                }

                $data_to_insert = array();
                foreach ($this->Particulars as $key => $value) {
                    $data = array(
                        'Accountable_form_number'   =>  $this->orNumber,
                        'Accountable_form_origin'   =>  $this->OriginOR,                    
                        'Particular_ID' =>  $value->Part_ID,
                        'Bus_tax_particular' => $value->particular,
                        'Amount'        =>  $value->amount                             
                    );                    
                    array_push($data_to_insert, $data);                       
                }     

                $this->ctodb->trans_start();
                $this->ctodb->insert_batch($this->table['pPaid'], $data_to_insert);
                $this->ctodb->trans_complete();
                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->ctodb->trans_commit();                  
                    $this->save_additional_particular();
                }                
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

         /** save additional particulars to payment veri */
         public function save_additional_particular(){
            try{
                if(empty($this->Particulars)){
                    throw new Exception(ERROR_PROCESSING, true);
                }

                $data_to_insert = array();
                foreach ($this->Particulars as $key => $value) {
                    $data = array(
                        'Order_payment_ID'   =>  $this->oopID,                    
                        'Particular_ID' =>  $value->Part_ID,
                        'Amount'        =>  $value->amount                    
                    );                    
                    array_push($data_to_insert, $data);                       
                }     

                $this->ctodb->trans_start();
                $this->ctodb->insert_batch($this->table['pay_veri'], $data_to_insert);
                $this->ctodb->trans_complete();
                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->ctodb->trans_commit();                  
                    $this->update_payment_veri();
                }                
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

         /** UPDATE payment verification status to verified */
         public function update_payment_veri(){
            try{
                $data = array(
                    'Status' => "Verified"
                );
                 
                $this->ctodb->trans_start();
                $this->ctodb->where('Order_payment_ID', $this->oopID);
                $this->ctodb->update($this->table['pay_veri'], $data);
                $this->ctodb->trans_complete();
                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->ctodb->trans_commit();                  
                    $this->update_accountable_form();                    
                }
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** UPDATE ACCOUNABLE form to DONE if the OR is the last */
        public function update_accountable_form(){
            try{
                $data = array(
                    'Done' => 1
                );
                 
                $this->ctodb->trans_start();
                $this->ctodb->where('End_OR', $this->orNumber);
                $this->ctodb->update($this->table['accnt_form'], $data);
                $this->ctodb->trans_complete();
                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->ctodb->trans_commit();                  
                    $this->update_status_oop();                    
                }
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** update status to verified in order of payment table */
        public function update_status_oop(){
            try{
                if(empty($this->Token)){
                    throw new Exception(ERROR_PROCESSING, true);
                }
                $data = array(
                    'Amount'        =>  $this->totalAmount,
                    'Status'        =>  'Verified'                          
                );
                $this->ctodb->where('U_ID', $this->Token);                                
                $this->ctodb->trans_start();
                // $this->ctodb->update($this->table['order'], array('Status'=>'Verified'));
                $this->ctodb->update($this->table['order'], $data);
                $this->ctodb->trans_complete();
                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->ctodb->trans_commit();                  
                    echo json_encode(array('message'=>'Success', 'has_error'=>false));
                }
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }


        /** get or numbers */
        public function generate(){

            $this->ctodb->select("*"); 
            $this->ctodb->from($this->table['accnt_form'].' ac');
            $this->ctodb->where('ac.OR_Type','Accountable Form #'.$this->form);  
            $this->ctodb->where('ac.Done',0);
            $this->ctodb->where('ac.Collector_ID', $_SESSION['User_details']->ID);
            $avail_stabs = $this->ctodb->get()->result();

            $this->ctodb->select("*"); 
            $this->ctodb->from($this->table['accnt_form'].' ac');
            $this->ctodb->where('ac.OR_Type','Accountable Form #'.$this->form);
            $this->ctodb->where('ac.OR_origin', $this->form);  
            $this->ctodb->where('ac.Done',0);
            $this->ctodb->where('ac.Collector_ID', $_SESSION['User_details']->ID);
            $result = $this->ctodb->get()->first_row();
            
            $this->ctodb->select("*"); 
            $this->ctodb->from($this->table['payment'].' p');
            $this->ctodb->where('p.Accountable_form_origin',$this->form);  
            $this->ctodb->order_by('p.ID','desc');
            $last_or = $this->ctodb->get()->first_row();        
    
            $or_number = str_pad((@$last_or->Accountable_form_number + 1), 7, "0000000", STR_PAD_LEFT);  
            
            foreach ($avail_stabs as $key => $stab) {
                if(empty($last_or)){           
                    $result->Accountable_form_number = $stab->Start_OR;                                                                  
                }
                if($or_number <= $stab->End_OR){
                    if($or_number >= $stab->Start_OR){ 
                        $result->Accountable_form_number = $or_number;                                                                      
                    }
                    else{                        
                        $result->Accountable_form_number = $stab->Start_OR;                                                
                    }
                }
            }              
            echo json_encode(array('message'=>$result, 'has_error'=>false));                         
        }    
    }
?>