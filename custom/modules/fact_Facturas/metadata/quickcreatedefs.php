<?php
// created: 2015-10-27 11:19:45
$viewdefs['fact_Facturas']['QuickCreate'] = array (
  'templateMeta' => 
  array (
    'maxColumns' => '2',
    'widths' => 
    array (
      0 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
      1 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
    ),
    'javascript' => '{$PROBABILITY_SCRIPT}',
    'includes' => 
    array (
      0 => 
      array (
        'file' => 'include/javascript/tiny_mce/tiny_mce.js',
      ),
    ),
    'useTabs' => false,
    'tabDefs' => 
    array (
      'LBL_SALE_INFORMATION' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
  ),
  'panels' => 
  array (
    'lbl_sale_information' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'label' => 'LBL_NAME',
        ),
        1 => 
        array (
          'name' => 'date_closed',
          'label' => 'LBL_FECHA_EMISION',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'numero',
          'type' => 'NumFactura',
          'label' => 'LBL_NUMERO',
        ),
        1 => 
        array (
          'name' => 'nrecibo_c',
          'label' => 'LBL_NRECIBO',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'accounts_fact_facturas_name',
        ),
        1 => 
        array (
          'name' => 'tipo_repercutido',
          'label' => 'LBL_TIPO_IMPUESTO',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'fact_facturas_type',
          'label' => 'LBL_TYPE',
        ),
        1 => 
        array (
          'name' => 'repercutido',
          'label' => 'LBL_REPERCUTIDO',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'estado',
          'label' => 'LBL_ESTADO',
        ),
        1 => 
        array (
          'name' => 'retencion',
          'label' => 'LBL_RETENCION',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'ingreso_si_no_c',
          'studio' => 'visible',
          'label' => 'LBL_INGRESO_SI_NO',
        ),
        1 => 
        array (
          'name' => 'gasto_si_no_c',
          'studio' => 'visible',
          'label' => 'LBL_GASTO_SI_NO',
        ),
      ),
      6 => 
      array (
        0 => 
        array (
          'name' => 'description',
          'label' => 'LBL_DESCRIPTION',
          'type' => 'Htmledit',
          'displayParams' => 
          array (
            'cols' => 95,
            'rows' => 13,
          ),
        ),
      ),
      7 => 
      array (
        0 => 
        array (
          'name' => 'condiciones',
          'label' => 'LBL_CONDICIONES',
          'type' => 'Htmledit',
          'displayParams' => 
          array (
            'cols' => 95,
            'rows' => 10,
          ),
        ),
      ),
    ),
  ),
);