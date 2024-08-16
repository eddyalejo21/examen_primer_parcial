<?php
include_once '../app/config/DatabaseConnectionFactory.php';

// Crear una conexión
try {
    $conexion = DatabaseConnectionFactory::createConnection();
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

// Condicion para cerrar la sesión
if (isset($conexion) && $conexion) {
    mysqli_close($conexion);
}