<?php
include '../../conexion.php';

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";

$folio = $_POST['folio'];

$sql = "UPDATE citas_medicas SET estado = 'Confirmada' WHERE folio = '$folio'";

if ($conexion->query($sql) === TRUE) {
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Cita Confirmada',
            text: 'La cita ha sido confirmada exitosamente.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            window.history.back(); // Vuelve a la tabla
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
            text: 'No se pudo confirmar la cita.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            window.history.back();
        });
    });
    </script>
    ";
}

$conexion->close();
?>
