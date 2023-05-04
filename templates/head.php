<?php
$url_base = "http://localhost/project_stages/";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
      body {
        background: url("<?php echo $url_base;?>img/bg.svg");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        overflow-x: hidden;
      }
    </style>
</head>
<nav class="navbar navbar-expand-lg data-bs-toggle bg-dark text-white" >
  <div class="container-fluid">
    <p class="h1">Stages</p>
    <ul class="navbar-nav text-white">
      <div class="d-flex align-items-xxl-center text-white">
      <li class="nav-item d-flex align-items-xxl-center h1 text-white"><a name="" id="" class="btn text-white" href="<?php echo $url_base; ?>sections/authentication/logIn.php" role="button"><b>Iniciar sesión</b></a></li>
      <li class="nav-item d-flex align-items-xxl-center h1 text-white"><a name="" id="" class="btn text-white" href="<?php echo $url_base; ?>sections/authentication/register.php" role="button"><b>Regístrate</b></a></li>
      </div>

    </ul>

  </div>
</nav>




