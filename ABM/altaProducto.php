<?php 
 session_start();



 if(isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] != 1 || !isset($_SESSION["tipo_usuario"])) {
	 header("Location: ../index.php");
	 die();
 }
 
 include_once "../header.php";    

if(mysqli_connect('localhost','root','','computienda_web')){
	
	$con = mysqli_connect('localhost','root','','computienda_web');
	//guardo la conexion en una variable
	
	if(isset($_POST["nombre"])){
		$nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
		$hora=time();
		move_uploaded_file($_FILES['foto']['tmp_name'],"../img/imgProductos/".$hora.'.jpg');
		$foto= $hora.'.jpg';

		$consulta = "INSERT INTO producto (nombre, precio, foto_producto) VALUES ('$nombre', '$precio', '$foto')";
		//guardo la "consulta SQL" en otra variable
		
		if($resultado = mysqli_query($con, $consulta)){
			//guardo el resultado de la "consulta SQL"
			
				echo "<h2 style='margin:revert;'><span>Producto: $nombre agregado correctamente </span></h2>";
					echo "<h2><span><a href='index.php'>VOLVER AL LISTADO DE PRODUCTOS</a></span></h2>";
			
			
		
		}else{
			
			echo "<h1>La consulta tiene errores</h1>";
		}
		
	}
}	
	
?>
<section class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background-color: #000000;text-align: center;">
    <?php
    include_once "../footer.php";
    ?>
</section>