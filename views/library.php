<?php
require_once "includes/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['IDusuario']) || empty($_SESSION['IDusuario'])) {
    echo "<script>window.location.href='views/login.php';</script>";
    exit;
}

$IDusuario = intval($_SESSION['IDusuario']);

if (!isset($conex) || !($conex instanceof mysqli)) {
    echo "<!doctype html><html><body><h2>Error: Conexión a la base de datos no encontrada.</h2></body></html>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $idBiblioteca = intval($_POST['delete']);
    $stmt = $conex->prepare("DELETE FROM biblioteca WHERE idBiblioteca = ? AND IDusuario = ?");
    if ($stmt) {
        $stmt->bind_param("ii", $idBiblioteca, $IDusuario);
        $stmt->execute();
        $stmt->close();
    }
    echo "<script>window.location.href='library.php';</script>";
    exit;
}

$stmt = $conex->prepare("
    SELECT 
        b.idBiblioteca,
        v.nombreDelJuego,
        v.descripcion,
        COALESCE((SELECT url FROM imagenes_juego i WHERE i.idVideoJuego = v.idVideoJuego AND i.tipo = 'portada' LIMIT 1), 'img/juegoDefault.jpg') AS imagen
    FROM biblioteca b
    JOIN videojuego v ON v.idVideoJuego = b.idVideoJuego
    WHERE b.IDusuario = ?
    ORDER BY b.idBiblioteca DESC
");

$library = [];
if ($stmt) {
    $stmt->bind_param("i", $IDusuario);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res)
        $library = $res->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Mi Biblioteca</title>
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

    <div class="principal">
        <h1>Mi Biblioteca</h1>
        <div class="lib-nav">
            <a href="home.php" class="nav-link"><i class="bi bi-arrow-left-circle"></i> Volver a tienda</a>
            <a href="library.php" class="nav-link active"><i class="bi bi-collection"></i> Biblioteca</a>
        </div>
    </div>

    <main class="library-container">
        <section class="library-intro">
            <h2>Tus juegos comprados</h2>
            <p class="muted">Todos los juegos comprados aparecen aquí.</p>
        </section>

        <?php if (empty($library)): ?>
            <div class="empty">
                <p>No hay juegos en tu biblioteca aún.</p>
                <a href="home.php" class="btn-ghost">Ir a la tienda</a>
            </div>
        <?php else: ?>
            <section class="grid">
                <?php foreach ($library as $game):
                    $img = !empty($game['imagen']) ? $game['imagen'] : 'img/juegoDefault.jpg';
                    $title = htmlspecialchars($game['nombreDelJuego']);
                    $desc = htmlspecialchars($game['descripcion']);
                    $idBib = intval($game['idBiblioteca']);
                    ?>
                    <article class="game-card">
                        <div class="game-thumb">
                            <img src="<?= $img ?>" alt="<?= $title ?>">
                        </div>
                        <div class="game-body">
                            <h3 class="game-title"><?= $title ?></h3>
                            <p class="game-desc"><?= $desc ?></p>
                            <p class="game-actions">
                                <a href="#" class="btn big">Jugar</a>
                            </p>

                            <form method="POST" class="delete-form" onsubmit="return confirm('¿Eliminar este juego?');">
                                <input type="hidden" name="delete" value="<?= $idBib ?>">
                                <button class="btn delete big" type="submit">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </article>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
    </main>

</body>

</html>