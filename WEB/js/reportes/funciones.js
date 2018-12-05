function agregaForm(id){
	cadena="id="+id;
	$('#tituloReporte').empty();
	$('#usuario').empty();
	$('#descripcion').empty();
	$('#status').empty();
	$('#idReporte').empty();
	$.ajax({
            type:'POST',
            url:'php/Reportes/getDescripcion.php',
            dataType:"json",
            data:cadena,
            success:function(data){
            		$('#idReporte').val(data.idReporte);
                    $('#tituloReporte').append(data.Titulo);
                    $('#descripcion').append(data.Descripcion);
                    $('#usuario').append(data.nombreUsuario);
                    $('#fechaConvDes').val(data.Fecha);
                    //var logo = document.getElementById('imgConv');
					//logo.src = "img/rm2.png";
                    //$('#imagen').text(data.result.imagen);
                    statusJson=data.status;
                    if(statusJson==0){
	  					status="Sin Verificar";
	  				}else if(statusJson==1){
	  					status="Aprobado";
	  				}else{
	  					status="Rechazada";
	  				}
	  				$('#status').append(status);
            }
        });
}

function preguntar(id){
	alertify.confirm('Eliminar Reporte', '¿Desea eliminar el Reporte?', 
		function(){ eliminarEvento(id) },
        function(){ alertify.error('Cancelado')});
}
function actualizarStatus(){

	nuevoStatus =$('input[name=opcion]:checked').val()
	id=$('#idReporte').val();
	cadena="id="+id+"&nuevoStatus="+nuevoStatus;
		$.ajax({
		type:"POST",
		//url:"http://classhub2.000webhostapp.com/php/Eventos/actualizaEventos.php",
		url:"php/Reportes/actualizaReporte.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Reportes/tabla.php');
				//$('#buscador').load('php/Reportes/buscador.php');
				alertify.success("Se han actualizado con exito");
			}else{
				$('#tabla').load('php/Reportes/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}

function eliminarEvento(id){
	cadena="id="+id;
	$.ajax({
		type:"POST",
		url:"php/Reportes/eliminarReporte.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Reportes/tabla.php');
				//$('#buscador').load('php/Eventos/buscador.php');
				alertify.success("Se ha eliminado con exito");
			}else{
				$('#tabla').load('php/Reportes/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}