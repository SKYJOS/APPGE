<?php 

include '../../autoload.php';
$id = $_GET['id'];



 ?>
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
          // Parametros para el combo
          $("#idproducto").change(function () {
          $("#idproducto option:selected").each(function () {
          elegido=$(this).val();
          $.post("informacion_mot_cue.php", { elegido: elegido }, function(data){
          $("#x").html(data);
          });     
          });
          });    
          });
        </script>
           

 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                    <label>N° DNI-Asesor</label>
                    <input type="text" name="asesor" id="asesor" maxlength=8 pattern=".{8,}" required title="mínimo 8 caracteres" value="<?php echo Cuestionario::consulta($id,'asesor'); ?> " readonly class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>N° Caso</label>
                      <input type="text" name="caso" id="caso" maxlength=11 pattern=".{11,}" required title="mínimo 11 caracteres" value="<?php echo Cuestionario::consulta($id,'caso'); ?> " class="form-control">                         
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="form-group">
                      <label>Mes registro de reclamo</label>
                      <select name="mes" id="" class="form-control" required>  
                        <option value="<?php echo Cuestionario::consulta($id,'mes'); ?>"><?php echo  Cuestionario::consulta($id,'mes'); ?></option> 

                          <?php 
                          $estado=new Mes();
                          foreach ($estado->lista() as $key => $value): ?>
                          <?php if ($value['mes']!==Cuestionario::consulta($id,'mes')): ?>
                            <option value="<?php echo $value['id']?>"><?php echo $value['mes']?></option>
                          <?php endif ?>
                            
                          <?php endforeach ?>
                      </select>
                      
                  </div>                          
            </div>
          </div>
        
               
   </div>      
  <!--fin de row-->     
         <div class="form-group">
              <label>Producto</label>
                      <input type="text" name="producto" id="producto" maxlength=11 pattern=".{11,}" required title="mínimo 11 caracteres" value="<?php echo Cuestionario::consulta($id,'producto'); ?> " class="form-control">                         
          </div>
          <div class="form-group">
              <label>Motivo</label>
                      <input type="text" name="motivo" id="motivo" maxlength=11 pattern=".{11,}" required title="mínimo 11 caracteres" value="<?php echo Cuestionario::consulta($id,'motivo'); ?> " class="form-control">                         
          </div>
          <div class="form-group">
              <label>Submotivo</label>
                      <input type="text" name="submotivo" id="submotivo" maxlength=11 pattern=".{11,}" required title="mínimo 11 caracteres" value="<?php echo Cuestionario::consulta($id,'submotivo'); ?> " class="form-control">                         
          </div>

 
        
 <button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/cuestionario/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#modal-actualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTable();
          }
      });
  });
</script>