
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('FORMS',['51','52','53','54','57']);

class Payments extends CI_Controller
{
    public function __construct(){
    parent::__construct();        
        $model_list = [
            'general_collection/General_collection_Model' => 'MGCollection',
            'Payments_model' => 'MPayment',
            'OR_Model' => 'MOR',
            'Certificates_model' => 'MCertificate'
        ];
        $this->load->model($model_list);
    }   
    
    public function form($form=''){
        $this->MOR->form = $form;
        $this->data['or_number'] = $this->MOR->generate();
        $this->data['fees'] = $this->MGCollection->get_particullar();
        $this->data['banks'] = $this->MGCollection->get_bank();
        
        $this->data['form'] = $form;
        $this->data['content'] = '404_form';
        if (check_rule($form,OFFICE_R[OFFICE]['FORM']) && check_rule($form,FORMS))
            $this->data['content'] = 'index';
        $this->load->view('layout',$this->data);
    }   

    public function receipt($form='',$or_no=''){
        $this->MPayment->Accountable_form_origin = $form;
        $this->MPayment->Accountable_form_number = $or_no;
        $this->data['details'] = $this->MPayment->get_or_details();
        $this->data['form'] = $form;
        $this->data['content'] = '404_receipt';
        
        if (in_array($form, FORMS, true) && !empty($this->data['details']))
            $this->data['content'] = 'templates/receipts/'.$form;
        $this->load->view('layout',$this->data);
    }

    public function receipts($void='0'){
        $this->MPayment->Cancelled = $void;
        $this->MPayment->Accountable_form_origin = $this->input->get('form',true);
        $this->MPayment->Accountable_form_number = $this->input->get('number',true);
        $this->data['receipts'] = $this->MPayment->get_all_receipts();
        $this->data['content'] = 'grid/receipts';
        $this->load->view('layout',$this->data);
    }
    
    public function reports($type,$form){
        $this->MPayment->Accountable_form_origin = $form;
        $this->MPayment->from = $this->input->get('from',true);
        $this->MPayment->to = $this->input->get('to',true);
        $this->data['data'] = $this->MPayment->reports($type);
        $this->data['type'] = $type;
        $this->data['content'] = 'grid/reports';
        $this->load->view('layout',$this->data);
    }

    public function stabs($form){
        $this->MPayment->Accountable_form_origin = $form;
        $this->data['stabs'] = $this->MPayment->get_stabs();
        $this->data['content'] = 'grid/stabs';
        $this->load->view('layout',$this->data);
    }

    public function certificate($form='',$or_number='',$kind_certificate=''){
        $this->MCertificate->form = $form;
        $this->MCertificate->or_number = $or_number;
        $this->data['details'] = $this->MCertificate->get_details();
        $this->data['content'] = 'certificates/'.$kind_certificate;
        $this->load->view('layout',$this->data);
    }
}
?>