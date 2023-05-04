<?php
$url_base = "http://localhost/project_stages/";

include("../../templates/head.php");
include("../../conexion_db/db.php");

session_start();

if ($_POST) {

  //en esta ocasión hacemos una sub consulta para que cuente los usuarios cuyos datos coinciden
  //con los datos de la tabla clientes
  $sentencia = $conexion->prepare("SELECT * ,count(*) as n_usuarios 
  FROM usuarios WHERE usuario=:usuario AND password=:password");

  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  $sentencia->bindParam(":usuario", $usuario);
  $sentencia->bindParam(":password", $password);
  $sentencia->execute();

  $registro = $sentencia->fetch(PDO::FETCH_LAZY);

  //esta condición, verifica que si se encontraron resultados en la sentencia sql
  //vamos a crear las variables de sesión y redireccionamos, sino, tiramos un alert en el formulario
  if ($registro['n_usuarios'] > 0) {
    $_SESSION['usuario'] = $registro['usuario'];
    $_SESSION['logueado'] = true;
    // Guardar el ID del usuario en una variable de sesión
    $id_usuario = $registro['id'];
    $_SESSION['id'] = $id_usuario;  

    header("location: ../vista_user/transacciones/home.php");
  } else {
    $mensaje = "Error: El usuario o la contraseña son incorrectos";
}

}
?>



<div class="center-container redondeado">
<div class="row">
    <div class="col-md-3">
      <!-- Contenido de la columna izquierda -->
    </div>
    <div class="col-md-6 mt-5">
      <!-- Contenido de la columna central -->
      <div class="card text-center bg-dark text-white">
    <div class="card-header border border-3 border-dark rounded">
        <h1>Iniciar sesión</h1>
        <?php if(isset($mensaje)){ ?>
        <div class="alert bg-danger text-white" role="alert">
            <strong><h4><?php echo $mensaje;?></h4></strong>
        </div>
    <?php } ?>
    </div>
    <div class="card-body border border-3 border-dark rounded">

        <form method="post">
            <div class="mb-3">
              <label for="" class="form-label"><h4>Usuario</h4></label>
              <input type="text"  required
              class="form-control redondeado border border-1 border-dark rounded" name="usuario" id="" aria-describedby="helpId" placeholder="Digite su usuario">
            </div>

            <div class="mb-3">
              <label for="" class="form-label"><h4>Contraseña</h4></label>
              <input type="password" required
              class="form-control redondeado border border-1 border-dark rounded" name="password" id="" aria-describedby="helpId" placeholder="Digite su contraseña">
            </div>

            <div class="mb-3">
              <input type="submit"
                class="btn btn-success" aria-describedby="helpId" >
                <a name="" id="" class="btn btn-danger" href="../vista_user/index.php" role="button">Regresar</a>
            </div>
        </form>
        <a class="p-size btn btn-outline-light me-2 nav-item-size" href="register.php">¿No tienes una cuenta? Registrate</a>
    </div>

</div>
    </div>
    <div class="col-md-3">
      <!-- Contenido de la columna derecha -->
    </div>
  </div>
</div>


<?php include("../../templates/footer.php") ?>