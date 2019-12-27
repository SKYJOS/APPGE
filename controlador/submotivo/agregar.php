<?php 

include '../../autoload.php';

$soluciono=($_POST['submotivo']);



$registro=new Submotivo();
$valor=$registro->agregar($soluciono);


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