<?php
include "cn.php";

function validarSiExiste($con, $query){
	$resultado = consultar($con,$query);
	if (mysqli_num_rows($resultado)>0) {
			return TRUE;
		}else{
			return FALSE;
	}

}
function alerta($mensaje,$redireccion){
		return "<script>
                alert('$mensaje');
                window.location.replace('$redireccion');
   			 </script>" ;
}
?>