<?php
	
	$mysqli=new mysqli("localhost","root","","db_caso"); //servidor, usuario de base de datos, 
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>