<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/



require_once('custom/funciones.php');

function additionalDetailsMeeting($fields) {
  
  
  //print_r ($fields);
    global $current_user;
	static $mod_strings;
  
  $mes = substr($fields['DATE_START'], 3, 2);
  
	if(empty($mod_strings)) {
		global $current_language;
		$mod_strings = return_module_language($current_language, 'Meetings');
	}
		
	$overlib_string = '';
	
    if(!empty($fields['NAME'])) {
          	$overlib_string .= '<b>'. $mod_strings['LBL_SUBJECT'] . '</b> ' . $fields['NAME'];
          	$overlib_string .= '<br>';
    }
	if(!empty($fields['DATE_START'])) 
		$overlib_string .= '<b>'. $mod_strings['LBL_DATE_TIME'] . '</b> ' . $fields['DATE_START'] . ' <br>';
	if(isset($fields['DURATION_HOURS']) || isset($fields['DURATION_MINUTES'])) {
		$overlib_string .= '<b>'. $mod_strings['LBL_DURATION'] . '</b> '; 
        if(isset($fields['DURATION_HOURS'])) {
            $overlib_string .= $fields['DURATION_HOURS'] . $mod_strings['LBL_HOURS_ABBREV'] . ' ';
        }
        if(isset($fields['DURATION_MINUTES'])) {
            $overlib_string .=  $fields['DURATION_MINUTES'] . $mod_strings['LBL_MINSS_ABBREV'];
        }
        $overlib_string .=  '<br>';
	}
    if (!empty($fields['PARENT_ID']))
    {
         $overlib_string .= "<b>". $mod_strings['LBL_RELATED_TO'] . "</b> ".
   	               "<a href='index.php?module=".$fields['PARENT_TYPE']."&action=DetailView&record=".$fields['PARENT_ID']."'>".
   	               $fields['PARENT_NAME'] . "</a>";
   	       $overlib_string .= '<br>';
    }

    if(!empty($fields['STATUS'])) {
  	    $overlib_string .= '<b>'. $mod_strings['LBL_STATUS'] . '</b> ' . $fields['STATUS'];
  	    $overlib_string .= '<br>';
      }

    if(!empty($fields['DESCRIPTION'])) {
		$overlib_string .= '<b>'. $mod_strings['LBL_DESCRIPTION'] . '</b> ' . substr($fields['DESCRIPTION'], 0, 300);
		if(strlen($fields['DESCRIPTION']) > 300) $overlib_string .= '...';
		$overlib_string .= '<br>';
	}

	
	//echo $fields['ACCOUNT_ID_C]'];
    //echo $fields['ACCOUNT_ID1_C]'];
  
   $precio_prof_tot = 0;
  $cabecera = 0;
for ($i = 0; $i < 10; $i++) 
{
    $precio_prof = 0;
    if ($cabecera == 0)
    {
      if ($fields['NODIR_C'] != true)
      {
       $overlib_string .= '<br><u>Alumnos:</u><br>';
      }
      else
      {
        $overlib_string .= '<br><u>Alumnos (Clase en la academia):</u><br>';
      }
      $cabecera = 1;
    }
  
  if ($i == 0)
  {
    $c = '';
  }
  else
  {
    $c = $i;
  }
  
  $cuenta = $fields['ACCOUNT_ID'.$c.'_C'];
  
	if ($cuenta != '')
    {
     	$AccountBean = BeanFactory::getBean('Accounts', $cuenta);
        $UserBean = BeanFactory::getBean('Users', $fields['ASSIGNED_USER_ID']);
    	$precio_prof = getPrecioHora($UserBean->account_id_c, $AccountBean->id);   
      
        $precio_prof_tot = $precio_prof_tot + $precio_prof;

    
     if ($current_user->is_admin <> 1)
     {
       if ($fields['NODIR_C'] != true)
       {
 		$overlib_string .= '<p><b>'.  $AccountBean->name . ': </b></p> ';

 		$overlib_string .= '<p>'.  $AccountBean->billing_address_street . '</p> ';
 		$overlib_string .= '<p>'.  $AccountBean->billing_address_postalcode . ' - ' . $AccountBean->billing_address_city . '</p> ';
 		$overlib_string .= '<p>'.  $AccountBean->billing_address_state . ' (' . $AccountBean->billing_address_country . ') </p> ';
       }
       else
       {
         $overlib_string .= '<p><b>'.  $AccountBean->name . '</b></p> ';
       }
       
       
       

      }
      else
      {
         $horasalumno = getHorasAlumnoAsignaturaCRM ($AccountBean->id, $fields['NAME'], $mes);
         $ingresoalumno = getIngresoAlumnoAsignaturaCRM ($AccountBean->id, $fields['NAME'], $mes);
        
 		$overlib_string .= '<b>'. "<a href='index.php?module=Accounts&action=DetailView&record=".$AccountBean->id."'>" . $AccountBean->name . "</a>". '</b> ';
    	$overlib_string .= ' - Horas/Mes: '.$horasalumno. ' // Ingreso/Mes: '.$ingresoalumno;
    	$overlib_string .= '<br>';
      }
    }  
}  

    
       if ($current_user->is_admin <> 1)
      {


      }
      else
      {
        
        
  $sueldo_profe = getSueldoMesCRM ($UserBean->account_id_c, $mes);
  $ss_profe = getSSMesCRM ($UserBean->account_id_c, $mes);
  $irpf_profe = getIRPFMesCRM ($UserBean->account_id_c, $mes);
  $gastos_profe = $sueldo_profe + $ss_profe + $irpf_profe;
  
  
  $horas_profe = getHorasProfe ($UserBean->account_id_c, $mes);
  
  $coste_profe_hora = $gastos_profe / $horas_profe;
    $overlib_string .= '<br><b>'. "Gastos Profe: ". round($gastos_profe, 2). '</b>';   
   $overlib_string .= '<br><b>'. "Horas Profe: ". round($horas_profe, 2). '</b>';     
   $overlib_string .= '<br><b>'. "Coste Profe/h: ". round($coste_profe_hora, 2). '</b>';     
      
$duracion_min = $fields['DURATION_HOURS']*60  + $fields['DURATION_MINUTES'];   
  

  $Bono = BeanFactory::getBean('Bonos_Bonos', $fields['BONOS_BONOS_ID_C']);
  
  
  $overlib_string .= '<br><br><u>'. "Ingresos:".'</u>';
    $overlib_string .= "<br>Ingresos Bono ".$fields['BONO_C'].": ". $Bono->precio;   
  
    $overlib_string .= '<br><br><b>'. "Ingresos/h: ". $Bono->precio * 60 / $duracion_min. '</b>';      
  
  $dif = $Bono->precio * 60 / $duracion_min - $coste_profe_hora;
  
  if ($dif >= 0)
  {
   	$overlib_string .= '<br><br><b>'. "Beneficio: ". round($dif, 2). '</b>';  
  }
  else
  {
     $overlib_string .= '<br><br><b>'. "Perdida: ". round($dif, 2). '</b>';   
  }

  
      }


  

	
	$editLink = "index.php?action=EditView&module=Meetings&record={$fields['ID']}"; 
	$viewLink = "index.php?action=DetailView&module=Meetings&record={$fields['ID']}";
	
	return array('fieldToAddTo' => 'NAME', 
				 'string' => $overlib_string, 
				 'editLink' => $editLink, 
				 'viewLink' => $viewLink);
	
}
 
?>
