<?php
$_SESSION['usuario']=$_POST['username']; // variable de entorno que se ve en todas las paginas y no cambia el valor
$_SESSION['contraseña']=$_POST['password'];

class conexion{
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

        $sql= "select nickname from usuario where nickname=? and password=?;";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($usuario,$password));

        //echo $resultado['nickname'];
        
        return $resultado;
    }

}
   
    $obje = new conexion();
    
    //$obj = conexion::IngresarUsuario($_SESSION['nickname'], $_SESSION['password']);

    //cho $obj;

    $obje->IngresarUsuario($_SESSION['usuario'], $_SESSION['contraseña']);

    $resultado = $obje->SelectUsuario($_SESSION['usuario'],$_SESSION['contraseña']);

    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['nickname'] = $registro['nickname'] ;
    }

    if($_SESSION['nickname'] = $_SESSION['usuario']){
        header('Location: http://localhost/dashboard/damas/loginA.php');
    }else{
        header('Location: http://localhost/dashboard/damas/register2.php');
    }

    

?>