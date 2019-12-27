<?php 

class Tipo
{
 
function consulta($cod_tipo,$campo){

try {

$bd         =  Conexion::get_conexion();
$query      =  "SELECT t.cod,t.cod_tipo,t.descripcion,t.vigencia,p.producto from tb_tipo as t inner join tb_producto as p on t.producto=p.id where cod_tipo=:cod_tipo";
$statement  =  $bd->prepare($query);
$statement->bindParam(':cod_tipo',$cod_tipo);
$statement->execute();
$result     =  $statement->fetch();
return $result[$campo];


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}


}
function lista_combo($cod_tipo)
{

try {
	

$bd         =  Conexion::get_conexion();
$query      =  "SELECT * from tb_tipo where producto=:id";
$statement  =  $bd->prepare($query);
$statement->bindParam(':id',$cod_tipo);
$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}
//3 vistas


}

function lista()
{

try {
	

$bd         =  Conexion::get_conexion();
$query      =  "SELECT t.cod_tipo,t.descripcion,t.vigencia,p.producto from tb_tipo as t inner join tb_producto as p on t.producto=p.id";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}
//3 vistas


}


function agregar($cod,$descripcion,$vigencia,$producto)
{

  try {

	$bd         =  Conexion::get_conexion();
	$query      =  "INSERT INTO tb_tipo(cod,descripcion,vigencia,producto) values (:cod,:descripcion,:vigencia,:producto)";
	$statement  =  $bd->prepare($query);
	
	$statement->bindParam(':cod',$cod);
	$statement->bindParam(':descripcion',$descripcion);
    $statement->bindParam(':vigencia',$vigencia);
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
$query      =  "DELETE FROM tb_tipo WHERE cod_tipo=:cod_tipo";
$statement  =  $bd->prepare($query);
$statement->bindParam(':cod_tipo',$id);
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


function actualizar($cod_tipo,$cod,$descripcion,$vigencia,$producto)
{  

	try {
		
	
	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_tipo SET cod=:cod,descripcion=:descripcion,vigencia=:vigencia,producto=:producto WHERE cod_tipo=:cod_tipo";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':cod',$cod);
	$statement->bindParam(':cod_tipo',$cod_tipo);
	$statement->bindParam(':descripcion',$descripcion);
	$statement->bindParam(':vigencia',$vigencia);
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