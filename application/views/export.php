<?php
/**
 * This view builds a Spreadsheet file containing the list of users.
 * @copyright  Copyright (c) 2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */

require_once FCPATH . "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle(mb_strimwidth('Users list', 0, 28, "..."));  //Maximum 31 characters allowed in sheet title.
$sheet->setCellValue('A1', 'Location');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Floor');
$sheet->setCellValue('D1', 'Manager');
$sheet->setCellValue('E1', 'Description');

$sheet->getStyle('A1:E1')->getFont()->setBold(true);
$sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$rooms = $this->users_model->getExportFile();
$line = 2;
foreach ($rooms as $room) {
    $sheet->setCellValue('A' . $line, $room['loc_name']);
    $sheet->setCellValue('B' . $line, $room['room_name']);
    $sheet->setCellValue('C' . $line, $room['floor']);
    $sheet->setCellValue('D' . $line, $room['role_name']);
    $sheet->setCellValue('E' . $line, $room['description']);
    $line++;
}

//Autofit
foreach(range('A', 'D') as $colD) {
    $sheet->getColumnDimension($colD)->setAutoSize(TRUE);
}

$filename = 'rooms.' . 'xlsx';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->setPreCalculateFormulas(false);
$writer->save('php://output');
