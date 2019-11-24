<?php
include("con1.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Link</title>

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
					<li class="active"><a href="home_alumno.php">Tareas</a></li>
					<li><a href="subir_tarea.php">Subir tareas</a></li>
					<li ><a href="calificaciones.php">Calificaciones</a></li>
					<li><a href="logout.php">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->
				</nav>
	<div class="container">
		<div class="content">
			<h2>Tareas &raquo; Links</h2>
			<hr />
			
			<form class="form-horizontal" action="" method="post">
			
			
<table class="table table-striped table-hover" style="width:100% !important; text-align:center;">
				<style>
				.class
				{
					text-align:center !important;
				}
				</style>
				<tr>
                    <th class="class">Id</th>
                    <th class="class">Página</th>
					<th class="class">Link</th>
				</tr>
				<?php
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));

					$sql = mysqli_query($con, "SELECT * from links where id_tarea='$nik'");
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['id_link'].'</td>
							<td>'.$row['pagina'].'</td>
							<td>'.$row['link'].'</td>
						</tr>
						';
					}
				}
				?>
			</table>
			</form>

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