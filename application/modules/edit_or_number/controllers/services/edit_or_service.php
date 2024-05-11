<?php
class edit_or_service extends CI_Controller
{
    public function __construct(){
        parent::__construct();        
        $model_list = [
            'edit_or_number/edit_or_model' => 'EORModel',
        ];
        $this->load->model($model_list);
    }

    //ADDED BY KYLE 10-28-2023
    // public function replicate_OR(){
    //     try{
    //         // var_dump($this->input->post('from_OR'));
    //         $response = $this->EORModel->replicate_all_OR();
    //         echo json_encode($response);
    //     }
    //     catch (Exception $e){ 		
    //         echo json_encode(array('error_message' => $e->getMessage(), 'has_error' => true));	
    //     } 
    
    // }

    // public function edit_or_num(){
    //     try{
    //         $this->EORModel->HCOR_num_edited = $this->input->post('HCOR_num_edited');
    //         $this->EORModel->SOR_num = $this->input->post('SOR_num');

    //         $response = $this->EORModel->edit_OR_num();
    //         echo json_encode($response);
    //     }
    //     catch (Exception $e){ 		
    //         echo json_encode(array('error_message' => $e->getMessage(), 'has_error' => true));	
    //     } 
    // }


}
?>