$(document).on('click', '#enviar', function () {

    correo = $("#email").val();
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(correo)) {
        ajaxOlvidoContrasena(correo);
    }
    else {
        Swal.fire({
            text: "Digite los datos del correo",
            icon: "error",
            title: "Correo"
        })
    }

});

function mensaje(mens) {
    Swal.fire({
        text: mens,
        title: "Verificando"

    })
}

function ajaxOlvidoContrasena(correo) {
    setTimeout(mensaje('Espere unos segundos'), 1);
    $.ajax({ // sin utilizar XML,... usar json
        data: { //Datos a enviar
            "correo": correo
        },
        dataType: "json",
        type: "POST",
        url: "../../controlador/accion/act_olvidocontrasena.php"
    })
        .done(function (response) {   // Cuando no hay problema
            var mens = response.msg;

            if (mens != "") {
                Swal.fire({
                    text: mens,
                    icon: response.type,
                    title: "Envío de correo"

                }).then((result) => {
                    if (result.isConfirmed) {
                        $(location).attr('href', response.ruta); //Redireccinar a una ruta
                    }
                })


            }
            /* hacer append, modificar o eliminar de lo ingresau */
        })
        .fail(function (jqXHR, textStatus, errorThrown) {  // Si encuentra algun problema

            Swal.fire({
                title: "ALERTA",
                text: "La solicitud a fallado: " + errorThrown
            });
        });
}

$(document).on('click', '#cambiarContrasena', function () {
    var password1 = $('#password').val();
    var password2 = $('#password2').val();
    var id = $('#id').val();
    var passwordregex = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
    var error = [];

    if (password1 != '' && password2 != '') {

        if (password1 != password2) {
            error.push('Las contraseñas no coinciden');
            Swal.fire({
                text: 'Las contraseñas no coinciden',
                title: "Error"
            })
        }
        else if (!passwordregex.test(password1)) {
            error.push('La contraseña debe tener entre 8 y 16 caracteres, un dígito, una minúscula y una mayúscula.')
            Swal.fire({
                text: 'La contraseña debe tener entre 8 y 16 caracteres, un dígito, una minúscula y una mayúscula',
                title: "Error"
            })
        }
        if (!error.length>0) {
            cambiarContrasena(password1, id);
        }
    } else {
        Swal.fire({
            text: 'Llene todos los campos',
            title: "Error"
        })
    }

})

function cambiarContrasena(password, id) {
    $.ajax({ // sin utilizar XML,... usar json
        data: { //Datos a enviar
            "password": password,
            "id":id
        },
        type: "POST",
        url: "../../controlador/accion/act_cambiarContrasena.php",
        success: function(data){
            if(data==0){
                Swal.fire({
                    icon: 'succes',
                    title: 'Cambio exitoso',
                })
                return;
            }else{
                window.location="../registrotienda/index.php";
            }
        }
    })
    
}