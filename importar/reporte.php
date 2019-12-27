<?php
include('../librerias/PHPEXCEL/PHPExcel.php');
include('../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
include'../autoload.php';

$archivo   = $_FILES['excel']['name'];
$tipo      = $_FILES['excel']['type'];
$destino   = "bak_" . $archivo;
if (copy($_FILES['excel']['tmp_name'], $destino))
{
#echo "Archivo Cargado Con Éxito";
}
else
{
echo "Error Al Cargar el Archivo";
}

if (file_exists("bak_" . $archivo)) 
{

// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("bak_" . $archivo);
$objFecha = new PHPExcel_Shared_Date();
// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);

// Llenamos el arreglo con los datos  del archivo xlsx
for ($i = 2; $i <= 5000; $i++)
{
$_DATOS_EXCEL[$i]['nro_requerimiento']    = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['nro_documento'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['apellido_paterno']    = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['apellido_materno'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['nombres']    = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['producto'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['nro_contrato']    = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['total_dias'] = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();

}

}

//si por algo no cargo el archivo bak_ 
else 
{
echo "Necesitas primero importar el archivo";
}

$errores = 0;
//recorremos el arreglo multidimensional 
//para ir recuperando los datos obtenidos
//del excel e ir insertandolos en la BD

foreach ($_DATOS_EXCEL as $key => $value)
{

	$Nro_Requerimiento    = $value['nro_requerimiento'];
	$Nro_Documento   = $value['nro_documento'];
	$Apellido_Paterno   = $value['apellido_paterno'];
	$Apellido_Materno   = $value['apellido_materno'];
	$Nombres   = $value['nombres'];
	$Direccion   = $value['producto'];
	$Departamento   = $value['nro_contrato'];
	$Provincia   = $value['total_dias'];
	
	
	if (strlen($value['nro_requerimiento'])>0) 
	{

    echo Reporte::agregar($Nro_Requerimiento,$Nro_Documento,$Apellido_Paterno,$Apellido_Materno,$Nombres,$Direccion,$Departamento,$Provincia);

	}
	

}
unlink($destino);




?>