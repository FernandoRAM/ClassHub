<?php
	session_start();
	include '../cn.php';
	$con=conectar();
				
?>
<div class="row">

	<div class="col-sm-12">
		<h2>Reportes</h2>
		<table class="table table-hover table-condensed table-bordered" id="dtTabla">
			<thead class="thead-dark">
			<tr>
				<th>Titulo</th>
				<th>Status</th>
				<th>Usuario</th>
				<th>Fecha</th>
				<th>Opciones</th>

			</tr>
			</thead>
			<tbody>
			<?php 
							
				$query=("SELECT reporte.idReporte, 
								reporte.Descripcion, 
								reporte.status, 
								reporte.Titulo,
								reporte.fecha, 
								usuario.NomUsuario 
						FROM reporte 
						INNER JOIN usuario 
						ON reporte.idUsuario= usuario.idUsuario");

				$result=mysqli_query($con,$query);

				while($row=mysqli_fetch_row($result)){
					
			 ?>
			<tr>
				<td><?php echo $row[3]; ?></td>

				<td><?php 
						if ($row[2]==0) {
							echo "<p class='text-warning text-center font-weight-bold'>Sin verificar</p>";
						}else if($row[2]==1){
							echo "<p class='text-success text-center font-weight-bold'>Aprobado</p>";
						}else{
							echo "<p class='text-danger text-center font-weight-bold'>No Aprobado</p>";
						}
					?>	
				</td>
				<td><?php echo $row[5]; ?></td>
				<td><input type="date" value="<?php echo $row[4]; ?>"></td>
				<td>
					<button class="btn btn-warning" onclick="agregaForm('<?php echo $row[0]; ?>')" 
					data-toggle="modal" data-target="#modal-reporte">
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

