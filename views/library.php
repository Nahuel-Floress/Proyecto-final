<?php
// Archivo JSON simulando BD
$jsonFile = __DIR__ . "/library.json";

function db_get_all_games()
{
    global $jsonFile;
    if (!file_exists($jsonFile))
        return [];
    $data = json_decode(file_get_contents($jsonFile), true);
    return is_array($data) ? $data : [];
}

function db_delete_game($id)
{
    global $jsonFile;
    $games = db_get_all_games();

    if (!isset($games[$id]))
        return false;

    unset($games[$id]);
    $games = array_values($games);

    file_put_contents($jsonFile, json_encode($games, JSON_PRETTY_PRINT));
    return true;
}

// Cargar lista
$library = db_get_all_games();

// Eliminar sin header()
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {

    $id = intval($_POST["delete"]);
    db_delete_game($id);

    // Redirección sin header (no tira error)
    echo "<script>window.location.href='library.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Biblioteca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/library.css">
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

                <?php foreach ($library as $id => $game): ?>

                    <article class="game-card">

                        <div class="game-thumb">
                            <img src="<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">
                        </div>

                        <div class="game-body">

                            <h3 class="game-title"><?= htmlspecialchars($game['title']) ?></h3>

                            <!-- DESCRIPCIÓN AGREGADA -->
                            <p class="game-desc"><?= htmlspecialchars($game['description']) ?></p>

                            <p class="game-actions">
                                <a href="#" class="btn big">Jugar</a>
                            </p>

                            <form method="POST" class="delete-form" onsubmit="return confirm('¿Eliminar este juego?');">
                                <input type="hidden" name="delete" value="<?= $id ?>">
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