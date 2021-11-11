<?php
require_once('conexion.php');
session_start();

$conect = new Conexion();
$con= 0;

$conexion = $conect->IngresarConexion($con,$_SESSION['id']);

header("Location: http://localhost/dashboard/damas/loginA.php");
//print($target);
?>