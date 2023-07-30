<?php
 session_start();
include_once "header.php";
?>

<section id="cover">

<?php 
   
    if (isset($_SESSION["nombre"])) {
        $nombre = $_SESSION["nombre"];
        echo "<h2>Bienvenido $nombre!</h2>";
    }
    
    ?>

    <div class="inicio">
        <h1>Descubre <br>la inspiración <br>para construir una PC</h1>
        <div class="d-flex align-items-start flex-column" style="height: 200px;">
            <button type="button" class="btn btn-danger"><a href="#productos" style="color:white; text-decoration: none;">Ver más</a>
        </button>
        </div>
    </div>
</section>

<section id="presentacion">
    <div class="contenedor">
        <h2> <span>EQUIPO DE JUEGOS</span></h2>
        <p>Empresa líder en tarjetas madre, tarjetas gráficas, laptops, hardware de juegos <br> y sistemas de alto rendimiento. ¡Nos apasiona unirnos a los jugadores para <br> desafiar los límites sin miedo y luchar mientras nos elevamos a la gloria <br> máxima!</p>
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

<section id="productos" style="margin-bottom: 150px;">
    <div class="container">
        <h2><span>CATÁLOGO DE PRODUCTOS</span></h2>
    </div>

    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row justify-content-center">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'computienda_web');
            if (!$con) {
                die("Error al conectar a la base de datos");
            }

            $consulta = mysqli_query($con, "SELECT * FROM producto");

            if (mysqli_num_rows($consulta) > 0) {
                while ($row = mysqli_fetch_array($consulta)) {
                    echo "<div class='col-lg-4 col-md-6 mb-4'>
                            <div class='card h-70'>
                                <div class='card-body bg-light text-center'>
                                    <div class='card-img-actions'>
                                        <img class='card-img img-fluid' src='img/imgProductos/{$row['foto_producto']}' alt='{$row['nombre']}' style='width:150px; height:150px; object-fit:cover;'>
                                    </div>
                                    <h6 class='card-title font-weight-semibold mb-2'>{$row['nombre']}</h6>
                                    <h5>\${$row['precio']}</h5>
                                </div>
                                <div class='card-footer'>
                                    <form action='miCarro.php?accion=agregar' method='post'>
                                        <input type='hidden' name='codigoProducto' value='{$row['id_producto']}'/>
                                        <button type='submit' name='accion' value='agregar' class='btn btn-primary'>Agregar al Carrito</button>
                                    </form>
                                </div>
                            </div>
                        </div>";
                }
            } else {
                echo "No se encontraron productos";
            }

            mysqli_close($con);
            ?>
        </div>
    </div>
</section>



<section class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background-color: #000000;text-align: center;">
    <?php
    include_once "footer.php";
    ?>
</section>