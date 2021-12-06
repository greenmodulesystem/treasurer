<?php
class Void_receipt extends CI_Controller
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
}
?>