<?php

include("conexion.php");
session_start();

$usuari = $_POST['usuari'];
$contrasenya = $_POST['contrasenya'];

if (isset($_SESSION['usuarip'])) {
    echo "Hay sesion";
    //$usuariForm = $_SESSION['usuarip'];
    include_once 'principal.php';
} else if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
    //echo "Validacion de login";

    /* VALIDAMOS si usuario existe*/
    $usuariForm = $_POST['usuari'];
    $contrasenyaForm = $_POST['contrasenya'];
    $contrasenyaMD5 = md5($contrasenya);
    $nomForm = "";

    $query = "SELECT * FROM usuaris WHERE usuari = '$usuari' AND contrasenya = '$contrasenyaMD5'";
    $resultatLogin = mysqli_query($connexio, $query);



    if (mysqli_num_rows($resultatLogin) > 0) {
        //echo "Usuario validado";

        $_SESSION['usuarip'] = "$usuariForm";

        include_once 'principal.php';
    } else {
        //echo "Usuari o contrasenya introduits incorrectament";
        $loginError = "Usuari o contrasenya introduits incorrectament";
        include_once 'login.php';
    }
} else {
    //echo "Login";
    include_once 'login.php';
}









/*
include("conexion.php");
session_start();

$usuari = $_POST['usuari'];
$contrasenya = $_POST['contrasenya'];
$contrasenyaMD5 = md5($contrasenya);

$query = "SELECT * FROM usuaris WHERE nom = '$usuari' AND contrasenya = '$contrasenyaMD5'";
$resultatLogin = mysqli_query($connexio, $query);

if(mysqli_num_rows($resultatLogin) > 0) {
    $_SESSION['usuariSession'] = $usuari;
    header("Location: index.php");
    echo "Inciado sesion correctamente.";
} else {
    echo "Usuari o contrasenya introduits incorrectament";
}
*/
