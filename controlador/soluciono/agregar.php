<?php 

include '../../autoload.php';

$soluciono=($_POST['soluciono']);



$registro=new Soluciono();
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