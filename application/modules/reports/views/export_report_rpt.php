<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'assets/general_assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
require_once 'assets/general_assets/PHPExcel-1.8/Classes/PHPExcel.php'; 

$excel3 = PHPExcel_IOFactory::createReader('Excel2007');
$excel3 = $excel3->load('assets/reports/Acct_Reports.xlsx'); 
$excel3->setActiveSheetIndex(0);
$rowCount = 7;      
$variable = $_POST['data'];

foreach ($_POST['data'] as $key => $value) {
    $rowCount++;
    $excel3->getActiveSheet()->SetCellValue('A'.$rowCount, $value['First_name'].' '.$value['Last_name']);
    $excel3->getActiveSheet()->setCellValue('B'.$rowCount, $value['Start_OR']);
    $excel3->getActiveSheet()->setCellValue('C'.$rowCount, $value['End_OR']);
    $excel3->getActiveSheet()->setCellValue('D'.$rowCount, $value['Stub_no']);
    $excel3->getActiveSheet()->setCellValue('E'.$rowCount, date('F-d-Y', strtotime($value['Date_released'])));
}


$objWriter = PHPExcel_IOFactory::createWriter($excel3, 'Excel2007');                                     
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');        
header('Content-Disposition: attachment;filename="' .'Accountable-Report'. '.xlsx"');        
header('Cache-Control: max-age=0');
$objWriter->save('php://output');            
exit;

?>