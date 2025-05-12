<?php
include '../../conexion.php'; // Ajusta la ruta si es necesario
header('Content-Type: application/json');

try {
    // Recolecta datos enviados por JS
    $id_paciente = $_POST['id'];
    $temperatura = $_POST['temperatura'];
    $fc = $_POST['fc'];
    $paSistolica = $_POST['paSistolica'];
    $paDiastolica = $_POST['paDiastolica'];
    $fr = $_POST['fr'];
    $saturacion = $_POST['saturacion'];
    $observaciones = $_POST['observaciones'];

    // Prepara la consulta UPDATE en la tabla usuarios
    $sql = "UPDATE usuarios SET 
                temperatura = ?, 
                fc = ?, 
                pa_sistolica = ?, 
                pa_diastolica = ?, 
                fr = ?, 
                saturacion = ?, 
                observaciones = ?
            WHERE id = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param(
        "ddddddsi",
        $temperatura,
        $fc,
        $paSistolica,
        $paDiastolica,
        $fr,
        $saturacion,
        $observaciones,
        $id_paciente
    );

    if ($stmt->execute()) {
        echo json_encode(['status' => 'ok', 'msg' => 'Signos vitales guardados correctamente']);
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Error al guardar']);
    }

    $stmt->close();
    $conexion->close();
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'msg' => 'Excepción: ' . $e->getMessage()]);
}
