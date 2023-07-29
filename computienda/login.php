<?php
include_once "header.php";
?>


<!--Formulario de Login-->
<section id="formulario"  style="height: -webkit-fill-available;">
    <div style="background-position: center" class="row justify-content-center">
        <div class="col-12 col-md-4"> 
            <div class="box" style="background-color: cadetblue">

                <form id="login" class="container border border-4 border-dark my-4" action="controlador/loginLogica.php" method="POST">

                    <div class="m-4">
                        <div class="text-center">
                            <img src="img/user-login.png" alt="imagen usuario" width="128" height="128">
                            <h2>Bienvenido</h1>
                        </div>

                        <!-- Resto del formulario -->

                        <div class="form-row">
                            <div class="input-group mb-3 col-6">
                                <input type="text" name="email" class="form-control input_user" 
                                placeholder="Ingrese su correo electronico">
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="input-group mb-3 col-6">
                                <input type="password" name="contrasena" class="form-control input_pass" 
                                placeholder="Ingrese su contraseña">
                            </div>
                        </div>


                            <div class="d-flex mt-3 login_container white-text">
                                <p class="bold-text">No tienes una cuenta?</p><a class="bold-link"  
                                href="registro.php">Registrate</a>
                            </div>

                 

                        <div class="d-flex justify-content-center px-6 mt-3 login_container">
                            <button class="w-100" type="submit">Iniciar sesion</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</section>








<section class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background-color: #000000;text-align: center;">
    <?php
    include_once "footer.php";
    ?>
</section>