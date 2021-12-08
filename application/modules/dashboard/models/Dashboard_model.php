<?php
class dashboard_model extends CI_Model
{
    public $ID;
    public $Or_for;

    private $table = array(
        "particular" => "tbl_particular",
        "payment"   =>  "tbl_payment",
        "pPaid" =>  "tbl_particular_paid",
        "accnt_form"    =>  "tbl_accountable_form",
        "temporary" =>  "tbl_temporary_payment",
        "cedula"    =>  "tbl_collection_cedula"
    );

    public function __construct(){
        parent::__construct();        
        $this->ctodb = $this->load->database('ctodb', true);
    }

    function update_or_for(){
        $data = array(
            'OR_for'    =>  $this->Or_for
        );
        if($this->Or_for === 'Cedula'){                   
            $this->check_or_cedula();           
        }else{
            $response = $this->check_or();

            try{
                if($this->ID != null){                           
                    if(!empty($response) || $response === '0'){                    
                        $this->ctodb->where('ID', $this->ID);
                        $this->ctodb->where('Collector_ID', $_SESSION['User_details']->ID);
                        $this->ctodb->update($this->table['accnt_form'], $data);
        
                        echo json_encode(array('error_message'=>'Success', 'has_error'=>false));                    
                    }else{
                        echo json_encode(array('error_message'=>'There is still an OR number left', 'has_error'=>true));
                    }                
                }else{
                    echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
                }
            }
            catch (Exception $ex) 
            { 			
                echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
            }

        }                      
    }

    function check_or(){        
        try{
            if($this->Or_for != null){                
                $this->ctodb->order_by('pp.ID', 'desc');
                $this->ctodb->from($this->table['pPaid'].' pp');
                $this->ctodb->join($this->table['particular'].' part', 'part.ID = pp.Particular_ID', 'left');   
                $this->ctodb->join($this->table['payment'].' pmt', 'pmt.Accountable_form_number = pp.Accountable_form_number', 'left');  
                $this->ctodb->like('part.Collection_type', $this->Or_for, 'both');         
                $this->ctodb->where('pmt.Collector_ID', $_SESSION['User_details']->ID, 'both');                  
                $result = $this->ctodb->get()->row();   
                
                if(!empty($result)){
                    $this->ctodb->select('acc.ID');
                    $this->ctodb->from($this->table['accnt_form'].' acc');   
                    $this->ctodb->where('acc.End_OR', $result->Accountable_form_number, 'both');   
                    $this->ctodb->where('acc.OR_for', $this->Or_for, 'both');     
                    $this->ctodb->where('acc.Done', 0);        
                    $response = $this->ctodb->get()->row();
                }else{                          
                    $response = "0";
                }                                                 
                return $response;
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function check_or_cedula(){
        try{
            if(!empty($this->Or_for)){
                $this->ctodb->select('c.OR_number');
                $this->ctodb->order_by('c.ID', 'desc');
                $this->ctodb->from($this->table['cedula'].' c');
                $response = $this->ctodb->get()->row();
                
                if(!empty($response)){
                    $this->ctodb->select('a.ID, '. 'a.End_OR');
                    $this->ctodb->from($this->table['accnt_form'].' a');                    
                    $this->ctodb->where('a.OR_for', $this->Or_for, 'both');
                    $this->ctodb->where('a.Collector_ID', $_SESSION['User_details']->ID, 'both');                    
                    $result = $this->ctodb->get()->row(); 

                    if(!empty($result)){                                                
                        if($result->End_OR === $response->OR_number){                            
                            $this->update_or_cedula();
                        }else{
                            echo json_encode(array('error_message'=>'There is still an OR number left', 'has_error'=>true));
                        }
                    }else{                        
                        $this->update_or_cedula();
                    }                                                                                               
                }else{
                    
                }                
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function update_or_cedula(){
        $data = array(
            'OR_for'    =>  $this->Or_for
        );
        try{
            if(!empty($this->Or_for)){
                $this->ctodb->where('ID', $this->ID);
                $this->ctodb->where('Collector_ID', $_SESSION['User_details']->ID);
                $this->ctodb->update($this->table['accnt_form'], $data);

                echo json_encode(array('error_message'=>'Success', 'has_error'=>false));                
            }else{
                echo json_encode(array('error_message'=>'There is still an OR number left', 'has_error'=>true));
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}
    }

    function cancel_form(){
        try{
            if(!empty($this->ID)){
                $this->ctodb->select('a.Start_OR, '. 'a.OR_origin');
                $this->ctodb->from($this->table['accnt_form'].' a');
                $this->ctodb->where('a.ID', $this->ID);
                $this->ctodb->where('a.OR_origin', $this->Origin);
                $result = $this->ctodb->get()->row();                 

                if(!empty($result)){
                    $this->ctodb->select('p.Accountable_form_number, '. 'p.ID as PID');
                    $this->ctodb->from($this->table['payment'].' p');
                    $this->ctodb->where('p.Accountable_form_number', $result->Start_OR);
                    $this->ctodb->where('p.Accountable_form_origin', @$result->OR_origin);
                    $this->ctodb->where('p.Collector_ID', $_SESSION['User_details']->ID);
                    $response = $this->ctodb->get()->row();                    
                    if(!empty($response)){
                        echo json_encode(array('error_message' => 'O-R already used', 'has_error' => true));
                    }else{
                        $this->ctodb->select('c.OR_number');
                        $this->ctodb->from($this->table['cedula'].' c');
                        $this->ctodb->where('c.OR_number', $result->Start_OR);
                        $query = $this->ctodb->get()->row();
                        if(!empty($query)){
                            echo json_encode(array('error_message' => 'O-R already used', 'has_error' => true));
                        }else{
                            $data = array('OR_for' => null);                            
                            $this->ctodb->where('ID', $this->ID);
                            $this->ctodb->update($this->table['accnt_form'], $data);
                            echo json_encode(array('error_message' => 'Success', 'has_error' => false));
                        }
                    }
                }
            }
        }  
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}             
    }

    function get_accountable_form(){
        $this->ctodb->select(
            'acc.ID, '.
            'acc.OR_Type, '.
            'acc.Stub_no, '.
            'acc.Start_OR, '.
            'acc.End_OR, '.
            'acc.Date_released, '.
            'acc.OR_for, '.
            'acc.Done, '. 
            'acc.OR_origin'
        );
        $this->ctodb->from($this->table['accnt_form'].' acc');
        $this->ctodb->where('acc.Collector_ID', $_SESSION['User_details']->ID, 'both');
        $this->ctodb->where('acc.Done', 0, 'both');
        $query = $this->ctodb->get()->result();
        return $query;
    }

    function get_accountable_form_taken(){
        $this->ctodb->select(
            'acc.ID, '.
            'acc.OR_for'
        );
        $this->ctodb->from($this->table['accnt_form'].' acc');
        $this->ctodb->where('acc.Collector_ID', $_SESSION['User_details']->ID, 'both');
        $this->ctodb->where('acc.Done', 0, 'both');
        $this->ctodb->where('acc.OR_for', null, 'both');
        $query = $this->ctodb->get()->result();
        return $query;
    }
}
?>