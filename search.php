<?php
 require_once "includes/config.php";

$busqueda = isset($_GET['q']) ? trim($_GET['q']) : "";
$busqueda = strtolower($busqueda);

if (empty($busqueda)) {
    header("Location: index.php");
    exit;
}

$sqlJuego = $conex->prepare("SELECT * FROM videojuego WHERE LOWER(nombreDelJuego) = ?");
$sqlJuego->bind_param("s", $busqueda);
$sqlJuego->execute();
$resultadoJuego = $sqlJuego->get_result();
if ($resultadoJuego->num_rows > 0) {
    $juego = $resultadoJuego->fetch_assoc();
    header("Location: store_page.php?id=" . $juego['idVideoJuego']);
    exit;
}

$sqlGenero = $conex->prepare("SELECT DISTINCT genero FROM videojuego WHERE LOWER(genero) = ?");
$sqlGenero->bind_param("s", $busqueda);
$sqlGenero->execute();
$resultadoGenero = $sqlGenero->get_result();
if ($resultadoGenero->num_rows > 0) {
    header("Location: gender_page.php?id=" . urlencode($busqueda));
    exit;
}

$secciones = [
    'inicio' => 'index.php',
    'home' => 'index.php',
    'principal' => 'index.php',
    'soporte' => 'soportePrincipal.php',
    'ayuda' => 'soportePrincipal.php',
    'contacto' => 'contacto.php',
    '8bit' => 'about_us.php',
    'nosotros' => 'about_us.php',
    'noticia' => 'noticias.php',
    'noticias' => 'noticias.php',
    'biblioteca' => 'library.php',
    'admin' => 'admin.php',
    'crud' => 'Index_crud.php',
];

foreach ($secciones as $palabra => $ruta) {
    if (stripos($busqueda, $palabra) !== false) {
        header("Location: " . $ruta);
        exit;
    }
}

$like = "%" . $busqueda . "%";
$sqlParcial = $conex->prepare("
    SELECT v.idVideoJuego, v.nombreDelJuego, v.precio, v.genero, v.descripcion
    FROM videojuego v
    WHERE LOWER(v.nombreDelJuego) LIKE ? OR LOWER(v.genero) LIKE ?
");
$sqlParcial->bind_param("ss", $like, $like);
$sqlParcial->execute();
$resultadoParcial = $sqlParcial->get_result();
$section = "views/search";
require_once "views/layout.php";

?>