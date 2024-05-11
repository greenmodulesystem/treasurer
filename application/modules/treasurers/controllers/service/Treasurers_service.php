<?php
class Treasurers_service extends CI_Controller{

    public function __construct(){
        parent::__construct();        
        $model_list = [
            'treasurers/Void_Model' => 'TSModel',
        ];
        $this->load->model($model_list);
    }

	// $this->MVoid->to_OR = $this->input->post("to_OR");

    public function revive_receipt(){   

	    $this->TSModel->OR_number = $this->input->post("OR_number");
        $response = $this->TSModel->revive_receipt();
        echo json_encode($response);

    }


}