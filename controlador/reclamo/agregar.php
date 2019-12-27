<?php 

include '../../autoload.php';
$reclamo=($_POST['reclamo']);
$contrato=($_POST['contrato']);
$producto=($_POST['producto']);
$compania=($_POST['municipios']);
$problematica=($_POST['problematica']);
$observaciones=($_POST['observaciones']);


$usuario=new Reclamo();
$valor=$usuario->agregar($reclamo,$contrato,$producto,$compania,$problematica,$observaciones);


if ($valor=='ok') {
	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Registro Agregado",
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