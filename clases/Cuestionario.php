<?php 

class Cuestionario
{
 
function consulta($id,$campo){

try {

$bd         =  Conexion::get_conexion();
$query      =  "SELECT * from tb_cuestionario where id=:id";
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
$query      =  "SELECT * from tb_cuestionario";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}



}



function agregar($asesor,$caso,$mes,$producto,$motivo,$submotivo,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$valor10,$valor11,$valor12,$valor13,$valor14,$valor15,$valor16,$valor17,$valor18,$valor19,$valor20,$valor21,$valor22,$valor23,$valor24,$valor25,$valor26,$valor27,$valor28,$valor29,$valor30,$valor31,$observacion)
{

  try {

	$bd         =  Conexion::get_conexion();
	$query      =  "INSERT INTO tb_cuestionario(asesor,caso,mes,producto,motivo,submotivo,valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9,valor10,valor11,valor12,valor13,valor14,valor15,valor16,valor17,valor18,valor19,valor20,valor21,valor22,valor23,valor24,valor25,valor26,valor27,valor28,valor29,valor30,valor31,observacion) values (:asesor,:caso,:mes,:producto,:motivo,:submotivo,:valor1,:valor2,:valor3,:valor4,:valor5,:valor6,:valor7,:valor8,:valor9,:valor10,:valor11,:valor12,:valor13,:valor14,:valor15,:valor16,:valor17,:valor18,:valor19,:valor20,:valor21,:valor22,:valor23,:valor24,:valor25,:valor26,:valor27,:valor28,:valor29,:valor30,:valor31,:observacion)";
	$statement  =  $bd->prepare($query);
	
	$statement->bindParam(':asesor',$asesor);
	$statement->bindParam(':caso',$caso);
	$statement->bindParam(':mes',$mes);
	$statement->bindParam(':producto',$producto);
	$statement->bindParam(':motivo',$motivo);
	$statement->bindParam(':submotivo',$submotivo);
	
    $statement->bindParam(':valor1',$valor1);
    $statement->bindParam(':valor2',$valor2);
    $statement->bindParam(':valor3',$valor3);
    $statement->bindParam(':valor4',$valor4);
    $statement->bindParam(':valor5',$valor5);
    $statement->bindParam(':valor6',$valor6);
    $statement->bindParam(':valor7',$valor7);
    $statement->bindParam(':valor8',$valor8);
    $statement->bindParam(':valor9',$valor9);
    $statement->bindParam(':valor10',$valor10);
    $statement->bindParam(':valor11',$valor11);
    $statement->bindParam(':valor12',$valor12);
    $statement->bindParam(':valor13',$valor13);
    $statement->bindParam(':valor14',$valor14);
    $statement->bindParam(':valor15',$valor15);
    $statement->bindParam(':valor16',$valor16);
    $statement->bindParam(':valor17',$valor17);
    $statement->bindParam(':valor18',$valor18);
    $statement->bindParam(':valor19',$valor19);
    $statement->bindParam(':valor20',$valor20);
    $statement->bindParam(':valor21',$valor21);
    $statement->bindParam(':valor22',$valor22);
    $statement->bindParam(':valor23',$valor23);
    $statement->bindParam(':valor24',$valor24);
    $statement->bindParam(':valor25',$valor25);
    $statement->bindParam(':valor26',$valor26);
    $statement->bindParam(':valor27',$valor27);
	$statement->bindParam(':valor28',$valor28);
	$statement->bindParam(':valor29',$valor29);
	$statement->bindParam(':valor30',$valor30);
	$statement->bindParam(':valor31',$valor31);

    $statement->bindParam(':observacion',$observacion);

	if ($statement) {
		$statement->execute();
		return "ok";
	} else {
		return "error";
	}
	
	
	
	
    
  } catch (Exception $e) {

  	echo "Error .... :-)-->: ".$e->getMessage();
  	
  }


}


function eliminar($id)
{  

try {
	

$bd         =  Conexion::get_conexion();
$query      =  "DELETE FROM tb_cuestionario WHERE id=:id";
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


function actualizar($id,$caso,$mes,$producto,$motivo,$submotivo,$cajero,$valor31,$valor32)
{  

	try {
		

	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_cuestionario SET caso=:caso,mes=:mes,producto=:producto,motivo=:motivo,submotivo=:submotivo,cajero=:cajero,valor31=:valor31,valor32=:valor32 WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':caso',$caso);
	$statement->bindParam(':mes',$mes);
	$statement->bindParam(':producto',$producto);
	$statement->bindParam(':motivo',$motivo);
	$statement->bindParam(':submotivo',$submotivo);
	$statement->bindParam(':cajero',$cajero);
	$statement->bindParam(':valor31',$valor31);
	$statement->bindParam(':valor32',$valor32);
	
	
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