<link rel="stylesheet" href="css/comprarAhora.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
<script src="js/comprarAhora.js" defer></script>


<section class="juegos">
    <h2>Elige tu juego</h2>
    <p>Explora diferentes ediciones y sumérgete en el mundo que más adapte a tu estilo de juego.</p>

    <div class="grid-juegos">

        <div class="card" data-juego="minecraft">
            <img src="img/minecraft-img-card1.jpg" alt="Tarjeta1">
            <h3>Minecraft</h3>
            <p>Sandbox de supervivencia, aventura<br>Un solo jugador + multijugador</p>
            <span class="separator"></span>
            <div class="icons">
                <i class="bi bi-windows"></i>
                <i class="bi bi-playstation"></i>
                <i class="bi bi-xbox"></i>
                <i class="bi bi-nintendo-switch"></i>
                <i class="bi bi-apple"></i>
                <i class="bi bi-android2"></i>
            </div>
        </div>

        <div class="card" data-juego="dungeons">
            <img src="img/minecraft-img-card2.jpg" alt="Tarjeta2">
            <h3>Minecraft Dungeons</h3>
            <p>Exploración de mazmorras, RPG de acción<br>Un solo jugador + multijugador</p>
            <span class="separator"></span>
            <div class="icons">
                <i class="bi bi-windows"></i>
                <i class="bi bi-playstation"></i>
                <i class="bi bi-xbox"></i>
                <i class="bi bi-nintendo-switch"></i>
            </div>
        </div>

        <div class="card" data-juego="legends">
            <img src="img/minecraft-img-card3.jpg" alt="Tarjeta3">
            <h3>Minecraft Legends</h3>
            <p>RPG de acción, estrategia<br>Un solo jugador + multijugador</p>
            <span class="separator"></span>
            <div class="icons">
                <i class="bi bi-windows"></i>
                <i class="bi bi-playstation"></i>
                <i class="bi bi-xbox"></i>
            </div>
        </div>

        <div class="card" data-juego="bundle">
            <img src="img/minecraft-triple-bundle.jpg" alt="Tarjeta4">
            <h3>Minecraft Triple Bundle</h3>
            <p>Educación, sandbox de supervivencia<br>Un solo jugador + multijugador</p>
            <span class="separator"></span>
            <div class="icons">
                <i class="bi bi-windows"></i>
                <i class="bi bi-apple"></i>
                <i class="bi bi-android2"></i>
            </div>
        </div>

    </div>
</section>

<section id="juego-detalle" class="detalle hidden">
    <button id="cerrar-detalle">X</button>

    <img id="detalle-logo" alt="Logo juego">
    <h2 id="detalle-titulo"></h2>

    <h3>Selecciona tu plataforma</h3>
    <div id="detalle-plataformas" class="plataformas"></div>
    <span class=>Mac y Linux solo son compatibles con Java Edition.</span>
</section>

<div class="suscripciones-wrapper">

    <div class="suscripciones-titulo">
        <div class="titulo-texto">SUSCRIPCIONES</div>
        <div class="subtitulo-texto">
            ¡Mejora tu experiencia con contenido adicional y nuevas formas de jugar con tus amigos!
        </div>
    </div>

    <div class="suscripciones-imagen-fondo">
        <img src="img/marketplace.webp" alt="marketplace pass">
    </div>

    <div class="suscripciones-contenido">

        <div class="suscripciones-derecha">

            <div class="suscripciones-title-big">MARKETPLACE PASS</div>

            <div class="suscripciones-parrafo">
                ¡Juega a más de 150 juegos de contenido emocionante por un precio al mes muy bajo con Marketplace
                Pass!
                Sumérgete en mundos, popurrís, paquetes de aspectos, paquetes de textura y más.
                Con nuevos contenidos cada mes, siempre hay algo nuevo para jugar con Marketplace Pass.
            </div>

            <div class="suscripciones-boton">
                CONSULTA DETALLES DE LA SUSCRIPCIÓN →
            </div>

            <div class="suscripciones-nota">
                Gratis durante 30 días y después 3,99 $/mes
            </div>

        </div>

    </div>

</div>

<section class="realms-wrapper">
    <img src="img/marketplace2.avif" alt="Personajes Realms" class="realms-personajes">

    <div class="realms-contenido">
        <h2 class="realms-titulo">
            COMPARTIR EL CONTENIDO CON LA<br>
            SUSCRIPCIÓN A REALMS
        </h2>

        <p class="realms-parrafo">
            Administra tu propio servidor de Minecraft y comparte tus objetos de Marketplace Pass con hasta 10
            amigos.
            Tú pones las reglas: quién puede unirse y cómo jugar. Los miembros juegan gratis, incluso cuando estés
            desconectado.
            Fácil de configurar, gestionar y acceder desde cualquier dispositivo.
        </p>

        <a class="realms-boton">
            CONSULTA DETALLES DE LA SUSCRIPCIÓN →
        </a>
    </div>
</section>