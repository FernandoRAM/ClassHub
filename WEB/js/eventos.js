

function crearTabla(){
    $.ajax({
        type: "POST",
        url: "php/eventos.php",
        data: {dato: 'x'},
        success: function(respuesta){
			$('#actualize').html(respuesta);
	   	}});
}