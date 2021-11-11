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
        
            $sql= "select nickname from usuario where nickname= ? and password= ?";
        
            $resultado = $this->conect->prepare($sql);

            $resultado->execute(array($_SESSION['usuario'], $_SESSION['contraseña']));

            //echo $resultado['nickname'];
            
            $resultado->closeCursor();
            
        } catch (Exeption $e){
            $this->conect = "Error de conexion";
            echo "ERROR: ". $e->getMessage();
        }
    }

    public function SelectUsuario($usuario, $contraseña){
        $sql = "select nickname from usuario where nickname =? and password =?;"

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($usuario, $contraseña));

        //$registro=$resultado->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function IngresarUsuario($usuario, $contraseña){
        $sql = "insert into usuario values(0,?,?);"

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($usuario, $contraseña));

        return $resultado;
    }

    public function IngresarMovimiento($idFicha, $objetivoFicha, $idPartida){
        $sql = "insert into Movimiento values(?,?,?);"

        $resultado = $this->conect->prepare($sql);

        $resultado->execute(array($idFicha, $objetivoFicha, $idPartida));
        
    }

    public function UpdatePosicion($idFicha, $objetivoFicha, $idPartida){
        
    }

}
?>