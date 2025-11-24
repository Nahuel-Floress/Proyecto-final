<?php
/* include 'verifUser.php'; */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


  <!-- Navbar -->
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


  <!-- footer -->
  <link rel="stylesheet" href="css/footer.css">

  <title>Minecraft</title>
</head>

<body>


  <header>
    <!-- incluimos el nav -->
    <?php include 'views/navbar.php'; ?>
  </header>




  <main>
    <?php
    $section = (isset($section)) ? $section : 'home';
    require_once $section . '.php';
    ?>
  </main>

  <!-- incluimos el footer -->

  <?php include 'views/footer.php'; ?>
  </footer>




</body>

</html>