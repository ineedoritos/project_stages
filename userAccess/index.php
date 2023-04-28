<?php

session_start();

echo "Bienvenido ".$_SESSION['usuario']." su id es: ".$_SESSION['id'];

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
    <br><br><br>
    <a href="../vista_user/crear.php">registrar</a>
    <br><br>
    <a href="../../cerrar.php">cerrar</a>
</body>
</html>