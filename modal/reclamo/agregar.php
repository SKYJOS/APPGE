<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo..
$("#idalumno").change(function () {
$("#idalumno option:selected").each(function () {
elegido=$(this).val();
$.post("informacion.php", { elegido: elegido }, function(data){
$("#idinformacion").html(data);
});     
});
});    
});
</script>
<script type="text/javascript">
	function NumText(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}

</script>
<script type="text/javascript">
  function Numeros(string){//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
  
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
       out += string.charAt(i);
  
    //Retornar valor filtrado
    return out;
} 
</script>
<form id="agregar" autocomplete="off"  method="post">
<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Agregar</h4>
			</div>
			<div class="modal-body">

            <div class="form-group">
	            <label>Num Reclamo</label>
	            <input type="text" name="reclamo" id="" class="form-control" maxlength=11 pattern=".{11,}" value onkeyup="this.value=Numeros(this.value)" required title="mínimo 11 caracteres">
            </div>

            <div class="form-group">
	            <label>Número de Contrato</label>
	            <input type="text" name="contrato" id="" class="form-control" maxlength=20 pattern=".{20,}" value onkeyup="this.value=Numeros(this.value)" required title="mínimo 20 caracteres">
            </div>				

	        <div class="form-group">
	            <label>Producto</label>
	            <select name="producto" id="idalumno" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$area=new Producto();
	            	foreach ($area->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['id'];?>"><?php echo $value['producto']?></option>
	            	<?php endforeach ?>
	            </select>
            </div>           
			<div id="idinformacion"></div>	
			<div id="idvigencias"></div>					
			
            <div class="form-group">
	            <label>Problemática</label>
	            <select name="problematica" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$area=new Problematica();
	            	foreach ($area->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['id']?>"><?php echo $value['problematica']?></option>
	            	<?php endforeach ?>
	            </select>
            </div>
            <div class="form-group">
			  <label for="comment">Observaciones</label>
			  <textarea name="observaciones" id="observacionesss"class="form-control" rows="5" id="comment"></textarea>
			</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</div>
		</div>
	</div>
</div>
</form>