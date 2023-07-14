<?php
// Iniciamos la sesión
session_start();

// Verificamos que los campos no estén vacíos
if (empty($_POST["nombre"]) || empty($_POST["contrasena"])) {
    header("Location: ../controlador/camposObligatorios.php");
    die();
}

// Obtenemos los valores de los campos "nombre" y "contrasena"
$nombreUsuario= $_POST["nombre"];
$contrasena = $_POST["contrasena"];



// Conectamos a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'computienda_web');

// Consultar en la base de datos el hash de la contraseña para el usuario ingresado
$query = "SELECT contrasena FROM cliente WHERE nombreusuario = '$nombreUsuario'";
$resultado = mysqli_query($conexion, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $hashContraseña = $fila['contrasena'];

    // Verificar si la contraseña ingresada coincide con el hash almacenado en la base de datos
    if (password_verify($contrasena, $hashContraseña)) {
        // Las contraseñas coinciden, el usuario está autenticado correctamente
        // Puedes redirigir al usuario a la página de inicio o realizar las acciones necesarias
        echo "Inicio de sesión exitoso " . mysqli_num_rows($resultado);
    } else {
        // Las contraseñas no coinciden, el inicio de sesión es inválido
        echo "Nombre de usuario o contraseña incorrectos " . mysqli_num_rows($resultado);
    }
} else {
    // El usuario ingresado no existe en la base de datos
    echo "Nombre de usuario o contraseña incorrectos";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
