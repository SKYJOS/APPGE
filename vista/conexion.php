<?php 
/**
* Clase  Conexion
*/
class Conexion extends mysqli
{
	
	public function __construct()
	{  

		parent::__construct("localhost","root","","db_caso");
		$this->query("SET NAMES 'utf8'");
		$this->connect_errno ? die('Error con la conexion') : $x = 'Conectado';

		unset($x);
	}
    
public function recorrer($y)
{
 
 return mysqli_fetch_array($y);
}
 }


$db = new Conexion();

 ?>