<?php
class Report_Model extends CI_Model
{
    private $table = array(
        "particular"    =>  "tbl_particular",
        "part_paid"     =>  "tbl_particular_paid",
        "payment"       =>  "tbl_payment",
        "cedula"        =>  "tbl_collection_cedula",
        "accountable"   =>  "tbl_accountable_form",
        "user"          =>  "tbl_users",
        "cheque"        =>  "tbl_cheque",
        "colType"       =>  "tbl_collection_type",
        'orType'        =>  'tbl_or_type',
        "collection"    =>  'tbl_rpt_collection',
        'payer'         =>  'tbl_payer',
        'remitSched'    =>  'tbl_remit_schedule'
    );

    public $Date;
    public $Collection_type;
    public $End_date;
    public $Data;
    public $ID;
    public $Counter = 0;

    public function __construct(){
        parent::__construct();        
        $this->ctodb = $this->load->database('ctodb', true);
    }

    // GET GENERAL AND TRUST REPORTS BY SINGLE DATE
    function get_reports()
    {
        try {
            if (!empty($this->Date)) {

                $this->ctodb->select(
                    'p.ID, ' .
                        'p.Accountable_form_number, ' .
                        'p.Date_paid, ' .
                        'p.Payor, ' .
                        'p.Cancelled, ' .
                        'p.Remitance'
                );
                $this->ctodb->from($this->table['payment'] . ' p');
                $this->ctodb->where('p.Collector', $_SESSION['User_details']->Last_name . ', ' . $_SESSION['User_details']->First_name);
                $this->ctodb->where('p.Collector_ID', $_SESSION['User_details']->ID);
                $this->ctodb->where('Date(p.Date_paid)', $this->Date);
                $query = $this->ctodb->get()->result();

                foreach ($query as $key => $value) {
                    if ($value->Remitance === '1') {
                        $query[$key]->Status_remitance = "Remitted";
                    } else {
                        $query[$key]->Status_remitance = "For Remitance";
                    }
                }

                foreach ($query as $key => $value) {
                    $result =  $this->get_paid_particular_per_collection($value->Accountable_form_number);
                    $query[$key]->ParticularPaid = $result;
                }

                foreach ($query as $key => $value) {
                    if (empty($value->ParticularPaid)) {
                        unset($query[$key]);
                    }
                }
                echo json_encode($query);
            } else {
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function get_paid_particular_per_collection($Accountable)
    {
        try {
            $this->ctodb->select(
                'part.Amount, ' .
                    'par.Particular'
            );

            $this->ctodb->from($this->table['part_paid'] . ' part');
            $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
            $this->ctodb->where('part.Accountable_form_number', $Accountable);
            $this->ctodb->where('par.Collection_type', $this->Collection_type);
            $query = $this->ctodb->get()->result();

            return $query;
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    /** get collection type */
    public function getCollectionType()
    {
        try {
            $this->ctodb->select('*');
            $this->ctodb->from($this->table['colType']);
            $result = $this->ctodb->get()->result();

            return $result;
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

     //4-23-2023 LOUIS
     function get_remitted_singledate()
     {
         try {
             if (!empty($this->Date)) {
 
                 $this->db->select(
                     'p.ID, ' .
                         'p.Accountable_form_number, ' .
                         'p.Date_paid, ' .
                         'p.Payor, ' .
                         'p.Cancelled, ' .
                         'p.Remitance, ' .
                         'part.Amount, ' .
                         'par.Particular, '
                 );
                 $this->db->from($this->table['payment'] . ' p');
                 $this->db->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = p.Accountable_form_number', 'left');
                 $this->db->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
                 $this->db->where('p.Collector', $_SESSION['User_details']->Last_name . ', ' . $_SESSION['User_details']->First_name);
                 $this->db->where('p.Collector_ID', $_SESSION['User_details']->ID);
                 $this->db->where('Date(p.Date_paid)', $this->Date);
                 $this->db->where('p.Remitance', 1);
                 $query = $this->db->get()->result();
 
                 echo json_encode($query);
             } else {
                 echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
             }
         } catch (Exception $ex) {
             echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
         }
     }
     // END

      // 4-13-2023 LOUIS GET REMITTED BY DATE RANGE
    function get_remitted_date_range()
    {
        try {
            if (!empty($this->Date)) {
                $this->db->select(
                    'p.ID, ' .
                        'p.Accountable_form_number, ' .
                        'p.Date_paid, ' .
                        'p.Payor, ' .
                        'p.Cancelled, ' .
                        'p.Remitance, ' .
                        'part.Amount, ' .
                        'par.Particular, '
                );
                $this->db->from($this->table['payment'] . ' p');
                $this->db->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = p.Accountable_form_number', 'left');
                $this->db->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
                $this->db->where('p.Collector', $_SESSION['User_details']->Last_name . ', ' . $_SESSION['User_details']->First_name);
                $this->db->where('p.Date_paid BETWEEN "' . date('Y-m-d', strtotime($this->Date)) . '" and "' . date('Y-m-d', strtotime($this->End_date)) . '"');
                $this->db->where('p.Remitance', 1);
                $query = $this->db->get()->result();

                echo json_encode($query);
            } else {
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
    //END
    
    // GET GENERAL AND TRUST REPORTS BY DATE RANGE
    function get_report_date_range()
    {
        try {
            if (!empty($this->Date)) {
                $this->ctodb->select(
                    'p.ID, ' .
                        'p.Accountable_form_number, ' .
                        'p.Date_paid, ' .
                        'p.Payor, ' .
                        'p.Cancelled, ' .
                        'p.Remitance,'.
                        'p.Accepted'
                );
                $this->ctodb->from($this->table['payment'] . ' p');
                $this->ctodb->where('p.Collector', $_SESSION['User_details']->Last_name . ', ' . $_SESSION['User_details']->First_name);
                $this->ctodb->where('p.Date_paid BETWEEN "' . date('Y-m-d', strtotime($this->Date)) . '" and "' . date('Y-m-d', strtotime($this->End_date)) . '"');
                $query = $this->ctodb->get()->result();
                
                foreach ($query as $key => $value) {
                    if ($value->Remitance === '1' && $value->Accepted === '0') {
                        $query[$key]->Status_remitance = "On Process";
                    }  else if($value->Remitance === '1'&& $value->Accepted === '1') {
                        $query[$key]->Status_remitance = "Remitted";
                    } else {
                        $query[$key]->Status_remitance = "Unremitted";
                    }
                }

                foreach ($query as $key => $value) {
                    $result =  $this->get_paid_particular_per_collection($value->Accountable_form_number);
                    $query[$key]->ParticularPaid = $result;
                }

                echo json_encode($query);
            } else {
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
    // GENERATE CEDULA REPORT SINGLE DATE
    function get_cedula_reports()
    {
        try {
            if (!empty($this->Date)) {
                $this->ctodb->select(
                    'c.ID, ' .
                        'c.Date_issued, ' .
                        'c.Last_name, ' .
                        'c.First_name, ' .
                        'c.Total, ' .
                        'c.OR_number, ' .
                        'c.Remittance'
                );
                $this->ctodb->from($this->table['cedula'] . ' c');
                $this->ctodb->where('Date(c.Date_issued)', $this->Date, 'both');
                $this->ctodb->distinct();
                $query = $this->ctodb->get()->result();
                foreach ($query as $key => $value) {
                    if ($value->Remittance === '1') {
                        $query[$key]->Status_remitance = "Remitted";
                    } else {
                        $query[$key]->Status_remitance = "For Remitance";
                    }
                }
                echo json_encode($query);
            } else {
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
    // GENERATE CEDULA REPORTS BY DATE RANGE
    function get_cedula_date_range_report()
    {
        try {
            if (!empty($this->Date)) {
                $this->ctodb->select(
                    'c.ID, ' .
                        'c.Date_issued, ' .
                        'c.Last_name, ' .
                        'c.First_name, ' .
                        'c.Total, ' .
                        'c.OR_number, ' .
                        'c.Remittance'
                );
                $this->ctodb->from($this->table['cedula'] . ' c');
                $this->ctodb->where('c.Date_issued BETWEEN "' . date('Y-m-d', strtotime($this->Date)) . '" and "' . date('Y-m-d', strtotime($this->End_date)) . '"');
                $this->ctodb->distinct();
                $query = $this->ctodb->get()->result();
                foreach ($query as $key => $value) {
                    if ($value->Remittance === '1') {
                        $query[$key]->Status_remitance = "Remitted";
                    } else {
                        $query[$key]->Status_remitance = "For Remitance";
                    }
                }
                echo json_encode($query);
            } else {
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
    // UPDATE REMITTANCE FIELD IN PAYMENT TABLE
    function Update_remitted()
    {
        try {
            $data = array(
                'Remitance' => 1
            );
            if (!empty($this->Data)) {
                foreach ($this->Data as $key => $value) {
                    $this->ctodb->where('ID', $value->ID);
                    $this->ctodb->update($this->table['payment'], $data);
                }
                echo json_encode(array('error_message' => 'Remit Success', 'has_error' => false));
            } else {
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
    // UPDATE REMITTANCE FIELD IN CEDULA TABLE
    function Update_cedula_remittace()
    {
        try {
            $data = array(
                'Remittance' => 1
            );
            if (!empty($this->Data)) {
                foreach ($this->Data as $key => $value) {
                    $this->ctodb->where('ID', $value['ID']);
                    $this->ctodb->update($this->table['cedula'], $data);
                }
                echo json_encode(array('error_message' => 'Success', 'has_error' => false));
            } else {
                echo json_encode(array('error_message' => 'Error Processing', 'has_error' => true));
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
    // get users accountable form data
    public function user_accnt_form_data()
    {
        $this->ctodb->select(
            'acct.OR_for'
        );
        $this->ctodb->from($this->table['accountable'] . ' acct');
        $this->ctodb->where('acct.Collector_ID', $_SESSION['User_details']->ID, 'both');
        $this->ctodb->where('acct.Done', 0);
        $query = $this->ctodb->get()->result();
        echo json_encode($query);
    }
    // GET UNREMITTED REPORTS
    public function get_unremitted()
    {
        try {
            if ($this->Type == "51") {
                $query = $this->unremitted_general_col();
                return $query;
            } else {
                $this->ctodb->select('ac.Start_OR, ' . 'ac.End_OR, ' . 'ac.OR_for');
                $this->ctodb->order_by('ac.ID', 'desc');
                $this->ctodb->from($this->table['accountable'] . ' ac');
                $this->ctodb->where('ac.Remittance', 0);
                $this->ctodb->where('ac.OR_origin', $this->Type);
                $this->ctodb->where('ac.Collector_ID', $_SESSION['User_details']->ID);
                $response = $this->ctodb->get()->result();
                $l = sizeof($response);

                $this->ctodb->select(
                        'pay.ID, ' .
                        'pay.Accountable_form_number, ' .
                        // 'pay.OR_hardcopy, ' .
                        'pay.Accountable_form_origin, ' .
                        'pay.Date_paid, ' .
                        'pay.Payor, ' .
                        'pay.Address, ' .
                        'pay.Quantity,'.
                        'pay.Cancelled'
                );
                $this->ctodb->from($this->table['payment'] . ' pay');
                $this->ctodb->where('pay.Accountable_form_number >=', $response[0]->Start_OR);
                $this->ctodb->where('pay.Accountable_form_number <=', $response[0]->End_OR);
                $this->ctodb->where('pay.Remitance', 0);
                $this->ctodb->where('pay.Accountable_form_origin', $this->Type);
                $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
                $query = $this->ctodb->get()->result();
                

                foreach ($query as $key => $value) {
                    $result =  $this->get_paid_particulars($value->Accountable_form_number);
                    $query[$key]->ParticularPaid = $result;
                }
                return $query;
            }
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function unremitted_general_col()
    {
        try {
            $this->ctodb->select('ac.Start_OR, ' . 'ac.End_OR, ' . 'ac.OR_for');
            $this->ctodb->order_by('ac.ID', 'asc');
            $this->ctodb->from($this->table['accountable'] . ' ac');
            $this->ctodb->where('ac.Remittance', 0);
            $this->ctodb->where('ac.OR_origin', '51');
            $this->ctodb->where('ac.Collector_ID', $_SESSION['User_details']->ID);
            $response = $this->ctodb->get()->result();
            
            $ArrayMerge = [];
            $calculate = 0;

            for ($i = 0; $i < count($response); $i++) {
                
                $Query = $this->getUnremitted($response[$i]->Start_OR, $response[$i]->End_OR);
                if (!empty(@$Query[$calculate]->ParticularPaid)) {
                    $ArrayMerge = array_merge($ArrayMerge, $Query);
                    $calculate++;
                }
            }

            return $ArrayMerge;
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    /** get remitance number of each collector */
    public function getRemitanceNumber()
    {
        try {
            $this->ctodb->select('rs.Remittance_no');
            $this->ctodb->order_by('rs.ID', 'desc');
            $this->ctodb->from($this->table['remitSched'] . ' rs');
            $this->ctodb->where('rs.Collector_ID', $_SESSION['User_details']->ID);
            $Response = $this->ctodb->get()->result();

            $Result = remittanceNumberGenerator($_SESSION['User_details']->First_name, $_SESSION['User_details']->Last_name, $_SESSION['User_details']->Middle_name, count($Response));

            return $Result;
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }


    function getUnremitted($Start, $End)
    {
        try {
            // $this->ctodb->select(
            //     'pay.ID, ' .
            //         'pay.Accountable_form_number, ' .
            //         'pay.Accountable_form_origin, ' .
            //         'pay.Date_paid, ' .
            //         'pay.Payor, ' .
            //         'pay.Address, ' .
            //         'pay.Quantity'
            // );
            // $this->ctodb->from($this->table['payment'] . ' pay');
            // $this->ctodb->where('pay.Accountable_form_number >=', $Start);
            // $this->ctodb->where('pay.Accountable_form_number <=', $End);
            // $this->ctodb->where('pay.Remitance', 0);
            // $this->ctodb->where('pay.Accountable_form_origin', $this->Type);
            // $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
            // $query = $this->ctodb->get()->result();

            // foreach ($query as $key => $value) {
            //     $result =  $this->get_paid_particulars($value->Accountable_form_number);
            //     $query[$key]->ParticularPaid = $result;
            // }

            // var_dump($Start.' - '.$End);

            $this->ctodb->select(
                'pay.ID, ' .
                    'pay.Accountable_form_number, ' .
                    // 'pay.OR_hardcopy, ' .
                    'pay.Accountable_form_origin, ' .
                    'pay.Date_paid, ' .
                    'pay.Payor, ' .
                    'pay.Address, ' .
                    'pay.Quantity,'.
                    'pay.Cancelled'
            );
            $this->ctodb->from($this->table['payment'] . ' pay');
            $this->ctodb->where('pay.Accountable_form_number >=', $Start);
            $this->ctodb->where('pay.Accountable_form_number <=', $End);
            $this->ctodb->where('pay.Remitance', 0);
            $this->ctodb->where('pay.Accountable_form_origin', $this->Type);
            $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
            $query = $this->ctodb->get()->result();

            foreach ($query as $key => $value) {
                $result =  $this->get_paid_particulars($value->Accountable_form_number);
                $query[$key]->ParticularPaid = $result;
            }

            return $query;
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function summary_list()
    {
        try {
            $UniqueData = array();
            $BusTaxData = array();
            $x = array();
            $Summary = array();

            foreach ($this->SumData as $key => $value) {
                foreach ($value->ParticularPaid as $idx => $IdxValue) {
                    // if($IdxValue->Particular != "BUSINESS TAX"){
                    //     array_push($UniqueData, $IdxValue->Particular_ID);
                    // } else{
                    //     // array_push($BusTaxData, $IdxValue->Bus_tax_particular);
                    //     // $x = "";
                    //     // if (strpos(strtoupper($IdxValue->Bus_tax_particular), 'BUSINESS TAX FOR RETAILER') !== false) {
                    //     //     // $x = "BUSINESS TAX FOR RETAILER";
                    //     //     array_push($UniqueData, $IdxValue->Bus_tax_particular);
                    //     //     // array_push($UniqueData, $x);
                    //     // }else{
                    //     //      array_push($UniqueData, $IdxValue->Bus_tax_particular);
                    //     // }
                    //     array_push($UniqueData, $IdxValue->Bus_tax_particular);
                    // }
                    array_push($UniqueData, $IdxValue->Bus_tax_particular);
                    
                }
            }

            $Response = array_unique($UniqueData);
            $Length = count($this->SumData);
            foreach ($Response as $key => $value) {

                $Result = $this->get_summary($value, $this->SumData[0]->Accountable_form_number, $this->SumData[$Length - 1]->Accountable_form_number);
                $data = array(
                    'Name' => $value,
                    'Amount' => $Result
                );
                array_push($Summary, $data);
            }

            return $Summary;
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function get_summary($value, $OrNumberF, $OrNumberS)
    {
        try {
            $this->ctodb->select(
                'pp.Amount,'
            );

            $this->ctodb->from($this->table['part_paid'] . ' pp', 'left');
            $this->ctodb->join($this->table['particular'] . ' pa', 'pa.ID = pp.Particular_ID', 'left');
            $this->ctodb->join($this->table['payment'] . ' py', 'py.Accountable_form_number = pp.Accountable_form_number', 'left');
            $this->ctodb->where('py.Accountable_form_number >=', $OrNumberF);
            $this->ctodb->where('py.Accountable_form_number <=', $OrNumberS);
            // $this->ctodb->where('pa.Particular !=', "BUSINESS TAX");
            // $this->ctodb->like('pp.Bus_tax_particular', $value); // Angelo 6/27/23
            $this->ctodb->where('pp.Bus_tax_particular', $value); // Angelo 6/27/23
            // $this->ctodb->or_where('pa.ID', $value);
            $this->ctodb->where('py.Cancelled', 0);
            $this->ctodb->where('py.Collector_ID', $_SESSION['User_details']->ID);
            $this->ctodb->where('py.Remitance', 0);
            $query = $this->ctodb->get()->result();

            $Amount = 0;
            foreach ($query as $key => $value) {
                $Amount += $value->Amount;
            }

            return $Amount;
     
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function get_paid_particulars($Accountable)
    {
        try {
            if(empty($this->ReportType)){
                $this->ctodb->select(
                    'part.Amount, ' .
                        'par.Particular, ' .
                    'part.Particular_ID, ' .
                    'part.Bus_tax_particular'
                );
    
                $this->ctodb->from($this->table['part_paid'] . ' part');
                $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
                $this->ctodb->where('part.Accountable_form_number', $Accountable);
                $query = $this->ctodb->get()->result();
            }else{
                $this->ctodb->select(
                    'part.Amount, ' .
                        'par.Particular, ' .
                    'part.Particular_ID, '.
                    'part.Bus_tax_particular'
                );
    
                $this->ctodb->from($this->table['part_paid'] . ' part');
                $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
                $this->ctodb->where('part.Accountable_form_number', $Accountable);
                $this->ctodb->where('par.Collection_type', $this->ReportType);
                $query = $this->ctodb->get()->result();
            }
            

            return $query;
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }


    /** Get Non Cash Data */
    function get_non_cash()
    {
        $this->ctodb->select(
            'pp.Amount'
        );
        $this->ctodb->from($this->table['payment'] . ' p');
        $this->ctodb->join($this->table['part_paid'] . ' pp', 'p.Accountable_form_number = pp.Accountable_form_number', 'left');
        $this->ctodb->where('p.Cheque', 1);
        $this->ctodb->where('p.Remitance', 0);
        $this->ctodb->where('p.Accountable_form_number >=', $this->StartOr);
        $this->ctodb->where('p.Accountable_form_number <=', $this->EndOr);
        $this->ctodb->where('p.Collector_ID', $_SESSION['User_details']->ID);
        $this->ctodb->where('p.Accountable_form_origin', $this->Type);
        $query = $this->ctodb->get()->result();

        if (!empty($query)) {
            $Total = 0;
            foreach ($query as $key => $value) {
                $Total += $value->Amount;
            }
            return $Total;
        } else {
            return false;
        }
    }

    /** get cheque data */
    function get_cheque()
    {
        $this->ctodb->select(
            'c.Check_amount as Amount, ' .
                'c.Bank_name, ' .
                'c.Check_date, ' .
                'c.Check_no'
        );

        $this->ctodb->from($this->table['cheque'] . ' c');
        $this->ctodb->join($this->table['payment'] . ' p', 'c.Payment_ID = p.ID', 'left');
        // $this->ctodb->join($this->table['part_paid'] . ' pp', 'p.Accountable_form_number = pp.Accountable_form_number', 'left');
        
        // $this->ctodb->from($this->table['payment'] . ' p');
        // $this->ctodb->join($this->table['part_paid'] . ' pp', 'p.Accountable_form_number = pp.Accountable_form_number', 'left');
        // $this->ctodb->join($this->table['cheque'] . ' c', 'c.Payment_ID = p.ID', 'left');
        $this->ctodb->where('p.Cheque', 1);
        $this->ctodb->where('p.Remitance', 0);
        $this->ctodb->where('p.Collector_ID', $_SESSION['User_details']->ID);
        $this->ctodb->where('p.Accountable_form_origin', $this->Type);
        $query = $this->ctodb->get()->result();

        if (!empty($query)) {
            return $query;
        } else {
            return false;
        }
    }

    /** get all collectibles per collector */
    public function getAllCollectible()
    {
        try {
            if ($this->Type == "51") {
                $ArrayDataCollection = [];

                $this->ctodb->select('ac.Start_OR, ' . 'ac.End_OR, ' . 'ac.OR_for');
                $this->ctodb->order_by('ac.ID', 'asc');
                $this->ctodb->from($this->table['accountable'] . ' ac');
                $this->ctodb->where('ac.Remittance', 0);
                $this->ctodb->where('ac.Active', 1);
                $this->ctodb->where('ac.Collector_ID', $_SESSION['User_details']->ID);
                $response = $this->ctodb->get()->result();

                foreach ($response as $value) {
                    $this->ctodb->select(
                        'pay.Accountable_form_number, ' .
                            'pay.Accountable_form_origin, ' .
                            'part.Amount'
                    );
                    $this->ctodb->from($this->table['payment'] . ' pay');
                    $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
                    $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
                    $this->ctodb->where('pay.Accountable_form_number >=', $this->StartOr);
                    $this->ctodb->where('pay.Accountable_form_number <=', $this->EndOr);
                    $this->ctodb->where('pay.Remitance', 0);
                    $this->ctodb->where('pay.Cancelled', 0);
                    $this->ctodb->where('par.Collection_type', @$value->OR_for);
                    $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
                    $query = $this->ctodb->get()->result();
                    foreach ($query as $idx => $idxValue) {
                        $query[$idx]->AccountableType =  @$value->OR_for;
                        $query[$idx]->FormNumber =  @$idxValue->Accountable_form_origin;
                    }
                    array_push($ArrayDataCollection, $query);
                }

                return $ArrayDataCollection;
            } else {
                $ArrayDataCollection = [];
                $this->ctodb->select(
                    'pay.Accountable_form_number, ' .
                        'part.Amount'
                );
                $this->ctodb->from($this->table['payment'] . ' pay');
                $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
                $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
                $this->ctodb->where('pay.Accountable_form_number >=', $this->StartOr);
                $this->ctodb->where('pay.Accountable_form_number <=', $this->EndOr);
                $this->ctodb->where('pay.Remitance', 0);
                $this->ctodb->where('pay.Cancelled', 0);
                // $this->ctodb->where('pay.Accountable_form_origin', $this->Data);
                $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
                $query = $this->ctodb->get()->result();
                foreach ($query as $idx => $idxValue) {
                    $query[$idx]->AccountableType = "AF#: ".@$this->Type;
                    $query[$idx]->FormNumber =  @$idxValue->Accountable_form_origin;
                }
                array_push($ArrayDataCollection, $query);
                return $ArrayDataCollection;
            }
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    /** Get first data */
    function get_first_data()
    {
        if ($this->Type == "51") {
            $this->ctodb->select(
                'pay.Accountable_form_number, ' .
                    'part.Amount'
            );
            $this->ctodb->from($this->table['payment'] . ' pay');
            $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
            $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
            $this->ctodb->where('pay.Accountable_form_number >=', $this->StartOr);
            $this->ctodb->where('pay.Accountable_form_number <=', $this->EndOr);
            $this->ctodb->where('pay.Remitance', 0);
            $this->ctodb->where('par.Collection_type', 'general');
            $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
            $query = $this->ctodb->get()->result();
        } else {
            $this->ctodb->select(
                'pay.Accountable_form_number, ' .
                    'part.Amount'
            );
            $this->ctodb->from($this->table['payment'] . ' pay');
            $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
            $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
            $this->ctodb->where('pay.Accountable_form_number >=', $this->StartOr);
            $this->ctodb->where('pay.Accountable_form_number <=', $this->EndOr);
            $this->ctodb->where('pay.Remitance', 0);
            $this->ctodb->where('pay.Accountable_form_origin', $this->Data);
            $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
            $query = $this->ctodb->get()->result();
        }

        return $query;
    }

    /** Get second data */
    function get_second_data()
    {
        $this->ctodb->select(
            'pay.Accountable_form_number ,' .
                'part.Amount'
        );
        $this->ctodb->from($this->table['payment'] . ' pay');
        $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
        $this->ctodb->where('pay.Remitance', 0);
        $this->ctodb->where('par.Collection_type', 'trust');
        $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
        $query = $this->ctodb->get()->result();

        return $query;
    }

    /** get all port collection under the collector */
    public function getPortCollection()
    {
        try {
            $this->ctodb->select(
                'pay.Accountable_form_number ,' .
                    'part.Amount'
            );
            $this->ctodb->from($this->table['payment'] . ' pay');
            $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
            $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
            $this->ctodb->where('pay.Remitance', 0);
            $this->ctodb->where('par.Collection_type', 'port');
            $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
            $query = $this->ctodb->get()->result();

            return $query;
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function get_all_payment()
    {
        try {
            if (empty($this->Type)) {
                throw new Exception("Error Processing Request", 1);
            }

            $this->ctodb->select(
                'pa.ID, ' .
                    'pa.Accountable_form_number, ' .
                    'pa.Date_created'
            );
            $this->ctodb->from($this->table['payment'] . ' pa');
            $this->ctodb->where('pa.Collector_ID', $_SESSION['User_details']->ID);
            $this->ctodb->where('pa.Remitance', 0);
            $query = $this->ctodb->get()->result();

            return $query;
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    // get all forms received by collectors
    public function get_all_forms()
    {
        try {
            $result = $this->get_all_accountable();

            foreach ($result  as $key => $value) {
                $this->ctodb->select(
                    'pay.Accountable_form_number, ' .
                        'part.Amount'
                );
                $this->ctodb->from($this->table['payment'] . ' pay');
                $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
                $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
                $this->ctodb->where('pay.Remitance', 0);
                $this->ctodb->like('par.Collection_type', $value->OR_for);
                $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
                $query = $this->ctodb->get()->result();

                $result[$key]->Form_collection = $query;
            }

            foreach ($result as $idx => $val) {
                foreach ($val->Form_collection as $index => $col) {
                    // var_dump($col->Accountable_form_number);
                }
            }
            
            return $result;
            // var_dump($result);
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    // get all accountable forms
    public function get_all_accountable()
    {
        try {
            $this->ctodb->select(
                'OR_for, ' .
                    'Start_OR ,' .
                    'End_OR, ' .
                    'OR_origin'
            );
            $this->ctodb->order_by('Start_OR', 'asc');
            $this->ctodb->from($this->table['accountable']);
            $this->ctodb->where('Collector_ID', $_SESSION['User_details']->ID);
            $query = $this->ctodb->get()->result();

            return $query;
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    // GET REMITTED REPORTS
    function get_remitted()
    {
        $this->ctodb->select(
            'pay.ID, ' .
                'pay.Accountable_form_number, ' .
                'pay.Date_paid, ' .
                'pay.Payor, ' .
                'pay.Address, ' .
                'part.Amount, ' .
                'par.Particular'
        );
        $this->ctodb->from($this->table['payment'] . ' pay');
        $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');
        $this->ctodb->where('pay.Remitance', 1);
        $this->ctodb->where('pay.Collector_ID', $_SESSION['User_details']->ID);
        $query = $this->ctodb->get()->result();

        return $query;
    }
    // GET VOIDED REPORTS
    function voided()
    {
        $this->ctodb->select(
            'pay.ID, ' .
                'pay.Accountable_form_number, ' .
                'pay.Date_paid, ' .
                'pay.Payor, ' .
                'pay.Address, ' .
                'part.Amount, ' .
                'par.Particular' 


        );
        $this->ctodb->from($this->table['payment'] . ' pay');
        $this->ctodb->join($this->table['part_paid'] . ' part', 'part.Accountable_form_number = pay.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'] . ' par', 'par.ID = part.Particular_ID', 'left');  
        $this->ctodb->where('pay.Cancelled', 1);
        $this->db->where('Collector_ID', $_SESSION['User_details']->ID);
        $query = $this->ctodb->get()->result();

        return $query;
    }
    function get_rpt()
    {
        $this->ctodb->select(
            'col.*, ' .
                'p.Payer AS pname,'
        );
        $this->ctodb->from($this->table['collection'] . ' col');
        $this->ctodb->join($this->table['payer'] . ' p', 'p.ID = col.Payer_ID', 'left');
        $this->ctodb->group_by('col.Control_no');
        $this->ctodb->where('col.Cancelled',0);
        $query = $this->ctodb->get()->result();

        return $query;
    }
    // get data in two database and servers
    function get_two_data()
    {
        $result_one = $this->get_in_first_db();
        $result_two = $this->get_in_second_db();

        foreach ($result_one as  $value_one) {
            foreach ($result_two as  $value_two) {
            }
        }
        echo json_encode($result_two);
    }

    function get_in_first_db()
    {
        $this->ctodb->from($this->table['payment'] . ' p');
        $query = $this->ctodb->get()->result();
        return $query;
    }

    function get_in_second_db()
    {
        $otherdb = $this->load->database('otherdb', TRUE);

        $otherdb->select(
            'ap.Business_name, ' .
                'cl.Fee, ' .
                'col.OR_number'
        );
        $otherdb->from('tbl_collection' . ' col');
        $otherdb->join('tbl_collection_items' . ' cl', 'col.OR_number = cl.OR_number', 'left');
        $otherdb->join('tbl_cycle' . ' c', 'c.ID = col.Cycle_ID', 'left');
        $otherdb->join('tbl_application_form' . ' ap', 'ap.ID = c.Application_ID', 'left');
        $query = $otherdb->get()->result();
        return $query;
    }

    function get_officer_form()
    {
        $this->ctodb->select(
            'a.OR_for, ' .
                'a.Start_OR, ' .
                'a.End_OR, ' .
                'a.OR_origin, ' .
                'a.Collector_ID'
        );
        $this->ctodb->order_by('ID', 'asc');
        $this->ctodb->from($this->table['accountable'] . ' a');
        $this->ctodb->where('a.Collector_ID', $_SESSION['User_details']->ID);
        $this->ctodb->where('a.OR_for !=', 'RealProperty');
        $this->ctodb->where('a.Done', 0);
        // $this->ctodb->where('a.OR_origin', '51');
        $this->ctodb->where('a.OR_origin', $this->Type);
        $query = $this->ctodb->get()->result();

        foreach ($query as $key => $value) {
            $indiNumber = $this->get_collector_individual_number($value->Start_OR, $value->End_OR, $value->Collector_ID, $value->OR_origin);
            $query[$key]->Inclusive = $indiNumber;
            
        }

        foreach ($query as $idx => $index) {
            $number = count($index->Inclusive);
            
            $query[$idx]->BeginForm = $index->OR_origin;
            // $query[$idx]->BeginQty =   (($index->End_OR - ($index->Inclusive[0]->Accountable_form_number)) + 1);
            // $query[$idx]->StartFrom = ($index->Inclusive[0]->Accountable_form_number);
            

            // $query[$idx]->IncQty = $number;
            // $query[$idx]->IncFrom = ($index->Inclusive[0]->Accountable_form_number);
            // $query[$idx]->IncTo = ($index->Inclusive[$number - 1]->Accountable_form_number);
            
            // $query[$idx]->EndingQty = ($index->End_OR) - ($index->Inclusive[$number - 1]->Accountable_form_number);
            // $query[$idx]->EndingFrom = str_pad((($index->Inclusive[$number - 1]->Accountable_form_number + 1)), 7, "0000000", STR_PAD_LEFT);
            // $query[$idx]->EndingTo = $index->End_OR;

            // $query[$idx]->Remitance = ($index->Inclusive[$number - 1]->Remitance);

            $query[$idx]->BeginQty = (($index->End_OR + 1) - $index->Start_OR);
            
            if (!empty($index->Inclusive)) {
                $query[$idx]->StartFrom = ($index->Inclusive[0]->Accountable_form_number);
                $query[$idx]->BeginQty =   ($index->End_OR - ($index->Inclusive[0]->Accountable_form_number)) + 1;
                $query[$idx]->IncQty = $number;
                $query[$idx]->IncFrom = ($index->Inclusive[0]->Accountable_form_number);
                $query[$idx]->IncTo = ($index->Inclusive[$number - 1]->Accountable_form_number);
                
                $query[$idx]->EndingQty = ($index->End_OR) - ($index->Inclusive[$number - 1]->Accountable_form_number);
                $query[$idx]->EndingFrom = str_pad((($index->Inclusive[$number - 1]->Accountable_form_number + 1)), 7, "0000000", STR_PAD_LEFT);
                $query[$idx]->EndingTo = $index->End_OR;
            } else {
                $query[$idx]->StartFrom = $index->Start_OR;
                $query[$idx]->BeginQty = (($index->End_OR + 1) - $index->Start_OR);
                $query[$idx]->EndingQty = (($index->End_OR + 1) - $index->Start_OR);
                $query[$idx]->EndingFrom = $index->Start_OR;
                $query[$idx]->EndingTo = $index->End_OR;
            }

        }
        if (!empty($query)) {
            return $query;
        } else {
            return false;
        }
    }

    public function get_collector_individual_number($start = '', $end = '', $CollectorID = '', $Origin = '')
    {
        try {
            $this->ctodb->select(
                'pm.Accountable_form_number,'.
                'pm.Remitance'
            );
            $this->ctodb->from($this->table['payment'] . ' pm');
            $this->ctodb->where('pm.Collector_ID', $CollectorID);
            $this->ctodb->where('pm.Accountable_form_origin', $Origin);
            $this->ctodb->where('pm.Accountable_form_number >=', $start);
            $this->ctodb->where('pm.Accountable_form_number <=', $end);
            $this->ctodb->where('pm.Remitance', 0);
            $query = $this->ctodb->get()->result();

            return $query;
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }


    function get_individual_form($OrFor)
    {
        $this->ctodb->select(
            'acct.Start_OR, ' .
                'acct.End_OR'
        );
        $this->ctodb->from($this->table['accountable'] . ' acct');
        $this->ctodb->where('acct.OR_For', $OrFor);
        $this->ctodb->where('acct.Collector_ID', $_SESSION['User_details']->ID);
        $this->ctodb->where('acct.Done', 0);
        $query = $this->ctodb->get()->row();

        return $query;
    }

    function get_individual_number($value)
    {
        $this->ctodb->select(
            'p.Collection_type, ' .
                'pm.Accountable_form_number'
        );
        $this->ctodb->from($this->table['payment'] . ' pm');
        $this->ctodb->join($this->table['part_paid'] . ' pp', 'pp.Accountable_form_number = pm.Accountable_form_number', 'left');
        $this->ctodb->join($this->table['particular'] . ' p', 'p.ID = pp.Particular_ID', 'left');
        $this->ctodb->like('p.Collection_type', $value);
        $this->ctodb->where('pm.Remitance', 0);
        $this->ctodb->where('pm.Collector_ID', $_SESSION['User_details']->ID);
        $this->ctodb->distinct();
        $query = $this->ctodb->get()->result();

        return $query;
    }

    // get data of voided receipt
    public function get_voided_receipt()
    {
        try {
            if (!empty($this->ID)) {
                $this->ctodb->select(
                    'p.ID, ' .
                        'p.Accountable_form_number, ' .
                        'p.Date_created, ' .
                        'p.Payor, ' .
                        'p.Paid_by, ' .
                        'p.Address, ' .
                        'p.Cash, ' .
                        'p.Collector, ' .
                        'p.Cheque, ' .
                        'c.Bank_name, ' .
                        'c.Check_no, ' .
                        'c.Check_date'
                );
                $this->ctodb->from($this->table['payment'] . ' p');
                $this->ctodb->join($this->table['cheque'] . ' c', 'c.Payment_ID = p.ID', 'left');

                $this->ctodb->where('p.ID', $this->ID);
                $this->ctodb->where('p.Cancelled', 1);
                $query = $this->ctodb->get()->row();
                if (!empty($query)) {
                    $result = $this->get_particular_paid_type($query->Accountable_form_number);
                    $query->Particulars = $result;
                    // var_dump($query);
                    return $query;
                } else {
                    throw new Exception('Empty Response');
                }
            } else {
                throw new Exception("Error missing client ID", true);
            }
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }
     // get data of rpt receipt
     public function get_rpt_receipt()
     {
         try {
             if (!empty($this->Control_no)) {
                 $this->ctodb->select(
                    'col.*, ' .
                    'p.Payer AS pname,'
                 );
                 $this->ctodb->from($this->table['collection'] . ' col');
                 $this->ctodb->join($this->table['payer'] . ' p', 'p.ID = col.Payer_ID', 'left');
                 $this->ctodb->where('col.Control_no', $this->Control_no);
                 $query = $this->ctodb->get()->result();
                 
                 return $query;
                //  var_dump($query);
                //  if (!empty($query)) {
                //      $result = $this->get_particular_paid_type($query->Accountable_form_number);
                //      $query->Particulars = $result;
                //      // var_dump($query);
                //      return $query;
                //  } else {
                //      throw new Exception('Empty Response');
                //  }
             } else {
                 throw new Exception("Error missing client ID", true);
             }
         } catch (Exception $msg) {
             echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
         }
     }

    function get_particular_paid_type($or_number)
    {
        try {
            if (empty($or_number)) {
                throw new Exception('Erro OR number is missing', true);
            } else {
                $this->ctodb->select(
                    'p.ID, ' .
                        'p.Amount, ' .
                        'p.Accountable_form_number, ' .
                        'pp.Particular'
                );
                $this->ctodb->from($this->table['part_paid'] . ' p');
                $this->ctodb->join($this->table['particular'] . ' pp', 'pp.ID = p.Particular_ID', 'left');
                $this->ctodb->where('p.Accountable_form_number', $or_number);
                $query = $this->ctodb->get()->result();

                return $query;
            }
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function get_or_type()
    {
        try {
            $this->ctodb->select('*');
            $this->ctodb->from($this->table['orType']);
            $response = $this->ctodb->get()->result();

            return $response;
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function get_records()
    {
        try {
            $this->ctodb->select('rs.*');
            $this->ctodb->order_by('rs.ID', 'desc');
            $this->ctodb->from($this->table['remitSched'] . ' rs');
            $this->ctodb->where('rs.Collector_ID', $_SESSION['User_details']->ID);
            $Response = $this->ctodb->get()->result();

            return $Response;
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function get_remit_records()
    {
        try {
            $this->ctodb->select(
                'p.ID, ' .
                'p.Accountable_form_number, ' .
                'p.Accountable_form_origin, ' .
                'p.Date_paid, ' .
                'p.Payor, ' .
                'p.Address, ' .
                'p.Quantity,'.
                'p.Cancelled,'.
                'part.Particular,'.
                'pp.Amount,'.
                'pp.Particular_ID,'.
                'pp.Bus_tax_particular,'.
                'p.Accountable_form_origin'
            );
            $this->ctodb->from($this->table['payment'] . ' p');
            $this->ctodb->join($this->table['part_paid'] . ' pp', 'pp.Accountable_form_number = p.Accountable_form_number', 'left');
            $this->ctodb->join($this->table['particular'] . ' part', 'part.ID = pp.particular_ID', 'left');
            $this->ctodb->where('p.Remit_number', $this->remit_number);
            $query = $this->ctodb->get()->result();


            return $query;
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function get_remit_records_summary()
    {
        try {
            $this->ctodb->select(
                'p.ID, ' .
                'p.Accountable_form_number, ' .
                'p.Accountable_form_origin, ' .
                'p.Date_paid, ' .
                'p.Payor, ' .
                'p.Address, ' .
                'p.Quantity,'.
                'p.Cancelled,'.
                'part.Particular,'.
                'pp.Amount,'.
                'pp.Particular_ID,'.
                'pp.Bus_tax_particular'
            );
            $this->ctodb->from($this->table['payment'] . ' p');
            $this->ctodb->join($this->table['part_paid'] . ' pp', 'pp.Accountable_form_number = p.Accountable_form_number', 'left');
            $this->ctodb->join($this->table['particular'] . ' part', 'part.ID = pp.particular_ID', 'left');
            $this->ctodb->where('p.Remit_number', $this->remit_number);
            $this->ctodb->where('p.Cancelled', 0);
            $query = $this->ctodb->get()->result();
            
            $UniqueData = array();
            $x = array();
            $Summary = array();

            foreach($query as $key => $value){
                if($value->Particular != "BUSINESS TAX"){
                    // added rtrim angelo 4/25/23
                    array_push($UniqueData, rtrim($value->Particular));
                } else{
                    // added rtrim angelo 4/25/23
                    array_push($UniqueData, rtrim($value->Bus_tax_particular));
                }
                
            }

            $Response = array_unique($UniqueData);
          
            foreach ($Response as $key => $value) {
                $x;
                $Result = $this->get_remit_records_summary_amount_bt($value, $this->remit_number);

                if($Result == 0){
                    $x = $this->get_remit_records_summary_amount($value, $this->remit_number);
                } else {
                    $x = $this->get_remit_records_summary_amount_bt($value, $this->remit_number);
                }
                $data = array(
                    'Name' => $value,
                    'Amount' => $x
                );
                array_push($Summary, $data);
            }

            return $Summary;
        } catch (Exception $msg) {
            echo json_encode(array('error_message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function get_remit_records_summary_amount($value, $remit_number)
    {
        try {
            $this->ctodb->select(
                'pp.Amount,'
            );

            $this->ctodb->from($this->table['part_paid'] . ' pp', 'left');
            $this->ctodb->join($this->table['particular'] . ' pa', 'pa.ID = pp.Particular_ID', 'left');
            $this->ctodb->join($this->table['payment'] . ' py', 'py.Accountable_form_number = pp.Accountable_form_number', 'left');
            $this->ctodb->where('py.Remit_number', $remit_number);
            // $this->ctodb->where('pp.Bus_tax_particular', $value);
            $this->ctodb->where('pa.Particular', $value);
            $this->ctodb->where('py.Cancelled', 0);
            $this->ctodb->where('py.Collector_ID', $_SESSION['User_details']->ID);
            $this->ctodb->where('py.Remitance', 1);
            $query = $this->ctodb->get()->result();

            $Amount = 0;
            foreach ($query as $key => $value) {
                $Amount += $value->Amount;
            }

            return $Amount;
     
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function get_remit_records_summary_amount_bt($value, $remit_number)
    {
        try {
            $this->ctodb->select(
                'pp.Amount,'
            );

            $this->ctodb->from($this->table['part_paid'] . ' pp', 'left');
            $this->ctodb->join($this->table['particular'] . ' pa', 'pa.ID = pp.Particular_ID', 'left');
            $this->ctodb->join($this->table['payment'] . ' py', 'py.Accountable_form_number = pp.Accountable_form_number', 'left');
            $this->ctodb->where('py.Remit_number', $remit_number);
            $this->ctodb->where('pp.Bus_tax_particular', $value);
            // $this->ctodb->where('pa.Particular', $value);
            $this->ctodb->where('py.Cancelled', 0);
            $this->ctodb->where('py.Collector_ID', $_SESSION['User_details']->ID);
            $this->ctodb->where('py.Remitance', 1);
            $query = $this->ctodb->get()->result();

            $Amount = 0;
            foreach ($query as $key => $value) {
                $Amount += $value->Amount;
            }

            return $Amount;
     
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function get_record_coltype()
    {
        try {
            $this->ctodb->select( '*');
            $this->ctodb->from($this->table['payment']);
            $this->ctodb->where('Remit_number', $this->remit_number);
            $query = $this->ctodb->get()->row();

            return $query;
     
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }

    public function get_record_reporttype()
    {
        try {
            $this->ctodb->select(
                'r.OR_for'
        
            );
            $this->ctodb->from($this->table['remitSched'] . ' r');
            $this->ctodb->where('r.Remittance_no', $this->remit_number);
            $query = $this->ctodb->get()->row();

            return $query;
     
        } catch (Exception $ex) {
            echo json_encode(array('error_message' => $ex->getMessage(), 'has_error' => true));
        }
    }
}
