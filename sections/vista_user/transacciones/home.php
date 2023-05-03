<?php

$url_base = "http://localhost/project_stages/";

include("../../../templates/headUser.php");
include("../../../conexion_db/db.php");


?>

<body>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <!-- Contenido de la columna izquierda -->
    </div>
    <div class="col-md-6 mx-auto text-center">
      <!-- Contenido de la columna central -->
      <div class="alert bg-primary text-white mt-5" role="alert">
            <strong><h2>Hola ¿qué deseas hacer hoy?</h2></strong>
        </div>      
      
      <div class="card-group mt-5 text-center">


  <div class="card p-3">
    <a href="crear.php" class="text-decoration-none">
    <img src="../../../img/agregar.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Agregar una nueva transacción</h5>
    </div>
    </a>
  </div>


  <div class="card p-3">
    <a href="total_activos.php" class="text-decoration-none">
    <img src="../../../img/digit.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Consultar total activos</h5>
    </div>
    </a>
  </div>


  <div class="card p-3">
    <a href="../../../conexion_db/cerrar.php" class="text-decoration-none">
    <img src="../../../img/cerrar.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Cerrar sesión</h5>
    </div>
    </a>

  </div>
</div>


    </div>
    <div class="col-md-3">
      <!-- Contenido de la columna derecha -->
    </div>
  </div>
</div>

</body>
 <?php include("../../../templates/footer.php");?>