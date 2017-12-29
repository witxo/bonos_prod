<?php
 if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/entryPoint.php');
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
    
 <FORM action="index.php" method="get">
   <input type="hidden" name="entryPoint" value="Informe_Rentabilidad3">

      <select name ='mes' id='mes'>
    <option value='1'>Enero</option>
    <option value='2'>Febrero</option>
    <option value='3'>Marzo</option>
    <option value='4'>Abril</option>
    <option value='5'>Mayo</option>
    <option value='6'>Junio</option>
    <option value='7'>Julio</option>
    <option value='8'>Agosto</option>
    <option value='9'>Septiembre</option>
    <option value='10'>Octubre</option>
    <option value='11'>Noviembre</option>
    <option value='12'>Diciembre</option>
    </select> 
   
     <select name="anio" id="anio">
				<?php
					for($anio=(date("Y")+1); 2015<=$anio; $anio--) {
                      if ($anio == date("Y"))
                        echo "<option value='".$anio."' selected='selected'>".$anio."</option>";
                      else                   
				echo "<option value='".$anio."'>".$anio."</option>";
						}
				?>
			</select>  

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











