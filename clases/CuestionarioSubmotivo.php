<?php 

class CuestionarioSubmotivo{

	function lista()
	{
		try {
			$bd         =  Conexion::get_conexion();
			$query      =  "SELECT * from tb_cuestionario_submotivo";
			$statement  =  $bd->prepare($query);
			$statement->execute();
			$result     =  $statement->fetchAll();
		return $result;
		}
		catch (Exception $e) {
			echo "Error: ".$e->getMessage();
		}
	}
}
?>