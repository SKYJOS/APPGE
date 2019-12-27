<?php include '../autoload.php'; 
$usuario=new Tipo();
Assets::principal('Lista de Campaña');
Assets::datatables();
Assets::sweetalert();
Html::header();

?>	


	<?php 
	include'../modal/tipo/agregar.php';
	include'../modal/tipo/eliminar.php';
	?>
	
	<div class="row">
		<div class="col-md-12">
			<?php include'../vista/nav4.php'; ?>
		</div>
	</div>
	
	<div class="row">
	    <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                      <li data-target="#myCarousel" data-slide-to="3"></li>
                      <li data-target="#myCarousel" data-slide-to="4"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="../images/1.jpg" alt="">
                      </div>

               
                      <div class="item">
                        <img src="../images/4.jpg" alt="">
                      </div>
                      <div class="item">
                        <img src="../images/5.jpg" alt="">
                      </div>

                      <div class="item">
                        <img src="../images/6.jpg" alt="">
                      </div>
                      <div class="item">
                        <img src="../images/7.jpg" alt="">
                      </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
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
	
	<script src="../ajax/tipo.js"></script>
	<script>loadTable();</script>
	<?php Html::footer('Atento - BBVA'); ?>
