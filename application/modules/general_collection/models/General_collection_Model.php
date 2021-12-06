<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class General_collection_Model extends CI_Model
{    
    public $Accountable_form_number;
    public $Address;
    public $Amount;
    public $Category;
    public $Collection_type;
    public $Collector;
    public $Collector_ID;
    public $Particular;
    public $Date_paid;
    public $ID;    
    public $Payor;
    public $Quantity;
    public $Remarks;        
    public $Void;
    public $Data;
    public $Bank;
    public $Check_no;
    public $Check_date;   
    public $payer_name; 
    public $Total_amount;
    public $Paid_by;
    public $Cash_amount;
    public $Mix_cash_amount;
        

    private $table = array(
        "particular" => "tbl_particular",
        "payment"   =>  "tbl_payment",
        "pPaid" =>  "tbl_particular_paid",
        "accnt_form"    =>  "tbl_accountable_form",
        "temporary" =>  "tbl_temporary_payment",
        "bank"  =>  "tbl_banks",
        "cheque" => "tbl_cheque",
        'payer' => 'tbl_payer'
    );

    public function __construct()
	{
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        
		$this->ctodb = $this->load->database('ctodb', TRUE);
	}

    function save_particular(){
        $data = array(
            'Particular' => ($this->Particular == null) ? null : $this->Particular,
            'Category'  => ($this->Category == null) ? null : $this->Category,
            'Amount'    => ($this->Amount == null) ? null : $this->Amount,
            'Collection_type'   => ($this->Collection_type == null) ? null :$this->Collection_type            
        );
        try{
            if($this->Particular != null){               
                $this->ctodb->insert($this->table['particular'], $data);
                echo json_encode(array('error_message' => 'Successful','has_error' => false));
            }else{
                echo json_encode(array('error_message' => 'Processing Request','has_error' => true));
            }
        }
        catch(exception $msg){                        
			echo json_encode(array('error_message' => 'Processing Request','has_error' => true));
        }
    }

    function save_form_data(){        
        $data = array(                                                                                          
            'Particular_ID' => ($this->Particular == null) ? null : $this->Particular,
            'Amount'    =>  ($this->Amount == null) ? null : $this->Amount ,
            'Collector_ID'  =>  ($this->Collector_ID == null) ? null : $this->Collector_ID,
            'Void'  =>  ($this->Void == null) ? null : $this->Void,
            'Remarks'   => ($this->Remarks == null) ? null : $this->Remarks,
            'Or_type_ID'    =>  1
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
                $this->ctodb->where('ID', $this->ID, 'both');
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
        date_default_timezone_set("Asia/Manila");        
        try{           
            if($this->Payor != null){                 
                if(!empty($this->Particular[0])){
                    $data = array(
                        'Accountable_form_number'   =>  ($this->Accountable_form_number == null) ? null : $this->Accountable_form_number,
                        'Accountable_form_origin'   => '51',
                        'Payor' =>  ($this->Payor == null) ? null : $this->Payor,
                        'Paid_by'   =>  ($this->Paid_by == null) ? null : $this->Paid_by,
                        'Address' => ($this->Address == null) ? null : $this->Address,
                        'Date_paid' =>  ($this->Date_paid == null) ? null : ($this->Date_paid.' '.date('H:i:s')),
                        'Date_created'  =>  date('Y-m-d H:i:s'),
                        // 'Cancelled' =>  ($this->Particular[0]['Void'] == null) ? 0 : $this->Particular[0]['Void'],
                        // 'Remarks'   =>  ($this->Particular[0]['Remarks'] == null) ? null : $this->Particular[0]['Remarks'],
                        'Collector' =>  ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name,
                        // 'OR_remarks'    =>  ($this->Particular[0]['OR_Remark'] == null) ? null : $this->Particular[0]['OR_Remark'],
                        // 'Quantity' => ($this->Particular[0]['Quantity'] == null) ? null : $this->Particular[0]['Quantity'],
                        'Collector_ID' => ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->ICS_ID
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
                    'Payment_ID' => ($insert_id === null) ? null : $insert_id,
                    'Bank_name' => ($this->Bank === null) ? null : $this->Bank,
                    'Check_no' => ($this->Check_no === null) ? null : $this->Check_no,
                    'Check_date' => ($this->Check_date === null) ? null : $this->Check_date
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

    public function save_mixed_payment(){
        date_default_timezone_set("Asia/Manila");
        try{
            if(!empty($this->Particular)){
                $data = array(
                    'Accountable_form_number'   =>  ($this->Accountable_form_number == null) ? null : $this->Accountable_form_number,
                    'Payor' =>  ($this->Payor == null) ? null : $this->Payor,
                    'Paid_by'   =>  ($this->Paid_by == null) ? null : $this->Paid_by,
                    'Address' => ($this->Address == null) ? null : $this->Address,
                    'Date_paid' =>  ($this->Date_paid == null) ? null : ($this->Date_paid.' '.date('H:i:s')),
                    'Date_created'  =>  date('Y-m-d H:i:s'),                                     
                    'Collector' =>  ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name,                   
                    'Collector_ID' => ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->ICS_ID
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

    function get_or_type(){
        $this->ctodb->select(
            'a.Start_OR, '.
            'a.End_OR, '.
            'a.OR_Type'
        );             
        $this->ctodb->order_by('a.ID', 'asc');
        $this->ctodb->from($this->table['accnt_form'].' a');
        $this->ctodb->where('a.OR_for', "General");
        $this->ctodb->where('a.Done', 0);        
        $this->ctodb->where('a.OR_Type', 'Accountable Form #51');
        $this->ctodb->where('a.Collector_ID', $_SESSION['User_details']->ICS_ID);        
        $query = $this->ctodb->get()->row();                 
        
        $result = $this->check_or_number_exist();       
        
        if(!empty($result)){                      
            $or_number = str_pad(($result->Accountable_form_number + 1), 7, "0000000", STR_PAD_LEFT);                        
            $check_last = $this->check_last_or($result->Accountable_form_number);
            $check = $this->check_validity_of_or($or_number); 
               
            if(!empty($check)){
                if($query !== null){
                    $query->Accountable_form_number = $query->Start_OR;
                } 
            }else{
                if(empty($check_last)){
                    $or_number = str_pad(($result->Accountable_form_number + 1), 7, "0000000", STR_PAD_LEFT); 
                    if($query !== null){
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

    function check_last_or($or_number){
        $this->ctodb->select('acc.End_OR');
        $this->ctodb->from($this->table['accnt_form'].' acc');
        // $this->ctodb->where('acc.Done', 1, 'both');
        $this->ctodb->where('acc.End_OR', $or_number, 'both');
        $result = $this->ctodb->get()->row();
        
        return $result;
    }

    function check_same_or($data){
        $this->ctodb->order_by('pp.ID', 'desc');
        $this->ctodb->from($this->table['pPaid'].' pp');
        $this->ctodb->join($this->table['particular'].' p', 'p.ID = pp.Particular_ID', 'left');
        $this->ctodb->where('p.Collection_type', 'General');
        $result = $this->ctodb->get()->row();   
        
        if(!empty($result)){
            $this->ctodb->select('acc.ID');
            $this->ctodb->from($this->table['accnt_form'].' acc');   
            $this->ctodb->where('acc.End_OR >', $result->Accountable_form_number, 'both');
            $this->ctodb->where('acc.OR_for', "General", 'both');
            $this->ctodb->where('acc.Done', 0, 'both');        
            $result = $this->ctodb->get()->row();
        }
        
        return $result;
    }

    function check_or_number_exist(){
        $this->ctodb->select(
            'pp.Accountable_form_number'
        );
        $this->ctodb->order_by('pp.ID', 'desc');
        $this->ctodb->from($this->table['pPaid'].' pp');
        $this->ctodb->join($this->table['particular'].' p','p.ID = pp.Particular_ID', 'left');   
        $this->ctodb->join($this->table['payment'].' pm', 'pm.Accountable_form_number = pp.Accountable_form_number', 'left');   
        $this->ctodb->where('pm.Collector_ID', $_SESSION['User_details']->ICS_ID, 'both');
        $this->ctodb->where('p.Collection_type', "General", 'both');
        $query = $this->ctodb->get()->row();
        
        return $query;
    }

    function save_particular_paid(){
        $data_to_insert = array();                
        try{
            if($this->Particular != null){                
                foreach ($this->Particular as $key => $value) {
                    $data = array(
                        'Accountable_form_number'   =>  ($this->Accountable_form_number == null) ? null : $this->Accountable_form_number, 
                        'Accountable_form_origin'   => '51',                      
                        'Particular_ID' =>  ($value->Part_ID == null) ? null : $value->Part_ID,
                        'Amount'   =>  ($value->amount == null) ? null : $value->amount                              
                    );
                    array_push($data_to_insert, $data);   
                }     
                $this->ctodb->insert_batch($this->table['pPaid'], $data_to_insert);
                $this->update_accountable_form();
                // echo json_encode(array('error_message' => 'Success', 'has_error' => false));
                // $this->delete_all_particular();                              
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
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

    function update_fees(){
        try{
            if(!empty($this->Data)){
                $this->ctodb->trans_start();
                foreach ($this->Data as $key => $value) {
                    $data = array(
                        'Particular' => $value['Particular'],
                        'Amount' => $value['Amount']
                    );
                    $this->ctodb->where('ID', $value['ID'], 'both');
                    $this->ctodb->update($this->table['particular'], $data);
                }
                $this->ctodb->trans_complete();

                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    return FALSE;
                } 
                else {
                    $this->ctodb->trans_commit();
                    echo json_encode(array('error_message' => 'Success', 'has_error' => false));
                } 
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
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

    function delete_fees(){
        try{
            if(!empty($this->ID)){
                $this->ctodb->where('ID', $this->ID);
                $this->ctodb->delete($this->table['particular']);
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => false));
            }else{
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function get_particullar(){
        $this->ctodb->select(   
            'p.ID, '.         
            'p.Particular, '.
            'p.Amount'
        );
        $this->ctodb->from($this->table['particular'].' p');
        $this->ctodb->where('p.Collection_type', "General", 'both');
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

    function get_all(){
        $this->ctodb->order_by('ID', 'desc');
        $result = $this->ctodb->get($this->table['particular']);        
        return $result->result();
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
        $this->ctodb->where('temp.Collector_ID', $_SESSION['User_details']->ICS_ID, 'both');
        $this->ctodb->where('temp.Or_type_ID', 1);
        $query = $this->ctodb->get()->result();        
        return $query;
    }

    function get_accountable_form(){
        $this->ctodb->select(
            'acc.ID, '.
            'acc.OR_Type, '.
            'acc.Stub_no, '.
            'acc.Start_OR, '.
            'acc.End_OR, '.
            'acc.Date_released'
        );
        $this->ctodb->from($this->table['accnt_form'].' acc');
        $this->ctodb->where('acc.Collector_ID', $_SESSION['User_details']->ICS_ID, 'both');
        $this->ctodb->where('acc.Done', 0, 'both');
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
        $query = $this->ctodb->get()->result();
       
        return $query;        
    }

    public function get_payer(){
        try{
            if(!empty($this->payer_name)){
                $this->ctodb->like('Payer', $this->payer_name, 'both');
                $result = $this->ctodb->get($this->table['payer'])->result();

                echo json_encode(array('error_message'=>$result, 'has_error'=>false));
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

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
                $this->ctodb->where('p.Collection_type', 'General');
                $this->ctodb->like('p.Particular', $this->Particular, 'both');
                $this->ctodb->or_like('p.Parent', $this->Particular, 'both');
                // $this->ctodb->where('p.Parent', null);
                $query = $this->ctodb->get()->result();

                foreach ($query as $key => $value) {
                    if(empty($value->Parent)){
                        $query[$key]->Parent = "";
                    }else{
                        $query[$key]->Parent = $value->Parent;
                    }                    
                }

                if(empty($query)){
                    // $this->get_particular_parent();
                }else{
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
                $this->ctodb->where('p.Collection_type', 'General');                
                $this->ctodb->like('p.Parent', $this->Parent, 'both');
                $query = $this->ctodb->get()->result();

                echo json_encode(array('error_message'=>$query, 'has_error'=>false));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

}
?>