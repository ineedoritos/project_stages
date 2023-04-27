<?php
$url_base = "http://localhost/project_stages/";
?>

<!doctype html>
<html lang="en">

<head>
  <title>Digit</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>

body {


        background: url("<?php echo $url_base;?>img/bg4.svg");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        min-height: 100vh;
        }



                .bg {
          background: #fff;
        }

      /**tamaño para item del nav */
      .nav-item-size {
        font-size: 20px;
        font-weight: bold;
      }

      /*tamaño a las p */
      .p-size {
        font-size: 20px;
        font-weight: bold;
      }

      /**justificar el texto*/
      .justify {
        text-align: justify;
      }

      /*poner al centro de la página un contenedor*/
      .center-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      /**borde con efecto*/
      .redondeado {
        border: #1735B3 8px outset;
        border-radius: 15px;
      }

      /*hacer que el footer siempre esté posicionado al fina*/
      .footer {

        

        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;


      } 
        


      .navFix{
          height: 60px; 
          width: 100%; 
          position: fixed;
          top: 0;
          left: 0;
          background-color: #fff; 
          z-index: 999; 
      }


    </style>
</head>
<body class="bg-light">


<div class="navFix">
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg">
    <div class="container-fluid">
      <h1>Digit</h1>
      <div>
      <a name="" id="" class="btn btn-outline-dark me-2 nav-item-size" href="<?php echo $url_base; ?>sections/userAccess/logIn.php" role="button">Iniciar sesión</a>
      <a name="" id="" class="btn btn-outline-dark me-2 nav-item-size" href="<?php echo $url_base; ?>sections/userAccess/register.php" role="button">Registrarse</a>
      </div>
    </div>
  </nav>
</div>
</div>

  



