
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">REGISTRO DE RECLAMOS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php //session_start(); ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">APLICACIONES <span class="caret"></span></a>
          <ul class="dropdown-menu">
   
            <li><a href="http://localhost/APPGE/vista/prestamo_asesores.php">SISPRES</a></li>
            <li><a href="http://localhost/APPGE/vista/reclamo_asesor.php">SISCAM</a></li>
            <li><a href="http://localhost/APPGE/vista/cuestionario_asesor.php">CUESTIONARIO</a>
                  

          </ul>
        </li>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="#"><i class="glyphicon glyphicon-user text-success"></i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/APPGE/controlador/logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
