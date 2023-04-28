<?php
    include("../../db.php");

    session_start();

    $fk_usuario = $_SESSION["id"];

    
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario;");
    $consulta->bindParam(":id_usuario", $fk_usuario);

    $datosUsuario = $consulta->fetch(PDO::FETCH_LAZY);


    print_r($datosUsuario);

    if ($_POST) {
        
    $tipo = $_POST["tipo"];
    $cantidad = $_POST["cantidad"];
    $fecha = $_POST["fecha"];
    $descripcion = $_POST["descripcion"];

    $sentencia = $conexion->prepare("INSERT INTO transacciones (id_transaccion,tipo,cantidad,descripcion,fecha,id_usuario)
    VALUES (null,:tipo,:cantidad,:descripcion,:fecha,:id_usuario)");

    $sentencia->bindParam(":tipo", $tipo);
    $sentencia->bindParam(":cantidad", $cantidad);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":fecha", $fecha);
    $sentencia->bindParam(":id_usuario", $fk_usuario);

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
    <form method="post">

    <select name="tipo" id="">
   
        <option value="ingreso">Ingresar</option>
        <option value="egreso">Egreso</option>

    </select>
    <br><br>
    <h1>Cantidad</h1>
    <input type="number" name="cantidad">
    <h1>Descripcion</h1>
    <input type="text" name="descripcion">
    <h1>Fecha</h1>
    <input type="date" name="fecha">
    <br><br><br>
    <button type="submit">Enviar</button>

    </form>

    <hr>
    <h1>total activos</h1>

<?php
//Consulta SQL utilizando left join y subconsulta
$sentencia_ingresos = "SELECT SUM(CASE WHEN transacciones.tipo = 'ingreso' THEN transacciones.cantidad ELSE 0 END) AS total_ingresos FROM usuarios LEFT JOIN transacciones ON usuarios.id = transacciones.id_usuario WHERE usuarios.id = :id_usuario GROUP BY usuarios.id, usuarios.salario;";

// Preparar la consulta
$stmtIngresos = $conexion->prepare($sentencia_ingresos);

// Ejecutar la consulta
$stmt->execute(array(':id_usuario' => $fk_usuario));

// Obtener el resultado
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

// Mostrar el resultado en una tabla
echo '<table>';
echo '<tr><th>total ingresos</th></tr>';
echo '<tr><td>' . $resultado['total_ingresos'] . '</td></tr>';
echo '</table>';


echo "<hr>";
echo "<h1>egresos</h1>";

//Consulta SQL utilizando left join y subconsulta
$sql = "SELECT SUM(CASE WHEN transacciones.tipo = 'egreso' THEN transacciones.cantidad ELSE 0 END) AS saldo_disponible FROM usuarios LEFT JOIN transacciones ON usuarios.id = transacciones.id_usuario WHERE usuarios.id = :id_usuario GROUP BY usuarios.id, usuarios.salario;";

// Preparar la consulta
$stmtEgresos = $conexion->prepare($sql);

// Ejecutar la consulta
$stmt->execute(array(':id_usuario' => $fk_usuario));

// Obtener el resultado
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

// Mostrar el resultado en una tabla
echo '<table>';
echo '<tr><th>Total egresos</th></tr>';
echo '<tr><td>' . $resultado['saldo_disponible'] . '</td></tr>';
echo '</table>';

echo "<hr>";
echo "<h1>historial de transacciones</h1>";

echo "<h1>historial de ingresos</h1>"
//Consulta SQL utilizando left join y subconsulta
$sentencia_historial = "SELECT transacciones.tipo WHERE transacciones.tipo='ingreso' AND id_usuario = :id_usuario;";

// Preparar la consulta
$stmt = $conexion->prepare($sentencia_historial);

// Ejecutar la consulta
$stmt->execute(array(':id_usuario' => $fk_usuario));

// Obtener el resultado
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
?>
</body>
</html>