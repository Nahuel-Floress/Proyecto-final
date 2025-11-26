<?php
// perfil controlador
require_once "includes/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$IDusuario = intval($_SESSION['IDusuario'] ?? 0);

if ($IDusuario <= 0) {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}

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

// obtener foto perfil
$fotoPerfil = "img/avatar.png";
$stmt = $conex->prepare("SELECT fotoDePerfil FROM usuario WHERE IDusuario = ? LIMIT 1");
if ($stmt) {
    $stmt->bind_param("i", $IDusuario);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res && $row = $res->fetch_assoc()) {
        if (!empty($row['fotoDePerfil']))
            $fotoPerfil = $row['fotoDePerfil'];
    }
    $stmt->close();
}

$section = "views/perfilUsuario";
require_once "layout.php";