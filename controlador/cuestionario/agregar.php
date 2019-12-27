<?php 

include '../../autoload.php';

$asesor=($_POST['asesor']);
$caso=($_POST['caso']);
$mes=($_POST['mes']);
$producto=($_POST['producto']);
$motivo=($_POST['motivo']);
$submotivo=($_POST['submotivo']);

  
/*ok*/
    if (isset($_POST['rad1'])){
          $valor1=$_POST['rad1'];

    }
    else{
          $valor1="";
    }
    if (isset($_POST['rad2'])){
          $valor2=$_POST['rad2'];

    }
    else{
          $valor2="";
    }
    if (isset($_POST['rad3'])){
          $valor3=$_POST['rad3'];

    }
    else{
          $valor3="";
    }
    if (isset($_POST['rad4'])){
          $valor4=$_POST['rad4'];

    }
    else{
          $valor4="";
    }
    if (isset($_POST['rad5'])){
          $valor5=$_POST['rad5'];

    }
    else{
          $valor5="";
    }
    if (isset($_POST['rad6'])){
          $valor6=$_POST['rad6'];

    }
    else{
          $valor6="";
    }
    if (isset($_POST['rad7'])){
          $valor7=$_POST['rad7'];

    }
    else{
          $valor7="";
    }
    if (isset($_POST['rad8'])){
          $valor8=$_POST['rad8'];

    }
    else{
          $valor8="";
    }
    if (isset($_POST['rad9'])){
          $valor9=$_POST['rad9'];

    }
    else{
          $valor9="";
    }
    if (isset($_POST['rad10'])){
          $valor10=$_POST['rad10'];

    }
    else{
          $valor10="";
    }
    if (isset($_POST['rad11'])){
          $valor11=$_POST['rad11'];

    }
    else{
          $valor11="";
    }
    if (isset($_POST['rad12'])){
          $valor12=$_POST['rad12'];

    }
    else{
          $valor12="";
    }
    if (isset($_POST['rad13'])){
          $valor13=$_POST['rad13'];

    }
    else{
          $valor13="";
    }
    if (isset($_POST['rad14'])){
          $valor14=$_POST['rad14'];

    }
    else{
          $valor14="";
    }
    if (isset($_POST['rad15'])){
          $valor15=$_POST['rad15'];

    }
    else{
          $valor15="";
    }
    if (isset($_POST['rad16'])){
          $valor16=$_POST['rad16'];

    }
    else{
          $valor16="";
    }
    if (isset($_POST['rad17'])){
          $valor17=$_POST['rad17'];

    }
    else{
          $valor17="";
    }
    if (isset($_POST['rad18'])){
          $valor18=$_POST['rad18'];

    }
    else{
          $valor18="";
    }
/*ok*/
if (isset($_POST['rad19'])){
      $valor19=$_POST['rad19'];

}
else{
      $valor19="";
}
if (isset($_POST['rad20'])){
      $valor20=$_POST['rad20'];

}
else{
      $valor20="";
}
if (isset($_POST['rad21'])){
      $valor21=$_POST['rad21'];

}
else{
      $valor21="";
}
if (isset($_POST['rad22'])){
      $valor22=$_POST['rad22'];

}
else{
      $valor22="";
}
if (isset($_POST['rad23'])){
      $valor23=$_POST['rad23'];

}
else{
      $valor23="";
}
if (isset($_POST['rad24'])){
      $valor24=$_POST['rad24'];

}
else{
      $valor24="";
}
if (isset($_POST['rad25'])){
      $valor25=$_POST['rad25'];

}
else{
      $valor25="";
}
if (isset($_POST['rad26'])){
      $valor26=$_POST['rad26'];

}
else{
      $valor26="";
}
if (isset($_POST['rad27'])){
          $valor27=$_POST['rad27'];

    }
    else{
          $valor27="";
    }
if (isset($_POST['rad28'])){
          $valor28=$_POST['rad28'];

    }
    else{
          $valor28="";
    }
if (isset($_POST['rad29'])){
          $valor29=$_POST['rad29'];

    }
    else{
          $valor29="";
    }    

if (isset($_POST['rad30'])){
          $valor30=$_POST['rad30'];

    }
    else{
          $valor30="";
    }  
if (isset($_POST['rad31'])){
          $valor31=$_POST['rad31'];

    }
    else{
          $valor31="";
    }          
    
if (isset($_POST['observacion'])){
      $observacion=$_POST['observacion'];

}
else{
      $observacion="";
}



$registro=new Cuestionario();
$valor=$registro->agregar($asesor,$caso,$mes,$producto,$motivo,$submotivo,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$valor10,$valor11,$valor12,$valor13,$valor14,$valor15,$valor16,$valor17,$valor18,$valor19,$valor20,$valor21,$valor22,$valor23,$valor24,$valor25,$valor26,$valor27,$valor28,$valor29,$valor30,$valor31,$observacion);


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
/*}
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
    }*/
 ?>