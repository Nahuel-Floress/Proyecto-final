<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft</title>
    <link rel="stylesheet" href="css/minecrafteducation.css">
    <link rel="icon" type="image" href="img/icono.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="js/minecrafteducation.js" defer></script>
</head>

<body class="juego-m">

    <div class="hero">
        <h1>MINECRAFT EDUCATION</h1>
        <a href="#" class="btn-mc"><span>OBTENER EDUCATION</span></a>    
    </div>


    <section class="mc-contenedor">
        <h2 class="mc-titulo">PLATAFORMAS CON MINECRAFT EDUCATION</h2>

        <div class="mc-tabs">
            <div class="mc-tab active" data-tab="plataformas">Plataformas</div>
        </div>

        <div id="plataformas" class="mc-seccion visible">
            <p class="mc-info">
                Minecraft EDUCATION está disponible para jugar en las siguientes plataformas. <span class="mc-link">Minecraft</span>.
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

       
    </section>


    <section class="minecraft-section text-center text-white">

        <h1 class="minecraft-title">
            DESCUBRE EL MUNDO DE <br>
            <span>MINECRAFT EDUCATION</span>
        </h1>

        <p class="description">
         Descubra nuevos y emocionantes recursos didácticos y novedades sobre productos.


        </p>

        <div class="carousel-text-layout">
            <div class="carousel-wrapper">

                <div id="principalCarousel" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://education.minecraft.net/content/dam/education-edition/key-art/MCEDU_HOAI_TFN_New_and_Noteworthy_553x400.png" class="carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src="https://education.minecraft.net/content/dam/education-edition/key-art/MCEDU_Reed_Smart_AI_Detective_Minecraft_Education_Web_New_and_Noteworthy_553x400.png" class="carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src="https://education.minecraft.net/content/dam/education-edition/key-art/MCEDU_PBL.png" class="carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src="https://education.minecraft.net/content/dam/education-edition/photography/Homepage_Stacking-Card-0_01_800x600.jpg" class="carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src="https://education.minecraft.net/content/dam/education-edition/photography/Homepage_Stacking-Card-0_02_800x600.jpg" class="carousel-img">
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
                <img src="https://education.minecraft.net/content/dam/education-edition/key-art/MCEDU_HOAI_TFN_New_and_Noteworthy_553x400.png" class="thumb" data-index="0">
                <img src="https://education.minecraft.net/content/dam/education-edition/key-art/MCEDU_Reed_Smart_AI_Detective_Minecraft_Education_Web_New_and_Noteworthy_553x400.png" class="thumb" data-index="1">
                <img src="https://education.minecraft.net/content/dam/education-edition/key-art/MCEDU_PBL.png" class="thumb" data-index="2">
                <img src="https://education.minecraft.net/content/dam/education-edition/photography/Homepage_Stacking-Card-0_01_800x600.jpg" class="thumb" data-index="3">
                <img src="https://education.minecraft.net/content/dam/education-edition/photography/Homepage_Stacking-Card-0_02_800x600.jpg" class="thumb" data-index="4">
            </div>
        </div>

    </section>







</body>

</html>