<?php
	session_start();
	include '../cn.php';
	$con=conectar();
				
?>
<div class="row">

	<div class="col-sm-12">
		<h2>Materias</h2>
		<button class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-nuevaMateria">Agregar nueva Materia
			<span class="glyphicon glyphicon-plus"></span>
		</button>
		<table class="table table-hover table-condensed table-bordered" id="dtTabla">
			<thead class="thead-dark">
			<tr>
				<th>Materia</th>
				<th>Carrera</th>
				<th>Bloque</th>
				<th>Opciones</th>

			</tr>
			</thead>
			<tbody>
			<?php 
				$query=("SELECT * FROM materias");
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_row($result)){
				
			 ?>
			<tr>
				<td style="cursor: pointer;" onclick="cargarClases('<?php echo $row[0]; ?>');">
					<?php echo $row[1]; ?>		
				</td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[3]; ?></td>
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