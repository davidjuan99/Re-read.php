<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "reread"

//Crear la conexión
$conn = mysqli_connect($host, $user, $pass, $db);

//Checkear la conexión

if (!$conn) {
    echo "Error: No se pudo conectar a MySQL". PHP_EOL;
    echo "Error de depuración: ". mysqli_connect_erno(). PHP_EOL;
    exit;
} else {
    mysqli_set_charset($conn, "utf8");
}