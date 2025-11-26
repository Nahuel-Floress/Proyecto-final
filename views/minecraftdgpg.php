<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft</title>
    <link rel="stylesheet" href="css/minecraftdgpg.css">
    <link rel="icon" type="image" href="img/icono.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="js/minecraftdgpg.js" defer></script>
</head>

<body class="juego-m">

    <div class="hero">
        <h1>MINECRAFT DUNGEONS.</h1>
        <a href="#" class="btn-mc"><span>OBTENER DUNGEONS</span></a>
    </div>


    <section class="mc-contenedor">
        <h2 class="mc-titulo">PLATAFORMAS CON MINECRAFT DUNGEONS</h2>

        <div class="mc-tabs">
            <div class="mc-tab active" data-tab="plataformas">Plataformas</div>
            <div class="mc-tab" data-tab="caracteristicas">Características</div>
        </div>

        <div id="plataformas" class="mc-seccion visible">
            <p class="mc-info">
                Minecraft Dungeons está disponible para jugar en las siguientes plataformas. <span class="mc-link">Minecraft</span>.
            </p>

            <div class="mc-plataformas-grid">

                <!-- FILA 1 -->
                <div class="mc-row">
                    <!-- WINDOWS / MAC / LINUX (especial) -->
                    <div class="mc-plat-item mc-special">
                        <i class="bi bi-display"></i>

                        <span class="mc-plat-title">WINDOWS/MAC/LINUX*</span>

                        <button class="mc-buy-btn">
                            COMPRAR AHORA
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>

                    <div class="mc-plat-item">
                        <i class="bi bi-nintendo-switch"></i>
                        <span class="mc-plat-title">Nintendo</span>
                        <i class="bi bi-arrow-right-short mc-mini-arrow"></i>
                    </div>

                    <div class="mc-plat-item">
                        <i class="bi bi-browser-chrome"></i>
                        <span class="mc-plat-title">Chromebook</span>
                        <i class="bi bi-arrow-right-short mc-mini-arrow"></i>
                    </div>
                </div>

                <!-- FILA 2 -->
                <div class="mc-row">
                    <div class="mc-plat-item">
                        <i class="bi bi-xbox"></i>
                        <span class="mc-plat-title">Xbox</span>
                        <i class="bi bi-arrow-right-short mc-mini-arrow"></i>
                    </div>

                    <div class="mc-plat-item">
                        <i class="bi bi-amazon"></i>
                        <span class="mc-plat-title">Amazon Fire</span>
                        <i class="bi bi-arrow-right-short mc-mini-arrow"></i>
                    </div>

                    <div class="mc-plat-item">
                        <i class="bi bi-apple"></i>
                        <span class="mc-plat-title">iOS</span>
                        <i class="bi bi-arrow-right-short mc-mini-arrow"></i>
                    </div>
                </div>

                <!-- FILA 3 -->
                <div class="mc-row">
                    <div class="mc-plat-item">
                        <i class="bi bi-playstation"></i>
                        <span class="mc-plat-title">Playstation</span>
                        <i class="bi bi-arrow-right-short mc-mini-arrow"></i>
                    </div>

                    <div class="mc-plat-item">
                        <i class="bi bi-android"></i>
                        <span class="mc-plat-title">Android</span>
                        <i class="bi bi-arrow-right-short mc-mini-arrow"></i>
                    </div>

                    <div class="mc-plat-empty"></div>
                </div>

            </div>
        </div>

        <div id="caracteristicas" class="mc-seccion">
            <h3 class="mc-tabla-title">
                Compara las características clave de Minecraft Bedrock Edition y Java Edition.
            </h3>

            <table class="mc-tabla">
                <thead>
                    <tr>
                        <th class="mc-th-vacio"></th>
                        <th>Java</th>
                        <th>Bedrock</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td class="mc-caract-name">
                            Compatibilidad entre plataformas
                            <span class="mc-info-icon">?</span>
                        </td>
                        <td class="mc-desc">Juego multiplataforma con Windows, Mac y Linux</td>
                        <td class="mc-desc">Juego multiplataforma con Windows 10, Windows 11, Xbox, Nintendo Switch, PS5
                            y móviles</td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">
                            Multijugador en pantalla dividida
                            <span class="mc-sub-info">(Disponible únicamente en consolas)</span>
                            <span class="mc-info-icon">?</span>
                        </td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">
                            Compatibilidad con función táctil/controlador
                            <span class="mc-info-icon">?</span>
                        </td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Marketplace de Minecraft <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Marketplace Pass <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Contenido descargable (DLC) <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Mods <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                        <td><span class="mc-icon-no">✖</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">
                            Servidores multijugador oficiales
                            <span class="mc-sub-info">(requiere suscripción adicional)</span>
                            <span class="mc-info-icon">?</span>
                        </td>
                        <td><span class="mc-icon-yes">✔</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Realms <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Realms Plus <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Hospedar tu propio servidor <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Unirse a servidores hospedados por jugadores <span
                                class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Logros / Trofeos <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Multijugador en LAN o WiFi <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Control parental <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                    <tr>
                        <td class="mc-caract-name">Trazado de rayos (Ray Tracing) <span class="mc-info-icon">?</span>
                        </td>
                        <td><span class="mc-icon-no">✖</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </section>


    <section class="minecraft-section text-center text-white">

        <h1 class="minecraft-title">
            DESCUBRE EL MUNDO DE <br>
            <span>MINECRAFT</span>
        </h1>

        <p class="description">
            Crea todo que puedas imaginar, descubre misterios espeluznantes y sobrevive en la noche en el juego
            de aventura tipo sandbox definitivo. Cada partida es distinta y te esperan aventuras inolvidables.
        </p>

        <div class="carousel-text-layout">
            <div class="carousel-wrapper">

                <div id="principalCarousel" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/LuminousNight.jpeg" class="carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/CloudyClimb.jpeg" class="carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/UltimateDLC.jpeg" class="carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/UltimateEdition.jpeg" class="carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/SeasonalAdventure.jpeg" class="carousel-img">
                        </div>
                    </div>
                </div>

                <div class="arrows-miniaturas-container">
                    <button class="arrow-miniaturas-btn arrow-prev" type="button" aria-label="Anterior">
                        <span class="btn-arrow arrow-left-miniatura"></span>
                    </button>
                    <button class="arrow-miniaturas-btn arrow-next" type="button" aria-label="Siguiente">
                        <span class="btn-arrow arrow-right-miniatura"></span>
                    </button>
                </div>

                <p class="subtitulo">
                    Construye enormes asentamientos o una sencilla choza.<br>
                    ¡El mundo está en tus manos para darle forma!
                </p>

            </div>
        </div>

        <div class="thumbs-container mt-4">
            <div class="thumbs-track">
                <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/LuminousNight.jpeg" class="thumb" data-index="0">
                <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/CloudyClimb.jpeg" class="thumb" data-index="1">
                <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/UltimateDLC.jpeg" class="thumb" data-index="2">
                <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/UltimateEdition.jpeg" class="thumb" data-index="3">
                <img src="https://www.minecraft.net/content/dam/minecraftnet/games/dungeons/key-art/SeasonalAdventure.jpeg" class="thumb" data-index="4">
            </div>
        </div>

    </section>







</body>

</html>