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

        public $ID;

        /** search particular */
        public function getParticular(){
            try{
                if(!empty($this->Particular)){
                    $this->db->select(
                        'p.Particular, '. 
                        'p.Parent, '. 
                        'p.Amount, '. 
                        'p.ID'
                    );
                    $this->db->from($this->table['particular'].' p');                    
                    $this->db->where('p.Parent !=', NULL); 
                    $this->db->like('p.Particular', $this->Particular);
                    $this->db->or_like('p.Parent', $this->Particular);                                       
                    $query = $this->db->get()->result();
    
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
                    'Collector_ID'  =>  $_SESSION['User_details']->ID
                );
               
                $this->db->trans_start();
                $this->db->insert($this->table['payment'], $data);
                $this->ID = $this->db->insert_id();
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } 
                else {
                    $this->db->trans_commit();    
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
                        'Amount'        =>  $value->amount                             
                    );                    
                    array_push($data_to_insert, $data);                       
                }     

                $this->db->trans_start();
                $this->db->insert_batch($this->table['pPaid'], $data_to_insert);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->db->trans_commit();                  
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
                $this->db->trans_start();
                $this->db->where('End_OR', $this->orNumber);
                $this->db->update($this->table['accnt_form'], $data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->db->trans_commit();                  
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
                $this->db->where('U_ID', $this->Token);                                
                $this->db->trans_start();
                $this->db->update($this->table['order'], array('Status'=>'Verified'));
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->db->trans_commit();                  
                    echo json_encode(array('message'=>'Success', 'has_error'=>false));
                }
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get or numbers */
        public function generate(){

            $this->db->select("*"); 
            $this->db->from($this->table['accnt_form'].' ac');
            $this->db->where('ac.OR_Type','Accountable Form #'.$this->form);  
            $this->db->where('ac.Done',0);
            $this->db->where('ac.Collector_ID', $_SESSION['User_details']->ID);
            $avail_stabs = $this->db->get()->result();

            $this->db->select("*"); 
            $this->db->from($this->table['accnt_form'].' ac');
            $this->db->where('ac.OR_Type','Accountable Form #'.$this->form);
            $this->db->where('ac.OR_origin', $this->form);  
            $this->db->where('ac.Done',0);
            $this->db->where('ac.Collector_ID', $_SESSION['User_details']->ID);
            $result = $this->db->get()->first_row();
            
            $this->db->select("*"); 
            $this->db->from($this->table['payment'].' p');
            $this->db->where('p.Accountable_form_origin',$this->form);  
            $this->db->order_by('p.ID','desc');
            $last_or = $this->db->get()->first_row();        
    
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