<?php
$url_base = "http://localhost/project_stages/";

include("../../templates/head.php");
include("../../db.php");

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
       

      header("location: ../vista_user/index.php");

  }
}



?>



<div class="center-container redondeado">
<div class="card text-center">
    <div class="card-header">
        <h1>Iniciar sesión</h1>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
              <label for="" class="form-label"><h4>Usuario</h4></label>
              <input type="text" 
              class="form-control redondeado" name="usuario" id="" aria-describedby="helpId" placeholder="Digite su usuario">
            </div>

            <div class="mb-3">
              <label for="" class="form-label"><h4>Contraseña</h4></label>
              <input type="text" 
              class="form-control redondeado" name="password" id="" aria-describedby="helpId" placeholder="Digite su contraseña">
            </div>

            <div class="mb-3">
              <input type="submit"
                class="btn btn-success" aria-describedby="helpId" >
            </div>
        </form>
        <a class="p-size btn btn-outline-dark me-2 nav-item-size" href="./register.php">¿No tienes una cuenta? Registrate</a>
    </div>

</div>
</div>


<?php include("../../templates/footer.php") ?>