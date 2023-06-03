<?php
include_once "header.php";
?>

<section id="cover">
    <div class="inicio">
        <h1>Descubre <br>la inspiración <br>para construir una PC</h1>
        <div class="d-flex align-items-start flex-column" style="height: 200px;">
            <button type="button" class="btn btn-danger">Ver más</button>
        </div>
    </div>
</section>

<section id="presentacion">
    <div class="contenedor">
        <h2> <span>EQUIPO DE JUEGOS</span></h2>
        <p>Empresa líder en tarjetas madre, tarjetas gráficas, laptops,hardware de juegos <br> y sistemas de alto rendimiento.
            ¡Nos apasiona unirnos a los jugadores para <br> desafiar los límites sin miedo y luchar mientras nos elevamos a la gloria <br> máxima!</p>
        <div class="container">
            <div class="fila">
                <div class="columna">
                    <img src="img/hyperx.jpg" width="150" height="150">
                </div>
                <div class="columna">
                    <img src="img/logitech.jpg" width="150" height="150">
                </div>
                <div class="columna">
                    <img src="img/razer.jpg" width="150" height="150">
                </div>
                <div class="columna">
                    <img src="img/redragon.png" width="150" height="150">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="productos">
    <div class="container">
        <h2><span>CATÁLOGO DE PRODUCTOS</span></h2>
    </div>

    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row justify-content-center">
            <?php
            if (mysqli_connect('localhost', 'root', '', 'productos')) {
                $con = mysqli_connect('localhost', 'root', '', 'productos');

                $consulta = "SELECT idProducto, nombre, precio, fotoProducto FROM productos";

                if ($resultado = mysqli_query($con, $consulta)) {
                    while ($fila = mysqli_fetch_array($resultado)) {
                        echo "<div class='col-md-4 mt-2'>";
                        echo "<div class='card'>";
                        echo "<form method='post' action='index.php?accion=meter&codigo=<?php echo $fila[idProducto]; ?>'>";
                        echo "<div class='card-body text-center'>";
                        echo "<div class='card-img-actions'>";
                        echo "<img src='img/imgProductos/$fila[fotoProducto]' class='card-img img-fluid' width='96' height='350'/>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='card-body bg-light text-center'>";
                        echo "<div class='mb-2'>";
                        echo "<h6 class='font-weight-semibold mb-2'>";
                        echo "<a href='#' class='text-default mb-2' data-abc='true'>$fila[nombre]</a>";
                        echo "</h6>";
                        echo "</div>";
                        echo "<h3 class='mb-0 font-weight-semibold'>$$fila[precio]</h3>";
                        echo "<div class='cart-action'><input type='text' class='cantidad-producto' name='cantidad' value='1' size='2' /><input type='submit' value='Agregar al Carrito' class='botonAgregarAccion'/></div>";
                        echo "</div>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            } else {
                echo "<h1>No hay conexion</h1>";
            }

            ?>
</section>




<?php
include_once "footer.php";
?>