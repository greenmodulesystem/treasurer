<?php
class Report_Model extends CI_Model
{
    private $table = array(
        "particular"    =>  "tbl_particular",
        "part_paid"     =>  "tbl_particular_paid",
        "payment"       =>  "tbl_payment",
        "cedula"        =>  "tbl_collection_cedula",
        "accountable"   => "tbl_accountable_form", 
        "user"          =>  "tbl_users", 
        "cheque"        => "tbl_cheque",
        "colType"       =>  "tbl_collection_type"
    );

    public $Date;
    public $Collection_type;
    public $End_date;
    public $Data;
    public $ID;

    public function __construct(){
        parent::__construct();        
        $this->ctodb = $this->load->database('ctodb', true);
    }

    // GET GENERAL AND TRUST REPORTS BY SINGLE DATE
    function get_reports(){
        try{
            if(!empty($this->Date)){
                $this->ctodb->select(
                    'p.ID, '.
                    'p.Accountable_form_number, '.
                    'p.Date_paid, '.
                    'p.Payor, '.
                    'pp.Amount, '.
                    'part.Particular ,'.
                    'p.Cancelled, '. 
                    'p.Remitance'
                );       
                $this->ctodb->from($this->table['payment'].' p');
                $this->ctodb->join($this->table['part_paid'].' pp', 'pp.Accountable_form_number = p.Accountable_form_number', 'left');
                $this->ctodb->join($this->table['particular'].' part', 'part.ID = pp.Particular_ID', 'left');
                $this->ctodb->where('p.Collector', $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name);
                $this->ctodb->like('part.Collection_type', $this->Collection_type);
                $this->ctodb->where('Date(p.Date_paid)', $this->Date);                  
                $query = $this->ctodb->get()->result();  
                                
                foreach ($query as $key => $value) {
                    if($value->Remitance === '1'){
                        $query[$key]->Status_remitance = "Remitted";
                    }else{
                        $query[$key]->Status_remitance = "For Remitance";
                    }
                }                
                echo json_encode($query);
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}        
    }

    /** get collection type */
    public function getCollectionType(){
        try{
            $this->ctodb->select('*');
            $this->ctodb->from($this->table['colType']);
            $result = $this->ctodb->get()->result();

            return $result;
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }
    
    // GET GENERAL AND TRUST REPORTS BY DATE RANGE
    function get_report_date_range(){
        try{
            if(!empty($this->Date)){
                $this->ctodb->select(
                    'p.ID, '.
                    'p.Accountable_form_number, '.
                    'p.Date_paid, '.
                    'p.Payor, '.
                    'pp.Amount, '.
                    'part.Particular ,'.
                    'p.Cancelled, '. 
                    'p.Remitance'
                );                       
                $this->ctodb->from($this->table['payment'].' p');
                $this->ctodb->join($this->table['part_paid'].' pp', 'pp.Accountable_form_number = p.Accountable_form_number', 'left');
                $this->ctodb->join($this->table['particular'].' part', 'part.ID = pp.Particular_ID', 'left');
                $this->ctodb->where('p.Date_paid BETWEEN "'. date('Y-m-d', strtotime($this->Date)). '" and "'. date('Y-m-d', strtotime($this->End_date)).'"');
                $this->ctodb->where('p.Collector', $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name, 'both');
                $this->ctodb->like('part.Collection_type', $this->Collection_type);
                $query = $this->ctodb->get()->result();                                                                                 
                foreach ($query as $key => $value) {
                    if($value->Remitance === '1'){
                        $query[$key]->Status_remitance = "Remitted";
                    }else{
                        $query[$key]->Status_remitance = "For Remitance";
                    }
                }  
                echo json_encode($query);
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
// GENERATE CEDULA REPORT SINGLE DATE 
    function get_cedula_reports(){        
        try{
            if(!empty($this->Date)){
                $this->ctodb->select(
                    'c.ID, '.
                    'c.Date_issued, '.
                    'c.Last_name, '. 
                    'c.First_name, '. 
                    'c.Total, '. 
                    'c.OR_number, '. 
                    'c.Remittance'
                );
                $this->ctodb->from($this->table['cedula'].' c');
                $this->ctodb->where('Date(c.Date_issued)', $this->Date, 'both');
                $this->ctodb->distinct(); 
                $query = $this->ctodb->get()->result();
                foreach ($query as $key => $value) {
                    if($value->Remittance === '1'){
                        $query[$key]->Status_remitance = "Remitted";
                    }else{
                        $query[$key]->Status_remitance = "For Remitance";
                    }
                }                  
                echo json_encode($query);
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}  
    }
// GENERATE CEDULA REPORTS BY DATE RANGE
    function get_cedula_date_range_report(){
        try{
            if(!empty($this->Date)){
                $this->ctodb->select(
                    'c.ID, '.
                    'c.Date_issued, '.
                    'c.Last_name, '. 
                    'c.First_name, '. 
                    'c.Total, '. 
                    'c.OR_number, '. 
                    'c.Remittance'
                );
                $this->ctodb->from($this->table['cedula'].' c');
                $this->ctodb->where('c.Date_issued BETWEEN "'. date('Y-m-d', strtotime($this->Date)). '" and "'. date('Y-m-d', strtotime($this->End_date)).'"');                
                $this->ctodb->distinct();
                $query = $this->ctodb->get()->result();
                foreach ($query as $key => $value) {
                    if($value->Remittance === '1'){
                        $query[$key]->Status_remitance = "Remitted";
                    }else{
                        $query[$key]->Status_remitance = "For Remitance";
                    }
                } 
                echo json_encode($query);
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}  
    }
// UPDATE REMITTANCE FIELD IN PAYMENT TABLE
    function Update_remitted(){                
        try{
            $data = array(
                'Remitance' => 1
            );
            if(!empty($this->Data)){
                foreach ($this->Data as $key => $value) {                    
                    $this->ctodb->where('ID', $value['ID']);
                    $this->ctodb->update($this->table['payment'], $data);
                }
                echo json_encode(array('error_message'=>'Remit Success', 'has_error'=>false));
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }
// UPDATE REMITTANCE FIELD IN CEDULA TABLE
    function Update_cedula_remittace(){
        try{
            $data = array(
                'Remittance' => 1
            );
            if(!empty($this->Data)){                
                foreach ($this->Data as $key => $value) {                    
                    $this->ctodb->where('ID', $value['ID']);
                    $this->ctodb->update($this->table['cedula'], $data);
                }
                echo json_encode(array('error_message'=>'Success', 'has_error'=>false));
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }
// get users accountable form data
    public function user_accnt_form_data(){
        $this->ctodb->select(
            'acct.OR_for'
        );
        $this->ctodb->from($this->table['accountable'].' acct');      
        $this->ctodb->where('acct.Collector_ID', $_SESSION['User_details']->ID, 'both');
        $this->ctodb->where('acct.Done', 0);
        $query = $this->ctodb->get()->result();
        echo json_encode($query);
    }
// GET UNREMITTED REPORTS
    public function get_unremitted(){
        try{
            // if(!empty($this->Data)){
                $this->ctodb->select(
                    'pay.ID, '. 
                    'pay.Accountable_form_number, '. 
                    'pay.Date_paid, '. 
                    'pay.Payor, '. 
                    'pay.Address, '. 
                    'pay.Quantity, '. 
                    'part.Amount, '. 
                    'par.Particular'
                );
                $this->ctodb->from($this->table['payment'].' pay');
                $this->ctodb->join($this->table['part_paid'].' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
                $this->ctodb->join($this->table['particular'].' par', 'par.ID = part.Particular_ID', 'left');
                $this->ctodb->where('pay.Remitance', 0);    
                $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID, 'both');
                // $this->ctodb->where('par.Collection_type', $this->Data, 'both');                              
                $query = $this->ctodb->get()->result();                
                return $query;
            // }else{
            //     echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            // }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}        
    }
// Get Non Cash Data
    function get_non_cash(){
        $this->ctodb->select(
            'pp.Amount'
        );
        $this->ctodb->from($this->table['payment'].' p');
        $this->ctodb->join($this->table['part_paid'].' pp', 'p.Accountable_form_number = pp.Accountable_form_number', 'left');
        $this->ctodb->where('p.Cheque', 1, 'both');
        $this->ctodb->where('p.Collector_ID', $_SESSION['User_details']->ID, 'both');
        $query = $this->ctodb->get()->result();
        if(!empty($query)){
            $Total = 0;
            foreach ($query as $key => $value) {
                $Total += $value->Amount;
            }
            return $Total;
        }else{
            return false;
        }
    }
// get cheque data 
    function get_cheque(){
        $this->ctodb->select(
            'pp.Amount, '. 
            'c.Bank_name, '. 
            'c.Check_date, '. 
            'c.Check_no'
        );
        $this->ctodb->from($this->table['payment'].' p');
        $this->ctodb->join($this->table['part_paid'].' pp', 'p.Accountable_form_number = pp.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['cheque'].' c', 'c.Payment_ID = p.ID', 'left');
        $this->ctodb->where('p.Cheque', 1, 'both');
        $this->ctodb->where('p.Collector_ID', $_SESSION['User_details']->ID, 'both');
        $query = $this->ctodb->get()->result();
        if(!empty($query)){           
            return $query;
        }else{
            return false;
        }
    }
// Get first data
    function get_first_data(){
        $this->ctodb->select(            
            'pay.Accountable_form_number, '. 
            'part.Amount'
        );
        $this->ctodb->from($this->table['payment'].' pay');
        $this->ctodb->join($this->table['part_paid'].' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'].' par', 'par.ID = part.Particular_ID', 'left');
        $this->ctodb->where('pay.Remitance', 0);    
        $this->ctodb->where('par.Collection_type', 'general', 'both');   
        $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID, 'both');                           
        $query = $this->ctodb->get()->result();                
        return $query;
    }
// Get second data
    function get_second_data(){
        $this->ctodb->select(            
            'pay.Accountable_form_number ,'. 
            'part.Amount'
        );
        $this->ctodb->from($this->table['payment'].' pay');
        $this->ctodb->join($this->table['part_paid'].' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'].' par', 'par.ID = part.Particular_ID', 'left');
        $this->ctodb->where('pay.Remitance', 0);    
        $this->ctodb->where('par.Collection_type', 'Trust Fund');   
        $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID, 'both');                           
        $query = $this->ctodb->get()->result();                
        
        return $query;
    }
// GET REMITTED REPORTS
    function get_remitted(){
        $this->ctodb->select(
            'pay.ID, '. 
            'pay.Accountable_form_number, '. 
            'pay.Date_paid, '. 
            'pay.Payor, '. 
            'pay.Address, '. 
            'part.Amount, '. 
            'par.Particular'
        );
        $this->ctodb->from($this->table['payment'].' pay');
        $this->ctodb->join($this->table['part_paid'].' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'].' par', 'par.ID = part.Particular_ID', 'left');
        $this->ctodb->where('pay.Remitance', 1);        
        $query = $this->ctodb->get()->result();

        return $query;
    }
// GET VOIDED REPORTS   
    function voided(){
        $this->ctodb->select(
            'pay.ID, '. 
            'pay.Accountable_form_number, '. 
            'pay.Date_paid, '. 
            'pay.Payor, '. 
            'pay.Address, '. 
            'part.Amount, '. 
            'par.Particular'
        );
        $this->ctodb->from($this->table['payment'].' pay');
        $this->ctodb->join($this->table['part_paid'].' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'].' par', 'par.ID = part.Particular_ID', 'left');
        $this->ctodb->where('pay.Cancelled', 1);        
        $query = $this->ctodb->get()->result();
        
        return $query;
    }
// get data in two database and servers
    function get_two_data(){
       $result_one = $this->get_in_first_db();
       $result_two = $this->get_in_second_db();  
       $third = $this->get_unremitted();     

       foreach ($result_one as $one => $value_one) {
           foreach ($result_two as $two => $value_two) {

           }
       }       
       echo json_encode($result_two);
    }

    function get_in_first_db(){
        $this->ctodb->from($this->table['payment'].' p');
        $query = $this->ctodb->get()->result();
        return $query;        
    }
    
    function get_in_second_db(){    
        $otherdb = $this->load->database('otherdb', TRUE);

        $otherdb->select(
            'ap.Business_name, '.
            'cl.Fee, '.
            'col.OR_number'
        );
        $otherdb->from('tbl_collection'.' col');
        $otherdb->join('tbl_collection_items'.' cl', 'col.OR_number = cl.OR_number', 'left');
        $otherdb->join('tbl_cycle'.' c', 'c.ID = col.Cycle_ID', 'left');
        $otherdb->join('tbl_application_form'.' ap', 'ap.ID = c.Application_ID', 'left');        
        $query = $otherdb->get()->result();
        return $query;
    }

    function get_officer_form(){
        $this->ctodb->select(
            'a.OR_for, '. 
            'a.Start_OR, '. 
            'a.End_OR'
        );
        $this->ctodb->from($this->table['accountable'].' a');   
        $this->ctodb->where('a.Collector_ID', $_SESSION['User_details']->ID, 'both');
        $this->ctodb->where('a.Done', 0, 'both');
        $this->ctodb->where('a.OR_for !=', 'RealProperty', 'both');
        $query = $this->ctodb->get()->result(); 
        foreach ($query as $key => $value) {
            $data = $this->get_individual_number($value->OR_for);                    
            $query[$key]->Inclusive = $data;
        }          
        if(!empty($query)){
            return $query;
        }else{
            return false;
        }           
    }

    function get_individual_number($value){
        $this->ctodb->select(
            'p.Collection_type, '. 
            'pm.Accountable_form_number'
        );
        $this->ctodb->from($this->table['payment'].' pm');
        $this->ctodb->join($this->table['part_paid'].' pp','pp.Accountable_form_number = pm.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'].' p', 'p.ID = pp.Particular_ID', 'left');
        $this->ctodb->like('p.Collection_type', $value, 'both');
        $this->ctodb->where('pm.Remitance', 0, 'both');
        $this->ctodb->where('pm.Collector_ID', $_SESSION['User_details']->ID, 'both');
        $this->ctodb->distinct();
        $query = $this->ctodb->get()->result();
        
        return $query;
    }

    // get data of voided receipt
    public function get_voided_receipt(){
        try{
            if(!empty($this->ID)){
                $this->ctodb->select(
                    'p.ID, '. 
                    'p.Accountable_form_number, '. 
                    'p.Date_created, '. 
                    'p.Payor, '. 
                    'p.Paid_by, '. 
                    'p.Address, '. 
                    'p.Cash, '. 
                    'p.Collector, '. 
                    'p.Cheque, '. 
                    'c.Bank_name, '. 
                    'c.Check_no, '. 
                    'c.Check_date'
                );
                $this->ctodb->from($this->table['payment'].' p');
                $this->ctodb->join($this->table['cheque'].' c', 'c.Payment_ID = p.ID', 'left');

                $this->ctodb->where('p.ID', $this->ID);
                $this->ctodb->where('p.Cancelled', 1);
                $query = $this->ctodb->get()->row();
                if(!empty($query)){
                    $result = $this->get_particular_paid_type($query->Accountable_form_number);                    
                    $query->Particulars = $result;                    
                    // var_dump($query);
                    return $query;
                }else{
                    throw new Exception('Empty Response');
                }
            }else{
                throw new Exception("Error missing client ID", true);
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    function get_particular_paid_type($or_number){
        try{
            if(empty($or_number)){
                throw new Exception('Erro OR number is missing', true);
            }else{
                $this->ctodb->select(
                    'p.ID, '. 
                    'p.Amount, '. 
                    'p.Accountable_form_number, '. 
                    'pp.Particular'
                );
                $this->ctodb->from($this->table['part_paid'].' p');
                $this->ctodb->join($this->table['particular'].' pp', 'pp.ID = p.Particular_ID', 'left');                
                $this->ctodb->where('p.Accountable_form_number', $or_number);
                $query = $this->ctodb->get()->result();
        
                return $query;
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }        
    }    

    function sample(){      
        $this->ctodb->select(
            'a.Particular_ID, '. 
            'a.Amount, '. 
            'a.Quantity'
        );
        $this->ctodb->from($this->table['part_paid'].' a', 'true');
        $this->ctodb->join($this->table['payment'].' b', 'a.Accountable_form_number = b.Accountable_form_number');
        $this->ctodb->where('a.Quantity >=', 'b.ID');
        $result = $this->ctodb->get()->result();

        echo json_encode($result);
    }
}
?>