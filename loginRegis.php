<?php
session_start();
require_once "includes/config.php";

if (!isset($_POST['boton'])) {
    header("Location: views/login.php");
    exit();
}

$usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
$contraseña = isset($_POST['contraseña']) ? trim($_POST['contraseña']) : '';

$usuario_url = urlencode($usuario);

if ($usuario === '' || $contraseña === '') {
    header("Location: views/login.php?error=" . urlencode("Por favor completa todos los campos") . "&usuario={$usuario_url}");
    exit();
}

$sql = "SELECT IDusuario, nombreDeUsuario, email, contraseña FROM usuario WHERE nombreDeUsuario = ? OR email = ? LIMIT 1";
$stmt = mysqli_prepare($conex, $sql);
if (!$stmt) {
    header("Location: views/login.php?error=" . urlencode("Error en el servidor") . "&usuario={$usuario_url}");
    exit();
}
mysqli_stmt_bind_param($stmt, "ss", $usuario, $usuario);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $hashEnBD = $row['contraseña'];

    if (password_verify($contraseña, $hashEnBD)) {
        $_SESSION['nombreDeUsuario'] = $row['nombreDeUsuario'];
        $_SESSION['IDusuario'] = $row['IDusuario'];
        $_SESSION['email'] = $row['email'];

        if (password_needs_rehash($hashEnBD, PASSWORD_DEFAULT)) {
            $newHash = password_hash($contraseña, PASSWORD_DEFAULT);
            $upd = mysqli_prepare($conex, "UPDATE usuario SET contraseña = ? WHERE IDusuario = ?");
            if ($upd) {
                mysqli_stmt_bind_param($upd, "si", $newHash, $row['IDusuario']);
                mysqli_stmt_execute($upd);
                mysqli_stmt_close($upd);
            }
        }

        mysqli_stmt_close($stmt);
        header("Location: home.php");
        exit();
    }

    if ($contraseña === $hashEnBD) {
        $newHash = password_hash($contraseña, PASSWORD_DEFAULT);
        $upd = mysqli_prepare($conex, "UPDATE usuario SET contraseña = ? WHERE IDusuario = ?");
        if ($upd) {
            mysqli_stmt_bind_param($upd, "si", $newHash, $row['IDusuario']);
            mysqli_stmt_execute($upd);
            mysqli_stmt_close($upd);
        }

        $_SESSION['nombreDeUsuario'] = $row['nombreDeUsuario'];
        $_SESSION['IDusuario'] = $row['IDusuario'];
        $_SESSION['email'] = $row['email'];

        mysqli_stmt_close($stmt);
        header("Location: index.php");
        exit();
    }

    mysqli_stmt_close($stmt);
    header("Location: views/login.php?error=" . urlencode("Contraseña incorrecta") . "&usuario={$usuario_url}");
    exit();

} else {
    if ($stmt) mysqli_stmt_close($stmt);
    header("Location: views/login.php?error=" . urlencode("Usuario no encontrado") . "&usuario={$usuario_url}");
    exit();
}
?>