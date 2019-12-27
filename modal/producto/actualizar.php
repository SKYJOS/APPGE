<?php 

include '../../autoload.php';
$id=$_GET['id'];
$usuario=new Producto();


 ?>
 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="id" value="<?php echo $id;?>">
 	<div class="form-group" >
 		<label for="">Producto</label>
 		<input type="text" name="producto" id="" class="form-control" value="<?php echo $usuario->consulta($id,'producto'); ?> " onchange="Mayusculas(this)">
 	</div>	
 	

 <button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/producto/actualizar.php",
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