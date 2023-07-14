<?php
// Iniciamos la sesión
session_start();

// Verificamos que los campos no estén vacíos
if (empty($_POST["email"])) {
    header("Location: ../controlador/camposObligatorios.php");
    die();
}

// Obtenemos los valores de los campos "nombre" y "contrasena"
$nombreUsuario= $_POST["nombre"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];



// Conectamos a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'computienda_web');

// Consultar en la base de datos el hash de la contraseña para el usuario ingresado
$query = "SELECT * FROM cliente WHERE nombreusuario = '$nombreUsuario'";
$resultado = mysqli_query($conexion, $query);
$actualizacion ="UPDATE cliente 
                SET nombreusuario= '$nombreUsuario',
                    email= '$email' WHERE nombreusuario= '$nombreUsuario'";

if(mysqli_connect('localhost','root','','computienda_web')){
	
	$con = mysqli_connect('localhost','root','','computienda_web');

    mysqli_query($con,$actualizacion);
		
	}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
