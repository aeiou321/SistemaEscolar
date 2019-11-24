<?php
include("con1.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de empleados</title>

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
					<li><a href="add.php">Agregar tareas</a></li>
					<li class="active"><a href="calificar.php">Calificar</a></li>
					<li><a href="estadisticas.php">Estadísticas</a></li>
					<li ><a href="logout.php">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->
				</nav>
	<div class="container">
		<div class="content">
			<h2>Calificación &raquo; Calificar</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));

			$sql = mysqli_query($con, "SELECT c.id_alumno, c.id_calificacion,u.nombre,c.id_clase,c.calificacion,c.id_tarea_encargada, c.url, c.id_tarea FROM calificacion as c inner join usuarios as u on u.id = c.id_alumno WHERE id_calificacion='$nik'");
				$row = mysqli_fetch_assoc($sql);
							$url = $row['url'];
							$tipo = $row['id_tarea'];
							$id_tarea_encargada = $row['id_tarea_encargada'];
							$id_alumno = $row['id_alumno'];


				if(isset($_POST['save'])){
					$calificacion=0;
					$valor=0;
					$promedio=0;
				$sql = mysqli_query($con, "SELECT * FROM tareas  where tipo='$tipo'");
					while($row = mysqli_fetch_assoc($sql)){

						$id=$row['id_tarea'];
						$valor=$row['porcentaje'];
						$calificacion=$_POST["$id"];
						$sql2 = mysqli_query($con, "UPDATE calificacion_parcial Set calificacion='$calificacion' Where id_tipo_tarea='$id' and id_tarea_encargada='$id_tarea_encargada' and id_alumno ='$id_alumno'");
						
						// $valor=$valor*0.01;
						// $calificacion=$calificacion*$valor;
						$promedio=$promedio+$calificacion;
						;
					}

				$update = mysqli_query($con, "UPDATE calificacion SET calificacion='$promedio' WHERE id_calificacion='$nik' and id_alumno ='$id_alumno'") or die(mysqli_error());
				if($update){
						print "<script>alert(\"Los datos se guardaron con éxito\");window.location='calificar.php';</script>";
				}else{
						print "<script>alert(\"Error, no se pudo guardar los datos.\");window.location='calificar.php';</script>";
				}
			}
			
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Calificación</label>
					<div class="col-sm-2">
						<input type="text" name="codigo" value="<?php echo $row ['id_calificacion']; ?>" class="form-control" placeholder="NIK" required disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alumno</label>
					<div class="col-sm-4">
						<input type="text" name="nombres" value="<?php echo $row ['nombre']; ?>" class="form-control" placeholder="Nombre" required disabled>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Clase</label>
					<div class="col-sm-4">
						<input type="text" name="lugar_nacimiento" value="<?php echo $row ['id_clase']; ?>" class="form-control" placeholder="Lugar de nacimiento" required disabled>
					</div>
				</div>
			
				<table class="table table-striped table-hover" style="width:100% !important; text-align:center;">
				<style>
				.class
				{
					text-align:center !important;
				}
				</style>
				<tr>
                    <th class="class">Id</th>
					<th class="class">Característica</th>
					<th class="class">Cal. 25%</th>
					<th class="class">Cal. 20%</th>
					<th class="class">Cal. 15%</th>
					<th class="class">Cal. 10%</th>

					<th class="class">Porcentaje Máximo</th>
					<th class="class">Calificación</th>

				</tr>
				<?php

					$sql = mysqli_query($con, "SELECT ta.id_tarea, ta.evaluacion, ta.porcentaje, ta.25, ta.20, ta.15, ta.10, ca.calificacion FROM tareas as ta 
					inner join calificacion_parcial as ca on ca.id_tipo_tarea = ta.id_tarea where ca.id_tarea_encargada='$id_tarea_encargada' and ca.id_alumno ='$id_alumno'");
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					while($row = mysqli_fetch_assoc($sql)){
						$id=$row['id_tarea'];
						echo '
						<tr>
							<td>'.$row['id_tarea'].'</td>
							<td>'.$row['evaluacion'].'</td>
							<td>'.$row['25'].'</td>
							<td>'.$row['20'].'</td>
							<td>'.$row['15'].'</td>
							<td>'.$row['10'].'</td>

                            <td>'.$row['porcentaje'].'%</td>
                            <td width="20px"><input type="number" name="'.$row['id_tarea'].'"  class="form-control" 
                            value="'.$row['calificacion'].'" required  min="0" max="25"></td>
						</tr>
						';
					}
				}
				?>
			</table>
			  <button type="button" class="btn btn-primary" onclick="cargarvp1();">Cargar Archivo</button>    
              <input type="submit" name="save" class="btn btn-primary" value="Guardar calificación">
			</form>

        


			<div class="form-group">
                                <br>
                                <br>
                                <a class="tiptext">
                                    <iframe  width="100%" height="500" id="vp1" class="description" src="" ></iframe>
                                </a>
                                <br>
                                <br>
                               
                            </div> 
                        </div>
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
	<script>
	    var url = '<?php echo $url;?>'

	 	function cargarvp1(){
            var iframe = document.getElementById("vp1");
            iframe.setAttribute("src", url);
            
        }
</script>

</body>
</html>