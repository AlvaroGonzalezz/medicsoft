<?php
include '../../conexion.php';

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";
if (isset($_GET['estado']) && isset($_GET['id'])) {
    $estado = $_GET['estado'];
    $id = $_GET['id'];

    // Ahora usamos el ID recibido
    $sql = "UPDATE usuarios SET estado_laboral = '$estado' WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Estado actualizado',
                text: 'El estado laboral ha sido actualizado correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed || result.dismiss) {
                    window.history.back();
                }
            });
        });
        </script>
        ";
    } else {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al actualizar el estado.',
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
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error',
            text: 'No se recibió el estado o el ID.',
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
