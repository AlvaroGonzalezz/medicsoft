<?php
include '../../conexion.php'; // Ajusta la ruta si es necesario

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<style>
.swal2-confirm { background: #30807a !important; }
.swal2-confirm:hover { background: #0b4a46 !important; }
</style>
";

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos
$curp = $_POST['curp'];
$nombre = $_POST['nombre'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

// Generar contraseña aleatoria
$contrasena = $_POST['contrasena'];


// Guardar foto
$fotoNombre = $_FILES['imgRostro']['name'];
$fotoTmp = $_FILES['imgRostro']['tmp_name'];
$rutaFoto = '../../uploads/fotos/' . $nombre . "-" . $fotoNombre ;

if (move_uploaded_file($fotoTmp, $rutaFoto)) {
    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (curp, nombre, fecha_nacimiento, telefono, correo_electronico, contrasena, rol, fotografia_rostro, fecha_registro)
    VALUES ('$curp', '$nombre', '$fechaNacimiento', '$telefono', '$correo', '$contrasena', 'Enfermero', '$rutaFoto', NOW())";

    if ($conexion->query($sql) === TRUE) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Enfermero registrado',
                text: 'El enfermero ha sido registrado exitosamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                            window.location.href = 'personal.php';

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
                text: 'No se pudo registrar al enfermero.',
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
    Swal.fire({
        title: 'Error',
        text: 'No se pudo subir la fotografía.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
    }).then(() => {
        window.history.back();
    });
    </script>
    ";
}

$conexion->close();
