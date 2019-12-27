<?php
		$mysqli=new mysqli('localhost','root','','db_caso');
		if ($mysqli->connect_errno) {
		  echo "Error al conectarse con My SQL debido al error".$mysqli->connect_error;
		}
	
		$usu=trim($_POST['caso']);
	

		$usuarios=$mysqli->query("Select concat(nombres,' ',apellido_paterno,' ',apellido_materno) as cliente,nro_documento,producto,total_dias From tb_reportes Where nro_requerimiento='".$usu."'");


		if ($usuarios->num_rows==1):
		  $datos= $usuarios->fetch_assoc();

		    echo json_encode(array('cliente'=>utf8_encode($datos['cliente']),'dni'=>utf8_encode($datos['nro_documento']),'producto'=>utf8_encode($datos['producto']),'dias'=>utf8_encode($datos['total_dias'])));

		else:

		    echo json_encode(array('nombre'=>true));
		       
		endif;



		$mysqli->close();
 ?>