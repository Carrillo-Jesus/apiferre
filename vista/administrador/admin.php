<?php
  session_start();
  if(!isset($_SESSION["admin"])) {
    header('Location: ../login/login.php');
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css" />

  <link rel="stylesheet" href="../css/tiendas.css" />
  <link rel="stylesheet" href="../css/negocio.css" />
</head>

<body class="body">
  <header class="h">
    <nav class="navbar navbar-light bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img class="logoApiFerre" src="../img/LogoWhite.svg" alt="" />
          <h3 class="nombre__logo">Appiferre</h3>
        </a>
        <div>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <div class="offcanvas__logo">
              <img class="logoApiFerre" src="../img/LogoColor.png" alt="logoApiferre" />
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                AppiFerre
              </h5>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <hr />
            <section class="secciones secciones-user" data-bs-toggle="modal" data-bs-target="#cambiarImagen">
              <img class="user" <?php if($_SESSION['IMAGEN']!=NULL): ?>

              src="../img/perfil/<?php echo($_SESSION['IMAGEN'])?>"

              <?php else:?> src="../img/user.png"
              <?php endif; ?>

              alt="user">
              <div class="usuarios__nombre">
                <p>
                  <?php echo($_SESSION['NOMBRE_USUARIO'])?>
                </p>
              </div>
            </section>

            <hr />
            <section class="secciones">
              <div class="secciones-usuario" onclick="window.location.href='#'">
                <img src="../img/home.png" alt="home" />
                <p>Home</p>
              </div>
              <div class="secciones-usuario" onclick="window.location.href='#'">
                <img src="../img/notificaciones.png" alt="notificaciones" />
                <p>notificaciones</p>
              </div>
              <div class="secciones-usuario" onclick="window.location.href='../../controlador/accion/logout.php'">
                <img src="../img/logout.png" alt="home" />
                <p>Cerrar sesión</p>
              </div>
            </section>

            <hr />
            <section class="secciones">
              <h5>OTROS</h5>
              <p>Acerca de</p>
              <p>
                <a class="juego" target="_blank" href="https://picasyfijas.netlify.app/">Diviertete con picas y
                  fijas</a>
              </p>
            </section>
            <hr />
          </div>
        </div>
      </div>
    </nav>
  </header>


  <!-- Scrollable modal -->
  <main class="administrador contenedor">
    <!-- ======================================================= -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">Personas</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
          role="tab" aria-controls="profile" aria-selected="false">Tiendas</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrar">
          Registrar personas
        </button>
        <table class="table table-administrador">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Imagen</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody class="mostrarPerosnas"></tbody>
        </table>
      </div>
<!-- ============================================================================================================ -->

      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <hr>
        <table class="table table-administrador">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Categoria</th>
            </tr>
          </thead>
          <tbody class="mostrarTiendas"></tbody>
        </table>
      </div>
<!-- =========================================================================================================== -->
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
<!-- =========================================================================================================== -->
    </div>
    <!-- ======================================================= -->
    <!-- Modal -->
    <div class="modal fade" id="cambiarImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar perfil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="subirImagen" class='imagenform' method="post" enctype="multipart/form-data">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <img class="user" <?php if($_SESSION['IMAGEN']!=NULL): ?>

                  src="../img/perfil/
                  <?php echo($_SESSION['IMAGEN']) ?>"

                  <?php else:?> src="../img/user.png"
                  <?php endif; ?>

                  alt="user">
                  <input type="file" id="imagen" name="imagen" accept="image/*" class="custom-file-input">
                </div>
              </div>
          </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" id="subirFoto" class="btn btn-primary">Actualizar</button>
          </div>
        </div>
      </div>
    </div>

  </main>

  <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="registrar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input name="nombre" required id="nombre" class="login-input mt-2 p-3" type="text" placeholder="Nombre" />
          <input name="apellido" required id="apellido" class="login-input mt-2 p-3" type="text"
            placeholder="Apellido" />
          <input name="correo" required id="correo" class="login-input mt-2 p-3" type="email"
            placeholder="Correo electronico" />
          <input name="password1" required id="password1" class="login-input mt-2 p-3" type="password"
            placeholder="Contraseña" />
          <input name="password2" required id="password2" class="login-input mt-2 p-3" type="password"
            placeholder="Repita la contraseña" />
          <div class="modalMensaje"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button id="sendRegistrar" type="button" class="btn btn-primary">
            Guardar
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="mostrarModificar" class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancelar
          </button>
          <button id="sendModificar" type="button" class="btn btn-primary">
            Modificar
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editarTienda" tabindex="-1" aria-labelledby="editarTienda" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="mostrarModificarTienda" class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancelar
          </button>
          <button id="sendModificarTienda" type="button" class="btn btn-primary">
            Modificar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Está seguro de eliminar a esta perosna?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button id="sendEliminar" type="button" class="btn btn-warning">Eliminar</button>
        </div>
      </div>
    </div>
  </div> -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/admin.js"></script>
</body>


</html>