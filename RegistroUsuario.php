<?php
include("conexion.php");
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
// Recibir datos del formulario
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$curp = $_POST["curp"];
$telefono = $_POST["telefono"];
$fecha_nacimiento = $_POST["fecha-nacimiento"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$estado = $_POST["estado"];
$correo_electronico = $_POST["email"];
$contrasena = $_POST["pass"];
$tipo_sangre = $_POST["tipo_sangre"];
$enfermedades_cronicas = $_POST["enfermedadesCronicas"];
$alergias = $_POST["alergias"];
$cirugias_realizadas = $_POST["cirugiasRealizadas"];
$prohibiciones_medicas = $_POST["prohibicionesMedicas"];
$especificaciones_medicas = $_POST["especificacionesMedicas"];

// Subir archivos
$historial_medico = $_FILES["historialMedico"]["name"];
$fotografia_rostro = $_FILES["fotoRostro"]["name"];

// Carpetas donde guardarás los archivos (crea carpetas llamadas 'uploads/historiales' y 'uploads/fotos')
$historial_medico_path = "C:/xampp/htdocs/MedicSoft/uploads/historiales/" . $historial_medico;
move_uploaded_file($_FILES["historialMedico"]["tmp_name"], $historial_medico_path);

$fotografia_rostro_path = "C:/xampp/htdocs/MedicSoft/uploads/fotos/" . $fotografia_rostro;
move_uploaded_file($_FILES["fotoRostro"]["tmp_name"], $fotografia_rostro_path);


// Fecha actual de registro
$fecha_registro = date("Y-m-d H:i:s");

// Insertar en base de datos
$sql = "INSERT INTO usuarios (
    nombre, apellidos, curp, telefono, fecha_nacimiento, direccion, ciudad, estado,
    correo_electronico, contrasena, tipo_sangre, enfermedades_cronicas, alergias,
    cirugias_realizadas, prohibiciones_medicas, especificaciones_medicas,
    historial_medico, fotografia_rostro, fecha_registro, rol
) VALUES (
    '$nombre', '$apellidos', '$curp', '$telefono', '$fecha_nacimiento', '$direccion', '$ciudad', '$estado',
    '$correo_electronico', '$contrasena', '$tipo_sangre', '$enfermedades_cronicas', '$alergias',
    '$cirugias_realizadas', '$prohibiciones_medicas', '$especificaciones_medicas',
    '$historial_medico', '$fotografia_rostro', '$fecha_registro', 'Paciente'
)";


try {
    if ($conexion->query($sql) === TRUE) {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Registro exitoso!',
                text: 'Inicia sesión para continuar.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed || result.dismiss) {
                    window.location.href = 'login.php';
                }
            });
        });
        </script>
        ";
    }
} catch (mysqli_sql_exception $e) {
    // Si es duplicado
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error de registro',
                text: 'El CURP o correo electrónico ya está registrado.',
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
    } else {
        // Otro error
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error inesperado',
                text: 'Hubo un problema al registrar. Intenta nuevamente.',
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
}
