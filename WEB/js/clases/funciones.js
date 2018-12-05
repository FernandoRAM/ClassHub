function crearMateria(nombre,horaInicio,horaFin,salon,edificio,dias){
	cadena="nombre="+nombre+
		"&horaInicio="+horaInicio+
		"&horaFin="+horaFin+
		"&salon="+salon+
		"&edificio="+edificio+
		"&dias="+dias;
	$.ajax({
		type:"POST",
		url:"php/Clases/agregarClase.php",
		//url:"http://classhub2.000webhostapp.com/php/Eventos/agregarEvento.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				$('#tabla').load('php/Clases/tabla.php');
				//$('#buscador').load('http://classhub2.000webhostapp.com/php/Eventos/buscador.php');
				alertify.success("Se ha agregado con exito");
			}else{
				alertify.error("Error del servidor");
			}
		}
	});
}


function agregaForm(id){
	$('#idMateria').empty();
	$('#nombreEd').empty();
	$('#carreraEd').empty();
	$('#bloqueEd').empty();
		cadena="id="+id;
	 $.ajax({
            type:'POST',
            url:'php/Clases/getDatos.php',
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
		url:"php/Clases/actualizaMaterias.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Clases/tabla.php');
				alertify.success("Se han actualizado con exito");
			}else{
				$('#tabla').load('php/Clases/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}
function actualizaSalones(salon){
	datos="salon="+salon;
	$.ajax({
		type:"POST",
		//url:"http://classhub2.000webhostapp.com/php/Eventos/actualizaEventos.php",
		url:"php/Clases/cargarSalones.php",
		data:salon,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Clases/tabla.php');
				alertify.success("Se han actualizado con exito");
			}else{
				$('#tabla').load('php/Clases/tabla.php');
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
		url:"php/Clases/eliminarMateria.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Clases/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				//$('#buscador').load('http://classhub2.000webhostapp.com/php/Eventos/buscador.php');
				alertify.success("Se ha eliminado con exito");
			}else{
				$('#tabla').load('php/Clases/tabla.php');
				//$('#tabla').load('http://classhub2.000webhostapp.com/php/Eventos/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}