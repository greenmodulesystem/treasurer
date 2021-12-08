<?php
    class Order_of_payment_model extends CI_Model{
        
        private $table = array(
            "particular"    =>  "tbl_particular",
            "payment"       =>  "tbl_payment",
            "pPaid"         =>  "tbl_particular_paid",
            "accnt_form"    =>  "tbl_accountable_form",
            "temporary"     =>  "tbl_temporary_payment",
            "bank"          =>  "tbl_banks",
            "cheque"        =>  "tbl_cheque",
            'payer'         =>  'tbl_payer',
            "order"         =>  "tbl_order_payment",
            "depart"        =>  "tbl_departments",
            'pay_veri'      =>  "tbl_payment_verification",
            "or_type"       =>  "tbl_or_type"
        );

        public function __construct(){
            parent::__construct();        
            $model_list = [              
                'general_collection/General_collection_Model' => 'colModel',
            ];
            $this->load->model($model_list);
            $this->ctodb = $this->load->database('ctodb', true);
        }

        /** get all order of payments */
        public function get_all_order_payments(){
            try{
                if(empty($this->searchName)){
                    $this->ctodb->select('o.*');
                    $this->ctodb->order_by('o.Date_created', 'desc');
                    $this->ctodb->from($this->table['order'].' o');
                    $this->ctodb->where('o.Status', 'Pending');                    
                }else{
                    $this->ctodb->select('o.*');
                    $this->ctodb->order_by('o.Date_created', 'desc');
                    $this->ctodb->from($this->table['order'].' o');                    
                    $this->ctodb->like('o.Order_payment_number', $this->searchName);
                }
                $result = $this->ctodb->get()->result();

                return $result;
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get all paid order of payments */
        public function get_paid_oop(){
            try{
                $this->ctodb->select('o.*');
                $this->ctodb->order_by('o.Date_created', 'desc');
                $this->ctodb->from($this->table['order'].' o');
                $this->ctodb->where('o.Status', 'Verified');
                $result = $this->ctodb->get()->result();

                return $result;
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get order of payment information data */
        public function get_order_payment_details(){
            try{
                if(empty($this->token)){
                    throw new Exception(ERROR_PROCESSING, true);
                }

                $this->ctodb->select('o.*, '. 'dp.Office');
                $this->ctodb->from($this->table['order'].' o');
                $this->ctodb->join($this->table['depart'].' dp', 'dp.ID = o.Office_origin', 'left');                
                $this->ctodb->where('o.U_ID', $this->token);
                $query = $this->ctodb->get()->row();
                
                return $query;
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get all particulars of specific client */
        public function get_particulars_details(){
            try{
                if(empty($this->ID)){
                    throw new Exception(ERROR_PROCESSING, true);
                }
                $this->ctodb->select(
                    'pv.*, '. 
                    'pr.Particular'
                );

                $this->ctodb->from($this->table['pay_veri'].' pv');
                $this->ctodb->join($this->table['order'].' or', 'or.ID = pv.Order_payment_ID', 'left');
                $this->ctodb->join($this->table['particular'].' pr', 'pr.ID = pv.Particular_ID', 'left');
                $this->ctodb->where('pv.Order_payment_ID', $this->ID);
                $query = $this->ctodb->get()->result();                

                return $query;
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get paid order of payment details */
        public function get_paid_oop_detail(){
            try{
                if(empty($this->token)){
                    throw new Exception(ERROR_PROCESSING, true);
                }

                $this->ctodb->select('o.*');
                $this->ctodb->from($this->table['order'].' o');
                $this->ctodb->where('o.U_ID', $this->token);
                $query = $this->ctodb->get()->row();
                
                return $query;
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get O-R types */
        public function get_or_types(){
            try{    
                $this->ctodb->select('*');
                $this->ctodb->from($this->table['accnt_form']);
                $this->ctodb->where('Collector_ID', $_SESSION['User_details']->ID);
                $this->ctodb->where('Done', 0);
                $this->ctodb->group_by('OR_Type');
                $result = $this->ctodb->get()->result();

                return $result;
            }   
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }        

        /** get accountable form number and or type */
        public function get_form_number(){
            try{
                $this->ctodb->select(
                    'pm.Accountable_form_number as orNumber, '. 
                    'pm.Accountable_form_origin as origin, '. 
                    'or.Status'
                );
                $this->ctodb->from($this->table['payment'].' pm');
                $this->ctodb->join($this->table['order'].' or', 'or.ID = pm.Order_ID', 'left');
                $this->ctodb->where('pm.Order_ID', $this->ID);
                $result = $this->ctodb->get()->first_row();

                return $result;
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get or type */
        function get_or_type(){
            $this->ctodb->select(
                'a.Start_OR, '.
                'a.End_OR, '.
                'a.OR_Type, '. 
                'a.OR_origin'
            );             
            $this->ctodb->order_by('a.ID', 'asc');
            $this->ctodb->from($this->table['accnt_form'].' a');
            $this->ctodb->where('a.OR_for', $this->orFor);
            $this->ctodb->where('a.Done', 0);        
            $this->ctodb->where('a.OR_origin', $this->Origin);
            $this->ctodb->where('a.Collector_ID', $_SESSION['User_details']->ID);        
            $query = $this->ctodb->get()->row();                        
            
            $result = $this->check_or_number_exist();                           
            if($result !== null){                      
                $or_number = str_pad(($result->Accountable_form_number + 1), 7, "0000000", STR_PAD_LEFT);                        
                $check_last = $this->check_last_or($result->Accountable_form_number);
                $check = $this->check_validity_of_or($or_number); 
                   
                if(!empty($check)){
                    if($query !== null){
                        $query->Accountable_form_number = $query->Start_OR;
                    } 
                }else{
                    if(empty($check_last)){
                        $or_number = str_pad(($result->Accountable_form_number + 1), 7, "0000000", STR_PAD_LEFT); 
                        if($query !== null){
                            $query->Accountable_form_number = $result->Accountable_form_number = ($or_number);
                        }                               
                    }else{
                        $query->Accountable_form_number = $query->Start_OR;
                    }                
                }                                             
            }else{               
                if($query !== null){                
                    $query->Accountable_form_number = $query->Start_OR;
                }         
            }                 
            
            echo json_encode(array('message'=>$query, 'has_error'=>false));            
        }

        function check_or_number_exist(){
            $this->ctodb->select(
                'pp.Accountable_form_number'
            );
            $this->ctodb->order_by('pp.ID', 'desc');
            $this->ctodb->from($this->table['pPaid'].' pp');
            $this->ctodb->join($this->table['particular'].' p','p.ID = pp.Particular_ID', 'left');   
            $this->ctodb->join($this->table['payment'].' pm', 'pm.Accountable_form_number = pp.Accountable_form_number', 'left');   
            $this->ctodb->join($this->table['accnt_form'].' acc', 'acc.OR_origin = pp.Accountable_form_origin', 'left');
            $this->ctodb->where('pm.Collector_ID', $_SESSION['User_details']->ID);
            $this->ctodb->where('p.Collection_type', $this->orFor);
            $this->ctodb->where('acc.OR_for', $this->orFor);                         
            $query = $this->ctodb->get()->row();
            
            return $query;
        }

        function check_last_or($or_number){
            $this->ctodb->select('acc.End_OR');
            $this->ctodb->from($this->table['accnt_form'].' acc');        
            $this->ctodb->where('acc.End_OR', $or_number);
            $result = $this->ctodb->get()->row();
            
            return $result;
        }

        function check_validity_of_or($or_number){
        
            $this->ctodb->select('pp.ID');
            $this->ctodb->order_by('pp.ID', 'desc');
            $this->ctodb->from($this->table['pPaid'].' pp');
            $this->ctodb->where('pp.Accountable_form_number', $or_number);
            $query = $this->ctodb->get()->result();
            
            return $query;
        }
    }
?>