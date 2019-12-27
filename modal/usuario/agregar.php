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
	            <label>Num Reclamo</label>
	            <input type="text" name="cod_reclamo" id="" class="form-control" onchange="Mayusculas(this)">
            </div>

            <div class="form-group">
	            <label>Número de Contrato</label>
	            <input type="text" name="documento" id="" class="form-control" onchange="Mayusculas(this)">
            </div>	
            <div class="form-group">
	            <label>Producto</label>
	            <select name="area" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$area=new Tipo();
	            	foreach ($area->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['cod_tipo']?>"><?php echo $value['descripcion']?></option>
	            	<?php endforeach ?>
	            </select>
            </div>
            <div class="form-group">
	            <label>Campaña</label>
	            <select name="area" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$area=new Tipo();
	            	foreach ($area->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['cod_tipo']?>"><?php echo $value['descripcion']?></option>
	            	<?php endforeach ?>
	            </select>
            </div>
           
            <div class="form-group">
	            <label>Problemática</label>
	            <select name="area" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$area=new Tipo();
	            	foreach ($area->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['cod_tipo']?>"><?php echo $value['descripcion']?></option>
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