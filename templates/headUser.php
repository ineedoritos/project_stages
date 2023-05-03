<?php
$url_base = "http://localhost/project_stages/";
session_start();

if (!isset($_SESSION['usuario'])) {
  header("location:".$url_base."sections/authentication/logIn.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/78c4bc66c2.js" crossorigin="anonymous"></script>

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
    <ul class="navbar-nav">
      <div class="container m-auto text-center">
        <div>
        <i class="fa-solid fa-user fa-2xl"></i><h1>
        </div>
        <div>
        <h5><b><?php echo $_SESSION['usuario']; ?></b></h5>

        </div>
      </div>
    </ul>
  </div>
</nav>




