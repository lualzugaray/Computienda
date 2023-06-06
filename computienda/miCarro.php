<?php include_once "header.php"; ?>

<?php
session_start();
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$mensaje = "";

if (isset($_GET['accion'])) {
    switch ($_GET['accion']) {
        case 'agregar':
            if (is_numeric($_POST['codigoProducto'])) {
                $con = mysqli_connect('localhost', 'root', '', 'productos');
                if (!$con) {
                    die("Error al conectar a la base de datos");
                }

                $codigoProducto = $_POST['codigoProducto'];
                $consulta = mysqli_query($con, "SELECT * FROM productos WHERE idProducto = '$codigoProducto'");

                if (mysqli_num_rows($consulta) > 0) {
                    $producto = mysqli_fetch_array($consulta);
                    $nombre = $producto['nombre'];
                    $precio = $producto['precio'];

                    $item = array(
                        'codigo' => $codigoProducto,
                        'nombre' => $nombre,
                        'precio' => $precio
                    );

                    array_push($_SESSION['carrito'], $item);
                    $mensaje = "Producto agregado al carrito";
                } else {
                    $mensaje = "No se encontró el producto";
                }

                mysqli_close($con);
            } else {
                $mensaje = "Código de producto inválido";
            }
            break;

        case 'eliminar':
            if (is_numeric($_GET['codigo'])) {
                $codigoProducto = $_GET['codigo'];
                foreach ($_SESSION['carrito'] as $indice => $producto) {
                    if (isset($producto['codigo']) && $producto['codigo'] == $codigoProducto) {
                        unset($_SESSION['carrito'][$indice]);
                        $mensaje = "Producto eliminado del carrito";
                        break;
                    }
                }
            } else {
                $mensaje = "Código de producto inválido";
            }
            break;

        case 'comprar':
            if ($_SESSION['carrito'] != NULL) {
                $_SESSION['carrito'] = array();
                $mensaje = "Productos comprados";
            } else {
                $mensaje = "No hay productos en el carrito";
            }
            break;

        case 'vaciar':
            if ($_SESSION['carrito'] != NULL) {
                $_SESSION['carrito'] = array();
                $mensaje = "Carrito vaciado";
            } else {
                $mensaje = "No hay productos en el carrito";
            }
            break;
    }
}
?>

<section id="carrito">
    <div class="container">
        <h2 style="padding: 30px;"><span>CARRITO DE COMPRAS</span></h2>
    </div>

    <div class="container mt-50">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;

                foreach ($_SESSION['carrito'] as $indice => $producto) {
                    if (isset($producto['codigo']) && isset($producto['nombre']) && isset($producto['precio'])) {
                        $total += $producto['precio'];
                        echo "<tr>
                                <td>{$producto['codigo']}</td>
                                <td>{$producto['nombre']}</td>
                                <td>\${$producto['precio']}</td>
                                <td><a href='miCarro.php?accion=eliminar&codigo={$producto['codigo']}' class='btn btn-danger'>Eliminar</a></td>
                            </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <h4>Total: $<?php echo $total; ?></h4>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <a href="miCarro.php?accion=vaciar" class="btn btn-danger">Vaciar Carrito</a>
            <a href="miCarro.php?accion=comprar" class="btn btn-danger">Comprar</a>
        </div>
    </div>
    <div class="container mt-4">
        <div class="alert alert-success"><?php echo $mensaje; ?></div>
    </div>
</section>

<section class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background-color: #000000;text-align: center;">
    <?php
    include_once "footer.php";
    ?>
</section>