<?php
include("con1.php");
        session_start();
        $user_id=$_SESSION["id"];
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
					<li ><a href="home_alumno.php">Tareas</a></li>
					<li class="active"><a href="subir_tarea.php">Subir tareas</a></li>
					<li><a href="calificaciones.php">Calificaciones</a></li>
					<li><a href="logout.php">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos de tareas &raquo; Subir tareas</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){

		    //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
		    foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
		    {
		      //Validamos que el archivo exista
		      if($_FILES["archivo"]["name"][$key]) {
		        $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
		        $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

		        $directorio = 'archivos'; //Declaramos un  variable con la ruta donde guardaremos los archivos

		        //Validamos si la ruta de destino existe, en caso de no existir la creamos
		        if(!file_exists($directorio)){
		          mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
		        }

		        $dir=opendir($directorio); //Abrimos el directorio de destino
		        $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

		        //Movemos y validamos que el archivo se haya cargado correctamente
		        //El primer campo es el origen y el segundo el destino
		        if(move_uploaded_file($source, $target_path)) {
		          } else {	
		        }
		        closedir($dir); //Cerramos el directorio de destino
		      }
		    }
  

				$tarea = mysqli_real_escape_string($con,(strip_tags($_POST["tarea"],ENT_QUOTES)));//Escanpando caracteres 
				$clase = mysqli_real_escape_string($con,(strip_tags($_POST["clase"],ENT_QUOTES)));//Escanpando caracteres 
				$id_tarea_encargada = mysqli_real_escape_string($con,(strip_tags($_POST["id_tarea_encargada"],ENT_QUOTES)));//Escanpando caracteres 


				$sql= "SELECT * FROM tareas where tipo ='$tarea'";
   				   $query = $con->query($sql);
    			   while ($r=$query->fetch_array()) {
        		   $variable=$r["id_tarea"];
						$insert = mysqli_query($con, "INSERT INTO calificacion_parcial(id_alumno, id_clase, url, id_tarea_encargada, id_tarea, id_tipo_tarea) VALUES('$user_id','$clase','$target_path', '$id_tarea_encargada', '$tarea', '$variable')") or die(mysqli_error());
      			   }
      			   		
				
				$insert = mysqli_query($con, "INSERT INTO calificacion(id_alumno, id_clase, url, id_tarea_encargada, id_tarea) VALUES('$user_id','$clase','$target_path', '$id_tarea_encargada', '$tarea')") or die(mysqli_error());
					if($insert){
						print "<script>alert(\"La tarea se registro con éxito.\");window.location='home_alumno.php';</script>";
						}else{
						print "<script>alert(\"Ocurrio un error.\");window.location='home_alumno.php';</script>";
						}
			   
					 
			}
			?>

			<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" >
				<div class="form-group">
				<label class="col-sm-3 control-label">Descripción Tarea</label>
				<div class="col-sm-3">
				<select name="id_tarea_encargada" class="form-control">
				<?php 
				  $sql = "SELECT *  FROM tarea_encargada";
				  $query = $con->query ($sql);
				  echo "<option value='1'> ----- </option>";
				  while($valores = mysqli_fetch_array($query)){
				     echo "<option value='".$valores['id_tarea_encargada']."'>".$valores['descripcion']."</option>";
				  }
				?>
				</select>
				</div>
				</div>
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
				<div class="form-group" style="margin-left:225px;">
 				  <p> Enviar mi archivo: <input type="file" id="archivo[]" name="archivo[]" multiple="" >
</p>
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
