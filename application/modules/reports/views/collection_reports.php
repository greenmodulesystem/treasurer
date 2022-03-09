<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'assets/general_assets/PHPExcel-1.8/Classes/PHPExcel.php';
require_once 'assets/general_assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php'; 

$excel3 = PHPExcel_IOFactory::createReader('Excel2007');
$excel3 = $excel3->load('Reports.xlsx'); 
$excel3->setActiveSheetIndex(0);
$rowCount = 12;      
$allData = $_POST['data'];

foreach ($allData as $key => $value) {
    $rowCount++;            
    $excel3->getActiveSheet()->SetCellValue('A'.$rowCount, (!empty($value["Accountable_form_number"])?$value["Accountable_form_number"]:''));  
    $excel3->getActiveSheet()->getStyle('A'.$rowCount)->getAlignment()->setWrapText(true);
    $date = date('Y-m-d', strtotime($value['Date_paid']));
    $excel3->getActiveSheet()->SetCellValue('B'.$rowCount, (!empty($date)?$date:''));  
    $excel3->getActiveSheet()->getStyle('B'.$rowCount)->getAlignment()->setWrapText(true);   
    $excel3->getActiveSheet()->SetCellValue('C'.$rowCount, (!empty($value["Payor"])?$value["Payor"]:''));  
    $excel3->getActiveSheet()->getStyle('C'.$rowCount)->getAlignment()->setWrapText(true);
    $excel3->getActiveSheet()->SetCellValue('D'.$rowCount, (!empty($value["Particular"])?$value["Particular"]:''));  
    $excel3->getActiveSheet()->getStyle('D'.$rowCount)->getAlignment()->setWrapText(true); 
    $excel3->getActiveSheet()->SetCellValue('E'.$rowCount, (!empty($value["Amount"])?$value["Amount"]:''));  
    $excel3->getActiveSheet()->getStyle('E'.$rowCount)->getAlignment()->setWrapText(true); 
}
$excel3->getActiveSheet()->SetCellValue('E'.'9', (!empty(date('M-d-Y'))?date('M-d-Y'):''));  
$excel3->getActiveSheet()->getStyle('E'.'9')->getAlignment()->setWrapText(true); 

$objWriter = PHPExcel_IOFactory::createWriter($excel3, 'Excel2007');                                     
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');        
header('Content-Disposition: attachment;filename="' .'General-Collection-Reports'. '.xlsx"');        
header('Cache-Control: max-age=0');
$objWriter->save('php://output');            
exit;
