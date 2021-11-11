<?php
session_start();
require_once('conexion.php');

$conect = new Conexion();

$partida = $conect->SelectPartidaUsers($_SESSION['idpartida']);

while($resultado = $partida->fetch(PDO::FETCH_ASSOC)){
    $user1 =  $resultado['User1'];
    $user2 = $resultado['User2'];
}

echo($_SESSION['idpartida']);

$confirmacion = $conect->SelectConfirmacion($_SESSION['idpartida']);


$id = '';
while($result = $confirmacion->fetch(PDO::FETCH_ASSOC)){
    $id = $result['id'];
}

if(!isset($id)){
    $empezar = 0;
    print('ee');
}else{
    $empezar = 1;
    print('hola');
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="css/game.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylep.css">
    <link rel="stylesheet" href="css/tablero.css">
   
    <script src="js/tablero.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>DAMAS</title>
</head>
<body>
    <header class="hero">
        <div class="container">
            <nav class="nav">
                <a href="#" class="nav__items nav__items--1">My account</a>
                <a href="#" class="nav__items">Marketplace</a>
                <a href="salir.php" class="nav__items nav__items--1">salir</a>

            </nav>

        </div>

        <div class="partida">
            <nav class="user">
            <?php
             print($user1);       ?>
            </nav>
    
            <nav class="user2">
            <?php
             print($user2);       ?>
            </nav>
            <nav class="turno">
                
            </nav>
        </div>
        <div class="contendor">
            <div class="moneda" id="moneda">
                <div class="lados frente" id="frente"></div>
                <div class="lados atras" id="atras"></div>
            </div>
        </div>
        
            <div class="tablero"> 
                <div class="a" id="1" ><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div id="2"></div>
                <div class="a"id="3"  ><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"> </div>
                <div id="4"></div>
                <div class="a"id="5" ><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div id="6"></div>
                <div class="a"id="7"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div id="8"></div>
                <div id="9" ></div>
                <div class="a"id="10"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"> </div>
                <div id="11"></div>
                <div class="a"id="12"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div id="13"></div>
                <div class="a"id="14"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div id= "15"></div>
                <div class="a"id="16"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div class="a"id="17"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div id="18"></div>
                <div class="a"id="19"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div id="20"></div>
                <div class="a"id="21"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="dragtarget"></div>
                <div id="22"></div>
                <div class="a"id="23"><img src="assets/damas_ficha_blanca.png" alt="b" draggable="true" id="draggaable" ondragstart="event.dataTransfer.setData('text/plain',null)"></div>
                <div id= "24"></div>
                <div id="25"></div>
                <div class="a" id="26"></div>
                <div id="27"></div>
                <div class="a" id="28"></div>
                <div id="29"></div>
                <div class="a" id="30"></div>
                <div id="31"></div>
                <div class="a" id="32"></div>
                <div class="a" id="33"></div>
                <div id="34"></div>
                <div class="a" id="35"></div>
                <div id="36"></div>
                <div class="a" id="37"></div>
                <div id="38"></div>
                <div class="a" id="39"></div>
                <div id="40"></div>
                <div id="41"></div>
                <div class="a" id="42"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="43"></div>
                <div class="a" id="44"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="45"></div>
                <div class="a" id="46"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="47"></div>
                <div class="a" id="48"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div class="a" id="49"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="50"></div>
                <div class="a" id="51"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="52"></div>
                <div class="a" id="53"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="54"></div>
                <div class="a" id="55"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="56"></div>
                <div id="57" ></div>
                <div class="a" id="58"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="59"></div>
                <div class="a" id="60"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="61"></div>
                <div class="a" id="62"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
                <div id="63"></div>
                <div class="a" id="64"><img src="assets/dama_ficha_negra.png" alt="a" draggable="true" id="dragtarget"></div>
            </div>

  


        </header>

<script>
      let tiempo = 60;
        let contador = 0;

        let contando = 0;
        
       $(document).ready(function(){
        if(1 == 0){

        }else{    
         temporizar();
         alert('hola');
        }

       });

       
        
        function temporizar(){
            let t = tiempo-contador;
            let contando = t > 0;
            if(contador%2==0){
                select_id('frente').innerHTML = t;
            }else{
                select_id('atras').innerHTML = t;
            }
            select_id("moneda").style.transform = `rotateY(${180*contador}deg)`
            if (contando){
                contador++;
                setTimeout(() => {
                    temporizar();
                },1000);
            }else{
                suspender();
            }
        
        }

        function suspender(){
            contador = 0;   
            select_id('frente').innerHTML = '0';
            select_id('atras').innerHTML = '0';
            temporizar()
        }

        function select_id(id){
            return document.getElementById(id);
        }
        
</script>

</body>
</html>