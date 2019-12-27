<?php include '../autoload.php'; 
$registro=new user();
Assets::principal('Mantenimiento');
Assets::datatables();
Assets::sweetalert();
Html::header();

?>  
  

 <?php 
  include'../vista/validar/agregar.php';
  include'../vista/validar/eliminar.php';
  ?>

  <div class="row">
    <div class="col-md-12">
        <?php include'../vista/nav2.php'; ?>

    </div>
  </div>
  
  <div class="container">
      <div class="wrapper">

        <ul id="sb-slider" class="sb-slider">
          <li>
            <img src="../images/1.jpg" alt="image1"/>
            
          </li>
          <li>
           <img src="../images/4.jpg" alt="image2"/>
          
          </li>
          <li>
           <img src="../images/5.jpg" alt="image1"/>
            
          </li>
          <li>
            <img src="../images/6.jpg" alt="image1"/>
          
          </li>
          <li>
           <img src="../images/7.jpg" alt="image1"/>
            
          </li>
          
         
        </ul>

        <div id="shadow" class="shadow"></div>

        <div id="nav-arrows" class="nav-arrows">
          <a href="#">Next</a>
          <a href="#">Previous</a>
        </div>

        <div id="nav-options" class="nav-options">
          <span id="navPlay">Play</span>
          <span id="navPause">Pause</span>
        </div>

      </div><!-- /wrapper -->


    </div>
   
    <script type="text/javascript" src="../js/jquery.slicebox.js"></script>
    <script type="text/javascript">
      $(function() {
        
          var Page = (function() {

          var $navArrows = $( '#nav-arrows' ).hide(),
            $navOptions = $( '#nav-options' ).hide(),
            $shadow = $( '#shadow' ).hide(),
            slicebox = $( '#sb-slider' ).slicebox( {
              onReady : function() {

                $navArrows.show();
                $navOptions.show();
                $shadow.show();

              },
              orientation : 'r',
              cuboidsCount : 5
            } ),
            
            init = function() {
              slicebox.play();
              initEvents();
              
            },
            initEvents = function() {

              // add navigation events
              $navArrows.children( ':first' ).on( 'click', function() {

                slicebox.next();
                return false;

              } );

              $navArrows.children( ':last' ).on( 'click', function() {
                
                slicebox.previous();
                return false;

              } );

              $( '#navPlay' ).on( 'click', function() {
                
                slicebox.play();
                return false;

              } );

              $( '#navPause' ).on( 'click', function() {
                
                slicebox.pause();
                return false;

              } );

            };

            return { init : init };

        })();

        Page.init();

      });
    </script>
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col-md-2">
         <form name="importa" method="post" action="../importar/asesores.php" enctype="multipart/form-data" onsubmit="return validar(this)">

          <div class="row">
           
                   
           </div>      
          </form>
       </div>  

      <div class="col-md-3">
         <form name="importa" method="post" action="../importar/asesores.php" enctype="multipart/form-data" onsubmit="return validar(this)">

          <div class="row">
            <div class="col-md-6">
             <div class="input-group"><input type="file" name="excel" class="form-control" required=""></div>                 
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type='submit' name='enviar'  value="Importar Asesores" class="btn btn-success" /></div>
                 
            </div>          
           </div>      
          </form>
       </div>  

       <div class="col-md-3">
          <form name="importa" method="post" action="../importar/usuarios.php" enctype="multipart/form-data" onsubmit="return validar(this)">

              <div class="row">
              <div class="col-md-6">
               <div class="input-group"><input type="file" name="excel" class="form-control" required=""></div>             
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <input type='submit' name='enviar'  value="Importar Usuarios" class="btn btn-success" /></div>           
              </div>            
            </div>    
         </form>
      </div>
       <div class="col-md-3">
          <form name="importa" method="post" action="../importar/reporte.php" enctype="multipart/form-data" onsubmit="return validar(this)">

              <div class="row">
              <div class="col-md-6">
               <div class="input-group"><input type="file" name="excel" class="form-control" required=""></div>             
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <input type='submit' name='enviar'  value="Importar Reporte" class="btn btn-success" /></div>           
              </div>             
            </div> 
         </form>
       </div> 
       <div class="col-md-3">
         <form  method="post" enctype="multipart/form-data" onsubmit="return validar(this)"> 
          <div class="row">
            <div class="col-md-12">
              <div class="input-group">
                <?php try {
                  $dbc = mysqli_connect('localhost', 'root','', 'db_caso') or die('Error connecting to MySQL server.'); 

                      if(isset($_POST['eliminar']))
                      {
                          mysqli_query($dbc, 'TRUNCATE TABLE tb_reportes');
                        //  header("Location: " . $_SERVER['PHP_SELF']);
                         // exit();
                      }
                } catch (Exception $e) {
                  echo "Error:".$e->getMessage();
                }
                      
                ?>
                <input type='submit' name='eliminar'  value="Eliminar la base" class="btn btn-success" />
              </div>  
              </div>
                           
          </div> 
       </form>                  
       </div> 
    </div>    
       <hr>
  
    </div> 
    <div class="row">
      <div class="col-md-12">
        <div class="pull-right">
          <button class="btn btn-primary " data-toggle="modal" href="#modal-agregar"> <h3 class="panel-title"> <i class="glyphicon glyphicon-plus"></i>Agregar</button>
        </div>
        <div id="mensaje"></div>
        <div id="loader"></div>
        <div id="tabla"></div>        
      </div>
    </div>
     
  <script src="../ajax/validar.js"></script>
  <script>loadTable();</script>
  <?php Html::footer(); ?>

