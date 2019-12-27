

	<script>
	$(document).ready(function(){
	
		// generamos un evento cada vez que se pulse una tecla
		$("#caso").keyup(function(){
		
			// enviamos una petición al servidor mediante AJAX enviando el id
			// introducido por el usuario mediante POST
			$.post("informacion_pre.php", {"caso":$("#caso").val()}, function(data){
			
				// Si devuelve un nombre lo mostramos, si no, vaciamos la casilla
				if(data.cliente)
					$("#cliente").val(data.cliente);
				else
					$("#cliente").val("");
					
				// Si devuelve un apellido lo mostramos, si no, vaciamos la casilla
				if(data.dni)
					$("#dni").val(data.dni);
				else
					$("#dni").val("");				

				if(data.producto)
					$("#producto").val(data.producto);
				else
					$("#producto").val("");

				if(data.dias)
					$("#dias").val(data.dias);
				else
					$("#dias").val("");			


			},"json");
		});
	});
</script>
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
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
<form id="agregar" autocomplete="off">
<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Agregar</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							            <label>N° DNI-Asesor</label>
							            <input type="text" name="asesor" id="asesor" maxlength=8 pattern=".{8,}" value onkeyup="this.value=Numeros(this.value)" required title="mínimo 8 caracteres" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							            
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							            
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					            <label>N° Caso</label>
					            <input type="text" name="caso" id="caso" maxlength=11 pattern=".{11,}" value onkeyup="this.value=Numeros(this.value)" required title="mínimo 11 caracteres" class="form-control">
					    </div>
					</div>
					<div class="col-md-6">
						 <div class="form-group">
					            <label>Días de Atención</label>
					            <input type="text" name="dias" id="dias" value="" class="form-control" readonly>
				   	    </div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					            <label>Cliente</label>
					            <input type="text" name="cliente" id="cliente" value="" class="form-control" readonly >
				        </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					            <label>DNI</label>
					            <input type="text" name="dni" id="dni" value="" class="form-control" readonly>
					   </div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
					            <label>N° Préstamo</label>
					            <input type="text" name="contrato" id="contrato" value onkeyup="this.value=Numeros(this.value)" class="form-control" >
				  	   </div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					            <label>Producto</label>
					            <input type="text" name="producto" id="producto" value="" class="form-control" readonly>
					    </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
			            <label>Casuíticas</label>
			            <select name="submotivo" id="submotivo" class="form-control" required>
			            	<option value="">[Seleccionar]</option>
			            	<?php 
							$area=new Submotivo();
			            	foreach ($area->lista() as $key => $value): ?>
			            		<option value="<?php echo $value['id'];?>"><?php echo $value['submotivo']?></option>
			            	<?php endforeach ?>
			            </select>
		            </div>
					</div>
				</div>
				
				<div class="form-group">
					 <div class="row">
					   <div class="col-md-12">
			            <label>¿Cómo se Soluciono?</label>
			            <select name="soluciono" id="soluciono" class="form-control" >
			            	<option value="">[Seleccionar]</option>
			            	<?php 
							$area=new Soluciono();
			            	foreach ($area->lista() as $key => $value): ?>
			            		<option value="<?php echo $value['id'];?>"><?php echo $value['soluciono']?></option>
			            	<?php endforeach ?>
			            </select>
			           	
			            
			            </div>
			          

                        
					</div>

		        </div>
				<b style="color:red;">Click si no encontraste como se soluciono</b>
                        <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />

			    <div class="form-group">
					<div id="content" style="display: none;">
							   <textarea name="soluciono2" id="soluciono" class="form-control" rows="5" id="comment"></textarea>
					</div>
				</div>	
						<div class="form-group">
				            <label>¿Qué personal dio la instrucción para la atención del reclamo?</label>
				            <textarea name="ayudaron" id="ayudaron" class="form-control" rows="5" id="comment"></textarea>
		                </div>
					    <div class="form-group">
				            <label>¿Qué genero el reclamo?</label>
				            <textarea name="genero" id="genero" class="form-control" rows="5" id="comment"></textarea>
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