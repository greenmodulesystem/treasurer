<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Certificates_model extends CI_Model
{
    private $table = array(
        "particular" => "tbl_particular",
        "payment"   =>  "tbl_payment",
        "pPaid" =>  "tbl_particular_paid",
        "accnt_form"    =>  "tbl_accountable_form",
        "temporary" =>  "tbl_temporary_payment",
        "cedula"    =>  "tbl_collection_cedula",
        "bank"  =>  "tbl_banks",
        "cheque" => "tbl_cheque",
        "cert" => "tbl_certificates"
    );

    public $form;
    public $or_number;
    public function __construct(){
        parent::__construct();        
        $this->ctodb = $this->load->database('ctodb', true);
    }   
    
   
    public function generate(){
        try {
            if(empty($this->form) || empty($this->or_number)){
                throw new Exception("Missing details", 1);
            }
            $this->ctodb->select('*');
            $this->ctodb->from($this->table['payment'].' p');
            $this->ctodb->where('p.Accountable_form_number',$this->or_number);
            $this->ctodb->where('p.Accountable_form_origin',$this->form);
            $or_details = $this->ctodb->get()->first_row();
            if (empty($or_details)) {
                throw new Exception("Receipt not found.", 1);
            }
           
            $certificate_details = $this->get_details();
           
            if (empty($certificate_details)) {
                $data = [
                    'Payment_ID' => $or_details->ID,
                    'Office' => OFFICE_R[OFFICE]['LONG']
                ];
                $this->ctodb->insert($this->table['cert'],$data);
                $certificate_details = $this->get_details();

            }
            return array(
                'has_error' => false,
                'data' => $certificate_details,
                'message' => 'Certificate success.',
            );
        } catch (Exception $e) {
            return array(
                'has_error' => true,
                'error_message' => $e->getMessage()
            );
        }
       
    }

    public function get_details(){
        $this->ctodb->select('*');
        $this->ctodb->from($this->table['cert'].' c');
        $this->ctodb->join($this->table['payment'].' p','p.ID=c.Payment_ID');
        $this->ctodb->where('p.Accountable_form_number',$this->or_number);
        $this->ctodb->where('p.Accountable_form_origin',$this->form);
        $data = $this->ctodb->get()->first_row();
        return $data;
    }
    
    
}
