<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ----------------------------------------------- 02-19-2020 ----------------------------------------------- */
class Assessment_Model extends CI_Model {

    public $Application_ID;
   
    function __construct()
    {
        parent::__construct();
    }

    public function assessment($ID){
        $cycle = $this->getcycleID($ID);
        $this->db->where('Cycle_ID', $cycle->ID);
        $this->db->order_by('Date_assessed', 'desc');
        $query = $this->db->get('tbl_assessment');
        return $query->first_row();
    }

    public function assessment_fees2($a_ID,$ID){
        $cycle = $this->getcycleID($ID);
        $this->db->where('Assessment_ID', $a_ID);
        $query = $this->db->get('tbl_assessment_fees');
        $result = $query->result();

        $collect = $this->db->get_where('tbl_collection',array('Cycle_ID'=>$cycle->ID));    
        
        $tax = [];
        $reg = [];
        $chr = [];

        foreach($result as $r) {
            if($r->Fee_category == 'Business Tax') {
                $tax[$r->Fee_name] = array(
                    "Status" => $r->Fee_status,
                    "Fee" => $collect->num_rows() > 0 ? 0 : $r->Fee
                );
            } else if($r->Fee_category == 'Regulatory Fee') {
                $reg[$r->Fee_name] = array(
                    "Status" => $r->Fee_status,
                    "Fee" => $collect->num_rows() > 0 ? 0 : $r->Fee
                );
            } else {
                $chr[$r->Fee_name]  = array(
                    "Status" => $r->Fee_status,
                    "Fee" => $collect->num_rows() > 0 ? 0 : $r->Fee
                );
            }
        }

        $data = new ArrayObject( 
            array(
                'Business Tax' => $tax,
                'Regulatory Fee' => $reg,
                'Other Charge' => $chr
            )
        );
        return $data;
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