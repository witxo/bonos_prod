<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2017-06-16 14:18:43
$dictionary["Bonos_Bonos"]["fields"]["bonos_bonos_accounts"] = array (
  'name' => 'bonos_bonos_accounts',
  'type' => 'link',
  'relationship' => 'bonos_bonos_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_BONOS_BONOS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'bonos_bonos_accountsaccounts_ida',
);
$dictionary["Bonos_Bonos"]["fields"]["bonos_bonos_accounts_name"] = array (
  'name' => 'bonos_bonos_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BONOS_BONOS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'bonos_bonos_accountsaccounts_ida',
  'link' => 'bonos_bonos_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Bonos_Bonos"]["fields"]["bonos_bonos_accountsaccounts_ida"] = array (
  'name' => 'bonos_bonos_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'bonos_bonos_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_BONOS_BONOS_ACCOUNTS_FROM_BONOS_BONOS_TITLE',
);

 $dictionary['Bonos_Bonos']['fields']['fecha_uso_c'] = array (     
  'name' => 'fecha_uso_c',     
  'id_name' => 'fecha_uso_c',     
  'vname' => 'LBL_FECHA_USO',     
  'source' => 'non-db',     
  'dbType' => 'non-db',     
  'studio' => 'visible',     
  'type' => 'date',     
//  'rname' => 'fecha', // Related module's field name     
//  'link' => 'Clas', // Relationship name     
//  'module' => 'Meetings', // Related module name 
); 

 // created: 2017-07-25 16:04:06
$dictionary['Bonos_Bonos']['fields']['numerobono']['duplicate_merge']='enabled';
$dictionary['Bonos_Bonos']['fields']['numerobono']['duplicate_merge_dom_value']='1';

 
?>