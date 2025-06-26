<?php
require 'includes/db.php';

$id_salon = $_POST['id_salon'];
$fecha = $_POST['fecha'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];

$stmt = $conn->prepare("SELECT COUNT(*) AS total FROM TB_RESERVAS 
    WHERE FK_ID_SALON = ? AND FL_FECHA = ? 
    AND ((FL_HORA_INICIO < ? AND FL_HORA_FIN > ?) 
      OR (FL_HORA_INICIO < ? AND FL_HORA_FIN > ?) 
      OR (FL_HORA_INICIO >= ? AND FL_HORA_FIN <= ?))");

$stmt->bind_param("isssssss", $id_salon, $fecha, $hora_fin, $hora_inicio, $hora_inicio, $hora_fin, $hora_inicio, $hora_fin);
$stmt->execute();
$resultado = $stmt->get_result();
$total = $resultado->fetch_assoc()['total'];

echo json_encode(['ocupado' => $total > 0]);
?>
