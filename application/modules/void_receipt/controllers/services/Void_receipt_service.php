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
                $this->MVoid->OR = $this->input->post('OR', true);
                $this->MVoid->Remarks = $this->input->post('Remarks', true);
                $this->MVoid->insert_void_receipt();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
    function void_rpt_receipt(){
        try{
            if(!empty($this->input->post('OR', true))){
                $this->MVoid->OR = $this->input->post('OR', true);
                $this->MVoid->Remarks = $this->input->post('Remarks', true);
                $this->MVoid->insert_void_rptreceipt();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
    function update_or(){
        try{
            if(!empty($this->input->post('payer', true))){
                $this->MVoid->or_number = $this->input->post('or_number', true);
                $this->MVoid->payer = $this->input->post('payer', true);
                $this->MVoid->paidby = $this->input->post('paidby', true);
                $this->MVoid->date_paid = $this->input->post('date_paid', true);
                $this->MVoid->partPaid_ID =$this->input->post('partPaid_ID', true);
                $this->MVoid->amount = $this->input->post('amount', true);
                $this->MVoid->remarks = $this->input->post('remarks', true);
                $this->MVoid->update_or();
            }
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
}
?>