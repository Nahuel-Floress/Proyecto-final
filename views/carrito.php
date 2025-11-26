<?php

require_once "includes/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificamos conexión
if (!isset($conex) || !$conex) {
    die("Error: Conexión a la base de datos no establecida.");
}

/*
  PRECIOS EXACTOS SEGÚN cart.php
  idVideoJuego => precio
*/
$priceMap = [
    1 => 39.99,   // Deluxe PC Collection (cart.php)
    2 => 29.99    // Standard PC Edition (si más adelante lo usas)
];

$total = 0.00;

// Variables para feedback tras eliminación
$deletedId = null;
$deletedName = null;

/* ===========================
   ELIMINAR ITEM DEL CARRITO
   =========================== */
if (isset($_GET['remove'])) {
    $idJuego = (int) $_GET['remove'];

    // Intentamos obtener nombre antes de eliminar para mostrar feedback
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

        // Eliminamos del carrito en sesión
        $_SESSION['cart'] = array_filter($_SESSION['cart'], fn($id) => (int) $id !== $idJuego);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        $deletedId = $idJuego;
        // no usamos header() ni exit; simplemente renderizamos la página actualizada
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

                        // Traer solo el nombre desde la base
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

                        // Precio basado en cart.php
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

            // Si no existe el contenedor (carrito vacío) no hacemos nada
            if (!cestaItems) return;

            cestaItems.addEventListener('click', e => {
                // Buscamos que el click sea en un botón eliminar (o dentro de él)
                const btn = e.target.closest('.btn-eliminar');
                if (!btn) return;

                const item = btn.closest('.item-carrito');
                if (!item) return;

                const idJuego = item.dataset?.id;
                if (!idJuego) return;

                // Confirmación antes de eliminar
                const nombre = item.querySelector('.nombre')?.textContent || 'este producto';
                const confirma = confirm(`¿Estás seguro que querés eliminar "${nombre}" del carrito?`);
                if (!confirma) return;

                // Redirigimos para eliminar en el servidor (se procesará y la página se renderizará sin header())
                window.location.href = 'carrito.php?remove=' + encodeURIComponent(idJuego);
            });
        });

        // Si el servidor eliminó un item, mostramos un alert opcional de feedback
        <?php if ($deletedId !== null): ?>
                (function () {
                    const name = <?= json_encode($deletedName ?? "Producto") ?>;
                    // Mensaje breve de confirmación
                    alert(`"${name}" fue eliminado del carrito.`);
                    // opcional: podríamos hacer scroll al top o otra acción
                    window.history.replaceState({}, document.title, "carrito.php"); // limpiar querystring del navegador
                })();
        <?php endif; ?>
    </script>

</body>

</html>