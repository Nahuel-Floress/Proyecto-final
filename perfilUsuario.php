<?php
require_once "includes/config.php";
$IDusuario = $_SESSION['IDusuario'] ?? 0;

if (isset($_POST['guardarFoto'])) {
    $fotoURL = trim($_POST['fotoDePerfil'] ?? '');
    $stmt = $conex->prepare("UPDATE usuario SET fotoDePerfil = ? WHERE IDusuario = ?");
    $stmt->bind_param("si", $fotoURL, $IDusuario);
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST['restaurarFoto'])) {
    $stmt = $conex->prepare("UPDATE usuario SET fotoDePerfil = '' WHERE IDusuario = ?");
    $stmt->bind_param("i", $IDusuario);
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST['guardarConfiguracion'])) {
    $nuevoNombre = trim($_POST['nombreDeUsuario'] ?? '');
    $nuevoEmail = trim($_POST['email'] ?? '');
    $nuevaPass = trim($_POST['password'] ?? '');

    if (!empty($nuevoNombre)) {
        $stmt = $conex->prepare("UPDATE usuario SET nombreDeUsuario = ? WHERE IDusuario = ?");
        $stmt->bind_param("si", $nuevoNombre, $IDusuario);
        $stmt->execute();
        $_SESSION['nombreDeUsuario'] = $nuevoNombre;
        $stmt->close();
    }

    if (!empty($nuevoEmail)) {
        $stmt = $conex->prepare("UPDATE usuario SET email = ? WHERE IDusuario = ?");
        $stmt->bind_param("si", $nuevoEmail, $IDusuario);
        $stmt->execute();
        $_SESSION['email'] = $nuevoEmail;
        $stmt->close();
    }

    if (!empty($nuevaPass)) {
        $passHasheada = password_hash($nuevaPass, PASSWORD_DEFAULT);
        $stmt = $conex->prepare("UPDATE usuario SET contraseña = ? WHERE IDusuario = ?");
        $stmt->bind_param("si", $passHasheada, $IDusuario);
        $stmt->execute();
        $stmt->close();
    }
}

$fotoPerfil = "img/avatar.png";
$result = $conex->query("SELECT fotoDePerfil FROM usuario WHERE IDusuario = $IDusuario LIMIT 1");
if ($result && $row = $result->fetch_assoc()) {
    if (!empty($row['fotoDePerfil']))
        $fotoPerfil = $row['fotoDePerfil'];
}


$section = "views/perfilUsuario";
require_once "layout.php";
?>