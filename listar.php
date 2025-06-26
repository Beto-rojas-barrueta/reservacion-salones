<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Reservas - Casa de Cultura</title>
    <!-- CSS de Bootstrap y AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DEG6KHBXPJ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-DEG6KHBXPJ');
    </script>
</head>
<body class="hold-transition sidebar-mini">

<div class="container mt-5">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Listado de Reservas</h3>
        </div>
        <div class="card-body table-responsive p-0" style="max-height: 600px;">
            <table class="table table-hover text-nowrap table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Grupo Artístico</th>
                        <th>Tipo de Evento</th>
                        <th>Salón</th>
                        <th>Fecha</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Público Esperado</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT r.*, s.FL_NOMBRE FROM TB_RESERVAS r
                        JOIN TB_SALONES s ON r.FK_ID_SALON = s.PK_ID_SALON
                        ORDER BY r.FL_FECHA ASC, r.FL_HORA_INICIO DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['FL_GRUPO_ARTISTICO']) . "</td>
                            <td>" . htmlspecialchars($row['FL_TIPO_EVENTO']) . "</td>
                            <td>" . htmlspecialchars($row['FL_NOMBRE']) . "</td>
                            <td>" . $row['FL_FECHA'] . "</td>
                            <td>" . $row['FL_HORA_INICIO'] . "</td>
                            <td>" . $row['FL_HORA_FIN'] . "</td>
                            <td>" . $row['FL_PUBLICO_ESPERADO'] . "</td>
                            <td>" . htmlspecialchars($row['FL_OBSERVACIONES']) . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Botón de regreso -->
        <div class="card-footer text-right">
            <a href="index.php" class="btn btn-secondary">
                ← Regresar al inicio
            </a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
