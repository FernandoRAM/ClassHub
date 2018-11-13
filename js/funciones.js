function login(){

	 var exp = document.getElementById('expediente').value;
	 var  pass = document.getElementById('pass').value;


	 if (exp != '' && pass != '') {

		loginAjax = new XMLHttpRequest();
		loginAjax.open('GET', 'http://localhost:9999/ClassHub/php/login.php?expediente='+exp+'&pass='+pass);
		loginAjax.send();
		loginAjax.onreadystatechange = function(){
			if (loginAjax.readyState == 4 && loginAjax.status == 200) {
			
					var respuesta = loginAjax.responseText;

					if (respuesta != '0') {

						window.location.replace('http://localhost:9999/ClassHub/index.html');

					}else{
						exp= '';
						passs = '';
						showToast();	
					}
					
			
			
			}
		}
	}else{

	}

}
/*
Esta funcion se encarga de obtener los datos del usuario ingresados en la pantalla de inicio de sesión . 
Al obtenerlos se verifican las credenciales en la Base de Datos (la contraseña hasheada). 
De haber ingresado los datos correctos se redirigirá al usuario a la pantalla de inicio, de los contrario se muestra un aviso
de que sus datos son incorrectos y debe intentarlo de nuevo.
Autor: Fernando Rincón
Versión: 1.0
*/

var showToast = function() {
    ons.notification.toast('¡Datos Incorrectos. Intenta de nuevo!', {
    timeout: 2000
  });
};

/*
Esta funcion muestra un toast con el mensaje '¡Datos Incorrectos. Intenta de nuevo!' en la parte
inferior al ser ejecutada.
*/

function convocatorias(){

var convocatorias = "<!-- Carrusel -->"+
  "<ons-carousel fullscreen swipeable auto-scroll overscrollable id='carousel'>"+

   " <!-- Item Carrusel (Becas)-->"+
   " <ons-carousel-item>"+
     " <ons-card style='height: 95%; margin-top: 15px;'>"+
        "<center><h4>Becas</h4></center>"+
        "<!-- Item tarjeta -->"+
        "<ons-card style='background: rgba(0,0,0,.02); margin-top: 15px;'>"+
        "<span>Beca de manutención<i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
        "</ons-card>"+
       " <!-- Item tarjeta -->"+
       " <ons-card style='background: rgba(0,0,0,.02); margin-top: 15px;'>"+
          "<span>Beca de Madres Solteras <i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
        "</ons-card>"+
        "<!-- Item tarjeta -->"+
        "<ons-card  style='background: rgba(0,0,0,.02); margin-top: 15px;'>"+
         " <span>Beca de Transporte <i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
       " </ons-card>"+
      "</ons-card>"+
    "</ons-carousel-item>"+

    "<!-- Item Carrusel (Servicio social) -->"+
   " <ons-carousel-item>"+
     " <ons-card style='height: 95%; margin-top:15px;'>"+
       " <!-- Item tarjeta -->"+
        "<center><h4>Servicio social</h4>"+
         " <!-- Item Servicio Social -->"+
         " <ons-card style='background: rgba(0,0,0,.02); margin-top: 15px;'>"+
            "<span>Servicio social Centro de Desarrollo <i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
          "</ons-card>   "  +     
          "<!-- Item Servicio Social -->"+
          "<ons-card style='background: rgba(0,0,0,.02); margin-top: 15px;'>"+
            "<span>Servicio social Deportes <i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
          "</ons-card> "       +  
          "<!-- Item Servicio Social -->"+
          "<ons-card style='background: rgba(0,0,0,.02); margin-top: 15px;'>"+
            "<span>Servicio social Centro de Cómputo <i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
          "</ons-card>"+

        "</center>"+
     " </ons-card>"+
    "</ons-carousel-item>"+

        "<!-- Item Carrusel (Bolsa de trabajo) -->"+
    "<ons-carousel-item>"+
     " <ons-card style='height: 95%; margin-top: 15px;'>"+
        "<!-- Item tarjeta -->"+
        "<center><h4>Bolsa de Tarabajo</h4>"+
           " <!-- Item Servicio Social -->"+
          "<ons-card style='background: rgba(0,0,0,.02); margin-top: 15px;'>"+
           " <span>Prácticas Huawei <i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
         " </ons-card>"+
        "</center>"+
     " </ons-card>"+
    "</ons-carousel-item>"+

  "</ons-carousel>";
  document.getElementById('contenido').innerHTML = '';
  document.getElementById('contenido').innerHTML = convocatorias;

}
/*
Esta funcion se encarga de quitar el contenido del div con id 'contenido' y cambiarlo por el contenido de la página de convocatorias.
Autor: Fernando Rincon 
Versión: 1.0
*/

function horarios(){

	var horarios = 
		"<!-- Carrusel -->"+
	  "<ons-carousel fullscreen swipeable auto-scroll overscrollable id='carousel'>"+

	   " <!-- Item Carrusel (Transporte)-->"+
	    "<ons-carousel-item>"+
	      "<ons-card style='height: 95%; margin-top: 15px;'>"+
	        "<center><h4>Horarios de Transporte</h4></center>"+
	        "<!-- Item tarjeta -->"+
	        "<ons-card style='height: 30%; background: rgba(0,0,0,.02); margin-top: 30px;'>"+
	          "<center>Juriquilla - CU</center>"+
	            "<p id='horariosCJ'>11:00, 13:00, 14:10, 13:00, 16:00, 16:30, 17:30, 17:10</p>"+
	       " </ons-card>"+
	        "<!-- Item tarjeta -->"+
	        "<ons-card style='height: 30%; background: rgba(0,0,0,.02); margin-top: 30px;'>"+

	         " <center>"+
	           " CU - Juriquilla"+
	          "</center>"+
	           " <!-- Horarios -->"+
	           " <p id='horariosCJ'>11:00, 13:00, 14:10, 13:00, 16:00, 16:30, 17:30, 17:10</p>"+

	        "</ons-card>"+
	      "</ons-card>"+
	    "</ons-carousel-item>"+

	   " <!-- Item Carrusel (Clases) -->"+
	    "<ons-carousel-item>"+
	      "<ons-card style='height: 95%; margin-top: 15px;'>"+
	        "<!-- Item tarjeta -->"+
	       " <center><h4>Horarios de Clases</h4>"+
	           " <ons-search-input placeholder='Busca tu clase...'></ons-search-input>"+
	        "</center>"+
	      "</ons-card>"+
	   " </ons-carousel-item>"+

	  "</ons-carousel>";


  document.getElementById('contenido').innerHTML = '';
  document.getElementById('contenido').innerHTML = horarios;

}
/*
Esta funcion se encarga de quitar el contenido del div con id 'contenido' y cambiarlo por el contenido de la página de horarios.
Autor: Fernando Rincon
Versión: 1.0
*/

function foro(){

	var foro = 
		 "<!-- Lista de discusiones de usuario -->"+
	  
	  "<center><h4>Mis Discusiones</h4></center>"+
	 
	  "  <!-- Item -->"+
	 "   <ons-card>"+
	     "<span>Título genérico<i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
	  " </ons-card>"+
	  "  <!-- Item -->"+
	 "   <ons-card>"+
	     "<span>Título genérico<i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
	  " </ons-card>"+

	" <!-- Lista de discusiones de todos -->"+
	 
	   "<center><h5>Todas</h5></center>"+
	  
	   " <!-- Item -->"+
	   " <ons-card>"+
	     "<span>Título genérico<i class='zmdi zmdi-chevron-right zmdi-hc-lg' style='float:right;'></i></span> "+
	   "</ons-card>";

	    document.getElementById('contenido').innerHTML = '';
 		document.getElementById('contenido').innerHTML = foro;
}
/*
Esta funcion se encarga de quitar el contenido del div con id 'contenido' y cambiarlo por el contenido de la página de Foro.
Autor: Fernando Rincon
Versión: 1.0
*/

function calendario(){

	var cal = 

		"<center><h3>Calendario de actividades</h3></center>"+

   " <ons-card onclick='window.location.href = 'calendario.html?id_event='' style='background: linear-gradient(to bottom, #e0e0e0, #c4c4c4)'>"+
       " <center>"+
           " <b>Invasión Troyana</b>"+
           " <br><b>24 de Noviembre</b>"+
        "</center>"+
        "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor...</p>"+
   " </ons-card>"+

   " <ons-card onclick='window.location.href = 'calendario.html?id_event='' style='background: linear-gradient(to bottom, #e0e0e0, #c4c4c4)'>"+
       " <center>"+
           " <b>Carritos Troyanos</b>"+
           " <br><b>27 de Noviembre</b>"+
       " </center>"+
       " <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor...</p>"+
    "</ons-card>"+

   " <ons-card onclick='window.location.href = 'calendario.html?id_event=''style='background: linear-gradient(to bottom, #e0e0e0, #c4c4c4)'>"+
       " <center>"+
            "<b>Congreso Nacional de Computación</b>"+
            "<br><b>21 de Noviembre</b>"+
        "</center>"+
        "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor...</p>"+
    "</ons-card>"+

    "<ons-card onclick='window.location.href = 'calendario.html?id_event=''style='background: linear-gradient(to bottom, #e0e0e0, #c4c4c4)'>"+
        "<center>"+
            "<b>Taller de Jutsus</b>"+
            "<br><b>3 de Diciembre</b>"+
       " </center>"+
       " <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor...</p>"+
    "</ons-card>"+

   " <ons-card onclick='window.location.href = 'calendario.html?id_event='' style='background: linear-gradient(to bottom, #e0e0e0, #c4c4c4)'>"+
       " <center>"+
            "<b>Taller Avanzado de Jutsus</b>"+
           " <br><b>7 de Diciembre</b>"+
       " </center>"+
       " <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor...</p>"+
    "</ons-card>";

     	document.getElementById('contenido').innerHTML = '';
 		document.getElementById('contenido').innerHTML = cal;
}

/*
Esta funcion se encarga de quitar el contenido del div con id 'contenido' y cambiarlo por el contenido de la página de Calendario.
Autor: Fernando Rinco3
Versión: 1.0
*/

function reportes(){

	

		
}