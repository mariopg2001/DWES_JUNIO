<?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use \PhpOffice\PhpSpreadsheet\IOFactory;
   $spreadsheet = new Spreadsheet();
   $activeWorksheet = $spreadsheet->getActiveSheet();
   $activeWorksheet->setCellValue('A1', 'Hello World !');

//    $writer = new Xlsx($spreadsheet);
//    $writer->save('hello world.xlsx');
   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment;filename="hello world.xlsx"');
   header('Cache-Control: max-age=0');
   
   $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
   $writer->save('php://output');