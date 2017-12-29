<?php
global $current_user; 

if ( is_admin($current_user) || $current_user->calendario_c == '1')
{

$global_control_links['informe1'] = array(
'linkinfo' => array('Informe Clases'=> 'javascript:void(window.open(\'http://www.ivema.es/crm/index.php?entryPoint=Informes\'))')
                   
);
 
  $global_control_links['informe2'] = array(
'linkinfo' => array('Informe Agrupado'=> 'javascript:void(window.open(\'http://www.ivema.es/crm/index.php?entryPoint=Informe_Agrupado\'))')
                   
);
  
    $global_control_links['informe4'] = array(
'linkinfo' => array('Informe Alumnos'=> 'javascript:void(window.open(\'http://www.ivema.es/crm/index.php?entryPoint=Informe_Alumnos\'))')
                   
);
}

if ( is_admin($current_user) )
{
  $global_control_links['informe3'] = array(
'linkinfo' => array('Informe Rentabilidad'=> 'javascript:void(window.open(\'http://www.ivema.es/crm/index.php?entryPoint=Informe_Rentabilidad\'))')
                   
);
    
}
?>