<?php
	session_start();
	include '../cn.php';
	$con=conectar();
				
?>
<meta charset="utf-8">
<div class="row">

	<div class="col-sm-12">
		<h2>Tutores</h2>
		<button class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-nuevoTutor">Agregar nuevo Tutor
			<span class="glyphicon glyphicon-plus"></span>
		</button>
		<table class="table table-hover table-condensed table-bordered" id="dtTabla">
			<thead class="thead-dark">
				<tr>
					<th>Nombre</th>
					<th>Cubiculo</th>
					<th>Horario</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php 			
				$query=("SELECT * FROM tutores");

				
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_row($result)){
				//idConvocatoria,Nombre,TipoConvocatoria,Descripcion
			 ?>
			<tr>
				<td style="cursor: pointer;" data-toggle="modal" data-target="#modal-descripcion"
				onclick="agregarDescripcion('<?php echo $row[0]; ?>')"><?php echo $row[1]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<td>
                	<?php echo date('g:ia', strtotime($row[5])).' - '.date('g:ia', strtotime($row[6])); ?>
				</td>
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
			</tbody>
		</table>
	</div>
</div>