<?php

// Iniciamos la sesión
session_start();

// Conectamos a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'computienda_web');

// Primero, vemos que se haya ingresado algo en primer lugar.
// Si no se ingresó nada, lo enviaremos de vuelta al home o al formulario de registro.
if (empty($_POST["email"]) || empty($_POST["contrasena"])) {
    header("Location:../index.php");
    die();
}

// Creamos variables y les damos los valores que recibimos en el POST.
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
$contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT);
$contrasenaConfirmacion = $_POST["contrasenaConfirmacion"];

// Explode separará todo lo que hay antes y después del @. 
// Necesitamos la dirección y verificar que tenga un @ para ver que es un correo "real".
$emailLimpio = explode("@", $email)[0];



// Verificar si el correo electrónico ya existe en la base de datos
$consultaEmailExistente = "SELECT COUNT(*) as count FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conexion, $consultaEmailExistente);
$datos = mysqli_fetch_assoc($resultado);
if ($datos['count'] > 0) {
    // El correo electrónico ya está registrado, redirigir a la página de error o mostrar un mensaje de error.
    header("Location:../index.php?error=Usuario_existe");
    die();
}


// Se verifica si las contraseñas coinciden
if (strcmp($contrasena, $contrasenaConfirmacion) !== 0) {
    header("Location:../index.php");
    die();
}

// Verificar si las contraseñas coinciden
if (!password_verify($contrasenaConfirmacion, $contrasena_hasheada)) {
    header("Location:../index.php");
    die();
}



// Agrego el usuario del cliente a la BD

$insertCliente = "INSERT INTO usuario (nombre, apellido, email, contrasena, tipo_usuario) VALUES ('$nombre','$apellido', 
'$email', '$contrasena_hasheada',2)";


if(mysqli_connect('localhost','root','','computienda_web')){
	
	$con = mysqli_connect('localhost','root','','computienda_web');

    mysqli_query($con,$insertCliente);
		
}
// Redireccionar al inicio de sesión o mostrar un mensaje de éxito
header("Location:../index.php");
die();

?>