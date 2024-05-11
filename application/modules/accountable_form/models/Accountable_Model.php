<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accountable_Model extends CI_Model
{
    public $or_type;
    public $stub_no;
    public $or_for;
    public $start_or;
    public $end_or;
    public $date_release;
    public $release_by;
    public $collector_ID;
    public $Data;

    private $table = array(
        "or_type" => "tbl_or_type",
        "accountable"   =>  "tbl_accountable_form",
        "users" =>  "tbl_users"
    );

    function save_accountable_form(){
        $data = array(
            'OR_Type'   =>  ($this->or_type == null) ? null : $this->or_type,
            'Stub_no'   =>  ($this->stub_no == null) ? null : $this->stub_no,
            'Start_OR'  =>  ($this->start_or == null) ? null : $this->start_or,
            'End_OR'    =>  ($this->end_or == null) ? null : $this->end_or,
            'OR_for'    =>  ($this->or_for == null) ? null : $this->or_for,
            'Released_by'   =>  ($this->release_by == null) ? null : $this->release_by,
            'Date_released' =>  ($this->date_release == null) ? null : $this->date_release,
            'Collector_ID'  =>  ($this->collector_ID == null) ? null : $this->collector_ID
        );
        try{
            if(!empty($this->collector_ID) && $this->or_type != null){
                $response = $this->check_if_exist();
                if($this->start_or === $this->end_or){
                    echo json_encode(array('error_message' => 'Start OR and End OR must not be the same', 'has_error' => true));
                }else{
                    if(empty($response)){                   
                        $this->db->insert($this->table['accountable'], $data);
                        echo json_encode(array('error_message' => 'Data saved', 'has_error' => false));                                   
                    }else{
                        echo json_encode(array('error_message' => 'Some of the details are already exist..', 'has_error' => true));
                    } 
                }                               
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function check_if_exist(){
        $this->db->select('acc.ID');
        $this->db->from($this->table['accountable'].' acc');
        $this->db->where('acc.Stub_no', $this->stub_no, 'both');
        $this->db->or_where('acc.Start_OR', $this->start_or, 'both');
        $this->db->or_where('acc.End_OR', $this->end_or, 'both');
        $this->db->or_where('acc.End_OR', $this->start_or, 'both');
        $this->db->or_where('acc.Start_OR', $this->end_or, 'both');
        $result = $this->db->get()->row();
        return $result;
    }

    function get_or_type(){
        $this->db->select(
            'ot.Type'
        );
        $this->db->from($this->table['or_type'].' ot');
        $query = $this->db->get()->result();

        return $query;
    }

    function get_collectors(){
        $this->db->select(
            'col.ID, '.
            'col.First_name, '.
            'col.Last_name'
        );
        $this->db->from($this->table['users'].' col');
        $query = $this->db->get()->result();
        return $query;
    }

    function Save_account_form(){
        try{
            if(!empty($this->Data)){
                foreach ($this->Data as $key => $value) {    

                    $IDS = [];
                    $this->start_or = str_pad($value['a'][0], 7, "0000000", STR_PAD_LEFT);
                    $this->end_or = str_pad($value['b'][0], 7, "0000000", STR_PAD_LEFT);
                    $this->stub_no = str_pad($value['b'][0], 7, "0000000", STR_PAD_LEFT);
                    $result = $this->check_if_exist();                    
                    
                    if(empty($result)){
                        foreach ($value['a'] as $a => $start) {
                            $Start = str_pad($start, 7, "0000000", STR_PAD_LEFT);
                            $data = array(
                                'Start_OR'  => (empty($Start)) ? null : $Start,
                                'OR_Type'   => (empty($this->or_type)) ? null : $this->or_type,
                                'Collector_ID' => (empty($this->collector_ID)) ? null : $this->collector_ID,
                                'Released_by' => (empty($this->release_by)) ? null : $this->release_by,
                                'Date_released' => (empty($this->date_release)) ? null : $this->date_release
                            );                      
                            // Transaction Start  
                            $this->db->trans_start();
                            $this->db->insert($this->table['accountable'], $data);
                            array_push($IDS, $this->db->insert_id());
                            // Transaction Complete                                                       
                            $this->db->trans_complete();
                            if ($this->db->trans_status() === FALSE) {
                                $this->db->trans_rollback();
                                return FALSE;
                            } 
                            else {                                                                                  
                                $this->db->trans_commit();                            
                            }                                    
                        }
                        foreach ($value['b'] as $idx => $end) {
                            $End = str_pad($end, 7, "0000000", STR_PAD_LEFT);
                            $data_end = array(
                                'End_OR' => (empty($End)) ? null : $End
                            );
                            // Transaction Start
                            $this->db->trans_start();
                            $this->db->where('ID', $IDS[$idx]);                        
                            $this->db->update($this->table['accountable'], $data_end);   
                            // Transaction Complete
                            $this->db->trans_complete();  
                            if ($this->db->trans_status() === FALSE) {
                                $this->db->trans_rollback();
                                return FALSE;
                            } 
                            else {
                                $this->db->trans_commit();
                            }                 
                        }                    
                        foreach ($value['c'] as $dex => $stub) {                        
                            $dat_stub = array(
                                'Stub_no' => (empty($stub)) ? null : $stub
                            );                        
                            // Transaction Start
                            $this->db->trans_start();                      
                            $this->db->where('ID', $IDS[$dex]);                        
                            $this->db->update($this->table['accountable'], $dat_stub);                         
                            // Transaction Complete
                            $this->db->trans_complete();
                        }                                                                                  
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                            return FALSE;
                        } 
                        else {
                            $this->db->trans_commit();
                            echo json_encode(array('error_message'=>'Successfull Processing', 'has_error'=>false));
                        }
                    }else{
                        echo json_encode(array('error_message'=>'Details already exist', 'has_error'=>true));
                    }                       
                }
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}
?>