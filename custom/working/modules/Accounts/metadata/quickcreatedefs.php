<?php
// created: 2015-10-27 11:19:40
$viewdefs['Accounts']['QuickCreate'] = array (
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
    'tabDefs' => 
    array (
      'DEFAULT' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
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
          'displayParams' => 
          array (
            'required' => true,
          ),
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'cif_c',
          'label' => 'LBL_CIF',
        ),
        1 => 
        array (
          'name' => 'account_type',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'email1',
        ),
        1 => 
        array (
          'name' => 'phone_fax',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'alumno_c',
          'label' => 'LBL_ALUMNO',
        ),
        1 => 
        array (
          'name' => 'phone_office',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'assigned_user_name',
        ),
      ),
    ),
  ),
);