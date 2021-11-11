<?php
require_once('conexion.php');

$fichaId = $_POST['idficha'];
$target = $_POST['target'];
echo($fichaId);
echo($target);

$conect = new Conexion();

$ingresar = $conect->IngresarFicha($fichaId, $target);

//print($target);
?>