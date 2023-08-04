<?php 
 session_start();



if(isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] != 1 || !isset($_SESSION["tipo_usuario"])) {
    header("Location: ../index.php");
    die();
}

include_once "../header.php";    
if (isset($_SESSION["nombre"])) {
    $nombre = $_SESSION["nombre"];
    echo " <div id='bienvenido' class='d-flex container p-2'>
    <h2>Bienvenido $nombre!</h2>
    </div>";
}



if (mysqli_connect('localhost', 'root', '', 'computienda_web')) {
    //servidor, usuario servidor, contraseña, nombre de la base de datos		

    echo "<div class='container'> <h2 style='margin: revert;'><span>PRODUCTOS<span></h2>";

    $con = mysqli_connect('localhost', 'root', '', 'computienda_web');
    //guardo la conexion en una variable

    $consulta = "SELECT * FROM producto";
    //guardo la "consulta SQL" en otra variable


    if ($resultado = mysqli_query($con, $consulta)) {
        //guardo el resultado de la "consulta SQL"
        echo "<table border=1>";
        echo "
                <tr>
                    <th>Nombre</th>
                    <th>Foto Producto</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>            
            ";
        while ($fila = mysqli_fetch_array($resultado)) {
            //guardo cada fila de la "consulta SQL"
            echo "<tr>";
            echo "<td>$fila[nombre]</a></td>";
            echo "<td><img src='../img/imgProductos/$fila[foto_producto]' WIDTH=90 HEIGHT=70/></td>";
            echo "<td>$fila[precio]</a></td>";
            echo "<td><a style= 'text-decoration:none' href='editarProducto.php?id_producto=" . $fila["id_producto"] . "'>Editar</a></td>";
            echo "<td><a style= 'text-decoration:none' href='bajaproducto.php?nombre=" . $fila["id_producto"] . "'>Borrar</a></td>";
            echo "</tr>";
        }
        echo "</table>
         </div>";
    }
} else {
    echo "<h1>No hay conexion</h1>";
}
?>

<div class="formulario container p-3" id="agregar_producto">
    <h2><span>AGREGAR PRODUCTO<span></h2>
    <h4>DETALLES</h4>
    <form action="altaProducto.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre" class="form-label">Título</label>
                    <input id="nombre" type="texto" class="form-control" name="nombre"><br>
        <div class="form-group">
        <div>
            <label for="precio" class="form-label">Precio</label>
                    <input id="precio" type="num" class="form-control" name="precio"><br>
        </div>
        <div class="form-group">
            <label for="archivo">Agregar Foto Producto en formato JPEG:</label><br>
            <input accept=".jpeg,.png" type="file" class="form-control" name="foto" id="archivo" required />
        </div>   
        <div class="form-group py-3">
            <input type="submit" class="btn btn-primary"value="Agregar Producto">
        </div>
    </form>
</div>
<br><br><br><br><br>



<section class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background-color: #000000;text-align: center;">
    <?php
    include_once "../footer.php";
    ?>
</section>
