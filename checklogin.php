<?php

if(!empty($_POST)){
  if(isset($_POST["username"]) &&isset($_POST["password"])){
    if($_POST["username"]!=""&&$_POST["password"]!=""){
      include "conexion.php";
      $tipo_usuario=null;
      $user_id=null;
      $sql1= "select * from usuarios where control=\"$_POST[username]\" and password=\"$_POST[password]\" ";
      $query = $conexion->query($sql1);
      while ($r=$query->fetch_array()) {
        $user_id=$r["id"];
        $tipo_usuario=$r["tipo_usuario"];
        break;
      }
      if($user_id==null){
        print "<script>alert(\"Acceso invalido.\");window.location='index.html';</script>";
      }else{
        if($tipo_usuario=="alumno"){
        session_start();
        $_SESSION["id"]=$user_id;
        $_SESSION["tipo_usuario"]=$tipo_usuario;
        print "<script>window.location='home_alumno.php';</script>";
        }

        if($tipo_usuario=="maestro"){
        session_start();
        $_SESSION["id"]=$user_id;
        $_SESSION["tipo_usuario"]=$tipo_usuario;
        print "<script>window.location='home_maestro.php';</script>";
        }       
      }
    }
  }
}



?>