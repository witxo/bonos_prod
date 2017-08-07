<?php
$popupMeta = array (
    'moduleMain' => 'Meetings',
    'varName' => 'Meeting',
    'orderBy' => 'meetings.name',
    'whereClauses' => array (
  'status' => 'meetings.status',
  'assigned_user_id' => 'meetings.assigned_user_id',
  'alumno1_c' => 'meetings.alumno1_c',
  'fecha_inicio_c' => 'meetings_cstm.fecha_inicio_c',
),
    'searchInputs' => array (
  3 => 'status',
  6 => 'assigned_user_id',
  7 => 'alumno1_c',
  9 => 'fecha_inicio_c',
),
    'searchdefs' => array (
  'fecha_inicio_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_INICIO',
    'width' => '10%',
    'name' => 'fecha_inicio_c',
  ),
  'status' => 
  array (
    'name' => 'status',
    'width' => '10%',
  ),
  'alumno1_c' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ALUMNO1',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'alumno1_c',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'type' => 'enum',
    'label' => 'LBL_ASSIGNED_TO',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
