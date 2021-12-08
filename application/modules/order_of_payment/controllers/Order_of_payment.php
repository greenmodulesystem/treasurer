<?php
    class Order_of_payment extends CI_Controller
    {
        public function __construct(){
            parent::__construct();        
            $model_list = [                
                'order_of_payment/Order_of_payment_model' => 'opModel',
                'order_of_payment/services/Order_of_payment_services_model' => 'opsModel',
                'general_collection/General_collection_Model' => 'colModel'            
            ];
            $this->load->model($model_list);
        }

        /** laod main page */
        public function index(){
            $this->data['content'] = "order_of_payment_index";
            $this->load->view('layout', $this->data);
        }

        /** get and load all unpaid order of payments */
        public function load_order_payments(){
            try{
                $this->opModel->searchName = $this->input->post('search', true);
                $this->data['result'] = $this->opModel->get_all_order_payments();
                $this->data['content'] = "grid/load_order_payments";
                $this->load->view('layout', $this->data);
            }
            catch(Exception $msg){ 
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** laod paid order of payments */
        public function load_paid_oop(){
            try{
                $this->data['result'] = $this->opModel->get_paid_oop();
                $this->data['content'] = "grid/load_paid_oop";
                $this->load->view('layout', $this->data);
            }
            catch(Exception $msg){ 
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** open order of payment details to view and pay */
        public function open_order(){
            try{                
                $this->opModel->token = $this->input->get('token', true);   
                $result = $this->opModel->get_order_payment_details();   
                if(empty($this->input->get('token', true))){
                    $this->data['content'] = "not_found/not_found";
                }else{
                    $this->data['accountable'] = $this->opModel->get_or_types();
                    $this->data['result'] = $result;
                    $this->data['content'] = "open_order_details";
                }
                $this->load->view('layout', $this->data);
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get and display all particulars per client */
        public function display_particulars_details($ID = ''){
            try{
                $this->opModel->ID = $ID;                
                $this->data['result'] = $this->opModel->get_particulars_details();
                $this->data['content'] = 'grid/load_particulars_details';
                $this->load->view('layout', $this->data);
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** open paid details of order of payment */
        public function open_paid_details(){
            try{
                $this->opModel->token = $this->input->get('token', true);
                $result = $this->opModel->get_paid_oop_detail();   
                if(empty($this->input->get('token', true))){
                    $this->data['content'] = "not_found/not_found";
                }else{                    
                    $this->data['result'] = $result;
                    $this->data['content'] = "open_paid_details";
                }
                $this->load->view('layout', $this->data);
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }
        }

        /** get and display all paid particulars of oop */
        public function load_paid_particulars($ID = ''){
            try{                
                $this->opModel->ID = $ID;       
                $this->data['forms']    = $this->opModel->get_form_number();         
                $this->data['result']   = $this->opModel->get_particulars_details();                    
                $this->data['content']  = "grid/load_paid_particulars";
                $this->load->view('layout', $this->data);
            }
            catch(Exception $msg){
                echo json_encode(array('error_message'=>$msg->getMessage(), 'has_error'=>true));
            }            
        }
    }
?>