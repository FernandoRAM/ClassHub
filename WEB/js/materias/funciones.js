function crearMateria(nombre,carrea,bloque){
	cadena="nombre="+nombre+
		"&carrea="+carrea+
		"&bloque="+bloque;
		
	$.ajax({
		type:"POST",
		url:"php/Materias/agregarMateria.php",
		//url:"http://classhub2.000webhostapp.com/php/Eventos/agregarEvento.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				$('#tabla').load('php/Materias/tabla.php');
				//$('#buscador').load('http://classhub2.000webhostapp.com/php/Eventos/buscador.php');
				alertify.success("Se ha agregado con exito");
			}else{
				alertify.error("Error del servidor");
			}
		}
	});
}

function cargarClases(id){
	window.location.replace("clases.php?id="+id);
}
function agregaForm(id){
	$('#idMateria').empty();
	$('#nombreEd').empty();
	$('#carreraEd').empty();
	$('#bloqueEd').empty();
		cadena="id="+id;
	 $.ajax({
            type:'POST',
            url:'php/Materias/getDatos.php',
            dataType:"json",
            data:cadena,
            success:function(data){
                    $('#idMateria').val(data.idMateria);
                    $('#nombreEd').val(data.nombre);
                    $('#carreraEd').val(data.carrera);
                    $('#bloqueEd').val(data.bloque);
            }
        });

}

function actualizaDatos(){

	id=$('#idMateria').val();
	nombre=$('#nombreEd').val();
	carrea=$('#carreraEd').val();
	bloque=$('#bloqueEd').val();

	cadena="id="+id+"&nombre="+nombre+
		"&carrea="+carrea+
		"&bloque="+bloque;

		$.ajax({
		type:"POST",
		//url:"http://classhub2.000webhostapp.com/php/Eventos/actualizaEventos.php",
		url:"php/materias/actualizaMaterias.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/materias/tabla.php');
				alertify.success("Se han actualizado con exito");
			}else{
				$('#tabla').load('php/materias/tabla.php');
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
		url:"php/materias/eliminarMateria.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/materias/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				//$('#buscador').load('http://classhub2.000webhostapp.com/php/Eventos/buscador.php');
				alertify.success("Se ha eliminado con exito");
			}else{
				$('#tabla').load('php/materias/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}