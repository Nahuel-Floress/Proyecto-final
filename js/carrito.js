const iconMap = {
    "PC": "bi bi-windows",
    "PC/MAC/LINUX": "bi bi-laptop",
    "Mac": "bi bi-apple",
    "Linux": "bi bi-terminal",
    "PlayStation": "bi bi-playstation",
    "Xbox": "bi bi-xbox",
    "Nintendo": "bi bi-nintendo-switch",
    "iOS": "bi bi-phone",
    "Android": "bi bi-android2"
};


const juegosData = {
    minecraft: {
        titulo: "Minecraft",
        logo: "img/logo2.png",
        plataformas: [
            "PC/MAC/LINUX",
            "PlayStation",
            "Xbox",
            "Nintendo",
            "iOS",
            "Android"
        ]
    },

    dungeons: {
        titulo: "Minecraft Dungeons",
        logo: "img/logo-dungeons.png",
        plataformas: [
            "PC",
            "PlayStation",
            "Xbox",
            "Nintendo"
        ]
    },

    legends: {
        titulo: "Minecraft Legends",
        logo: "img/logo-legends.png",
        plataformas: [
            "PC",
            "PlayStation",
            "Xbox"
        ]
    },

    education: {
        titulo: "Minecraft Education",
        logo: "img/logo-edu.png",
        plataformas: [
            "PC",
            "Mac",
            "iOS",
            "Android"
        ]
    }
};

const cards = document.querySelectorAll(".card");
const detalle = document.getElementById("juego-detalle");
const btnCerrar = document.getElementById("cerrar-detalle");


cards.forEach(card => {
    card.addEventListener("click", () => {
        const juegoID = card.dataset.juego;
        const data = juegosData[juegoID];

        document.getElementById("detalle-logo").src = data.logo;
        document.getElementById("detalle-titulo").textContent = data.titulo;

        const plataformasDiv = document.getElementById("detalle-plataformas");
        plataformasDiv.innerHTML = "";

        data.plataformas.forEach(plataforma => {
            const btn = document.createElement("button");

            const icon = document.createElement("i");
            icon.className = iconMap[plataforma] || "bi bi-question-circle";

            btn.appendChild(icon);
            btn.appendChild(document.createTextNode(plataforma));

            plataformasDiv.appendChild(btn);
        });

        const primerBtn = plataformasDiv.querySelector("button");
        if (primerBtn) primerBtn.classList.add("activo");

        detalle.classList.add("visible");
    });
});

btnCerrar.addEventListener("click", () => {
    detalle.classList.remove("visible");
});