<?php 


class  Submotivo
{


function consulta($id,$campo){

try {

$bd         =  Conexion::get_conexion();
$query      =  "SELECT submotivo from tb_submotivo where id=:id";
$statement  =  $bd->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result     =  $statement->fetch();
return $result[$campo];


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}


}


function lista()
{
	
try {
	
$conexion   = Conexion::get_conexion();
$query      =  "SELECT  * FROM tb_submotivo";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;
} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}
}



function agregar($soluciono)
{
	
try {
	
$conexion   = Conexion::get_conexion();
$query      =  "INSERT INTO tb_submotivo(submotivo)VALUES(:submotivo)";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':submotivo',$soluciono);


if ($statement) {
		$statement->execute();
		return "ok";
	} else {
		return "error";
	}




} catch (Exception $e) {
	
}
}


function eliminar($id)
{  

try {
	

$bd         =  Conexion::get_conexion();
$query      =  "DELETE FROM tb_submotivo WHERE id=:id";
$statement  =  $bd->prepare($query);
$statement->bindParam(':id',$id);
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


function actualizar($id,$soluciono)
{  

	try {
		

	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_submotivo SET submotivo=:submotivo  WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':submotivo',$soluciono);


	
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