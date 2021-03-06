<?php
$viewdefs ['Meetings'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/underscore-min.js',
        ),
        1 => 
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
            'name' => 'nombre_c',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'status',
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'status',
              ),
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_start',
            'type' => 'datetimecombo',
            'readonly' => true,
            'displayParams' => 
            array (
              'required' => true,
              'updateCallback' => 'SugarWidgetScheduler.update_time();',
            ),
          ),
         1 => 
          array (
            'name' => 'precio_c',
            'label' => 'LBL_PRECIO',
          ),          
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_end',
            'type' => 'datetimecombo',
            'readonly' => true,
            'displayParams' => 
            array (
              'required' => true,
              'updateCallback' => 'SugarWidgetScheduler.update_time();',
            ),
          ),
          1 => 
          array (
            'name' => 'duration',
            'customCode' => '
                @@FIELD@@
                <input id="duration_hours" name="duration_hours" type="hidden" value="{$fields.duration_hours.value}">
                <input id="duration_minutes" name="duration_minutes" type="hidden" value="{$fields.duration_minutes.value}">
                {sugar_getscript file="modules/Meetings/duration_dependency.js"}
                <script type="text/javascript">
                    var date_time_format = "{$CALENDAR_FORMAT}";
                    {literal}
                    SUGAR.util.doWhen(function(){return typeof DurationDependency != "undefined" && typeof document.getElementById("duration") != "undefined"}, function(){
                        var duration_dependency = new DurationDependency("date_start","date_end","duration",date_time_format);
                        initEditView(YAHOO.util.Selector.query(\'select#duration\')[0].form);
                    });
                    {/literal}
                </script>            
            ',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'bono_c',
            'studio' => 'visible',
            'label' => 'LBL_BONO',
            'displayParams' => 
            array (
             'class' => 'sqsNoAutoFill'
            ),
            
          ),
          1 => 
          array (
 				 'name' => 'bono_validado_c',
        		 'label' => 'LBL_BONO_VALIDADO',    
         ),
        ),
        4 => 
        array (
          1 => 
          array (
            'name' => 'nodir_c',
            'label' => 'LBL_NODIR',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
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
          ),
          1 => 
          array (
            'name' => 'asistencia1_c',
            'label' => 'LBL_ASISTENCIA1',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'alumno2_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO2',
          ),
          1 => 
          array (
            'name' => 'asistencia2_c',
            'label' => 'LBL_ASISTENCIA2',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'alumno3_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO3',
          ),
          1 => 
          array (
            'name' => 'asistencia3_c',
            'label' => 'LBL_ASISTENCIA3',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'alumno4_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO4',
          ),
          1 => 
          array (
            'name' => 'asistencia4_c',
            'label' => 'LBL_ASISTENCIA4',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'alumno5_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO5',
          ),
          1 => 
          array (
            'name' => 'asistencia5_c',
            'label' => 'LBL_ASISTENCIA5',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'alumno6_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO6',
          ),
          1 => 
          array (
            'name' => 'asistencia6_c',
            'label' => 'LBL_ASISTENCIA6',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'alumno7_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO7',
          ),
          1 => 
          array (
            'name' => 'asistencia7_c',
            'label' => 'LBL_ASISTENCIA7',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'alumno8_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO8',
          ),
          1 => 
          array (
            'name' => 'asistencia8_c',
            'label' => 'LBL_ASISTENCIA8',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'alumno9_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO9',
          ),
          1 => 
          array (
            'name' => 'asistencia9_c',
            'label' => 'LBL_ASISTENCIA9',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'alumno10_c',
            'studio' => 'visible',
            'label' => 'LBL_ALUMNO10',
          ),
          1 => 
          array (
            'name' => 'asistencia10_c',
            'label' => 'LBL_ASISTENCIA10',
          ),
        ),
      ),
    ),
  ),
);
?>
