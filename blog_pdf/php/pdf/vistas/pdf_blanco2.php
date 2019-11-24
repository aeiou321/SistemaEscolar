<?php
include("con1.php");
?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="20mm">
    <page_header> <!-- Define el header de la hoja -->
		<table width="100%">
            <tr class="fila">
               <td >
				</td>
                <td >
					<div align="center"> </div>
					<br>
					<div align="center" ></div>
				</td>

            </tr>
        </table>
    </page_header>
        <style>
        .th
        {
          text-align:center !important;
        }
        .td
        {
          text-align:center !important;
        }
        </style>

        <h2 style="text-align:center">Lista de calificaciones</h2>
        <br>
  <table id = "caja" BORDER WIDTH="100%" align="center" border=0.4 cellspacing=0 cellpadding=2  border: 1px solid black;>
        <tr>
                    <th>Id</th>
          <th>Alumno</th>
          <th>Clase</th>
          <th>Tarea</th>
         <th>Calificacion</th>

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
              <td>'.$row['calificacion'].'</td>

            </tr>
            ';
          }
        }
        ?>
      </table>
    <page_footer> 
	
	
		<table id="footer">
            <tr class="fila">
				<td>
					<div align="center"><span></span></div>
				</td>
			</tr>
        </table>
    </page_footer>
    








</page>



