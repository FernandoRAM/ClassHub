function crearEvento(nombre,tipo,descripcion){
	cadena="nombre="+nombre+
		"&tipo="+tipo+
		"&descripcion="+descripcion;
		//+"&image="+imagen;
		
	$.ajax({
		type:"POST",
		url:"php/Convocatorias/agregarConvocatoria.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Convocatorias/tabla.php');
				$('#buscador').load('php/Convocatorias/buscador.php');
				alertify.success("Se han agregado con exito");
			}else if(r==2){
				alertify.error("La imagen que intenta subir ya existe, intente cambiando el nombre.");
			}else{
				alertify.error("Error del servidor");
			}
		}
	});
}
function agregarDescripcion(datos){
	d=datos.split('||');
	//alert(d[4]);
	//$('#idEvento').val(d[0]);
	$('#tituloEvento').empty(d[1]);
	$('#fechaEvento').empty(d[2]);
	$('#descripEvento').empty(d[4]);
	
	$('#tituloEvento').append(d[1]);
	$('#fechaEvento').val(d[2]);
	$('#horaEvento').val(d[3]);
	$('#descripEvento').text(d[4]);
}

function agregaForm(datos){
	d=datos.split('||');
	//alert(d[2]);
	$('#idEvento').val(d[0]);
	$('#nombreEd').val(d[1]);
	$('#tipoEdit').val(d[2]);
	$('#descripcionEd').val(d[3]);
	
}

function actualizaDatos(){

	id=$('#idEvento').val();
	nombre=$('#nombreEd').val();
	tipo=$('#tipoEdit').val();
	//alert(tipo);
	descripcion=$('#descripcionEd').val();

	cadena="id="+id+"&nombre="+nombre+
		"&tipo="+tipo+
		"&descripcion="+descripcion;

		$.ajax({
		type:"POST",
		url:"php/Convocatorias/actualizaConvocatorias.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Convocatorias/tabla.php');
				$('#buscador').load('php/Convocatorias/buscador.php');
				alertify.success("Se han actualizado con exito");
			}else{
				$('#tabla').load('php/Convocatorias/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}

function preguntar(id){
	alertify.confirm('Eliminar Evento', '¿Desea eliminar el Evento?', 
		function(){ eliminarEvento(id) },
        function(){ alertify.error('Cancel')});
}
function eliminarEvento(id){
	cadena="id="+id;
	$.ajax({
		type:"POST",
		url:"php/Convocatorias/eliminarConvocatoria.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Convocatorias/tabla.php');
				$('#buscador').load('php/Convocatorias/buscador.php');
				alertify.success("Se ha eliminado con exito");
			}else{
				$('#tabla').load('php/Convocatorias/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}