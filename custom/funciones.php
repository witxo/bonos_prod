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
  
    		    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
// select * from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c inner join accounts_fact_facturas_c ON  
// fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb where accounts_fact_facturas_c.accounts_f4ffcccounts_ida = 'aef35f92-dcec-41b8-102f-563893bb5c3b' and clasificacion_c = 'ss'  
 
  
  $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
    $query = "select SUM(amount) as cantidad from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c ";
  $query .= " inner join accounts_fact_facturas_c ON  fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb ";
  $query .= " where fact_facturas.deleted = 0 and accounts_fact_facturas_c.accounts_f4ffcccounts_ida = '".$profe."' and clasificacion_c = 'sueldos'";
  
   $query .= " AND fact_facturas.date_closed >= '". $fechad ."'".
                  "  AND fact_facturas.date_closed <='". $fechah."'";
  
  //echo $query;
  
    $result = mysql_query($query);

  
    

  $row = mysql_fetch_object($result);
	
	if ($row == false)
    		return 0;
	else  return $row->cantidad;
  
}

function getSSMes ($profe, $mes)
{

       		    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
// select * from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c inner join accounts_fact_facturas_c ON  
// fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb where accounts_fact_facturas_c.accounts_f4ffcccounts_ida = 'aef35f92-dcec-41b8-102f-563893bb5c3b' and clasificacion_c = 'ss'  
 
  
  $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
    $query = "select amount from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c ";
  $query .= " inner join accounts_fact_facturas_c ON  fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb ";
  $query .= " where fact_facturas.deleted = 0 and accounts_fact_facturas_c.accounts_f4ffcccounts_ida = '".$profe."' and clasificacion_c = 'ss'";
  
   $query .= " AND fact_facturas.date_closed >= '". $fechad ."'".
                  "  AND fact_facturas.date_closed <='". $fechah."'";
  
  //echo $query;
  
    $result = mysql_query($query);

  
    

  $row = mysql_fetch_object($result);
	
	if ($row == false)
    		return 0;
	else  return $row->amount;
  
}

function getIRPFMes ($profe, $mes)
{

        		    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
// select * from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c inner join accounts_fact_facturas_c ON  
// fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb where accounts_fact_facturas_c.accounts_f4ffcccounts_ida = 'aef35f92-dcec-41b8-102f-563893bb5c3b' and clasificacion_c = 'ss'  
 
  
  $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
    $query = "select amount from fact_facturas inner join fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c ";
  $query .= " inner join accounts_fact_facturas_c ON  fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb ";
  $query .= " where fact_facturas.deleted = 0 and accounts_fact_facturas_c.accounts_f4ffcccounts_ida = '".$profe."' and clasificacion_c = 'irpf'";
  
   $query .= " AND fact_facturas.date_closed >= '". $fechad ."'".
                  "  AND fact_facturas.date_closed <='". $fechah."'";
  
    $result = mysql_query($query);

  
    

  $row = mysql_fetch_object($result);
	
	if ($row == false)
    		return 0;
	else  return $row->amount;
  
}

function getHorasProfe ($profe, $mes)
{
  	$db = $GLOBALS['db'];
   $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
  $sql = "SELECT SUM(duration_hours) as H, SUM(duration_minutes)as M  FROM meetings inner join users_cstm on meetings.assigned_user_id = users_cstm.id_c WHERE deleted = 0 and users_cstm.account_id_c = '".$profe."' and date_start > '".$fechad."' and date_start < '".$fechah."' and meetings.status = 'Held' and name <> 'Vacaciones'";
  
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


function selecAlumnos(){
  $ret = array();

    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();

    $sql = "select * from accounts where account_type ='Activo' or account_type = 'Alumno_Curso' and deleted = 0 order by name";
$handle = mysql_query($sql);
    //echo($sql);

	 echo "<option value =''></option>";
while ($row = mysql_fetch_object($handle)) {
    //echo $sql;
 
 echo "<option value ='".$row->id."'>".$row->name."</option>";
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


function getPrecioBono($id){
  $ret = array();

    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
    $sql = "select precio from meetings_cstm inner join bonos_bonos on id = bonos_bonos_id_c where id_c ='".$id."'";
    //echo($sql);


    $handle = mysql_query($sql);
    //echo $sql;
    $row = mysql_fetch_object($handle);
    return $row->precio;


}


function getNombreAlumno($id)
{
  $ret = array();

    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
    $sql = "select name from accounts where id ='".$id."'";
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
    //echo($sql);
	


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
    //echo $sql;
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







function getBonoAlumno ($alumno, $bono)
{
      $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
    $sql = "SELECT * FROM bonos_bonos inner join bonos_bonos_accounts_c on bonos_bonos_accountsbonos_bonos_idb = bonos_bonos.id where numerobono = '". $bono. "' and bonos_bonos_accountsaccounts_ida = '".$alumno."';";

	


    $handle = mysql_query($sql);
    //echo $sql;
    $row = mysql_fetch_object($handle);
	
	if ($row == false)
    {
		return 'false';
    }
    else
    {
    	return 'true';
     }
  
}

function getHorasAlumnoAsignatura ($alumno, $asignatura, $mes)
{
    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
    $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
  $sql = "SELECT SUM(duration_hours) as H, SUM(duration_minutes) as M FROM `meetings_accounts_1_c` inner join meetings on meetings.id = meetings_accounts_1_c.meetings_accounts_1meetings_ida inner join meetings_cstm on meetings.id = meetings_cstm.id_c".
    " WHERE meetings.status = 'Held' and meetings.deleted = 0 and meetings_accounts_1_c.deleted = 0 and name = '".$asignatura."' and `meetings_accounts_1accounts_idb` = '".$alumno."'";
  
     $sql .= " AND meetings.date_start >= '". $fechad ."'".
                  "  AND meetings.date_start <='". $fechah."'";
  
  //echo "<br>".$sql;
  $result = mysql_query($sql);
  
  $row = mysql_fetch_object($result);
	
	if ($row == false)
    		return 0;
	else
    {
      $horas = $row->H + $row->M/60;
      return floatval($horas);
    }  
}

function getHorasAlumnoAsignaturaCRM ($alumno, $asignatura, $mes)
{
   	$db = $GLOBALS['db'];
    $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
  $sql = "SELECT SUM(duration_hours) as H, SUM(duration_minutes) as M FROM `meetings_accounts_1_c` inner join meetings on meetings.id = meetings_accounts_1_c.meetings_accounts_1meetings_ida inner join meetings_cstm on meetings.id = meetings_cstm.id_c".
    " WHERE meetings.status = 'Held' and meetings.deleted = 0 and meetings_accounts_1_c.deleted = 0 and name = '".$asignatura."' and `meetings_accounts_1accounts_idb` = '".$alumno."'";
  
     $sql .= " AND meetings.date_start >= '". $fechad ."'".
                  "  AND meetings.date_start <='". $fechah."'";
  
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


function getIngresoAlumnoAsignatura ($alumno, $asignatura, $mes)
{
  $total = 0;
    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
  $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
  $sql = "SELECT precio_ud, cantidad FROM `fact_facturas`".
    	 " INNER JOIN fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c".
    	 " INNER JOIN fact_factura_items on fact_facturas.id = fact_factura_items.factura_id".
    	 " inner join fact_items on fact_factura_items.item_id = fact_items.id".
         " inner join fact_items_cstm on fact_items.id = fact_items_cstm.id_c".
    	 " inner join accounts_fact_facturas_c on fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb".
    	 " where fact_items_cstm.clase2_c = '".$asignatura."'".
    	 " and accounts_fact_facturas_c.accounts_f4ffcccounts_ida = '".$alumno."'";
       $sql .= " AND fact_facturas_cstm.fecha_contable_c >= '". $fechad ."'".
                  "  AND fact_facturas_cstm.fecha_contable_c <='". $fechah."'";
  //echo $sql;
     //$result = $db->query($sql);
  $result = mysql_query($sql);
  
  while ($row = mysql_fetch_object($result)) 
  {
    $total = $total + $row->precio_ud * $row->cantidad;
  
  }
  
  return $total;
}



function getIngresoAlumnoAsignaturaCRM ($alumno, $asignatura, $mes)
{
  $total = 0;
	$db = $GLOBALS['db'];
  
  $fechah = data_last_month_day ($mes, date("Y"));
  $fechad = data_first_month_day ($mes, date("Y"));
  
  $sql = "SELECT precio_ud, cantidad FROM `fact_facturas`".
    	 " INNER JOIN fact_facturas_cstm on fact_facturas.id = fact_facturas_cstm.id_c".
    	 " INNER JOIN fact_factura_items on fact_facturas.id = fact_factura_items.factura_id".
    	 " inner join fact_items on fact_factura_items.item_id = fact_items.id".
         " inner join fact_items_cstm on fact_items.id = fact_items_cstm.id_c".
    	 " inner join accounts_fact_facturas_c on fact_facturas.id = accounts_fact_facturas_c.accounts_fbc88acturas_idb".
    	 " where fact_items_cstm.clase2_c = '".$asignatura."'".
    	 " and accounts_fact_facturas_c.accounts_f4ffcccounts_ida = '".$alumno."'";
       $sql .= " AND fact_facturas_cstm.fecha_contable_c >= '". $fechad ."'".
                  "  AND fact_facturas_cstm.fecha_contable_c <='". $fechah."'";

  
//       $sql .= " AND fact_facturas.date_closed >= '". $fechad ."'".
//                  "  AND fact_facturas.date_closed <='". $fechah."'";
 //echo $sql;
     //$result = $db->query($sql);
     $result = $db->query($sql);

  
  while ($row = $db->fetchByAssoc($result)) 
  {
    $total = $total + $row['precio_ud'] * $row['cantidad'];
  
  }
  
  return $total;
}

  

function getSueldoMesCRM ($profe, $mes)
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

function getSSMesCRM ($profe, $mes)
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
  
  //echo $query;
  
    $result = $db->query($query);
  
    
$row = $db->fetchByAssoc($result);
	
	if ($row == false)
    		return 0;
	else  return $row['amount'];
  
}

function getIRPFMesCRM ($profe, $mes)
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



function getFechaUsoBonoCRM ($numbono)
{
  
  /*
      $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  */
  
  $db = $GLOBALS['db'];
    $sql = "SELECT * FROM bonos_bonos inner join meetings_cstm on bonos_bonos.id = meetings_cstm.bonos_bonos_id_c inner join meetings on meetings.id = meetings_cstm.id_c where bonos_bonos.name='".$numbono."' and meetings.deleted = 0;";
	


    $result = $db->query($sql);
    echo $sql;
    $row = $db->fetchByAssoc($result);
	
	if ($row == false)
    {
		return 0;
    }
    else
    {
    	return $row['date_start'];
     }
  
}



function getUserAccount ($userid)
{
      $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
  $query = "SELECT account_id_c FROM users_cstm where id_c = '".$userid."'";
  
  //echo $query;
    $result = mysql_query($query);
  
  $row = mysql_fetch_object($result);
  return $row->account_id_c;

}


function get_gastos_generales ($year)
{
  
      		    $db = new DBConnection();
	$db2 = $db->getCRMConnection();
mysql_set_charset('utf8',$db2);
    $db->getCRMConnection();
  
    $fechah = data_last_month_day (12, $year);
    $fechad = data_first_month_day (1, $year);
  
        $query =  'SELECT '.
                  '  estado estado_advanced,'.
                  '  clasificacion_c,'.
				  '  fact_facturas_cstm.gasto_si_no_c as gasto, '.
                  '  sum(amount) as total, '.
                  '  count(*) as fact_count '.
                  ' FROM fact_facturas INNER JOIN fact_facturas_cstm '.
				  ' ON  id = id_c '.
                  '  AND fact_facturas.deleted=0 AND ( fact_facturas_type=\'factura proveedor\' '.
		  '  OR fact_facturas_type=\'nomina\' OR fact_facturas_type=\'recibo proveedor\' ) '.
                  '  AND gasto_si_no_c=\'Si\' '.
          		  '  AND estado=\'pagada\' '.
   $query .= " AND fact_facturas.date_closed >= '". $fechad ."'".
                  "  AND fact_facturas.date_closed <='". $fechah."'";
  
      $result = mysql_query($query);

  
    

  $row = mysql_fetch_object($result);
	
	if ($row == false)
    		$gastos_tot = 0;
	else  $gastos_tot = $row->total;
  
  
  
  
  
        $query2 =  'SELECT '.
                  '  estado estado_advanced,'.
                  '  clasificacion_c,'.
				  '  fact_facturas_cstm.gasto_si_no_c as gasto, '.
                  '  sum(amount) as total, '.
                  '  count(*) as fact_count '.
                  ' FROM fact_facturas INNER JOIN fact_facturas_cstm '.
				  ' ON  id = id_c '.
                  '  AND fact_facturas.deleted=0 AND ( fact_facturas_type=\'factura proveedor\' '.
		  '  OR fact_facturas_type=\'nomina\' OR fact_facturas_type=\'recibo proveedor\' ) '.
                  '  AND gasto_si_no_c=\'Si\' '.
          		  '  AND estado=\'pagada\' '.
          		  '  AND ( clasificacion_c=\'sueldos\' OR clasificacion_c=\'irpf\' OR clasificacion_c=\'ss\' ) '.
   $query2 .= " AND fact_facturas.date_closed >= '". $fechad ."'".
                  "  AND fact_facturas.date_closed <='". $fechah."'";
  
  
      $result2 = mysql_query($query2);

  
    

  $row2 = mysql_fetch_object($result2);
	
	if ($row2 == false)
    		$gastos_sueldos = 0;
	else  $gastos_sueldos = $row2->total;
  
  
  $porcentaje = ($gastos_tot - $gastos_sueldos)*100/$gastos_sueldos;
  
  return $porcentaje;
  
}

  ?>