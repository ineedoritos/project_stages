<?php
  include("../../../conexion_db/db.php");
include("../../../templates/headUser.php");

//variable de sesión
$fk_usuario = $_SESSION["id"];


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


    //encontrar salario del usuario
    $sentencia_salario = "SELECT salario from usuarios WHERE id = :id_usuario;";
  
      // Preparar la consulta
      $stmt_salario = $conexion->prepare($sentencia_salario);
  
      // Ejecutar la consulta
      $stmt_salario->execute(array(':id_usuario' => $fk_usuario));
  
      // Obtener el resultado
      $resultado_salario = $stmt_salario->fetch(PDO::FETCH_ASSOC);


    //encontrar saldo disponible 
    $sentencia_saldo_disponible = "SELECT usuarios.salario 
    + SUM(CASE WHEN transacciones.tipo = 'ingreso' THEN transacciones.cantidad ELSE 0 END) 
    - SUM(CASE WHEN transacciones.tipo = 'egreso' THEN transacciones.cantidad ELSE 0 END) 
    AS saldo_disponible
    FROM usuarios 
    LEFT JOIN transacciones ON usuarios.id = transacciones.id_usuario 
    WHERE usuarios.id = :id_usuario 
    GROUP BY usuarios.id, usuarios.salario;";
  
    // Preparar la consulta
    $stmt_saldo_disponible = $conexion->prepare($sentencia_saldo_disponible);

    // Ejecutar la consulta
    $stmt_saldo_disponible->execute(array(':id_usuario' => $fk_usuario));

    // Obtener el resultado
    $resultado_saldo_disponible = $stmt_saldo_disponible->fetch(PDO::FETCH_ASSOC);
?>

<body>

<div class="center-container redondeado">
    <div class="row">


            <div class="col-md-6 mt-5">
            <!-- Contenido de la columna izquierda -->

            <div class=" alert bg-dark text-white text-center m-1">
                    <h5>Mi salario: <?php echo " $".$resultado_salario['salario']; ?></h5>
                    <h5>Saldo disponible: <?php echo " $".$resultado_saldo_disponible['saldo_disponible']; ?></h5>

                    <a href="editar_salario.php" class="text-decoration-none text-white">
                        <div class=" alert bg-primary text-center m-1">
                            <h5>Modificar mi salario</h5>
                        </div>
                    </a>
                </div>

                <div class=" alert bg-dark text-white text-center m-1">
                    <h5>Mis ingresos: <?php echo " $".number_format($total_ingresos, 2); ?></h5>
                </div>

                <div class=" alert bg-dark text-white text-center m-1">
                    <h5>Mis egresos: <?php echo " $".number_format($total_egresos, 2); ?></h5>
                </div>

                <a href="home.php" class="text-decoration-none text-white">
                <div class=" alert bg-danger text-white text-center m-1 ">
                    <h5>Regresar</h5>
                </div>
                </a>

            </div>

            <div class="col-md-6 mt-2 p-5">
                <div class="container bg-dark p-2 mb-3 text-white text-center rounded">
                    <form method="post">
                    <h1>Filtrar registros</h1>
                <div class="mb-3">
                    <h6>Fecha desde:</h6>
                    <input type="date" 
                    class="form-control redondeado border border-1 border-dark rounded" name="fecha_inicio" id="" aria-describedby="helpId" placeholder="Ingrese la fecha de la transacción">
                </div>
            <div class="mb-3">
                <h6>Fecha hasta:</h6>
                <input type="date" 
                class="form-control redondeado border border-1 border-dark rounded" name="fecha_fin" id="" aria-describedby="helpId" placeholder="Ingrese la fecha de la transacción">
            </div>
            <input class="btn btn-primary" type="submit" value="Consultar">
                    </form>

                </div>
            <!-- Contenido de la columna izquierda -->
                    <?php
                    if ($resultado->rowCount() > 0) {
                        echo "<table class='text-center p-3 table table-dark table-hover rounded'>";
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
                    } else if ($resultado->rowCount() == 0) {
                        echo "<div class='alert alert-danger text-center role='alert'>";
                        echo "<strong><h4>Parece que no has registrado ningún tipo de transacción</h4></strong>";
                        echo "</div>";
                    }

                    
                    ?>
            </div>

    </div> <!---div que cierra a row-->
</div>  <!---div que cierra a row-->


<?php
include("../../../templates/footer.php");
?>


  