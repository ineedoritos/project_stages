<?php
include("../../../templates/headUser.php");
?>

<body>
  <h1>Historial de transacciones</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Fecha de inicio: <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>">
    Fecha de fin: <input type="date" name="fecha_fin" value="<?php echo $fecha_fin; ?>">
    <input type="submit" value="Consultar">
  </form>

  <?php
  include("../../../conexion_db/db.php");
  $sentencia = "SELECT fecha, tipo, cantidad, descripcion FROM transacciones WHERE id_usuario = {$_SESSION['id']}";
  if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    // Agregar las fechas a la consulta SQL si están presentes en el formulario
    if (!empty($fecha_inicio) && !empty($fecha_fin)) {
      $sentencia .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    }
  }

  $resultado = $conexion->query($sentencia);
  $ingresos = 0;
  $egresos = 0;

  echo "<h2>Detalles</h2>";
  if ($resultado->rowCount() > 0) {
    echo "<table>";
    echo "<thead><tr><th>Fecha</th><th>Tipo</th><th>Cantidad</th><th>Descripción</th></tr></thead>";
    echo "<tbody>";
    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo "<td>" . $row['fecha'] . "</td>";
      echo "<td>" . $row['tipo'] . "</td>";
      echo "<td>$" . number_format($row['cantidad'], 2) . "</td>";
      echo "<td>" . $row['descripcion'] . "</td>";
      echo "</tr>";
      if ($row['tipo'] == 'Ingreso') {
        $ingresos += $row['cantidad'];
      } else if ($row['tipo'] == 'Egreso') {
        $egresos += $row['cantidad'];
      }
    }
    echo "</tbody>";
    echo "</table>";

    // Consultar y mostrar la suma de ingresos y egresos
    $sentencia_ingresos = "SELECT SUM(cantidad) AS total_ingresos FROM transacciones WHERE tipo = 'Ingreso' AND id_usuario = {$_SESSION['id']}";
    $sentencia_egresos = "SELECT SUM(cantidad) AS total_egresos FROM transacciones WHERE tipo = 'Egreso' AND id_usuario = {$_SESSION['id']}";

    if (!empty($fecha_inicio) && !empty($fecha_fin)) {
      $sentencia_ingresos .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
      $sentencia_egresos .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    }

    $resultado_ingresos = $conexion->query($sentencia_ingresos);
    $resultado_egresos = $conexion->query($sentencia_egresos);
    // Consultar y mostrar la suma de ingresos y egresos
  $sentencia_ingresos = "SELECT SUM(cantidad) AS total_ingresos FROM transacciones WHERE tipo = 'Ingreso' AND id_usuario = {$_SESSION['id']}";
  $sentencia_egresos = "SELECT SUM(cantidad) AS total_egresos FROM transacciones WHERE tipo = 'Egreso' AND id_usuario = {$_SESSION['id']}";
  if (!empty($fecha_inicio) && !empty($fecha_fin)) {
    $sentencia_ingresos .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    $sentencia_egresos .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
  }
    $resultado_ingresos = $conexion->query($sentencia_ingresos);
    $resultado_egresos = $conexion->query($sentencia_egresos);
  
    $fila_ingresos = $resultado_ingresos->fetch(PDO::FETCH_ASSOC);
    $fila_egresos = $resultado_egresos->fetch(PDO::FETCH_ASSOC);

    $total_ingresos = $fila_ingresos['total_ingresos'] ?? 0;
    $total_egresos = $fila_egresos['total_egresos'] ?? 0;
  // Mostrar el resumen
  echo "<h2>Resumen</h2>";
  echo "<p>Ingresos: $" . number_format($total_ingresos, 2) . "</p>";
  echo "<p>Egresos: $" . number_format($total_egresos, 2) . "</p>";
    }
?>
<div class="mb-3">
    <a name="" id="" class="btn btn-danger" href="home.php" role="button">Regresar</a>
  </div>
</body>
<?php
include("../../../templates/footer.php");
?>


  