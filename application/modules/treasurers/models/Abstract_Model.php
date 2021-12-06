<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ----------------------------------------------- 02-18-2020 ----------------------------------------------- */
class Abstract_Model extends CI_Model {
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

    public function abstract($rcvr,$date=''){
        date_default_timezone_set('Asia/Manila');
        $this->db->select(
            'cl.Date_paid,'.
            'ci.OR_number,'.
            'REPLACE(ci.Fee, SUBSTRING(ci.Fee, LOCATE("(", ci.Fee), LENGTH(ci.Fee) - LOCATE(")", REVERSE(ci.Fee)) - LOCATE("(", ci.Fee) + 2), "") AS Fee,'.
            'ci.Amount,'.
            'a.Business_name'
        );
        $this->db->from('tbl_collection cl');
        $this->db->join('tbl_collection_items ci', 'ci.OR_number = cl.OR_number', 'left');
        $this->db->join('tbl_cycle c', 'c.ID = cl.Cycle_ID', 'left');
        $this->db->join('tbl_application_form a', 'a.ID = c.Application_ID', 'left');
        $this->db->where('cl.Received_by', $rcvr);
        // $this->db->where('cl.Received_by', 'Jeinelyn P. Abiera');
        if($date == ''){
            $this->db->where('DATE(cl.Date_paid)', date('Y-m-d'));
        } else {
            $this->db->where('DATE(cl.Date_paid)', date('Y-m-d', strtotime($date)));
        }
        $this->db->order_by('cl.OR_number', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function abstract_summary($rcvr,$date=''){
        date_default_timezone_set('Asia/Manila');
        if($date == ''){
            $dt = date('Y-m-d');
        } else {
            $dt = date('Y-m-d', strtotime($date));
        }
        $Amount =   "SELECT
                        SUM(ci.Amount)
                    FROM
                        `tbl_collection` `cl`
                    LEFT JOIN
                        `tbl_collection_items` `ci` ON `ci`.`OR_number` = `cl`.`OR_number`
                    LEFT JOIN
                        `tbl_cycle` `c` ON `c`.`ID` = `cl`.`Cycle_ID`
                    LEFT JOIN
                        `tbl_application_form` `a` ON `a`.`ID` = `c`.`Application_ID`
                    WHERE
                        -- `cl`.`Received_by` = 'Jeinelyn P. Abiera'
                        `cl`.`Received_by` = '".$rcvr."'
                    AND
                        DATE(`cl`.`Date_paid`) = '".$dt."'
                    AND
                        REPLACE(`ci`.`Fee`, SUBSTRING(`ci`.`Fee`, LOCATE('(', `ci`.`Fee`), LENGTH(`ci`.`Fee`) - LOCATE(')', REVERSE(`ci`.`Fee`)) - LOCATE('(', `ci`.`Fee`) + 2), '') =
                        REPLACE(`i`.`Fee`, SUBSTRING(`i`.`Fee`, LOCATE('(', `i`.`Fee`), LENGTH(`i`.`Fee`) - LOCATE(')', REVERSE(`i`.`Fee`)) - LOCATE('(', `i`.`Fee`) + 2), '')
                    ";
        $this->db->select(
            'REPLACE(i.Fee, SUBSTRING(i.Fee, LOCATE("(", i.Fee), LENGTH(i.Fee) - LOCATE(")", REVERSE(i.Fee)) - LOCATE("(", i.Fee) + 2), "") AS Fee,'.
            '('.$Amount.') AS Amount'
        );
        $this->db->from('tbl_collection cl');
        $this->db->join('tbl_collection_items i', 'i.OR_number = cl.OR_number', 'left');
        $this->db->join('tbl_cycle c', 'c.ID = cl.Cycle_ID', 'left');
        $this->db->join('tbl_application_form a', 'a.ID = c.Application_ID', 'left');
        $this->db->where('cl.Received_by', $rcvr);
        // $this->db->where('cl.Received_by', 'Jeinelyn P. Abiera');
        if($date == ''){
            $this->db->where('DATE(cl.Date_paid)', date('Y-m-d'));
        } else {
            $this->db->where('DATE(cl.Date_paid)', date('Y-m-d', strtotime($date)));
        }
        $this->db->order_by('Fee', 'asc');
        $this->db->group_by('REPLACE(Fee, SUBSTRING(Fee, LOCATE("(", Fee), LENGTH(Fee) - LOCATE(")", REVERSE(Fee)) - LOCATE("(", Fee) + 2), "")');
        $query = $this->db->get();
        return $query->result();
    }
}
/* ----------------------------------------------- 02-18-2020 ----------------------------------------------- */