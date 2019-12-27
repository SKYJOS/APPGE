<?php
include('config.php'); 
include('conexion.php');
$codigo = $_POST['elegido'];


?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idcampania").change(function () {
$("#idcampania option:selected").each(function () {
elegidos=$(this).val();
$.post("informacion_dependencia.php", { elegido: elegidos }, function(data){
$("#x").html(data);
});     
});
});    
});
</script>
<br>
<label>Campaña</label>
<select name="municipios" id="idcampania" class="form-control">
<option value="">Seleccione</option>
<?php
$query  ="SELECT * FROM tb_tipo WHERE producto='$codigo'";
$result = $db->query($query);
while($fila = mysqli_fetch_object($result)){	
		
	
		echo "<option value='$fila->cod_tipo'>$fila->descripcion</option>";
	
		
	}
?>
</select>



