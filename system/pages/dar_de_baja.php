<?php
include '../../conexion.php';
echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";
// Verificar si se recibió un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para dar de baja (puedes cambiar "DELETE" por "UPDATE estado_laboral = 'Inactivo'" si prefieres solo desactivarlo)
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        // Baja exitosa, mostramos alerta y redirigimos
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Usuario dado de baja',
                text: 'El enfermero fue eliminado correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed || result.dismiss) {
                    window.location.href = 'personal.php'; // <-- cambia por el nombre correcto de tu archivo tabla
                }
            });
        });
        </script>
        ";
    } else {
        // Error al dar de baja
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al dar de baja al usuario.',
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
    // No se recibió ID
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error',
            text: 'No se recibió el ID del usuario.',
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
