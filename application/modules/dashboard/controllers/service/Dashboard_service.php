<?php 
class Dashboard_service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model_list = [
            'Dashboard/dashboard_model' => 'MDashboard',
        ];
        $this->load->model($model_list);
    }

    public function update_or_for()
    {
        try {
            if ($this->input->post('ID', true) != null) {
                $this->MDashboard->ID   =   $this->input->post('ID', true);
                $this->MDashboard->Or_for   =   $this->input->post('OR_for', true);
                $this->MDashboard->update_or_for();
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function cancel_form()
    {
        try {
            if (!empty($this->input->post('ID', true))) {
                $this->MDashboard->ID   =   $this->input->post('ID', true);
                $this->MDashboard->Origin = $this->input->post('origin', true);
                $this->MDashboard->cancel_form();
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function ActivateOr()
    {
        try {
            if(empty($this->input->post('ID', true)) || empty($this->input->post('Designate', true))){
                throw new Exception(ERROR_PROCESSING, true);
            }
            $this->MDashboard->ID = $this->input->post('ID', true);
            $this->MDashboard->Designate = $this->input->post('Designate', true);
            $this->MDashboard->ActivateOr();
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
}
