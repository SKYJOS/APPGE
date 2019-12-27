<?php

include('conexion.php');
$codigo = $_POST['elegido'];
//echo $codigo ;

 ?>


<label for="email" class ="control-label col-sm-2">PREGUNTAS</label>
<div class="col-sm-12">

	<?php  


			if($codigo=="1"||$codigo=="2"||$codigo=="3"||$codigo=="4"){
              echo "<table class='reiterativo table table-striped table-hover'>
                    
                    <tr><td class='id' width='60%' >Cajero de qué banco utilizó</td><td class='id' width='60%' ><input type='text' name='rad1' onchange='Mayusculas(this)' required></td></tr>

                    <tr><td class='id' width='60%' >Retiro con MC con diferencia de tipo de cambio</span></td><td class='id' width='60%' ><input type='radio' name='rad2' value='Sí' required>Sí <input type='radio' name='rad2' value='No' required>No</td></tr>
                    
                   </table>";
            
		    }	
					
			if($codigo=="5" || $codigo=="6"){
              echo "<table class='reiterativo table table-striped table-hover'>
                    
                    <tr><td class='id' width='60%' >Cumplió política de consumo</span></td><td class='id' width='60%' ><input type='radio' name='rad3'  value='Sí' id='rad3' onclick='disable5()' required>Sí <input type='radio' name='rad3' id='rad33' value='No' onclick='undisable5()' required>No</td></tr>

                    <tr><td class='id' width='60%' >Meta de consumo</td><td class='id' width='60%' ><input type='text' name='rad30' onchange='Mayusculas(this)' required></td></tr>

                    <tr><td class='id' width='60%' >Monto consumido por el cliente</td><td class='id' width='60%' ><input type='text' name='rad31' onchange='Mayusculas(this)' required></td></tr>

                    <tr><td class='id' width='60%' >Cliente utiliza la tarjeta en el ultimo año</span></td><td class='id' width='60%' ><input type='radio' name='rad4' id='rad4' value='Sí' onclick='undisable6()' required >Sí <input type='radio' name='rad4' id='rad44' value='No' onclick='disable6()' required>No</td></tr>                    

                    <tr><td class='id' width='60%' >Es cliente estrella</span></td><td class='id' width='60%' ><input type='radio' name='rad29' value='Sí'   id='rad29' onclick='disable8()' required>Sí <input type='radio' name='rad29' value='No'  id='rad299' onclick='undisable8()' required>No</td></tr>

                    <tr><td class='id' width='60%' >Se encontró evidencia de envío de EECC</span></td><td class='id' width='60%' ><input type='radio' name='rad5' id='rad5'required  value='Sí'  >Sí <input type='radio' name='rad5'id='rad55' value='No' required>No</td></tr>

                    
                    <tr><td class='id' width='60%' >Se necesitó audio</span></td><td class='id' width='60%' ><input type='radio' name='rad6' value='Sí' id='rad6' required>Sí <input type='radio' name='rad6' value='No' id='rad66' required>No</td></tr>

                    <tr><td class='id' width='60%' >Se necesitó contrato</span></td><td class='id' width='60%' ><input type='radio' name='rad7' value='Sí' id='rad7' required>Sí <input type='radio' name='rad7' value='No' id='rad77' required>No</td></tr>

                    <tr><td class='id' width='60%' >Se necesitó sustento de cambio de condiciones</td><td class='id' width='60%' ><input type='radio' name='rad8' value='Sí'  id='rad8' required>Sí <input type='radio' name='rad8' value='No' id='rad88' required>No</td></tr>

                    <tr><td class='id' width='60%' >Es cliente multiproducto</td><td class='id' width='60%' ><input type='radio' name='rad9' value='Sí'  id='rad9' onclick='disable7()' required>Sí <input type='radio' name='rad9' value='No' id='rad99' onclick='undisable7()' required>No</td></tr>

                    <tr><td class='id' width='60%' >(Si respuesta anterior es NO) Qué condición NO cumplió?</td><td class='id' width='60%' ><select name='rad10' required id='rad10' class='form-control'><option value=''>[Seleccione[</option><option value='Cuenta Ahorro o Sueldo'>Cuenta Ahorro o Sueldo</option><option value='Seguro o Recurrente'>Seguro o Recurrente</option><option value='Ingreso a canales digitales'>Ingreso a canales digitales</option><option value='Uso de tarjeta todos los meses por lo menos S/1.00'>Uso de tarjeta todos los meses por lo menos S/1.00</option><option value='Tarjeta con capital utilizado al cierre de la facturación'>Tarjeta con capital utilizado al cierre de la facturación</option></select></td></tr>  

                    <tr><td class='id' width='60%' >Se necesito sustentos de cambio de condiciones</td><td class='id' width='60%' ><input type='radio' name='rad11' id='rad11' value='Sí'  required>Sí <input type='radio' name='rad11' value='No' id='rad111' required>No</td></tr>                 

                    <tr><td class='id' width='60%' >Referencia</td><td class='id' width='60%' ><input type='text' name='rad12' onchange='Mayusculas(this)' id='rad12' required></td></tr>
                   </table>";
            
		    }

		    if($codigo=="7"||$codigo=="21"){
              echo "<table class='reiterativo table table-striped table-hover'>
                   
                    <tr><td class='id' width='60%' >Se necesitó contrato sin RVGL</span></td><td class='id' width='60%' ><input type='radio' name='rad11' value='Sí' required>Sí <input type='radio' name='rad11' value='No' required>No</td></tr>

                    <tr><td class='id' width='60%' >Se necesitó rectificación de clasificación</span></td><td class='id' width='60%' ><input type='radio' name='rad12' value='Sí' required>Sí <input type='radio' name='rad12' value='No' required>No</td></tr>

                    <tr><td class='id' width='60%' >La deuda del cliente fue vendida</span></td><td class='id' width='60%' ><input type='radio' name='rad13' value='Sí' required>Sí <input type='radio' name='rad13' value='No' required>No</td></tr>

                   <tr><td class='id' width='60%' >Se hizo recompra de deuda</span></td><td class='id' width='60%' ><input type='radio' name='rad14' value='Sí' required>Sí <input type='radio' name='rad14' value='No' required>No</td></tr>

                   

                  
                   </table>";
            
		    }
		    if($codigo=="8"){
              echo "<table class='reiterativo table table-striped table-hover'>
                   
                    <tr><td class='id' width='60%' >Nombre del comercio</td><td class='id' width='60%' ><input type='text' name='rad15' onchange='Mayusculas(this)' required></td></tr>
                  
                   </table>";
            
		    }
		    if($codigo=="9"){
              echo "<table class='reiterativo table table-striped table-hover'>
                   
                    <tr><td class='id' width='60%' >Se necesitó contrato</span></td><td class='id' width='60%' ><input type='radio' name='rad7' value='Sí' required>Sí <input type='radio' name='rad7' value='No' required>No</td></tr>

                    <tr><td class='id' width='60%' >Se necesitó contrato sin RVGL</span></td><td class='id' width='60%' ><input type='radio' name='rad11' value='Sí' required>Sí <input type='radio' name='rad11' value='No' required>No</td></tr>

                    <tr><td class='id' width='60%' >Se necesitó rectificación de clasificación</span></td><td class='id' width='60%' ><input type='radio' name='rad12' value='Sí' required>Sí <input type='radio' name='rad12' value='No' required>No</td></tr>

                    <tr><td class='id' width='60%' >La deuda del cliente fue vendida</span></td><td class='id' width='60%' ><input type='radio' name='rad13' value='Sí' required>Sí <input type='radio' name='rad13' value='No' required>No</td></tr>

                   <tr><td class='id' width='60%' >Se hizo recompra de deuda</span></td><td class='id' width='60%' ><input type='radio' name='rad14' value='Sí' required>Sí <input type='radio' name='rad14' value='No' required >No</td></tr>
                  
                   </table>";
            
		    }
		    if($codigo=="10"){
              echo "<table class='reiterativo table table-striped table-hover'>
                    
                    <tr><td class='id' width='60%' >Se necesitó contrato</span></td><td class='id' width='60%' ><input type='radio' name='rad7' value='Sí' required>Sí <input type='radio' name='rad7' value='No' required >No</td></tr>

                    <tr><td class='id' width='60%' >Se necesito sustento de cambio de condiciones</span></td><td class='id' width='60%' ><input type='radio' name='rad25' value='Sí' required>Sí <input type='radio' name='rad25' value='No' required>No</td></tr>
                    <tr><td class='id' width='60%' >Se solicitó voucher</span></td><td class='id' width='60%' ><input type='radio' name='rad18' value='Sí' required>Sí <input type='radio' name='rad18' value='No' required>No</td></tr>
                  
                   </table>";
            
		    }
		    if($codigo=="11"||$codigo=="22"){
              echo "<table class='reiterativo table table-striped table-hover'>
                   
                    <tr><td class='id' width='60%' >Se solicitó video</span></td><td class='id' width='60%' ><input type='radio' name='rad17' value='Sí' required>Sí <input type='radio' name='rad17' value='No' required>No</td></tr>
                    <tr><td class='id' width='60%' >Se solicitó voucher</span></td><td class='id' width='60%' ><input type='radio' name='rad18' value='Sí' required>Sí <input type='radio' name='rad18' value='No' required>No</td></tr>
                  
                   </table>";
            
		    }
		    if($codigo=="12"||$codigo=="13"||$codigo=="14"||$codigo=="15"||$codigo=="16"||$codigo=="17"||$codigo=="23"||$codigo=="24"||$codigo=="25"||$codigo=="26"||$codigo=="27"||$codigo=="28"){
              echo "<table class='reiterativo table table-striped table-hover'>
                   
                    <tr><td class='id' width='60%' >Se envió carta de 2 días</span></td><td class='id' width='60%' ><input type='radio' name='rad19' value='Sí' required>Sí <input type='radio' name='rad19' value='No' required>No</td></tr>
                    
                  
                   </table>";
            
		    }


		    if($codigo=="18"){
              echo "<table class='reiterativo table table-striped table-hover'>
                    <tr><td class='id' width='60%' >El pago fue en oficina</span></td><td class='id' width='60%' ><input type='radio' name='rad20' id='rad20' value='Sí' onclick='disable()' required>Sí <input type='radio' name='rad20' id='rad200' value='No' onclick='undisable()' required>No</td></tr>

                    <tr><td class='id' width='60%' >Código de oficina</td><td class='id' width='60%' ><input type='text' name='rad28' id='rad28' onchange='Mayusculas(this)' required></td></tr>

                    <tr><td class='id' width='60%' >Pago fue efectuado correctamente</span></td><td class='id' width='60%' ><input type='radio' name='rad26' value='Sí'  required>Sí <input type='radio' name='rad26' value='No' required>No</td></tr>

                    <tr><td class='id' width='60%' >El pago fue por transferencia interbancaria</span></td><td class='id' width='60%' ><input type='radio' name='rad21' id='rad211' value='Sí'  onclick='disable2()'  required>Sí <input type='radio' name='rad21' id='rad21' value='No' onclick='undisable2()' required>No</td></tr>

                    <tr><td class='id' width='60%' class='wrap'>El pago fue por BxI o App Móvil</span></td><td class='id' width='60%' ><input type='radio' name='rad22' value='Sí' id='rad22' onclick='disable3()' required>Sí <input type='radio' name='rad22' value='No' id='rad23' onclick='undisable3()' required>No</td></tr>

                    <tr><td class='id' width='60%' >El pago fue por BxT</span></td><td class='id' width='60%' ><input type='radio' name='rad23' value='Sí' id='rad24' onclick='disable4()' required>Sí <input type='radio' name='rad23' id='rad25' onclick='undisable4()' required>No</td></tr>

                    <tr><td class='id' width='60%' >Se necesitó contrato sin RVGL</span></td><td class='id' width='60%' ><input type='radio' name='rad11' value='Sí' required>Sí <input type='radio' name='rad11' value='No' required>No</td></tr>

                    <tr><td class='id' width='60%' >Se necesitó rectificación de clasificación</td><td class='id' width='60%' ><input type='radio' name='rad12' value='Sí'  required>Sí <input type='radio' name='rad12' value='No' required>No</td></tr>

                    <tr><td class='id' width='60%' >La deuda del cliente fue vendida</td><td class='id' width='60%' ><input type='radio' name='rad13' value='Sí'  required>Sí <input type='radio' name='rad13' value='No' required>No</td></tr>


                    <tr><td class='id' width='60%' >Se hizo recompra de deuda</td><td class='id' width='60%' ><input type='radio' name='rad14' value='Sí' required>Sí <input type='radio' name='rad14' value='No' required>No</td></tr>                 

                   </table>";
            
		    }
		    if($codigo=="19"||$codigo=="20"){
              echo "<table class='reiterativo table table-striped table-hover'>
                   
                    <tr><td class='id' width='60%' >Banco cumplio con el bono de bienvenida</span></td><td class='id' width='60%' ><input type='radio' name='rad24' value='Sí' required>Sí <input type='radio' name='rad24' value='No' required>No</td></tr>
                  
                   </table>";
            
		    }
		
		
	?>	
			
</div>

<br>
