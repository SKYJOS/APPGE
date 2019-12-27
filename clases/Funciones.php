<?php 	
class funciones{
//cros crintin
	function validar_xss($cadena)
	{
		return htmlentities(trim($cadena),ENT_QUOTES,"UTF-8")	;
	}
}

 ?>