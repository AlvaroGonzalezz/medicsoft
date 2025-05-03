<?php 
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base = "medicsoft";
$conexion = mysqli_connect($servidor, $usuario, $clave, $base);
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
} else {
    // echo "Conexión exitosa a la base de datos.";
}
