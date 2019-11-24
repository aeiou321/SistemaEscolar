
<?php
 include 'conexion.php';
 $tbl_name='usuarios';
 
 $form_control = $_POST['username'];
 $form_semestre = $_POST['semestre'];
 $form_nombre = $_POST['nombre'];
 $form_pass = $_POST['password'];

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}


 $query = "INSERT INTO usuarios (control, password, semestre, nombre) VALUES ('$form_control', '$form_pass', '$form_semestre', '$form_nombre')";

 if ($conexion->query($query) === TRUE) {
		print "<script>alert(\"Se ha registrado exitosamente\");window.location='index.html';</script>";
 }

 else {
		print "<script>alert(\"Error a crear el usuario\");window.location='registro.html';</script>";
		 }


 mysqli_close($conexion);
?>
