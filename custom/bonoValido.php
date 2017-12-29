<?php

require_once('funciones.php');
require_once('dbconfig.php');

$bonoSioNO= getBonoAlumno($_GET['alumno_c'], $_GET['bono_c']);

echo $bonoSioNO;

?>