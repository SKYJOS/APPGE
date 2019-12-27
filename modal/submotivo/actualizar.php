 <?php 

include '../../autoload.php';
$id=$_GET['id'];
$usuario=new Submotivo();


 ?>
 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="id" value="<?php echo $id;?>">
 
     <div class="row">
          <div class="col-md-12">
            <div class="form-group">
                      <label>Submotivo</label>           
                      <textarea name="submotivo" id="submotivo" class="form-control" rows="3" id="comment"><?php echo $usuario->consulta($id,'submotivo'); ?></textarea>
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
          url: "../controlador/submotivo/actualizar.php",
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