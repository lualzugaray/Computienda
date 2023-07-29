<?php
// Iniciamos la sesión
session_start();

// Verificamos que los campos no estén vacíos
if (empty($_POST["email"]) || empty($_POST["contrasena"])) {
    header("Location: ../controlador/camposObligatorios.php");
    die();
}

// Obtenemos los valores de los campos "email" y "contrasena"
$email= $_POST["email"];
$contrasena = $_POST["contrasena"];


// Conectamos a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'computienda_web');

// Consultar en la base de datos el hash de la contraseña para el usuario ingresado
$query = "SELECT email,contrasena, nombre FROM cliente WHERE email = '$email'";
$resultado = mysqli_query($conexion, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {

    $fila = mysqli_fetch_assoc($resultado);
    $hashContraseña = $fila['contrasena'];
    $id_cliente= $fila['id_cliente'];
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $email = $fila['email'];
    // Verificar si la contraseña ingresada coincide con el hash almacenado en la base de datos
    if (password_verify($contrasena, $hashContraseña)) {
        // Las contraseñas coinciden, el usuario está autenticado correctamente
        $_SESSION['id_cliente'] = $id_cliente;
        $_SESSION["email"] = $email;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["apellido"]=$apellido;
        header("Location:../index.php");
        die();
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
