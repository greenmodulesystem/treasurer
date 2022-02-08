<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Collection_Model extends CI_Model
    {
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
            $this->ctodb->where('a.OR_origin', '1');
            $this->ctodb->where('a.Collector_ID', $_SESSION['User_details']->ID);        
            $query = $this->ctodb->get()->row();                 
            
            $result = $this->check_or_number_exist();           
            if($result !== null){                      
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

        function check_or_number_exist(){
            $this->ctodb->select(
                'pp.Accountable_form_number'
            );
            $this->ctodb->order_by('pp.ID', 'desc');
            $this->ctodb->from($this->table['pPaid'].' pp');
            $this->ctodb->join($this->table['particular'].' p','p.ID = pp.Particular_ID', 'left');   
            $this->ctodb->join($this->table['payment'].' pm', 'pm.Accountable_form_number = pp.Accountable_form_number', 'left');   
            $this->ctodb->where('pm.Collector_ID', $_SESSION['User_details']->ID, 'both');
            $this->ctodb->where('p.Collection_type', "General", 'both');
            $query = $this->ctodb->get()->row();
            
            return $query;
        }

        function check_last_or($or_number){
            $this->ctodb->select('acc.End_OR');
            $this->ctodb->from($this->table['accnt_form'].' acc');            
            $this->ctodb->where('acc.End_OR', $or_number, 'both');
            $result = $this->ctodb->get()->row();
            
            return $result;
        }

        function check_validity_of_or($or_number){
        
            $this->ctodb->select('pp.ID');
            $this->ctodb->order_by('pp.ID', 'desc');
            $this->ctodb->from($this->table['pPaid'].' pp');
            $this->ctodb->where('pp.Accountable_form_number', $or_number);
            $query = $this->ctodb->get()->result();    
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
            $this->ctodb->where('temp.Collector_ID', $_SESSION['User_details']->ID, 'both');
            $this->ctodb->where('temp.Or_type_ID', 1);
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

    }
?>