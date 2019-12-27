<?php
	//Incluimos librería y archivo de conexión
	include('../../librerias/PHPEXCEL/PHPExcel.php');
    include('../../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
	require '../../conexion.php';
	
	//Consulta
$sql = "SELECT s.num_caso,s.cliente,s.documento,s.num_prestamo,s.producto,s.atencion,s.soluciono,s.ayudaron,s.genero,s.asesores from tb_prestamo as s";
	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../../images/atento.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("ATENTO")->setDescription("Reporte de Préstamos");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Clientes");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:J4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:J6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE PRESTAMOS');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:J3');
	

$sql = "SELECT s.num_caso,s.cliente,s.documento,s.num_prestamo,s.producto,s.atencion,s.soluciono,s.ayudaron,s.genero,s.asesores from tb_prestamo as s";

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'N°CASO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(80);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'CLIENTE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'DNI');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'N°PRESTAMO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'PRODUCTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'DIAS DE ATENCION');		
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(80);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', '¿COMO SE SOLUCIONO?');	
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(80);
	$objPHPExcel->getActiveSheet()->setCellValue('H6', '¿QUIENES AYUDARON A SOLUCIONAR?');	
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(80);
	$objPHPExcel->getActiveSheet()->setCellValue('I6', '¿QUE GENERO EL RECLAMO?');
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('J6', 'DNI-ASESOR');	

	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, "'".$rows['num_caso']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['cliente']);	
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['documento']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['num_prestamo']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, utf8_encode($rows['producto']));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, utf8_encode($rows['atencion']));			
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, utf8_encode($rows['soluciono']));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, utf8_encode($rows['ayudaron']));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, utf8_encode($rows['genero']));
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, "'".$rows['asesores']);
	
		//$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, '=J'.$fila.'*K'.$fila);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:J".$fila);
	
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	header('Content-Disposition: attachment;filename="Reporte_Prestamos.xls"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>