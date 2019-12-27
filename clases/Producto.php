<?php 

class Producto
{
 
function consulta($id,$campo){

try {

$bd         =  Conexion::get_conexion();
$query      =  "SELECT * from tb_producto where id=:id";
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
$query      =  "SELECT * from tb_producto";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}



}


function agregar($producto)
{

  try {

	$bd         =  Conexion::get_conexion();
	$query      =  "INSERT INTO tb_producto(producto) values (:producto)";
	$statement  =  $bd->prepare($query);
	
	$statement->bindParam(':producto',$producto);

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
$query      =  "DELETE FROM tb_producto WHERE id=:id";
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


function actualizar($id,$producto)
{  

	try {
		

	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_producto SET producto=:producto WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':producto',$producto);
	
	
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