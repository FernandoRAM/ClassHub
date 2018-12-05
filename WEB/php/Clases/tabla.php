<?php
	session_start();
	include '../cn.php';
	$con=conectar();
	$id=$_GET['id'];
	$query=("SELECT nombre FROM materias WHERE idMateria='$id'");
	$result=mysqli_query($con,$query);
	$nombre=mysqli_fetch_row($result)
?>
<div class="row">

	<div class="col-sm-12">
		<h2><?php echo $nombre[0]; ?></h2>
		<button class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-nuevaMateria">Agregar nueva Clase
			<span class="glyphicon glyphicon-plus"></span>
		</button>
		<table class="table table-hover table-condensed table-bordered" id="dtTabla">
			<thead class="thead-dark">
			<tr>
				<th>NombreProfesor</th>
				<th>Horario</th>
				<th>Días</th>
				<th>Salon</th>
				<th>Opciones</th>

			</tr>
			</thead>
			<tbody>
			<?php 
				$query=("SELECT clases.nombreProfesor,
								clases.horaInicio,
								clases.horaFin,
								clases.dias,
								materias.nombre,
								salones.edificio,
								salones.numero
						FROM ((clases
						INNER JOIN MATERIAS on clases.idMateria=materias.idMateria)
						INNER JOIN salones on clases.idSalon=salones.idsalon) WHERE clases.idMateria ='$id';");
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_row($result)){
				
			 ?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td>
					<?php echo date('g:ia', strtotime($row[1])).' - '.date('g:ia', strtotime($row[2])); ?>
				</td>
				<td><?php
						if ($row[3]==1) {
							echo "Lunes y Miercoles";
						}elseif ($row[3]==2) {
							echo "Martes y Jueves";
						}else{
							echo "Viernes";
						}
					?>
				</td>
				<td><?php echo $row[5].$row[6]; ?></td>
				<td>
					<button class="btn btn-warning" onclick="agregaForm('<?php echo $row[0]; ?>')" 
					data-toggle="modal" data-target="#modal-edicion">
					<i class="fas fa-edit"></i>
					</button>
					<button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntar('<?php echo $row[0]; ?>')">
						<i class="fas fa-trash-alt"></i>
					</button>
				</td>
			</tr>
			<?php } ?>
			<tbody>
		</table>
	</div>
</div>