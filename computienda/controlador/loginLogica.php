<?php
// Iniciamos la sesión
session_start();

// Verificamos que los campos no estén vacíos
if (empty($_POST["nombre"]) || empty($_POST["contrasena"])) {
    header("Location: ../controlador/camposObligatorios.php");
    die();
}

// Obtenemos los valores de los campos "nombre" y "contrasena"
$nombre = $_POST["nombre"];
$contrasena = $_POST["contrasena"];


// Consulta SQL para verificar si el usuario existe y la contraseña coincide
$loginCliente = "SELECT * FROM `cliente` WHERE nombreusuario = '$nombre';";
// Conectamos a la base de datos
$con = mysqli_connect('localhost', 'root', '', 'computienda_web');

if (!$con) {
    die("Error al conectar a la base de datos");
}

// Ejecutamos la consulta para obtener el hash de la contraseña
$resultado = mysqli_query($con, $loginCliente);

// Verificamos si se obtuvo un resultado
if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $hash = $fila['contrasena']; // Obtener el valor hash de la contraseña desde la consulta
    


    // Verificamos que la contraseña coincida
    if (password_verify($contrasena, $hash)) {
        // Redireccionamos a la página correspondiente 
        header("Location: ../index.php");
        die();
    }
}



// El usuario o la contraseña no son válidos
header("Location: ../controlador/usuarioNoExiste.php");
die();
?>
