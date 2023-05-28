<?php
//Conexion con la Base Datos
$servername = "192.168.1.137";
$username = "macshool";
$password = "mac05";
$database = "DB_PROJECTE";

// Crear conexión
$connection = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($connection->connect_error) {
    header("Location: ./errores/mantenimiento.html");
}
?>

