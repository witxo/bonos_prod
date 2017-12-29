<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>	

      
    	<?php	

if(!defined('sugarEntry'))
  define('sugarEntry', true);
require_once ('include/entryPoint.php');
global $db, $current_user;

	include_once("dbconfig.php");
	include_once("funciones.php");


	$id = $_GET["id"];
	$mes = $_GET["mes"];
	$anio = $_GET["anio"];

  $fechafin = data_last_month_day ($mes, $anio);
  $fechaini = data_first_month_day ($mes, $anio);




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

$GLOBALS['db'] = $db;

	$fecha = date('Y-m-d H:i:s', time());
	//$sql = "SELECT meetings.name as nombrec, * FROM meetings inner join meetings_cstm on meetings.id = meetings_cstm.id_c inner join users_cstm as con meetings.assigned_user_id = users_cstm.id_c inner join meetings_accounts_1_c as d on meetings.id = meetings_accounts_1_c.meetings_accounts_1meetings_ida inner join accounts on meetings_accounts_1_c.meetings_accounts_1accounts_idb = accounts.id WHERE meetings.deleted = 0 and meetings_accounts_1_c.deleted = 0 and meetings.assigned_user_id = '".$id."' and date_start > '".$fechaini."' and date_start < '".$fechafin."'  GROUP BY meetings.id order by date_start";
$sql = "SELECT a.name as nombrec, a.date_start as date_inicio, a.date_end as date_fin,  e.id as cuentaid, a.*, b.*, c.*, d.*, e.* FROM meetings as a inner join meetings_cstm as b on a.id = b.id_c inner join users_cstm as c 
on a.assigned_user_id = c.id_c inner join meetings_accounts_1_c as d on a.id = d.meetings_accounts_1meetings_ida inner join accounts as e
on d.meetings_accounts_1accounts_idb = e.id 
WHERE a.status = 'Held' and a.deleted = 0 and d.deleted = 0 and a.assigned_user_id = '".$id."' and date_start >= '".$fechaini."' and date_start <= '".$fechafin."'  
and a.name <> 'Vacaciones' order by date_start";

    //echo $sql;
	$handle = mysql_query($sql);	




	
?> </title>
    	<a href="javascript: history.go(-1)">
<img src="images/b_back.png" width="30" height="28" alt="Atras"></a>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    
    </head>
    <body>
    <table width="92%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0927ff">
    
	
	 <tr><td class="primeralinea">Fecha/Hora inicio clase</td><td>Clase</td><td>Alumno</td><td>Grupo</td><td>Horas/Clase</td><td>Total horas/mes</td><td>Ingreso/h</td><td>Ingreso/tot</td></tr>
      <?php
	 $total_profe = 0;
	 $total_mobius = 0;
	 $total_ivema  = 0;
	 $total_centro = 0;
	$total_precio = 0;

$total_precio = 0;
	 	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 	
	 while ($row = mysql_fetch_object($handle)) 
	 {
         
       
		     $grupo = getGrupoAlumno($row->meetings_accounts_1accounts_idb);
			 $segundos=strtotime($row->date_fin) - strtotime($row->date_inicio);
			  $horas=floatval($segundos/60/60);		
       if ($row->meetings_accounts_1meetings_ida != "")
       {
         $bono = getBonoClase($row->meetings_accounts_1meetings_ida);
         $precio_bono = getPrecioBono($row->meetings_accounts_1meetings_ida);
       }
       
       $ingreso_al = getIngresoAlumnoAsignatura ($row->cuentaid, $row->nombre_c, $mes);
       $horas_al = getHorasAlumnoAsignatura ($row->cuentaid, $row->nombrec, $mes);
       $ingreso_hora = $ingreso_al / $horas_al;
       
       $ingreso_total = $ingreso_hora * $horas;
       
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
       //if ($row->precio_c == NULL)
         //$row->precio_c = 0;
       //$precio_clase = $row->precio_c;
       //if (($precio_clase === NULL)  || ($precio_clase == 0)) $precio_clase = getPrecioHoraDB($row->account_id_c, $row->meetings_accounts_1accounts_idb);
       
       //$total_precio+=$horas*$precio_clase;
       
       if ($precio_bono != '')
       {
         $total_precio = $total_precio + $precio_bono;
         echo "<tr><td>"._settimezone($row->date_inicio, 'UTC', 'GMT+2')."</td><td>".$row->nombrec."</td><td>".$row->name."</td><td>".$grupo."</td><td>".$horas."</td><td>".$horas_al."</td><td>".number_format($precio_bono,2)."</td><td>".number_format($precio_bono,2);
       }
       else
       {
         $total_precio = $total_precio + $ingreso_total;
			 echo "<tr><td>"._settimezone($row->date_inicio, 'UTC', 'GMT+2')."</td><td>".$row->nombrec."</td><td>".$row->name."</td><td>".$grupo."</td><td>".$horas."</td><td>".$horas_al."</td><td>".number_format($ingreso_hora,2)."</td><td>".number_format($ingreso_total,2);
       }
	 }
	 	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 
		 
    	 echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	 		 

		 
	 	 echo "<tr><td>TOTAL Ingresos</td><td></td><td><td></td></td><td></td><td></td><td></td><td>".number_format($total_precio,2)."</td></tr>";

$profeid = getUserAccount ($id);

		  $sueldo_profe = getSueldoMes ($profeid, $mes);
  $ss_profe = getSSMes ($profeid, $mes);
  $irpf_profe = getIRPFMes ($profeid, $mes);
  $gastos_profe = $sueldo_profe + $ss_profe + $irpf_profe;
$porcentaje = get_gastos_generales (2017);
$gastos_profegg = $gastos_profe+ $gastos_profe*$porcentaje/100;
$diferencia = $total_precio - $gastos_profe;
$diferenciagg = $total_precio - $gastos_profegg;

	 	 echo "<tr><td>TOTAL Coste</td><td></td><td><td></td></td><td></td><td></td><td></td><td>".number_format($gastos_profe,2)."</td></tr>";
if ($diferencia > 0)
  echo "<tr><td>BENEFICIO Bruto</td><td></td><td><td></td></td><td></td><td></td><td></td><td>".number_format($diferencia,2)."</td></tr>";
else
  echo "<tr><td>PERDIDA Bruta</td><td></td><td><td></td></td><td></td><td></td><td></td><td>".number_format($diferencia,2)."</td></tr>";

         echo "<tr><td>TOTAL Coste + Gastos Generales(".number_format($porcentaje,2)."%) </td><td></td><td><td></td></td><td></td><td></td><td></td><td>".number_format($gastos_profegg,2)."</td></tr>";







if ($diferenciagg > 0)
  echo "<tr><td>BENEFICIO Neto</td><td></td><td><td></td></td><td></td><td></td><td></td><td>".number_format($diferenciagg,2)."</td></tr>";
else
  echo "<tr><td>PERDIDA Neta</td><td></td><td><td></td></td><td></td><td></td><td></td><td>".number_format($diferenciagg,2)."</td></tr>";
  

 
 
	 ?>
     </table>
    </body>
    </html>