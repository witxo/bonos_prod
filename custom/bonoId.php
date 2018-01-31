<?php

require_once('funciones.php');
require_once('dbconfig.php');

$bonoid = getBonoId($_GET['bono_c']);

echo $bonoid;

?>