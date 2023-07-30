<?php
include_once "../header.php";

if (mysqli_connect('localhost', 'root', '', 'computienda_web')) {
    $con = mysqli_connect('localhost', 'root', '', 'computienda_web');

    if (isset($_GET["id_producto"])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_producto = $_POST["id_producto"];
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];

            // Verificar si se cargó una nueva foto
            if (isset($_FILES['foto']['tmp_name']) && !empty($_FILES['foto']['tmp_name'])) {
                $hora = time();
                move_uploaded_file($_FILES['foto']['tmp_name'], "../img/imgProductos/" . $hora . '.jpg');
                $foto = $hora . '.jpg';

                // Obtener el nombre de la foto anterior para eliminarla del servidor
                $consulta_foto = "SELECT fotoProducto FROM producto WHERE id_producto = '$id_producto'";
                $resultado_foto = mysqli_query($con, $consulta_foto);
                $fila_foto = mysqli_fetch_array($resultado_foto);

                if ($fila_foto) {
                    $foto_anterior = $fila_foto["fotoProducto"];
                    unlink("../img/imgProductos/" . $foto_anterior);
                }

                $consulta = "UPDATE producto SET nombre = '$nombre', precio = '$precio', fotoProducto = '$foto' WHERE id_producto = '$id_producto'";
            } else {
                $consulta = "UPDATE producto SET nombre = '$nombre', precio = '$precio' WHERE id_producto = '$id_producto'";
            }

            if ($resultado = mysqli_query($con, $consulta)) {
                echo "<h2 style='margin: revert;'><span>Producto: $nombre editado correctamente</span></h2>";
                echo "<h2><span><a href='index.php'>VOLVER AL LISTADO DE PRODUCTOS</a></span></h2>";
            } else {
                echo "<h1>La consulta tiene errores</h1>";
            }
        } else {
            $id_producto = $_GET["id_producto"];

            $consulta = "SELECT * FROM producto WHERE id_producto = '$id_producto'";
            $resultado = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($resultado);

            if ($fila) {
                ?>
                <div class="formulario">
                    <h2><span>EDITAR PRODUCTO</span></h2>
                    <h4>DETALLES</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_producto" value="<?php echo $fila["id_producto"]; ?>">
                        <div class="form-group">
                            <label for="nombre" class="form-label">Título</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" value="<?php echo $fila["nombre"]; ?>"><br>
                        </div>
                        <div class="form-group">
                            <label for="precio" class="form-label">Precio</label>
                            <input id="precio" type="number" class="form-control" name="precio" value="<?php echo $fila["precio"]; ?>"><br>
                        </div>
                        <div class="form-group">
                            <label for="archivo">Foto actual:</label><br>
                            <img src="../img/imgProductos/<?php echo $fila["fotoProducto"]; ?>" width="90" height="70" />
                        </div>
                        <div class="form-group">
                            <label for="archivo">Cambiar Foto Producto en formato JPEG:</label><br><br>
                            <input accept=".jpeg,.png" type="file" class="form-control" name="foto" id="archivo" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                        </div>
                    </form>
                </div>
                <?php
            } else {
                echo "<h1>El producto no existe</h1>";
            }
        }
    }
}
?>

<section class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background-color: #000000;text-align: center;">
    <?php
    include_once "../footer.php";
    ?>
</section>