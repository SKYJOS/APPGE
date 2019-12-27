<?php 

class Problematica
{
 
function consulta($id,$campo){

try {

$bd         =  Conexion::get_conexion();
$query      =  "SELECT * from tb_problematica where id=:id";
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
	

$bd         =  Conexion::get_conexion();
$query      =  "SELECT * from tb_problematica";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}



}


function agregar($problematica)
{

  try {

	$bd         =  Conexion::get_conexion();
	$query      =  "INSERT INTO tb_problematica(problematica) values (:problematica)";
	$statement  =  $bd->prepare($query);
	
	$statement->bindParam(':problematica',$problematica);

	if ($statement) {
		$statement->execute();
		return "ok";
	} else {
		return "error";
	}
	
	
	
	
    
  } catch (Exception $e) {

  	echo "Error .... :-): ".$e->getMessage();
  	
  }


}


function eliminar($id)
{  

try {
	

$bd         =  Conexion::get_conexion();
$query      =  "DELETE FROM tb_problematica WHERE id=:id";
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
	


}

}


function actualizar($id,$problematica)
{  

	try {
		

	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_problematica SET problematica=:problematica WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':problematica',$problematica);
	
	
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