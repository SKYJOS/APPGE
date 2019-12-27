<?php include '../autoload.php'; 

Assets::principal('Lista de Preguntas');
Assets::datatables();
Assets::sweetalert();
Html::header();
?>	
	<?php 

	include'../modal/cuestionario/agregar.php';
  include'../modal/cuestionario/eliminar.php';
	?>
	
	<div class="row">
		<div class="col-md-12">
			<?php include'../vista/nav5.php'; ?>
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

	
	<script src="../ajax/cuestionario.js"></script>
	<script>loadTable();</script>
	<?php Html::footer('Atento - BBVA'); ?>
