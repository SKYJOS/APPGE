<?php
include('../librerias/PHPEXCEL/PHPExcel.php');
include('../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
include'../autoload.php';
//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_ 
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

$_DATOS_EXCEL[$i]['producto'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();



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

	
	$producto   = $value['producto'];

	
	
	if (strlen($value['producto'])>0) 
	{

    echo Reporte::agregar_producto($producto);

	}
	

}
unlink($destino);




?>