<?php
//IMPORTANTE: LEAN ANTES registroLogica.php ASI LES VA A SER MAS FACIL ENTENDER ESTO.
//iniciamos el inicio de sesión!
session_start();

//Obviamente, vamos a chequear que los campos no estén vacíos
if(empty($_POST["email"]) || empty($_POST["contrasena"])):
    header("Location:../camposObligatorios.php");
    die();
endif;

//con $_POST, recibimos los contenidos de los campos "email" y "contraseña"
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];

//chequeamos que estos usuarios existan
if(!is_dir("usuarios/$email")):
    header("Location:../usuarioNoExiste.php");
    die();
endif;

//Vemos que la contraseña coincida
$contraUsuario = file_get_contents("usuarios/$email/contrasena.txt");

if(!password_verify($contrasena,$contraUsuario)):
    header("Location:../contrasenaMal.php");
    die();
endif;

//Ahora si, todo salio bien, asi que inicimaos la sesión!
$_SESSION["usuario"] = [
    "nombre" => file_get_contents("usuarios/$email/nombre.txt"),
    "apellido" => file_get_contents("usuarios/$email/apellido.txt"),
    "email" => $email,
    "usuario" => file_get_contents("usuarios/$email/usuario.txt"),
    "perfil" => file_get_contents("usuarios/$email/perfil.txt")
];

//finalmente, antes de terminar, chequeamos si el usuario es un admin.
if($_SESSION["usuario"]["perfil"] == "admin"):
    header("Location:../index.php"); //Si deseamos que nuestro admin vaya a otro lado, aca marcamos donde.
    die();
else:
    header("Location:../index.php");
    die();
endif;

?>