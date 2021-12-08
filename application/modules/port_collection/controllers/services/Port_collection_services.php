<?php
    class Port_collection_services extends CI_Controller
    {
        public function __construct(){
            parent::__construct();        
            $model_list = [
                'accountable_form/Accountable_Model' => 'aModel',
                'order_of_payment/Order_of_payment_model' => 'opModel',
                'order_of_payment/services/Order_of_payment_services_model' => 'opsModel',
                'general_collection/General_collection_Model' => 'colModel'            
            ];
            $this->load->model($model_list);
        }
        
    }

?>