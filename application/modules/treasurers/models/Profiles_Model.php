<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles_Model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
    }

    public function banks(){
        $this->db->order_by('Bank_name_short', 'asc');
        $query = $this->db->get('tbl_banks');
        return $query->result();
    }

    public function get_profile($ID){
        $this->db->select(
            'a.ID,'.
            'a.Last_name,'.
            'a.First_name,'.
            'a.Middle_name,'.
            'a.Business_name,'.
            'a.Business_telephone_number AS Tel_num,'.
            'a.Business_mobile_number AS Mob_num,'.
            'a.Tax_payer,'.
            's.Status,'.
            'a.Total_number_employees,'.
            'a.Building_name,'.
            'a.Street,'.
            'p.Purok,'.
            'b.Barangay,'.
            'c.Cycle_date,'.
            'a.Payment_mode_ID,'.
            'c.Date_application'
        );
        $this->db->from('tbl_application_form a');
        $this->db->join('tbl_barangay b', 'b.ID = a.Barangay_ID', 'left');
        $this->db->join('tbl_purok p', 'p.ID = a.Purok_ID', 'left');
        $this->db->join('tbl_application_status s', 's.ID = a.Application_status_ID', 'left');
        $this->db->join('tbl_cycle c', 'c.Application_ID = a.ID', 'left');
        $this->db->where('a.ID', $ID);
        $this->db->order_by('c.Cycle_date', 'desc');
        $query = $this->db->get();
        return $query->first_row();
    }

    function search($search = ''){
        $this->db->select(
            'a.ID,'.
            'a.Last_name,'.
            'a.First_name,'.
            'a.Middle_name,'.
            'a.Tax_payer,'.
            'a.Business_name,'.
            'MAX(c.Date_application) AS Date_application'
        );
        $this->db->from('tbl_cycle c');
        $this->db->join('tbl_application_form a', 'a.ID = c.Application_ID', 'left');
        $this->db->like('a.Business_name', $search);
        $this->db->or_like('a.First_name', $search);
        $this->db->or_like('a.Middle_name', $search);
        $this->db->or_like('a.Last_name', $search);
        $this->db->or_like('a.Tax_payer', $search);
        $this->db->order_by('a.Business_name', 'asc');
        $this->db->group_by('a.ID');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_App_ID($ID){
        $this->db->where('ID', $ID);
        $result = $this->db->get('tbl_cycle')->first_row();
        return $result->Application_ID;
    }
    
    public function assessment_cycle($Ass_ID){
        $this->db->where('ID', $Ass_ID);
        $query = $this->db->get('tbl_assessment');
        return $query->first_row();
    }

    public function assessment_lines($ID){
        $cycle = $this->getcycleID($ID);
        $this->db->select(
            'a.*,'.
            's.Asset_size,'.
            's.Characteristics,'.
            'f.Fee'
        );
        $this->db->from('tbl_application_business_line a');
        $this->db->join('tbl_assessment_asset s', 's.Asset_from <= a.Capitalization AND s.Asset_to >= a.Capitalization', 'left');
        $this->db->join('tbl_fees_mayors_permit f', 'f.Category = a.Business_category AND f.Characteristics = s.Characteristics', 'left');
        $this->db->where('a.Cycle_ID', $cycle->ID);
        $this->db->order_by('a.ID', 'asc');
        $query = $this->db->get();
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
    
    /* ------------------------------------ 01-15-2020 ------------------------------------ */ 
    public function check_OR($OR){
        try
		{
			if (empty($OR))
			{
				throw new Exception(REQUIRED_FIELD);
			}
			// check if OR exists
			$this->db->select('*');
			$this->db->from('tbl_collection');
			$this->db->where('OR_number', $OR);
			$qry_or = $this->db->get();

			if ($qry_or->num_rows() > 0)
			{
				throw new Exception(OR_NUMBER);
			}
			
			$error = array('OR_number' => $OR, 'has_error' => false);
			echo json_encode($error); 
		}
		catch(Exception $ex)
		{
			$error = array('error_message' => $ex->getMessage(), 'has_error' => true); 
			echo json_encode($error);
		}
    }

    public function update_OR($OR,$data,$cyc_ID){
        $this->db->where('OR_number', $OR);
        $this->db->update('tbl_collection', $data);

        $this->db->where('OR_number', $OR);
        $this->db->update('tbl_collection_items', $data);

        $table = "(tbl_collection, tbl_collection_items)";
        $module = "Collection - OR";
        $action = "Update";
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
    /* ------------------------------------ 01-15-2020 ------------------------------------ */ 

    /* ------------------------------------ 01-16-2020 ------------------------------------ */ 
    function search_OR($search = ''){
        $this->db->select(
            'a.ID,'.
            'a.Last_name,'.
            'a.First_name,'.
            'a.Middle_name,'.
            'a.Tax_payer,'.
            'a.Business_name,'.
            'c.Cycle_ID,'.
            'c.OR_number'
        );
        $this->db->from('tbl_collection c');
        $this->db->join('tbl_cycle cy', 'cy.ID = c.Cycle_ID', 'left');
        $this->db->join('tbl_application_form a', 'a.ID = cy.Application_ID', 'left');
        $this->db->where('c.OR_number', $search);
        $query = $this->db->get();
        return $query->result();
    }
    /* ------------------------------------ 01-16-2020 ------------------------------------ */ 
}