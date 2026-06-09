<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet -> getActiveSheet();

$sheet -> setCellValue('A1','Product Name');
$sheet -> setCellValue('B1','Price');
$sheet -> setCellValue('C1','Quantity');
$sheet -> setCellValue('D1','Stock');

$sheet -> setCellValue('A2','Bracelet');
$sheet -> setCellValue('B2','589');
$sheet -> setCellValue('C2','1');
$sheet -> setCellValue('D2','Available');

$sheet -> setCellValue('A3','Plant');
$sheet -> setCellValue('B3','350');
$sheet -> setCellValue('C3','2');
$sheet -> setCellValue('D3','Available');

$writer = new Xlsx($spreadsheet);
$writer -> save('C:/xampp/htdocs/internship/Home/products.xlsx');

echo "Created successfully ..!";


?>