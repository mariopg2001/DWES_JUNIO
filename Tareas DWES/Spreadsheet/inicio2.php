<?php
    require 'vendor/autoload.php';
    require_once('./modelo.php');
    $modelo=new Modelo();
    $consulta2=$modelo->consultartabla(); //mandamos la consulta sql al modelo para ejecutarla

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\IOFactory;
    

    if($consulta2[1]>0){
        $excel= new Spreadsheet();
        $hojaActiva = $excel->getActiveSheet();
        $columna = 'A';
        $fila = 1;
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="excel.xlsx"');
        header('Cache-Control: max-age=0');
        
        
        while ($ncolumna = $consulta2[0]->fetch_field()) {
            $hojaActiva->setCellValue($columna . $fila, $ncolumna->name);
            $fuente = $hojaActiva->getStyle($columna . $fila)->getFont();
            $fuente->setBold(true);
            $columna++;
        }
        $fila = 2;
        while ($nfila = $consulta2[0]->fetch_assoc()) {
            $columna = 'A';
            foreach ($nfila as $valor) {
                $hojaActiva->setCellValue($columna . $fila, $valor);
                $columna++;
            }
            $fila++;
        }
        $guardar = IOFactory::createWriter($excel, 'Xlsx');
        $guardar->save('php://output');
    }else{
        echo "No se han devuelto filas";
    }