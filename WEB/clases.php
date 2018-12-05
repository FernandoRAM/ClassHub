<?php 
$id=$_GET['id'];
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
        <a class="nav-link" href="#">Materias <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="convocatorias.html">Convocatorias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reportes.html">Reportes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tutores.html">Tutores</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Eventos.html">Eventos</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Fin de navbar-->
  <div class="container">
    <div id="tabla"></div>
  </div>

  <!-- Modal para Clases nuevas -->
<div class="modal fade" id="modal-nuevaMateria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agrega nueva Clase</h4>
        <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nombre Profesor</label>
          <input type="text" name="" id="nombre" class="form-control input-sm">
        </div>
          <div class="row">
            <!-- Horario -->
            <div class="col-sm">
              <label>Hora Inicio</label>
              <input type="time" name="" id="horaInicio" class="form-control input-sm">
            </div>
            <div class="col-sm">
              <label>Hora Fin</label>
              <input type="time" name="" id="horaFin" class="form-control input-sm">
            </div>
          </div>
        <div class="form-group">
          <label>Edificio</label>
          <select id="edificio" class="form-control input-sm">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
          </select>
        </div>
        <div class="form-group">
          <label>Salon</label>
          <select id="salon" class="form-control input-sm"></select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Crear
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modal-nuevaMateria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agrega nueva Clase</h4>
        <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nombre Profesor</label>
          <input type="text" name="" id="nombreEd" class="form-control input-sm">
        </div>
        <div class="form-group">
          <label>Dias</label>
            <select class="form-control" id="dias">
              <option value="1" selected="selected">Lunes y Miercoles</option>
              <option value="2">Martes y Jueves</option>
              <option value="3">Viernes</option>
            </select>
        </div>
          <div class="row">
            <!-- Horario -->
            <div class="col-sm">
              <label>Hora Inicio</label>
              <input type="time" name="" id="horaInicioEd" class="form-control input-sm">
            </div>
            <div class="col-sm">
              <label>Hora Fin</label>
              <input type="time" name="" id="horaFinEd" class="form-control input-sm">
            </div>
          </div>
        <div class="form-group">
          <label>Salon</label>
          <input type="text" name="" id="salonEd" class="form-control input-sm">
        </div>
        <div class="form-group">
          <label>Edificio</label>
          <input type="text" name="" id="edificioEd" class="form-control input-sm">
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
</body>
</html>
<script src="js/clases/funciones.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('php/clases/tabla.php?id=<?php echo $id ?>');
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#guardarnuevo').click(function(){
      nombre=$('#nombreNew').val();
      horaInicio=$('#horaInicio').val();
      horaFin=$('#horaFin').val();
      salon=$('#salon').val();
      edificio=$('#edificio').val();
      dias=$('#dias').val();
      crearMateria(nombre,horaInicio,horaFin,salon,edificio,dias);
    });

    $('#actualizardatos').click(function(){
      actualizaDatos();
    });
    $('#edificio').change(function(){
      salon=$('#edificio').val();
      actualizaSalones(salon);
    });

  });
</script>