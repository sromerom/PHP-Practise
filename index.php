<?php
// Notificar solamente errores de ejecución
error_reporting(E_ERROR);
include("conexion.php");
session_start();

if (isset($_POST['sendLogin'])) {
    $usuari = $_POST['usuari'];
    $contrasenya = $_POST['contrasenya'];
}

if (isset($_SESSION['usuarip'])) {
    //echo "Sessio en funcionament";
    //$usuariForm = $_SESSION['usuarip'];
    include_once 'principal.php';
} else if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
    //echo "Validacion de login";

    /* VALIDACIO USUARI */
    $usuariForm = $_POST['usuari'];
    $contrasenyaForm = $_POST['contrasenya'];
    $contrasenyaMD5 = md5($contrasenya);
    $nomForm = "";

    $query = "SELECT * FROM usuaris WHERE usuari = '$usuari' AND contrasenya = '$contrasenyaMD5'";
    $resultatLogin = mysqli_query($connexio, $query);
    $row = mysqli_fetch_array($resultatLogin);


    if (mysqli_num_rows($resultatLogin) > 0) {
        //echo "Usuario validado";

        $_SESSION['usuarip'] = $usuariForm;
        $_SESSION['nomSessio'] = $row['nom'];

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