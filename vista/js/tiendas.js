$("#registrar").click(function () {	 
    var categoria=$('input:radio[name=Categoria]:checked').val();
    var nombre=$('#nombre').val();

    if(nombre!=''){
        registrarTienda(categoria, nombre);
    }
    else{
        Swal.fire({
            icon: 'error',
            title: 'Datos incorrectos',
            text: 'Revise los datos',
        });
    }
});

function registrarTienda(categoria, nombre){
    const datos="categoria="+categoria+"&nombre="+nombre;
    $.ajax({
        data:datos,
        url:"../../controlador/accion/act_registrarTienda.php",
        type:'POST',
        success: function(data){
            if(data!=0){
                Swal.fire({
                    icon: 'succes',
                    title: 'Registrada',
                    text: 'Empecemos a registrar productos',
                })
                return;
            }
        }
    })
}