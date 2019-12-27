<?php
	//Incluimos librería y archivo de conexión
	include('../../librerias/PHPEXCEL/PHPExcel.php');
    include('../../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
	require '../../conexion.php';
	
	//Consulta
$sql = "SELECT asesor,caso,mes,valor1,valor2,valor3,valor4 ,valor5,valor6,valor7,valor8,valor9,valor10 ,valor11 ,valor12,valor13,valor14,valor15,valor16,valor17,valor18,valor19,valor20,valor21 ,valor22,valor23,valor24 ,valor25 ,valor26,valor27,valor28,valor29,valor30,valor31,observacion,fecha_registro from tb_cuestionario";

	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../../images/atento.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("ATENTO")->setDescription("Reporte de Cuestionario");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Preguntas");
	
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
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:AJ4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:AJ6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B4', 'REPORTE DEL CUESTIONARIO');
	$objPHPExcel->getActiveSheet()->mergeCells('B4:K4');
	

$sql = "SELECT asesor,caso,mes,valor1,valor2,valor3,valor4 ,valor5,valor6,valor7,valor8,valor9,valor10 ,valor11 ,valor12,valor13,valor14,valor15,valor16,valor17,valor18,valor19,valor20,valor21 ,valor22,valor23,valor24 ,valor25 ,valor26,valor27,valor28,valor29,valor30,valor31,observacion,fecha_registro from tb_cuestionario";

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'DNI-ASESOR');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'N°CASO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'MES');

	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'Cajero de qué banco utilizó');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'Retiro con MC con diferencia de tipo de cambio');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'Cumplió política de consumo');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'Cliente utiliza la tarjeta en el ultimo año');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('H6', 'Se encontró evidencia de envío de EECC');
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('I6', 'Se necesitó audio');
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('J6', 'Se necesitó contrato');
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('K6', 'Se necesitó sustento de cambio de condiciones');
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('L6', 'Es cliente multiproducto');
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('M6', '(Si respuesta anterior es NO) Qué condición NO cumplió?');
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('N6', 'Referencia');
	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('O6', 'Se necesitó contrato sin RVGL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('P6', 'Se necesitó rectificación de clasificación');
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('Q6', 'La deuda del cliente fue vendida');
	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('R6', 'Se hizo recompra de deuda');
	$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('S6', 'Nombre del comercio');
	$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('T6', 'Se solicitó video');
	$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('U6', 'Se solicitó voucher');
	$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('V6', 'Se envió carta de 2 días');
	$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('W6', 'El pago fue en oficina');
	$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('X6', 'El pago fue por transferencia interbancaria');
	$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('Y6', 'El pago fue por BxI o App Móvil');
	$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('Z6', 'El pago fue por BxT');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AA6', 'Banco cumplio con el bono de bienvenida');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AB6', 'Se necesito sustentos de cambio de condiciones');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AC6', 'Pago fue efectuado correctamente');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AD6', 'Código de oficina');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AE6', 'Se necesito sustento de cambio de condiciones');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AF6', 'Es cliente estrella');

	$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AG6', 'Meta de consumo');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AH6', 'Monto consumido por el cliente ');

	$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AI6', 'OBSERVACIÓN');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('AJ6', 'FECHA DE REGISTRO');
	
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, utf8_encode('="'.$rows['asesor'].'"'));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, utf8_encode('="'.$rows['caso'].'"'));	
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['mes']);

		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, utf8_encode($rows['valor1']));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, utf8_encode($rows['valor2']));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, utf8_encode($rows['valor3']));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, utf8_encode($rows['valor4']));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, utf8_encode($rows['valor5']));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, utf8_encode($rows['valor6']));
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, utf8_encode($rows['valor7']));
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, utf8_encode($rows['valor8']));
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, utf8_encode($rows['valor9']));
		$objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, utf8_encode($rows['valor10']));
		$objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, utf8_encode($rows['valor12']));

		$objPHPExcel->getActiveSheet()->setCellValue('O'.$fila, utf8_encode($rows['valor13']));
		$objPHPExcel->getActiveSheet()->setCellValue('P'.$fila, utf8_encode($rows['valor14']));
		$objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila, utf8_encode($rows['valor15']));
		$objPHPExcel->getActiveSheet()->setCellValue('R'.$fila, utf8_encode($rows['valor16']));
		$objPHPExcel->getActiveSheet()->setCellValue('S'.$fila, utf8_encode($rows['valor17']));
		$objPHPExcel->getActiveSheet()->setCellValue('T'.$fila,utf8_encode($rows['valor18']));
		$objPHPExcel->getActiveSheet()->setCellValue('U'.$fila, utf8_encode($rows['valor19']));
		$objPHPExcel->getActiveSheet()->setCellValue('V'.$fila, utf8_encode($rows['valor20']));
		$objPHPExcel->getActiveSheet()->setCellValue('W'.$fila, utf8_encode($rows['valor21']));
		$objPHPExcel->getActiveSheet()->setCellValue('X'.$fila, utf8_encode($rows['valor22']));
		$objPHPExcel->getActiveSheet()->setCellValue('Y'.$fila, utf8_encode($rows['valor23']));
		$objPHPExcel->getActiveSheet()->setCellValue('Z'.$fila, utf8_encode($rows['valor24']));
		$objPHPExcel->getActiveSheet()->setCellValue('AA'.$fila, utf8_encode($rows['valor25']));
		$objPHPExcel->getActiveSheet()->setCellValue('AB'.$fila, utf8_encode($rows['valor11']));
		$objPHPExcel->getActiveSheet()->setCellValue('AC'.$fila, utf8_encode($rows['valor26']));
		$objPHPExcel->getActiveSheet()->setCellValue('AD'.$fila, utf8_encode($rows['valor27']));
		$objPHPExcel->getActiveSheet()->setCellValue('AE'.$fila, utf8_encode($rows['valor28']));
		$objPHPExcel->getActiveSheet()->setCellValue('AF'.$fila, utf8_encode($rows['valor29']));

		$objPHPExcel->getActiveSheet()->setCellValue('AG'.$fila, utf8_encode($rows['valor30']));
		$objPHPExcel->getActiveSheet()->setCellValue('AH'.$fila, utf8_encode($rows['valor31']));

		$objPHPExcel->getActiveSheet()->setCellValue('AI'.$fila, utf8_encode($rows['observacion']));

		$objPHPExcel->getActiveSheet()->setCellValue('AJ'.$fila, $rows['fecha_registro']);
	

	
		//$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, '=J'.$fila.'*K'.$fila);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:AJ".$fila);
	
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	header('Content-Disposition: attachment;filename="Reporte_Preguntas.xls"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>