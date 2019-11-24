
<?php
 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "sistema";
 $con = new mysqli($host_db, $user_db, $pass_db, $db_name);
 $acentos = $con->query("SET NAMES 'utf8'");
?>