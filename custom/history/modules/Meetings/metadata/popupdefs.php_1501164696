<?php
$popupMeta = array (
    'moduleMain' => 'Meetings',
    'varName' => 'Meeting',
    'orderBy' => 'meetings.name',
    'whereClauses' => array (
  'date_start' => 'meetings.date_start',
  'status' => 'meetings.status',
  'assigned_user_id' => 'meetings.assigned_user_id',
),
    'searchInputs' => array (
  3 => 'status',
  4 => 'date_start',
  6 => 'assigned_user_id',
),
    'searchdefs' => array (
  'date_start' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_DATE',
    'width' => '10%',
    'name' => 'date_start',
  ),
  'status' => 
  array (
    'name' => 'status',
    'width' => '10%',
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
