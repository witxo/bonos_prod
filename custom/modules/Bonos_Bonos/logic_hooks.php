<?php 

$hook_version = 1; 
$hook_array = Array(); 
$hook_array['after_retrieve'] = Array(); 
$hook_array['after_retrieve'][] = Array(1, 'AfterRetrieve', 'custom/modules/Bonos_Bonos/CustomLogicHooks.php','CustomLogicHooks', 'afterRetrieve'); 
$hook_array['process_record'] = Array(); 
$hook_array['process_record'][] = Array(1, 'ProcessRecord', 'custom/modules/Bonos_Bonos/CustomLogicHooks.php','CustomLogicHooks', 'processRecord'); 

?>