<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ----------------------------------------------- 02-19-2020 ----------------------------------------------- */
class Billing_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function billing_fees($ID){
        $this->db->where('Assessment_ID', $ID);
        $query = $this->db->get('tbl_billing_fees');
        $result = $query->result();

        $data = [];
        foreach($result as $key => $r) {
            array_push($data, array(
                "Assessment_ID" => $r->Assessment_ID,
                "Qtr" => $r->Qtr,
                "Line_of_business" => $r->Line_of_business,
                "Due_date" => $r->Due_date,
                "Balance" => $r->Balance,
                "Discount" => $r->Discount,
                "Surcharge" => $r->Surcharge,
                "Interest" => $r->Interest
                )
            );
        }

        return $data;
    }
    
    public function collection($ID){
        $cycle = $this->getcycleID($ID);
        $query = $this->db->get_where('tbl_collection',array('Cycle_ID'=>$cycle->ID));
        return $query->num_rows();
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
}
/* ----------------------------------------------- 02-19-2020 ----------------------------------------------- */