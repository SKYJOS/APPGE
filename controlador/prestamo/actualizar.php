<?php 

include '../../autoload.php';


$id=($_POST['id']);
$caso=($_POST['caso']);
$cliente=($_POST['cliente']);
$dni=($_POST['dni']);
$contrato=($_POST['contrato']);
$producto=($_POST['producto']);
$dias=($_POST['dias']);

$soluciono=($_POST['soluciono']);
$ayudaron=($_POST['ayudaron']);
$genero=($_POST['genero']);
$submotivo=($_POST['submotivo']);


$usuario=new Prestamo();
$valor=$usuario->actualizar($id,$caso,$cliente,$dni,$contrato,$producto,$dias,$soluciono,$ayudaron,$genero,$submotivo);

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
