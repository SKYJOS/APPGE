<?php 

include '../../autoload.php';
$id=$_POST['id'];

$usuario=new Cuestionario();
$valor=$usuario->eliminar($id);


if ($valor=='ok') {
	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Registro Eliminado",
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