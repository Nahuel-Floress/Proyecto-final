<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft</title>
    <link rel="shortcut icon" href="../img/icono.png" type="image/x-icon" >
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .mensaje-error {
        margin:15px;
      background-color: #f8d7da;  
    color: #842029;           
    padding: 15px 25px;
    border-radius: 5px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    z-index: 9999;    
    opacity: 1;
    transition: opacity 1s ease-out;
    font-family: Arial, sans-serif;
}

   </style>
</head>
 
<body>
<form action="../loginRegis.php" method="POST" class="login__form">
    <h1 class="login__title">Inicio de sesión</h1>

    <div class="login__content">
        <div class="login__box">
            <i class="bx bx-lock-alt"></i>
            <div class="login__box-input">
                <input 
                    type="email" 
                    name="usuario" 
                    required 
                    class="login__input" 
                    placeholder=" "
                    value="<?php if(isset($_GET['usuario'])) echo htmlspecialchars($_GET['usuario']); ?>"
                >
                <label for="" class="login__label">Gmail</label>
            </div>
        </div>

        <div class="login__box">
            <i class="ri-lock-2-line login__icon"></i>
            <div class="login__box-input">
                <input 
                    type="password" 
                    name="contraseña" 
                    required 
                    class="login__input" 
                    placeholder=" "
                    value="<?php if(isset($_GET['contraseña'])) echo htmlspecialchars($_GET['contraseña']); ?>"
                >
                <label for="" class="login__label">Contraseña</label>
                <i class="ri-eye-off-line login__eye"></i>
            </div>
        </div>
    </div>

    <?php if(isset($_GET['error'])) { ?>
        <div class="mensaje-error"><?php echo $_GET['error']; ?></div>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const mensaje = document.querySelector(".mensaje-error");
            if(mensaje){
               
                setTimeout(() => mensaje.style.opacity = "0", 3000);
            }
        });
        </script>
    <?php } ?>

    <button type="submit" name="boton" class="login__button">Iniciar sesión</button>

    <p class="login__register">
        No tienes una cuenta? <a href="register.php">Registrate</a>
    </p>
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    if (params.has("usuario")) {
        document.querySelector("[name='usuario']").value = params.get("usuario");
    }
    if (params.has("contraseña")) {
        document.querySelector("[name='contraseña']").value = params.get("contraseña");
    }
});
</script>
           
   
 
 
  
</body>
</html> 