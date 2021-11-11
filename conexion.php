<?php
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

        $sql= "select nickname from usuario where nickname=? and password=?;";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($usuario,$password));

        /*while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['nickname'] = $resultado['nickname'];
         }*/

        //echo $resultado['nickname'];
        
        return $resultado;
    }

    public function IngresarPartida($fecha,$user1, $user2){
        $sql = "Insert into partida values(0,?,?,?);";

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($fecha,$user1,$user2));

        return $resultado;

    }

    public function IngresarConfirmacion($id){
        $sql = "Insert into confirmacion values(0,?);";

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($id));

        return $resultado;

    }
    public function SelectPartida($fecha, $user1, $user2){
        $sql = "select id from partida where fecha=? and User1=? and User2=?;";

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($fecha,$user1,$user2));

        return $resultado;
    }

    public function SelectPartidaUsers($id){
        $sql = "select id, User1, User2 from partida where id=?;";

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($id));

        return $resultado;


    }

    public function SelectConfirmacion($id2){
        $sql = "select id from confirmacion where id_partida=?;";

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($id2));

        $resultado->closeCursor();
        
        return $resultado;
    }

    public function IngresarFicha($ficha, $posicion){

        $sql= "Insert into movimientos values(0,?,?,3);";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($ficha,$posicion));

        //echo $resultado['nickname'];
        
        $resultado->closeCursor();

        return $resultado;
        

    }

    public function IngresarPosicion(){

        $sql= "Insert into posicion values(0,?,?,3);";
        
        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($usuario,$password));

        //echo $resultado['nickname'];
        
        $resultado->closeCursor();

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


}



?>