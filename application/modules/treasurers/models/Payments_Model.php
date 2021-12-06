<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_Model extends CI_Model {

    public $Data;
    public $colData;
    public $busColData;
    
    function __construct()
    {
        parent::__construct();
		$model_list = [
            'treasurers/Profiles_Model' => 'MProfiles',
		];
        $this->load->model($model_list);
        
        $libray_list = [
            "Logs_library" => 'logs'   
        ];
        $this->load->library($libray_list);
        $this->ctodb = $this->load->database('ctodb', TRUE);
    }

    function generate_AR($new_AR){
        $table = "tbl_treasurers_receipts";
        $start_num = 100000;
        $query = $this->db->get($table);
        $count = $query->num_rows();
        if($count == 0){
            return $start_num;
        }else if($new_AR){
            return $start_num + $count;
        }else{
            return $start_num + $count - 1;
        }
    }

    public function payment_history($ID){
        $result = $this->db->get_where('tbl_cycle',array('Application_ID'=>$ID))->result(); 
        $IDs = [];
        foreach($result as $r){array_push($IDs,$r->ID);}

        $this->db->order_by('ID', 'desc');
        $this->db->where_in('Cycle_ID', $IDs);
        $query = $this->db->get('tbl_collection');
        
        return $query->result();
    }

    public function void_receipts($ID){
        $result = $this->db->get_where('tbl_cycle',array('Application_ID'=>$ID))->result(); 
        $IDs = [];
        foreach($result as $r){array_push($IDs,$r->ID);}

        $this->db->order_by('ID', 'desc');
        $this->db->where_in('Cycle_ID', $IDs);
        $query = $this->db->get('tbl_void_collection');
        
        return $query->result();
    }
    
    public function collection($rcvr,$from='',$to=''){
        date_default_timezone_set('Asia/Manila');
        $this->db->select(
            'cl.*,'.
            'a.Business_name'
        );
        $this->db->from('tbl_collection cl');
        $this->db->join('tbl_cycle c', 'c.ID = cl.Cycle_ID', 'left');
        $this->db->join('tbl_application_form a', 'a.ID = c.Application_ID', 'left');
        $this->db->where('cl.Received_by', $rcvr);
        if($from == '' && $to == ''){
            $this->db->where('DATE(cl.Date_paid) >=', date('Y-m-d'));
            $this->db->where('DATE(cl.Date_paid) <=', date('Y-m-d'));
        } else {
            $this->db->where('DATE(cl.Date_paid) >=', date('Y-m-d', strtotime($from)));
            $this->db->where('DATE(cl.Date_paid) <=', date('Y-m-d', strtotime($to)));
        }
        $this->db->order_by('cl.ID', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function receipt($OR){
        $this->db->where('OR_number', $OR);
        $query = $this->db->get('tbl_collection');
        return $query->first_row();
    }

    public function receipt_items($OR){
        $this->db->where('OR_number', $OR);
        $this->db->order_by('ID', 'asc');
        $query = $this->db->get('tbl_collection_items');
        return $query->result();
    }
    
    public function save_payments($fields){
        $table = "tbl_treasurers_payments";
        $new_AR = false;
        $AR_Number = $this->generate_AR($new_AR);
        $Application_ID = $fields['Application_ID'];
        $Payee = $fields['Payee'];
        $Pay_fors = $fields['Pay_for'];
        $Quantity = $fields['Quantity'];
        $Amount_to_pay = $fields['Amount_to_pay'];
        $data = [];
        foreach($Pay_fors as $key => $Pay_for) {
            array_push($data, array(
                    "Application_ID" => $Application_ID,
                    "Payee" => $Payee,
                    "Pay_for" => $Pay_for,
                    "Quantity" => $Quantity[$key],
                    "Amount_to_pay" => $Amount_to_pay[$key],
                    "AR_Number" => $AR_Number
                )
            );
        }
        $this->db->insert_batch($table, $data);
    }
    
    public function save_items($Fees,$OR_num,$A_ID,$Qtrs,$Blines,$Full){
        $this->db->where('Assessment_ID', $A_ID);
        $this->db->where_in('Qtr', $Qtrs);
        $query = $this->db->get('tbl_billing_fees');
        $result = $query->result();

        $table = "tbl_collection_items";
        $data = [];
        /** collection code */
            $colData = [];
            $busColData = [];
        /** END */
        $surcharge = 0;
        $interest = 0; 
        $account = '';
        foreach($Fees as $key => $infos) {
            if($infos != null) { 
                foreach($infos as $key1 => $info) {
                    $Fee = '';
                    if($key == 'Business Tax') {
                        $qtrpaid = ', Qtr paid:';
                        $balance = 0;
                        if($Full){
                            foreach($result as $r) {
                                if($r->Line_of_business == $key1) {
                                    $balance += $r->Balance;
                                    $surcharge += $r->Surcharge;
                                    $interest += $r->Interest;
                                }
                            }
                            $qtrpaid .= '1,2,3,4,';
                        } else { 
                            foreach($result as $r) {
                                if($r->Line_of_business == $key1) {
                                    $qtrpaid .= (strval($r->Qtr).',');
                                    $balance += $r->Balance;
                                    $surcharge += $r->Surcharge;
                                    $interest += $r->Interest;
                                }
                            }
                        }
                        foreach($Blines as $line) {
                            if($line->Business_line == $key1) {
                                $category = ($line->Business_category == 'Dealer' || $line->Business_category == 'Wholesaler' 
                                || $line->Business_category == 'Producer' || $line->Business_category == 'Other') ? 'Wholesaler' :
                                $line->Business_category;
                                $account = 'Business Tax for '.$category;
                            }
                        }
                        $Fee = $account.' ('.$key1.substr($qtrpaid, 0, -1).')';
                        array_push($data, array(
                                "OR_number" => $OR_num,
                                "Fee" => $Fee,
                                "Amount" => $balance
                            )
                        );

                        /** assign value to collectio data to insert into collection database, table payment */
                        array_push($colData, array(
                            'Amount' => $balance, 
                            'Accountable_form_number'   => $OR_num,
                            'Accountable_form_origin'   =>  51
                        ));
                        /** END */

                        /** assign value to business collection data to insert into collection database, table business collection items */
                        array_push($busColData, array(
                            'Particular' => $Fee,
                            'Amount'     => $balance                             
                        ));
                        /** END */
                    } else {
                        if($info['Fee'] != 0) {
                            if(strpos($key1, '- Mayor\'s Permit')) {
                                $Fee = 'Mayor\'s Permit ('.str_replace(' - Mayor\'s Permit','',$key1).')';
                            } else {
                                $Fee = $key1;
                            }
                            array_push($data, array(
                                    "OR_number" => $OR_num,
                                    "Fee" => $Fee,
                                    "Amount" => floatval(preg_replace("/[^-0-9\.]/","",$info['Fee']))
                                )
                            );

                            /** insert data into collection database, table payment */
                            array_push($colData, array(
                                'Amount' => floatval(preg_replace("/[^-0-9\.]/","",$info['Fee'])), 
                                'Accountable_form_number'   => $OR_num,
                                'Accountable_form_origin'   =>  51
                            ));
                            /** END */

                            /** assign value to business collection data to insert into collection database, table business collection items */
                            array_push($busColData, array(
                                'Particular' => $Fee,
                                'Amount'     => floatval(preg_replace("/[^-0-9\.]/","",$info['Fee']))                             
                            ));
                            /** END */
                        }
                    }
                }
            }
        }

        if($surcharge != 0) {
            array_push($data, array(
                    "OR_number" => $OR_num,
                    "Fee" => 'Surcharge-Business Tax',
                    "Amount" => round($surcharge,2)
                )
            );

            /** insert data into collection database, table payment */
            array_push($colData, array(
                'Amount' => round($surcharge,2), 
                'Accountable_form_number'   => $OR_num,
                'Accountable_form_origin'   =>  51
            ));
            /** END */

            /** assign value to business collection data to insert into collection database, table business collection items */
            array_push($busColData, array(
                'Particular' => $Fee,
                'Amount'     => round($surcharge,2)                             
            ));
            /** END */
        }

        if($interest != 0) {
            array_push($data, array(
                    "OR_number" => $OR_num,
                    "Fee" => 'Interest-Business Tax',
                    "Amount" => round($interest,2)
                )
            );

            /** insert data into collection database, table payment */
            array_push($colData, array(
                'Amount' => round($interest,2),
                'Accountable_form_number'   => $OR_num,
                'Accountable_form_origin'   =>  51
            ));
            /** END */

            /** assign value to business collection data to insert into collection database, table business collection items */
            array_push($busColData, array(
                'Particular' => $Fee,
                'Amount'     => round($interest,2)                           
            ));
            /** END */
        }        
        $this->db->insert_batch($table, $data);
        $this->Data = $data;
        $this->colData = $colData;
        $this->insert_business_col_items();
        $this->insert_treasurer_table();
        $this->insert_treasurer_ppaid();        
    }

    /** insert into treasurer's collection database, in table payment  */
    public function insert_treasurer_table(){
        try{                                
            $data = array(
                'Accountable_form_number' => $this->Data[0]['OR_number'], 
                'Accountable_form_origin' => 51, 
                'Payor' => $this->Payor_name, 
                'Paid_by' => $this->Payor_name, 
                'Address' => $this->payorAddress,
                'Collector' => $_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name,                                 
                'Collector_ID' => $_SESSION['User_details']->ID
            );
            
            $this->ctodb->trans_start();
            $this->ctodb->insert('tbl_payment', $data);
            $this->ctodb->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } 
            else {
                $this->db->trans_commit();                                                       
            } 
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    /** insert into treasurer's collection database, in table particular paid  */
    public function insert_treasurer_ppaid(){
        try{                       
            $this->ctodb->trans_start();
            $this->ctodb->insert_batch('tbl_particular_paid', $this->colData);
            $this->ctodb->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } 
            else {
                $this->db->trans_commit();                                                       
            } 
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    /** insert into treasurer's collection database, in table business collection items  */
    public function insert_business_col_items(){
        try{

        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function preview_items($Fees,$OR_num,$A_ID,$Qtrs,$Blines,$Full){
        $this->db->where('Assessment_ID', $A_ID);
        $this->db->where_in('Qtr', $Qtrs);
        $query = $this->db->get('tbl_billing_fees');
        $result = $query->result();

        $table = "tbl_collection_items";
        $data = [];
        $surcharge = 0;
        $interest = 0; 
        $account = '';
        foreach($Fees as $key => $infos) {
            if($infos != null) { 
                foreach($infos as $key1 => $info) {
                    $Fee = '';
                    if($key == 'Business Tax') {
                        $qtrpaid = ', Qtr paid:';
                        $balance = 0;
                        if($Full){
                            foreach($result as $r) {
                                if($r->Line_of_business == $key1) {
                                    $balance += $r->Balance;
                                    $surcharge += $r->Surcharge;
                                    $interest += $r->Interest;
                                }
                            }
                            $qtrpaid .= '1,2,3,4,';
                        } else {
                            foreach($result as $r) {
                                if($r->Line_of_business == $key1) {
                                    $qtrpaid .= (strval($r->Qtr).',');
                                    $balance += $r->Balance;
                                    $surcharge += $r->Surcharge;
                                    $interest += $r->Interest;
                                }
                            }
                        }
                        foreach($Blines as $line) {
                            if($line->Business_line == $key1) {
                                $category = ($line->Business_category == 'Dealer' || $line->Business_category == 'Wholesaler' 
                                || $line->Business_category == 'Producer' || $line->Business_category == 'Other') ? 'Wholesaler' :
                                $line->Business_category;
                                $account = 'Business Tax for '.$category;
                            }
                        }
                        $Fee = $account.' ('.$key1.substr($qtrpaid, 0, -1).')';
                        array_push($data, array(
                                "OR_number" => $OR_num,
                                "Fee" => $Fee,
                                "Amount" => $balance
                            )
                        );
                    } else {
                        if($info['Fee'] != 0) {
                            if(strpos($key1, '- Mayor\'s Permit')) {
                                $Fee = 'Mayor\'s Permit ('.str_replace(' - Mayor\'s Permit','',$key1).')';
                            } else {
                                $Fee = $key1;
                            }
                            array_push($data, array(
                                    "OR_number" => $OR_num,
                                    "Fee" => $Fee,
                                    "Amount" => floatval(preg_replace("/[^-0-9\.]/","",$info['Fee']))
                                )
                            );
                        }
                    }
                }
            }
        }

        if($surcharge != 0) {
            array_push($data, array(
                    "OR_number" => $OR_num,
                    "Fee" => 'Surcharge-Business Tax',
                    "Amount" => round($surcharge,2)
                )
            );
        }

        if($interest != 0) {
            array_push($data, array(
                    "OR_number" => $OR_num,
                    "Fee" => 'Interest-Business Tax',
                    "Amount" => round($interest,2)
                )
            );
        }

        return $data;
    }

    public function save_receipt($data,$ID){
        $cycle = $this->getcycleID($ID);
        $data['Cycle_ID'] = $cycle->ID;
        $table = "tbl_collection";
        $this->db->insert($table, $data);       
        
        $module = "Collection - PAYMENT";
        $action = "Add";
        $this->update_logs($module,$table,$action,$cycle->ID);
    }

    public function get_items($OR_num){
        $this->db->where('OR_number', $OR_num);
        $query = $this->db->get('tbl_collection_items');
        return $query->result();
    }

    private function getcycleDate($ID){
        $this->db->select('tbl_cycle.Cycle_date');
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get_where('tbl_cycle',array('Application_ID'=>$ID))->first_row();        
        return $query;
    }

    private function getcycleID($ID){
        $cycle = $this->getcycleDate($ID);   
        $this->db->select('ID');
        $this->db->from('tbl_cycle');
        $this->db->where('Cycle_date', $cycle->Cycle_date);
        $this->db->where('Application_ID', $ID);
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get()->first_row();    
        return $query;
    }
    
    public function update_fees($Qtrs,$ID,$Credits){
        $data = [];
        $this_qtr = 0;
        foreach($Qtrs as $qtr) {
            array_push($data, array(
                "Qtr" => $qtr,
                "Balance" => 0,
                "Surcharge" => 0,
                "Interest" => 0
                )
            );
            $this_qtr = $qtr;
        }
        $this->db->where('Assessment_ID', $ID);
        $this->db->update_batch('tbl_billing_fees', $data, 'Qtr');
        $this->credits($this_qtr+1,$ID,$Credits);
    }
    
    public function credits($Qtr,$ID,$Credits){
        $this->db->order_by('Balance', 'asc');
        $query = $this->db->get_where('tbl_billing_fees',array('Assessment_ID'=>$ID,'Qtr'=>$Qtr));
        $result = $query->result();
        $rows = $query->num_rows();
        if($Credits != 0){
            $cred = $Credits/$rows;
            $data = [];
    
            foreach($result as $key => $r) {
                // var_dump('QTR '.$r->Qtr.'('.$r->Line_of_business.')');
                $left[$key] = $key == 0 ? $cred : $cred + $left[$key-1];
                // var_dump('CREDIT: '.$left[$key]);
                $int = $r->Interest - $left[$key] >= 0 ? $r->Interest - $left[$key] : 0;
                $left[$key] = $left[$key] - $r->Interest >= 0 ? $left[$key] - $r->Interest : 0;
                // var_dump('INT: '.$int.' --- LEFT: '.$left[$key]);
                $sur = $r->Surcharge - $left[$key] >= 0 ? $r->Surcharge - $left[$key] : 0;
                $left[$key] = $left[$key] - $r->Surcharge >= 0 ? $left[$key] - $r->Surcharge : 0;
                // var_dump('SUR: '.$sur.' --- LEFT: '.$left[$key]);
                $bal = $r->Balance - $left[$key] >= 0 ? $r->Balance - $left[$key] : 0;
                $left[$key] = $left[$key] - $r->Balance >= 0 ? $left[$key] - $r->Balance : 0;
                // var_dump('BAL: '.$bal.' --- LEFT: '.$left[$key]);
                array_push($data, array(
                    "ID" => $r->ID,
                    "Balance" => round($bal,2),
                    "Surcharge" => round($sur,2),
                    "Interest" => round($int,2)
                    )
                );
            }
            $this->db->where('Assessment_ID', $ID);
            $this->db->update_batch('tbl_billing_fees', $data, 'ID');
        }
    }
    
    public function update_engr($date,$ID){
        $cycle = $this->getcycleID($ID);  
        $engineer = $this->get_engineer_ID($cycle->ID);
        $this->db->set('Payment_date', $date);
        $this->db->where('City_engineer_ID', $ID);
        $this->db->update('tbl_city_engineer_line');
    }

    private function get_engineer_ID($ID){
        $this->db->select('ID');
        $this->db->from('tbl_city_engineer');
        $this->db->where('Cycle_ID', $ID);
        $query = $this->db->get();
        return $query->first_row();
    }

    public function update_logs($module,$table,$action,$ID) {
        $this->logs->User_ID = $_SESSION['User_details']->ID;
        $this->logs->Last_name = $_SESSION['User_details']->Last_name;
        $this->logs->Module = $module;
        $this->logs->Table = $table;
        $this->logs->Action = $action;
        $this->logs->Application_ID = $this->MProfiles->get_App_ID($ID);
        $this->logs->record();
    }
}