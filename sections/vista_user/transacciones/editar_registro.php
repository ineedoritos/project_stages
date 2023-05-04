<?php

$url_base = "http://localhost/project_stages/";

include("../../../templates/headUser.php");
include("../../../conexion_db/db.php");

$fk_usuario = $_SESSION["id"];

if ($_POST) {
    
    $tipo = $_POST["tipo"];
    $cantidad = $_POST["cantidad"];
    $fecha = $_POST["fecha"];
    $descripcion = $_POST["descripcion"];

    $sentencia = $conexion->prepare("UPDATE transacciones SET
    tipo = IFNULL(:tipo, tipo),
    cantidad = IFNULL(:cantidad, cantidad),
    descripcion = IFNULL(:descripcion, descripcion),
    fecha = IFNULL(:fecha, fecha)
    WHERE id_transaccion = :id_transaccion");

    $sentencia->bindParam(":tipo", $tipo);
    $sentencia->bindParam(":cantidad", $cantidad);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":fecha", $fecha);
    $sentencia->bindParam(":id_transaccion", $srow['id_transaccion']);

    $sentencia->execute();

    header("Location: home.php");
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
    <div class="card-header border border-3 border-dark rounded bg-dark text-white">
        <h1>Editar datos de transacción</h1>
    </div>
    <div class="card-body bg-dark text-white">
        <form method="post" class="bg-dark text-white">


        <div class="mb-3">
        <select class="form-select border border-1 border-dark rounded" name="tipo" aria-label="Default select example">
            <option selected disabled>Tipo de transacción</option>
            <option value="ingreso">Ingreso</option>
            <option value="egreso">Egreso</option>
        </select>
            </div>

            <div class="mb-3">
              <input type="number" required
              class="form-control redondeado border border-1 border-dark rounded" name="cantidad" id="" aria-describedby="helpId" placeholder="Digite La cantidad">
            </div>

            
            <div class="mb-3">
              <input type="text" required
              class="form-control redondeado border border-1 border-dark rounded" name="descripcion" id="" aria-describedby="helpId" placeholder="Digite el motivo / descripción">
            </div>

            
            <div class="mb-3">
                <h6>Fecha de la transacción</h6>
              <input type="date"  required
              class="form-control redondeado border border-1 border-dark rounded" name="fecha" id="" aria-describedby="helpId" placeholder="Ingrese la fecha de la transacción">
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

<?php include("../../../templates/footer.php"); ?>