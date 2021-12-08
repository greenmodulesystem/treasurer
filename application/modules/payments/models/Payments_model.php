
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payments_model extends CI_Model
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
    public function __construct(){
        parent::__construct();        
        $this->ctodb = $this->load->database('ctodb', true);
    }   

    public $particulars = [];
    public $cheque = [];
    public $Cancelled = 0;
    public $from;
    public $to;
    public function save_payment(){
        try{
            if(empty($this->Payor) && empty($this->Paid_by)){
                throw new Exception("Please provide either Payor's or Representative information.", 1);
            }
            if(empty($this->Accountable_form_number)){
                throw new Exception("OR number missing.", 1);
                
            }
            $details = $this->get_or_details();
            if(empty($details)){
                $data = array(
                    'Accountable_form_origin' => $this->Accountable_form_origin,
                    'Accountable_form_number'   =>  $this->Accountable_form_number,
                    'Payor' =>  $this->Payor,
                    'Paid_by'   =>  $this->Paid_by,
                    'Address' => $this->Address,
                    'Cheque' => @$this->cheque->amount > 0,
                    'Date_paid' => date('Y-m-d', strtotime($this->Date_paid)),
                    'Cash' => $this->Cash,
                    'Collector' =>  ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name,
                    'Collector_ID' => ($_SESSION['User_details'] == null) ? null : $_SESSION['User_details']->ID,
                    'City_municipality' => $this->City_municipality,
                    'Province' => $this->Province,
                    'Sex' => $this->Sex,
                    'Age' => $this->Age, 
                    'Ownership_no' => $this->Ownership_no,
                    'City_municipality_brand' => $this->City_municipality_brand,
                    'Owner_brand' => $this->Owner_brand,
                    'Conveyor' => $this->Conveyor,
                    'Conveyor_Address' => $this->Conveyor_Address,
                    'Conveyor_City_Municipality' => $this->Conveyor_City_Municipality,
                    'Conveyor_Province' => $this->Conveyor_Province 
                );
                $this->ctodb->trans_start();
                $this->ctodb->insert($this->table['payment'], $data);
                $insert_id = $this->ctodb->insert_id();
                
                
                $particulars = [];
                foreach ($this->particulars as $key => $value) {
                    array_push($particulars, [
                        'Accountable_form_number'   => $this->Accountable_form_number,   
                        'Accountable_form_origin' => $this->Accountable_form_origin,                
                        'Particular_ID' =>  $value['id'],
                        'Description' =>  $value['description'],
                        'Amount'   =>  $value['amount']     
                    ]);
                }
               
                if(@$this->cheque['amount'] > 0){
                    if(empty($this->cheque['bank']) || empty($this->cheque['no']) || empty($this->cheque['date'])){
                        throw new Exception("Please provide cheque details.", 1);
                    }
                    $data = array(
                        'Payment_ID' => $insert_id,
                        'Bank_name' => $this->cheque['bank'],
                        'Check_no' => $this->cheque['no'],
                        'Check_date' => $this->cheque['date'],
                        'Check_amount' => $this->cheque['amount'],
                    );
                    $this->ctodb->insert($this->table['cheque'], $data);
                }
                $this->ctodb->insert_batch($this->table['pPaid'], $particulars);
                if ($this->ctodb->trans_status() === FALSE) {
                    $this->ctodb->trans_rollback();
                    throw new Exception("Error in transmitting data.", 1);
                } 
                $this->ctodb->trans_complete();
                $details = $this->get_or_details();
            }
            
            return array(
                'has_error' => false,
                'message' => 'Transaction success.',
                'data' => $details,
            );
        }catch(Exception $e){

            return array(
                'has_error' => true,
                'error_message' => $e->getMessage()
            );
        }
    }

    public function get_or_details(){
        $this->ctodb->where('Accountable_form_number', $this->Accountable_form_number);
        $this->ctodb->where('Accountable_form_origin', $this->Accountable_form_origin);
        $this->ctodb->order_by('ID','desc');
        $data = $this->ctodb->get($this->table['payment'])->first_row();
        if(!empty($data)){
            $this->ctodb->select('
                pd.Amount,
                pd.Description,
                p.Particular,
            ');
            $this->ctodb->from($this->table['pPaid'].' pd');
            $this->ctodb->join($this->table['particular'].' p','p.ID=pd.Particular_ID','left');
            $this->ctodb->where('pd.Accountable_form_number',$this->Accountable_form_number);
            $this->ctodb->where('pd.Accountable_form_origin',$this->Accountable_form_origin);
            $data->particulars = $this->ctodb->get()->result();
            $data->cheque = $this->ctodb->get_where($this->table['payment'],array('Payment_ID',$data->ID))->first_row();
        }
        return $data;
        
    }
    
    public function void_receipt(){
        try {
            $details = $this->get_or_details();
            if(empty($this->Accountable_form_number) || empty($this->Accountable_form_origin) || empty($details )){
                throw new Exception("Receipt not found.", 1);
            }
            if($details->Cancelled === '1'){
                throw new Exception("Receipt was already VOIDED.", 1);
                
            }
            $this->ctodb->where('ID',$this->ID);
            $this->ctodb->where('Accountable_form_number', $this->Accountable_form_number);
            $this->ctodb->where('Accountable_form_origin', $this->Accountable_form_origin);
            $this->ctodb->update($this->table['payment'],array('Cancelled' => 1, 'OR_Remarks' => $this->Remarks));
            return array(
                'has_error' => false,
                'message' => 'Transaction success.',
                'data' => $details,
            );
        }catch(Exception $e){

            return array(
                'has_error' => true,
                'error_message' => $e->getMessage()
            );
        }
    }

    public function get_all_receipts(){
        $this->ctodb->select('*');
        $this->ctodb->like('Accountable_form_origin' , $this->Accountable_form_origin );
        $this->ctodb->like('Accountable_form_number' , $this->Accountable_form_number );
        if($this->Cancelled === '1'){

            $this->ctodb->where('Cancelled',1);
        }else{
            $this->ctodb->where('Cancelled',0);
        }
        $this->ctodb->where('Accountable_form_origin!=',NULL);
        
        $receipts = $this->ctodb->get($this->table['payment'])->result();
        return $receipts;
    }

    public function reports($type="1"){
        if($type === '1'){
            $stabs = [
                // [
                //     'start' => '0000001',
                //     'end' =>   '0000010',
                // ], 
                // [
                //     'start' => '0000011',
                //     'end' =>   '0000020',
                // ], 
                // [
                //     'start' => '0000030',
                //     'end' =>   '0000100',
                // ], 
            ];
            
            $this->ctodb->select("*"); 
            $this->ctodb->from($this->table['accnt_form'].' ac');
            $this->ctodb->where('ac.OR_Type',$this->Accountable_form_origin.' General Collection');  
            $this->ctodb->where('ac.Done',0);
            $avail_stabs = $this->ctodb->get()->result();
            foreach ($avail_stabs as $key => $value) {
                array_push($stabs,['start' => $value->Start_OR,'end' => $value->End_OR]);
            }
            
            $this->ctodb->select('
                pm.Accountable_form_number,
                (
                    SELECT SUM(`pd`.`Amount`) FROM '.$this->table['pPaid'].' as `pd` WHERE `pd`.`Accountable_form_number`=`pm`.`Accountable_form_number`
                ) as Amount
            ');
            $this->ctodb->from($this->table['payment'].' pm');
            $this->ctodb->where('pm.Accountable_form_origin!=',NULL);
            $this->ctodb->where('pm.Accountable_form_origin',$this->Accountable_form_origin);
            $this->ctodb->where('DATE(pm.Date_Paid)>=',date('Y-m-d',strtotime($this->from)));
            $this->ctodb->where('DATE(pm.Date_Paid)<=',date('Y-m-d',strtotime($this->to)));
                    
            $this->ctodb->order_by('pm.ID','asc');
            $particulars = $this->ctodb->get()->result();
            $formatted_data = [];
            foreach ($stabs as $key => $stab) {
                $data = [
                    'particulars' => [],
                    'amount' => 0,
                ];
                foreach ($particulars as $particular) {
                    if( $particular->Accountable_form_number >= $stab['start'] && $particular->Accountable_form_number <= $stab['end'] ){
                        array_push($data['particulars'],$particular); 
                        $data['amount']+=(float)$particular->Amount; 
                    }
                       
                }
                if(!empty($data['particulars'])){
                    array_push($formatted_data,$data);
                }
               
            }
            return $formatted_data;
        }   
        else if($type === '2'){
            $this->ctodb->select('
                pp.Amount,
                pp.Description,
                pm.Accountable_form_number,
                pm.Payor,
                pm.Paid_by,
                pm.Date_Paid,
                p.Particular,
            ');
            $this->ctodb->from($this->table['pPaid'].' pp');
            $this->ctodb->join($this->table['payment'].' pm','pm.Accountable_form_number=pp.Accountable_form_number and pm.Accountable_form_origin=pp.Accountable_form_origin','left');
            $this->ctodb->join($this->table['particular'].' p','p.ID=pp.Particular_ID','left');
            $this->ctodb->where('pm.Accountable_form_origin',$this->Accountable_form_origin);
            $this->ctodb->where('DATE(pm.Date_Paid)>=',date('Y-m-d',strtotime($this->from)));
            $this->ctodb->where('DATE(pm.Date_Paid)<=',date('Y-m-d',strtotime($this->to)));
            
            $this->ctodb->order_by('pm.ID','asc');
            $particulars = $this->ctodb->get()->result();
            $data = [
                'particulars' =>   $particulars,
                'total' => 0
            ];
            foreach ($particulars as $key => $value) {
                $data['total'] += $value->Amount;
            }
            return $data;
        }    
    }

    public function get_stabs(){
        $this->ctodb->select("*, (
           ((`af`.`End_OR` - `af`.`Start_OR`)+1) - (SELECT count(*) FROM ".$this->table['payment']." as p where `p`.`Accountable_form_origin` = '".$this->Accountable_form_origin."' and `p`.`Accountable_form_number` >= `af`.`Start_OR` and `p`.`Accountable_form_number` <= `af`.`End_OR`)
        ) as remaining");
        $this->ctodb->from($this->table['accnt_form'].'  af');
        $this->ctodb->where('af.OR_type',$this->Accountable_form_origin.' General Collection');
        $this->ctodb->where('af.Collector_ID',$_SESSION['User_details']->ID);
       
        $data = $this->ctodb->get()->result();
        return $data;
    }
}
?>