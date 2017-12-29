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
	//$sql = "SELECT meetings.name as nombrec, * FROM meetings inner join meetings_cstm on meetings.id = meetings_cstm.id_c inner join users_cstm as con meetings.assigned_user_id = users_cstm.id_c inner join meetings_accounts_1_c as d on meetings.id = meetings_accounts_1_c.meetings_accounts_1meetings_ida inner join accounts on meetings_accounts_1_c.meetings_accounts_1accounts_idb = accounts.id WHERE meetings.deleted = 0 and meetings_accounts_1_c.deleted = 0 and meetings.assigned_user_id = '".$id."' and date_start > '".$fechaini."' and date_start < '".$fechafin."'  GROUP BY meetings.id order by date_start";
$sql = "SELECT a.name as nombrec, a.date_start as date_inicio, a.date_end as date_fin, a.*, b.*, c.*, d.*, e.* FROM meetings as a inner join meetings_cstm as b on a.id = b.id_c inner join users_cstm as c 
on a.assigned_user_id = c.id_c inner join meetings_accounts_1_c as d on a.id = d.meetings_accounts_1meetings_ida inner join accounts as e
on d.meetings_accounts_1accounts_idb = e.id 
WHERE a.status = 'Held' and a.deleted = 0 and d.deleted = 0 and a.assigned_user_id = '".$id."' and date_start >= '".$fechaini."' and date_start <= '".$fechafin."'  
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
    
	
	 <tr><td class="primeralinea">Fecha/Hora inicio clase</td><td>Clase</td><td>Alumno</td><td>Grupo</td><td>Horas</td><td>Bono</td><td>Validado</td><td>Precio/Hora</td><td>Precio</td></tr>
      <?php
	 $total_profe = 0;
	 $total_mobius = 0;
	 $total_ivema  = 0;
	 $total_centro = 0;

$total_precio = 0;
	 	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 	
	 while ($row = mysql_fetch_object($handle)) 
	 {
         
       
		     $grupo = getGrupoAlumno($row->meetings_accounts_1accounts_idb);
			 $segundos=strtotime($row->date_fin) - strtotime($row->date_inicio);
			  $horas=floatval($segundos/60/60);		
       
       //echo "<p>Sec ".$segundos."</p>";
       
       //$horas = $row->duration_hours + $row->duration_minutes/60;
			 
			 if ($grupo == "ivema")
				 $total_ivema = $total_ivema + $horas;
			 elseif ($grupo == "mobius")
				 $total_mobius = $total_mobius + $horas;
			 elseif ($grupo == "centro")
				 $total_centro = $total_centro + $horas;
	
			 



$total_profe = $total_profe + $horas;
			 //var_dump ($row);
       //echo $row;
       if ($row->precio_c == NULL)
         $row->precio_c = 0;
       $precio_clase = $row->precio_c;
       if (($precio_clase === NULL)  || ($precio_clase == 0)) $precio_clase = getPrecioHoraDB($row->account_id_c, $row->meetings_accounts_1accounts_idb);
       
       $total_precio+=$horas*$precio_clase;
			 echo "<tr><td>"._settimezone($row->date_inicio, 'UTC', 'GMT+2')."</td><td>".$row->nombrec."</td><td>".$row->name."</td><td>".$grupo."</td><td>".$horas."</td><td>".getBonoClase($row->meetings_accounts_1meetings_ida)."</td><td>".getBonoValidadoClase($row->meetings_accounts_1meetings_ida)."</td><td>".number_format($precio_clase,2)."</td><td>".number_format($horas*$precio_clase, 2)."</td></tr>";
	 }
	 	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 
		 
		 if ($total_ivema > 0)
			 echo "<tr><td>Total IVEMA</td><td></td><td></td><td></td><td>".$total_ivema."</td><td></td><td></td><td></td><td></td></tr>";
		 if ($total_mobius > 0)
			 echo "<tr><td>Total MOBIUS</td><td></td><td></td><td></td><td>".$total_mobius."</td><td></td><td></td><td></td><td></td></tr>";
		 if ($total_centro > 0)
			 echo "<tr><td>Total CENTRO</td><td></td><td></td><td></td><td>".$total_centro."</td><td></td><td></td><td></td><td></td></tr>";
	 	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 		 
		 
		 
	 	 echo "<tr><td>TOTAL</td><td></td><td><td></td></td><td>".$total_profe."</td><td></td><td></td><td></td><td>".number_format($total_precio,2)."</td></tr>";
	 ?>
     </table>
    </body>
    </html>