<?php
include('config.php'); 
include('conexion.php');
$codigo = $_POST['elegido'];

$query  ="SELECT * FROM tb_tipo WHERE cod_tipo='$codigo'";
$result = $db->query($query);
$dato   = mysqli_fetch_array($result);
 ?>
<br>
 

<label for="comment">Vigencia</label> 
 <textarea name="observaciones" id="observacionesss" class="form-control" rows="5" id="comment" disabled>
<?php echo $dato['vigencia']; ?>			  	
</textarea>
<label for="comment">Detalle</label>
 <textarea name="detalle" id="detalle" class="form-control" rows="5" id="comment" disabled>
<?php echo $dato['detalle']; ?>			  	
</textarea>
 
 




