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