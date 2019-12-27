<?php
$mysqli=new mysqli('localhost','root','','db_caso');
if ($mysqli->connect_errno) {
  echo "Error al conectarse con My SQL debido al error".$mysqli->connect_error;
}
sleep(2);
$usu=trim($_POST['usuariolg']);
$pass=$_POST['passlg'];


session_start();
$_SESSION['usuario']= $_POST["usuariolg"];

$usuarios=$mysqli->query("Select concat(tipo,estado) as tipos
                        From tb_usuario Where cod_asesores='".$usu."'
                      AND pass='".$pass."'");


if ($usuarios->num_rows==1):
  $datos= $usuarios->fetch_assoc();

    echo json_encode(array('error'=>false,'tipos'=>$datos['tipos']));

else:

    echo json_encode(array('error'=>true));
       
endif;



$mysqli->close();
 ?>
