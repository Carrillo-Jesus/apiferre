$('#ccelular').click(function(){

    var cel=$('#celular').val();

    if(cel!=""){

        cel='correo='+cel;

        $.ajax({
            data: cel,
            url: '../../controlador/accion/act_enviarMensaje.php',
            type: "POST"
            
        });

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Datos incorrectos',
            text: 'Revise sus datos e intenete nuevamente',
        })
    }
})