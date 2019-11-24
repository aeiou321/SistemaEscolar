<?php
include("con1.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Maestro</title>

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
					<li><a href="home_maestro.php">Tareas</a></li>
					<li><a href="add.php">Agregar tareas</a></li>
					<li><a href="calificar.php">Calificar</a></li>
					<li class="active"><a href="estadisticas.php">Estadísticas</a></li>
					<li><a href="logout.php">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->
	</div>	</nav>
	<div class="container">
		<div class="content">
			<h2>Estadísticas</h2>
			<hr>
	<?php
		      include "conexion.php";
		      $sql= "select count(*) as total from calificacion where calificacion < 70";
		      $query = $conexion->query($sql);
		      while ($r=$query->fetch_array()) {
		        $total=$r["total"];
		        break;
		      }
		    
		      $sql= "select count(*) as total from calificacion where calificacion >= 70";
		      $query = $conexion->query($sql);
		      while ($r=$query->fetch_array()) {
		        $total2=$r["total"];
		        break;
		      }
		?>
			<br>
			<h3 style="text-align:center">Aprobación de tareas</h3>
				<canvas id="myChart" ></canvas>
				<script src="chart.js"></script>
				<script>
				var total = '<?php echo $total;?>'
				var total2 = '<?php echo $total2;?>'
				var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
				    type: 'doughnut',
				    data:{
					datasets: [{
						data: [total2,total],
						backgroundColor: ['#42a5f5', 'red'],
						label: 'Tareas reprobradas'}],
						labels: ['Aprobadas','Reprobadas']},
				    options: {responsive: true}
				});
				</script>
<br><br>
<hr>
<?php
		      include "conexion.php";
		      $sql= "select count(*) as total from calificacion where id_tarea=1";
		      $query = $conexion->query($sql);
		      while ($r=$query->fetch_array()) {
		        $total3=$r["total"];
		        break;
		      }
		    
		      $sql= "select count(*) as total from calificacion where id_tarea=2";
		      $query = $conexion->query($sql);
		      while ($r=$query->fetch_array()) {
		        $total4=$r["total"];
		        break;
		      }
		      
		      $sql= "select count(*) as total from calificacion where id_tarea=3";
		      $query = $conexion->query($sql);
		      while ($r=$query->fetch_array()) {
		        $total5=$r["total"];
		        break;
		      }
		      
		      $sql= "select count(*) as total from calificacion where id_tarea=4";
		      $query = $conexion->query($sql);
		      while ($r=$query->fetch_array()) {
		        $total6=$r["total"];
		        break;
		      }
		      
		      $sql= "select count(*) as total from calificacion where id_tarea=5";
		      $query = $conexion->query($sql);
		      while ($r=$query->fetch_array()) {
		        $total7=$r["total"];
		        break;
		      }
		?>
		<h3 style="text-align:center">Tareas subidas por alumnos</h3>
		<canvas id="myChart2" ></canvas>
		<script>
		var total3 = '<?php echo $total3;?>';
		var total4 = '<?php echo $total4;?>';
		var total5 = '<?php echo $total5;?>';
		var total6 = '<?php echo $total6;?>';
		var total7 = '<?php echo $total7;?>';
		var ctx = document.getElementById('myChart2').getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ['Mapa Conceptual', 'Mapa Mental', 'Resumen', 'Cuestionario', 'Investigación'],
		        datasets: [{
		            label: 'Cantidad de tareas',
		            data: [total3, total4,total5, total6, total7],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});
		</script>
		</div>
		<br>
	</div><center>
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
