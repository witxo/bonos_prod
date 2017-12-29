<?php

require_once('funciones.php');
require_once('dbconfig.php');

$bonousado = getBonoUsado($_GET['bono_c']);

echo $bonousado;

?>