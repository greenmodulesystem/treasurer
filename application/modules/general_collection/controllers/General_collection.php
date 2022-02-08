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
                // $this->data['Checker'] = $this->MCollection->get_report_by_day();
                // $this->data['Result'] = $this->MCollection->get_report_by_day();
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
                $data = json_decode($this->input->get('get', true))[0];
                if ($data->bank === null) {
                        $data->check_no = null;
                        $data->check_no = null;
                        $data->check_date = null;
                        $data->check_amount = null;
                }
                $this->data['Data'] = $data;
                $this->data['content'] = "print_receipt";
                $this->load->view('layout', $this->data);
        }
}
