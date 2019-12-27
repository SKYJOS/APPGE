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
<form id="agregar" autocomplete="off">
<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Agregar</h4>
			</div>
			<div class="modal-body">
            
            <div class="form-group">
	            <label>ID</label>
	            <input type="text" name="cod" id="" class="form-control" value onkeyup="this.value=Numeros(this.value)">
            </div>

            <div class="form-group">
	            <label>Campaña</label>
	            <input type="text" name="descripcion" id="" class="form-control" onchange="Mayusculas(this)">
            </div>
            <div class="form-group">
			  <label for="comment">Vigencia</label>
			  <textarea name="vigencia" id="" rows="5" class="form-control" onchange="Mayusculas(this)"></textarea>
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
            

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</div>
		</div>
	</div>
</div>
</form>