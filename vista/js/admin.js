var aux = null;
var tienda=null;
var subirImagen = document.querySelector("#subirFoto");
$(function () {
  traerPersonas();
  traerTiendas();
});

function traerPersonas() {
  $.ajax({
    url: "../../controlador/accion/act_verPersonas.php",
    method: "POST",
    success: function (response) {
      aux = JSON.parse(response);
      console.log(aux);
      if (aux.length > 0) {
        $(".mostrarPerosnas").empty();
        for (let i = 0; i < aux.length; i++) {
          $(".mostrarPerosnas").append(
            `
             <tr class="fila">
                     <th scope="row">` +
            aux[i].idpersona +
            `</th>
                     <td>` +
            aux[i].imagen +
            `</td>
                     <td>` +
            aux[i].nombre +
            " " +
            aux[i].apellido +
            `</td>
                     <td>` +
            aux[i].correo +
            `</td>
                     <td>
                         <button onclick="editarPersona(${i})" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#editar">
                         EDITAR
                         </button>
                         <button onclick="eliminarPersona(` +
            aux[i].idpersona +
            `)"  class="btn btn-orange">
                         ELIMINAR
                         </button>
                     </td>
             </tr>
             `
          );
        }
      }
    },
  });
}

document.querySelector("#sendModificar").addEventListener("click", function () {
  let nombre = $("#mnombre").val();
  let apellido = $("#mapellido").val();
  let correo = $("#mcorreo").val();
  let id = $("#mid").val();
  actualizarPersona(nombre, apellido, correo, id);
});

document.querySelector("#sendModificarTienda").addEventListener("click", function () {
  let nombre = $("#tnombre").val();
  let id = $("#tid").val();
  actualizarTienda(nombre,id);
});

function actualizarTienda(nombre,id) {
  if (nombre === "") {
    $(".modalMensaje").append(
      "<div class='error'>Llene todos los campos</div>"
    );
    setTimeout(function () {
      $(".error").remove();
    }, 3000);
  } else guardarTienda(nombre,id);
}
function guardarTienda(nombre,id) {
  var datos =
    "nombre="+nombre +"&id=" + id;
  $.ajax({
    url: "../../controlador/accion/act_editarTienda.php",
    method: "post",
    data: datos,
    success: function (data) {
      if (data == 0) {
        Swal.fire({
          icon: "success",
          title: "Excelente...",
          text: "Actualización exitosa",
        });
        traerTiendas();
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Hubo un problema",
        });
      }
    },
  });
}
function actualizarPersona(nombre, apellido, correo, id) {
  if (nombre === "" || apellido === "" || correo === "") {
    $(".modalMensaje").append(
      "<div class='error'>Llene todos los campos</div>"
    );
    setTimeout(function () {
      $(".error").remove();
    }, 3000);
  } else guardarPersona(nombre, apellido, correo, id);
}

function guardarPersona(nombre, apellido, correo, id) {
  var datos =
    "nombre=" +
    nombre +
    "&apellido=" +
    apellido +
    "&correo=" +
    correo +
    "&id=" +
    id;
  $.ajax({
    url: "../../controlador/accion/act_editarPersona.php",
    method: "post",
    data: datos,
    success: function (data) {
      if (data == 0) {
        Swal.fire({
          icon: "success",
          title: "Excelente...",
          text: "Actualización exitosa",
        });
        traerPersonas();
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Hubo un problema",
        });
      }
    },
  });
}

function editarPersona(persona) {
  $("#mostrarModificar").empty();
  $("#mostrarModificar").append(
    ` <input id="mid" name="prodId" type="hidden" value="${aux[persona].idpersona}">
      <input name="nombre" required id="mnombre" class="login-input mt-2 p-3" type="text" placeholder="Nombre" value="${aux[persona].nombre}">
      <input name="apellido" required id="mapellido" class="login-input mt-2 p-3" type="text" placeholder="Apellido" value="${aux[persona].apellido}">
      <input name="correo" required id="mcorreo" class="login-input mt-2 p-3" type="email" placeholder="Correo electronico" value="${aux[persona].correo}">
      <div class="modalMensaje">
      `
  );
}
function eliminarPersona(idpersona) {
  Swal.fire({
    title: "Seguro que desea eliminar esta persona?",
    showCancelButton: true,
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../../controlador/accion/act_eliminarPersona.php",
        type: "post",
        data: "id=" + idpersona,
        success(data) {
          Swal.fire("Eliminado");
          traerPersonas();
        },
      });
    }
  });
}

var registrar = document.querySelector("#sendRegistrar");

registrar.addEventListener("click", function () {
  var registro = false;
  let error = [];
  var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  var passwordregex = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
  const nombre = $("#nombre").val();
  const apellido = $("#apellido").val();
  const correo = $("#correo").val();
  const password1 = $("#password1").val();
  const password2 = $("#password2").val();

  if (
    nombre === "" ||
    apellido === "" ||
    correo === "" ||
    password1 === "" ||
    password2 === ""
  ) {
    $(".modalMensaje").append(
      "<div class='error'>Llene todos los campos</div>"
    );
    setTimeout(function () {
      $(".error").remove();
    }, 3000);
  } else {
    if (!emailRegex.test(correo)) {
      error.push("Ingrese un correo válido");
    }

    if (!passwordregex.test(password1)) {
      error.push(
        "La contraseña debe tener entre 8 y 16 caracteres, un dígito, una minúscula y una mayúscula."
      );
    } else if (password1 != password2) {
      error.push("Las contraseñas no coinciden");
    }
    if (error.length > 0) {
      error.forEach((e) =>
        $(".modalMensaje").append("<div class='error'>" + e + "</div>")
      );
      setTimeout(function () {
        $(".error").remove();
      }, 5000);
    } else {
      registrarPersona(nombre, apellido, correo, password1);
      traerPersonas();
    }
  }
});

function registrarPersona(nombre, apellido, correo, password) {
  var datos = 'nombre=' + nombre + '&apellido=' + apellido + '&correo=' + correo + '&password=' + password;
  $.ajax({
    url: '../../controlador/accion/act_registrarPersona.php',
    type: "POST",
    data: datos,
    success: function (data) {
      if (data == -1) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Este email ya ha sido registrado',
        })
        return;
      }
      if (data != 0) {
        Swal.fire({
          icon: 'success',
          title: 'Excelente...',
          text: 'Cuenta registrada existosamente',
        })
        traerPersonas();
        return true;
      }
    }
  });

}

subirImagen.addEventListener("click", function (e) {

  var formData = new FormData();
  var files = $('#imagen')[0].files[0];

  if (files['name']) {
    formData.append('imagen', files);
    console.log(formData);

    $.ajax({
      url: "../../controlador/accion/act_actualizarPerfil.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        Swal.fire("Exito");
        setTimeout(mensaje,1500);     
        
      }
    });

  }

});

function mensaje() {
  location.reload();
}

function traerTiendas() {
  $.ajax({
    url: "../../controlador/accion/act_verTiendas.php",
    method: "POST",
    success: function (response) {
      tienda = JSON.parse(response);
      console.log(tienda);
      if (tienda.length > 0) {
        $(".mostrarTiendas").empty();
        for (let i = 0; i < tienda.length; i++) {
          $(".mostrarTiendas").append(
            `
            <tr class="fila">
            <th scope="row">` +
            tienda[i].idtienda +
            `</th>
            <td>` +
            tienda[i].nombre +
            `</td>
              <td>` +
            tienda[i].categoria +
            `</td>
                     <td>
                         <button onclick="editarTienda(${i})" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#editarTienda">
                         EDITAR
                         </button>
                         <button onclick="eliminarTienda(` +
            tienda[i].idtienda +
            `)"  class="btn btn-orange">
                         ELIMINAR
                         </button>
                     </td>
             </tr>
             `
          );
        }
      }
    },
  });
}

function editarTienda(tiendas) {
  $("#mostrarModificarTienda").empty();
  $("#mostrarModificarTienda").append(
    ` <input id="tid" name="prodId" type="hidden" value="${tienda[tiendas].idtienda}">
      <input name="nombre" required id="tnombre" class="login-input mt-2 p-3" type="text" placeholder="Nombre" value="${tienda[tiendas].nombre}">
      <div class="modalMensaje">
      `
  );
}


function eliminarTienda(idtienda) {
  Swal.fire({
    title: "Seguro que desea eliminar esta tienda?",
    showCancelButton: true,
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../../controlador/accion/act_eliminarTienda.php",
        type: "post",
        data: "id=" + idtienda,
        success(data) {
          Swal.fire("Eliminado");
          traerTiendas();
        },
      });
    }
  });
}