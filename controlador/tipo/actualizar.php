<?php 

include '../../autoload.php';

$cod_tipo=$_POST['cod_tipo'];
$cod=$_POST['cod'];
$descripcion=$_POST['descripcion'];
$vigencia=$_POST['vigencia'];
$producto=$_POST['producto'];



$usuario=new Tipo();
$valor=$usuario->actualizar($cod_tipo,$cod,$descripcion,$vigencia,$producto);

if ($valor=='ok') {
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