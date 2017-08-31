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

function selecProfesores(){
  $ret = array();

    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();

    $sql = "select * from accounts inner join users_cstm on id = account_id_c  where account_type ='Teacher' and deleted = 0 order by name";
$handle = mysql_query($sql);
    //echo($sql);

	 echo "<option value =''></option>";
while ($row = mysql_fetch_object($handle)) {
    //echo $sql;
 
 echo "<option value ='".$row->id_c."'>".$row->name."</option>";
}



}


function getBonoValidadoClase($id){
  $ret = array();

    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
    $sql = "select bono_validado_c from meetings_cstm where id_c ='".$id."'";
    //echo($sql);


    $handle = mysql_query($sql);
    //echo $sql;
    $row = mysql_fetch_object($handle);
    return $row->bono_validado_c;


}


function getBonoClase($id){
  $ret = array();

    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
    $sql = "select name from meetings_cstm inner join bonos_bonos on id = bonos_bonos_id_c where id_c ='".$id."'";
    //echo($sql);


    $handle = mysql_query($sql);
    //echo $sql;
    $row = mysql_fetch_object($handle);
    return $row->name;


}



function getGrupoAlumno($id){
  $ret = array();

    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
    $sql = "select grupo_c from accounts inner join accounts_cstm on id = id_c where id ='".$id."'";
    //echo($sql);


    $handle = mysql_query($sql);
    //echo $sql;
    $row = mysql_fetch_object($handle);
    return $row->grupo_c;


}


function _settimezone($time,$defaultzone,$newzone)
{
$date = new DateTime($time, new DateTimeZone($defaultzone));
$date->setTimezone(new DateTimeZone($newzone));
$result=$date->format('d-m-Y H:i:s');
return $result;
}


function getPrecioHoraDB($profe, $alum){
  $ret = array();

    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
    $sql = "select amount from preci_precios where deleted = 0 and account_id_c ='".$profe."' and account_id1_c = '".$alum."'";
	//echo "<p>";
   // echo($sql);
	


    $handle = mysql_query($sql);
    //echo $sql;
    $row = mysql_fetch_object($handle);
	
	if ($row == false)
		return 0;
	else  return $row->amount;


}

function getBonoUsado ($numbono)
{
      $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
    $sql = "SELECT * FROM bonos_bonos inner join meetings_cstm on bonos_bonos.id = meetings_cstm.bonos_bonos_id_c inner join meetings on meetings.id = meetings_cstm.id_c where bonos_bonos.name='".$numbono."' and meetings.deleted = 0;";

	


    $handle = mysql_query($sql);
    echo $sql;
    $row = mysql_fetch_object($handle);
	
	if ($row == false)
    {
		return 0;
    }
    else
    {
    	return $row->id_c;
     }
  
}

  
  ?>