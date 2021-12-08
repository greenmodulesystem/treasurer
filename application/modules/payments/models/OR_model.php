<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class OR_Model extends CI_Model
{
    private $table = array(
        "particular" => "tbl_particular",
        "payment"   =>  "tbl_payment",
        "pPaid" =>  "tbl_particular_paid",
        "accnt_form"    =>  "tbl_accountable_form",
        "temporary" =>  "tbl_temporary_payment",
        "cedula"    =>  "tbl_collection_cedula",
        "bank"  =>  "tbl_banks",
        "cheque" => "tbl_cheque"
    );

    public function __construct(){
        parent::__construct();        
        $this->ctodb = $this->load->database('ctodb', true);
    }   
   
    public function generate(){

        $this->ctodb->select("*"); 
        $this->ctodb->from($this->table['accnt_form'].' ac');
        $this->ctodb->where('ac.OR_Type','Accountable Form #'.$this->form);  
        $this->ctodb->where('ac.Done',0);
        $this->ctodb->where('ac.Collector_ID', $_SESSION['User_details']->ID);
        $avail_stabs = $this->ctodb->get()->result();
        
        $this->ctodb->select("*"); 
        $this->ctodb->from($this->table['payment'].' p');
        $this->ctodb->where('p.Accountable_form_origin',$this->form);  
        $this->ctodb->order_by('p.ID','desc');
        $last_or = $this->ctodb->get()->first_row();        

        $or_number = str_pad((@$last_or->Accountable_form_number + 1), 7, "0000000", STR_PAD_LEFT);  
        
        foreach ($avail_stabs as $key => $stab) {
            if(empty($last_or)){
                return $stab->Start_OR;
            }
            if($or_number <= $stab->End_OR){
                if($or_number >= $stab->Start_OR){
                    return ($or_number);
                }
                else{
                    return ($stab->Start_OR);
                }
            }
        }
        return null;
    }    
}
