<?php
 if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

?>
<html>

<head>
  <title>Ivema - Informe de clases</title>
  <style type="text/css">
  body {
	background-color: #FFF;
	background-image: url(images/logo.png);
	background-repeat: no-repeat;
	margin: 0px;
    }

  #MenuAplicacion { margin-left: 10px;
    margin-top: 70px;
    }


  .derecha {
	text-align: right;
}
  .Login_menu {
	line-height: inherit;
	color: #000;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #000;
	border-right-color: #000;
	border-bottom-color: #000;
	border-left-color: #000;
	border: 1;
}
  body,td,th {
	font-family: Verdana;
	font-size: 14px;
}
.Login_data {
	font-family: Verdana;
	font-size: 12px;
}
  #Aplicacion {
	font-family: Verdana;
	position: absolute;
	margin-left: 330px;
	margin-top: 25px;
	color: #999;
	left: 13px;
	top: 3px;
}
  </style>


<?php	
	include_once("dbconfig.php");
	include_once("funciones.php");
?>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
  		<link rel="stylesheet" type="text/css" href="custom/css/default.css" />
		<link rel="stylesheet" type="text/css" href="custom/css/jquery-ui-1.7.2.css" />
  		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
 	<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy/mm/dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

$(document).ready(function(){
  $("#fechainicio").datepicker({ 
       showOn: 'button', 
       buttonText: "Seleccionar" });
 });

 $(document).ready(function(){
  $("#fechafin").datepicker({ 
       showOn: 'button', 
       buttonText: "Seleccionar" });
 });
 
    </script>
  
<body>


<div id="Aplicacion">
  <h1>Ivema - Informe de clases</h1></div>
<p>&nbsp;</p>
<center>
  <h1>&nbsp;</h1>
  <h1>&nbsp;</h1>
  <h2>Seleccione profesor</h2>
  <table width="200" border="1">
    <tr>
      <td><table width="200" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    
 <FORM action="custom/informes_profe_raw.php" method="get">
   <select name="id">    

	<?php selecProfesores(); ?>
   </select>
   

   <label> Seleccionar Fecha Inicio:</label>
<input type="text" name="fechainicio" id="fechainicio" readonly="readonly" size="12" />
<br><br>
   <label> Seleccionar Fecha Fin:</label>
<input type="text" name="fechafin" id="fechafin" readonly="readonly" size="12" />
<br><br>   

  <INPUT type="submit" value="Enviar">
</FORM>

      
    
    </td>
    <td>&nbsp;</td>
  </tr>

</table>
</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</center>
</body></html>
</body>
</html>











