<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model_list = [
            'dashboard/Dashboard_model' => 'MDashboard',
            'reports/Report_Model' => 'MReport',
        ];
        $this->load->model($model_list);
    }

    public function index()
    {
        $this->data['col_type'] = $this->MReport->getCollectionType();
        $this->data['Forms'] =  $this->MDashboard->get_accountable_form();
        $this->data['Taken'] =  $this->MDashboard->get_accountable_form_taken();
        $this->data['content'] = "dashboard_view";
        $this->load->view('layout', $this->data);
    }
}
