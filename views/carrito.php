<?php

require_once "includes/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($conex) || !$conex) {
    die("Error: Conexión a la base de datos no establecida.");
}
$priceMap = [
    1 => 39.99,  
    2 => 29.99    
];

$total = 0.00;

$deletedId = null;
$deletedName = null;

if (isset($_GET['remove'])) {
    $idJuego = (int) $_GET['remove'];

    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && in_array($idJuego, array_map('intval', $_SESSION['cart']), true)) {
        $stmtName = $conex->prepare("SELECT nombreDelJuego FROM videojuego WHERE idVideoJuego = ? LIMIT 1");
        if ($stmtName) {
            $stmtName->bind_param("i", $idJuego);
            $stmtName->execute();
            $resName = $stmtName->get_result();
            $rowName = $resName->fetch_assoc();
            $stmtName->close();
            if ($rowName && !empty($rowName['nombreDelJuego'])) {
                $deletedName = $rowName['nombreDelJuego'];
            }
        }

        $_SESSION['cart'] = array_filter($_SESSION['cart'], fn($id) => (int) $id !== $idJuego);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        $deletedId = $idJuego;
    }
}

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="css/carrito.css">
</head>

<body>

    <div class="carrito-container">
        <div class="cesta">
            <h2>Tu Carrito</h2>

            <?php if (empty($_SESSION['cart']) || !is_array($_SESSION['cart'])): ?>
                <div class="cesta-vacia">
                    <div class="icono-carrito">🛒</div>
                    <h3>Tu carrito está vacío</h3>
                    <p>Agrega productos para comenzar tu compra</p>
                </div>
            <?php else: ?>
                <div class="cesta-items" id="cesta-items">
                    <?php
                    foreach ($_SESSION['cart'] as $idJuego):
                        $idJuego = (int) $idJuego;

                        $stmt = $conex->prepare("
                            SELECT nombreDelJuego 
                            FROM videojuego 
                            WHERE idVideoJuego = ? LIMIT 1
                        ");

                        if (!$stmt)
                            continue;

                        $stmt->bind_param("i", $idJuego);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        $juego = $res->fetch_assoc();
                        $stmt->close();

                        if (!$juego)
                            continue;

                        $precio = $priceMap[$idJuego] ?? 0.00;
                        $total += $precio;
                        ?>
                        <div class="item-carrito d-flex justify-content-between align-items-center mb-2 p-2 bg-dark text-light rounded"
                            data-id="<?= htmlspecialchars((string) $idJuego, ENT_QUOTES) ?>">

                            <span class="nombre"><?= htmlspecialchars($juego['nombreDelJuego'], ENT_QUOTES) ?></span>

                            <div class="item-actions">
                                <span class="precio">$<?= number_format($precio, 2) ?></span>
                                <button class="btn btn-sm btn-danger btn-eliminar" type="button"
                                    aria-label="Eliminar">Eliminar</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="resumen">
            <h2>Resumen</h2>
            <p id="total">Total: $<?= number_format($total, 2) ?></p>

            <?php if (empty($_SESSION['cart']) || !is_array($_SESSION['cart'])): ?>
                <button class="btn-siguiente" disabled>Siguiente</button>
            <?php else: ?>
                <a href="payment_method.php" class="seguir"><button class="btn-siguiente">Siguiente</button></a>
            <?php endif; ?>

            <a href="comprarAhora.php" class="seguir">Seguir comprando</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cestaItems = document.getElementById('cesta-items');

            if (!cestaItems) return;

            cestaItems.addEventListener('click', e => {

                const btn = e.target.closest('.btn-eliminar');
                if (!btn) return;

                const item = btn.closest('.item-carrito');
                if (!item) return;

                const idJuego = item.dataset?.id;
                if (!idJuego) return;

                const nombre = item.querySelector('.nombre')?.textContent || 'este producto';
                const confirma = confirm(`¿Estás seguro que querés eliminar "${nombre}" del carrito?`);
                if (!confirma) return;

                window.location.href = 'carrito.php?remove=' + encodeURIComponent(idJuego);
            });
        });

        <?php if ($deletedId !== null): ?>
                (function () {
                    const name = <?= json_encode($deletedName ?? "Producto") ?>;
                    alert(`"${name}" fue eliminado del carrito.`);
                    window.history.replaceState({}, document.title, "carrito.php");
                })();
        <?php endif; ?>
    </script>

</body>

</html>