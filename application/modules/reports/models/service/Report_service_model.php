<?php
class Report_service_model extends CI_Model
{
    private $table = array(
        "particular"    =>  "tbl_particular",
        "part_paid"     =>  "tbl_particular_paid",
        "payment"       =>  "tbl_payment",
        "cedula"        =>  "tbl_collection_cedula",
        "accountable"   =>  "tbl_accountable_form",
        "user"          =>  "tbl_users",
        "cheque"        =>  "tbl_cheque",
        "colType"       =>  "tbl_collection_type",
        'orType'        =>  'tbl_or_type',
        "collection"    =>  'tbl_rpt_collection',
        'payer'         =>  'tbl_payer',
        'remitSched'    =>  'tbl_remit_schedule'
    );

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');

        $this->ctodb = $this->load->database('ctodb', TRUE);
    }
    
    /** declares public variables */

    public function save_remit_collection()
    {
        try {     
                             
            $Data = array(
                'Remitance' => 1,
                'Remit_number' => $this->RemitNo
            );
            if (empty($this->Data)) {
                throw new Exception(ERROR_PROCESSING, true);
            } 

            $this->Start_OR_number = $this->Data[0]['Accountable_form_number'];
            $this->OR_number = $this->Data[count($this->Data) - 1]['Accountable_form_number'];
            foreach ($this->Data as $key => $value) {
                // if (date('m') === date('m', strtotime($value['Date_paid']))) {
                    // if (date('d') === date('d', strtotime($value['Date_paid']))) {
                    $this->ctodb->where('pa.Accountable_form_number', $value['Accountable_form_number']);
                    $this->ctodb->update($this->table['payment'] . ' pa', $Data);
                    // }
                // }
            }
            if ($this->ctodb->trans_status() === FALSE) {
                $this->ctodb->trans_rollback();
                return FALSE;
            } else {
                $this->ctodb->trans_commit();
                $this->update_accountable_remittance();
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function update_accountable_remittance()
    {
        try {
            if (empty($this->OR_number)) {
                throw new Exception(ERROR_PROCESSING, true);
            }

            $this->ctodb->trans_start();
            $this->ctodb->where('End_OR', $this->OR_number);
            $this->ctodb->update($this->table['accountable'], array('Remittance' => 1));
            $this->ctodb->trans_complete();

            if ($this->ctodb->trans_status() === FALSE) {
                $this->ctodb->trans_rollback();
                return FALSE;
            } else {
                $this->ctodb->trans_commit();
                $this->save_remittance_number();
                // echo json_encode(array('error_message' => 'Remit Success', 'has_error' => false));
            }
        } catch (exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function save_remittance_number()
    {
        try {
           
            $this->ctodb->trans_start();
           
            $data = array(
                'Remittance_no' => $this->RemitNo,
                'Accountable_form_from' => $this->Start_OR_number,
                'Accountable_form_to' => $this->OR_number,
                'Collector_ID' => $this->ColID,
                'OR_for' => $this->OR_for,
                'Remittance_date' => date('Y-m-d', strtotime($this->Remittance_date)),
                'Date_created' => date('Y-m-d', strtotime($this->Date_created)),


            );
            $this->ctodb->insert($this->table['remitSched'], $data);
            $this->ctodb->trans_complete();

            if ($this->ctodb->trans_status() === FALSE) {
                $this->ctodb->trans_rollback();
                return FALSE;
            } else {
                
                $this->ctodb->trans_commit();
                echo json_encode(array('error_message' => 'Remit Success', 'has_error' => false));
            }
        } catch (exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }
}
