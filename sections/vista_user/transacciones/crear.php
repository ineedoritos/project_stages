<?php

include("../../db.php");
session_start();



if ($_POST) {
    $tipo_transaccion = $_POST['tipo'];
    $cantidad = $_POST["cantidad"];
    $fk_cliente = $_SESSION['id'];
    

    $sentencia = $conexion->prepare("INSERT INTO transacciones (id_transaccion, tipo, cantidad, id_usuario) VALUES (null, :tipo, :cantidad, :id_usuario)");

    $sentencia->bindParam(":tipo",$tipo_transaccion);
    $sentencia->bindParam(":cantidad",$cantidad);
    $sentencia->bindParam(":id_usuario",$fk_cliente);
    $sentencia->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>registrar transaccion</h1>
    <hr>
    <form method="post">
        <h1>Tipo de transaccion</h1>
        <select name="tipo" id="">
            <option value="" disabled></option>
            <option value="ingreso">Ingreso</option>
            <option value="egreso">Egreso</option>
        </select>
        <br><br>
        <h1>cantidad</h1>
<input type="number" name="cantidad">
        <br><br><br>
        <input type="submit" value="enviar">
        <!--input para id de usuario-->
    </form>
    <a href="index.php">regresar</a>
</body>
</html>