<?php include_once "../header.php"; ?>

<?php

if (mysqli_connect('localhost', 'root', '', 'productos')) {
    //servidor, usuario servidor, contraseña, nombre de la base de datos		

    echo "<h2 style='margin: revert;'><span>PRODUCTOS<span></h2>";

    $con = mysqli_connect('localhost', 'root', '', 'productos');
    //guardo la conexion en una variable

    $consulta = "SELECT * FROM productos";
    //guardo la "consulta SQL" en otra variable


    if ($resultado = mysqli_query($con, $consulta)) {
        //guardo el resultado de la "consulta SQL"
        echo "<table border=1>";
        echo "
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Foto Producto</th>
                    <th>Borrar</th>
                </tr>            
            ";
        while ($fila = mysqli_fetch_array($resultado)) {
            //guardo cada fila de la "consulta SQL"
            echo "<tr>";
            echo "<td>$fila[nombre]</a></td>";
            echo "<td><img src='../img/imgProductos/$fila[fotoProducto]' WIDTH=90 HEIGHT=70/></td>";
            echo "<td>$fila[precio]</a></td>";
            echo "<td><a href='bajaproducto.php?nombre=" . $fila["idProducto"] . "'>Borrar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} else {
    echo "<h1>No hay conexion</h1>";
}
?>

<div class="formulario">
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
        <label for="archivo">Agregar Foto Producto en formato JPEG:</label><br><br>
        <input accept=".jpeg,.png" type="file" class="form-control" name="foto" id="archivo" required />
    </div>   
    <div class="form-group">
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