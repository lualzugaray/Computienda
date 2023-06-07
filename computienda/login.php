<?php
include_once "header.php";
?>



    <!--Formulario de Login-->
<div id="formulario" class="row justify-content-center">
   <div class="col-12 col-md-4"> <!-- Ajusta los valores de las clases según tus necesidades -->
      <div class="box">

         <form id="login" class="container border border-4 border-dark my-4" action="controlador/loginLogica.php" method="POST">

            <div class="m-4">
               <div class="text-center">
                  <img src="img/user-login.png" alt="imagen usuario" width="128" height="128">
                  <h2>Bienvenido</h1>
               </div>
                
               <!-- Resto del formulario -->

                            <div class="form-row">
                                <div class="input-group mb-3 col-6">
                                    <input type="text" name="nombre" class="form-control input_user" 
                                    placeholder="Ingresa su nombre de usuario">
                                </div>
                            </div>

                          

                            <div class="form-row">
                                <div class="input-group mb-3 col-6">
                                    <input type="password" name="contrasena" class="form-control input_pass" 
                                    placeholder="Ingresa una contraseña">
                                </div>
                            </div>

                       

                            <div class="d-flex mt-3 login_container white-text">
                                <p class="bold-text">No tienes una cuenta?</p><a class="bold-link"  href="registro.php">Registrate</a>
                            </div>

                            <div class="d-flex justify-content-center px-6 mt-3 login_container">
                                <button class="w-100" type="submit">Iniciar sesion</button>
                            </div>

            </div>
         </form>

      </div>
   </div>
</div>





            
          
                   
        
    <?php
    include_once "footer.php";
    ?>
