<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>	

      
    	<?php	
	include_once("dbconfig.php");
	include_once("funciones.php");


	$id = $_GET["id"];
	//$mes = $_GET["mes"];
	//$anio = $_GET["anio"];



	$fechaini = $_GET["fechainicio"];
	$fechafin = $_GET["fechafin"];


	$fechaini = $fechaini . ' 00:00:01';
	$fechafin = $fechafin . ' 23:59:59';
      
	
	//$fechaini = data_first_month_day ($mes, $anio);
	//$fechafin = data_last_month_day ($mes, $anio);
	//echo $fechaini;
	//$profesor = getProfeName ($id);
	
    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();

	$fecha = date('Y-m-d H:i:s', time());
	
$sql = "SELECT * FROM meetings as a inner join meetings_cstm as b on a.id = b.id_c inner join meetings_accounts_1_c as c on a.id = c.meetings_accounts_1meetings_ida
WHERE a.status = 'Held' and a.deleted = 0 and date_start >= '".$fechaini."' and date_start <= '".$fechafin."'
and meetings_accounts_1accounts_idb = '".$id."' 
GROUP BY a.id order by date_start";

    echo $sql;
	$handle = mysql_query($sql);	




	
?> </title>
    	<a href="javascript: history.go(-1)">
<img src="images/b_back.png" width="30" height="28" alt="Atras"></a>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    
    </head>
    <body>
    <table width="92%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0927ff">
    
	
	 <tr><td class="primeralinea">Fecha/Hora inicio clase</td><td>Clase</td><td>Alumno</td><td>Grupo</td><td>Horas</td><td>Asistencia</td></tr>
      <?php
	 $total_profe = 0;
	 $total_mobius = 0;
	 $total_ivema  = 0;
	 $total_centro = 0;
$horas_si = 0;
  $horas_no = 0;

$total_precio = 0;
	 	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 	
	 while ($row = mysql_fetch_object($handle)) 
	 {
         
       
		     $grupo = getGrupoAlumno($row->meetings_accounts_1accounts_idb);
			 $segundos=strtotime($row->date_end) - strtotime($row->date_start);
			  $horas=floatval($segundos/60/60);		
       
       $nombre_al = getNombreAlumno($id);
       
       $asistencia = 'NO';
       if (($row->account_id_c == $id and $row->asistencia1_c == 1) or
           ($row->account_id1_c == $id and $row->asistencia2_c == 1) or
           ($row->account_id2_c == $id and $row->asistencia3_c == 1) or
           ($row->account_id3_c == $id and $row->asistencia4_c == 1) or
           ($row->account_id4_c == $id and $row->asistencia5_c == 1) or
           ($row->account_id5_c == $id and $row->asistencia6_c == 1) or
           ($row->account_id6_c == $id and $row->asistencia7_c == 1) or
           ($row->account_id7_c == $id and $row->asistencia8_c == 1) or
           ($row->account_id8_c == $id and $row->asistencia9_c == 1) or
           ($row->account_id9_c == $id and $row->asistencia10_c == 1))
           
       {
         $asistencia = 'SI';
       }
       
       
       //echo "<p>Sec ".$segundos."</p>";
       
       //$horas = $row->duration_hours + $row->duration_minutes/60;
			 
			 if ($grupo == "ivema")
				 $total_ivema = $total_ivema + $horas;
			 elseif ($grupo == "mobius")
				 $total_mobius = $total_mobius + $horas;
			 elseif ($grupo == "centro")
				 $total_centro = $total_centro + $horas;
	
			 if ($asistencia == 'SI') $horas_si = $horas_si + $horas;
        	 if ($asistencia == 'NO') $horas_no = $horas_no + $horas;
       



$total_profe = $total_profe + $horas;
			 //var_dump ($row);
       //echo $row;
       if ($row->precio_c == NULL)
         $row->precio_c = 0;
       $precio_clase = $row->precio_c;
       if (($precio_clase === NULL)  || ($precio_clase == 0)) $precio_clase = getPrecioHoraDB($row->account_id_c, $row->meetings_accounts_1accounts_idb);
       
       $total_precio+=$horas*$precio_clase;
			 echo "<tr><td>"._settimezone($row->date_start, 'UTC', 'GMT+2')."</td><td>".$row->name."</td><td>".$nombre_al."</td><td>".$grupo."</td><td>".$horas."</td><td>".$asistencia."</td></tr>";
	 }
	 	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 
		 
		 if ($total_ivema > 0)
			 echo "<tr><td>Total IVEMA</td><td></td><td></td><td></td><td>".$total_ivema."</td><td></td></tr>";
		 if ($total_mobius > 0)
			 echo "<tr><td>Total MOBIUS</td><td></td><td></td><td></td><td>".$total_mobius."</td><td></td></tr>";
		 if ($total_centro > 0)
			 echo "<tr><td>Total CENTRO</td><td></td><td></td><td></td><td>".$total_centro."</td><td></td><td></tr>";
	 	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 		 
		 
		  echo "<tr><td>Asistidas</td><td></td><td><td></td></td><td>".$horas_si."</td><td></td></tr>";
		  echo "<tr><td>Faltas</td><td></td><td><td></td></td><td>".$horas_no."</td><td></td></tr>";
	 	 echo "<tr><td>TOTAL</td><td></td><td><td></td></td><td>".$total_profe."</td><td></td></tr>";
	 ?>
     </table>
    </body>
    </html>