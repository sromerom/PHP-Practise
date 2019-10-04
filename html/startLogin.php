<?php

include("conexion.php");
session_start();

$usuari = $_POST['usuari'];
$contrasenya = $_POST['contrasenya'];

if (isset($_SESSION['usuari'])) {
    echo "Hay sesion";
    //$_SESSION['user'];
    include_once 'index.php';
} else if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
    echo "Validacion de login";

    /* VALIDAMOS si usuario existe*/
    $usuariForm = $_POST['usuari'];
    $contrasenyaForm = $_POST['contrasenya'];
    $contrasenyaMD5 = md5($contrasenya);

    $query = "SELECT * FROM usuaris WHERE nom = '$usuari' AND contrasenya = '$contrasenyaMD5'";
    $resultatLogin = mysqli_query($connexio, $query);

    if(mysqli_num_rows($resultatLogin) > 0) {
        //$_SESSION['usuariSession'] = $usuari;
        //header("Location: index.php");
        //echo "Usuario validado";
        $_SESSION['usuari'] = $usuariForm;

        include_once 'index.php';

        /*
        $queryAb = "SELECT * FROM usuaris WHERE usuari = '$usuari'";
        $resultatQueryAb = mysqli_query($connexio, $queryAb);

        foreach ($queryAb as $currentUser) {
            $usuari = $currentUser['usuari'];
            $usuari = $currentUser[''];
    
        }
        */
    } else {
        //echo "Usuari o contrasenya introduits incorrectament";
        $loginError = "Usuari o contrasenya introduits incorrectament";
        include_once 'login.php';
    }


} else {
    echo "Login";
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
