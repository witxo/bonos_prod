<?php
$viewdefs ['Meetings'] = 
array (
  'QuickCreate' => 
 array (
    'templateMeta' =>
    array (
            'includes' => array (
                array (
                    'file' => 'custom/underscore-min.js',
                ),
                array (
                    'file' => 'custom/modules/Meetings/customValidation.js',
                ),
            ),
      'maxColumns' => '2',
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="isSaveAndNew" value="false">',
          1 => '<input type="hidden" name="is_ajax_call" value="1">',
        ),
        'buttons' => 
        array (
          0 => 
          array (
            'customCode' => '<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" onclick="SUGAR.meetings.fill_invitees();this.form.action.value=\'Save\'; this.form.return_action.value=\'DetailView\'; {if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}this.form.return_id.value=\'\'; {/if}return check_form(\'EditView\');" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">',
          ),
          1 => 'CANCEL',
          2 => 
          array (
            'customCode' => '<input title="{$MOD.LBL_SEND_BUTTON_TITLE}" class="button" onclick="this.form.send_invites.value=\'1\';SUGAR.meetings.fill_invitees();this.form.action.value=\'Save\';this.form.return_action.value=\'EditView\';this.form.return_module.value=\'{$smarty.request.return_module}\';return check_form(\'EditView\');" type="submit" name="button" value="{$MOD.LBL_SEND_BUTTON_LABEL}">',
          ),
          3 => 
          array (
            'customCode' => '{if $fields.status.value != "Held"}<input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}" accessKey="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_KEY}" class="button" onclick="SUGAR.meetings.fill_invitees(); this.form.status.value=\'Held\'; this.form.action.value=\'Save\'; this.form.return_module.value=\'Meetings\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.return_id.value=\'{$fields.id.value}\'; return check_form(\'EditView\');" type="submit" name="button" value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_LABEL}">{/if}',
          ),
        ),
      ),
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
      'javascript' => '<script type="text/javascript">{$JSON_CONFIG_JAVASCRIPT}</script>
{sugar_getscript file="cache/include/javascript/sugar_grp_jsolait.js"}
<script>toggle_portal_flag();function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>',
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_QUICKCREATE_PANEL1' => 
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
            'type' => 'readonly',
             
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
            'name' => 'date_start',
            'type' => 'readonly',
                 ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_end',
          'type' => 'readonly',
          ),
                  ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'bono_c',
            'studio' => 'visible',
            'label' => 'LBL_BONO',
           ),
          1 => 
          array (
            'name' => 'bono_validado_c',
            'label' => 'LBL_BONO_VALIDADO',
            'customCode' => '<input type="hidden" name="bono_validado_c" id="bono_validado_c" value="{$fields.bono_validado_c.value}"><input type="checkbox" id="bono_validado_c" name="bono_validado_c" value="{$fields.bono_validado_c.value} {if $fields.bono_validado_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
           'type' => 'readonly',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
            'customCode' => '<input type="text" title="" value="{$fields.description.value}" id="description" name="description" {$readOnly}>',
          ),
        ),
      ),
      'lbl_quickcreate_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'alumno1_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO1',
            'customCode' => '<input type="hidden" name="account_id_c" id="account_id_c"  value="{$fields.account_id_c.value}"><input type="text" title="" value="{$fields.alumno1_c.value}" id="alumno1_c" name="alumno1_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia1_c',
            'label' => 'LBL_ASISTENCIA1',
            //'customCode' => '<input type="hidden" name="asistencia1_c" value="{$fields.asistencia1_c.value}"><input type="checkbox" id="asistencia1_c" name="asistencia1_c" value="1" {if $fields.asistencia1_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'alumno2_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO2',
            'customCode' => '<input type="text" title="" value="{$fields.alumno2_c.value}" id="alumno2_c" name="alumno2_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia2_c',
            'label' => 'LBL_ASISTENCIA2',
            //'customCode' => '<input type="hidden" name="asistencia2_c" value="{$fields.asistencia2_c.value}"><input type="checkbox" id="asistencia2_c" name="asistencia2_c" value="1" {if $fields.asistencia2_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'alumno3_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO3',
            'customCode' => '<input type="text" title="" value="{$fields.alumno3_c.value}" id="alumno3_c" name="alumno3_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia3_c',
            'label' => 'LBL_ASISTENCIA3',
            //'customCode' => '<input type="hidden" name="asistencia3_c" value="{$fields.asistencia3_c.value}"><input type="checkbox" id="asistencia3_c" name="asistencia3_c" value="1" {if $fields.asistencia3_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'alumno4_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO4',
            'customCode' => '<input type="text" title="" value="{$fields.alumno4_c.value}" id="alumno4_c" name="alumno4_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia4_c',
            'label' => 'LBL_ASISTENCIA4',
            //'customCode' => '<input type="hidden" name="asistencia4_c" value="{$fields.asistencia4_c.value}"><input type="checkbox" id="asistencia4_c" name="asistencia4_c" value="1" {if $fields.asistencia4_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'alumno5_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO5',
            'customCode' => '<input type="text" title="" value="{$fields.alumno5_c.value}" id="alumno5_c" name="alumno5_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia5_c',
            'label' => 'LBL_ASISTENCIA5',
            //'customCode' => '<input type="hidden" name="asistencia5_c" value="{$fields.asistencia5_c.value}"><input type="checkbox" id="asistencia5_c" name="asistencia5_c" value="1" {if $fields.asistencia5_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'alumno6_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO6',
            'customCode' => '<input type="text" title="" value="{$fields.alumno6_c.value}" id="alumno6_c" name="alumno6_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia6_c',
            'label' => 'LBL_ASISTENCIA6',
            //'customCode' => '<input type="hidden" name="asistencia6_c" value="{$fields.asistencia6_c.value}"><input type="checkbox" id="asistencia6_c" name="asistencia6_c" value="1" {if $fields.asistencia6_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'alumno7_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO7',
            'customCode' => '<input type="text" title="" value="{$fields.alumno7_c.value}" id="alumno7_c" name="alumno7_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia7_c',
            'label' => 'LBL_ASISTENCIA7',
            //'customCode' => '<input type="hidden" name="asistencia7_c" value="{$fields.asistencia7_c.value}"><input type="checkbox" id="asistencia7_c" name="asistencia7_c" value="1" {if $fields.asistencia7_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'alumno8_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO8',
            'customCode' => '<input type="text" title="" value="{$fields.alumno8_c.value}" id="alumno8_c" name="alumno8_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia8_c',
            'label' => 'LBL_ASISTENCIA8',
            //'customCode' => '<input type="hidden" name="asistencia8_c" value="{$fields.asistencia8_c.value}"><input type="checkbox" id="asistencia8_c" name="asistencia8_c" value="1" {if $fields.asistencia8_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'alumno9_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO9',
            'customCode' => '<input type="text" title="" value="{$fields.alumno9_c.value}" id="alumno9_c" name="alumno9_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia9_c',
            'label' => 'LBL_ASISTENCIA9',
           //'customCode' => '<input type="hidden" name="asistencia9_c" value="{$fields.asistencia9_c.value}"><input type="checkbox" id="asistencia9_c" name="asistencia9_c" value="1" {if $fields.asistencia9_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'alumno10_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO10',
            'customCode' => '<input type="text" title="" value="{$fields.alumno10_c.value}" id="alumno10_c" name="alumno10_c" {$readOnly}>',
          ),
          1 => 
          array (
            'name' => 'asistencia10_c',
            'label' => 'LBL_ASISTENCIA10',
            //'customCode' => '<input type="hidden" name="asistencia10_c" value="{$fields.asistencia10_c.value}"><input type="checkbox" id="asistencia10_c" name="asistencia10_c" value="1" {if $fields.asistencia10_c.value == "1"} checked {/if} {$disabled}>',
          ),
        ),
      ),
    ),
  ),
);
?>
