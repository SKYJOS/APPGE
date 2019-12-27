<?php 

class Reclamo
{
 
function consulta($id,$campo){

try {

$bd         =  Conexion::get_conexion();
$query      =  "SELECT c.id,c.reclamo,c.contrato,c.producto,p.producto as nom,t.descripcion,r.problematica,r.id as pro,c.observaciones,c.fecha_registro FROM  tb_campania as c inner join tb_tipo as t on c.campania=t.cod_tipo inner join tb_problematica as r on c.problematica=r.id inner join tb_producto as p on c.producto=p.id where c.id=:id";
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
$query      =  "SELECT c.id,c.reclamo,c.contrato,p.producto,t.descripcion,r.problematica,c.observaciones,c.fecha_registro FROM  tb_campania as c inner join tb_producto as p on c.producto=p.id inner join tb_tipo as t on c.campania=t.cod_tipo inner join tb_problematica as r on c.problematica=r.id";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}



}


function agregar($reclamo,$contrato,$producto,$campania,$problematica,$observaciones)
{

  try {

	$bd         =  Conexion::get_conexion();
	
	$query      =  "INSERT INTO tb_campania(reclamo,contrato,producto,campania,problematica,observaciones) values (:reclamo,:contrato,:producto,:campania,:problematica,:observaciones)";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':reclamo',$reclamo);
	$statement->bindParam(':contrato',$contrato);
	$statement->bindParam(':producto',$producto);
	$statement->bindParam(':campania',$campania);
	$statement->bindParam(':problematica',$problematica);
	$statement->bindParam(':observaciones',$observaciones);
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
$query      =  "DELETE FROM tb_campania WHERE id=:id";
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


function actualizar_1($id,$reclamo,$contrato,$producto,$problematica,$observaciones)
{  

	try {

	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_campania SET reclamo=:reclamo,contrato=:contrato,producto=:producto,problematica=:problematica,observaciones=:observaciones  WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':reclamo',$reclamo);
	$statement->bindParam(':contrato',$contrato);
	$statement->bindParam(':producto',$producto);	
	$statement->bindParam(':problematica',$problematica);
	$statement->bindParam(':observaciones',$observaciones);
	
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

function actualizar_2($id,$reclamo,$contrato,$producto,$campania,$problematica,$observaciones)
{  

	try {

	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_campania SET reclamo=:reclamo,contrato=:contrato,producto=:producto,campania=:campania,problematica=:problematica,observaciones=:observaciones  WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':reclamo',$reclamo);
	$statement->bindParam(':contrato',$contrato);
	$statement->bindParam(':producto',$producto);
	$statement->bindParam(':campania',$campania);
	$statement->bindParam(':problematica',$problematica);
	$statement->bindParam(':observaciones',$observaciones);
	
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