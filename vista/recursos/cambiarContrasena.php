<?php 
$fecha = new DateTime();
$fecha=$fecha->format('d-m-Y');
if($fecha != base64_decode($_GET['date'])){
header('Location: http://localhost/AppiFerre/vista/Login/login.php');
}else{
    $id = base64_decode($_GET['id']);
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

    <link rel="stylesheet" href="css/normalize.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css" />

    <link rel="stylesheet" href="../css/tiendas.css" />
    <link rel="stylesheet" href="../css/negocio.css" />
</head>

<body>

    <main class="contenedor">
        <section class="cambiarpass">
            <div class="cambiarpass2">
                <img class="cambiarpassimg" src="../img/LogoColor.png" alt="logo">
            </div>
            <div class="cambiarpass2i">
                <input id="id" type="hidden" value="<?php echo $id?>">
                <input id="password" type="password" placeholder="Ingresa la nueva contraseña">
                <input id="password2" type="password" placeholder="Confirma la contraseña">
            <div>
                <button id="cambiarContrasena" type="button" class="btn btn-success">Enviar</button>
            </div>
                
            </div>
        </section>
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/olvidoContrasena.js"></script>
</body>

</html>