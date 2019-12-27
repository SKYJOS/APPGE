<?php 


class  Reporte
{


		function lista()
			{
				
			try {
				
			$conexion   = Conexion::get_conexion();
			$query      =  "SELECT  * FROM tb_asesores";
			$statement  =  $conexion->prepare($query);
			$statement->execute();
			$result  =  $statement->fetchAll();
			return $result;
			} catch (Exception $e) {
				echo "Error:".$e->getMessage();
			}
			}



			function agregar($nro_requerimiento,$nro_documento,$apellido_paterno,$apellido_materno,$nombres,$producto,$nro_contrato,$total_dias)
			{
				
			try {
				
			$conexion   = Conexion::get_conexion();
			$query      =  "INSERT INTO tb_reportes(nro_requerimiento,nro_documento,apellido_paterno,apellido_materno,nombres,producto,nro_contrato,total_dias) VALUES (:nro_requerimiento, :nro_documento, :apellido_paterno, :apellido_materno, :nombres, :producto, :nro_contrato, :total_dias)";
			$statement  =  $conexion->prepare($query);
			$statement->bindParam(':nro_requerimiento',$nro_requerimiento);
			$statement->bindParam(':nro_documento',$nro_documento);
			$statement->bindParam(':apellido_paterno',$apellido_paterno);
			$statement->bindParam(':apellido_materno',$apellido_materno);
			$statement->bindParam(':nombres',$nombres);
			$statement->bindParam(':producto',$producto);
			$statement->bindParam(':nro_contrato',$nro_contrato);
			$statement->bindParam(':total_dias',$total_dias);

			if ($statement) {
			$statement->execute();
			return header("Location:../vista/usuario.php");

			} 
			else
			{
			return "error";
			}




			} catch (Exception $e) {
				echo "Error:".$e->getMessage();
			}
			}

			function agregar_campania($cod,$descripcion,$detalle,$vigencia,$producto)
			{
				
			try {
				
			$conexion   = Conexion::get_conexion();
			$query      =  "INSERT INTO tb_tipo(cod,descripcion,detalle,vigencia,producto) VALUES (:cod,:descripcion,:detalle,:vigencia,:producto)";
			$statement  =  $conexion->prepare($query);
			$statement->bindParam(':cod',$cod);
			$statement->bindParam(':descripcion',$descripcion);
			$statement->bindParam(':detalle',$detalle);
			$statement->bindParam(':vigencia',$vigencia);
			$statement->bindParam(':producto',$producto);
		

			if ($statement) {
			$statement->execute();
			return header("Location:../vista/tipo.php");

			} 
			else
			{
			return "error";
			}




			} catch (Exception $e) {
				echo "Error:".$e->getMessage();
			}
			}
			function agregar_producto($producto)
			{
				
			try {
				
			$conexion   = Conexion::get_conexion();
			$query      =  "INSERT INTO tb_producto(producto) VALUES (:producto)";
			$statement  =  $conexion->prepare($query);
		
			$statement->bindParam(':producto',$producto);
	
		

			if ($statement) {
			$statement->execute();
			return header("Location:../vista/producto.php");

			} 
			else
			{
			return "error";
			}




			} catch (Exception $e) {
				echo "Error:".$e->getMessage();
			}
			}

		function eliminar()
			{  

				try {
					
				//$conexion   =  new Conexion();
				$bd         =  Conexion::get_conexion();
				$query      =  "TRUNCATE TABLE tb_reportes";
				$statement  =  $conexion->prepare($query);
				$statement->execute();
				$result  =  $statement->fetchAll();
				return $result;
				} catch (Exception $e) {
					echo "Error:".$e->getMessage();
				}

			}

		function actualizar($cod_asesores,$pass)
		{  

			try {
				
			//$conexion   =  new Conexion();
			$bd         =  Conexion::get_conexion();
			$query      =  "UPDATE tb_usuario SET pass=:pass  WHERE cod_asesores=:cod_asesores";
			$statement  =  $bd->prepare($query);
			$statement->bindParam(':cod_asesores',$cod_asesores);
			$statement->bindParam(':pass',$pass);
		
			
			if ($statement) 
			{ 
			  $statement->execute();
			  return "ok";
			}
			else
			{
			  return "error";
			}



			} catch (Exception $e) {
				
			echo "Error: ".$e->getMessage();

			}

		}







}





 ?>