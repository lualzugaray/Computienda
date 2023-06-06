<?php
session_start();

session_destroy();

header("Location:../index.php");
?>
<!--La logica para cerrar sesión es simple: toma la sesión, y la termina con "session_destroy()". Luego nos devuelve al index-->