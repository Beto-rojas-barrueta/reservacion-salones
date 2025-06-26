<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Reservar Salón - Casa de Cultura</title>

    <!-- Bootstrap y librerías necesarias -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Formulario de Reserva de Salón</h4>
        </div>
        <div class="card-body">

            <!-- Formulario -->
            <form method="POST" class="p-3" id="formReserva">
                <div class="form-group">
                    <label for="grupo_artistico">Grupo artístico</label>
                    <input type="text" class="form-control" id="grupo_artistico" name="grupo_artistico" required>
                </div>

                <div class="form-group">
                    <label for="tipo_evento">Tipo de evento</label>
                    <input type="text" class="form-control" id="tipo_evento" name="tipo_evento" required>
                </div>

                <div class="form-group">
                    <label for="publico_esperado">Público esperado</label>
                    <input type="number" class="form-control" id="publico_esperado" name="publico_esperado" required>
                </div>

                <div class="form-group">
                    <label for="id_salon">Salón</label>
                    <select class="form-control" id="id_salon" name="id_salon" required>
                        <?php
                        $salones = $conn->query("SELECT PK_ID_SALON, FL_NOMBRE, FL_CAPACIDAD FROM TB_SALONES");
                        while($row = $salones->fetch_assoc()) {
                            echo "<option value='{$row['PK_ID_SALON']}'>{$row['FL_NOMBRE']} (Capacidad: {$row['FL_CAPACIDAD']})</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>

                <div class="form-group">
                    <label for="hora_inicio">Hora inicio</label>
                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
                </div>

                <div class="form-group">
                    <label for="hora_fin">Hora fin</label>
                    <input type="time" class="form-control" id="hora_fin" name="hora_fin" required>
                </div>

                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                </div>

                <button type="button" class="btn btn-success" id="btnGuardarReserva">
                    Guardar reserva
                </button>
            </form>
        </div>

        <!-- Botón de regreso -->
        <div class="card-footer text-right">
            <a href="index.php" class="btn btn-secondary">
                ← Regresar al inicio
            </a>
        </div>
    </div>
</div>

<!-- Validación AJAX -->
<script>
    $('#btnGuardarReserva').on('click', function () {
        const datos = {
            id_salon: $('#id_salon').val(),
            fecha: $('#fecha').val(),
            hora_inicio: $('#hora_inicio').val(),
            hora_fin: $('#hora_fin').val()
        };

        if (!datos.fecha || !datos.hora_inicio || !datos.hora_fin) {
            Swal.fire('Faltan datos', 'Debes seleccionar fecha y horas', 'warning');
            return;
        }

        if (datos.hora_inicio >= datos.hora_fin) {
            Swal.fire('Error en horario', 'La hora de inicio debe ser menor que la hora de fin.', 'error');
            return;
        }

        $.post('verificar_disponibilidad.php', datos, function (respuesta) {
            if (respuesta.ocupado) {
                Swal.fire('Horario ocupado', 'Ya existe una reserva para ese horario en ese salón.', 'error');
            } else {
                $('#formReserva').submit();
            }
        }, 'json');
    });
</script>

<?php
// Lógica de guardado en el servidor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_salon = $_POST['id_salon'];
    $grupo = $_POST['grupo_artistico'];
    $tipo = $_POST['tipo_evento'];
    $fecha = $_POST['fecha'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $publico = $_POST['publico_esperado'];
    $obs = $_POST['observaciones'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM TB_RESERVAS 
        WHERE FK_ID_SALON = ? AND FL_FECHA = ? 
        AND ((FL_HORA_INICIO < ? AND FL_HORA_FIN > ?) 
          OR (FL_HORA_INICIO < ? AND FL_HORA_FIN > ?) 
          OR (FL_HORA_INICIO >= ? AND FL_HORA_FIN <= ?))");
    $stmt->bind_param("isssssss", $id_salon, $fecha, $hora_fin, $hora_inicio, $hora_inicio, $hora_fin, $hora_inicio, $hora_fin);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $existe = $resultado->fetch_assoc()['total'];
    $stmt->close();

    if ($existe > 0) {
        echo "<script>Swal.fire({ icon: 'warning', title: 'Horario ocupado', text: 'Ya existe una reservación para ese salón en ese horario. Intenta con otro horario.' });</script>";
    } else {
        $res = $conn->query("SELECT FL_CAPACIDAD FROM TB_SALONES WHERE PK_ID_SALON = $id_salon");
        $capacidad = $res->fetch_assoc()['FL_CAPACIDAD'];

        if ($publico > $capacidad) {
            echo "<script>Swal.fire({ icon: 'error', title: 'Capacidad excedida', text: 'El público esperado excede la capacidad del salón.' });</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO TB_RESERVAS 
                (FK_ID_SALON, FL_GRUPO_ARTISTICO, FL_TIPO_EVENTO, FL_FECHA, FL_HORA_INICIO, FL_HORA_FIN, FL_PUBLICO_ESPERADO, FL_OBSERVACIONES) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssssis", $id_salon, $grupo, $tipo, $fecha, $hora_inicio, $hora_fin, $publico, $obs);
            if ($stmt->execute()) {
                echo "<script>Swal.fire({ icon: 'success', title: 'Reserva registrada', text: 'La reserva se guardó correctamente.' });</script>";
            } else {
                echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo registrar la reserva: " . $stmt->error . "' });</script>";
            }
            $stmt->close();
        }
    }
}
?>
</body>
</html>
