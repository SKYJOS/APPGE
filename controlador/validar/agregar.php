<?php 

include '../../autoload.php';

$cod_asesores=($_POST['cod_asesores']);
$pass=($_POST['pass']);
$tipo=($_POST['tipo']);


$registro=new user();
$valor=$registro->agregar($cod_asesores,$pass,$tipo);


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
    text: "El usuario  no exite en la base de datos",
    type:"error",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
}


 ?>