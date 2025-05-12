<?php
session_start();
include '../../conexion.php'; // tu conexión
echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <style> 
        .swal2-confirm { 
            background: #30807a !important; 
            background-color: #30807a !important; 
            --swal2-action-button-outline: 0 0 0 3px rgba(48, 128, 122, 0.5) !important; 
        } 
        .swal2-confirm:hover { 
            background: #0b4a46 !important; 
            background-color: #0b4a46 !important; 
            --swal2-action-button-outline: 0 0 0 3px rgba(48, 128, 122, 0.5) !important; 
        } 
    </style>
";

$idPaciente = $_SESSION['id'];

// Recibir datos del formulario
$tipoSangre = $_POST['tipo_sangre'];
$enfermedadesCronicas = $_POST['enfermedades_cronicas'];
$alergias = $_POST['alergias'];
$cirugiasRealizadas = $_POST['cirugias_realizadas'];
$prohibicionesMedicas = $_POST['prohibiciones_medicas'];
$especificacionesMedicas = $_POST['especificaciones_medicas'];

// Subir documento
$documentoHistorial = '';
if (isset($_FILES['documento_historial']) && $_FILES['documento_historial']['error'] == 0) {
    $directorioDestino = '../../uploads/historiales/';
    if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0777, true);
    }

    $nombreArchivo = basename($_FILES['documento_historial']['name']);
    $rutaArchivo = $directorioDestino . $nombreArchivo;

    if (move_uploaded_file($_FILES['documento_historial']['tmp_name'], $rutaArchivo)) {
        $documentoHistorial = $nombreArchivo;
    } else {
        // Error al subir
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'No se pudo subir el documento.',
                        icon: 'error',
                        confirmButtonText: 'Continuar'
                    }).then(() => {
                        window.location.href = 'profile.php'; // Redirigir a la página de perfil
                    });
                });
            </script>
            ";
        exit;
    }
}

// Verificar si ya existe registro
$sql_check = "SELECT id FROM usuarios WHERE id = ?";
$stmt_check = $conexion->prepare($sql_check);
$stmt_check->bind_param("i", $idPaciente);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    // Ya existe: Actualizamos
    if (!empty($documentoHistorial)) {
        $sql_update = "UPDATE usuarios SET tipo_sangre=?, enfermedades_cronicas=?, alergias=?, cirugias_realizadas=?, prohibiciones_medicas=?, especificaciones_medicas=?, documento_historial=? WHERE id=?";
        $stmt_update = $conexion->prepare($sql_update);
        $stmt_update->bind_param("sssssssi", $tipoSangre, $enfermedadesCronicas, $alergias, $cirugiasRealizadas, $prohibicionesMedicas, $especificacionesMedicas, $documentoHistorial, $idPaciente);
    } else {
        $sql_update = "UPDATE usuarios SET tipo_sangre=?, enfermedades_cronicas=?, alergias=?, cirugias_realizadas=?, prohibiciones_medicas=?, especificaciones_medicas=? WHERE id=?";
        $stmt_update = $conexion->prepare($sql_update);
        $stmt_update->bind_param("ssssssi", $tipoSangre, $enfermedadesCronicas, $alergias, $cirugiasRealizadas, $prohibicionesMedicas, $especificacionesMedicas, $idPaciente);
    }
    $stmt_update->execute();
    $stmt_update->close();
} else {
    // No existe: Insertamos nuevo registro
    $sql_insert = "INSERT INTO usuarios (id, tipo_sangre, enfermedades_cronicas, alergias, cirugias_realizadas, prohibiciones_medicas, especificaciones_medicas, documento_historial) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $conexion->prepare($sql_insert);
    $stmt_insert->bind_param("isssssss", $idPaciente, $tipoSangre, $enfermedadesCronicas, $alergias, $cirugiasRealizadas, $prohibicionesMedicas, $especificacionesMedicas, $documentoHistorial);
    $stmt_insert->execute();
    $stmt_insert->close();
}

$stmt_check->close();
$conexion->close();

// ✅ Mostrar alerta de éxito
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: 'La información del paciente ha sido actualizada correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Continuar'
                    }).then(() => {
                        window.location.href = 'profile.php'; // Redirigir a la página de perfil
                    });
                });
            </script>
            ";
?>
