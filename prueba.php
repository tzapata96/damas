<?php
session_start();
$_SESSION['usuario']=$_POST['username']; // variable de entorno que se ve en todas las paginas y no cambia el valor
$_SESSION['contraseña']=$_POST['password'];
/*$_SESSION['nickname'] = "";
$conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion");

mysqli_select_db($conexion,"damas") or die("Problemas en la seleccion de la base de datos");

//echo "select id from usuario where Usuario='".$_SESSION['usuario']."' and Contraseña='".$_SESSION['contraseña']."'";

$registros=mysqli_query($conexion,"select nickname from usuario where nickname='".$_SESSION['usuario']."' and password='".$_SESSION['contraseña']."'") or die("Problemas en el select:".mysqli_error($conexion)); //devuelve tabla

$r=mysqli_fetch_array($registros);
print($r['nickname']);
if (!isset($r)){
	echo "el usuario no existe";
    header('Location: http://localhost/dashboard/damas/login.php');
    echo "<script>alert('El usuario no existe')</script>";
}else{
     // convierte en array
	print "el usuario se llama  ". $r['nickname'];

}*/
class conexion2{
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
        }catch(Exeption){
            $this->conect = "Error de conexion";
            echo "Error: ".$e->getMessage();
        }
    }
    
    public function IngresarDatos(){
        
    }
    
    
    public function SelectDatos($sql){

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($_SESSION['usuario'], $_SESSION['contraseña']));

        $registro=$resultado->fetch(PDO::FETCH_ASSOC);

        return $registro;

    }

    public function VerificarMovimiento($img, $idFicha, $color , $target1, $target2, $targetEat1, $targetEat2){
        /*if (color == "a"){
            target1Id = parseFloat(fichaId) - parseFloat(7);
            target2Id = parseFloat(fichaId) - parseFloat(9);
            targetEat1 = parseFloat(target1Id) - parseFloat(7);
            targetEat2 = parseFloat(target2Id) - parseFloat(9);
            console.log("entrar");
          }else{
            target1Id = parseFloat(fichaId) + parseFloat(7);
            target2Id = parseFloat(fichaId) + parseFloat(9);
            targetEat1 = parseFloat(target1Id) + parseFloat(7);
            targetEat2 = parseFloat(target2Id) + parseFloat(9);
            console.log(targetEat1, targetEat2, 'AAAAAB');
          }*/
       
        if($color = 'a'){
            $target1A = $idFicha - 7;
            $target2A = $idFicha - 9;
            $targetEat1A = $target1A - 7;
            $targetEat2A = $target2A - 9;
        }else{
            $target1A = $idFicha + 7;
            $target2A = $idFicha + 9;
            $targetEat1A = $target1A + 7;
            $targetEat2A = $target2A + 9;
        }

            if($targetEat1 == 0 && $targetEat2 == 0 ){
                if($target1 == $target1A && $target2 == $target2A){
                    return true;
                }else{
                    return false;
                }
            }else if($targetEat1 != 0 && $targetEat2 == 0){
                if($targetEat1 == $targetEat1A){
                    return true;
                }else{
                    return false;
                }
            }else if($targetEat1 == 0 && $targetEat2 != 0){
                if($targetEat2 == $targetEat2A){
                    return true;
                }else{
                    return false;
                }
            }
        

    }
}



class conexion{
    private $conexion2;

    public function __construct(){
        $conexion2=mysqli_connect("localhost","root","") or die("Problemas en la conexion");
        mysqli_select_db($conexion2,"damas") or die("Problemas en la seleccion de la base de datos");
    }

    public function IngresarDatos($conexion2)
        $conexion2 = new conexion();
        $registros=mysqli_query($conexion2,"select nickname from usuario where nickname='".$_SESSION['usuario']."' and password='".$_SESSION['contraseña']."'") or die("Problemas en la seleccion");
        return $registros;
}

IngresarDatos()
?>