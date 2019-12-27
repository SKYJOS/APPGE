<?php

include('conexion.php');
$codigo = $_POST['elegido'];


 ?>

 <script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#submotivo").change(function () {
$("#submotivo option:selected").each(function () {
elegido=$(this).val();
$.post("informacion_cont.php", { elegido: elegido }, function(data){
$("#idcontenido").html(data);
});     
});
});    
});
</script>
<br>
<br>
<label for="email" class ="control-label col-sm-2">SubMotivo</label>
<div class="col-sm-12">
			<select name="submotivo" id="submotivo" class="form-control" required>
			<option value="">Seleccione</option>
			<?php
			$query  ="SELECT * FROM tb_submotivo_cue WHERE motivo='$codigo'";
			$result = $db->query($query);
			while($fila = mysqli_fetch_object($result)){	
				
					echo "<option value='$fila->id'>$fila->submotivo</option>";
				
					
				}
			?>
			</select>
 
 




</div>
<br>