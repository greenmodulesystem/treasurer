<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Void_Model extends CI_Model {

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
        $this->ctodb = $this->load->database('ctodb', TRUE);   //ANGELO 10/9/23
    }

    public function clone_data($data) {
        $table = "tbl_void_collection";
        $this->db->insert($table, $data);
    }
    
    public function clone_items($items) {
        $table = "tbl_void_collection_items";
        $data = [];
        foreach($items as $key => $item) {
            array_push($data, array(
                    "OR_number" => $item['OR_number'],
                    "Fee" => $item['Fee'],
                    "Amount" => $item['Amount'],
                )
            );
        }
        $this->db->insert_batch($table, $data);
    }

    public function receipt($OR){
        $this->db->where('OR_number', $OR);
        $query = $this->db->get('tbl_void_collection');
        return $query->first_row();
    }

    public function receipt_items($OR){
        $this->db->where('OR_number', $OR);
        $this->db->order_by('ID', 'asc');
        $query = $this->db->get('tbl_void_collection_items');
        return $query->result();
    }
    
    public function void_receipt($OR_number,$cyc_ID) {
        $this->db->delete("tbl_collection", array('OR_number' => $OR_number));
        $this->db->delete("tbl_collection_items", array('OR_number' => $OR_number));
        
        $table = "(tbl_collection, tbl_collection_items, tbl_void_collection, tbl_void_collection_items)";
        $module = "Collection - VOID RECEIPT";
        $action = "Add/Delete";
        $this->update_logs($module,$table,$action,$cyc_ID);
    }

    //ANGELO 10/9/23
    public function void_receipt_collection($OR_number) {
        $data = array(
            "Cancelled" => 1,
        );
        $this->ctodb->where('Accountable_form_number', $OR_number);
        $this->ctodb->update('tbl_payment', $data);
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

    //ADDED BY KYLE 10-27-2023
    public function revive_receipt(){

        //=======================================RETRIEVE DATA=======================================

        //Retrieve Data From tbl_void_collection
        $this->db->select('*');
        $this->db->where('OR_number', $this->OR_number);
        $from_void_collection = $this->db->get('tbl_void_collection')->row();

        //Retrieve Data From tbl_void_collection_items
        $this->db->select('*');
        $this->db->where('OR_number', $this->OR_number);
        $from_void_collection_items = $this->db->get('tbl_void_collection_items')->result();


        //========================================INSERT DATA========================================

        $this->db->trans_start();
        // Check tbl_collection if OR number is present "insert only once safety feature"
        $this->db->select('*');
        $this->db->where('OR_number', $this->OR_number);
        $check_collection = $this->db->get('tbl_collection')->row();

        if(empty($check_collection)){
            $collection_data = array(
                'Cycle_ID' => $from_void_collection->Cycle_ID,
                'Business_tax' => $from_void_collection->Business_tax,
                'Regulatory_fee' => $from_void_collection->Regulatory_fee,
                'Other_charges' => $from_void_collection->Other_charges,
                'Amount_paid' => $from_void_collection->Amount_paid,
                'Date_paid' => $from_void_collection->Date_paid,
                'Received_by ' => $from_void_collection->Received_by ,
                'Position' => $from_void_collection->Position,
                'OR_number' => $from_void_collection->OR_number,
                'Bank_name' => $from_void_collection->Bank_name,
                'Check_number' => $from_void_collection->Check_number,
                'Check_date' => $from_void_collection->Check_date,
                'Check_amount' => $from_void_collection->Check_amount,
                'Credits' => $from_void_collection->Credits,
                'Remarks' => $from_void_collection->Remarks,
                'revived' => 1,//Added new field in tbl_collection
            );
            $this->db->insert('tbl_collection', $collection_data);
        }

        // Check tbl_collection_items if OR number is present "insert only once safety feature"
        $this->db->select('*');
        $this->db->where('OR_number', $this->OR_number);
        $check_collection_items = $this->db->get('tbl_collection_items')->row();

        if(empty($check_collection_items)){
            foreach($from_void_collection_items as $data){
                $collection_items_data = array(
                    'OR_number' => $data->OR_number,
                    'Fee' => $data->Fee,
                    'Amount' => $data->Amount,
                );
                $this->db->insert('tbl_collection_items', $collection_items_data);
            }
        }

        $this->ctodb->where('Accountable_form_number', $this->OR_number);
        $this->ctodb->update('tbl_payment', ['Cancelled' => "0"]);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            throw new Exception(ERROR_PROCESSING);
        } else {
            $this->db->trans_commit();
            return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
        }

    }

    public function status($OR){
        $this->db->where('OR_number', $OR);
        $query = $this->db->get('tbl_collection');
        return $query->row();
    }

}