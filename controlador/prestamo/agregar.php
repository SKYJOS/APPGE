<?php 

include '../../autoload.php';

$id=($_POST['caso']);
$cliente=($_POST['cliente']);
$dni=($_POST['dni']);
$contrato=($_POST['contrato']);
$producto=($_POST['producto']);
$dias=($_POST['dias']);
$soluciono2=($_POST['soluciono2']);




if (isset($_POST['check'])){
      $check2=$_POST['check'];

}
else{
     $check2="2";
}

$soluciono=($_POST['soluciono']);
$ayudaron=$_POST['ayudaron'];
$genero=($_POST['genero']);
$submotivo=($_POST['submotivo']);
$dni=($_POST['asesor']);

if($check2=="1")
{   
    $registro=new Prestamo();
    $valor=$registro->agregar($id,$cliente,$dni,$contrato,$producto,$dias,$soluciono2,$ayudaron,$genero,$submotivo,$dni);


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
}
else {
    $registro=new Prestamo();
    $valor=$registro->agregar($id,$cliente,$dni,$contrato,$producto,$dias,$soluciono,$ayudaron,$genero,$submotivo,$dni);
    

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
    }
 ?>