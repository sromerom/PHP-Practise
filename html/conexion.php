<?php

$host = "localhost";
$usuari = "root";
$password = "";
$baseDades = "Llibreria";

$connexio = mysqli_connect($host, $usuari, $password, $baseDades);

/*
if ($connexio->connect_errno) {
    printf("BBDD:Conexión fallida: %s\n", $mysqli->connect_error);
    exit();
} else {
    echo 'Se ha conectado a la base de datos correctamente';
}
*/
?>