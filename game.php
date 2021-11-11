<?php
session_start();
if(!isset($_SESSION['id'])){
$usuario1=$_POST['username']; // variable de entorno que se ve en todas las paginas y no cambia el valor
$contraseña1=$_POST['password'];
}
//$_SESSION['username'] = $usuario1;
//$_SESSION['password'] = $contraseña1;

//$fichaId = $_POST('IdFicha');
//$target = $_POST('Posicion');


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
                 
        } catch (Exeption $e){
            $this->conect = "Error de conexion";
            echo "ERROR: ". $e->getMessage();
        }
    }

    public function IngresarUsuario($usuario,$password){

        $sql= "Insert into usuario values(0,?,?,0,0);";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($usuario,$password));

        //echo $resultado['nickname'];
        
        $resultado->closeCursor();

        return $resultado;

    }

    public function SelectUsuario($usuario,$password){

        $sql= "select nickname, id from usuario where nickname=? and password=?;";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($usuario,$password));

        /*while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['nickname'] = $resultado['nickname'];
         }*/

        //echo $resultado['nickname'];
        
        return $resultado;
    }

    public function SelectUsuarioId($id){

        $sql= "select  id from usuario where id=?;";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($id));

        /*while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['nickname'] = $resultado['nickname'];
         }*/

        //echo $resultado['nickname'];
        
        return $resultado;

    }

    public function IngresarConexion($con,$id){
       
        $sql= "update usuario set conexion=? where id=?";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($con,$id));

        /*while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['nickname'] = $resultado['nickname'];
         }*/

        //echo $resultado['nickname'];
        
        return $resultado;

    }

    public function SelectRival(){
        
        $sql= "select id from usuario where conexion=1;";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute();

        /*while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['nickname'] = $resultado['nickname'];
         }*/

        //echo $resultado['nickname'];
        
        return $resultado;

    }

    public function SelectInvitacion($user1){
        ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

        $hora = date('Y-m-d H', time());

        $sql =  "select fecha, User2 from partida where user1 = ? and fecha LIKE '".$hora."%';";

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($user1));

        return $resultado;
        
    
    }

}

    $conect = new Conexion();

    if(!isset($_SESSION['id'])){
        header("Location: http://localhost/dashboard/damas/loginA.php");
    }else{

    $resultado=$conect->SelectUsuario($_SESSION['username'], $_SESSION['password']);

    while($regis=$resultado->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['nickname'] = $regis['nickname'];
        $idd = $regis['id'];
    }
    
    if(!isset($idd)){
        //header("Location: http://localhost/dashboard/damas/loginA.php");
    }else{
        $_SESSION['id'] = $idd;
    }
}

    ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

    $hora = date('Y-m-d H:i', time());


    $l = '<li><a href="enviar-partida.php?player=';
    $l1 =  '</a></li>';

    //$con= 1;

    //$conexion = $conect->IngresarConexion($con,$idd);

    $rival = $conect->SelectRival();
    $r =  array();
    $m = '';

    while($riv=$rival->fetch(PDO::FETCH_ASSOC)){
        $r[] = $riv['id'];
    }
   

    foreach($r as $value){
        //print($r[0]);
        //print($r[0]);
        $m = $m.$l.$value.'"'.'>'.' jugador '.$value.$l1;

    }

    $invitacion = $conect->SelectInvitacion($_SESSION['id']);


    $f = array();
    $u = array();


    while($registro2=$invitacion->fetch(PDO::FETCH_ASSOC)){
        $f[] = $registro2['fecha'];
        $u[] = $registro2['User2'];
    }

    //print($f[0].$u[0]);

   /* while($registro=$invitacion->fetch(PDO::FETCH_ASSOC)){
        $fecha = $registro['fecha'];
        $user = $registro['User2'];
    }

    print($fecha.' ');
    print($user);
    
    //echo $fecha;
    
    /*$datetime1 = date_create($hora);
    $datetime2 = date_create($hora);
    $contador = date_diff($datetime1, $datetime2);
    $differenceFormat = '%a';
    echo $contador->format($differenceFormat);
   */
   
    
   if(!isset($f[0])){

   }else{

   
   $fech1 = new datetime($hora);
    $fech2 = new datetime($f[0]);
    $interval = $fech1->diff($fech2);
    $minutes = $interval->i;



    foreach($f as $date){
        
    }

    //echo $minutes;

    if($minutes < 30){
        
        $l2 = '<li><a href="select-partida.php?player=';
        $l3 =  '</a></li>';
    

        //print($u[1]);

        $s = '';

        foreach($u as $user){
            //print($u[0]);
            $s = $s.$l2.$user.'"'.'>'.' jugador '.$user.$l3;
        }

        print($s);

 }else{

 }

}



    //date_diff()

    

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/game.css">

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
                <a href="salir.php" class="nav__items nav__items--1">salir</a>

            </nav>
            <nav class="user">
                <div class="logo_user"><img src="assets/logo_rey_rojo2.png" alt=""></div>
                <p><?php print($_SESSION['nickname']); ?></p>
            </nav>



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

            <nav class="nav_users">
            <ul class="users" role="menu">
                <li><a href="#">Conectados </a>
                    <ul>
                    <?php
                    print($m);
                    ?>
                    </ul>

                </li>
            </ul>

                <ul class="invitation" role="menu">
                <li><a href="#">Conectados </a>
                    <ul>
                    <?php
                    print($s);
                    ?>
                    </ul>
                </li>
            </ul>
            </nav>
  


        </header>



</body>
</html>