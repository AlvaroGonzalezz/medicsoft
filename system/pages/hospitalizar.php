<?php
include '../../conexion.php';

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";

// Verificar que llegaron todos los datos
if (isset($_GET['paciente'], $_GET['diag'], $_GET['habitacion'], $_GET['estado'], $_GET['enfermero'], $_GET['medico'], $_GET['obs'])) {
    $paciente = $_GET['paciente'];
    $diag = $_GET['diag'];
    $habitacion = $_GET['habitacion'];
    $estado = $_GET['estado'];
    $enfermero = $_GET['enfermero'];
    $medico = $_GET['medico'];
    $obs = $_GET['obs'];

    // Insertar en tabla hospitalizaciones
    $sql = "INSERT INTO hospitalizados (id, diagnostico_principal, numero_habitacion, estado_actual, id_enfermero, id_medico, observaciones, fecha_ingreso)
            VALUES ('$paciente', '$diag', '$habitacion', '$estado', '$enfermero', '$medico', '$obs', NOW())";

    if ($conexion->query($sql) === TRUE) {
        // Actualizar paciente como hospitalizado
        $update = "UPDATE usuarios SET hospitalizado = 1 WHERE id = '$paciente'";
        $conexion->query($update);

        // Mostrar alerta de éxito
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Paciente hospitalizado',
                text: 'El paciente ha sido hospitalizado exitosamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed || result.dismiss) {
                    window.location.href = 'dashboard-admin.php'; // Cambia esto por tu archivo tabla
                }
            });
        });
        </script>
        ";
    } else {
        // Error al insertar
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al hospitalizar al paciente.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed || result.dismiss) {
                    window.history.back();
                }
            });
        });
        </script>
        ";
    }
} else {
    // Datos incompletos
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error',
            text: 'Faltan datos para hospitalizar.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed || result.dismiss) {
                window.history.back();
            }
        });
    });
    </script>
    ";
}

$conexion->close();
