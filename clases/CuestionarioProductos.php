<?php 

class CuestionarioProductos{

	function lista()
	{
		try {
			$bd         =  Conexion::get_conexion();
			$query      =  "SELECT * from tb_producto_cue";
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