<?php
 // created: 2017-06-16 14:18:43
$layout_defs["Accounts"]["subpanel_setup"]['bonos_bonos_accounts'] = array (
  'order' => 100,
  'module' => 'Bonos_Bonos',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_BONOS_BONOS_ACCOUNTS_FROM_BONOS_BONOS_TITLE',
  'get_subpanel_data' => 'bonos_bonos_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
