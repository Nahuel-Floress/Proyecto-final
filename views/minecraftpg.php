<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft</title>
    <link rel="stylesheet" href="css/minecraft-pg.css">
    <link rel="icon" type="image" href="img/icono.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="js/minecraft-pg.js" defer></script>
</head>

<body class="juego-m">

    <div class="hero">
        <h1>CREA. EXPLORA. SOBREVIVE.</h1>
        <a href="#" class="btn-mc"><span>EXCAVA A MÁS PROFUNDIDAD</span></a>
    </div>


    <section class="mc-contenedor">
        <h2 class="mc-titulo">PLATAFORMAS CON MINECRAFT + FUNCIONALIDADES DEL JUEGO</h2>

        <div class="mc-tabs">
            <div class="mc-tab active" data-tab="plataformas">Plataformas</div>
            <div class="mc-tab" data-tab="caracteristicas">Características</div>
        </div>

        <div id="plataformas" class="mc-seccion visible">
            <p class="mc-info">
                Compra Minecraft: Java & Bedrock Edition* y obtén ambas versiones del juego por el precio de una.
                Podrás cambiar fácilmente entre Java y Bedrock Edition gracias al <span class="mc-link">iniciador</span>
                unificado y jugar entre
                las versiones actuales de Minecraft, incluidos las consolas y los dispositivos móviles.
                Más información sobre las distintas ediciones de <span class="mc-link">Minecraft</span>.
            </p>
            <p class="mc-info-small">* macOS y Linux son compatibles solo con Minecraft: Java Edition.</p>

            <div class="mc-plataformas-grid">

                <div class="mc-row">
                    <div class="mc-plat-item mc-plat-main">
                        <div class="mc-plat-content">
                            <i class="bi bi-windows"></i>
                            <span>WINDOWS/MAC/LINUX*</span>
                        </div>
                        <a class="mc-plat-btn" href="#">
                            COMPRAR<br>AHORA
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <div class="mc-plat-item">
                        <i class="bi bi-nintendo-switch"></i>
                        <span>NINTENDO</span>
                        <span class="mc-plat-arrow-icon"><i class="bi bi-chevron-right"></i></span>
                    </div>
                    <div class="mc-plat-item">
                        <i class="bi bi-google"></i>
                        <span>CHROMEBOOK</span>
                        <span class="mc-plat-arrow-icon"><i class="bi bi-chevron-right"></i></span>
                    </div>
                </div>

                <div class="mc-row">
                    <div class="mc-plat-item">
                        <i class="bi bi-xbox"></i>
                        <span>XBOX</span>
                        <span class="mc-plat-arrow-icon"><i class="bi bi-chevron-right"></i></span>
                    </div>
                    <div class="mc-plat-item">
                        <i class="bi bi-fire"></i>
                        <span>AMAZON FIRE</span>
                        <span class="mc-plat-arrow-icon"><i class="bi bi-chevron-right"></i></span>
                    </div>
                    <div class="mc-plat-item">
                        <i class="bi bi-apple"></i>
                        <span>IOS</span>
                        <span class="mc-plat-arrow-icon"><i class="bi bi-chevron-right"></i></span>
                    </div>
                </div>

                <div class="mc-row mc-row-last">
                    <div class="mc-plat-item">
                        <i class="bi bi-playstation"></i>
                        <span>PLAYSTATION</span>
                        <span class="mc-plat-arrow-icon"><i class="bi bi-chevron-right"></i></span>
                    </div>
                    <div class="mc-plat-item">
                        <i class="bi bi-android"></i>
                        <span>ANDROID</span>
                        <span class="mc-plat-arrow-icon"><i class="bi bi-chevron-right"></i></span>
                    </div>
                    <div class="mc-plat-item mc-plat-empty"></div>
                </div>
            </div>
        </div>

        <div id="caracteristicas" class="mc-seccion">
            <h3 class="mc-tabla-title">Compara las características clave de Minecraft Bedrock Edition y Java Edition.
            </h3>

            <table class="mc-tabla">
                <thead>
                    <tr>
                        <th></th>
                        <th>Java</th>
                        <th>Bedrock</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="mc-caract-name">Compatibilidad entre plataformas</td>
                        <td class="mc-caract-desc-java">Juego multiplataforma con Windows, Mac y Linux</td>
                        <td class="mc-caract-desc-bedrock">Juego multiplataforma con Windows 10, Windows 11, Xbox,
                            Nintendo Switch, PS5 y dispositivos móviles</td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Multijugador en pantalla dividida <span
                                class="mc-sub-info">(Disponible únicamente en consolas)</span> <span
                                class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">❌</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Compatibilidad con función táctil/controlador <span
                                class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">❌</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Marketplace de Minecraft <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">❌</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Marketplace Pass <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">❌</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Contenido descargable (DLC) <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">❌</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Mods <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                        <td><span class="mc-icon-no">❌</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Servidores multijugador destacados oficiales <span
                                class="mc-sub-info">(al modo multijugador en línea requiere una suscripción que se vende
                                por separado)</span> <span class="mc-info-icon">?</span></td>
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
                        <td><span class="mc-icon-no">❌</span></td>
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
                        <td><span class="mc-icon-no">❌</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Multijugador en LAN o WiFi <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Control parental con Xbox Live o cuentas de Microsoft <span
                                class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">❌</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                    <tr>
                        <td class="mc-caract-name">Trazado de rayos <span class="mc-info-icon">?</span></td>
                        <td><span class="mc-icon-no">❌</span></td>
                        <td><span class="mc-icon-yes">✔</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>