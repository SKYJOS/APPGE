<?php 

include '../../autoload.php';
$id=$_GET['id'];
$usuario=new Problematica();


 ?>
 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="id" value="<?php echo $id;?>">
 	<div class="form-group" >
 		<label for="">Problemática</label>
 		<input type="text" name="problematica" id="" class="form-control" value="<?php echo $usuario->consulta($id,'problematica'); ?> " onchange="Mayusculas(this)">
 	</div>	
 	

 <button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/problematica/actualizar.php",
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