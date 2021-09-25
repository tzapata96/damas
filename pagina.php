<!doctype html>
<?php
$_SESSION['usuario']=$_REQUEST['usuario']; // variable de entorno que se ve en todas las paginas y no cambia el valor
$_SESSION['contraseña']=$_REQUEST['contraseña'];
$conexion=mysqli_connect("localhost","root","") or die("Problemas en la conexion");

mysqli_select_db($conexion,"login") or die("Problemas en la seleccion de la base de datos");

//echo "select id from usuario where Usuario='".$_SESSION['usuario']."' and Contraseña='".$_SESSION['contraseña']."'";

$registros=mysqli_query($conexion,"select id , Usuario from usuario where Usuario='".$_SESSION['usuario']."' and Contrasena='".$_SESSION['contraseña']."'") or die("Problemas en el select:".mysqli_error($conexion)); //devuelve tabla

if (!isset($registros)){
	echo "el usuario no existe";
}else{
	$r=mysqli_fetch_array($registros); // convierte en array
	print "el usuario se llama ". $r['Usuario'] . " y su id es ". $r['id'];
}
?>
<html lang = "es">
	<head>
		<meta charset="utf-8">
		<title>Mi login</title>
	</head>
	<body>
		<form action ="pagina.php" method="post">
			<label>Usuario</label>
			<br>
			<input type="text" name="usuario">
			<br>
			<br>
			<label>Contraseña</label>
			<br>
			<input type="text" name="contraseña">
			<br>
			<br>
			<input type="submit" name="ingresar" value="Ingresar">
		</form>
	</body>