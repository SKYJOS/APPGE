<?php include '../autoload.php'; 

Assets::principal('Lista de Préstamo');
Assets::datatables();
Assets::sweetalert();
Html::header();
?>  

  
  <div class="row">
    <div class="col-md-12">
      <?php include'../vista/nav3.php'; ?>
    </div>
  </div>
 
  
      <div class="row">
        <div class="col-md-12">
        <div class="jumbotron">
          <div class="container">
            <h1>Bienvenidos!</h1>
            <center><p>Sistema General de Mantenimiento</p></center>
          
          </div>
        </div>
        </div>
      </div>

   

  
  <script src="../ajax/prestamo.js"></script>
  <script>loadTable();</script>
  <?php Html::footer('Atento - BBVA'); ?>
