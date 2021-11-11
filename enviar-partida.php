<?php
session_start();
require_once('conexion.php');
$jugador = $_GET['player'];

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

$hora = date('Y-m-d H:i:s', time());


$conect =  new Conexion();

$partida = $conect->IngresarPartida($hora, $_SESSION['id'], $jugador);

$selcpartida = $conect->SelectPartida($hora, $_SESSION['id'], $jugador);

while($resultado=$selcpartida->fetch(PDO::FETCH_ASSOC)){
    $_SESSION['idpartida'] = $resultado['id'];
}


header('Location:  http://localhost/dashboard/damas/partida.php');




?>