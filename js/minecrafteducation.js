document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".mc-tab");
  const contents = document.querySelectorAll(".mc-seccion");

  // Asegurarse de que el primer tab está activo al cargar
  if (tabs.length > 0 && contents.length > 0) {
    // En caso de que se haya quitado el 'active' y 'visible' del HTML
    // tabs[0].classList.add("active");
    // contents[0].classList.add("visible");
  }

  tabs.forEach(tab => {
    tab.addEventListener("click", () => {
      const tabId = tab.getAttribute("data-tab");

      // Quitar clases activas previas
      tabs.forEach(t => t.classList.remove("active"));
      contents.forEach(c => c.classList.remove("visible"));

      // Activar la pestaña clicada
      tab.classList.add("active");

      // Activar el contenido correspondiente
      const target = document.getElementById(tabId);
      if (target) {
        target.classList.add("visible");
      }
    });
  });
});


const carouselEl = document.querySelector("#principalCarousel");
const carousel = new bootstrap.Carousel(carouselEl, {
  interval: false,
  ride: false,
  touch: true
});

const thumbsContainer = document.querySelector(".thumbs-container");
const track = thumbsContainer.querySelector(".thumbs-track");
const originalThumbs = Array.from(track.querySelectorAll(".thumb"));

originalThumbs.forEach(t => {
  const clone = t.cloneNode(true);
  clone.classList.remove("active");
  track.appendChild(clone);
});

let thumbs = Array.from(track.querySelectorAll(".thumb"));
const thumbWidth = 256 + 20;

let current = 0;

const textElement = document.querySelector(".subtitulo");
const textos = [
  "Construye enormes asentamientos o una sencilla choza. ¡El mundo está en tus manos para darle forma!",
  "Explora dimensiones peligrosas y enfréntate a criaturas únicas.",
  "Crea máquinas avanzadas y estructuras impresionantes.",
  "Descubre aldeas, minas y secretos en cada rincón.",
  "Sobrevive cada noche mientras exploras libremente."
];

function updateActive(i) {
  thumbs.forEach(t => t.classList.remove("active"));
  const found = thumbs.find(t => Number(t.dataset.index) === i);
  if (found) found.classList.add("active");
  textElement.textContent = textos[i];
}

updateActive(0);

function moveTrack(dir) {
  track.style.transition = "transform 0.35s ease";
  track.style.transform = `translateX(${dir * -thumbWidth}px)`;

  setTimeout(() => {
    track.style.transition = "none";

    if (dir === 1) {
      track.appendChild(track.firstElementChild);
    } else {
      track.insertBefore(track.lastElementChild, track.firstElementChild);
    }

    track.style.transform = "translateX(0)";
  }, 350);
}

function centerThumbByIndex(realIndex) {
  let pos = thumbs.findIndex(t => Number(t.dataset.index) === realIndex);

  while (pos > 1) {
    track.appendChild(track.firstElementChild);
    thumbs = Array.from(track.querySelectorAll(".thumb"));
    pos--;
  }

  while (pos < 1) {
    track.insertBefore(track.lastElementChild, track.firstElementChild);
    thumbs = Array.from(track.querySelectorAll(".thumb"));
    pos++;
  }
}

thumbs.forEach(t => {
  t.addEventListener("click", () => {
    const idx = Number(t.dataset.index);
    current = idx;

    centerThumbByIndex(idx);

    carousel.to(idx);
    updateActive(idx);
  });
});

const prevBtn = document.querySelector(".arrow-prev");
const nextBtn = document.querySelector(".arrow-next");

function activateButton(btn) {
  prevBtn.classList.remove("active-btn");
  nextBtn.classList.remove("active-btn");
  btn.classList.add("active-btn");
}

prevBtn.addEventListener("click", () => {
  activateButton(prevBtn);
  moveTrack(-1);
  current = (current - 1 + originalThumbs.length) % originalThumbs.length;
  carousel.to(current);
  updateActive(current);
});

nextBtn.addEventListener("click", () => {
  activateButton(nextBtn);
  moveTrack(1);
  current = (current + 1) % originalThumbs.length;
  carousel.to(current);
  updateActive(current);
});

carouselEl.addEventListener("slid.bs.carousel", e => {
  current = e.to;
  updateActive(current);
});

