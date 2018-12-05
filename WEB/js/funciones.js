function crearEvento(nombre,fecha,hora,descripcion){
	cadena="nombre="+nombre+
		"&fecha="+fecha+
		"&hora="+hora+
		"&descripcion="+descripcion;
		//+"&image="+imagen;
		
	$.ajax({
		type:"POST",
		url:"php/Eventos/agregarEvento.php",
		//url:"http://classhub2.000webhostapp.com/php/Eventos/agregarEvento.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				$('#tabla').load('php/Eventos/tabla.php');
				//$('#buscador').load('http://classhub2.000webhostapp.com/php/Eventos/buscador.php');
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
	//alert(d[4]);
	//$('#idEvento').val(d[0]);
	$('#tituloEvento').empty();
	$('#fechaEvento').empty();
	$('#horaEvento').empty();
	$('#descripEvento').empty();
	
		cadena="id="+id;
	 $.ajax({
            type:'POST',
            url:'php/Eventos/getDescripcion.php',
            dataType:"json",
            data:cadena,
            success:function(data){
                    $('#tituloEvento').append(data.Nombre);
                    $('#fechaEvento').val(data.Fecha);
                    $('#horaEvento').val(data.Hora);
                    $('#descripEvento').append(data.Descripcion);
                    //var logo = document.getElementById('imgConv');
					//logo.src = "img/rm2.png";
                    //$('#imagen').text(data.result.imagen);  
            }
        });

}

function agregaForm(id){
	$('#idEvento').empty();
	$('#nombreEd').empty();
	$('#fechaEd').empty();
	$('#timeEd').empty();
	$('#descripcionEd').empty();
		cadena="id="+id;
	 $.ajax({
            type:'POST',
            url:'php/Eventos/getDescripcion.php',
            dataType:"json",
            data:cadena,
            success:function(data){
                    $('#idEvento').append(data.idEvento);
                    $('#nombreEd').val(data.Nombre);
                    $('#fechaEd').val(data.Fecha);
                    $('#timeEd').val(data.Hora);
                    $('#descripcionEd').val(data.Descripcion);
                    //var logo = document.getElementById('imgConv');
					//logo.src = "img/rm2.png";
                    //$('#imagen').text(data.result.imagen);  
            }
        });

}

function actualizaDatos(){

	id=$('#idEvento').val();
	nombre=$('#nombreEd').val();
	fecha=$('#fechaEd').val();
	hora=$('#timeEd').val();
	alert(id);
	descripcion=$('#descripcionEd').val();
	cadena="id="+id+"&nombre="+nombre+
		"&fecha="+fecha+
		"&hora="+hora+
		"&descripcion="+descripcion;

		$.ajax({
		type:"POST",
		//url:"http://classhub2.000webhostapp.com/php/Eventos/actualizaEventos.php",
		url:"php/Eventos/actualizaEventos.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				$('#tabla').load('php/Eventos/tabla.php');
				//$('#buscador').load('http://classhub2.000webhostapp.com/php/Eventos/buscador.php');
				alertify.success("Se han actualizado con exito");
			}else{
				$('#tabla').load('php/Eventos/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
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
		url:"php/Eventos/eliminarEvento.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Eventos/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				//$('#buscador').load('http://classhub2.000webhostapp.com/php/Eventos/buscador.php');
				alertify.success("Se ha eliminado con exito");
			}else{
				$('#tabla').load('php/Eventos/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}