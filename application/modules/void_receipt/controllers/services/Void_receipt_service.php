<?php
class void_receipt_service extends CI_Controller
{
    public function __construct(){
        parent::__construct();        
        $model_list = [
            'void_receipt/void_model' => 'MVoid',
        ];
        $this->load->model($model_list);
    }

    function void_applicant_receipt(){
        try{
            if(!empty($this->input->post('ID', true))){
                $this->MVoid->ID = $this->input->post('ID', true);
                $this->MVoid->Remarks = $this->input->post('Remarks', true);
                $this->MVoid->insert_void_receipt();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
}
?>