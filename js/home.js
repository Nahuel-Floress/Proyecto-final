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
    titulo: "Dragon Ball Z DLC",
    descripcion: "Juega como los luchadores Goku, Vegeta y Trunks. ¡Desde torneos cooperativos a peleas salvajes 5 contra 5, tus grandes batallas están a punto de convertirse en Súper Saiyajin!",
    boton: "DESCARGAR DLC"
  },
  {
    titulo: "Vibrant Visuals en Marketplace",
    descripcion: "Descubre el contenido de Marketplace creado y actualizado especialmente para Vibrant Visuals. ¡Comprueba la diferencia con el mundo gratuito de Vibrant Adventures!",
    boton: "LEER ARTÍCULO"
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
