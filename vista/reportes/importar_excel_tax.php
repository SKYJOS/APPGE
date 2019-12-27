<?php
	//Incluimos librería y archivo de conexión
	include('../../librerias/PHPEXCEL/PHPExcel.php');
    include('../../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
	require '../../conexion.php';
	
	//Consulta
	$sql = "SELECT c.reclamo,c.contrato,p.producto,t.descripcion,r.problematica,c.observaciones,c.fecha_registro FROM  tb_campania as c inner join tb_producto p on c.producto=p.id inner join tb_tipo as t on c.campania=t.cod_tipo inner join tb_problematica as r on c.problematica=r.id ";
	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../../images/atento.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("ATENTO")->setDescription("Reporte de Reclamos");
	
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
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:G4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:G6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE CLIENTES');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:G3');
	

$sql = "SELECT c.reclamo,c.contrato,p.producto,t.descripcion,r.problematica,c.observaciones,c.fecha_registro FROM  tb_campania as c inner join tb_producto p on c.producto=p.id inner join tb_tipo as t on c.campania=t.cod_tipo inner join tb_problematica as r on c.problematica=r.id ";

 $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'N°RECLAMO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'CONTRATO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'PRODUCTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'CAMPAÑA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'PROBLEMATICA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'OBSERVACIONES');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'FECHA DE INGRESO');	
	

	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, "'".$rows['reclamo']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, "'".$rows['contrato']);	
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, utf8_encode($rows['producto']));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, utf8_encode($rows['descripcion']));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, utf8_encode($rows['problematica']));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, utf8_encode($rows['observaciones']));	
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['fecha_registro']);
	
		//$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, '=J'.$fila.'*K'.$fila);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:G".$fila);
	
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte_Campania.xls"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>