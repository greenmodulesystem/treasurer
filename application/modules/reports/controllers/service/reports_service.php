<?php
class reports_service extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $model_list = [
      'reports/Report_Model' => 'MReport',
    ];
    $this->load->model($model_list);
  }

  function generate_report(){
    try{
      if($this->input->post('date') != null){
        if($this->input->post('type', true) === 'single'){
          $this->MReport->Date   =   $this->input->post('date', true);
          $this->MReport->Collection_type =   $this->input->post('collection_type', true);
          $this->MReport->get_reports();
        }else{
          $this->MReport->Date   =   $this->input->post('date', true);
          $this->MReport->End_date = $this->input->post('end_date', true);
          $this->MReport->Collection_type =   $this->input->post('collection_type', true);
          $this->MReport->get_report_date_range();
        }
      }else{
        throw new Exception (ERROR_PROCESSING);
      }
    }
    catch (Exception $ex)
    {
      echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
    }
  }

  function generate_report_cedula(){
    try{
      if($this->input->post('date') != null){
        if($this->input->post('type', true) === 'single'){
          $this->MReport->Date   =   $this->input->post('date', true);
          $this->MReport->Collection_type =   $this->input->post('collection_type', true);
          $this->MReport->get_cedula_reports();
        }else{
          $this->MReport->Date   =   $this->input->post('date', true);
          $this->MReport->End_date = $this->input->post('end_date', true);
          $this->MReport->Collection_type =   $this->input->post('collection_type', true);
          $this->MReport->get_cedula_date_range_report();
        }
      }else{
        throw new Exception (ERROR_PROCESSING);
      }
    }
    catch (Exception $ex)
    {
      echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
    }
  }

  function update_remitted(){
    try{
      if(!empty($this->input->post('data', true))){
        $this->MReport->Data = json_decode($this->input->post('data', true));
        $this->MReport->Update_remitted();
      }else{
        echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
      }
    }
    catch (Exception $ex)
    {
      echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
    }
  }

  function cedula_remittance(){
    try{
      if(!empty($this->input->post('data', true))){
        $this->MReport->Data = $this->input->post('data', true);
        $this->MReport->Update_cedula_remittace();
      }else{
        echo json_encode(array('error_message'=>'Error Processing', 'has_error'=>true));
      }
    }
    catch (Exception $ex)
    {
      echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
    }
  }

  function generate_unremitted(){
    try{
      $this->MReport->Type = $this->input->post('Type', true);
      $result = $this->MReport->get_unremitted();
      echo json_encode($result);
    }
    catch (Exception $ex)
    {
      echo json_encode(array('error_message' => $ex->getMessage(), 'Processing Error' => true));
    }
  }

  function get_user_accountable(){
    $this->MReport->user_accnt_form_data();
  }

  function unremitted(){
    try{
      if(!empty($this->input->post('result', true))){
        $this->data['unremitted'] = $this->input->post('result', true);
        $this->data['content'] = 'load_unremitted';
        $this->load->view('layout', $this->data);
      }else {
        echo "No Data Found";
      }
    }
    catch (Exception $ex)
    {
      echo json_encode(array('error_message' => $ex->getMessage(), 'Processing Error' => true));
    }
  }

  function remitted(){
    $this->data['remitted'] = $this->MReport->get_remitted();
    $this->data['content'] = "remitted";
    $this->load->view('layout', $this->data);
  }

  function voided(){
    $this->data['voided'] = $this->MReport->voided();
    $this->data['content'] = "voided";
    $this->load->view('layout', $this->data);
  }

  function export_reports(){
    $this->data['content'] = "collection_reports";
    $this->load->view('layout', $this->data);
  }

  function export_cedula_reports(){
    $this->data['content'] = "cedula_report";
    $this->load->view('layout', $this->data);
  }

  function get_two_data(){
    $this->MReport->get_two_data();
  }
}
?>
