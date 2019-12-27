<?php 

include '../../autoload.php';


$id=($_POST['id']);
$soluciono=($_POST['soluciono']);

$usuario=new Soluciono();
$valor=$usuario->actualizar($id,$soluciono);

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
    text: "Consulte al área de soporte",
    type:"error",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
}

 ?>
