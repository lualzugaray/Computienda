<?php
session_start();
include_once "header.php";
?>

<section id="miCuenta">
    <div class="container m-5 p-4">
        <div class="row m-3">
            
                <div class="col-6">
                    <h2>Mi informacion</h2>
                    <div>
                        <?php
                        if(isset($_SESSION["nombre"])){
                            $nombre = $_SESSION["nombre"];
                            

                            $apellido = isset($_SESSION["apellido"]) ? $_SESSION["apellido"] : 'Apellido no disponible';

                            echo "<h3>$nombre $apellido</h3>";

                        }
                        ?>
                    </div>
                </div>
            <div class="col-6">
                <div class="m-0">
                        <h2>Detalles de la cuenta</h2>
                        <h3>Actualizar información</h3>
           
                        <form id="detallesCuenta" class="p-0 my-4" action="controlador/loginLogica.php" method="POST">

                                <div class="form-row">
                                    <div class="input-group mb-3 col-12">
                                        <?php 
                                        if (isset($_SESSION["email"])) {
                                            $email = $_SESSION["email"];
                                            echo "<input type='email' name='email' class='form-control input_user' 
                                            placeholder='$email'>";
                                        }else{
                                            echo "<input type='email' name='email' class='form-control input_user' 
                                            placeholder='Correo electronico'>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="input-group mb-3 col-12">
                                        <input type="password" name="contrasena" class="form-control input_pass" 
                                        placeholder="Ingresa tu contraseña">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center px-6 mt-3">
                                    <button class="w-100 boton-actualizar" type="submit">Actualizar</button>
                                </div>
                        </form>
                
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
