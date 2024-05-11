<?php
class void_model extends CI_Model
{
    private $table = array(
        "particular"    =>  "tbl_particular",
        "accnt"    =>  "tbl_accountable_form",
        "part_paid"     =>  "tbl_particular_paid",
        "payment"       =>  "tbl_payment",
        "collection"       =>  "tbl_rpt_collection",
        "cheque"       =>  "tbl_cheque"
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
            'p.Date_paid, '.
            'p.Remitance,'.
            'p.Cancelled' //YOBHEL 3-24-23
        );       
        try{
            if(!empty($this->Search)){
                $this->ctodb->order_by('p.ID', 'desc');
                $this->ctodb->from($this->table['payment'].' p');
                $this->ctodb->where('p.Accountable_form_number', $this->Search);
                // $this->ctodb->where('Collector_ID', $_SESSION['User_details']->ID); //YOBHEL 3-24-23
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
    function insert_void_rptreceipt(){
        try{
            if(!empty($this->OR)){
                $data = array(
                    "Cancelled" => 1,
                    "Remarks" => $this->Remarks
                );
                $data2 = array(
                    "Cancelled" => 1,
                );
                $this->ctodb->where('Accountable_form_number', $this->OR, 'both');
                $this->ctodb->update($this->table['payment'], $data);
                $this->ctodb->where('Control_no', $this->OR, 'both');
                $this->ctodb->update($this->table['collection'], $data2);
                
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
            $this->ctodb->select(
                'p.*, '.
                'ch.* '
        );
            $this->ctodb->from($this->table['payment'].' p');
            // $this->ctodb->where('Date(Date_paid)', $this->Date);
            $this->ctodb->where('p.Accountable_form_number', $this->OR);
            $this->ctodb->where('p.ID', $this->tokenNumber);
            $this->ctodb->where('Collector_ID', $_SESSION['User_details']->ID);
            $this->ctodb->join($this->table['cheque'].' ch', 'ch.Payment_ID = p.ID','left');
           
           
            $query = $this->ctodb->get()->first_row();
            
            return $query;
        }  
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
    public function get_accnt_type(){
        try{
            $this->ctodb->select(
                'a.*, '.
                'a.OR_origin, '.
                'a.OR_for '
        );
            $this->ctodb->from($this->table['accnt'].' a');
            $this->ctodb->where('a.Start_OR >=', $this->OR);
            $this->ctodb->where('a.End_OR <=', $this->OR);
            $query = $this->ctodb->get()->row();
            
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
            $this->ctodb->select(
                'pp.*, '.
                'pp.ID AS pp_ID, '.
                'part.*,'.
                'part.Particular AS part_name, '.
                'pp.Amount AS amt'
        
        );
            $this->ctodb->from($this->table['part_paid'].' pp');
            $this->ctodb->where('Accountable_form_number', $this->Number);
            $this->ctodb->join($this->table['particular'].' part', 'part.ID = pp.Particular_ID');
            $query = $this->ctodb->get()->result();
            
            return $query;
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }

    public function get_all_particulars(){
        try{
            $this->ctodb->select('*');
            $this->ctodb->from($this->table['particular'].' part');
            $query = $this->ctodb->get()->result();
            
            return $query;
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    public function update_or(){
        try{

            $data = array (
                'Payor' => $this->payer,
                'Paid_by' => $this->paidby,
                'Date_paid' => $this->date_paid
            );
            $this->ctodb->trans_start();
            $this->ctodb->where('Accountable_form_number', $this->or_number);
            $this->ctodb->update($this->table['payment'],$data);
            // var_dump($this->or_number);
      
           $num_selected = sizeof($this->amount);
           $x=0; 

            while($x <= $num_selected){
                if(!empty($this->amount[$x]))
                {
                    $data2 = array(
                        'Amount' => $this->amount[$x],
                        'OR_remarks' => $this->remarks[$x]
                    );

                    // $this->ctodb->trans_start();
                    $this->ctodb->where('ID', $this->partPaid_ID[$x]);
                    $this->ctodb->update($this->table['part_paid'],$data2);
                    // var_dump($this->partPaid_ID[$x]);
                    // var_dump( $this->amount[$x]);
                }
                $x++;
            }
           

            $this->ctodb->trans_complete();

            if ($this->ctodb->trans_status() === FALSE)
            {                
                $this->ctodb->trans_rollback();
                return FALSE;
            }else{
                $this->ctodb->trans_commit();
                echo json_encode(array('error_message' => 'Data saved', 'has_error' => false));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }
}
?>