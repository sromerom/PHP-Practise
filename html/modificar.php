<?php
if (isset($_POST["id_llibreMod"])) {

  $id_llibre = $_POST["id_llibreMod"];

  include("conexion.php");

  $sql = "UPDATE llibres SET titol='" . $_POST["titolMod"] . "',
      autor='" . $_POST["autorMod"] . "',
      descripcio='" . $_POST["descripcioMod"] . "',
      uri='" . $_POST["uriMod"] . "',
      data_afegit= now() WHERE id_llibre=" . $id_llibre;

  $resultatMod = mysqli_query($connexio, $sql);
  //header("Location: formulari.php");
} else {
  echo 'Error al obtener el ID del llibre.';
}
