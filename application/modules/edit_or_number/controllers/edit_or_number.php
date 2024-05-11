<?php
class edit_or_number extends CI_Controller
{
    public function __construct(){
        parent::__construct();        
        $model_list = [
            'edit_or_number/edit_or_model' => 'EORModel',
        ];
        $this->load->model($model_list);
    }

    function index(){
        $this->data['content'] = "edit_or_num";
        $this->load->view('layout', $this->data);
    }

    public function view_update(){
        try{
            $this->EORModel->tokenNumber = $this->input->get('token', true);
            $this->EORModel->Date =$this->input->get('date', true);
            $this->EORModel->OR=$this->input->get('OR', true);
            $result = $this->EORModel->get_or_data();
            $account = $this->EORModel->get_accnt_type();
            // echo json_encode($this->MVoid->get_accnt_type());
            if(!empty($result)){
                $this->data['result'] = $result;
                $this->data['account'] = $account;
                $this->data['content'] = "update_receipt";
            }else{
                $this->data['content'] = "not_found/not_found";
            }            
            $this->load->view('layout', $this->data);
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }

    /** load particulars of searched OR number */
    public function laod_particulars($Token = ''){
        try{
            $this->EORModel->Number = $Token;
            $this->data['result'] = $this->EORModel->get_particulars();
            $this->data['result_all'] = $this->EORModel->get_all_particulars();
            $this->data['content'] = "grid/load_particulars";
            $this->load->view('layout', $this->data);
        }
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		} 
    }
    
    public function print_receipt()
    {
        if (!empty($this->input->get('get', true))) {
            // var_dump($this->input->get('get', true));
            @$data = json_decode( $this->input->get('get', true))[0];
            // var_dump($data);
            if (@$data->bank === null) {
                @$data->check_no = null;
                @$data->check_no = null;
                @$data->check_date = null;
                @$data->check_amount = null;
            }
            $this->data['Data'] = $data;
            $this->data['content'] = "print_receipt";
            $this->load->view('layout', $this->data);
        }
    }

    //ADDED BY KYLE 10-26-2023
    // public function search_or_range(){

    //     $this->EORModel->from_OR = $this->input->post("from_OR");
	// 	$this->EORModel->to_OR = $this->input->post("to_OR");

    //     $this->data['Result'] =$this->EORModel->search_range(); 
    //     $this->data['content'] = "grid";
    //     $this->load->view('layout', $this->data);
    // }
}
?>