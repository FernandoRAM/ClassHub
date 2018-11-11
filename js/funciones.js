function login(){

	 var exp = document.getElementById('expediente').value;
	 var  pass = document.getElementById('pass').value;


	 if (exp != '' && pass != '') {

		loginAjax = new XMLHttpRequest();
		loginAjax.open('GET', "http://localhost:9999/ClassHub/php/login.php?expediente="+exp+"&pass="+pass);
		loginAjax.send();
		loginAjax.onreadystatechange = function(){
			if (loginAjax.readyState == 4 && loginAjax.status == 200) {
			
					var respuesta = loginAjax.responseText;

					if (respuesta != "0") {

						window.location.replace("http://localhost:9999/ClassHub/index.html");

					}else{

						showToast();	
					}
					
			
			
			}
		}
	}else{

	}

}

var showToast = function() {
    ons.notification.toast('¡Datos Incorrectos. Intenta de nuevo!', {
    timeout: 2000
  });
};