<?php
	session_start();
	include '../cn.php';
	$con=conectar();
				
?>
<meta charset="utf-8">
<div class="row">

	<div class="col-sm-12">
		<h2>Agregar Convocatorias</h2>
		<button class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-nuevoEvento">Agregar nueva Convocatoria
			<span class="glyphicon glyphicon-plus"></span>
		</button>
		<table class="table table-hover table-condensed table-bordered" id="dtTabla">
			<thead class="thead-dark">
				<tr>
					<th>Convocatoria</th>
					<th>Tipo</th>
					<th>Status</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php 	
				$query=("SELECT * FROM convocatoria");
				$fechaActual = date('Y-m-d'); 
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_row($result)){
				//idConvocatoria,Nombre,TipoConvocatoria,Descripcion
			 ?>
			<tr>
				<td style="cursor: pointer;" data-toggle="modal" data-target="#modal-descripcion"
				onclick="agregarDescripcion('<?php echo $row[0]; ?>')"><?php echo $row[5]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td>
					<?php 
						if ($fechaActual<$row[2]){
							echo "<p class='text-success text-center font-weight-bold'>Vigente</p>";
						}elseif ($fechaActual>$row[2]) {
							echo "<p class='text-danger text-center font-weight-bold'>Vencida</p>";
						}else{
							echo "<p class='text-warning text-center font-weight-bold'>Vence Hoy</p>";
						}

					?>
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