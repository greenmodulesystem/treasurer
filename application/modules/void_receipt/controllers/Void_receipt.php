<?php
class void_receipt extends CI_Controller
{
    public function __construct(){
        parent::__construct();        
        $model_list = [
            'void_receipt/void_model' => 'MVoid',
        ];
        $this->load->model($model_list);
    }

    function index(){
        $this->data['content'] = "voiding_receipt";
        $this->load->view('layout', $this->data);
    }

    function grid(){
        try{
            if(!empty($this->input->post('search', true))){
                $this->MVoid->Search = $this->input->post('search', true);
                $this->data['Result'] = $this->MVoid->search(); 
                $this->data['content'] = "grid";
                $this->load->view('layout', $this->data);
            }
        }  
        catch (Exception $ex) 
		{ 			
			echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
		}        
    }

    public function view_update(){
        try{
            $this->MVoid->tokenNumber = $this->input->get('token', true);
            $this->MVoid->Date =$this->input->get('date', true);
            $this->MVoid->OR=$this->input->get('OR', true);
            $result = $this->MVoid->get_or_data();
            $account = $this->MVoid->get_accnt_type();
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
            $this->MVoid->Number = $Token;
            $this->data['result'] = $this->MVoid->get_particulars();
            $this->data['result_all'] = $this->MVoid->get_all_particulars();
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
}
?>