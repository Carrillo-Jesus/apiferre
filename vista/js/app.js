window.addEventListener("load", function () {
  traerTiendas();
  const myTimeout = setTimeout(a, 100);


  
});
function a(){
  new Glider(document.querySelector(".carouselTienda__lista"), {
    slidesToShow: 6,
    slidesToScroll: 5,
    draggable: false,
    dots: ".carousel__indicadores",
    arrows: {
      prev: ".carousel__anterior",
      next: ".carousel__siguiente",
    },
  });
  
  new Glider(document.querySelector(".carouselTienda__lista-g"), {
    slidesToShow: 6,
    slidesToScroll: 5,
    draggable: false,
    dots: ".carousel__indicadores-g",
    arrows: {
      prev: ".carousel__anterior-g",
      next: ".carousel__siguiente-g",
    },
  });
}

// $(function () {
//   for (let i = 0; i < 10; i++) {
//     $("#ferreterias").append(`
//         <div class="tienda">
//         <img class="tienda__logo" src="img/Banner.jpg" alt="tienda logo" />

//         <div class="tienda__informacion">
//             <div class="tienda__datos">
//                 <h2 class="tienda__nombre">A tu mano</h2>
//                 <div class="tienda__meta">
//                     <img src="img/star.png" alt="Calificacion" />
//                     <p>35 min</p>
//                 </div>
//             </div>
//         </div>

//         <div class="tienda__entrar">Entrar</div>

//         <img class="tienda__ferreteria" src="img/iconMartillo.png" alt="logo martillo" />
//     </div>
              
//     `);
//   }
// });

function mostrarTiendas() {
  for (let i = 0; i < 10; i++) {
    $("#ferreterias__carousel").append(`
    <div class="carouselTienda__elemento">
    <img src="../img/Banner.jpg" alt="Tiendas">
    <p>Tienda1</p>
    </div> 
    `);
  }
}

function traerTiendas() {
  $.ajax({
    url: "../../controlador/accion/act_verTiendas.php",
    method: "POST",
    success: function (response) {
      tienda = JSON.parse(response);
      if (tienda.length > 0) {
        $("#ferreterias__carousel").empty();
        $("#Agro__carousel").empty();
        for (let i = 0; i < tienda.length; i++) {
          if(tienda[i].categoria=='ferreteria' || tienda[i].categoria=='ambas'){
            $("#ferreterias__carousel").append(`
            <div class="carouselTienda__elemento">
            <img src="../img/Banner.jpg" alt="Tiendas">
            <p>` +
            tienda[i].nombre +
            `</p>
            </div> 
            `);
          }
          if(tienda[i].categoria=='agro'){
            $("#Agro__carousel").append(`
            <div class="carouselTienda__elemento">
            <img src="../img/Banner.jpg" alt="Tiendas">
            <p>` +
            tienda[i].nombre +
            `</p>
            </div> 
            `);
          }
        }
      }
    },
  });
}