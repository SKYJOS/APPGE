<?php 

include '../../autoload.php';
$id=$_GET['id'];
$usuario=new Prestamo();


 ?>

 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="id" value="<?php echo $id;?>">
 
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                      <label>N° Caso</label>
                      <input type="text" name="caso" id="caso" value="<?php echo $usuario->consulta($id,'num_caso'); ?> " class="form-control" readonly >
              </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
                      <label>Días de Atención</label>
                      <input type="text" name="dias" id="dias" value="<?php echo $usuario->consulta($id,'atencion'); ?> " class="form-control" readonly>
                </div>
          </div>
         
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                      <label>DNI</label>
                      <input type="text" name="dni" id="dni" value="<?php echo $usuario->consulta($id,'documento'); ?> " class="form-control" readonly>
             </div>
          </div>
           <div class="col-md-12">
            <div class="form-group">
                      <label>Cliente</label>
                      <input type="text" name="cliente" id="cliente" value="<?php echo $usuario->consulta($id,'cliente'); ?> " class="form-control" readonly >
                </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
                      <label>N° Préstamo</label>
                      <input type="text" name="contrato" id="contrato" value="<?php echo $usuario->consulta($id,'num_prestamo'); ?> " class="form-control"  >
               </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                      <label>Producto</label>
                      <input type="text" name="producto" id="producto" value="<?php echo $usuario->consulta($id,'producto'); ?> " class="form-control" readonly>
              </div>
          </div>
          
        </div>

        <div class="form-group">
              <label>Submotivo</label>             
              <select name="submotivo" id="submotivo" class="form-control" required>                
               <option value="<?php echo $usuario->consulta($id,'id'); ?>"><?php echo  $usuario->consulta($id,'submotivo'); ?></option>               
                <?php 
                $estado=new Submotivo();
                foreach ($estado->lista() as $key => $value): ?>
                <?php if ($value['id']!==$usuario->consulta($id,'id')): ?>                  
                  <option value="<?php echo $value['id'];?>"><?php echo $value['submotivo']; ?></option>
                <?php endif ?>                  
                <?php endforeach ?>
              </select>
    
         </div>
         
          <div class="form-group">
              <label>¿Cómo se Soluciono?</label>             
              <select name="soluciono" id="soluciono" class="form-control" required>                
               <option value="<?php echo $usuario->consulta($id,'soluciono'); ?>"><?php echo  $usuario->consulta($id,'sol'); ?></option>               
                <?php 
                $estado=new Soluciono();
                foreach ($estado->lista() as $key => $value): ?>
                <?php if ($value['id']!==$usuario->consulta($id,'soluciono')): ?>                  
                  <option value="<?php echo $value['id'];?>"><?php echo $value['soluciono']; ?></option>
                <?php endif ?>                  
                <?php endforeach ?>
              </select>
    
         </div>  

          
    

        
        <div class="form-group">
                    <label>¿Quienes ayudaron a solucionarlo?</label>
                    <textarea name="ayudaron" id="ayudaron" class="form-control" rows="5" id="comment"><?php echo $usuario->consulta($id,'ayudaron'); ?></textarea>
        </div>
        <div class="form-group">
                    <label>¿Qué genero el reclamo?</label>
                    <textarea name="genero" id="genero" class="form-control" rows="5" id="comment"><?php echo $usuario->consulta($id,'genero'); ?></textarea>
        </div>
 	

 <button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/prestamo/actualizar.php",
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