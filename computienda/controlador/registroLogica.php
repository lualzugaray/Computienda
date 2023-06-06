<?php
//Primero, vemos que se haya ingresado algo en primer lugar. Si no se ingresó nada, lo enviaremos de vuelta al home o al formulario de registro.
if(empty($_POST["email"]) || empty($_POST["contrasena"])):
    header("Location:../index.php");
    die();
endif;

//creamos variables y les damos los valores que recibimos en el post.
//Para eso usamos $_POST[ ] con el "name" que le dimos a ese campo
//Por ejemplo, si era name=nombre, haremos $_POST["nombre]
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];


//explode separará todo lo que hay antes y despues del @. Necesitamos la dirección y ve que tenga un @ para ver que es un mail "real"
$emailLimpio = explode("@",$email)[0];
//y ahora chequeamos que el campo usuario no este vacío tampoco y lo relacionamos al mail que recibimos.
$usuario = !empty($_POST["usuario"]) ? $_POST["usuario"] : $emailLimpio;

//Ahora, revisamos si ya existe un usuario registrado con ese mail
//con is_dir() estamos revisando la carpeta en donde almacenamos a nuestros usuarios.
//En caso de existir, volvemos al home, al formulario de registro o les enseñamos algun cartel notificandoles.

if(is_dir("usuarios/$email")):
    header("Location:../emailExiste.php");
    die();
endif;

//Y hacemos lo mismo, pero viendo al usuario.
//file_exists() verifica que exista un archivo. En este caso, usuario.txt. en la carpeta llamada igual al mail que recibimos.
//file_get_contents verifica si el contenido de ese archivo (usuario.txt) coincide con nuestro nuevo usuario
//en caso de existir, otra vez enseñamos un cartel, vamos al index, o volvemos al formulario de registro.
if(file_exists("usuarios/$email/usuario.txt") && file_get_contents("usuarios/$email/usuario.txt") == $usuario):
    //Corregir: Chequea la carpeta del mail pero que el usuario existe, no va bien la logica aca, aviso!
    header("Location:../usuarioExiste.php");
    die();
endif;

//Pero, si nada de esto existe, significa que esta todo bien, y podemos avanzar!
//mkdir() crea una carpeta en la ruta especificada y con el nombre especificado
//en este caso, en la carpeta "usuarios" y con el mail que pusimos como nombre.
mkdir("usuarios/$email");

//y aca creamos los archivos de nuestro usuario.
//file_put_contents() va al archivo que le especifiquiemos, y le da el contenido que le pasemos
//en caso de no existir estos archivos, los crea
//en este caso, arma estos .txt, y luego le damos los que debe ingresar en estos(el nobmre del usuario, el apellido, etc.)

file_put_contents("usuarios/$email/usuario.txt",$usuario);
file_put_contents("usuarios/$email/nombre.txt",$nombre);
file_put_contents("usuarios/$email/apellido.txt",$apellido);
file_put_contents("usuarios/$email/perfil.txt","usuario");

//En la contraseña, tomamos una precaución extra, y agregamos "password_hash($contrasena,PASSWORD_DEFAULT)
//Esto hará que la contraseña no sea legible si alguien va a ese .txt.
//Esto se hace por SEGURIDAD.

file_put_contents("usuarios/$email/contrasena.txt",password_hash($contrasena,PASSWORD_DEFAULT));

//Finalmente, terminamos de crear al usuario y volvemos al index!
header("Location:../index.php");

?>