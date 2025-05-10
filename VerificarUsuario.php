<?php
// Conexión a la base de datos
include 'conexion.php';
echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <style> .swal2-confirm { background: #30807a !important; background-color: #30807a !important; --swal2-action-button-outline: 0 0 0 3px rgba(48, 128, 122, 0.5) !important; } .swal2-confirm:hover { background: #0b4a46 !important; background-color: #0b4a46 !important; --swal2-action-button-outline: 0 0 0 3px rgba(48, 128, 122, 0.5) !important; } </style>
        ";
// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$pass = $_POST['password'];

// Consulta segura para verificar usuario
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo_electronico = ? AND contrasena = ?");
$stmt->bind_param("ss", $email, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Usuario encontrado
    $row = $result->fetch_assoc();
    $rol = $row['rol'];
    $nombre = $row['nombre'];
    $apellidos = $row['apellidos'];
    $curp = $row['curp'];
    $telefono = $row['telefono'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
    $direccion = $row['direccion'];
    $ciudad = $row['ciudad'];
    $estado = $row['estado'];
    $tipo_sangre = $row['tipo_sangre'];
    $enfermedades_cronicas = $row['enfermedades_cronicas'];
    $alergias = $row['alergias'];
    $cirugias_realizadas = $row['cirugias_realizadas'];
    $prohibiciones_medicas = $row['prohibiciones_medicas'];
    $especificaciones_medicas = $row['especificaciones_medicas'];
    $historial_medico = $row['historial_medico'];
    $fotografia_rostro = $row['fotografia_rostro'];
    $correo_electronico = $row['correo_electronico'];
    $contrasena = $row['contrasena'];
    $id = $row['id'];
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['rol'] = $rol;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellidos'] = $row['apellidos'];
    $_SESSION['curp'] = $curp;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['fecha_nacimiento'] = $fecha_nacimiento;
    $_SESSION['direccion'] = $direccion;
    $_SESSION['ciudad'] = $ciudad;
    $_SESSION['estado'] = $estado;
    $_SESSION['tipo_sangre'] = $tipo_sangre;
    $_SESSION['enfermedades_cronicas'] = $enfermedades_cronicas;
    $_SESSION['alergias'] = $alergias;
    $_SESSION['cirugias_realizadas'] = $cirugias_realizadas;
    $_SESSION['prohibiciones_medicas'] = $prohibiciones_medicas;
    $_SESSION['especificaciones_medicas'] = $especificaciones_medicas;
    $_SESSION['historial_medico'] = $historial_medico;
    $_SESSION['fotografia_rostro'] = $fotografia_rostro;
    $_SESSION['correo_electronico'] = $correo_electronico;
    $_SESSION['contrasena'] = $contrasena;
    $_SESSION['id'] = $id;

    // Redirigir según el rol
    if ($rol == "Paciente") {
        header("Location: system/pages/dashboard.php");
    } elseif ($rol == "Enfermero") {
        header("Location: system/pages/dashboard-admin.php");
    } elseif ($rol == "Medico") {
        header("Location: medico.html");
    } elseif ($rol == "Administrativo") {
        header("Location: system/pages/dashboard-admin.php");
    } else {
        // Rol desconocido
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: 'Rol de usuario no reconocido.',
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
    // Usuario no encontrado
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error de inicio de sesión',
            text: 'Correo o contraseña incorrectos.',
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

$stmt->close();
$conexion->close();
