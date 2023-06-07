<?php
// Primero, vemos que se haya ingresado algo en primer lugar.
// Si no se ingresó nada, lo enviaremos de vuelta al home o al formulario de registro.
if (empty($_POST["email"]) || empty($_POST["contrasena"])) {
    header("Location:../index.php");
    die();
}

// Creamos variables y les damos los valores que recibimos en el POST.
// Para eso usamos $_POST[] con el "name" que le dimos a ese campo.
// Por ejemplo, si era name=nombre, haremos $_POST["nombre"].
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
$contrasenaConfirmacion = $_POST["contrasenaConfirmacion"];

// Explode separará todo lo que hay antes y después del @. Necesitamos la dirección y verificar que tenga un @ para ver que es un correo "real".
$emailLimpio = explode("@", $email)[0];

// Validación del campo de usuario
if (!empty($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
} else {
    // Si el campo de usuario está vacío, asignamos el valor del correo electrónico limpio.
    $usuario = $emailLimpio;
}

// Ahora, revisamos si ya existe un usuario registrado con ese correo electrónico.
// Con is_dir() estamos revisando la carpeta en donde almacenamos a nuestros usuarios.
// En caso de existir, volvemos al home, al formulario de registro o mostramos un mensaje de error.
if (is_dir("usuarios/$email")) {
    header("Location:../emailExiste.php");
    die();
}

// Y hacemos lo mismo, pero verificando el usuario.
// file_exists() verifica que exista un archivo. En este caso, usuario.txt, en la carpeta con el mismo nombre que el correo electrónico recibido.
// file_get_contents verifica si el contenido de ese archivo (usuario.txt) coincide con nuestro nuevo usuario.
// En caso de existir, mostramos un mensaje de error, volvemos al index o regresamos al formulario de registro.
if (file_exists("usuarios/$email/usuario.txt") && file_get_contents("usuarios/$email/usuario.txt") == $usuario) {
    // Corregir: Chequea la carpeta del correo electrónico, pero si el usuario existe, la lógica no es correcta, ¡aviso!
    header("Location:../usuarioExiste.php");
    die();
}

// Se verifica si las contraseñas coinciden
if (strcmp($contrasena, $contrasenaConfirmacion) !== 0) {
    header("Location:../index.php");
    die();
}

// Creamos la carpeta del usuario en la ruta especificada con el nombre del correo electrónico.
mkdir("usuarios/$email");

// Creamos los archivos del usuario.
file_put_contents("usuarios/$email/usuario.txt", $usuario);
file_put_contents("usuarios/$email/nombre.txt", $nombre);

// En la contraseña, tomamos una precaución adicional y utilizamos "password_hash($contrasena, PASSWORD_DEFAULT)"
// Esto hace que la contraseña no sea legible si alguien accede a ese archivo .txt.
// Esto se hace por SEGURIDAD.
file_put_contents("usuarios/$email/contrasena.txt", password_hash($contrasena, PASSWORD_DEFAULT));

// Redireccionar al inicio de sesión o mostrar un mensaje de éxito
header("Location:../inicioSesion.php");
die();

?>