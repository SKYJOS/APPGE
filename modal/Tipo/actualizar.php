<?php 

include '../../autoload.php';
$cod_tipo=$_GET['id'];
$usuario=new Tipo();


 ?>
 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="cod_tipo" value="<?php echo $cod_tipo;?>">
  <div class="form-group" >
    <label for="">ID</label>
    <input type="text" name="cod" id="" class="form-control" value="<?php echo $usuario->consulta($cod_tipo,'cod'); ?> " onchange="Mayusculas(this)">
  </div>  
 	<div class="form-group" >
 		<label for="">Campaña</label>
 		<input type="text" name="descripcion" id="" class="form-control" value="<?php echo $usuario->consulta($cod_tipo,'descripcion'); ?> " onchange="Mayusculas(this)">
 	</div>	
 	 <div class="form-group">
        <label for="comment">Vigencia</label>
        <textarea name="vigencia" id=""class="form-control" rows="5" id="comment">
         <?php echo $usuario->consulta($cod_tipo,'vigencia');  ?>
        </textarea>
      </div>
      <div class="form-group">
              <label>Producto</label>
              <select name="producto" id="" class="form-control" required="">
                <option value="<?php echo $usuario->consulta($cod_tipo,'id'); ?>"><?php echo  $usuario->consulta($cod_tipo,'producto')?></option>
                <?php 
                $area=new Producto();
                foreach ($area->lista() as $key => $value): ?>
                <?php if ($usuario->consulta($cod_tipo,'producto')!==$value['producto']): ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['producto']; ?></option>
                <?php endif ?>

                <?php endforeach ?>
              </select>
      </div>  

 <button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/tipo/actualizar.php",
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