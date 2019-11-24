<?php
include("con1.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar tarea</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>


</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Inicio</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav ">
					<li ><a href="home_maestro.php">Tareas</a></li>
					<li class="active"><a href="add.php">Agregar tareas</a></li>
					<li><a href="calificar.php">Calificar</a></li>
					<li><a href="estadisticas.php">Estadísticas</a></li>
					<li><a href="logout.php">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos de tareas &raquo; Agregar tareas</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$tarea = mysqli_real_escape_string($con,(strip_tags($_POST["tarea"],ENT_QUOTES)));//Escanpando caracteres 
				$descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
				$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));//Escanpando caracteres 
				$clase = mysqli_real_escape_string($con,(strip_tags($_POST["clase"],ENT_QUOTES)));//Escanpando caracteres 


			   $insert = mysqli_query($con, "INSERT INTO tarea_encargada(id_tarea, descripcion, fecha_entrega, id_clase) VALUES('$tarea','$descripcion', '$fecha', '$clase')") or die(mysqli_error());
						if($insert){
						print "<script>alert(\"La tarea se registro con éxito.\");window.location='home_maestro.php';</script>";
						}else{
						print "<script>alert(\"Ocurrio un error.\");window.location='home_maestro.php';</script>";
						}
					 
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Tarea</label>
					<div class="col-sm-3">
						<select name="tarea" class="form-control">
						<option value=""> ----- </option>
                        <option value="1">Mapa Conceptual</option>
						<option value="2">Mapa Mental</option>
						<option value="3">Resumen</option>
						<option value="4">Cuestionario</option>
						<option value="5">Investigación</option>

						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Clase</label>
					<div class="col-sm-3">
						<select name="clase" class="form-control">
						<option value=""> ----- </option>
                        <option value="101">101</option>
						<option value="102">102</option>

						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-3">
						<textarea name="descripcion" class="form-control" placeholder="Descripción"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Día de entrega máximo</label>
					<div class="col-sm-4">
						<input type="text" name="fecha" class="input-group date form-control" date=""  data-date-format='dd-yyyy-mm' placeholder="0000-00-00" required>
					</div>
				</div>
		
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>
