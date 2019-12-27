<?php 

include '../../autoload.php';

$id     =$_POST['id'];
$reclamo=($_POST['reclamo']);
$contrato=($_POST['contrato']);
$tipo=($_POST['tipo']);

$producto=($_POST['div-producto']);
$problematica=($_POST['problematica']);
$observaciones=($_POST['observaciones']);

if ($tipo=='opcion1') 
{
  
$data  =  Reclamo::actualizar_1($id,$reclamo,$contrato,$producto,$problematica,$observaciones);



}
else if ($tipo=='opcion2')
{

    $producto=($_POST['producto']);
    $datas  =  Producto::consulta($producto,'producto');
    $compania=($_POST['municipios']); 
    $data  =  Reclamo::actualizar_2($id,$reclamo,$contrato,$datas,$compania,$problematica,$observaciones);
}

if ($data=='ok') {
	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Registro Actualizado",
    type:"success",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
} else {
	echo '<script>
    swal({
    title: "Error",
    text: "Consulte al area de soporte",
    type:"error",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
}

 ?>