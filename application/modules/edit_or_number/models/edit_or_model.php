<?php
class edit_or_model extends CI_Model
{
    private $table = array(
        "particular"    =>  "tbl_particular",
        "accnt"    =>  "tbl_accountable_form",
        "part_paid"     =>  "tbl_particular_paid",
        "payment"       =>  "tbl_payment",
        "collection"       =>  "tbl_rpt_collection",
        "cheque"       =>  "tbl_cheque",
        "clt_collection" => "tbl_collection",
        "clt_collection_items" => "tbl_collection_items",

    );

    public $Search;
    public $Remarks;
    public $ID;

    public function __construct(){
        parent::__construct();        
        $model_list = [              
            'general_collection/General_collection_Model' => 'colModel',
        ];
        $this->load->model($model_list);
        $this->ctodb = $this->load->database('ctodb', true);
    }

    //ADDED BY KYLE 10-26-2023
    // function search_range (){
    //     $this->ctodb->select(
    //         'p.Accountable_form_number, '.
    //         'p.OR_hardcopy, '.
    //         'p.Cancelled, '.
    //         'p.Payor, '
    //     );
    //     try{
    //         if(!empty($this->from_OR) && !empty($this->to_OR)){
    //             $this->ctodb->order_by('p.ID', 'asc');
    //             $this->ctodb->from($this->table['payment'].' p');
    //             $this->ctodb->where('p.Accountable_form_number >=', $this->from_OR);
    //             $this->ctodb->where('p.Accountable_form_number <=', $this->to_OR);
    //             $query = $this->ctodb->get()->result();
    //             // var_dump($query);
    //             return $query;
    //         }else{
    //             throw new Exception (ERROR_PROCESSING);
    //         }
    //     }
    //     //Use this when targeting caidz_licensing_testing DB -> tbl_collection 
    //     // try{
    //     //     if(!empty($this->from_OR) && !empty($this->to_OR)){
    //     //         $this->db->order_by('p.ID', 'asc');
    //     //         $this->db->from($this->table['clt_collection'].' p');
    //     //         $this->db->where('p.OR_number >=', $this->from_OR);
    //     //         $this->db->where('p.OR_number <=', $this->to_OR);
    //     //         $query = $this->db->get()->result();
    //     //         // var_dump($query);
    //     //         return $query;
    //     //     }else{
    //     //         throw new Exception (ERROR_PROCESSING);
    //     //     }
    //     // }
    //     catch (Exception $ex) 
    //     { 			
    //         echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
    //     }
    
    // }


    // function replicate_all_OR (){
    //     try{

    //         //===================<<Database->cadiz_licensing_testing>>====================
    //         $this->db->set('OR_hardcopy', 'OR_number', FALSE);
    //         $this->db->update('tbl_collection');

    //         $this->db->set('OR_hardcopy', 'OR_number', FALSE);
    //         $this->db->update('tbl_collection_items');

    //         //==========================<<Database->collection>>==========================
    //         $this->ctodb->set('OR_hardcopy', 'Accountable_form_number', FALSE);
    //         $this->ctodb->update('tbl_payment');

    //         $this->ctodb->set('OR_hardcopy', 'Accountable_form_number', FALSE);
    //         $this->ctodb->update('tbl_particular_paid');

    //     }
    //     catch (Exception $e) 
    //     { 			
    //         echo json_encode(array('error_message' => $e->getMessage(), 'has_error' => true));
    //     }

    // }

    // function edit_OR_num(){
    //     try
    //     {

    //         //Target->cadiz_licensing_testing->tbl_collection
    //         // foreach (array_merge($this->HCOR_num_edited, $this->SOR_num) as $edited => $system) {
    //         //     $this->db->where('OR_number', $system);
    //         //     $this->db->update('tbl_collection', ['OR_hardcopy' => $edited]);
    //         // }

    //         //Target->collection->tbl_payment
    //         // foreach (array_merge($this->HCOR_num_edited, $this->SOR_num) as $edited => $system) {
    //             // $this->ctodb->where('Accountable_form_number', $system);
    //             // $this->ctodb->update('tbl_payment', ['OR_hardcopy' => $edited]);
    //         // }

    //         $this->ctodb->where('Accountable_form_number', $this->SOR_num);
    //         $this->ctodb->update('tbl_payment', ['OR_hardcopy' => $this->HCOR_num_edited]);

    //         $this->ctodb->where('Accountable_form_number', $this->SOR_num);
    //         $this->ctodb->update('tbl_particular_paid', ['OR_hardcopy' => $this->HCOR_num_edited]);

    //         $this->db->where('OR_hardcopy', $this->SOR_num);
    //         $this->db->update('tbl_collection', ['OR_hardcopy' => $this->HCOR_num_edited]);

    //         $this->db->where('OR_hardcopy', $this->SOR_num);
    //         $this->db->update('tbl_collection_items', ['OR_hardcopy' => $this->HCOR_num_edited]);


    //     }
    //     catch (Exception $e) 
    //     { 		
    //         echo json_encode(array('error_message' => $e->getMessage(), 'has_error' => true));
    //     }

    // }
    
}
?>