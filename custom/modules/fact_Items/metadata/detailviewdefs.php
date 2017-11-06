<?php
$module_name = 'fact_Items';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'precio_ud',
            'label' => 'LBL_PRECIO_UD',
          ),
          1 => 
          array (
            'name' => 'tipo_repercutido',
            'label' => 'LBL_TIPO_IMPUESTO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cantidad',
            'label' => 'LBL_CANTIDAD',
          ),
          1 => 
          array (
            'name' => 'impuesto',
            'label' => 'LBL_REPERCUTIDO',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'descuento',
            'label' => 'LBL_DESCUENTO',
          ),
          1 => 
          array (
            'name' => 'retencion',
            'label' => 'LBL_RETENCION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'clase2_c',
            'studio' => 'visible',
            'label' => 'LBL_CLASE2',
          ),
        ),
      ),
    ),
  ),
);
?>
