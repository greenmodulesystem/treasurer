
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_service extends CI_Controller
{
    public function __construct(){
    parent::__construct();        
        $model_list = [
            'Payments_model' => 'MPayment',
            'Certificates_model' => 'MCertificate'
        ];
        $this->load->model($model_list);
    }   
    
    public function pay(){
        try {
            $this->MPayment->Date_paid = $this->input->post('date',TRUE);
            $this->MPayment->Accountable_form_origin = $this->input->post('form_no',TRUE);
            $this->MPayment->Accountable_form_number = $this->input->post('or_no',TRUE);
            $this->MPayment->Payor = $this->input->post('payor',TRUE);
            $this->MPayment->Paid_by = $this->input->post('paid_by',TRUE);
            $this->MPayment->Address = $this->input->post('address',TRUE);
            $this->MPayment->Cash = $this->input->post('cash',TRUE);

            $this->MPayment->City_municipality = $this->input->post('city',TRUE);
            $this->MPayment->Province = $this->input->post('province',TRUE);
            $this->MPayment->Sex = $this->input->post('sex',TRUE);
            $this->MPayment->Age = $this->input->post('age',TRUE);
            $this->MPayment->Ownership_no = $this->input->post('ownership_no',TRUE);
            $this->MPayment->City_municipality_brand = $this->input->post('c_m_brand',TRUE);
            $this->MPayment->Owner_brand = $this->input->post('ow_brand',TRUE);
            $this->MPayment->Conveyor = $this->input->post('received_by',TRUE);
            $this->MPayment->Conveyor_Address = $this->input->post('r_address',TRUE);
            $this->MPayment->Conveyor_City_Municipality = $this->input->post('r_city_municipality',TRUE);
            $this->MPayment->Conveyor_Province = $this->input->post('r_province',TRUE);
            
            $this->MPayment->particulars = json_decode($this->input->post('particulars',TRUE),true);
            $this->MPayment->cheque = json_decode($this->input->post('cheque',TRUE),true);

            $response = $this->MPayment->save_payment();
            if($response['has_error']){
                throw new Exception($response['error_message'], 1);
            }
            echo json_encode(
                [
                    'has_error' => false,
                    'message' => $response['message'],
                    'data' => $response['data']
                ]
            );
        } catch (Exception $e) {
            echo json_encode([
                'has_error' => true,
                'error_message' => $e->getMessage()
            ]);
        }
    }  
    
    public function void_receipt(){
        try {
            $this->MPayment->ID = $this->input->post('id',TRUE);
            $this->MPayment->Accountable_form_origin = $this->input->post('form_no',TRUE);
            $this->MPayment->Accountable_form_number = $this->input->post('or_no',TRUE);
            $this->MPayment->Remarks = $this->input->post('remarks',TRUE);
            
            $response = $this->MPayment->void_receipt();
            if($response['has_error']){
                throw new Exception($response['error_message'], 1);
            }
            echo json_encode(
                [
                    'has_error' => false,
                    'message' => $response['message'],
                    'data' => $response['data']
                ]
            );
        } catch (Exception $e) {
            echo json_encode([
                'has_error' => true,
                'error_message' => $e->getMessage()
            ]);
        }
    }
    
    public function certificate(){
        try {
            $this->MCertificate->form =  $this->input->post('form_no',TRUE);
            $this->MCertificate->or_number =  $this->input->post('or_no',TRUE);
            $response = $this->MCertificate->generate();
            
            if($response['has_error']){
                throw new Exception($response['error_message'], 1);
            }
            echo json_encode(
                [
                    'has_error' => false,
                    'message' => $response['message'],
                    'data' => $response['data']
                ]
            );
        } catch (Exception $e) {
            echo json_encode([
                'has_error' => true,
                'error_message' => $e->getMessage()
            ]);
        }
    }
}
?>