<footer>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 border-top dark bg-black">
        <a class="navbar-brand" href="http://localhost/Computienda/computienda/index.php" 
        style="font-size: xx-large;color: white; margin-left:10%">© 2023 COMPUTIENDA</a>
        <img src="img/logo.png" alt="" style="height: 60px;">
        <ul class="list-unstyled d-flex dark bg-black" style="margin-right: 10%">
        <?php
                                if(isset($_SESSION["nombre"])){
                                    echo"<li class='nav-item'>
                                        <a class='nav-link' href='http://localhost/Computienda/computienda/miCarro.php'>
                                        Mi carro 
                                        <i class='fa fa-sign-out'></i></a>
                                        </li>";}
                            ?>
           
            <?php
                            if(isset($_SESSION["nombre"])){
                                echo"<li class='nav-item'>
                                    <a class='nav-link' href='http://localhost/Computienda/computienda/controlador/logoutLogica.php'>
                                    Cerrar sesión 
                                    <i class='fa fa-sign-out'></i></a>
                                    </li>";}
            ?>
        </ul>
    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>