<?php
// iniciamos el inicio de sesión!
session_start();

// Obviamente, vamos a chequear que los campos no estén vacíos
if (empty($_POST["nombre"]) || empty($_POST["contrasena"])) {
    header("<Location: ../controlador/camposObligatorios.php");
    die();
}

// con $_POST, recibimos los contenidos de los campos "email" y "contraseña"
$nombre = $_POST["nombre"];
$contrasena = $_POST["contrasena"];

// chequeamos que estos usuarios existan
if (!is_dir("usuarios/$nombre")) {
    header("Location:../controlador/usuarioNoExiste.php");
    die();
}

// Vemos que la contraseña coincida
$contraUsuario = file_get_contents("usuarios/$nombre/contrasena.txt");

if (!password_verify($contrasena, $contraUsuario)) {
    header("Location:../controlador/contrasenaMal.php");
    die();
}

// Ahora sí, todo salió bien, iniciamos la sesión!
$_SESSION["usuario"] = [
    "nombre" => file_get_contents("usuarios/$nombre/nombreUsuario.txt"),
];

// finalmente, antes de terminar, chequeamos si el usuario es un admin.
if ($_SESSION["usuario"]["perfil"] == "admin") {
    header("Location:../index.php"); // Si deseamos que nuestro admin vaya a otro lado, acá marcamos donde.
    die();
} else {
    header("Location:../index.php");
    die();
}
?>
