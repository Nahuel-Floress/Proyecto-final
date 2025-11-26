<?php
// index.php
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/cart.css">

<div class="store-container">

    <div class="hero-card">
        <div class="hero-img">
            <img
                src="https://www.minecraft.net/content/dam/minecraftnet/games/minecraft/key-art/PDP-Hero_OV-Deluxe_16x9.jpg">
        </div>

        <div class="hero-info">
            <h1>MINECRAFT: JAVA & BEDROCK</h1>

            <div class="hero-rating">
                <span class="stars">★★★★★</span>
                <span class="rating-number">842.8K</span>
                <span class="age">Everyone 10+</span>
            </div>

            <div class="hero-platforms">
                <span><i class="bi bi-windows"></i> Windows</span>
                <span><i class="bi bi-apple"></i> Mac (Java)</span>
                <span><i class="bi bi-terminal"></i> Linux (Java)</span>
            </div>
        </div>
    </div>

    <div class="editions-box">
        <h3 class="select-title">ELEGIR UNA EDICIÓN</h3>

        <div class="edition-card select-edition selected" data-product="Deluxe PC Collection">
            <div class="featured-header">Best value!</div>

            <h2 class="edition-title">DELUXE PC COLLECTION</h2>

            <div class="items">
                <span>Minecraft: Bedrock Edition</span>
                <span>Minecraft: Java Edition</span>
                <span>Minecraft Launcher</span>
                <span>1600 Minecoins</span>
                <span>5 Maps</span>
                <span>1 Texture Pack</span>
                <span>3 Skin Packs</span>
            </div>

            <div class="price">
                <i class="bi bi-circle-fill price-icon"></i> $39.99
            </div>
        </div>

        <div class="edition-card select-edition" data-product="Standard PC Edition">
            <h2 class="edition-title">STANDARD PC EDITION</h2>

            <div class="items">
                <span>Minecraft: Bedrock Edition</span>
                <span>Minecraft: Java Edition</span>
                <span>Minecraft Launcher</span>
            </div>


            <div class="price">
                <i class="bi bi-circle price-icon"></i> $29.99
            </div>
        </div>

        <form id="buyForm" action="cart.php" method="POST">
            <input type="hidden" name="producto" id="productoSeleccionado" value="Deluxe PC Collection">
            <button type="submit" class="btn-buy">COMPRAR</button>
        </form>

    </div>
</div>

<div class="platforms">
    <h3>OTRAS PLATAFORMAS</h3>

    <div class="platform-grid">
        <a class="plat"><i class="bi bi-laptop"></i> Chromebook</a>
        <a class="plat"><i class="bi bi-phone"></i> iOS</a>
        <a class="plat"><i class="bi bi-android2"></i> Android</a>
        <a class="plat"><i class="bi bi-xbox"></i> Xbox</a>
        <a class="plat"><i class="bi bi-nintendo-switch"></i> Nintendo</a>
        <a class="plat"><i class="bi bi-fire"></i> Amazon Fire</a>
        <a class="plat"><i class="bi bi-playstation"></i> PlayStation</a>
    </div>
</div>

<div class="faq-section">
    <h3 class="faq-title">PREGUNTAS MÁS FRECUENTES</h3>

    <div class="faq-item">
        <div class="faq-question">
            ¿ESTÁ DISPONIBLE MINECRAFT PARA MAC?
            <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">Sí, Minecraft Java Edition está disponible para macOS.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">
            ¿ES MINECRAFT PARA WINDOWS LA BEDROCK EDITION?
            <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">Sí, la versión de Windows incluye Bedrock Edition.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">
            ¿MINECRAFT USA CPU O GPU?
            <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">Minecraft usa principalmente CPU.</div>
    </div>
</div>

<script src="js/cart.js" defer></script>


<?php
if (!empty($_POST["producto"])) {

    $producto = $_POST["producto"];

    // Archivo JSON simulando BD
    $jsonFile = __DIR__ . "/library.json";
    $library = [];

    if (file_exists($jsonFile)) {
        $library = json_decode(file_get_contents($jsonFile), true);
        if (!is_array($library))
            $library = [];
    }

    // Info de productos con descripción
    $info = [
        "Deluxe PC Collection" => [
            "image" => "https://www.minecraft.net/content/dam/minecraftnet/games/minecraft/key-art/PDP-Hero_OV-Deluxe_16x9.jpg",
            "description" => "Incluye Java, Bedrock, Minecoins y contenido adicional exclusivo."
        ],
        "Standard PC Edition" => [
            "image" => "https://upload.wikimedia.org/wikipedia/en/5/51/Minecraft_cover.png",
            "description" => "Incluye Minecraft Java Edition, Bedrock Edition y el Launcher oficial."
        ]
    ];

    $img  = $info[$producto]["image"] ?? "";
    $desc = $info[$producto]["description"] ?? "Juego adquirido en la tienda.";

    // Guardar CON descripción
    $library[] = [
        "title"       => $producto,
        "image"       => $img,
        "description" => $desc
    ];

    file_put_contents($jsonFile, json_encode($library, JSON_PRETTY_PRINT));

    // ALERTA + REDIRECCIÓN SIN LOOP
    echo "<script>
            alert('¡Compra realizada correctamente! Has adquirido: $producto');
            window.location.href = 'cart.php';
          </script>";
    exit;
}
?>
