<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_payer_model extends CI_Model
{
    private $table = array(
        'payer' => 'tbl_payer'
    );

    public $Name;
    public $Address;

    public function save(){
        try{
            if(!empty($this->Name || $this->Address)){
                $checker = $this->check_payer();
                if(empty($checker)){
                    $data = array(
                        'Payer' => ucwords($this->Name), 
                        'Address' => ucwords($this->Address)
                    );
                    $this->db->trans_start();
                    $this->db->insert($this->table['payer'], $data);
                    $this->db->trans_complete();
                    if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        return FALSE;
                    } 
                    else {                                                                                  
                        $this->db->trans_commit();                  
                        echo json_encode(array('error_message' => 'Data saved', 'has_error' => false)); 
                    }  
                }else{
                    echo json_encode(array('error_message'=>'Duplicate Record', 'has_error'=>true));
                }
            }else{
                echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function check_payer(){
        try{
            if(!empty($this->Name || $this->Address)){
                $this->db->where('Payer', $this->Name);
                $this->db->where('Address', $this->Address);
                $query = $this->db->get($this->table['payer'])->row();
                
                return $query;
            }
        }
        catch(Exception $msg){
            echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}
?>