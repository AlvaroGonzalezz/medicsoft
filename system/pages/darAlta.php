<?php
include '../../conexion.php';
echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";

if (isset($_GET['idPaciente'], $_GET['observaciones'], $_GET['idMedico'])) {
    $idPaciente = $_GET['idPaciente'];
    $observaciones = $_GET['observaciones'];
    $idMedico = $_GET['idMedico'];

    $conexion->begin_transaction();

    try {
        // Insertar alta
        $stmt = $conexion->prepare("INSERT INTO altas (id_paciente, id_medico, observaciones) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $idPaciente, $idMedico, $observaciones);
        $stmt->execute();
        $stmt->close();

        // Actualizar hospitalizado
        $stmtUpdate = $conexion->prepare("UPDATE usuarios SET hospitalizado = 0 WHERE id = ?");
        $stmtUpdate->bind_param("i", $idPaciente);
        $stmtUpdate->execute();
        $stmtUpdate->close();

        // Eliminar registro en hospitalizados
        $stmtDelete = $conexion->prepare("DELETE FROM hospitalizados WHERE id = ?");
        $stmtDelete->bind_param("i", $idPaciente);
        $stmtDelete->execute();
        $stmtDelete->close();

        $conexion->commit();

        // ✅ ALERTA de éxito
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Paciente dado de alta',
                text: 'El alta fue registrada y el paciente ya no figura como hospitalizado.',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'dashboard-medico.php';
            });
        });
        </script>
        ";
    } catch (Exception $e) {
        $conexion->rollback();

        // ❌ ALERTA de error
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al registrar el alta.',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.history.back();
            });
        });
        </script>
        ";
    }
} else {
    // ⚠️ ALERTA de datos incompletos
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'warning',
            title: 'Datos incompletos',
            text: 'Faltan datos para dar de alta al paciente.',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            window.history.back();
        });
    });
    </script>
    ";
}

$conexion->close();
?>
