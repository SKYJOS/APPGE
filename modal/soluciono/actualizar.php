 <?php 

include '../../autoload.php';
$id=$_GET['id'];
$usuario=new Soluciono();


 ?>
 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="id" value="<?php echo $id;?>">
 
     <div class="row">
          <div class="col-md-12">
            <div class="form-group">
                      <label>¿Cómo se Soluciono?</label>           
                      <textarea name="soluciono" id="soluciono" class="form-control" rows="3" id="comment"><?php echo $usuario->consulta($id,'soluciono'); ?></textarea>
              </div>
          </div>
          
                    
     </div>        
 	

  <button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/soluciono/actualizar.php",
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