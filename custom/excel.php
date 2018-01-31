<?php



function carga_excel_nominas ($file)
{

  //Had to change this path to point to IOFactory.php.
  //Do not change the contents of the PHPExcel-1.8 folder at all.
  include('PHPExcel/PHPExcel/IOFactory.php');
include_once('test_load_fact.php');
  //Use whatever path to an Excel file you need.
//  $inputFileName = '../nominas/test.xlsx';
    $inputFileName = $file;

  try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
  } catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . 
        $e->getMessage());
  }

  $sheet = $objPHPExcel->getSheet(0);
  $highestRow = $sheet->getHighestRow();
  $highestColumn = $sheet->getHighestColumn();

  for ($row = 1; $row <= $highestRow; $row++) { 
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, 
                                    null, true, false);

    //Prints out data in each row.
    //Replace this with whatever you want to do with the data.
    if ($rowData[0][1] <> '#N/A')
    {

            $oldDate = $rowData[0][4];
$arr = explode('/', $oldDate);
$rowData[0][4] = $arr[2].'-'.$arr[1].'-'.$arr[0];
      
            $oldDate = $rowData[0][5];
$arr = explode('/', $oldDate);
$rowData[0][5] = $arr[2].'-'.$arr[1].'-'.$arr[0];

      $tipo_fact = $rowData[0][2];
      $profesor = $rowData[0][1];
      $clasificacion = $rowData[0][3];
      $fecha = $rowData[0][4];
      $fecha_contable = $rowData[0][5];
      $grupo = $rowData[0][6];
      $irpf_fac = $rowData[0][7];
      $iva = $rowData[0][9];
      $base = $rowData[0][8];
      $ss   = $rowData[0][10];
      $irpf = $rowData[0][11];
      
//      echo '<pre>Creando Factura</pre>';
      create_factura ($tipo_fact, $profesor, $clasificacion, $fecha, $fecha_contable, $grupo, $irpf_fac, $iva, $base,0);
      if ($ss <> 0)
      {
//        echo '<pre>Creando SS</pre>';
        create_factura ('factura proveedor', $profesor, 'ss', $fecha, $fecha_contable, $grupo, 0, 0, $ss,0);
      }
      
      if ($irpf <> 0)
      {
//        echo '<pre>Creando IRPF</pre>';
        create_factura ('factura proveedor', $profesor, 'irpf', $fecha, $fecha_contable, $grupo, 0, 0, $irpf,0);
      }
/*      
    echo '<pre>';
      print_r($rowData);
    echo '</pre>';
  */  
    }
  }
}