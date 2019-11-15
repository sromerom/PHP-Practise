<?php

include("conexion.php");
session_start();
$varSession = $_SESSION['usuarip'];
if ($varSession == null || $varSession = '') {

    include("denied.php");

    header("location: denied.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="En aquesta pàgina trobaràs tota classe de llibres a on podràs des de visualitzar les dades d'un llibre
    fins i tot comprar-los sense cap tipus de problema. Disponible tant en físic com en electrònic.">
    <meta name="keywords" content="Llibres,Llibreria,Online,Electronic,Paper,Projecte,Liceu">
    <meta name="author" content="Samuel Romero Marín">

    <!-- CSS -->
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/formModificar.css">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="src/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="src/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="src/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="src/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="src/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="src/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="src/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="src/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="src/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="src/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="src/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="src/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="src/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Seguiment amb google analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152549941-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-152549941-1');
    </script>


    <title>Compra Llibres | Modifica llibre</title>
</head>

<body>
    <header>
        <section id="menu">
            <h1><img src="../src/logo.png" alt="Logo de la pàgina" id="logo"></h1>
            <ul>
                <li><a href="../html/index.php" class="btn btn-info btn-lg">Inici</a></li>
                <li><a href="../html/formulari.php" class="btn btn-info btn-lg">Gestiona</a></li>
            </ul>
        </section>
    </header>
    <main>
        <?php
        include('conexion.php');
        if (isset($_GET['id_llibre'])) {
            $id_llibre = $_GET['id_llibre'];

            $consulta = "SELECT * FROM llibres WHERE id_llibre =" . $id_llibre;
            $resCon = mysqli_query($connexio, $consulta);
            if ($resCon) {
                $row = $resCon->fetch_assoc();

                echo 'Dades del llibre seleccionat: <br/>';
                echo '<form action="modificar.php" method="POST" class="disFormulari">';

                echo '<label for="id_llibreMod">ID: </label><br>';
                echo '<input name="id_llibreMod" value="' . $row['id_llibre'] . '" type="text" /></br>';

                echo '<label for="titolMod">Títol: </label><br>';
                echo '<input name="titolMod" value="' . $row['titol'] . '" type="text" /></br>';

                echo '<label for="autorMod">Autor: </label><br>';
                echo '<input name="autorMod" value="' . $row['autor'] . '" type="text" /></br>';

                echo '<label for="descripcioMod">Descripció: </label><br>';
                echo '<textarea name="descripcioMod" cols="40" rows="10">' . $row['descripcio'] . '</textarea></br>';

                echo '<label for="uriMod">Uri: </label><br>';
                echo '<input name="uriMod" value="' . $row['uri'] . '" type="text" /></br>';

                echo '<button type="submit" class="btn btn-warning">Modifica</button>';
                echo '</form>';
            }
        }

        mysqli_close($connexio);
        ?>
    </main>
</body>

</html>