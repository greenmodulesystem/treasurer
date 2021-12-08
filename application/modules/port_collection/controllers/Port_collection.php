<?php
    class Port_collection extends CI_Controller
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
            $this->data['content'] = "port_col_index";
            $this->load->view('layout', $this->data);
        }
    }
?>