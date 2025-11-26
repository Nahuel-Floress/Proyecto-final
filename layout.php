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


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


  <link rel="stylesheet" href="css/footer.css">

  <title>Minecraft</title>
</head>

<body>


  <header>
    <?php include 'views/navbar.php'; ?>
  </header>


  <main>
    <?php
    $section = (isset($section)) ? $section : 'home';
    require_once $section . '.php';
    ?>
  </main>

  <?php include 'views/footer.php'; ?>
  </footer>


</body>

</html>