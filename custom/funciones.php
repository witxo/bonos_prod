<?php
      

  function data_last_month_day($month, $anio) { 
  
 
# Indicamos de que año
$year=$anio;
 
# mktime(0,0,0,$month+1,1,$year) = devuelve el timestamp de la fecha indicada
# aumentando en uno el numero del mes, y dejando el numero del dia como el
# primero 1. Tambien le indicamos que es la hora 0, minuto y segundos 0. Aqui
# obtendremos el timestamp de la hora 0 del primer dia del mes sugiente.
# -1 = restamos un segundo al timestamp, por lo que ya estamo en el mes anterior,
# es decir el que queremos saber.
# date("d" = devuelve el ultimo dia del mes.
 
return date('Y-m-d',(mktime(0,0,0,$month+1,1,$year)-1));
  };
 
  /** Actual month first day **/
  function data_first_month_day($month, $anio) {
      $year = $anio;
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
    
  }


function getPrecioHora($profe, $alum){
  $ret = array();


  		$db = $GLOBALS['db'];
 
    $query = "select amount from preci_precios where deleted = 0 and account_id_c ='".$profe."' and account_id1_c = '".$alum."'";
  
    $result = $db->query($query);
  
    
$row = $db->fetchByAssoc($result);
	
	if ($row == false)
    		return 0;
	else  return $row['amount'];


}

function getSueldoMes ($profe, $mes)
{
  
    		$db = $GLOBALS['db'];
  
// select * from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c inner join accounts_fact_facturas_c ON  
// fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb where accounts_fact_facturas_c.accounts_f4ffcccounts_ida = 'aef35f92-dcec-41b8-102f-563893bb5c3b' and clasificacion_c = 'ss'  
 
  
  $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
    $query = "select amount from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c ";
  $query .= " inner join accounts_fact_facturas_c ON  fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb ";
  $query .= " where fact_facturas.deleted = 0 and accounts_fact_facturas_c.accounts_f4ffcccounts_ida = '".$profe."' and clasificacion_c = 'sueldos'";
  
   $query .= " AND fact_facturas.date_closed >= '". $fechad ."'".
                  "  AND fact_facturas.date_closed <='". $fechah."'";
  
  //echo $query;
  
    $result = $db->query($query);
  
    
$row = $db->fetchByAssoc($result);
	
	if ($row == false)
    		return 0;
	else  return $row['amount'];
  
}

function getSSMes ($profe, $mes)
{
      		$db = $GLOBALS['db'];
  
// select * from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c inner join accounts_fact_facturas_c ON  
// fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb where accounts_fact_facturas_c.accounts_f4ffcccounts_ida = 'aef35f92-dcec-41b8-102f-563893bb5c3b' and clasificacion_c = 'ss'  
 
  
  $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
    $query = "select amount from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c ";
  $query .= " inner join accounts_fact_facturas_c ON  fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb ";
  $query .= " where fact_facturas.deleted = 0 and accounts_fact_facturas_c.accounts_f4ffcccounts_ida = '".$profe."' and clasificacion_c = 'ss'";
  
   $query .= " AND fact_facturas.date_closed >= '". $fechad ."'".
                  "  AND fact_facturas.date_closed <='". $fechah."'";
  
    $result = $db->query($query);
  
    
$row = $db->fetchByAssoc($result);
	
	if ($row == false)
    		return 0;
	else  return $row['amount'];
  
}

function getIRPFMes ($profe, $mes)
{
  
      		$db = $GLOBALS['db'];
  
// select * from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c inner join accounts_fact_facturas_c ON  
// fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb where accounts_fact_facturas_c.accounts_f4ffcccounts_ida = 'aef35f92-dcec-41b8-102f-563893bb5c3b' and clasificacion_c = 'ss'  
 
  
  $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
    $query = "select amount from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c ";
  $query .= " inner join accounts_fact_facturas_c ON  fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb ";
  $query .= " where fact_facturas.deleted = 0 and accounts_fact_facturas_c.accounts_f4ffcccounts_ida = '".$profe."' and clasificacion_c = 'irpf'";
  
   $query .= " AND fact_facturas.date_closed >= '". $fechad ."'".
                  "  AND fact_facturas.date_closed <='". $fechah."'";
  
    $result = $db->query($query);
  
    
$row = $db->fetchByAssoc($result);
	
	if ($row == false)
    		return 0;
	else  return $row['amount'];
  
}

function getHorasProfe ($profe, $mes)
{
  	$db = $GLOBALS['db'];
   $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
  $sql = "SELECT SUM(duration_hours) as H, SUM(duration_minutes)as M  FROM meetings inner join users_cstm on meetings.assigned_user_id = users_cstm.id_c WHERE deleted = 0 and users_cstm.account_id_c = '".$profe."' and date_start > '".$fechad."' and date_start < '".$fechah."'";
  
  //echo $sql;
    $result = $db->query($sql);
  
    
$row = $db->fetchByAssoc($result);
	
	if ($row == false)
    		return 0;
	else
    {
      $horas = $row['H'] + $row['M']/60;
      return floatval($horas);
    }
  
}
  
  ?>