$('.ubicacion').click(function(){
    $('#mapa1').show();
    iniciarMap();
})
$('.cerrar').click(function(){
    $('#mapa1').hide();
})

function iniciarMap(){
    var coord = {lat:11.143159 ,lng: -74.2104021};
    var map = new google.maps.Map(document.getElementById('mapa1'),{
      zoom: 10,
      center: coord
    });
}

