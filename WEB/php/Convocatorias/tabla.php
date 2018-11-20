<?php
	session_start();
	include '../cn.php';
	$con=conectar();
				
?>
<div class="row">

	<div class="col-sm-12">
		<h2>Agregar Convocatorias</h2>
		<button class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-nuevoEvento">Agregar nueva Convocatoria
			<span class="glyphicon glyphicon-plus"></span>
		</button>
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			
		</caption>
			<tr>
				<td>Convocatoria</td>
				<td>Tipo</td>
				<td>Opciones</td>

			</tr>
			<?php 
			if (isset($_SESSION['consulta'])){
				
				if ($_SESSION['consulta']>0) {
					
					$id=$_SESSION['consulta'];
					//echo $id;
					$query=("SELECT * FROM convocatoria where idConvocatoria='$id'");

				}else{
					$query=("SELECT * FROM convocatoria");
					
				}
			}else {
				
				$query=("SELECT * FROM convocatoria");
			}
				
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_row($result)){
				$datos=$row[0]."||".$row[5]."||".$row[1]."||".$row[2];
				//idConvocatoria,Nombre,TipoConvocatoria,Descripcion
			 ?>
			<tr>
				<td style="cursor: pointer;" data-toggle="modal" data-target=".bd-example-modal-lg"
				onclick="agregarDescripcion('<?php echo $datos; ?>');"><?php echo $row[5]; ?></td>
				<td><?php echo $row[1]; ?></td>
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