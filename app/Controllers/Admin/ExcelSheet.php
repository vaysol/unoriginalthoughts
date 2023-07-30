<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Excel_Model;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Border;
use PHPExcel_Style_Fill;
use PHPExcel_Worksheet_PageSetup;

class ExcelSheet extends Controller
{
    function careers_list_download() 
    {

        $model = new Excel_Model();

        $data = $model->findAllData();

        // print_r($data);  exit;
        require_once APPPATH . 'ThirdParty/PHPExcel/PHPExcel.php';

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex( 0 );

        $row = 1;
        foreach ( $data as $row_data ) {
            $col = 0;
            foreach ( $row_data as $key => $value ) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( $col, $row, $value );
                $col++;
            }
            $row++;
        }
        
        $objPHPExcel->getActiveSheet()->getColumnDimension( 'A' )->setWidth( 10 );
        $objPHPExcel->getActiveSheet()->getColumnDimension( 'B' )->setWidth( 30 );
        $objPHPExcel->getActiveSheet()->getColumnDimension( 'C' )->setWidth( 40 );
        $objPHPExcel->getActiveSheet()->getColumnDimension( 'D' )->setWidth( 30 );
        $objPHPExcel->getActiveSheet()->getColumnDimension( 'E' )->setWidth( 40 );
        $objPHPExcel->getActiveSheet()->getColumnDimension( 'F' )->setWidth( 50 );
        $objPHPExcel->getActiveSheet()->getColumnDimension( 'G' )->setWidth( 20 );
        
        $header_style = [
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => [ 'rgb' => 'e5e5e5' ],
            ],
        ];
        $objPHPExcel->getActiveSheet()->getStyle( 'A1:G1' )->applyFromArray( $header_style );
        
        $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize( PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER );
        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation( PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
        
        header( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
        header( 'Connection: keep-alive' );
        header( 'Keep-Alive: timeout=5, max=1000' );
        header( 'Content-Disposition: attachment;filename="career_data.xlsx"' );
        header( 'Cache-Control: max-age=0' );
        
        $objWriter = PHPExcel_IOFactory::createWriter( $objPHPExcel, 'Excel2007' );
        
        // print_r($data);  exit;
        $objWriter->save( 'php://output' );
        exit;
        
    }
}
?>