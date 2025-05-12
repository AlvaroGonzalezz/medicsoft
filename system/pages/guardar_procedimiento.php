<?php
include '../../conexion.php';

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";

if (isset($_POST['id_paciente'], $_POST['procedimiento'], $_POST['fecha'], $_POST['hora'])) {
    $idPaciente = $_POST['id_paciente'];
    $procedimiento = $_POST['procedimiento'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $stmt = $conexion->prepare("INSERT INTO procedimientos (id_paciente, procedimiento, fecha, hora) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $idPaciente, $procedimiento, $fecha, $hora);

    if ($stmt->execute()) {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Procedimiento registrado',
                text: 'Se guardó correctamente.',
                confirmButtonText: 'Aceptar'
            }).then(() => {

                window.location.href = 'pacientes-enfermero.php'; // Cambia esto por tu archivo tabla
            });
        });
        </script>
        ";
    } else {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo guardar el procedimiento.',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.history.back();
            });
        });
        </script>
        ";
    }

    $stmt->close();
} else {
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'warning',
            title: 'Datos incompletos',
            text: 'Faltan datos para registrar el procedimiento.',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            window.history.back();
        });
    });
    </script>
    ";
}

$conexion->close();
