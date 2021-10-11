session_start();
$_SESSION['usuario']=$_POST['username']; // variable de entorno que se ve en todas las paginas y no cambia el valor
$_SESSION['contraseña']=$_POST['password'];
$_SESSION['nickname'] = "";
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

}