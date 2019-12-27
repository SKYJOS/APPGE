<?php 

date_default_timezone_set('America/Lima');

ini_set('max_execution_time', 300); 
define("PATH","http://localhost/APPGE/");
define("FOLDER","APPGE/");
define("RUTA", dirname(__FILE__).DIRECTORY_SEPARATOR);
define("SERVER","localhost");
define("USER", "root");
define("PASS", "");
define("BD", "db_caso");
define("FECHA",'Y-m-d');


$key  = date('Y-m-d').$_SERVER['SERVER_NAME'].FOLDER;

define("KEY","502ff82f7-APPGE");
define("ID", "id");
define("COD_ASESORES", "cod_asesores");


 ?>
