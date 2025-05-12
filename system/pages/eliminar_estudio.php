<?php
include '../../conexion.php';

$id = $_POST['id'] ?? 0;

if ($id > 0) {
  // Primero obtenemos la ruta del archivo
  $query = "SELECT archivo FROM estudios_medicos WHERE id = $id";
  $res = mysqli_query($conexion, $query);
  $row = mysqli_fetch_assoc($res);

  // Borramos archivo físico
  if ($row && file_exists($row['archivo'])) {
    unlink($row['archivo']);
  }

  // Borramos registro de la BD
  $delete = "DELETE FROM estudios_medicos WHERE id = $id";
  if (mysqli_query($conexion, $delete)) {
    echo json_encode(['status' => 'ok', 'msg' => 'Estudio eliminado.']);
  } else {
    echo json_encode(['status' => 'error', 'msg' => 'No se pudo eliminar.']);
  }
} else {
  echo json_encode(['status' => 'error', 'msg' => 'ID inválido.']);
}
?>
