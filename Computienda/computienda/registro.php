<?php
include_once "header.php";
?>


    <!--Formulario de registro-->
<section id= "formulario" style="height: -webkit-fill-available;">
    <div style="background-position: center" class="row justify-content-center">
    <div class="col-12 col-md-4"> 
        <div class="box" style="background-color: cadetblue">

        <form id="registro" class="container border border-4 border-dark my-4" action="controlador/registroLogica.php" 
            method="POST">
            <div class="m-4">
                    <div class="text-center">
                        <img src="img/user-login.png" alt="imagen usuario" width="128" height="128">
                        <h2>Registrate</h2>
                    </div>
            
            <!-- Resto del formulario -->
            <div class="form-row">
                <div class="input-group mb-3 col-6">
                    <input type="text" name="nombre" class="form-control input_user" placeholder="Ingresa su nombre">
                </div>

                <div class="input-group mb-3 col-6">
                    <input type="text" name="apellido" class="form-control input_user" placeholder="Ingresa su apellido">
                </div>
            </div>

            <div class="form-row">
                <div class="input-group mb-3 col-12">
                    <input type="email" name="email" class="form-control input_user" placeholder="Ingresa un correo electrónico">
                </div>
            </div>

            <div class="form-row">
                <div class="input-group mb-3 col-6">
                    <input type="password" name="contrasena" class="form-control input_pass" placeholder="Ingresa una contraseña">
                </div>
                <div class="input-group mb-3 col-6">
                    <input type="password" name="contrasenaConfirmacion" class="form-control input_pass" 
                    placeholder="Confirme la contraseña">
                </div>
            </div>

            <label for="checkbox-terminos" class="white-text">
                <input type="checkbox" id="checkbox-terminos" required>
                He leído y acepto los términos y condiciones 
            </label> 

            <div class="d-flex justify-content-center px-6 mt-3 login_container">
                <button class="w-100" type="submit">Regístrate</button>
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
