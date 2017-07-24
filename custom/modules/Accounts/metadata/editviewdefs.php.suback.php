<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
          1 => 
          array (
            'name' => 'account_type',
            'comment' => 'The Company is of this type',
            'label' => 'LBL_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'cif_c',
            'label' => 'LBL_CIF',
          ),
          1 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'curso_c',
            'label' => 'LBL_CURSO',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'colegio_c',
            'label' => 'LBL_COLEGIO',
          ),
          1 => 
          array (
            'name' => 'asignaturas_c',
            'studio' => 'visible',
            'label' => 'LBL_ASIGNATURAS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'alumno_c',
            'label' => 'LBL_ALUMNO',
          ),
          1 => 
          array (
            'name' => 'grupo_c',
            'studio' => 'visible',
            'label' => 'LBL_GRUPO',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'accounts_accounts_1_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'recibosino_c',
            'studio' => 'visible',
            'label' => 'LBL_RECIBOSINO',
          ),
          1 => 
          array (
            'name' => 'descripcion_recibo_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPCION_RECIBO',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'cantidad_recibo_c',
            'label' => 'LBL_CANTIDAD_RECIBO',
          ),
          1 => '',
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
      ),
    ),
  ),
);
?>
