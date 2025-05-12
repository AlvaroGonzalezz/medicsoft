<?php
include '../../conexion.php';


header('Content-Type: application/json');  // Asegúrate de que la respuesta sea JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipoEstudio = $_POST['tipoEstudio'];
    $fechaEstudio = $_POST['fechaEstudio'];
    $observaciones = $_POST['observaciones'];
    $idPaciente = $_POST['idPaciente']; // Asegúrate que lo mandas desde el form o JS

    // Manejo de archivo
    $archivoNombre = $_FILES['archivoEstudio']['name'];
    $archivoTmp = $_FILES['archivoEstudio']['tmp_name'];
    $archivoDestino = '../../archivos_estudios/' . uniqid() . '_' . $archivoNombre;

    if (move_uploaded_file($archivoTmp, $archivoDestino)) {
        // Insertar en la tabla
        $sql = "INSERT INTO estudios_medicos (id_paciente, tipo_estudio, archivo, observaciones, fecha_estudio) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('issss', $idPaciente, $tipoEstudio, $archivoDestino, $observaciones, $fechaEstudio);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'ok', 'msg' => 'Estudio guardado exitosamente.']);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Error al guardar en la base de datos.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Error al subir archivo.']);
    }
} else {
    echo json_encode(['status' => 'error', 'msg' => 'Petición inválida.']);
}

?>
