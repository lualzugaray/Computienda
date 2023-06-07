<?php
include_once "header.php";
?>


    <!--Formulario de registro-->
<div id="formulario" class="row justify-content-center">
   <div class="col-12 col-md-6"> <!-- Ajusta los valores de las clases según tus necesidades -->
      <div class="box">

         <form id="registro" class="container border border-4 border-dark my-4" action="controlador/registroLogica.php" method="POST">

            <div class="m-4">
               <div class="text-center">
                  <img src="img/user-login.png" alt="imagen usuario" width="128" height="128">
                  <h2>Registrate</h1>
               </div>
                
               <!-- Resto del formulario -->

               <div class="form-row">
                                <div class="input-group mb-3 col-6">
                                    <input type="text" name="nombre" class="form-control input_user" 
                                    placeholder="Ingresa un nombre de usuario">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group mb-3 col-12">
                                    <input type="email" name="email" class="form-control input_user" 
                                    placeholder="Ingresa un correo electronico">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group mb-3 col-6">
                                    <input type="password" name="contrasena" class="form-control input_pass" 
                                    placeholder="Ingresa una contraseña">
                                </div>
                            </div>

                            <div class="form-row">
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
                                <button class="w-100"  type="submit">Registrate</button>
                            </div>

            </div>
         </form>

      </div>
   </div>
</div>


<?php
    include_once "footer.php";
    ?>
