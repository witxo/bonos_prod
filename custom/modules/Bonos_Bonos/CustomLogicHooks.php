<?php 


function getFechaUsoBonoCRM2 ($numbono)
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
    //echo $sql;
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

class CustomLogicHooks 
{     
  // Load Contact Office Phone into non-db field on Calls     
  function afterRetrieve(&$focus, $event, $arguments) 
  {         
    if (empty($focus->fetched_row['fecha_uso_c']))
    {             
   		//print_r ($focus);
      	$fecha = getFechaUsoBonoCRM2 ($focus->name);
      	if ($fecha != 0)
        {
          $date = new DateTime($fecha);

          $focus->fecha_uso_c = $date->format('d/m/Y');
          //$focus->fecha_uso_c = $fecha;
          
        }

    }     
  }    
  
  function processRecord(&$focus, $event, $arguments) 
  {         
    $this->afterRetrieve($focus, $event, $arguments);     
  } 
} 
?>