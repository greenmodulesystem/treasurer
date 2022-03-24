<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treasurers extends CI_Controller
{
    // ------------------------------------ MODELS LIST ------------------------------------ //
    public function __construct()
    {
        parent::__construct();
        unset($_SESSION['User_details_retype_password']);
        unset($_SESSION['User_modules_retype_password']);
        $model_list = [
            'treasurers/Profiles_Model' => 'MProfiles',
            'treasurers/Payables_Model' => 'MPayables',
            'treasurers/Payments_Model' => 'MPayments',
            'treasurers/Authenticated_Model' => 'MAuthenticated',
            'treasurers/Void_Model' => 'MVoid',
            'treasurers/Abstract_Model' => 'MAbstract',
            /* ---------------- 02-19-2020 ---------------- */
            'treasurers/Assessment_Model' => 'MAssessment',
            'treasurers/Billing_Model' => 'MBilling',
            'treasurers/Collection_Model' => 'MCollection',
            /* ---------------- 02-19-2020 ---------------- */
            'general_collection/General_collection_Model' => 'genModel'
        ];
        $this->load->model($model_list);
    }
    // ------------------------------------ MODELS LIST ------------------------------------ //

    public function applicant($ID)
    {
        $this->data['content'] = "applicant";
        $this->data['profiles'] = $this->MProfiles->get_profile($ID);
        $this->load->view('layout', $this->data);
    }

    public function applicant_history($ID)
    {
        $this->data['content'] = "applicant_history";
        $this->data['profiles'] = $this->MProfiles->get_profile($ID);
        $this->data['history'] = $this->MPayments->payment_history($ID);
        $this->data['voided'] = $this->MPayments->void_receipts($ID);
        $this->load->view('layout', $this->data);
    }

    public function applicant_payables($ID)
    {
        $this->data['content'] = "applicant_payables";

        $this->data['assessment'] = $this->MPayables->assessment($ID);
        if ($this->data['assessment'] != null) {
            $a_ID = $this->data['assessment']->ID;
            $this->data['fees'] = $this->MPayables->assessment_fees($a_ID, $ID);
        }

        /** generation of accountable form numbers */
        $this->data['Type'] = $this->genModel->get_or_type();
        $this->genModel->Origin = @$this->data['Type']->OR_origin;
        if (!empty($this->data['Type'])) {
            $validity = $this->genModel->check_validity($this->data['Type']->Accountable_form_number);
            // $same = $this->genModel->check_same_or($this->data['Type']->Accountable_form_number);
        }
        if (!empty($this->data['Type'])) {
            if (!empty($validity) || $this->data['Type']->Accountable_form_number === '') {
                $this->data['check_validity'] = 1;
            } else {
                $this->data['check_validity'] = 0;
            }
        }
        /** generation of accountable form numbers */

        $this->data['bill_fees'] = $this->MPayables->billing_fees($a_ID);

        $this->data['profiles'] = $this->MProfiles->get_profile($ID);
        $this->data['banks'] = $this->MProfiles->banks();

        // $this->data['Checker'] = $this->MCollection->get_report_by_day();
        // $this->data['Result'] = $this->MCollection->get_report_by_day();

        $this->load->view('layout', $this->data);
    }

    public function applicant_search()
    {

        $this->data['content'] = "applicant_search";
        $this->load->view('layout', $this->data);
    }

    public function applicant_search_results()
    {
        $search = $_POST['search'];
        if ($search != null) {
            $this->data['content'] = "applicant_search_results";
            $this->data['result'] = $this->MProfiles->search($search);
            $this->load->view('layout', $this->data);
        }
    }

    public function collection()
    {
        $this->data['content'] = "collection";
        $this->load->view('layout', $this->data);
    }

    public function collection_default()
    {
        $user =  $_SESSION['User_details'];
        $rcvr = $user->First_name . " " . $user->Middle_name[0] . ". " . $user->Last_name;
        $this->data['content'] = "collection_filter";
        $this->data['amounts'] = $this->MPayments->collection($rcvr);
        $this->load->view('layout', $this->data);
    }

    public function collection_filter()
    {
        $user =  $_SESSION['User_details'];
        $rcvr = $user->First_name . " " . $user->Middle_name[0] . ". " . $user->Last_name;

        $from = $_POST['from'];
        $to = $_POST['to'];

        $this->data['content'] = "collection_filter";
        $this->data['amounts'] = $this->MPayments->collection($rcvr, $from, $to);
        $this->load->view('layout', $this->data);
    }

    /* ------------------------------------------ 02-18-2020 ------------------------------------------ */
    public function abstract()
    {
        $this->data['content'] = "abstract";
        $this->load->view('layout', $this->data);
    }

    public function abstract_default()
    {
        $user =  $_SESSION['User_details'];
        $rcvr = $user->First_name . " " . $user->Middle_name[0] . ". " . $user->Last_name;
        $this->data['content'] = "abstract_filter";
        $this->data['amounts'] = $this->MAbstract->abstract($rcvr);
        $this->data['summary'] = $this->MAbstract->abstract_summary($rcvr);
        $this->load->view('layout', $this->data);
        // echo json_encode($this->data['summary']);
    }

    public function abstract_filter()
    {
        $user =  $_SESSION['User_details'];
        $rcvr = $user->First_name . " " . $user->Middle_name[0] . ". " . $user->Last_name;

        $date = $_POST['search'];

        $this->data['content'] = "abstract_filter";
        $this->data['amounts'] = $this->MAbstract->abstract($rcvr, $date);
        $this->data['summary'] = $this->MAbstract->abstract_summary($rcvr, $date);
        $this->load->view('layout', $this->data);
    }

    public function collection_export()
    {
        $object = new PHPExcel();

        $column = 0;
        $excel_row = 3;
        $object->setActiveSheetIndex(0);
        $sheet = $object->getActiveSheet();

        $user =  $_SESSION['User_details'];
        $rcvr = $user->First_name . " " . $user->Middle_name[0] . ". " . $user->Last_name;

        $from = $_POST['from_val'];
        $to = $_POST['to_val'];
        $amounts = $this->MPayments->collection($rcvr, $from, $to);

        $table_columns = array(
            "Business Name",
            "OR Number",
            "Date Paid",
            "Cash Amount",
            "Check Amount",
            "Amount Paid"
        );

        $object->getActiveSheet()->setCellValueByColumnAndRow('A', 1, 'COLLECTION BY: ' . $rcvr);

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 2, $field);
            $column++;
        }

        $cash = 0;
        $check = 0;
        $total = 0;

        foreach ($amounts as $key => $item1) {
            $cash_amount = $item1->Amount_paid - $item1->Check_amount >= 0 ? $item1->Amount_paid - $item1->Check_amount : 0;
            $cash += $cash_amount;
            $check += $item1->Check_amount;
            $total += $item1->Amount_paid;

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $item1->Business_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $item1->OR_number);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $item1->Date_paid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $cash_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $item1->Check_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $item1->Amount_paid);

            $excel_row++;
        }
        $row = $object->setActiveSheetIndex(0)->getHighestRow() + 1;
        $row2 = $object->setActiveSheetIndex(0)->getHighestRow() + 2;
        $object->getActiveSheet()->setCellValue('C' . $row, 'Subtotal:');
        $object->getActiveSheet()->setCellValue('D' . $row, $cash);
        $object->getActiveSheet()->setCellValue('E' . $row, $check);
        $object->getActiveSheet()->setCellValue('F' . $row, $total);
        $object->getActiveSheet()->setCellValue('E' . $row2, 'TOTAL:');
        $object->getActiveSheet()->setCellValue('F' . $row2, $total);

        $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(true);

        foreach ($cellIterator as $cell) {
            $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="COLLECTION REPORT ' . date('Y-m-d') . '.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $object_writer->save('php://output');
    }

    public function abstract_export()
    {
        $user =  $_SESSION['User_details'];
        $rcvr = $user->First_name . " " . $user->Middle_name[0] . ". " . $user->Last_name;

        $date = $_POST['date_val'];

        if (empty($date)) {
            redirect(base_url() . 'treasurers/abstract');
            return false;
        }

        $abstract = $this->MAbstract->abstract($rcvr, $date);
        $abstract_summary = $this->MAbstract->abstract_summary($rcvr, $date);

        $this->load->library("excel");

        $objPHPExcel = PHPExcel_IOFactory::load("assets/export_template/abstract.xlsx");

        $excel_row_start = 10;
        $get_total_amount = 0;

        $objPHPExcel->getActiveSheet()->SetCellValue('I5', '');
        $objPHPExcel->getActiveSheet()->getStyle("I6")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->SetCellValue('I6', date("F j, Y "));


        foreach ($abstract as $key => $item) {

            $group_by_OR_number = ($abstract[$key]->OR_number != $abstract[$key - 1]->OR_number) ? $item->OR_number : "";
            $group_by_Date_paid = ($key == 0) ? date('Y-m-d', strtotime($item->Date_paid)) : "";



            // $objPHPExcel->getActiveSheet()->getRowDimension(10)->setRowHeight(-1);

            $objPHPExcel->getActiveSheet()->getStyle("D" . ($excel_row_start) . ":E" . $objPHPExcel->getActiveSheet()->getHighestRow())
                ->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->getStyle("F" . ($excel_row_start) . ":H" . $objPHPExcel->getActiveSheet()->getHighestRow())
                ->getAlignment()->setWrapText(true);

            $objPHPExcel->getActiveSheet()->mergeCells("F" . ($excel_row_start) . ":H" . ($excel_row_start));


            // $objPHPExcel->getActiveSheet()->mergeCells("D".($excel_row_start).":E".($excel_row_start));

            $objPHPExcel->getActiveSheet()->mergeCells("A" . ($excel_row_start) . ":B" . ($excel_row_start));

            $objPHPExcel->getActiveSheet()->mergeCells("I" . ($excel_row_start) . ":J" . ($excel_row_start));

            $objPHPExcel->getActiveSheet()->getStyle("I" . ($excel_row_start) . ":J" . ($excel_row_start))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(0, $excel_row_start, $group_by_OR_number);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(2, $excel_row_start, $group_by_Date_paid);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(3, $excel_row_start, strtoupper($item->Business_name));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(5, $excel_row_start, strtoupper($item->Fee));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(8, $excel_row_start, number_format($item->Amount, 2));




            $excel_row_start++;
            $get_total_amount += $item->Amount;
        }

        $last_row = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow() + 1;



        $Total_StyleArray = array(
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $objPHPExcel->getActiveSheet()->mergeCells("H" . ($last_row) . ":J" . ($last_row));

        $objPHPExcel->getActiveSheet()->getStyle('G' . ($last_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()->getStyle("H" . ($last_row) . ":J" . ($last_row))->applyFromArray($Total_StyleArray);

        $objPHPExcel->getActiveSheet()->getStyle('G' . ($last_row))->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('H' . ($last_row))->getFont()->setBold(true);

        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $last_row, 'TOTAL :');
        $objPHPExcel->getActiveSheet()->getStyle('H' . ($last_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $last_row, number_format($get_total_amount, 2));


        $last_row += 2; // Start row of fund summary header
        $objPHPExcel->getActiveSheet()->getStyle('A' . ($last_row))->getFont()->setBold(true);

        $objPHPExcel->getActiveSheet()->mergeCells("A" . ($last_row) . ":B" . ($last_row));
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $last_row, 'FUND SUMMARY');

        $last_row += 1; // Start row of general
        $objPHPExcel->getActiveSheet()->getStyle('A' . ($last_row))->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->mergeCells("A" . ($last_row) . ":B" . ($last_row));
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $last_row, 'GENERAL');

        $last_row += 1;

        $get_total_amount_fund_summary = 0;

        foreach ($abstract_summary as $key => $item) {

            $objPHPExcel->getActiveSheet()->getStyle('F' . ($last_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->getStyle('F' . ($last_row))->getNumberFormat()->setFormatCode('0.00');

            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(1, $last_row, $item->Fee);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(5, $last_row, number_format($item->Amount, 2));

            $last_row++;
            $get_total_amount_fund_summary += $item->Amount;
        }

        $Fund_Summary_StyleArray = array(
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle("D" . ($last_row) . ":F" . ($last_row))->applyFromArray($Fund_Summary_StyleArray);
        $objPHPExcel->getActiveSheet()->getStyle('F' . ($last_row))->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('F' . ($last_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $last_row, number_format($get_total_amount_fund_summary, 2));

        $last_row += 1;

        $Bottom_StyleArray = array(
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle("A" . ($last_row) . ":J" . ($last_row))->applyFromArray($Bottom_StyleArray);

        $last_row += 2;

        $objPHPExcel->getActiveSheet()->mergeCells("F" . ($last_row) . ":G" . ($last_row));

        $objPHPExcel->getActiveSheet()->getStyle('F' . ($last_row))->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('I' . ($last_row))->getFont()->setBold(true);

        $objPHPExcel->getActiveSheet()->mergeCells("I" . ($last_row) . ":J" . ($last_row));

        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $last_row, "TOTAL COLLECTIONS :");
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $last_row, $get_total_amount_fund_summary);

        $last_row += 2;

        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $last_row, "Collector :");

        $objPHPExcel->getActiveSheet()->mergeCells("G" . ($last_row) . ":I" . ($last_row));
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $last_row, "Liquidating Officer/Treasurer :");

        $last_row += 2;

        $objPHPExcel->getActiveSheet()->mergeCells("B" . ($last_row) . ":D" . ($last_row));
        $objPHPExcel->getActiveSheet()->mergeCells("G" . ($last_row) . ":I" . ($last_row));
        $objPHPExcel->getActiveSheet()->getStyle('B' . ($last_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B' . ($last_row))->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $last_row, $rcvr);

        $objPHPExcel->getActiveSheet()->getStyle('G' . ($last_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()->getStyle('G' . ($last_row))->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $last_row, "");

        $last_row += 1;

        $Bottom_personnel_StyleArray = array(
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );

        $objPHPExcel->getActiveSheet()->mergeCells("B" . ($last_row) . ":D" . ($last_row));
        $objPHPExcel->getActiveSheet()->mergeCells("G" . ($last_row) . ":I" . ($last_row));
        $objPHPExcel->getActiveSheet()->getStyle("B" . ($last_row) . ":D" . ($last_row))->applyFromArray($Bottom_personnel_StyleArray);

        $objPHPExcel->getActiveSheet()->getStyle('B' . ($last_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $last_row, $user->Position);

        $objPHPExcel->getActiveSheet()->getStyle("G" . ($last_row) . ":I" . ($last_row))->applyFromArray($Bottom_personnel_StyleArray);
        $objPHPExcel->getActiveSheet()->getStyle('G' . ($last_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $last_row, "FISCAL EXAMINER II");

        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);


        $objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.25);
        $objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.258);
        $objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.258);
        $objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.25);

        $object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ABSTRACT ' . date('Y-m-d') . '.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $object_writer->save('php://output');
    }
    /* ------------------------------------------ 02-18-2020 ------------------------------------------ */

    public function view_history($ID, $OR)
    {
        $this->data['content'] = "view_history";
        $this->data['data'] = $this->MPayments->receipt($OR);
        $this->data['items'] = $this->MPayments->receipt_items($OR);
        $this->data['app_ID'] = $this->MProfiles->get_App_ID($ID);
        $this->data['profiles'] = $this->MProfiles->get_profile($this->data['app_ID']);
        $this->data['OR_num'] = $OR;
        $this->data['Cycle_ID'] = $ID; // 01-15-2020
        $this->data['Received_by'] = $this->data['data']->Received_by;
        $this->load->view('layout', $this->data);
    }

    public function void_history($ID, $OR)
    {
        $this->data['content'] = "void_history";
        $this->data['data'] = $this->MVoid->receipt($OR);
        $this->data['items'] = $this->MVoid->receipt_items($OR);
        $this->data['app_ID'] = $this->MProfiles->get_App_ID($ID);
        $this->data['profiles'] = $this->MProfiles->get_profile($this->data['app_ID']);
        $this->load->view('layout', $this->data);
    }

    public function individual_history()
    {
        $this->data['content'] = "individual_history";
        $this->data['history'] = $this->MPayments->payment_history($ID = 0);
        $this->load->view('layout', $this->data);
    }

    public function individual_payables()
    {
        $this->data['content'] = "individual_payables";
        $this->data['items'] = $this->MPayables->items();
        $this->load->view('layout', $this->data);
    }

    /* ------------------------------------------ 02-19-2020 ------------------------------------------ */
    public function view_assessment($ID, $a_ID = '')
    {
        $this->data['content'] = "view_assessment";
        $this->data['profiles'] = $this->MProfiles->get_profile($ID);
        $this->data['assessment'] = $this->MAssessment->assessment($ID);
        $this->data['fees'] = $this->MAssessment->assessment_fees2($a_ID, $ID);
        $this->data['bill_fees'] = $this->MBilling->billing_fees($a_ID);
        $this->data['collection'] = $this->MBilling->collection($ID);
        $this->load->view('layout', $this->data);
        // echo json_encode($this->data['profiles']);
    }
    /* ------------------------------------------ 02-19-2020 ------------------------------------------ */

    // --------------------------------- GENERAL FUNCTIONS --------------------------------- //
    public function add_item()
    {
        if ($_POST['Quantity'] === '') {
            $Quantity = 1;
        } else {
            $Quantity = $_POST['Quantity'];
        }
        $item = array(
            "Payee_ID" => $_POST['Payee_ID'],
            "Pay_for" => $_POST['Pay_for'],
            "Quantity" => $Quantity
        );
        if (empty($_POST['ID'])) {
            $this->MPayables->add($item);
        }
    }

    public function delete_payables()
    {
        $this->MPayables->delete_items();
    }

    public function receive_payment()
    {
        date_default_timezone_set('Asia/Manila');
        $user =  $_SESSION['User_details'];
        $data = array(
            "Business_tax" => round($_POST['Business_tax'], 2),
            "Regulatory_fee" => round($_POST['Regulatory_fee'], 2),
            "Other_charges" => round($_POST['Other_charges'], 2),
            "Amount_paid" => $_POST['Amount_paid'],
            "Received_by" => $user->First_name . " " . $user->Middle_name[0] . ". " . $user->Last_name,
            "Position" => $user->Position == '' ? null : $user->Position,
            "Date_paid" => date('Y-m-d', strtotime($_POST['Date_paid'])) . ' ' . date('H:i:s'),
            "OR_number" => $_POST['OR_number'],
            "Bank_name" => $_POST['Bank_name'] == '' ? null : $_POST['Bank_name'],
            "Check_number" => $_POST['Check_number'] == '' ? null : $_POST['Check_number'],
            "Check_date" => $_POST['Check_date'] == '' ? null : date('Y-m-d', strtotime($_POST['Check_date'])),
            "Check_amount" => $_POST['Check_amount'] == '' ? null : $_POST['Check_amount'],
            "Credits" => $_POST['Credits'],
            "Remarks" => $_POST['Remarks'] == '' ? null : $_POST['Remarks'],
        );

        $this->MPayments->payorAddress = $this->input->post('payorAddress', true);
        $this->MPayments->Payor_name = $this->input->post('payorName', true);
        $Fees = $this->MPayables->assessment_fees($_POST['Assessment_ID'], $_POST['Application_ID']);
        $Blines = $this->MProfiles->assessment_lines($_POST['Application_ID']);
        $this->MPayments->save_items($Fees, $_POST['OR_number'], $_POST['Assessment_ID'], $_POST['Qtrs'], $Blines, $_POST['Fully_paid']);

        $this->MPayments->save_receipt($data, $_POST['Application_ID']);
        $this->MPayments->update_fees($_POST['Qtrs'], $_POST['Assessment_ID'], $_POST['Credits']);
    }

    public function print_preview()
    {
        date_default_timezone_set('Asia/Manila');
        $user =  $_SESSION['User_details'];
        $data = array(
            "Amount_paid" => $_POST['Amount_paid'],
            "Received_by" => $user->First_name . " " . $user->Middle_name[0] . ". " . $user->Last_name,
            "Position" => $user->Position == '' ? null : $user->Position,
            "Date_paid" => date('Y-m-d', strtotime($_POST['Date_paid'])),
            "OR_number" => $_POST['OR_number'],
            "Bank_name" => $_POST['Bank_name'] == '' ? null : $_POST['Bank_name'],
            "Check_number" => $_POST['Check_number'] == '' ? null : $_POST['Check_number'],
            "Check_date" => $_POST['Check_date'] == '' ? null : date('Y-m-d', strtotime($_POST['Check_date'])),
            "Check_amount" => $_POST['Check_amount'] == '' ? null : $_POST['Check_amount'],
        );

        $Fees = $this->MPayables->assessment_fees($_POST['Assessment_ID'], $_POST['Application_ID']);
        $Blines = $this->MProfiles->assessment_lines($_POST['Application_ID']);
        $items = $this->MPayments->preview_items($Fees, $_POST['OR_number'], $_POST['Assessment_ID'], $_POST['Qtrs'], $Blines, $_POST['Fully_paid']);

        $result = array(
            "items" => $items,
            "data" => $data,
            "app_ID" => $_POST['Application_ID']
        );

        echo json_encode($result);
    }

    public function remove_item()
    {
        $item = $_POST['Item_ID'];
        $this->MPayables->remove($item);
    }

    // public function print_receipt($ID){
    //     $this->data['content'] = "view_receipt";
    //     $this->data['receipt'] = $this->MPayments->receipt($ID);
    //     $Cycle_ID = $this->data['receipt']->Cycle_ID;
    //     $OR_num = $this->data['receipt']->OR_number;
    //     $App_ID = $this->MProfiles->get_App_ID($Cycle_ID);
    //     $this->data['profiles'] = $this->MProfiles->get_profile($App_ID);
    //     $this->data['items'] = $this->MPayments->get_items($OR_num);
    //     $this->load->view('layout', $this->data);
    // }

    public function print_receipt()
    {
        $this->data['content'] = "view_receipt";
        $this->data['receipt'] = $_POST['data'];
        $this->data['profiles'] = $this->MProfiles->get_profile($_POST['app_ID']);
        $this->data['items'] = $_POST['items'];
        $this->load->view('layout', $this->data);
    }

    public function void_receipt()
    {
        date_default_timezone_set('Asia/Manila');
        $Data = $_POST['data'];
        $cyc_ID = $Data['Cycle_ID'];

        $data = array(
            "Cycle_ID" => $Data['Cycle_ID'],
            "Business_tax" => $Data['Business_tax'],
            "Regulatory_fee" => $Data['Regulatory_fee'],
            "Other_charges" => $Data['Other_charges'],
            "Amount_paid" => $Data['Amount_paid'],
            "Received_by" => $Data['Received_by'],
            "Position" => $Data['Position'] == '' ? null : $Data['Position'],
            "Date_paid" => $Data['Date_paid'],
            "OR_number" => $Data['OR_number'],
            "Bank_name" => $Data['Bank_name'] == '' ? null : $Data['Bank_name'],
            "Check_number" => $Data['Check_number'] == '' ? null : $Data['Check_number'],
            "Check_date" => $Data['Check_date'] == '' ? null : date('Y-m-d', strtotime($Data['Check_date'])),
            "Check_amount" => $Data['Check_amount'] == '' ? null : $Data['Check_amount'],
            "Credits" => $Data['Credits'],
            "Remarks" => $Data['Remarks'] == '' ? null : $Data['Remarks'],
            "Voided_by" => $_POST['Voided_by'],
            "Void_date" => date('Y-m-d H:i:s'),
            "Void_remarks" => $_POST['Remarks'] == '' ? null : $_POST['Remarks']
        );

        $this->MVoid->clone_data($data);
        $this->MVoid->clone_items($_POST['items']);
        $this->MVoid->void_receipt($_POST['OR_number'], $cyc_ID);
    }

    public function authenticate()
    {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $Received_by = $_POST['Received_by'];

        $test = $this->MAuthenticated->authenticate($Username, $Password, $Received_by);

        if ($test != null) {
            echo json_encode($test);
        }
    }

    /* ------------------------------------ 01-15-2020 ------------------------------------ */
    public function check_OR()
    {
        $OR_entry = $_POST['OR_entry'];

        $response = $this->MProfiles->check_OR($OR_entry);

        if ($response != null) {
            echo json_encode($response);
        }
    }

    public function edit_OR()
    {
        $data = array(
            "OR_number" => $_POST['OR_entry'],
        );
        $this->MProfiles->update_OR($_POST['OR_number'], $data, $_POST['Cycle_ID']);
    }
    /* ------------------------------------ 01-15-2020 ------------------------------------ */

    /* ------------------------------------ 01-16-2020 ------------------------------------ */
    public function OR_search()
    {
        $this->data['content'] = "OR_search";
        $this->load->view('layout', $this->data);
    }

    public function OR_search_results()
    {
        $search = $_POST['search'];
        if ($search != null) {
            $this->data['content'] = "OR_search_results";
            $this->data['result'] = $this->MProfiles->search_OR($search);
            $this->load->view('layout', $this->data);
        }
    }
    /* ------------------------------------ 01-16-2020 ------------------------------------ */

    // --------------------------------- GENERAL FUNCTIONS --------------------------------- //
}
