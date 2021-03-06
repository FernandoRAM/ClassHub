<?php
	session_start();
	include '../cn.php';
	$con=conectar();
				
?>
<div class="row">

	<div class="col-sm-12">
		<h2>Agregar Eventos Importantes al Calendario</h2>
		<button class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-nuevoEvento">Agregar nuevo Evento
			<span class="glyphicon glyphicon-plus"></span>
		</button>
		<table class="table table-hover table-condensed table-bordered" id="dtTabla">
			<thead class="thead-dark">
			<tr>
				<th>Nombre de Evento</th>
				<th>Hora</th>
				<th>Fecha</th>
				<th>Opciones</th>

			</tr>
			</thead>
			<tbody>
			<?php 
				$query=("SELECT * FROM eventosimportantes");
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_row($result)){
				
			 ?>
			<tr>
				<td style="cursor: pointer;" data-toggle="modal" data-target="#modal-evento"
				onclick="agregarDescripcion('<?php echo $row[0]; ?>');"><?php echo $row[1]; ?></td>
				<td><?php echo date('g:ia', strtotime($row[3])); ?></td>
				<td><input type="date" value="<?php echo $row[2]; ?>" name=""></td>
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