<?php
require_once "includes/config.php";
header('Content-Type: application/json');  

$response = ["success" => false, "message" => "Error desconocido"];

if(isset($_POST['nombreDeUsuario'], $_POST['email'], $_POST['contraseña'], $_POST['confirmarContraseña'])) {
    $name = trim($_POST['nombreDeUsuario']);
    $email = trim($_POST['email']);
    $contraseña = trim($_POST['contraseña']);
    $confirmarContraseña = trim($_POST['confirmarContraseña']);

    if ($contraseña !== $confirmarContraseña) {
        $response["message"] = "Las contraseñas no coinciden.";
        echo json_encode($response);
        exit;
    }

    $checkEmail = "SELECT * FROM usuario WHERE email='$email'";
    $resEmail = mysqli_query($conex, $checkEmail);

    $checkUser = "SELECT * FROM usuario WHERE nombreDeUsuario='$name'";
    $resUser = mysqli_query($conex, $checkUser);

    if (mysqli_num_rows($resEmail) > 0) {
        $response["message"] = "El correo $email ya está en uso.";
    } elseif (mysqli_num_rows($resUser) > 0) {
        $response["message"] = "El usuario $name ya está en uso.";
    } else {
        $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);

        $consulta = "INSERT INTO usuario(nombreDeUsuario, email, contraseña)
                     VALUES ('$name', '$email', '$contraseñaHash')";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            $response = ["success" => true, "message" => "Usuario registrado correctamente."];
        } else {
            $response["message"] = "Error al registrar usuario.";
        }
    }
} else {
    $response["message"] = "Faltan datos del formulario.";
}

echo json_encode($response);
?>