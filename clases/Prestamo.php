<?php 

class Prestamo
{
 
function consulta($id,$campo){

try {

$bd         =  Conexion::get_conexion();
$query      =  "SELECT s.id,s.num_caso,s.cliente,s.documento,s.num_prestamo,s.producto,s.atencion,s.soluciono,ss.soluciono as sol,s.ayudaron,s.genero,m.submotivo from tb_prestamo as s inner join tb_submotivo as m on s.submotivo=m.id inner join tb_soluciono as ss on s.soluciono=ss.id where s.id=:id";
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
$query      =  "SELECT * from tb_prestamo";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}


}


function agregar($num_caso,$cliente,$documento,$num_prestamo,$producto,$atencion,$soluciono,$ayudaron,$genero,$submotivo,$asesores)
{

  try {

	$bd         =  Conexion::get_conexion();
	$query      =  "INSERT INTO tb_prestamo(num_caso,cliente,documento,num_prestamo,producto,atencion,soluciono,ayudaron,genero,submotivo,asesores) values (:num_caso,:cliente,:documento,:num_prestamo,:producto,:atencion,:soluciono,:ayudaron,:genero,:submotivo,:asesores)";
	$statement  =  $bd->prepare($query);
	
	$statement->bindParam(':num_caso',$num_caso);
	$statement->bindParam(':cliente',$cliente);
	$statement->bindParam(':documento',$documento);
	$statement->bindParam(':num_prestamo',$num_prestamo);
	$statement->bindParam(':producto',$producto);
	$statement->bindParam(':atencion',$atencion);
	$statement->bindParam(':soluciono',$soluciono);
	$statement->bindParam(':ayudaron',$ayudaron);
	$statement->bindParam(':genero',$genero);
	$statement->bindParam(':submotivo',$submotivo);
    $statement->bindParam(':asesores',$asesores);

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
$query      =  "DELETE FROM tb_prestamo WHERE id=:id";
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
	
//echo "Error: ".$e->getMessage();

}

}


function actualizar($id,$num_caso,$cliente,$documento,$num_prestamo,$producto,$atencion,$soluciono,$ayudaron,$genero,$submotivo)
{  

	try {
		
	//$conexion   =  new Conexion();
	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_prestamo SET num_caso=:num_caso,cliente=:cliente,documento=:documento,num_prestamo=:num_prestamo,producto=:producto,atencion=:atencion,soluciono=:soluciono,ayudaron=:ayudaron,genero=:genero,submotivo=:submotivo WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':num_caso',$num_caso);
	$statement->bindParam(':cliente',$cliente);
	$statement->bindParam(':documento',$documento);
	$statement->bindParam(':num_prestamo',$num_prestamo);
	$statement->bindParam(':producto',$producto);
	$statement->bindParam(':atencion',$atencion);	
	$statement->bindParam(':soluciono',$soluciono);
	$statement->bindParam(':ayudaron',$ayudaron);
	$statement->bindParam(':genero',$genero);
	$statement->bindParam(':submotivo',$submotivo);
	
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