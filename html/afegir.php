<?php

include("conexion.php");
if (isset($_POST['formulari'])) {

    $titol = $_POST['titol'];
    $autor = $_POST['autor'];
    $descripcio = $_POST['descripcio'];
    $uri = $_POST['uri'];

    $query = "INSERT INTO llibres(titol,autor,descripcio,uri,data_afegit) VALUES ('$titol','$autor','$descripcio', '$uri', now())";
    $res = mysqli_query($connexio, $query);

    if (!$res) {
        die("Ha ocurrido un error :(");
    }

    //header("Location: formulari.php");
}
?>