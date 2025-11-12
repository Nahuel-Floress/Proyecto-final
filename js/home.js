const bannerImg = document.querySelector('.dlc-banner img');
const galeriaImgs = document.querySelectorAll('.dlc-galeria img');
const tituloBanner = document.querySelector('.dlc-info h2');
const descripcionBanner = document.querySelector('.dlc-info p');
const botonBanner = document.querySelector('.dlc-info button');

const infoGaleria = [
  {
    titulo: "El drop la edad del cobre",
    descripcion: "Transforma este metal versátil en herramientas, fuentes de luz, almacenamiento inteligente e incluso compañeros mecánicos conocidos como gólems de cobre.",
    boton: "CONSULTA LA ACTUALIZACION"
  },
  {
    titulo: "Explora nuevas cavernas",
    descripcion: "Sumérgete en las profundidades y descubre minerales, criaturas y secretos ocultos bajo tierra.",
    boton: "DESCUBRIR MÁS"
  },
  {
    titulo: "Construye tu propio mundo",
    descripcion: "Crea estructuras increíbles y comparte tu imaginación con millones de jugadores en línea.",
    boton: "EMPEZAR AHORA"
  }
];

function quitarBordes() {
  galeriaImgs.forEach(img => img.style.border = '2px solid #222');
}

const primeraImg = galeriaImgs[0];
primeraImg.style.border = '2px solid #3c8527';

galeriaImgs.forEach((img, index) => {
  img.addEventListener('click', () => {
    bannerImg.src = img.src;

    tituloBanner.textContent = infoGaleria[index].titulo;
    descripcionBanner.textContent = infoGaleria[index].descripcion;
    botonBanner.textContent = infoGaleria[index].boton;

    quitarBordes();
    img.style.border = '2px solid #3c8527';
  });
});
 