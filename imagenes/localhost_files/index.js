

var swiper = new Swiper(".swiper-guardianes", {
  effect: "cards",
  grabCursor: true,
});

var toggle = document.querySelector('.toggle');
var bar = document.querySelector('.bar');
var list = document.querySelector('.nav-menu')

toggle.addEventListener('click', () => {
    bar.classList.toggle('show');
    list.classList.toggle('show');
});


// Swiper Slider

var swiper = new Swiper(".hero-slider", {
    loop: true,
    effect: 'fade',
    
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });

 // Siper Carousel videos


var swiper = new Swiper(".swiper-videos", {
    slidesPerView: 5,
    spaceBetween: 30,
    loop: true,
    breakpoints: {
        332: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  
    // Swiper Programas

        var swiper = new Swiper(".swiper-programas", {
        slidesPerView: 5,
        spaceBetween: 10,
        loop: true,
        breakpoints: {
            332: {
                slidesPerView: 1,
                spaceBetween: 10,
              },
            640: {
              slidesPerView: 2,
              spaceBetween: 10,
            },
            768: {
              slidesPerView: 3,
              spaceBetween: 20,
            },
            1024: {
              slidesPerView: 4,
              spaceBetween: 10,
            },
          },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
      
      // Swiper-GUARDIANES

     

      // STICKY HEADER
      
     
      window.addEventListener("scroll", function (){
        var header = document.querySelector('.container');
        var scrollPosition = window.scrollY;

        if (scrollPosition > 50) {
          header.classList.add('sticky');
        } else {
          header.classList.remove('sticky');
        }
      });
  
      

// TV GUIDE
        
function actualizarGuia() {
  const guiaElemento = document.getElementById('timetable');
  guiaElemento.innerHTML = '';

  // Obtener la hora actual
  const ahora = new Date();
  const horaActual = ahora.getHours();  + ':' + ahora.getMinutes(); // Formato 'HH:MM'


  // Simulación de datos de programación (puedes obtener estos datos de una fuente real)
  const programacion = [
  { programa: 'Desde Tempranito', hora: '6', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/11/4.jpeg'},
  { programa: 'Noticias Oromar', hora: '7', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/11/2.jpeg' },
  { programa: 'Ranger de Texas', hora: '8', minutos: '00', imagen: 'nomeolvides.jpeg' },
  { programa: 'No me Olvides', hora: '10', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/12/nomeolvides.jpeg' },
  { programa: 'Acorralada', hora: '11', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/12/acorralada.jpeg' },
  { programa: 'Noticias Oromar', hora: '12', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/11/3.jpeg' },
  { programa: 'Gran Chaparral', hora: '13', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/12/granchaparral.jpeg' },
  { programa: 'Bonanza', hora: '15', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/12/bonanza.jpeg' },
  { programa: 'Ranger de Texas', hora: '17', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/12/ranger.jpeg' },
  { programa: 'Duele Amar', hora: '19', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/12/dueleamar.jpeg' },
  { programa: 'Pedro Escamoso', hora: '20', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/12/escamoso.jpeg' },
  { programa: 'Noticias Oromar', hora: '21', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/11/5.jpeg'},
  { programa: 'Ranger de Texas', hora: '22', minutos: '00', imagen: 'http://cientist84.es/wp-content/uploads/2023/12/ranger.jpeg'},
  { programa: 'Espacio Contratado', hora: '23', minutos: '00'},
  { programa: 'Desde Tempranito', hora: '24', minutos: '00'},
  { programa: 'Ranger de Texas', hora: '1' },
  { programa: 'Espacio Contratado', hora: '2' },
  { programa: 'Desde Tempranito', hora: '3' },
    // ... Otros programas ...
  ];

  let programaActual = null;
  let programaSiguiente = null;
  let programaUltimo = null;

  for (let i = 0; i < programacion.length; i++) {
    if (programacion[i].hora >= horaActual) {
      programaActual = programacion[i];
      programaSiguiente = programacion[i + 1];
      programaUltimo = programacion[i + 2];
      break;
    }
  }

  if (programaActual && programaSiguiente && programaUltimo) {
    const contenido = `
      <div><div class="featured-program"><a><img width="100%" src="${programaActual.imagen}" alt=""></a><div class="overlay"></div></div></div>
      <div class="active-program"><div><h4>Estas Viendo</h4><p>${programaActual.programa}</p><p>${programaActual.hora} : ${programaActual.minutos}</p></div></div>
      <div class="item-middle"><h4>A continuación</h4>
      <p>${programaSiguiente.programa}</p>
      <p>${programaSiguiente.hora} : ${programaSiguiente.minutos}</p></div>
      <div class="item-final"><h4>Más adelante</h4>
      <p>${programaSiguiente.programa}</p>
      <p>${programaSiguiente.hora} : ${programaSiguiente.minutos}</p></div>
    `;
    guiaElemento.innerHTML = contenido;
  } else {
    guiaElemento.innerHTML = '<p>No hay programas disponibles en este momento.</p>';
  }

}
// Llamada inicial y actualización periódica de la guía de televisión (cada 1 minuto en este caso)
actualizarGuia();


setInterval(actualizarGuia, 60000); // 60000 milisegundos = 1 minuto


 

function breakingNews (){
 const notification = document.querySelector('.notification');
 const cerrar = document.querySelector('.x');

 cerrar.addEventListener('click', () => {
     notification.classList.add('ocultar');
 });
 }
 breakingNews();




