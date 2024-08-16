<?php

class DatabaseConnectionFactory
{
    public static function createConnection()
    {
        $host = 'localhost';
        $usuario = 'root';
        $pass = '';
        $base = 'clinica';
        $port = '3306';

        error_log("Conectando a la base de datos con los siguientes parámetros:");
        error_log("Host: $host");
        error_log("Usuario: $usuario");
        error_log("Base de datos: $base");
        error_log("Puerto: $port");

        // Conexión a la base de datos
        $conexion = mysqli_connect($host, $usuario, $pass, $base, $port);

        // Verificar la conexión
        if ($conexion === false) {
            error_log("Error al conectar con el servidor: " . mysqli_connect_error());
            throw new Exception("Error al conectar con el servidor: " . mysqli_connect_error());
        }

        // Configuración de caracteres
        if (!mysqli_set_charset($conexion, "utf8")) {
            error_log("Error al establecer el conjunto de caracteres: " . mysqli_error($conexion));
            throw new Exception("Error al establecer el conjunto de caracteres: " . mysqli_error($conexion));
        }

        // Mensaje de conexión exitosa
        error_log("La base de datos se ha conectado correctamente");

        return $conexion;
    }
}