<?php
include("con1.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calificar</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
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
					<li><a href="add.php">Agregar tareas</a></li>
					<li class="active"><a href="calificar.php">Calificar</a></li>
					<li><a href="estadisticas.php">Estadísticas</a></li>
					<li ><a href="logout.php">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->
	</div>	</nav>
	<div class="container">
		<div class="content">
			<h2>Lista de tareas</h2>
			<hr />
          <a style="margin-left:0%; margin-bottom:1.5%;"target="_blank" href="blog_pdf/php/pdf/pdf_blanco2.php" class="btn btn-danger">Exportar calificaciones a PDF</a>

			<?php
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($con, "SELECT * FROM calificacion WHERE id_calificacion='$nik'");
				if(mysqli_num_rows($cek) == 0){
       				 print "<script>alert(\"No se encontraron datos.\");window.location='calificar.php';</script>";
				}else{
					$delete = mysqli_query($con, "DELETE FROM calificacion WHERE id_calificacion='$nik'");
					if($delete){
       				 print "<script>alert(\"Datos eliminados correctamente.\");window.location='calificar.php';</script>";
					}else{
       				 print "<script>alert(\"Error, no se pudo eliminar los datos.\");window.location='calificar.php';</script>";
					}
				}
			}
			?>

		
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>Id</th>
					<th>Alumno</th>
					<th>Clase</th>
					<th>Tarea</th>
                    <th>URL</th>
                    <th>Calificación</th>
                    <th>Calificar</th>
                    <th>Eliminar</th>

				</tr>
				<?php

					$sql = mysqli_query($con, "SELECT c.id_calificacion, u.nombre, c.id_clase, c.calificacion, ta.descripcion, c.url  FROM calificacion as c inner join tarea_encargada as ta on ta.id_tarea_encargada = c.id_tarea_encargada inner join  usuarios as u on c.id_alumno = u.id");
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['id_calificacion'].'</td>
							<td>'.$row['nombre'].'</td>
                            <td>'.$row['id_clase'].'</td>
                            <td>'.$row['descripcion'].'</td>
							<td>'.$row['url'].'</td>
							<td>'.$row['calificacion'].'</td>
							<td>
								<a href="edit.php?nik='.$row['id_calificacion'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							</td>
							<td>
								<a href="calificar.php?aksi=delete&nik='.$row['id_calificacion'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['id_calificacion'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
