<link rel="stylesheet" href="css/home.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<main class="container mt-5">

    <?php if ($resultadoParcial->num_rows > 0): ?>

        <div class="Titulos">
            <h1>Resultados de búsqueda</h1>
        </div>

        <div class="contenedorTarjetasPrincipales1 d-flex flex-wrap justify-content-center gap-4">
            <?php while ($juego = $resultadoParcial->fetch_assoc()): ?>
                <?php
                $img = 'img/fondo/negro.jpg';
                $buscarImg = $conex->query("SELECT url FROM imagenes_juego WHERE idVideoJuego = {$juego['idVideoJuego']} AND tipo = 'portada' LIMIT 1");
                if ($buscarImg && $buscarImg->num_rows > 0) {
                    $imgRow = $buscarImg->fetch_assoc();
                    $img = htmlspecialchars($imgRow['url']);
                }
                ?>
                <div class="card estiloDeTarjeta1">
                    <a href="store_page.php?id=<?= $juego['idVideoJuego'] ?>" style="text-decoration: none; color: white;">
                        <div class="img-flip">
                            <img src="<?= $img ?>" class="front card-img-top"
                                alt="<?= htmlspecialchars($juego['nombreDelJuego']) ?>">
                            <div class="back">
                                <?php
                                $desc = htmlspecialchars($juego['descripcion']);
                                $desc_cortada = implode(' ', array_slice(explode(' ', $desc), 0, 30)) . (str_word_count($desc) > 10 ? '...ver más' : '');
                                ?>
                                <p><?= $desc_cortada ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($juego['nombreDelJuego']) ?></h5>
                            <span class="precio-gamer">$<?= htmlspecialchars(number_format($juego['precio'], 0)) ?> pesos</span>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

    <?php else: ?>
        <script>
            alert("Búsqueda no encontrada");
            window.location.href = "home.php";
        </script>
    <?php endif; ?>

</main>