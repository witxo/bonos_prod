<?php
$module_name = 'fact_Facturas';
$_module_name = 'fact_facturas';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'date_closed' => 
      array (
        'type' => 'date',
        'label' => 'LBL_FECHA_EMISION',
        'width' => '10%',
        'default' => true,
        'name' => 'date_closed',
      ),
      'accounts_fact_facturas_name' => 
      array (
        'type' => 'relate',
        'link' => 'accounts_fact_facturas',
        'label' => 'LBL_ACCOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'accounts_fact_facturas_name',
      ),
      'fact_facturas_type' => 
      array (
        'name' => 'fact_facturas_type',
        'displayParams' => 
        array (
          'size' => '3',
        ),
        'default' => true,
        'width' => '10%',
      ),
      'estado' => 
      array (
        'width' => '10%',
        'label' => 'LBL_ESTADO',
        'default' => true,
        'name' => 'estado',
        'displayParams' => 
        array (
          'size' => '4',
        ),
      ),
      'year' => 
      array (
        'name' => 'year',
        'label' => 'LBL_YEAR',
        'default' => true,
        'width' => '10%',
      ),
      'gasto_si_no_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_GASTO_SI_NO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'gasto_si_no_c',
      ),
      'ingreso_si_no_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INGRESO_SI_NO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ingreso_si_no_c',
      ),
      'grupo_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_GRUPO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'grupo_c',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'label' => 'LBL_NAME',
        'default' => true,
        'width' => '10%',
      ),
      'accounts_fact_facturas_name' => 
      array (
        'type' => 'relate',
        'link' => 'accounts_fact_facturas',
        'label' => 'LBL_ACCOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'accounts_fact_facturas_name',
      ),
      'clasificacion_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CLASIFICACION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'clasificacion_c',
      ),
      'date_closed' => 
      array (
        'type' => 'date',
        'label' => 'LBL_FECHA_EMISION',
        'width' => '10%',
        'default' => true,
        'name' => 'date_closed',
      ),
      'fecha_contable_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_FECHA_CONTABLE',
        'width' => '10%',
        'name' => 'fecha_contable_c',
      ),
      'amount' => 
      array (
        'name' => 'amount',
        'label' => 'LBL_AMOUNT',
        'default' => true,
        'currency_format' => true,
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
        'default' => true,
        'width' => '10%',
      ),
      'fecha_emision' => 
      array (
        'width' => '10%',
        'label' => 'LBL_FECHA_EMISION',
        'default' => true,
        'name' => 'fecha_emision',
      ),
      'estado' => 
      array (
        'width' => '10%',
        'label' => 'LBL_ESTADO',
        'default' => true,
        'name' => 'estado',
      ),
      'fact_facturas_type' => 
      array (
        'width' => '10%',
        'label' => 'LBL_TYPE',
        'default' => true,
        'name' => 'fact_facturas_type',
      ),
      'numero' => 
      array (
        'type' => 'int',
        'label' => 'LBL_NUMERO',
        'width' => '10%',
        'default' => true,
        'name' => 'numero',
      ),
      'year' => 
      array (
        'name' => 'year',
        'label' => 'LBL_YEAR',
        'default' => true,
        'width' => '10%',
      ),
      'ingreso_si_no_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INGRESO_SI_NO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ingreso_si_no_c',
      ),
      'gasto_si_no_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_GASTO_SI_NO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'gasto_si_no_c',
      ),
      'grupo_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_GRUPO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'grupo_c',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '4',
    'widths' => 
    array (
      'label' => '5',
      'field' => '20',
    ),
  ),
);
?>
