	
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



<form id="agregar" autocomplete="off" name="radio1">
<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cuestionario</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
				            <label>N° DNI-Asesor</label>
				            <input type="text" name="asesor" id="asesor" maxlength=8 pattern=".{8,}" required title="mínimo 8 caracteres" value onkeyup="this.value=NumText(this.value)" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						
							<label>N° Caso</label>
					            <input type="text" name="caso" id="caso" maxlength=11 pattern=".{11,}" required title="mínimo 11 caracteres" value onkeyup="this.value=NumText(this.value)" class="form-control">							            
						
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="form-group">
					            <label>Mes registro de reclamo</label>
					            <select name="mes" id="mes" class="form-control" required>
				            	<option value="">[Seleccionar]</option>
				            	<option value="Enero">Enero</option>
				            	<option value="Febrero">Febrero</option>
				            	<option value="Marzo">Marzo</option>
				            	<option value="Abril">Abril</option>
				            	<option value="Mayo">Mayo</option>
				            	<option value="Junio">Junio</option>	
				            	<option value="Julio">Julio</option>
				            	<option value="Agosto">Agosto</option>
				            	<option value="Setiembre">Setiembre</option>	
				            	<option value="Octubre">Octubre</option>
				            	<option value="Noviembre">Noviembre</option>
				            	<option value="Diciembre">Diciembre</option>			            	
				            </select>
				   	    	</div>							            
						</div>
					</div>
				</div>

				<script type="text/javascript" charset="utf-8">
					$(document).ready(function() {
					// Parametros para el combo
					$("#producto").change(function () {
					$("#producto option:selected").each(function () {
					elegido=$(this).val();
					$.post("informacion_mot_cue.php", { elegido: elegido }, function(data){
					$("#idproducto").html(data);
					});     
					});
					});    
					});
				</script>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
			            	<label>Producto</label>
				            <select name="producto" id="producto" class="form-control" required>
				            	<option value="">[Seleccionar]</option>
				            	<?php 
								$area=new CuestionarioProductos();
				            	foreach ($area->lista() as $key => $value): ?>
				            		<option value="<?php echo $value['id'];?>"><?php echo $value['producto']?></option>
				            	<?php endforeach ?>
				            </select>
				        </div>
					</div>					
					
					<br>
                    <br>                                      
	                        <div class="form-group">
	                        <div id="idproducto"></div> 
	                        </div>                      
                  
                    <br>
                    <br>                        
                        <div class="form-group">
                        <div id="idmotivo">                        	
                        </div>
                        </div>                      
 					<br>
                    <br>                        
                        <div class="form-group">
                        <div id="idcontenido">                        	
                        </div>
                        </div> 
				</div>


				
				<div class="form-group">
				            <label>Observaciones</label>
				            <textarea name="observacion" id="observacion" onchange="Mayusculas(this)" class="form-control" rows="5" id="comment"></textarea>
		        </div>			            
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Registrar</button>
			</div>
		</div>
	</div>
</div>
</form>
<script>
function disable() {
	document.getElementById("rad211").disabled = true;
	document.getElementById("rad21").disabled = true;
    document.getElementById("rad22").disabled = true;
    document.getElementById("rad23").disabled = true;
    document.getElementById("rad24").disabled = true;
    document.getElementById("rad25").disabled = true;
    document.getElementById("rad28").disabled = false;
}

function undisable() {
	document.getElementById("rad211").disabled = false;
	document.getElementById("rad21").disabled = false;	
    document.getElementById("rad22").disabled = false;
    document.getElementById("rad23").disabled = false;
    document.getElementById("rad24").disabled = false;
    document.getElementById("rad25").disabled = false;
    document.getElementById("rad28").disabled = true;
}

function disable2() {
	
	document.getElementById("rad20").disabled = true;
	document.getElementById("rad200").disabled = true;
    document.getElementById("rad22").disabled = true;
    document.getElementById("rad23").disabled = true;
    document.getElementById("rad24").disabled = true;
    document.getElementById("rad25").disabled = true;
    document.getElementById("rad28").disabled = true;
}

function undisable2() {
	
	document.getElementById("rad20").disabled = false;
	document.getElementById("rad200").disabled = false;	
    document.getElementById("rad22").disabled = false;
    document.getElementById("rad23").disabled = false;
    document.getElementById("rad24").disabled = false;
    document.getElementById("rad25").disabled = false;
    document.getElementById("rad28").disabled = true;
}
function disable3() {
	
	document.getElementById("rad20").disabled = true;
	document.getElementById("rad200").disabled = true;
    document.getElementById("rad21").disabled = true;
    document.getElementById("rad211").disabled = true;
    document.getElementById("rad24").disabled = true;
    document.getElementById("rad25").disabled = true;
    document.getElementById("rad28").disabled = true;
}

function undisable3() {
	
	document.getElementById("rad20").disabled = false;
	document.getElementById("rad200").disabled = false;	
    document.getElementById("rad21").disabled = false;
    document.getElementById("rad211").disabled = false;
    document.getElementById("rad24").disabled = false;
    document.getElementById("rad25").disabled = false;
    document.getElementById("rad28").disabled = true;
}
function disable4() {
	
	document.getElementById("rad20").disabled = true;
	document.getElementById("rad200").disabled = true;
    document.getElementById("rad21").disabled = true;
    document.getElementById("rad211").disabled = true;
    document.getElementById("rad22").disabled = true;
    document.getElementById("rad23").disabled = true;
    document.getElementById("rad28").disabled = true;
}

function undisable4() {
	
	document.getElementById("rad20").disabled = false;
	document.getElementById("rad200").disabled = false;	
    document.getElementById("rad21").disabled = false;
    document.getElementById("rad211").disabled = false;
    document.getElementById("rad22").disabled = false;
    document.getElementById("rad23").disabled = false;
    document.getElementById("rad28").disabled = true;
}
/*MEMBRESIA*/
function disable5() {
	
	document.getElementById("rad4").disabled = true;
	document.getElementById("rad44").disabled = true;
    document.getElementById("rad29").disabled = true;
    document.getElementById("rad299").disabled = true;
    document.getElementById("rad5").disabled = true;
    document.getElementById("rad55").disabled = true;
    document.getElementById("rad6").disabled = true;
    document.getElementById("rad66").disabled = true;
    document.getElementById("rad7").disabled = true;
    document.getElementById("rad77").disabled = true;
    document.getElementById("rad8").disabled = true;
    document.getElementById("rad88").disabled = true;
    document.getElementById("rad9").disabled = true;
    document.getElementById("rad99").disabled = true;
    document.getElementById("rad10").disabled = true;
    document.getElementById("rad11").disabled = true;
    document.getElementById("rad111").disabled = true;
    document.getElementById("rad12").disabled = true;
}

function undisable5() {
	
	document.getElementById("rad4").disabled = false;
	document.getElementById("rad44").disabled = false;	
    document.getElementById("rad29").disabled = false;
    document.getElementById("rad299").disabled = false;
    document.getElementById("rad5").disabled = false;
    document.getElementById("rad55").disabled = false;
    document.getElementById("rad6").disabled = false;
    document.getElementById("rad66").disabled = false;
    document.getElementById("rad7").disabled = false;
    document.getElementById("rad77").disabled = false;
    document.getElementById("rad8").disabled = false;
    document.getElementById("rad88").disabled = false;
    document.getElementById("rad9").disabled = false;
    document.getElementById("rad99").disabled = false;
    document.getElementById("rad10").disabled = false;
    document.getElementById("rad11").disabled = false;
    document.getElementById("rad111").disabled = false;
    document.getElementById("rad12").disabled = false;
}
function disable6() {
	
	document.getElementById("rad3").disabled = true;
	document.getElementById("rad33").disabled = true;
    document.getElementById("rad29").disabled = true;
    document.getElementById("rad299").disabled = true;
    document.getElementById("rad5").disabled = true;
    document.getElementById("rad55").disabled = true;
    document.getElementById("rad6").disabled = true;
    document.getElementById("rad66").disabled = true;
    document.getElementById("rad7").disabled = true;
    document.getElementById("rad77").disabled = true;
    document.getElementById("rad8").disabled = true;
    document.getElementById("rad88").disabled = true;
    document.getElementById("rad9").disabled = true;
    document.getElementById("rad99").disabled = true;
    document.getElementById("rad10").disabled = true;
    document.getElementById("rad11").disabled = true;
    document.getElementById("rad111").disabled = true;
    document.getElementById("rad12").disabled = true;
}

function undisable6() {
	
	document.getElementById("rad3").disabled = false;
	document.getElementById("rad33").disabled = false;	
    document.getElementById("rad29").disabled = false;
    document.getElementById("rad299").disabled = false;
    document.getElementById("rad5").disabled = false;
    document.getElementById("rad55").disabled = false;
    document.getElementById("rad6").disabled = false;
    document.getElementById("rad66").disabled = false;
    document.getElementById("rad7").disabled = false;
    document.getElementById("rad77").disabled = false;
    document.getElementById("rad8").disabled = false;
    document.getElementById("rad88").disabled = false;
    document.getElementById("rad9").disabled = false;
    document.getElementById("rad99").disabled = false;
    document.getElementById("rad10").disabled = false;
    document.getElementById("rad11").disabled = false;
    document.getElementById("rad111").disabled = false;
    document.getElementById("rad12").disabled = false;
}
function disable7() {
	
	document.getElementById("rad3").disabled = true;
	document.getElementById("rad33").disabled = true;
    document.getElementById("rad29").disabled = true;
    document.getElementById("rad299").disabled = true;
    document.getElementById("rad5").disabled = true;
    document.getElementById("rad55").disabled = true;
    document.getElementById("rad6").disabled = true;
    document.getElementById("rad66").disabled = true;
    document.getElementById("rad7").disabled = true;
    document.getElementById("rad77").disabled = true;
    document.getElementById("rad8").disabled = true;
    document.getElementById("rad88").disabled = true;
    document.getElementById("rad4").disabled = true;
    document.getElementById("rad44").disabled = true;
    document.getElementById("rad10").disabled = true;
    document.getElementById("rad11").disabled = true;
    document.getElementById("rad111").disabled = true;
    document.getElementById("rad12").disabled = true;
}

function undisable7() {
	
	document.getElementById("rad3").disabled = false;
	document.getElementById("rad33").disabled = false;	
 
    document.getElementById("rad5").disabled = false;
    document.getElementById("rad55").disabled = false;
    document.getElementById("rad6").disabled = false;
    document.getElementById("rad66").disabled = false;
    document.getElementById("rad7").disabled = false;
    document.getElementById("rad77").disabled = false;
    document.getElementById("rad8").disabled = false;
    document.getElementById("rad88").disabled = false;

    document.getElementById("rad10").disabled = false;
    document.getElementById("rad11").disabled = false;
    document.getElementById("rad111").disabled = false;
    document.getElementById("rad12").disabled = false;
}

function disable8() {
	
	
   
    document.getElementById("rad5").disabled = true;
    document.getElementById("rad55").disabled = true;
    document.getElementById("rad6").disabled = true;
    document.getElementById("rad66").disabled = true;
    document.getElementById("rad7").disabled = true;
    document.getElementById("rad77").disabled = true;
    document.getElementById("rad8").disabled = true;
    document.getElementById("rad88").disabled = true;
    document.getElementById("rad9").disabled = true;
    document.getElementById("rad99").disabled = true;
    document.getElementById("rad10").disabled = true;
    document.getElementById("rad11").disabled = true;
    document.getElementById("rad111").disabled = true;
    document.getElementById("rad12").disabled = true;
}

function undisable8() {
	
	
    document.getElementById("rad29").disabled = false;
    document.getElementById("rad299").disabled = false;
    document.getElementById("rad5").disabled = false;
    document.getElementById("rad55").disabled = false;
    document.getElementById("rad6").disabled = false;
    document.getElementById("rad66").disabled = false;
    document.getElementById("rad7").disabled = false;
    document.getElementById("rad77").disabled = false;
    document.getElementById("rad8").disabled = false;
    document.getElementById("rad88").disabled = false;
    document.getElementById("rad9").disabled = false;
    document.getElementById("rad99").disabled = false;
    document.getElementById("rad4").disabled = false;
    document.getElementById("rad44").disabled = false;
    document.getElementById("rad10").disabled = false;
    document.getElementById("rad11").disabled = false;
    document.getElementById("rad111").disabled = false;
    document.getElementById("rad12").disabled = false;
}
</script>