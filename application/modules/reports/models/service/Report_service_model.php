<?php
class Report_service_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');

        $this->ctodb = $this->load->database('ctodb', TRUE);
    }

    public function save_remit_collection()
    {
        try {
            $Data = array(
                'Remitance' => 1
            );
            if (empty($this->Data)) {
                throw new Exception(ERROR_PROCESSING, true);
            }

            $this->OR_number = $this->Data[count($this->Data) - 1]['Accountable_form_number'];
            foreach ($this->Data as $value) {
                if (date('m') === date('m', strtotime($value['Date_paid']))) {
                    // if (date('d') === date('d', strtotime($value['Date_paid']))) {
                    $this->ctodb->where('pa.Accountable_form_number', $value['Accountable_form_number']);
                    $this->ctodb->update(TABLE['payment'] . ' pa', $Data);
                    // }
                }
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
            $this->ctodb->update(TABLE['accountable'], array('Remittance' => 1));
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
