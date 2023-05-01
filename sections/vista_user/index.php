<?php 
$url_base = "http://localhost/project_stages/";

// if (!isset($_SESSION['usuario'])) {
//     header("location:".$url_base."secciones/login.php");
//   }
include("../../templates/head.php");?>
<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Stages</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Planifica tus gastos en étapas</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a type="button" href="../authentication/register.php" class="btn btn-lg px-4 gap-3 btn-dark">Regístrate ya! </a>
      </div>
    </div>
  </div>

  
<?php include("../../templates/footer.php");?>