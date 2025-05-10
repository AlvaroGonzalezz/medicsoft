<?php
include '../../conexion.php';
echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";
if (isset($_POST['editId'])) {
    $id = $_POST['editId'];
    $curp = $_POST['editCurp'];
    $nombre = $_POST['editNombre'];
    $fechaNacimiento = $_POST['editFechaNacimiento'];
    $telefono = $_POST['editTelefono'];
    $correo = $_POST['editCorreo'];
    $contrasena = $_POST['editContrasena'];

    // Actualizar en la BD
    $sql = "UPDATE usuarios SET 
                curp = '$curp', 
                nombre = '$nombre', 
                fecha_nacimiento = '$fechaNacimiento', 
                telefono = '$telefono', 
                correo_electronico = '$correo', 
                contrasena = '$contrasena'
            WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Actualizado',
                text: 'Los datos del personal fueron actualizados correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'personal.php'; // Cambia esto por tu tabla general
            });
        });
        </script>
        ";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al actualizar.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.history.back();
            });
        });
        </script>
        ";
    }

    $conexion->close();
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error',
            text: 'No se recibieron los datos.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            window.history.back();
        });
    });
    </script>
    ";
}
