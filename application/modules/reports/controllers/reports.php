<?php
class reports extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $model_list = [
      'reports/Report_Model' => 'MReport',
    ];
    $this->load->model($model_list);
  }

  public function index()
  {
    $this->data['col_type'] = $this->MReport->getCollectionType();
    $this->data['or_type'] = $this->MReport->get_or_type();
    $this->data['content'] = "report";
    $this->load->view('layout', $this->data);
  }

  public function load_reports()
  {
    $this->data['content'] = "load_reports";
    $this->load->view('layout', $this->data);
  }
  // DISPLAY GENERAL REPORTS
  public function display_generated_reports()
  {
    try {
      if ($this->input->post('Data', true) != null) {
        $data = json_decode($this->input->post('Data', true));
        $this->data['Result'] = $data;
        $this->data['content'] = "load_reports";
        $this->load->view('layout', $this->data);
      }
    } catch (Exception $ex) {
      echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
    }
  }
  // DISPLAY CEDULA REPORTS FROM DB
  public function display_generated_cedula_reports()
  {
    try {
      if ($this->input->post('Data', true) != null) {
        $data = json_decode($this->input->post('Data', true));
        $this->data['Result'] = $data;
        $this->data['content'] = "load_cedula_reports";
        $this->load->view('layout', $this->data);
      }
    } catch (Exception $ex) {
      echo json_encode(array('error_message' => $ex->getMessage(), 'Error Processing' => true));
    }
  }
  // DISPLAY UNREMITTED DATA
  public function display_unremitted()
  {
    try {
      $this->MReport->Data = $this->input->get('get', true);
      $FirstData = $this->MReport->get_first_data();
      $SecondData = $this->MReport->get_second_data();
      if (empty($FirstData) && empty($FirstData) || empty($this->input->get('get', true))) {
        $this->data['content'] = "Not_found/not_found";
      } else {
        $this->data['ColType'] = $this->input->get('get', true);
        $this->data['non_cash'] = $this->MReport->get_non_cash();
        $this->data['cheque'] = $this->MReport->get_cheque();
        $this->data['first'] = $FirstData;
        $this->data['second'] = $SecondData;
        $this->data['office_form'] = $this->MReport->get_officer_form();
        $this->data['all_forms'] = $this->MReport->get_all_forms();
        $this->data['AllPayments'] = $this->MReport->get_all_payment();

        $this->data['content'] = "unremitted";
      }
      $this->load->view('layout', $this->data);
    } catch (Exception $ex) {
      echo json_encode(array('error_message' => $ex->getMessage(), 'Error Processing' => true));
    }
  }
  // display abstract reports of unremitted
  public function display_abstract()
  {
    try {
      $this->MReport->Type = $this->input->get('get', true);
      $this->MReport->Data = $this->input->get('get', true);
      $this->data['content'] = "unremitted_abstract";
      $this->data['data'] = $this->MReport->get_unremitted();
      $this->MReport->SumData = $this->data['data'];
      $this->data['summary'] = $this->MReport->summary_list();
      $this->data['AllPayments'] = $this->MReport->get_all_payment();
      $this->load->view('layout', $this->data);
    } catch (Exception $ex) {
      echo json_encode(array('error_message' => $ex->getMessage(), 'Error Processing' => true));
    }
  }

  // Re-Print Voided receipt
  public function re_print_receipt($ID = '')
  {
    $this->MReport->ID  =   $ID;
    $this->data['Data']   =   $this->MReport->get_voided_receipt();
    $this->data['content']  =   "re_print_receipt";
    $this->load->view('layout', $this->data);
  }

  // get officer accountable form number
  public function get_officer_form()
  {
    $this->MReport->get_officer_form();
  }

  /** print unremitted report */
  public function print_unrimitted()
  {
    try {
      $this->MReport->Data = "51";
      $FirstData = $this->MReport->get_first_data();
      $SecondData = $this->MReport->get_second_data();
      $this->data['ColType'] = "51";
      $this->data['non_cash'] = $this->MReport->get_non_cash();
      $this->data['cheque'] = $this->MReport->get_cheque();
      $this->data['first'] = $FirstData;
      $this->data['second'] = $SecondData;
      $this->data['office_form'] = $this->MReport->get_officer_form();
      $this->data['all_forms'] = $this->MReport->get_all_forms();
      $this->data['AllPayments'] = $this->MReport->get_all_payment();

      $this->data['content'] = "printing/print_unrimitted";
      $this->load->view('layout', $this->data);
    } catch (Exception $msg) {
      echo json_encode(array('error_message' => $msg->getMessage(), 'Error Processing' => true));
    }
  }

  /** print unremitted  */
  public function print_abstract_report()
  {
    try {
      $this->MReport->Type = $this->input->get('get', true);
      $this->data['data'] = $this->MReport->get_unremitted();
      $this->MReport->SumData = $this->data['data'];
      $this->data['summary'] = $this->MReport->summary_list();
      $this->data['content'] = "printing/print_abstract";
      $this->load->view('layout', $this->data);
    } catch (Exception $ex) {
      echo json_encode(array('error_message' => $ex->getMessage(), 'Error Processing' => true));
    }
  }
}
