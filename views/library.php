<?php
// ======================================================================
// SISTEMA DE BIBLIOTECA PREPARADO PARA BASE DE DATOS
// (Actualmente simula una DB usando JSON, pero la lógica ya es estilo SQL)
// ======================================================================

// Archivo usado mientras NO exista la BD real
$jsonFile = __DIR__ . "/library.json";

// ---------------------------
// Funciones estilo base de datos
// ---------------------------

// Traer todos los juegos
function db_get_all_games()
{
    global $jsonFile;

    if (!file_exists($jsonFile)) return [];

    $data = json_decode(file_get_contents($jsonFile), true);
    return is_array($data) ? $data : [];
}

// Eliminar un juego por ID
function db_delete_game($id)
{
    global $jsonFile;

    $games = db_get_all_games();

    if (!isset($games[$id])) return false;

    unset($games[$id]);
    $games = array_values($games);

    file_put_contents($jsonFile, json_encode($games, JSON_PRETTY_PRINT));
    return true;
}

// ======================================================================
// CARGAR BIBLIOTECA
// ======================================================================

$library = db_get_all_games();

// ======================================================================
// ELIMINAR JUEGO
// ======================================================================

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {

    $id = intval($_POST["delete"]);

    db_delete_game($id);

    header("Location: library.php");
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

                <?php foreach (array_reverse($library) as $revIndex => $game):

                    // Calcular ID original como si fuera una BD con IDs
                    $originalIndex = count($library) - 1 - $revIndex;

                    ?>

                    <article class="game-card">

                        <div class="game-thumb">
                            <img src="<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">
                        </div>

                        <div class="game-body">

                            <h3 class="game-title"><?= htmlspecialchars($game['title']) ?></h3>

                            <div class="game-meta">
                                <span class="game-date">
                                    <i class="bi bi-calendar-event"></i>
                                    <?= htmlspecialchars($game['date']) ?>
                                </span>
                                <span class="game-badge">Comprado</span>
                            </div>

                            <p class="game-desc"><?= htmlspecialchars($game['description']) ?></p>

                            <p class="game-actions">
                                <a href="#" class="btn small">Jugar</a>
                                <a href="#" class="btn outline small">Detalles</a>
                            </p>

                            <!-- BOTÓN ELIMINAR -->
                            <form method="POST" class="delete-form" onsubmit="return confirm('¿Eliminar este juego?');">
                                <input type="hidden" name="delete" value="<?= $originalIndex ?>">
                                <button class="btn delete small" type="submit">
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
