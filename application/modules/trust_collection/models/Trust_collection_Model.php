<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trust_collection_Model extends CI_Model
{
    public $Accountable_form_number;
    public $Address;
    public $Category;
    public $Particular;
    public $Amount;
    public $Collection_type;
    public $Quantity;
    public $Payor;
    public $Date_paid;
    public $Collector;
    public $Collector_ID;
    public $Void;
    public $Remarks;
    public $ID;    
    public $Bank;
    public $Check_no;
    public $Check_date;
    public $OR_For = "Trust";    
    public $paid_by;
    public $Mix_cash_amount;
    
    private $table = array(
        "particular"    => "tbl_particular",
        "payment"       =>  "tbl_payment",
        "pPaid"         =>  "tbl_particular_paid",
        "accnt_form"    =>  "tbl_accountable_form",
        "temporary"     =>  "tbl_temporary_payment",
        "cedula"        =>  "tbl_collection_cedula",
        "bank"          =>  "tbl_banks",
        "cheque"        => "tbl_cheque"
    );

    public function __construct(){
        parent::__construct();        
        $this->ctodb = $this->load->database('ctodb', true);
    }

    function save_form_data(){        
        $data = array(                                                                                          
            'Particular_ID'     => ($this->Particular == null) ? null : $this->Particular,
            'Amount'            =>  ($this->Amount == null) ? null : $this->Amount ,
            'Collector_ID'      =>  ($this->Collector_ID == null) ? null : $this->Collector_ID,
            'Void'              =>  ($this->Void == null) ? null : $this->Void,
            'Remarks'           => ($this->Remarks == null) ? null : $this->Remarks,
            'Or_type_ID'        =>  2
        );
        try{
            if($this->Particular != null){     
                for ($counter = 0; $counter  < $this->Quantity ; $counter ++) {                     
                    $this->ctodb->insert($this->table['temporary'], $data);                   
                }                          
                echo json_encode(array('error_message' => 'Successful','has_error' => false));
            }else{
                echo json_encode(array('error_message' => 'Error Processing','has_error' => true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function delete_particular(){
        try{
            if($this->ID != null){
                $this->ctodb->where('ID', $this->ID);
                $this->ctodb->delete($this->table['temporary']);
                echo json_encode(array('error_message' => 'Success', 'has_error' => false));
            }else{
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function save_all_data(){
        $data_to_insert = array();        
        date_default_timezone_set("Asia/Manila"); 
        try{           
            if(strlen($this->Accountable_form_number) !== 7){
                throw new Exception(INVALID_OR, true);
            }                        

            if($this->Payor != null){                 
                if(!empty($this->Particular[0])){
                    $data = array(
                        'Accountable_form_number'   =>  ($this->Accountable_form_number == null) ? null : $this->Accountable_form_number,
                        'Accountable_form_origin'   =>  '51',
                        'Payor'                     =>  ($this->Payor == null) ? null : $this->Payor,
                        'Address'                   => ($this->Address == null) ? null : $this->Address,
                        'Date_paid'                 =>  ($this->Date_paid == null) ? null : ($this->Date_paid.' '.date('H:i:s')),
                        'Date_created'              =>  date('Y-m-d H:i:s'),
                        'Paid_by'                   =>  ($this->paid_by == null) ? null : ($this->paid_by),                                                
                        'Collector'                 =>  ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name,                                            
                        'Collector_ID'              => ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->ID
                    );
                    $this->ctodb->trans_start(); 
                    $this->ctodb->insert($this->table['payment'], $data);
                    $insert_id = $this->ctodb->insert_id();
                    $this->ctodb->trans_complete();

                    if ($this->ctodb->trans_status() === FALSE) {
                        $this->ctodb->trans_rollback();
                        return FALSE;
                    } 
                    else {
                        $this->ctodb->trans_commit();                        
                        if(empty($this->Bank)){                            
                            $this->save_particular_paid();                            
                        }else{                 
                            $u_data = array(
                                'Cheque' => 1
                            );
                            $this->ctodb->trans_start();
                            $this->ctodb->where('ID', $insert_id, 'both');
                            $this->ctodb->update($this->table['payment'], $u_data);
                            $this->ctodb->trans_complete();
                            if ($this->ctodb->trans_status() === FALSE) {
                                $this->ctodb->trans_rollback();
                                return FALSE;
                            }else{
                                $this->ctodb->trans_commit();
                                $this->save_cheque_bank($insert_id);
                            }                                                                    
                        }
                    }                                       
                }                                    
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }    

    function save_cheque_bank($insert_id){
        try{
            if(!empty($this->Bank)){
                $data = array(
                    'Payment_ID'    => ($insert_id === null) ? null : $insert_id,
                    'Bank_name'     => ($this->Bank === null) ? null : $this->Bank,
                    'Check_no'      => ($this->Check_no === null) ? null : $this->Check_no,
                    'Check_date'    => ($this->Check_date === null) ? null : $this->Check_date
                );
                $this->ctodb->trans_start();
                $this->ctodb->insert($this->table['cheque'], $data);
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
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function save_particular_paid(){
        $data_to_insert = array();
        try{
            if($this->Particular != null){     
                
                foreach ($this->Particular as $key => $value) {
                    $data = array(
                        'Accountable_form_number'   =>  ($this->Accountable_form_number == null) ? null : $this->Accountable_form_number, 
                        'Accountable_form_origin'   => '51',                      
                        'Particular_ID'             =>  ($value->Part_ID == null) ? null : $value->Part_ID,
                        'Amount'                    =>  ($value->amount == null) ? null : $value->amount                                
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
                    $this->update_accountable_form();
                }                                       
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    public function save_data_mix_payment(){
        date_default_timezone_set("Asia/Manila");
        try{
            if(!empty($this->Particular)){
                $data = array(
                    'Accountable_form_number'   =>  ($this->Accountable_form_number == null) ? null : $this->Accountable_form_number,
                    'Payor' =>  ($this->Payor == null) ? null : $this->Payor,
                    'Paid_by'   =>  ($this->paid_by == null) ? null : $this->paid_by,
                    'Address' => ($this->Address == null) ? null : $this->Address,
                    'Date_paid' =>  ($this->Date_paid == null) ? null : ($this->Date_paid.' '.date('H:i:s')),
                    'Date_created'  =>  date('Y-m-d H:i:s'),                                     
                    'Collector' =>  ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name,                   
                    'Collector_ID' => ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->ID
                );

                $this->ctodb->trans_start();
                $this->ctodb->insert($this->table['payment'], $data);
                $insert_id = $this->ctodb->insert_id();
                $this->ctodb->trans_complete();

                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {
                    $this->ctodb->trans_commit();                        
                    if(empty($this->Bank)){                            
                        $this->save_particular_paid();                            
                    }else{                 
                        $u_data = array(
                            'Cheque' => 1,
                            'Cash'  => $this->Mix_cash_amount
                        );
                        $this->ctodb->trans_start();
                        $this->ctodb->where('ID', $insert_id, 'both');
                        $this->ctodb->update($this->table['payment'], $u_data);
                        $this->ctodb->trans_complete();
                        if ($this->ctodb->trans_status() === FALSE) {
                            $this->ctodb->trans_rollback();
                            return FALSE;
                        }else{
                            $this->ctodb->trans_commit();
                            $this->save_cheque_bank($insert_id);
                        }                                                                    
                    }
                }
            }else{
                throw new Exception("Particular is empty", true);
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    function update_accountable_form(){
        try{
            if(!empty($this->Accountable_form_number)){
                $data = array(
                    'Done' => 1
                );
                $this->ctodb->trans_start();
                $this->ctodb->where('End_OR', $this->Accountable_form_number);
                $this->ctodb->update($this->table['accnt_form'], $data);
                $this->ctodb->trans_complete();
                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {                                                                                  
                    $this->ctodb->trans_commit();                  
                    echo json_encode(array('error_message' => 'Payment Saved', 'has_error' => false)); 
                }
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    function delete_all_particular(){
        try{
            if($this->Particular != null){
                foreach ($this->Particular as $key => $value) {
                    $this->ctodb->where('ID', $value['ID']);
                    $this->ctodb->delete($this->table['temporary']);
                }
                echo json_encode(array('error_message' => 'Success', 'has_error' => false));
            }else{
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }
    
    function get_particulars(){
        $this->ctodb->select(   
            'p.ID, '.         
            'p.Particular, '.
            'p.Amount'
        );
        $this->ctodb->from($this->table['particular'].' p');
        $this->ctodb->where('p.Collection_type', "Trust Fund");
        $query = $this->ctodb->get()->result();
        return $query;
    }

    function get_or_type(){        
        $this->ctodb->select(
            'a.Start_OR, '.
            'a.End_OR, '.
            'a.OR_Type'
        );                
        $this->ctodb->order_by('a.ID', 'desc');
        $this->ctodb->from($this->table['accnt_form'].' a');        
        $this->ctodb->where('a.OR_for', $this->OR_For);
        $this->ctodb->where('a.OR_for', "Trust");
        $this->ctodb->where('a.Done', 0);
        $this->ctodb->where('a.Collector_ID', $_SESSION['User_details']->ID);
        $query = $this->ctodb->get()->row();  
        
        $result = $this->check_or_number_exist();                                   
        if(!empty($result)){             
            $or_number = str_pad(($result->Accountable_form_number + 1), 7, "0000000", STR_PAD_LEFT);                        
            $check_last = $this->check_last_or($result->Accountable_form_number);
            $check = $this->check_validity_of_or($or_number); 
           
            if(!empty($check)){
                if(!empty($query)){
                    $query->Accountable_form_number = $query->Start_OR;
                } 
            }else{
                if(empty($check_last)){
                    $or_number = str_pad(($result->Accountable_form_number + 1), 7, "0000000", STR_PAD_LEFT);  
                    if(!empty($query)){
                        $query->Accountable_form_number = $result->Accountable_form_number = ($or_number);
                    }                              
                }else{
                    $query->Accountable_form_number = $query->Start_OR;
                }                
            }                                             
        }else{               
            if($query !== null){                
                $query->Accountable_form_number = $query->Start_OR;
            }         
        }      
        
        return $query;
    }

    public function search_particular(){
        try{
            if(!empty($this->Particular)){
                $this->ctodb->select(
                    'p.Particular, '. 
                    'p.Amount, '. 
                    'p.Parent, '. 
                    'p.ID'
                );
                $this->ctodb->from($this->table['particular'].' p');
                $this->ctodb->where('p.Collection_type', 'Trust');
                $this->ctodb->like('p.Particular', $this->Particular);
                $query = $this->ctodb->get()->result();

                echo json_encode(array('error_message'=>$query, 'has_error'=>false));
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    /** get particular parents */
    public function getParticular_parent(){
        try{
            if(!empty($this->Parent)){
                $this->ctodb->select(
                    'p.Particular, '. 
                    'p.Parent, '. 
                    'p.Amount, '. 
                    'p.ID'
                );
                $this->ctodb->from($this->table['particular'].' p');                
                $this->ctodb->where('p.Parent', $this->Parent);
                $query = $this->ctodb->get()->result();

                echo json_encode(array('error_message'=>$query, 'has_error'=>false));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    function get_bank(){
        $this->ctodb->from($this->table['bank']);
        $query = $this->ctodb->get()->result();
        
        if(!empty($query)){
            return $query;
        }else{
            return false;
        }
    }

    function check_last_or($or_number){
        $this->ctodb->select('acc.End_OR');
        $this->ctodb->from($this->table['accnt_form'].' acc');
        $this->ctodb->where('acc.Done', 1, 'both');        
        $this->ctodb->where('acc.End_OR', $or_number, 'both');
        $result = $this->ctodb->get()->row();
        
        return $result;
    }


    function check_same_or($data){
        $this->ctodb->order_by('pp.ID', 'desc');        
        $this->ctodb->from($this->table['pPaid'].' pp');
        $this->ctodb->join($this->table['particular'].' p', 'p.ID = pp.Particular_ID', 'left');
        $this->ctodb->where('p.Collection_type', 'Trust Fund');
        $result = $this->ctodb->get()->row(); 
        
        if(!empty($result)){
            $this->ctodb->select('acc.ID');
            $this->ctodb->from($this->table['accnt_form'].' acc');   
            $this->ctodb->where('acc.End_OR >', $result->Accountable_form_number, 'both');
            $this->ctodb->where('acc.OR_for', "Trust", 'both');
            $this->ctodb->where('acc.Done', 0, 'both');        
            $result = $this->ctodb->get()->row();
        }
        
        return $result;
    }

    function check_cedula($accnt_form_number){
        $this->ctodb->select('c.ID');
        $this->ctodb->from($this->table['cedula'].' c');
        $this->ctodb->where('c.OR_number', $accnt_form_number, 'both');
        $query = $this->ctodb->get()->row();
        return $query;
    }

    function check_or_number_exist(){
        $this->ctodb->select(
            'pp.Accountable_form_number'
        );
        $this->ctodb->order_by('pp.ID', 'desc');
        $this->ctodb->from($this->table['pPaid'].' pp');
        $this->ctodb->join($this->table['particular'].' p','p.ID = pp.Particular_ID', 'left');    
        $this->ctodb->join($this->table['payment'].' pm', 'pm.Accountable_form_number = pp.Accountable_form_number', 'left');   
        $this->ctodb->where('pm.Collector_ID', $_SESSION['User_details']->ID, 'both');    
        $this->ctodb->where('p.Collection_type', "Trust");
        $query = $this->ctodb->get()->row();
        
        return $query;
    }    

    function get_report_by_day(){
        $this->ctodb->select(  
            'temp.ID, '.         
            'temp.Amount, '.
            'temp.Particular_ID, '.
            'temp.Void, '.
            'temp.Remarks, '.
            'part.Particular'           
        );
        $this->ctodb->from($this->table['temporary'].' temp');   
        $this->ctodb->join($this->table['particular'].' part', 'part.ID = temp.Particular_ID', 'left');    
        $this->ctodb->where('temp.Collector_ID', $_SESSION['User_details']->ID);
        $this->ctodb->where('temp.Or_type_ID', 2);
        $query = $this->ctodb->get()->result();        
        return $query;
    }

    function get_particullar_amount(){
        $this->ctodb->select(   
            'p.ID, '.                   
            'p.Amount'
        );
        $this->ctodb->from($this->table['particular'].' p');
        $query = $this->ctodb->get()->result();
        return $query;
    }   
    
    function check_validity_of_or($or_number){
        $this->ctodb->select('pp.ID');
        $this->ctodb->order_by('pp.ID', 'desc');
        $this->ctodb->from($this->table['pPaid'].' pp');        
        $this->ctodb->where('pp.Accountable_form_number', $or_number);        
        $query = $this->ctodb->get()->result();    
        return $query;
    }

    function check_validity($or_number){        
        $this->ctodb->select('pp.ID');
        $this->ctodb->order_by('pp.ID', 'desc');
        $this->ctodb->from($this->table['pPaid'].' pp');
        $this->ctodb->where('pp.Accountable_form_number', $or_number);
        $this->ctodb->where('pp.Accountable_form_origin', '51');
        $query = $this->ctodb->get()->result();
        
        return $query;        
    }

    function check_in_accnt_form($or_number){
        $this->ctodb->select('a.ID');
        $this->ctodb->order_by('a.ID', 'desc');
        $this->ctodb->from($this->table['accnt_form'].' a');
        $this->ctodb->where('a.Start_OR', $or_number, 'both');
        $this->ctodb->where('a.OR_for', 'Trust', 'both');
        $query = $this->ctodb->get()->result();
        
        return $query;      
    }
    
}
?>