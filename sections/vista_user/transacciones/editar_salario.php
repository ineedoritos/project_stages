<?php
$url_base = "http://localhost/project_stages/";

include("../../../templates/head.php");
include("../../../conexion_db/db.php");

session_start();

$fk_usuario = $_SESSION["id"];

if ($_POST) {
    
    $nuevo_salario = $_POST["new_salario"];

    $sentencia = $conexion->prepare("UPDATE usuarios SET salario = :new_salario where id = :id_usuario");

    $sentencia->bindParam(":new_salario", $nuevo_salario);
    $sentencia->bindParam(":id_usuario", $fk_usuario);

    $sentencia->execute();

    header ("Location: total_activos.php");
}
?>



<div class="center-container redondeado">
<div class="row">
    <div class="col-md-3">
      <!-- Contenido de la columna izquierda -->
    </div>
    <div class="col-md-6 mt-5">
      <!-- Contenido de la columna central -->
      <div class="card text-center">
    <div class="card-header rounded bg-dark text-white">
        <h1>Modificar mi salario</h1>
    </div>
    <div class="card-body bg-dark text-white rounded">

        <form method="post">
            <div class="mb-3">
              <label for="" class="form-label"><h4>Ingrese el nuevo salario</h4></label>
              <input type="number" step="0.01"  required
              class="form-control redondeado border border-1 border-dark rounded" name="new_salario" id="" aria-describedby="helpId" placeholder="Digite su nuevo salario">
            </div>



            <div class="mb-3">
              <input type="submit"
                class="btn btn-success" aria-describedby="helpId" >
                <a name="" id="" class="btn btn-danger" href="home.php" role="button">Regresar</a>

            </div>
        </form>
    </div>

</div>
    </div>
    <div class="col-md-3">
      <!-- Contenido de la columna derecha -->
    </div>
  </div>
</div>


<?php include("../../../templates/footer.php") ?>