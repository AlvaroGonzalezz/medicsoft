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

// Obtener datos del formulario
$curp = $_POST['curp'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$tipoConsulta = $_POST['tipoConsulta'];
$fecha = $_POST['fecha'];

// Obtener y juntar hora y minutos
$horaSelect = $_POST['hora'];  // Ejemplo: 10
$minutoSelect = $_POST['minuto']; // Ejemplo: 30
$hora = $horaSelect . ":" . $minutoSelect; // Resultado: 10:30

$motivo = $_POST['motivo'];

// Generar folio único
$folio = "CITA-" . date('Ymd') . "-" . rand(1000, 9999);

// Insertar en la tabla citas_medicas
$sql = "INSERT INTO citas_medicas (folio, curp_paciente, nombre_paciente, correo_paciente, tipo_consulta, fecha, hora, motivo, fecha_registro)
VALUES ('$folio', '$curp', '$nombre', '$correo', '$tipoConsulta', '$fecha', '$hora', '$motivo', NOW())";

if ($conexion->query($sql) === TRUE) {
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Cita Agendada',
            html: 'Tu folio es: <b>$folio</b><br>Guárdalo para futuras consultas.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            window.location.href = document.referrer;
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
            text: 'No se pudo registrar la cita.',
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
