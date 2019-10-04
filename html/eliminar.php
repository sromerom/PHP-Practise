<?php

include("conexion.php");
if (isset($_POST['formulari2'])) {

    $id_llibre = $_POST['id_llibre'];
    echo $id_llibre;
    $query2 = "DELETE FROM llibres WHERE id_llibre = $id_llibre";
    $res2 = mysqli_query($connexio, $query2);



    if (!$res2) {
        die("Ha ocurrido un error :(");
    }

    header("Location: formulari.php");
}
mysqli_close($connexio);
?>