<?php 

include '../../autoload.php';

 ?>
 <?php if (count(Soluciono::lista())>0): ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <!-- h3.panel-title{} -->
      <h3 class="panel-title">Lista de Soluciones</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table id="consulta" class="table table-condensed">
          <thead>
            <tr>
              <th>Id</th>
              <th>¿Cómo se Soluciono?</th>
     
            </tr>
          </thead>
          <tbody>
           <?php foreach (Soluciono::lista() as $key => $value): ?>
            <tr>
              <td><?php echo $value['id']; ?></td>
              <td><?php echo $value['soluciono']; ?></td>
          
              
              <td>
                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-eliminar" data-id="<?php echo $value['id'];?>"><i class="glyphicon glyphicon-trash"></i></button>
                <button class="btn btn-primary btn-edit" data-id="<?php echo $value['id'];?>"><i class="glyphicon glyphicon-edit"></i>                  
                </button>
              </td>
            </tr>
           <?php endforeach ?>
            </tbody>
        </table>
        
      </div>
    </div>
  </div>
  <!-- Modal -->
  <script>
    $(".btn-edit").click(function(){
      id = $(this).data("id");
      $.get("../modal/soluciono/actualizar.php","id="+id,function(data){
        $("#form-actualizar").html(data);
      });
      $('#modal-actualizar').modal('show');
    });
  </script>
  <div class="modal fade" id="modal-actualizar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-actualizar"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script>
    $(document).ready(function(){
        $('#consulta').DataTable();
    });
  </script>
 <?php else: ?>
  <p class="alert alert-warning">No hay registros disponibles</p>
 <?php endif ?>