<?php
class void_model extends CI_Model
{
    private $table = array(
        "particular"    =>  "tbl_particular",
        "part_paid"     =>  "tbl_particular_paid",
        "payment"       =>  "tbl_payment"
    );

    public $Search;
    public $Remarks;
    public $ID;

    public function __construct(){
        parent::__construct();        
        $model_list = [              
            'general_collection/General_collection_Model' => 'colModel',
        ];
        $this->load->model($model_list);
        $this->ctodb = $this->load->database('ctodb', true);
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

    /** get or data for updates */
    public function get_or_data(){
        try{
            $this->ctodb->select('*');
            $this->ctodb->from($this->table['payment']);
            $this->ctodb->where('Date(Date_paid)', $this->Date);
            $this->ctodb->where('ID', $this->tokenNumber);
            $this->ctodb->where('Collector_ID', $_SESSION['User_details']->ID);
            $query = $this->ctodb->get()->first_row();
            
            return $query;
        }  
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }

    /** get particulars of searched OR number */
    public function get_particulars(){
        try{
            $this->ctodb->select('*');
            $this->ctodb->from($this->table['part_paid']);
            $this->ctodb->where('Accountable_form_number', $this->Number);
            $query = $this->ctodb->get()->result();
            
            return $query;
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
}
?>