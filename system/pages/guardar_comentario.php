<?php
include '../../conexion.php';
session_start();
echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";
if (isset($_POST['id_paciente'], $_POST['comentario'])) {
    $id_paciente = $_POST['id_paciente'];
    $codigo = $_POST['codigo'];
    $comentario = $_POST['comentario'];
    $id_usuario = $_SESSION['id']; // Quien hace el comentario (enfermero o médico)

    $stmt = $conexion->prepare("INSERT INTO comentarios (id_paciente, id_usuario, comentario) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $id_paciente, $id_usuario, $comentario);

    if ($stmt->execute()) {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Comentario registrado',
                text: 'Se registro correctamente.',
                confirmButtonText: 'Aceptar'
            }).then(() => {

                window.location.href = 'seguimiento.php?codigo=$codigo'; // Cambia esto por tu archivo tabla
            });
        });
        </script>
        ";
        $stmt->close();
        exit();
    } else {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo guardar el comentario.',
                confirmButtonText: 'Aceptar'
            }).then(() => {

                window.location.href = 'seguimiento.php?codigo=$codigo'; // Cambia esto por tu archivo tabla
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
                icon: 'error',
                title: 'Error',
                text: 'No se pudo guardar el comentario.',
                confirmButtonText: 'Aceptar'
            }).then(() => {

                window.location.href = 'seguimiento.php?codigo=$codigo'; // Cambia esto por tu archivo tabla
            });
        });
        </script>
        ";
}
