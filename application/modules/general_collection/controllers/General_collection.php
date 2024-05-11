<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General_collection extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model_list = [
            'general_collection/General_collection_Model' => 'MCollection',
            'reports/Report_Model' => 'MReport',
        ];
        $this->load->model($model_list);
    }

    public function index($param = '')
    {
        $this->data['col_type'] = $this->MReport->getCollectionType();
        $this->data['Result'] = $this->MCollection->get_particullar_amount();
        $this->data['banks'] = $this->MCollection->get_bank();
        $this->data['content'] = "collections";
        $this->load->view('layout', $this->data);
    }

    public function fees_charges()
    {
        $this->data['parents'] = $this->MCollection->get_fees_parent();
        $this->data['col_type'] = $this->MReport->getCollectionType();
        $this->data['content'] = "fees_charges";
        $this->load->view('layout', $this->data);
    }

    public function load_fees()
    {
        $this->MCollection->search = $this->input->post('search', true);
        $this->data['result'] = $this->MCollection->get_all();
        $this->data['content'] = "load_fees";
        $this->load->view('layout', $this->data);
    }

    public function load_payment_summry()
    {
        $this->data['Type'] = $this->MCollection->get_or_type();
        if (!empty($this->data['Type'])) {
            $this->MCollection->Origin = $this->data['Type']->OR_origin;
            $validity = $this->MCollection->check_validity($this->data['Type']->Accountable_form_number);
        }
        
        if (!empty($this->data['Type'])) {
            if (!empty($validity) || $this->data['Type']->Accountable_form_number === '') {
                $this->data['check_validity'] = 1;
            } else {
                $this->data['check_validity'] = 0;
            }
        }
        
        $this->data['Result'] = $this->MCollection->get_report_by_day();
        $this->data['content'] = "load_payment_summary";
        $this->load->view('layout', $this->data);
    }

    public function load_form_data()
    {
        $this->data['Result'] = $this->MCollection->get_particullar();
        $this->data['content'] = "load_form_data";
        $this->load->view('layout', $this->data);
    }

    public function load_payment_details()
    {
        $this->data['content'] = "load_payment_details";
        $this->load->view('layout', $this->data);
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

    public function group_particulars(){
        $this->data['parents'] = $this->MCollection->get_fees_parent();
        
        $this->data['content'] = "group_particulars";
        $this->load->view('layout', $this->data);
    }

    public function load_fees_group()
    {
        $this->data['result'] = $this->MCollection->get_all();
        $this->data['content'] = "load_fees_group";
        $this->load->view('layout', $this->data);
    }

    public function get_particulars_for_selected_group()
    {
        $this->MCollection->Parent = $this->input->get('Parent', true);
        $this->data['result'] = $this->MCollection->get_particulars_for_selected_group();
        $this->data['content'] = "load_particulars_for_selected_group";
        $this->load->view('layout', $this->data);
        // echo json_encode($this->input->get('Parent', true));
    }

    //ADDED BY KYLE 11-08-2023
    public function particulars_checked()
    {
        $this->MCollection->part_ID = $this->input->get('Particulars', true);
        $this->data['particulars'] = $this->MCollection->get_checked_particulars();
        $this->data['content'] = "load_checked_particulars";
        $this->load->view('layout', $this->data);
        // echo json_encode($this->MCollection->get_checked_particular());
    }

    //ADDED BY KYLE 11-09-2023
    public function search_particulars(){

        $this->MCollection->search_value = $this->input->get('value', true);
        $this->data['result'] = $this->MCollection->get_all();
        $this->data['content'] = "load_fees_group";
        $this->load->view('layout', $this->data);

    }

    public function check_particular(){

        $this->MCollection->Parent = $this->input->post('selected_group', true);
        $selected_particular = $this->input->post('selected_particular', true);
        $part_selected_group = $this->MCollection->get_particulars_for_selected_group();
        echo json_encode(array('part_selected_group' => $part_selected_group));

        // foreach ($part_selected_group as $selected){
        //     // var_dump($selected->Particular_name);
        //     if($selected_particular == $selected->Particular_name){
        //         echo json_encode(array('particular_match' => true));
        //         break;
        //     }
        //     else{
        //         echo json_encode(array('particular_match' => false));
        //     }
        // }

        // var_dump($part_selected_group);

    }
}
