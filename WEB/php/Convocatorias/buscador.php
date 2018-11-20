<?php
	include '../cn.php';
	$conexion=conectar();

	$query=("SELECT * FROM convocatoria");
	$result=mysqli_query($conexion,$query);

 ?>
<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label>Buscador</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona uno</option>
			<?php
				while($ver=mysqli_fetch_row($result)): 
			 ?>
				<option value="<?php echo $ver[0] ?>">
					<?php echo $ver[5]?>
				</option>

			<?php endwhile; ?>

		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'id=' + $('#buscadorvivo').val(),
					url:'php/Convocatorias/createSession.php',
					success:function(r){
						$('#tabla').load('php/Convocatorias/tabla.php');
					}
				});
			});
		});
	</script>
