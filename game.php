<!DOCTYPE html>
<?php
$_SESSION['usuario']=$_REQUEST['username']; // variable de entorno que se ve en todas las paginas y no cambia el valor
$_SESSION['contraseña']=$_REQUEST['password'];
$conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion");

mysqli_select_db($conexion,"damas") or die("Problemas en la seleccion de la base de datos");

//echo "select id from usuario where Usuario='".$_SESSION['usuario']."' and Contraseña='".$_SESSION['contraseña']."'";

$registros=mysqli_query($conexion,"select id from usuario where nickname='".$_SESSION['usuario']."' and password='".$_SESSION['contraseña']."'") or die("Problemas en el select:".mysqli_error($conexion)); //devuelve tabla


if (!isset($registros)){
	echo "el usuario no existe";
}else{
	$r=mysqli_fetch_array($registros); // convierte en array
	print "el usuario se llama  ". $r['nickname'] . " y su id es  ". $r['id'];
}
?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta names="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-UA-Compatible" content="ie=edge">
        <title>DAMAS PRUEBA</title>
        <link rel="shourt icon" href="assets/damajust1.png" type="image/x-icon">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        <div class="container">
            <img class="avatar" src="assets/damajust1.png" alt="Logo damas">
            <h1>Login User</h1>

            <form action="game.php" method="post">
                <label for="username">Username</label>
                <input type="text" placeholder="Enter Username">
                
                <label for="password">Password</label>
                <input type="password" placeholder="Enter Password">
            
                <input type="submit" value="Log In">

            </form>
        </div>

    </body>