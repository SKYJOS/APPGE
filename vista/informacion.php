<?php
include('config.php'); 
include('conexion.php');
$codigo = $_POST['elegido'];

?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idvigencia").change(function () {
$("#idvigencia option:selected").each(function () {
elegido=$(this).val();
$.post("informacion_vigencia.php", { elegido: elegido }, function(data){
$("#idvigencias").html(data);
});     
});
});    
});
</script>
<br>
<label>Campaña</label>
<select name="municipios" id="idvigencia" class="form-control">
<option value="">Seleccione</option>
<?php
$query  ="SELECT * FROM tb_tipo WHERE producto='$codigo'";
$result = $db->query($query);
while($fila = mysqli_fetch_object($result)){	
		
	
		echo "<option value='$fila->cod_tipo'>$fila->descripcion</option>";
	
		
	}
?>
</select>



