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
    <link rel="stylesheet" href="css/llibre.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Seguiment amb google analytics -->
    <!-- Google Analytics -->
    <script>
        window.ga = window.ga || function() {
            (ga.q = ga.q || []).push(arguments)
        };
        ga.l = +new Date;
        ga('create', 'UA-152549941-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
    <!-- End Google Analytics -->

    <title>Compra Llibres | Dades del Llibre</title>
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
                session_start();
                //echo $_SESSION['usuarip'];
                //echo $_SESSION['usuarip'];
                echo $_SESSION['nomSessio'];
                ?>
            </p>
        </section>
    </header>
    <main id="principi">
        <a class="dir" href="#abaix">Ves al footer</a>
        <h2>Dades del llibre:</h2>
        <?php
        include("conexion.php");
        if (isset($_GET['id_llibre'])) {
            $id_llibre = $_GET['id_llibre'];
            $consulta = "SELECT * FROM llibres WHERE id_llibre=" . $id_llibre;

            $resCon = mysqli_query($connexio, $consulta);


            if ($resCon) {

                $fila = $resCon->fetch_assoc();
                echo '<img src="' . $fila['uri'] . '" alt="Això és una imatge del llibre ' . $fila['titol'] . '"><br>';

                echo '<h3>ID llibre:</h3>';
                echo '<p>' . $fila['id_llibre'] . '</p><br>';

                echo '<h3>Titol:</h3>';
                echo '<p>' . $fila['titol'] . '</p><br>';

                echo '<h3>Autor:</h3>';
                echo '<p>' . $fila['autor'] . '</p><br>';

                echo '<h3>Descripció: </h3>';
                echo '<p>' . $fila['descripcio'] . '</p><br>';

                echo '<h3>Data que s ha afegit :</h3>';
                echo '<p>' . $fila['data_afegit'] . '</p><br>';
            }
        } else {
            echo 'Error, problema per aconseguir el ID del llibre.';
        }

        $llibreDespres = $fila['id_llibre'] + 1;
        $llibreAbans = $fila['id_llibre'] - 1;
        echo '<a href="llibre.php?id_llibre=' . $llibreAbans . '">Enrere</a>';
        echo '<a href="llibre.php?id_llibre=' . $llibreDespres . '">Següent</a>';
        mysqli_close($connexio);
        ?>
    </main>
    <a class="dir" href="#principi">Ves al principi</a>
    <footer id="abaix">
        <section class="container">
            <section class="name">
                <p>Samuel Romero Marín
                    <span>&copy</span>
                </p>
            </section>
            <section class="socialMedia">
                <ul>
                    <li><a href="https://www.facebook.com/esliceu.escola.cooperativa" rel="noopener" alt="Logo facebook que et redirecciona cap al facebook del liceu" target="_blank">Facebook Es Liceu</a></li>
                    <li><a href="http://www.esliceu.com/feed/" rel="noopener" alt="Logo rss que et redirecciona cap al rss del liceu" target="_blank">RSS Es Liceu</a></li>
                    <li><a href="https://twitter.com/EsLiceu" rel="noopener" alt="Logo twitter que et redirecciona cap al twitter del liceu" target="_blank">Twitter Es Liceu</a></li>
                </ul>
            </section>
        </section>
    </footer>
</body>

</html>