<?php 
$url_base = "http://localhost/project_stages/";

// if (!isset($_SESSION['usuario'])) {
//     header("location:".$url_base."secciones/login.php");
//   }
include("../templates/head.php");

?>


<main>
    <div class="container bg mt-5 d-flex flex-direction-row align-items-center redondeado">
      <div>
      <p class="justify p-size">
      ¡Bienvenido a Digit! Nuestro servicio te ayuda a tener una vista clara y detallada de tus ingresos y egresos en un solo lugar. Con nuestra herramienta, puedes rastrear gastos de manera fácil y eficiente.

      Nuestro panel de control te ofrece información en tiempo real sobre tus finanzas, lo que te permite       tomar decisiones más informadas sobre tus gastos y ahorros. Además, nuestra plataforma te ayuda a       establecer metas financieras permitiendote  alcanzar tus objetivos financieros.
      </p>
      </div>
      <div>
        <img src="<?php echo $url_base?>img/digit.png" alt="logo" width="350">
      </div>

    </div>
    <div class="container">
    </div>
  </main>

<?php include("../templates/footer.php");?>