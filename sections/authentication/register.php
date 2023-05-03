<?php

$url_base = "http://localhost/project_stages/";


include("../../conexion_db/db.php");
include("../../templates/head.php");

if ($_POST) {
    

    $nombre = (isset($_POST['nombre']) ? $_POST["nombre"]:"");
    $apellido = (isset($_POST['apellido']) ? $_POST["apellido"]:"");
    $usuario = (isset($_POST['usuario']) ? $_POST["usuario"]:"");
    $password = (isset($_POST['password']) ? $_POST["password"]:"");
    $salario = (isset($_POST['salario']) ? $_POST["salario"]:"");


    $sentencia = $conexion->prepare("INSERT INTO usuarios (id, nombre, apellido, usuario , password, salario) VALUES (null, :nombre, :apellido, :usuario, :password, :salario)");
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":apellido",$apellido);
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":password",$password);
    $sentencia->bindParam(":salario",$salario);
    $sentencia->execute();

    header("Location: logIn.php");
    
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
        <h1>Registrate</h1>
    </div>
    <div class="card-body border border-3 border-dark rounded">
        <form method="post">


        <div class="mb-3">
              <input type="text" 
              class="form-control redondeado border border-1 border-dark rounded" name="nombre" id="" aria-describedby="helpId" placeholder="Digite sus nombres">
            </div>

            <div class="mb-3">
              <input type="text" 
              class="form-control redondeado border border-1 border-dark rounded" name="apellido" id="" aria-describedby="helpId" placeholder="Digite sus apellidos">
            </div>

            
            <div class="mb-3">
              <input type="text" 
              class="form-control redondeado border border-1 border-dark rounded" name="usuario" id="" aria-describedby="helpId" placeholder="Digite su usuario">
            </div>

            
            <div class="mb-3">
              <input type="text" 
              class="form-control redondeado border border-1 border-dark rounded" name="password" id="" aria-describedby="helpId" placeholder="Digite su contraseña">
            </div>

            
            <div class="mb-3">
              <input type="number" 
              class="form-control redondeado border border-1 border-dark rounded" name="salario" id="" aria-describedby="helpId" placeholder="Digite su salario">
            </div>

            <div class="mb-3">
              <input type="submit"
                class="btn btn-success" aria-describedby="helpId" >
            </div>
        </form>
        <a class="p-size btn btn-outline-light me-2 nav-item-size" href="logIn.php">¿Ya tienes una cuenta? Inicia sesión!</a>
    </div>

</div>
    </div>
    <div class="col-md-3">
      <!-- Contenido de la columna derecha -->
    </div>
  </div>
</div>

<?php include("../../templates/footer.php") ?>







