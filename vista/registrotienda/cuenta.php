<?php
session_start();
if(isset($_SESSION['admin'])){
    if($_SESSION['admin']==1)  header("Location: ../administrador/admin.php");
} 

if(!isset($_SESSION["NOMBRE_USUARIO"])){
    if(!isset($name)){
        header("Location: ../login/login.php");
    } 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        AppiFerre, tiendas Agro, ferreterias, campo,herramientas del campo
    </title>
    <link rel="shortcut icon" href="../img/LogoColor.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalize.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/tiendas.css" />
    <link rel="stylesheet" href="../css/negocio.css" />
</head>

<body class="body bodycuenta">
    <header class="cuenta">
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img class="logoApiFerre" src="../img/LogoWhite.svg" alt="" />
                    <h3 class="nombre__logo">Appiferre</h3>
                </a>

                <div class="barra__busqueda">
                    <input class="busqueda__input" type="text" placeholder="Busca tus tiendas" />
                    <img src="../img/buscar.png" alt="buscar" />
                </div>

                <div>
                <!-- <button>Carrito</button> -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <?php if(isset($_SESSION['NOMBRE_USUARIO'])) include('../recursos/menuLogin.php');
                
                    else include('../recursos/menuLogout.php');?>
                </div>
            </div>
        </nav>
    </header>

    <main class="contenedor cuenta">
        
        <section id="perfil">

            <div class="Mi_perfil">
                <div>
                    <img src="../img/user.png" class="perfinCuenta" alt="user">
                    <p class="p"><?php echo $_SESSION['NOMBRE_USUARIO']?></p>
                </div>
                
            </div>

            <div class="Mis_datos">

                <div class="ubicacion">
                   <img src="../img/ubicacion.svg" alt=""> <p class="p">Ingresa tu ubicación</p>
                </div>
                <div class="celular">
                   <img src="../img/phone.svg" alt="">   <input name="celular" required id="celular" class="login-input mt-2 p-3" type="text"
                        placeholder="Ingresa tu celular" />
                        <button id="ccelular" " class="btn btn-success">
                                Enviar
                        </button>
                </div>

            </div>

        </section>
    <div id="mapa1" style="display: none; margin-top:100px">
        <p class="cerrar">X</p>
        
    </div>
        
        
    </main>

    <footer class="fondo">
        <div class="footer">
            <div class="footer__contenido footer__contenido">
                <h4>Titulo</h4>
                <div>
                    <a href="#" class="enlacesFooter">Enlace</a>
                    <a href="#" class="enlacesFooter">Enlace</a>
                </div>
            </div>
            <div class="footer__contenido">
                <h4>Titulo</h4>
                <div>
                    <a href="#" class="enlacesFooter">Enlace</a>
                    <a href="#" class="enlacesFooter">Enlace</a>
                </div>
            </div>
            <div class="footer__contenido">
                <h4>Titulo</h4>
                <div>
                    <a href="#" class="enlacesFooter">Enlace</a>
                    <a href="#" class="enlacesFooter">Enlace</a>
                </div>
            </div>
            <div class="footer__contenido">
                <h4>Titulo</h4>
                <div>
                    <a href="#" class="enlacesFooter">Enlace</a>
                    <a href="#" class="enlacesFooter">Enlace</a>
                </div>
            </div>
            <div class="footer__contenido">
                <h4>Titulo</h4>
                <div>
                    <a href="#" class="enlacesFooter">Enlace</a>
                    <a href="#" class="enlacesFooter">Enlace</a>
                </div>
            </div>
            <div class="footer__contenido">
                <h4>Titulo</h4>
                <div>
                    <a href="#" class="enlacesFooter">Enlace</a>
                    <a href="#" class="enlacesFooter">Enlace</a>
                </div>
            </div>
        </div>
        <div class="derechosReservados">
            <p>Todos los derechos reservados 2022 Copyright ©</p>
            <a href="https://hojavidajesuscarrillo.netlify.app/" target="_blank" class="enlacesFooter">JESUS
                CARRILLO</a><br />
            <a href="https://aldomorales.netlify.app/" class="enlacesFooter" target="_blank">ALDO MORALES</a><br />
            <a href=" https://andersonmaldonado.netlify.app/ " class="enlacesFooter" target="_blank ">
                ANDERSON MALDONADO
            </a>
        </div>
    </footer>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/enviarmensaje.js"></script>
   
    <!-- <script src="../js/map.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
        <!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap">
</script> -->
</body>

</html>