<?php
require_once "includes/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$priceMap = [
    1 => 39.99,
    2 => 29.99
];

$total = 0;
$carritoJuegos = [];

if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $idJuego) {
        $idJuego = (int) $idJuego;

        $stmt = $conex->prepare("SELECT nombreDelJuego FROM videojuego WHERE idVideoJuego = ? LIMIT 1");
        if ($stmt) {
            $stmt->bind_param("i", $idJuego);
            $stmt->execute();
            $res = $stmt->get_result();
            $juego = $res->fetch_assoc();
            $stmt->close();

            if ($juego) {
                $precio = $priceMap[$idJuego] ?? 0;
                $total += $precio;

                $carritoJuegos[] = [
                    "nombre" => $juego["nombreDelJuego"],
                    "precio" => $precio
                ];
            }
        }
    }
}
?>

<link rel="stylesheet" href="css/payment_method.css">

<script
    src="https://www.paypal.com/sdk/js?client-id=AXbtEdXgFa6aYnLF_tmJqgCaGKMLrHb5Sr_DAz6vPBVWKSf5cBLn810lR4TEA6jn8BfzlRRu7a8y-l3G&currency=USD"></script>

<div class="payment-wrapper">
    <div class="payment-container">
        <h2>Selecciona tu método de pago</h2>

        <div id="monto" class="amount-display">
            Monto: $<?= number_format($total, 2) ?>
        </div>

        <div id="paypal-button-container"></div>

        <a href="#" id="btn-simulado" class="btn-mercadolibre payment-option" style="text-decoration:none">
            <img src="img/billetera.png" alt="8bit">
            <span>Pagar con billetera Minecraft</span>
        </a>

        <hr>

        <a href="carrito.php" style="text-decoration:none; color:green">Regresar</a>
    </div>
</div>


<script>
    document.getElementById('btn-simulado').addEventListener('click', function (e) {
        e.preventDefault();

        if (!confirm("Confirmar compra con billetera Minecraft")) return;

        fetch('empty_cart.php')
            .then(res => res.text())
            .then(res => {
                window.location.href = "succes_payment.php";
            })
            .catch(err => {
                console.error(err);
                window.location.href = "succes_payment.php";
            });
    });

    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: { value: '<?= number_format($total, 2, ".", "") ?>' }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function (details) {

                alert("Pago exitoso con PayPal");

                // Vaciar carrito
                fetch('empty_cart.php')
                    .then(() => window.location.href = "succes_payment.php");
            });
        }
    }).render('#paypal-button-container');
</script>