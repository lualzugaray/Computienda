<?php
session_start();
include_once "header.php";
?>

<section id="miCuenta">

<div class="container m-5 p-4">
    <div class="row m-3">

        <div class="col-6">
            <div class="m-0">
                <h2>Detalles de la cuenta</h2>
                <h3>Actualizar información</h3>
                <div>
                    <form id="detallesCuenta" class="p-0 my-4" action="controlador/loginLogica.php" method="POST">
                        <div class="m-2">

                            <div class="form-row">
                                <div class="input-group mb-3 col-12">
                                    <?php 
                                    if (isset($_SESSION["nombreUsuario"])) {
                                        $nombreUsuario = $_SESSION["nombreUsuario"];
                                        echo "<input type='text' name='nombre' class='form-control input_user' 
                                        placeholder='$nombreUsuario'>";
                                    } else{
                                        echo "<input type='text' name='nombre' class='form-control input_user' 
                                        placeholder='Nombre de usuario'>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group mb-3 col-12">
                                    <?php 
                                    if (isset($_SESSION["email"])) {
                                        $email = $_SESSION["email"];
                                        echo "<input type='email' name='email' class='form-control input_user' 
                                        placeholder='$email'>";
                                    }else{
                                        echo "<input type='text' name='nombre' class='form-control input_user' 
                                        placeholder='Correo electronico'>";
                                    }

                                    ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group mb-3 col-12">
                                    <input type="password" name="contrasena" class="form-control input_pass" placeholder="Ingresa contraseña">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center px-6 mt-3">
                                <button class="w-100 boton-actualizar" type="submit">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div>
                <h2>Mis compras</h2>

                <?php
                // Configuración de la conexión a la base de datos
                $host = 'localhost';
                $usuario = 'root';
                $contrasena = '';
                $base_de_datos = 'productos';

                // Crear la conexión
                $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

                // Verificar si hay errores de conexión
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                // Consulta SQL
                $sql = "SELECT fecha, producto, precio, descripcion_producto FROM compra";

                // Ejecutar la consulta
                $resultado = $conexion->query($sql);

                // Comprobar si se obtuvieron resultados
                if ($resultado->num_rows > 0) {
                    // Mostrar los resultados en una tabla
                    echo "<table class='table'>";
                    echo "<tr><th>Fecha</th><th>Producto</th><th>Precio</th><th>Descripción</th></tr>";

                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['fecha'] . "</td>";
                        echo "<td>" . $fila['producto'] . "</td>";
                        echo "<td>" . $fila['precio'] . "</td>";
                        echo "<td>" . $fila['descripcion_producto'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No se encontraron resultados.";
                }

                // Cerrar la conexión
                $conexion->close();
                ?>

            </div>
        </div>

    </div>
</div>

</section>

<section class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background-color: #000000;text-align: center;">
    <?php
    include_once "footer.php";
    ?>
</section>
