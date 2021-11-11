<?php

$_SESSION['nickname']=$_POST['nickname']; // variable de entorno que se ve en todas las paginas y no cambia el valor
$_SESSION['contraseña']=$_POST['contraseña'];

class Conexion{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "damas";
    private $conect;

    public function __construct(){
        $connectionString =  "mysql:hos=".$this->host.";dbname=".$this->db.";charset-utf8";
        try{
            $this->conect = new PDO($connectionString, $this->user, $this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql= "select nickname from usuario where nickname= ? and password= ?";
        
            $resultado = $this->conect->prepare($sql);

            $resultado->execute(array($_SESSION['nickname'], $_SESSION['contraseña']));
        
            while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                $_SESSION['nickname'] = $registro['nickname'];
            }

            if (!isset($_SESSION['nickname'])){
                
                echo "el usuario no existe";
                header('Location: http://localhost/dashboard/damas/login.php');
            }else{
                echo "El usuario se llamaa: ".$_SESSION['nickname'];
            }
            
            $resultado->closeCursor();
            
        } catch (Exeption $e){
            $this->conect = "Error de conexion";
            echo "ERROR: ". $e->getMessage();
        }
    }
}

    $conect = new Conexion();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/normalize.css">
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
            </nav>
            <nav class="user">
                <div class="logo_user"><img src="assets/logo_rey_rojo2.png" alt=""></div>
                <p><?php print($_SESSION['nickname']); ?></p>
            </nav>

        </div>
            <div class="tablero">
                <div class="a" id="1" ><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div id="2"></div>
                <div class="a"id="3"  ><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"> </div>
                <div id="4"></div>
                <div class="a"id="5" ><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div id="6"></div>
                <div class="a"id="7"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div id="8"></div>
                <div id="9" ></div>
                <div class="a"id="10"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"> </div>
                <div id="11"></div>
                <div class="a"id="12"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div id="13"></div>
                <div class="a"id="14"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div id= "15"></div>
                <div class="a"id="16"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div class="a"id="17"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div id="18"></div>
                <div class="a"id="19"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div id="20"></div>
                <div class="a"id="21"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="dragtarget"></div>
                <div id="22"></div>
                <div class="a"id="23"><img src="assets/damas_ficha_blanca.png" alt="" draggable="true" id="draggaable" ondragstart="event.dataTransfer.setData('text/plain',null)"></div>
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

</body>
</html>