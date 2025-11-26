<?php
require_once "includes/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['IDusuario']) || empty($_SESSION['IDusuario'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}

$IDusuario = intval($_SESSION['IDusuario']);

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
                    "id" => $idJuego,
                    "nombre" => $juego["nombreDelJuego"],
                    "precio" => $precio
                ];
            }
        }
    }
}

function guardarEnBiblioteca($conex, $IDusuario, $carritoJuegos)
{
    foreach ($carritoJuegos as $juego) {
        $idJuego = intval($juego['id']);

        $check = $conex->prepare("SELECT idBiblioteca FROM biblioteca WHERE IDusuario=? AND idVideoJuego=? LIMIT 1");
        $check->bind_param("ii", $IDusuario, $idJuego);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows == 0) {
            $insert = $conex->prepare("INSERT INTO biblioteca (IDusuario, idVideoJuego) VALUES (?, ?)");
            $insert->bind_param("ii", $IDusuario, $idJuego);
            $insert->execute();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['wallet'])) {

    guardarEnBiblioteca($conex, $IDusuario, $carritoJuegos);

    unset($_SESSION['cart']);

    echo "<script>
        alert('Compra exitosa, que tenga un buen día.');
        window.location.href='succes_payment.php';
    </script>";
    exit;
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

        <form method="POST">
            <input type="hidden" name="wallet" value="1">
            <button type="submit" class="btn-mercadolibre payment-option" style="text-decoration:none">
                <img src="img/billetera.png" alt="8bit">
                <span>Pagar con billetera Minecraft</span>
            </button>
        </form>

        <hr>

        <a href="carrito.php" style="text-decoration:none; color:green">Regresar</a>
    </div>
</div>

<script>

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

                fetch('empty_cart.php')
                    .then(() => {
                        alert('Compra exitosa, que tenga un buen día.');
                        window.location.href = "succes_payment.php";
                    });
            });
        }
    }).render('#paypal-button-container');

</script>