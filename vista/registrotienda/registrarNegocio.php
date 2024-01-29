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
    <link rel="shortcut icon" href="../img/LogoColor.png" type="image/x-icon" />
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

    <link rel="stylesheet" href="../css/login.css" />


    <link rel="stylesheet" href="../css/tiendas.css" />
    <link rel="stylesheet" href="../css/negocio.css" />
</head>

<body>
    <header class="">
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img class="logoApiFerre" src="../img/LogoWhite.svg" alt="" />
                    <h3 class="nombre__logo">Appiferre</h3>
                </a>
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                        <?php include('../recursos/menuLogin.php') ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="row w-100">
        <div class="col p-0">
            <a href="../index.php" class="aparecer">
                <img src="../img/LogoColor.png" />
            </a>
            <div class="text-header m-5 agrandar">
                <h1>Registra tu negocio</h1>
                <h5>Haz llegar tu negocio a todas partes</h5>
                <hr />
                <form class="mt-5">
                    <input name="nombreNegocio" required id="nombre" class="login-input mt-2 p-3" type="text"
                        placeholder="¿Cómo se llama tu negocio?" />
                    <!-- <input name="correoNegocio" required id="correoNegocio" class="login-input mt-2 p-3" type="email"
                        placeholder="Correo electrónico" />
                    <input name="telefono" required id="telefono" class="login-input mt-2 p-3" type="number"
                        placeholder="Número de telefono" /> -->

                    <div class="width">
                        <h3>Tipo de negocio</h3>
                        <div class="form-check">
                            <input value="ferreteria" class="form-check-input" type="radio" name="Categoria"
                                id="flexRadioDefault1" />
                            <label class="form-check-label" for="flexRadioDefault1">
                                Ferreteria
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="agro"  class="form-check-input" type="radio" name="Categoria" id="flexRadioDefault2"
                                checked />
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tienda Agro
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="ambas"  class="form-check-input" type="radio" name="Categoria" id="flexRadioDefault3"
                                checked />
                            <label class="form-check-label" for="flexRadioDefault3">
                                Ambas
                            </label>
                        </div>
                    </div>

                </form>
                <button id="registrar" class="mt-4 btn-registro">
                    <i class="fa fa-user-plus"></i> Continuar
                </button>
                <hr />
                <a class="mt-3" style="display: block" href="#">Términos y condiciones</a>
                <a style="display: block" href="#">Política de privacidad</a>
            </div>
        </div>
        <div class="col p-0 bg-custom d-flex justify-content-center align-items-center display-none">
            <a href="../index.php" class="w-75">
                <img src="../img/LogoWhite.svg" />
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <script src="../js/tiendas.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>