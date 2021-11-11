<?php
session_start();
require_once('conexion.php');
$jugador = $_GET['player'];

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

$hora = date('Y-m-d H:i:s', time());


$conect =  new Conexion();

$selcpartida = $conect->SelectPartida($hora, $jugador, $_SESSION['id']);

while($resultadoa=$selcpartida->fetch(PDO::FETCH_ASSOC)){
    $_SESSION['idpartida'] = $resultadoa['id'];
}

$cofirmacion = $conect->IngresarConfirmacion($_SESSION['idpartida']);



header('Location:  http://localhost/dashboard/damas/partida.php');




?>