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
				alertify.success("Se han agregado con exito");
			}else if(r==2){
				alertify.error("La imagen que intenta subir ya existe, intente cambiando el nombre.");
			}else{
				alertify.error("Error del servidor");
			}
		}
	});
}
function agregarDescripcion(id){
	cadena="id="+id;
	$('#tituloConvocatoria').empty();
	$('#descCon').empty();
	$('#tipoCon').empty();

	 $.ajax({
            type:'POST',
            url:'php/Convocatorias/getDescripcion.php',
            dataType:"json",
            data:cadena,
            success:function(data){
                    $('#tituloConvocatoria').append(data.Nombre);
                    $('#descCon').append(data.Descripcion);
                    $('#tipoCon').append(data.TipoConvocatoria);
                    $('#fechaConvDes').val(data.Fecha);
                    //var logo = document.getElementById('imgConv');
					//logo.src = "img/rm2.png";
                    //$('#imagen').text(data.result.imagen);  
            }
        });

}

function agregaForm(id){

		cadena="id="+id;
		$.ajax({
            type:'POST',
            url:'php/Convocatorias/getDescripcion.php',
            dataType:"json",
            data:cadena,
            success:function(data){
                    $('#nombreEd').val(data.Nombre);
                    $('#descripcionEd').val(data.Descripcion);
                    $('#tipoEdit').val(data.TipoConvocatoria);
                    $('#fechaEd').val(data.Fecha);
                    $('#idConv').val(data.idConv);
                    //var logo = document.getElementById('imgConv');
					//logo.src = "img/rm2.png";
                    //$('#imagen').text(data.result.imagen);  
            }
        });
}

function actualizaDatos(){

	id=$('#idConv').val();
	nombre=$('#nombreEd').val();
	tipo=$('#tipoEdit').val();
	fecha=$('#fechaEd').val();
	descripcion=$('#descripcionEd').val();

	cadena="id="+id+"&nombre="+nombre+
		"&tipo="+tipo+
		"&descripcion="+descripcion+
		"&fecha="+fecha;

		$.ajax({
		type:"POST",
		url:"php/Convocatorias/actualizaConvocatorias.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Convocatorias/tabla.php');
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
				alertify.success("Se ha eliminado con exito");
			}else{
				$('#tabla').load('php/Convocatorias/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}