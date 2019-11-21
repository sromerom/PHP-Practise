<?php

include("conexion.php");
session_start();
$varSession = $_SESSION['usuarip'];
if ($varSession == null || $varSession = '') {

    //include("denied.php");

    //header("location: denied.php");
    //die();
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
                <li><a href="#principi" class="btn btn-light btn-lg">Principi</a></li>
                <li><a href="principal.php" class="btn btn-light btn-lg">Inici</a></li>
                <li><a href="formulari.php" class="btn btn-light btn-lg">Gestiona</a></li>
                <li><a href="endLogin.php" class="btn btn-light btn-lg">Surt</a></li>
            </ul>
            <p>Benvingut
                <?php
                //echo $_SESSION['usuarip'];
                //echo $_SESSION['usuarip'];
                echo $_SESSION['nomSessio'];
                ?>
            </p>
        </section>
    </header>
    <main id="principi">
        <a href="#abaix">Ves al footer</a>
        <?php
        include('conexion.php');
        if (isset($_GET['id_llibre'])) {
            $id_llibre = $_GET['id_llibre'];

            $consulta = "SELECT * FROM llibres WHERE id_llibre =" . $id_llibre;
            $resCon = mysqli_query($connexio, $consulta);
            if ($resCon) {
                $row = $resCon->fetch_assoc();

                echo 'Dades del llibre seleccionat: <br/>';

                //<form action="modificar.php" method="post">
                echo '<form action="modificar.php" method="POST" class="disFormulari">';


                //<label for="txt_ID" id="ID-ariaLabel">ID</label>
                //<input id="txt_ID" name="txt_ID" type="text" aria-labelledby="ID-ariaLabel">
                echo '<label for="id_llibreMod" id="ID-ariaLabel">ID: (Obligatori)</label><br>';
                echo '<input id="id_llibreMod" name="id_llibreMod" value="' . $row['id_llibre'] . '" type="text" aria-labelledby="ID-ariaLabel" title="Inserta id llibre. Aquest es un camp obligatori" /></br>';



                //<label for="txt_Títol" id="Títol-ariaLabel">Títol</label>
                //<input id="txt_Títol" name="txt_Títol" type="text" aria-labelledby="Títol-ariaLabel">
                echo '<label for="titolMod" id="Títol-ariaLabel">Títol: (Obligatori)</label><br>';
                echo '<input id="titolMod" name="titolMod" value="' . $row['titol'] . '" type="text" aria-labelledby="Títol-ariaLabel" title="Inserta titol del llibre. Aquest es un camp obligatori"/></br>';



                //<label for="txt_Autor" id="Autor-ariaLabel">Autor</label>
                //<input id="txt_Autor" name="txt_Autor" type="text" aria-labelledby="Autor-ariaLabel">
                echo '<label for="autorMod" id="Autor-ariaLabel">Autor: (Obligatori)</label><br>';
                echo '<input id="autorMod" name="autorMod" value="' . $row['autor'] . '" type="text" aria-labelledby="Autor-ariaLabel" title="Inserta el autor del llibre. Aquest es un camp obligatori"/></br>';



                //<label for="txtarea_Descripció" id="Descripció-ariaLabel">Descripció</label>
                //<textarea id="txtarea_Descripció" name="txtarea_Descripció" cols="20" rows="3" aria-labelledby="Descripció-ariaLabel"></textarea>
                echo '<label for="descripcioMod" id="Descripció-ariaLabel">Descripció: (Obligatori)</label><br>';
                echo '<textarea id="descripcioMod" name="descripcioMod" cols="40" rows="10" aria-labelledby="Descripció-ariaLabel" title="Inserta una descripció del llibre. Aquest es un camp obligatori">' . $row['descripcio'] . '</textarea></br>';



                //<label for="txt_Uri" id="Uri-ariaLabel">Uri</label>
                //<input id="txt_Uri" name="txt_Uri" type="text" aria-labelledby="Uri-ariaLabel">
                echo '<label for="uriMod" id="Uri-ariaLabel">Uri: (Obligatori)</label><br>';
                echo '<input id="uriMod" name="uriMod" value="' . $row['uri'] . '" type="text" aria-labelledby="Uri-ariaLabel title="Inserta una url de la imatge. Aquest es un camp obligatori"" /></br>';

                echo '<button type="submit" class="btn btn-warning">Modifica</button>';
                echo '</form>';
            }
        }

        mysqli_close($connexio);
        ?>
    </main>
    <a href="#principi">Ves al principi</a>
    <footer id="abaix">
        <section class="container">
            <section class="name">
                <p>Samuel Romero Marín
                    <span>&copy</span>
                </p>
            </section>
            <section class="socialMedia">
                <ul>
                    <li><a href="https://www.facebook.com/esliceu.escola.cooperativa" alt="Logo facebook que et redirecciona cap al facebook del liceu" target="_blank">Facebook Es Liceu</a></li>
                    <li><a href="http://www.esliceu.com/feed/" alt="Logo rss que et redirecciona cap al rss del liceu" target="_blank">RSS Es Liceu</a></li>
                    <li><a href="https://twitter.com/EsLiceu" alt="Logo twitter que et redirecciona cap al twitter del liceu" target="_blank">Twitter Es Liceu</a></li>
                </ul>
            </section>
        </section>
    </footer>
</body>

</html>