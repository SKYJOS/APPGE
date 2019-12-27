<?php 


class Conexion
{


public function get_conexion()
{

try {
	
$conexion = new PDO("mysql:host=localhost;dbname=db_caso","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $conexion;
} 
catch (Exception $e) 
{
	echo "ERROR: " . $e->getMessage();

}



}




}







 ?>