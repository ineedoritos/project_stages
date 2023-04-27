<?php

$url_base = "http://localhost/digit/";


include("../../db.php");

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
    









}



?>



<div class="center-container redondeado">
<div class="card text-center">
    <div class="card-header">
        <h1>Registrarse</h1>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="nombre" class="form-label"><h3>Nombre</h3></label>
              <input type="text" 
              class="form-control redondeado" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Digite su usuario">
            </div>

            <div class="mb-3">
              <label for="apellido" class="form-label"><h3>Apellido</h3></label>
              <input type="text" 
              class="form-control redondeado" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Digite su contraseña">
            </div>


        
            <div class="mb-3">
              <label for="usuario" class="form-label"><h3>Usuario</h3></label>
              <input type="text" 
              class="form-control redondeado" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Digite su contraseña">
            </div>


            
            <div class="mb-3">
              <label for="password" class="form-label"><h3>Contraseña</h3></label>
              <input type="text" 
              class="form-control redondeado" name="password" id="password" aria-describedby="helpId" placeholder="Digite su contraseña">
            </div>


            
            <div class="mb-3">
              <label for="salario" class="form-label"><h3>Salario</h3></label>
              <input type="text" 
              class="form-control redondeado" name="salario" id="salario" aria-describedby="helpId" placeholder="Digite su contraseña">
            </div>



            <div class="mb-3">
              <input type="submit"
                class="btn btn-success" name="" id="" aria-describedby="helpId" placeholder="">
            </div>
        </form>


        <a class="p-size btn btn-outline-dark me-2 nav-item-size" href="<?php echo $url_base; ?>sections/userAccess/logIn.php">Ya tienes una cuenta?</a>
    </div>

   

</div>
</div>






