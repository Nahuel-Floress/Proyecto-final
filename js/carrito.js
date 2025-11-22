const iconMap = {
  "PC/MAC/LINUX": "bi bi-laptop",
  "CHROMEBOOK": "bi bi-browser-chrome",
  "iOS": "bi bi-apple",
  "Android": "bi bi-android2",
  "Xbox": "bi bi-xbox",
  "PlayStation": "bi bi-playstation",
  "Nintendo": "bi bi-nintendo-switch",
  "Amazon Fire": "bi bi-amazon",
  "Steam": "bi bi-steam"
};

const ordenPlataformas = [
  "PC/MAC/LINUX",
  "CHROMEBOOK",
  "iOS",
  "Android",
  "PlayStation",
  "Nintendo",
  "Amazon Fire",
  "Xbox",
  "Steam"
];

const juegosData = {
  minecraft: {
    logo: "img/logo2.png",
    texto: true,
    textoPersonalizado: "Mac y Linux solo son compatibles con Java Edition.",
    plataformas: [
      "PC/MAC/LINUX",
      "CHROMEBOOK",
      "iOS",
      "Android",
      "PlayStation",
      "Nintendo",
      "Amazon Fire",
      "Xbox"
    ]
  },

  dungeons: {
    logo: "img/logodungeons.avif",
    texto: false,
    plataformas: [
      "PC/MAC/LINUX",
      "Xbox",
      "PlayStation",
      "Nintendo",
      "Steam"
    ]
  },

  legends: {
    logo: "img/logolegends.avif",
    texto: false,
    plataformas: [
      "PC/MAC/LINUX",
      "Xbox",
      "PlayStation",
      "Steam"
    ]
  },

  bundle: {
    logo: "img/logobundles.avif",
    texto: true,
    plataformas: [
      "PC/MAC/LINUX",
      "CHROMEBOOK",
      "iOS",
      "Android"
    ]
  }
};

const cards = document.querySelectorAll(".card");
const detalle = document.getElementById("juego-detalle");
const btnCerrar = document.getElementById("cerrar-detalle");
const plataformasDiv = document.getElementById("detalle-plataformas");
const mensajeSpan = detalle.querySelector("span");

(function injectStyles() {
  const css = `
    .card { position: relative; }

    .card.selected {
      outline: 2px solid rgba(90,200,255,1);
      box-shadow:
        0 0 12px rgba(40,170,255,1),
        0 0 25px rgba(40,170,255,0.8),
        inset 0 0 6px rgba(110,210,255,0.6);
      transition: 150ms ease;
    }

    .card.selected::after {
      content: "";
      position: absolute;
      inset: 4px;
      border: 1px solid rgba(110,210,255,0.9);
      box-shadow: inset 0 0 8px rgba(110,210,255,0.7);
      pointer-events: none;
      border-radius: 4px;
    }

    #cerrar-detalle.selected {
      color: #b4ecff;
      text-shadow:
        0 0 6px rgba(120,200,255,1),
        0 0 20px rgba(80,170,255,0.9);
      transition: 150ms ease;
    }

    #juego-detalle.animar-tarjeta {
      opacity: 0;
      transform: translateY(35px);
      transition: opacity .35s ease, transform .35s ease;
    }
    #juego-detalle.visible {
      opacity: 1;
      transform: translateY(0);
    }
  `;
  const s = document.createElement("style");
  s.textContent = css;
  document.head.appendChild(s);
})();

let overlay = null;

function crearOverlay() {
  if (overlay) return;

  overlay = document.createElement("div");
  overlay.id = "dark-overlay-mc";
  Object.assign(overlay.style, {
    position: "fixed",
    inset: "0",
    background: "rgba(0,0,0,0.55)",
    zIndex: "999998",
    opacity: "0",
    transition: "opacity 200ms ease"
  });

  document.body.appendChild(overlay);
  requestAnimationFrame(() => overlay.style.opacity = "1");

  overlay.addEventListener("click", () => cerrarTodo(true));
}

function eliminarOverlay() {
  if (!overlay) return;

  overlay.style.opacity = "0";
  setTimeout(() => {
    overlay?.remove();
    overlay = null;
  }, 200);
}

function bloquearScroll() {
  document.documentElement.style.overflow = "hidden";
  document.body.style.overflow = "hidden";
}

function desbloquearScroll() {
  document.documentElement.style.overflow = "";
  document.body.style.overflow = "";
}

function renderPlataformas(plataformas) {
  plataformasDiv.innerHTML = "";

  plataformas.forEach(plataforma => {
    const btn = document.createElement("button");
    const icon = document.createElement("i");
    icon.className = iconMap[plataforma];

    let textoFinal = plataforma;

    if (
      plataforma === "PC/MAC/LINUX" &&
      detalle.classList.contains("modo-grande")
    ) {
      textoFinal = "Windows";
    }

    btn.appendChild(icon);
    btn.appendChild(document.createTextNode(" " + textoFinal));
    plataformasDiv.appendChild(btn);
  });

  const primerBtn = plataformasDiv.querySelector("button");
  if (primerBtn) primerBtn.classList.add("activo");
}

let selectedCard = null;

function setCardSelected(card) {
  if (selectedCard && selectedCard !== card) {
    selectedCard.classList.remove("selected");
  }
  selectedCard = card;
  selectedCard.classList.add("selected");
}

function clearCardSelection() {
  if (selectedCard) {
    selectedCard.classList.remove("selected");
    selectedCard = null;
  }
}

cards.forEach(card => {
  card.addEventListener("click", ev => {
    ev.stopPropagation();

    setCardSelected(card);
    btnCerrar.classList.add("selected");

    const juegoID = card.dataset.juego;
    const data = juegosData[juegoID];

    document.getElementById("detalle-logo").src = data.logo;
    mensajeSpan.textContent = data.textoPersonalizado || "";
    mensajeSpan.style.display = data.texto ? "block" : "none";

    detalle.classList.remove("modo-pequeno", "modo-grande");
    detalle.classList.add(juegoID === "minecraft" ? "modo-pequeno" : "modo-grande");

    renderPlataformas(
      ordenPlataformas.filter(p => data.plataformas.includes(p))
    );

    detalle.classList.add("animar-tarjeta");
    void detalle.offsetWidth;
    detalle.classList.add("visible");

    detalle.style.zIndex = "999999";
    crearOverlay();
    bloquearScroll();

    setTimeout(() => detalle.classList.remove("animar-tarjeta"), 400);
  });
});

function cerrarTodo(preservarSeleccion = true) {
  detalle.classList.remove("visible");
  btnCerrar.classList.remove("selected");

  if (!preservarSeleccion) clearCardSelection();

  desbloquearScroll();
  eliminarOverlay();
}

btnCerrar.addEventListener("click", e => {
  e.stopPropagation();
  cerrarTodo(true);
});

detalle.addEventListener("click", ev => {
  ev.stopPropagation();
  btnCerrar.classList.remove("selected");
});

document.addEventListener("click", e => {
  const clickEnCard = e.target.closest(".card");

  if (detalle.classList.contains("visible")) {
    if (!detalle.contains(e.target) && !clickEnCard && e.target !== btnCerrar) {
      cerrarTodo(true);
    }
    return;
  }

  if (!clickEnCard && e.target !== btnCerrar) {
    clearCardSelection();
  }
});
