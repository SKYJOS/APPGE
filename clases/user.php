<?php 

class user
{


function consulta_user($id,$campo){

try {


$bd         =  Conexion::get_conexion();
$query      =  "SELECT cod_asesores,pass,tipo from tb_usuario where id=:id";
$statement  =  $bd->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result     =  $statement->fetch();
return $result[$campo];


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}


}


 
function consulta($id,$campo){

try {


$bd         =  Conexion::get_conexion();
$query      =  "SELECT r.dni,p.producto as Producto,t.documento as Tipo,r.documento,r.cliente,r.monto_oferta,r.tel_registrado,r.tel_referencia,s.servicio as Servicio,r.observaciones,r.fecha_ingreso FROM  tb_registro as r inner join tb_tipo_documento as t on r.tipo_documento=t.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id  where r.id=:id";
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
$query      =  "SELECT * from tb_usuario";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}
//3 vistas


}


function agregar($cod_asesores,$pass,$tipo)
{

  try {

	$bd         =  Conexion::get_conexion();
	$query      =  "INSERT INTO tb_usuario(cod_asesores,pass,tipo,estado) values (:cod_asesores,:pass,:tipo,'1')";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':cod_asesores',$cod_asesores);
	$statement->bindParam(':pass',$pass);
	$statement->bindParam(':tipo',$tipo);
	
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
$query      =  "DELETE FROM tb_usuario WHERE id=:id";
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


function actualizar($id,$cod_asesores,$pass,$tipo)
{  

	try {
		

	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_usuario SET cod_asesores=:cod_asesores,pass=:pass,tipo=:tipo  WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':cod_asesores',$cod_asesores);
	$statement->bindParam(':pass',$pass);
	$statement->bindParam(':tipo',$tipo);

	
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