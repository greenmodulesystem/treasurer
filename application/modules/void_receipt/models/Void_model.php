<?php
class Void_model extends CI_Model
{
    private $table = array(
        "particular"    =>  "tbl_particular",
        "part_paid"     =>  "tbl_particular_paid",
        "payment"   =>  "tbl_payment"
    );

    public $Search;
    public $Remarks;
    public $ID;

    public function __construct()
	{
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        
		$this->ctodb = $this->load->database('ctodb', TRUE);
	}

    function search(){
        $this->ctodb->select(
            'p.ID, '.
            'p.Accountable_form_number, '.
            'p.Payor, '.
            'p.Date_paid'
        );       
        try{
            if(!empty($this->Search)){
                $this->ctodb->order_by('p.ID', 'desc');
                $this->ctodb->from($this->table['payment'].' p');
                $this->ctodb->where('p.Accountable_form_number', $this->Search);
                $this->ctodb->or_like('Paid_by', $this->Search, 'both');
                $query = $this->ctodb->get()->result();

                return $query;
            }else{
                throw new Exception (ERROR_PROCESSING);
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}  
    }

    function insert_void_receipt(){
        try{
            if(!empty($this->ID)){
                $data = array(
                    "Cancelled" => 1,
                    "Remarks" => $this->Remarks
                );
                $this->ctodb->where('ID', $this->ID, 'both');
                $this->ctodb->update($this->table['payment'], $data);
                echo json_encode(array('error_message' => 'Successful', 'has_error' => false));
            }else{
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
}
?>