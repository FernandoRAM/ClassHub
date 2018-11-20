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
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			
		</caption>
			<tr>
				<td>Nombre de Evento</td>
				<td>Fecha</td>
				<td>Opciones</td>

			</tr>
			<?php 
			if (isset($_SESSION['consulta'])){
				
				if ($_SESSION['consulta']>0) {
					
					$id=$_SESSION['consulta'];
					echo $id;
					$query=("SELECT * FROM eventosimportantes where idEvento='$id'");

				}else{
					$query=("SELECT * FROM eventosimportantes");
					
				}
			}else {
				
				$query=("SELECT * FROM eventosimportantes");
			}
				
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_row($result)){
				$datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4];
			 ?>
			<tr>
				<td style="cursor: pointer;" data-toggle="modal" data-target=".bd-example-modal-lg"
				onclick="agregarDescripcion('<?php echo $datos; ?>');"><?php echo $row[1]; ?></td>
				<td><input type="date" value="<?php echo $row[2] ?>" name=""></td>
				<td>
					<button class="btn btn-warning" onclick="agregaForm('<?php echo $datos; ?>')" 
					data-toggle="modal" data-target="#modal-edicion">
					<i class="fas fa-edit"></i>
					</button>
					<button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntar('<?php echo $row[0]; ?>')">
						<i class="fas fa-trash-alt"></i>
					</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>