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
    <div class="contenedor">
        <h2> <span>CATÁLOGO DE PRODUCTOS</span></h2>
    </div>

    <?php
    if(mysqli_connect('localhost','root','','productos')){
                    //servidor, usuario servidor, contraseña, nombre de la base de datos		

        $con = mysqli_connect('localhost','root','','productos');
        //guardo la conexion en una variable
        
        $consulta = "SELECT idProducto, nombre, precio, fotoProducto FROM productos";
        //guardo la "consulta SQL" en otra variable
        
        
        if($resultado = mysqli_query($con, $consulta)){
            //guardo el resultado de la "consulta SQL"

            while($fila = mysqli_fetch_array($resultado)){
                //guardo cada fila de la "consulta SQL"

                echo "<td><img src='img/imgProductos/$fila[fotoProducto]' WIDTH=90 HEIGHT=70/></td>";
                    echo "<a>$fila[nombre]</a>";
                    echo "<a>$$fila[precio]</a>";

            }
        }
    }else{
        echo "<h1>No hay conexion</h1>";
    }

    ?>
</section>




<?php
include_once "footer.php";
?>