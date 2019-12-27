<?php 

include'../../autoload.php';

$id  =  $_GET['id'];

 ?>

<!-- hidden checkbox -->
<script>
$(document).ready(function(){
$(".opcion").click(function(evento){

  var valor = $(this).val();

  if(valor == 'opcion2'){
      $("#div2").css("display", "block");
      $("#div1").css("display", "none");
      $("#opcion1").prop('checked', false); 
      $("#tipo").val('tipo2');
  }else{
      $("#div2").css("display", "none");
      $("#div1").css("display", "block");
      $("#opcion2").prop('checked', false); 
      $("#tipo").val('tipo1');
  }
});
});
</script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo..
$("#idproducto").change(function () {
$("#idproducto option:selected").each(function () {
elegido=$(this).val();
$.post("informacion2.php", { elegido: elegido }, function(data){
$("#idinformaciones").html(data);
});     
});
});    
});
</script>



 <form  id="actualizar" novalidate method="post">


<input type="hidden" name="id" value="<?php echo $id ?>">
   
<div class="form-group">
<label>Num Reclamo</label>
<input type="text" name="reclamo" id="" class="form-control" maxlength=11 pattern=".{11,}" required title="mínimo 11 caracteres"onchange="Mayusculas(this)"
value="<?php echo Reclamo::consulta($id,'reclamo'); ?>">
</div>


<div class="form-group">
<label>Número de Contrato</label>
<input type="text" name="contrato" id="" class="form-control" onchange="Mayusculas(this)"  value="<?php echo Reclamo::consulta($id,'contrato'); ?>">
</div>  


<label >Desea actualizar la dependencia:</label><br>

<label class="radio-inline">
<input type="radio" name="tipo" class="opcion" id="opcion1"  value="opcion1" checked > NO
</label>
<label class="radio-inline">
<input type="radio" name="tipo" class="opcion" id="opcion2"  value="opcion2"  > SI
</label>


<!-- Datos Estaticos -->
<div id="div1">   
  <div class="form-group">
  <label>Producto</label>
  <input type="hidden" name="div-producto"  class="form-control" onchange="Mayusculas(this)"
  value="<?php echo Reclamo::consulta($id,'producto'); ?>" readonly>
  <input type="text" name="producto"  class="form-control" onchange="Mayusculas(this)"
  value="<?php echo Reclamo::consulta($id,'nom'); ?>" readonly>
  </div>
</div>


<!-- Datos Dinamicos -->
<div id="div2"  style="display:none;">

<div class="form-group">
  <label>Producto</label>
  <select name="producto" id="idproducto" class="form-control" required>
  <option value="">[Seleccionar]</option>
  <?php 
  $area=new Producto();
  foreach ($area->lista() as $key => $value): ?>
  <option value="<?php echo $value['id'];?>"><?php echo $value['producto']?></option>
  <?php endforeach ?>
  </select>
</div>

<div id="idinformaciones"></div>  
<div id="x"></div>

</div>

<div class="form-group">
              <label>Problemática</label>             
              <select name="problematica" id="problematica" class="form-control" required>                
               <option value="<?php echo Reclamo::consulta($id,'pro'); ?>"><?php echo  Reclamo::consulta($id,'problematica'); ?></option>               
                <?php 
                $estado=new Problematica();
                foreach ($estado->lista() as $key => $value): ?>
                <?php if ($value['id']!==Reclamo::consulta($id,'pro')): ?>                  
                  <option value="<?php echo $value['id'];?>"><?php echo $value['problematica']; ?></option>
                <?php endif ?>                  
                <?php endforeach ?>
              </select>
    
</div>

<div class="form-group">
        <label for="comment">Observaciones</label>
        <textarea name="observaciones" id="observacionesss" class="form-control" rows="5" id="comment"><?php echo Reclamo::consulta($id,'observaciones'); ?></textarea>
      </div>
<button class="btn btn-primary">Actualizar</button>
 </form>

  <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/reclamo/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#modal-actualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTable();
          }
      });
  });
</script>
