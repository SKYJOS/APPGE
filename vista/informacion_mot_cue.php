<?php

include('conexion.php');
$codigo = $_POST['elegido'];
?>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#motivo").change(function () {
$("#motivo option:selected").each(function () {
elegido=$(this).val();
$.post("informacion_sub_cue.php", { elegido: elegido }, function(data){
$("#idmotivo").html(data);
});     
});
});    
});
</script>

<label for="email" class ="control-label col-sm-2">Motivo</label>
<div class="col-sm-12">
		<select name="motivo" id="motivo" class="form-control" required>
		<option value="">Seleccione</option>
		<?php
		$query  ="SELECT * FROM tb_motivo_cue WHERE producto='$codigo'";
		$result = $db->query($query);
		while($fila = mysqli_fetch_object($result)){	
			
				echo "<option value='$fila->id'>$fila->motivo</option>";
			
				
			}
		?>
		</select>
 
 


</div>
<br>

