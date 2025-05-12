<?php
session_start();
include '../../conexion.php'; // Incluir el archivo de conexión a la base de datos
echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <style> 
        .swal2-confirm { 
            background: #30807a !important; 
            background-color: #30807a !important; 
            --swal2-action-button-outline: 0 0 0 3px rgba(48, 128, 122, 0.5) !important; 
        } 
        .swal2-confirm:hover { 
            background: #0b4a46 !important; 
            background-color: #0b4a46 !important; 
            --swal2-action-button-outline: 0 0 0 3px rgba(48, 128, 122, 0.5) !important; 
        } 
    </style>
";

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $curp = isset($_POST['curp']) ? $_POST['curp'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';

    // Obtener el ID del paciente desde la sesión
    $idPaciente = $_SESSION['id'];

    // Preparar la consulta SQL para actualizar la información del paciente
    $sql = "UPDATE usuarios SET 
            nombre = ?, 
            curp = ?, 
            telefono = ?, 
            fecha_nacimiento = ?, 
            direccion = ?, 
            ciudad = ?, 
            estado = ?, 
            correo_electronico = ? 
            WHERE id = ?";

    // Preparar la declaración
    if ($stmt = $conexion->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("ssssssssi", $nombre, $curp, $telefono, $fecha_nacimiento, $direccion, $ciudad, $estado, $correo, $idPaciente);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Si la actualización fue exitosa, mostrar la alerta
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: 'La información del paciente ha sido actualizada correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Continuar'
                    }).then(() => {
                        window.location.href = 'profile.php'; // Redirigir a la página de perfil
                    });
                });
            </script>
            ";
            exit();
        } else {
            // Si hay error al actualizar, mostrar el mensaje de error
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'No se pudo actualizar la información. Inténtalo nuevamente.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
            ";
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        // Si hay un error en la preparación de la consulta, mostrar el error
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error en la consulta',
                    text: 'Error al preparar la consulta para actualizar los datos.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
        ";
    }
}

// Cerrar la conexión
$conexion->close();
?>
