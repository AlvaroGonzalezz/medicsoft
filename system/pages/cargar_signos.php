<?php
include '../../conexion.php';

if (isset($_POST['id'])) {
  $id_paciente = $_POST['id'];

  // Consulta para obtener los signos vitales del paciente
  $sql = "SELECT * FROM usuarios WHERE id = ?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("i", $id_paciente);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    echo json_encode([
      'status' => 'ok',
      'signos' => [
        'temperatura' => $fila['temperatura'],
        'fc' => $fila['fc'],
        'paSistolica' => $fila['pa_sistolica'],
        'paDiastolica' => $fila['pa_diastolica'],
        'fr' => $fila['fr'],
        'saturacion' => $fila['saturacion'],
        'observaciones' => $fila['observaciones']
      ]
    ]);
  } else {
    echo json_encode(['status' => 'error', 'msg' => 'No se encontraron signos vitales para este paciente']);
  }
}
?>
