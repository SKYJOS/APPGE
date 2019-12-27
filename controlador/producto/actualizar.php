<?php 

include '../../autoload.php';

$cod_tipo=$_POST['id'];
$descripcion=$_POST['producto'];

$usuario=new Producto();
$valor=$usuario->actualizar($cod_tipo,$descripcion);

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