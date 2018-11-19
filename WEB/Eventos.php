<?php 
session_start();
unset($_SESSION['consulta']);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Eventos Importantes</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="js/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="js/select2/css/select2.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/alertifyjs/alertify.js"></script>
  <script src="js/select2/js/select2.js"></script>

</head>
<body>
  <!----------------- Inicio de NAVBAR ---------------------->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Fin de navbar-->
  <div class="container">
    <div id="buscador"></div>
    <div id="tabla"></div>
  </div>

  <!-- Modal para registros nuevos -->


<div class="modal fade" id="modal-nuevoEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <h4 class="modal-title" id="myModalLabel">Agrega nuevo Evento</h4>
      <div class="modal-header">
        <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nombre</label>
          <input type="text" name="" id="nombre" class="form-control input-sm">
        </div>
        <div class="form-group">
          <label>Fecha</label>
          <input type="date" name="" id="fecha" class="form-control input-sm">
        </div>
        <div class="form-group">
          <label>Hora</label>
          <input type="time" name="" id="time" class="form-control input-sm">
        </div>
        <div class="form-group">
          <label>Descripcion</label>
          <textarea class="form-control vresize" id="descripcion" style="resize: vertical;"></textarea>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image">
          <label class="custom-file-label" for="customFile">Seleccione un archivo</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modal-edicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <h4 class="modal-title" id="myModalLabel">Editar Evento</h4>
      <div class="modal-header">
        <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
      </div>
      <div class="modal-body">
        <input type="text" hidden="" id="idEvento" name="">
        <div class="form-group">
          <label>Nombre</label>
          <input type="text" name="" id="nombreEd" class="form-control input-sm">
        </div>
        <div class="form-group">
          <label>Fecha</label>
          <input type="date" name="" id="fechaEd" class="form-control input-sm">
        </div>
        <div class="form-group">
          <label>Hora</label>
          <input type="time" name="" id="timeEd" class="form-control input-sm">
        </div>
        <div class="form-group">
          <label>Descripcion</label>
          <textarea class="form-control vresize" id="descripcionEd" style="resize: vertical;"></textarea>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image">
          <label class="custom-file-label" for="customFile">Seleccione un archivo</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizardatos">
        Actualizar
        </button>
       
      </div>
    </div>
  </div>
</div>
<!-- Modal para ver informacion detallada de evento -->
<div class="modal fade bd-example-modal-lg" id="model-evento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <h4 class="modal-title m-2" id="tituloEvento"></h4>
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div>
        <div class="form-group">
          <label>Fecha de Evento</label>
          <input type="date" name="" id="fechaEvento" class="form-control input-m">
        </div>
        <div class="form-group">
          <label>Hora Evento</label>
          <input type="time" name="" id="horaEvento" class="form-control input-m">
        </div>
        <div class="form-group">
          <label>Descripcion</label>
          <p id="descripEvento"></p>
        </div>
         <button type="button" class="btn btn-primary" data-dismiss="modal">
          Ok
        </button>
    </div>
  </div>
</div>

</body>
</html>
<script src="js/funciones.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('php/Eventos/tabla.php');
    $('#buscador').load('php/Eventos/buscador.php');
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#guardarnuevo').click(function(){
      nombre=$('#nombre').val();
      fecha=$('#fecha').val();
      hora=$('#hora').val();
      imagen=$('#image').val();
      descripcion=$('#descripcion').val();
      crearEvento(nombre,fecha,hora,descripcion);
    });

    $('#actualizardatos').click(function(){
      actualizaDatos();
    });

  });
</script>