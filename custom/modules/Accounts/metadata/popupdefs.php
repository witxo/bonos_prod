<?php
$popupMeta = array (
    'moduleMain' => 'Account',
    'varName' => 'ACCOUNT',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'accounts.name',
  'account_type' => 'accounts.account_type',
  'grupo_c' => 'accounts_cstm.grupo_c',
  'alumno_c' => 'accounts_cstm.alumno_c',
),
    'searchInputs' => array (
  0 => 'name',
  3 => 'account_type',
  4 => 'grupo_c',
  5 => 'alumno_c',
),
    'create' => array (
  'formBase' => 'AccountFormBase.php',
  'formBaseClass' => 'AccountFormBase',
  'getFormBodyParams' => 
  array (
    0 => '',
    1 => '',
    2 => 'AccountSave',
  ),
  'createButton' => 'LNK_NEW_ACCOUNT',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'account_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'account_type',
  ),
  'grupo_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_GRUPO',
    'width' => '10%',
    'name' => 'grupo_c',
  ),
  'alumno_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ALUMNO',
    'width' => '10%',
    'name' => 'alumno_c',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'ALUMNO_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ALUMNO',
    'width' => '10%',
  ),
  'ACCOUNT_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '2%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
),
);
