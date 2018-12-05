function crearTutor(){
	//nombre,horaInicio,horaFin,emailTutor,numCubiculo
	//cadena="nombre="+nombre+
	//	"&horaInicio="+horaInicio+
	//	"&horaFin="+horaFin+
	//	"&email="+emailTutor+
	//	"&numCubiculo="+numCubiculo;
		//+"&image="+imagen;
		var formData1 = new FormData($('#formCrear')[0]);
		//alert(document.getElementById('formCrear'));
	$.ajax({
		type:"POST",
		url:"php/Tutores/agregarTutor.php",
		data: formData1,
        contentType: false,
        processData:false,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Tutores/tabla.php');
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
	var image = new Image();
	cadena="id="+id;
	$('#nombreTutor').empty();
	$('#horaInicio').empty();
	$('#horaFin').empty();
	$('#emailTutor').empty();
	$('#numCubiculo').empty();
	 $.ajax({
            type:'POST',
            url:'php/Tutores/getDescripcion.php',
            dataType:"json",
            data:cadena,
            success:function(data){
                    $('#nombreTutor').append(data.Nombre);
                    $('#horaInicio').val(data.horaInicio);
                    $('#horaFin').val(data.horaFin);
                    $('#emailTutor').append(data.correo);
                    $('#numCubiculo').append(data.cubiculo);
                    image.src = data.ruta;
                    alert(data.ruta)
                    $('#imgTutor').append(image);
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
            url:'php/Tutores/getDescripcion.php',
            dataType:"json",
            data:cadena,
            success:function(data){
                    $('#nombreEd').val(data.Nombre);
                    $('#horaInicioEd').val(data.horaInicio);
                    $('#horaFinEd').val(data.horaFin);
                    $('#emailTutorEd').val(data.correo);
                    $('#numCubiculoEd').val(data.cubiculo);
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
		url:"php/Tutores/actualizaTutores.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Tutores/tabla.php');
				alertify.success("Se han actualizado con exito");
			}else{
				$('#tabla').load('php/Tutores/tabla.php');
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
		url:"php/Tutores/eliminarConvocatoria.php",
		data:cadena,
		success:function(r){
			if (r==1) {
				$('#tabla').load('php/Tutores/tabla.php');
				alertify.success("Se ha eliminado con exito");
			}else{
				$('#tabla').load('php/Tutores/tabla.php');
				alertify.error("Error del servidor");
			}
		}
	});
}
