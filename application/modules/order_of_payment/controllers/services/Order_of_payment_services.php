<?php
    class Order_of_payment_services extends CI_Controller
    {
        public function __construct(){
            parent::__construct();        
            $model_list = [
                'accountable_form/Accountable_Model' => 'aModel',
                'order_of_payment/Order_of_payment_model' => 'opModel',
                'order_of_payment/services/Order_of_payment_services_model' => 'opsModel',
                'general_collection/General_collection_Model' => 'colModel',
                'payments/OR_Model' => 'MOR',
            ];
            $this->load->model($model_list);
        }

        /** search particular */
        public function search_particular(){
            try{
                if(!empty($this->input->post('particular', true))){
                    $this->opsModel->Particular = $this->input->post('particular', true);
                    $this->opsModel->getParticular();
                }
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }
        
        /** check for accountable form 51 if divided into general and trust collection */
        public function get_form_number(){
            try{
                if($this->input->post('Origin') == 51){
                    /** check for accountable form 51 if divided into general and trust collection  */
                    $this->opModel->Origin  = $this->input->post('Origin', true);
                    $this->opModel->orFor   = $this->input->post('OR_for', true);

                    $this->data['Type'] = $this->opModel->get_or_type();                                
                    if(!empty($this->data['Type'])){
                        $validity   = $this->colModel->check_validity($this->data['Type']->Accountable_form_number); 
                        $same       = $this->colModel->check_same_or($this->data['Type']->Accountable_form_number);
                    }                 
                    if(!empty($this->data['Type'])){
                        if(!empty($validity) || $this->data['Type']->Accountable_form_number === ''){                                  
                            $this->data['check_validity'] = 1;                   
                        }else{
                            $this->data['check_validity'] = 0;   
                        }
                    }                                                                          
                }else{
                    /** check and get accountable form numbers */
                    $this->opsModel->form   = $this->input->post('Origin', true);
                    $this->opsModel->generate();                             
                }
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** save payment in cash */
        public function save_payment_cash(){
            try{
                if(empty($this->input->post('Particular', true)) || empty($this->input->post('token', true))){
                    throw new Exception(ERROR_PROCESSING, true);
                }                                          

                $Particulars = json_decode($this->input->post('Particular', true));    
                $this->opsModel->oopID             =   $this->input->post('oopID', true);            
                $this->opsModel->OriginOR       =   $this->input->post('OriginOR', true);
                $this->opsModel->Token          =   $this->input->post('token', true);
                $this->opsModel->orNumber       =   $this->input->post('orNumber', true);
                $this->opsModel->Particulars    =   $Particulars;
                $this->opsModel->totalAmount    =   $this->input->post('total', true);
                $this->opsModel->Lastname       =   $this->input->post('Lastname', true);
                $this->opsModel->Firstname      =   $this->input->post('Firstname', true);
                $this->opsModel->Middlename     =   $this->input->post('Middlename', true);
                $this->opsModel->Address        =   $this->input->post('Address', true);
                $this->opsModel->Paid_by        =   $this->input->post('Paid_by', true);             
                $this->opsModel->compName       =   $this->input->post('compName', true);       
                $this->opsModel->paymentType    =   $this->input->post('type');                                                            
                                            
                $this->opsModel->save_payment_cash();
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }
    }
?>