<?php

include("conexion.php");
session_start();


$varSession = $_SESSION['usuarip'];
if ($varSession == null || $varSession = '') {

    //echo '<h1>Voste no te cap autoritzacio per accedir a aquest pagina</h1>';
    //echo '<a href="#torna"><a id="torna" href="login.php" class="btn btn-light btn-lg">Ves al login</a></a>';
    //echo "<p>Per poder anar al login presiona el botó de baix.</p>";
    //echo "</body>";

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
    <!-- <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/principal.css"> -->
    <link rel="preload" as="style" href="css/global.css">
    <link rel="preload" as="style" href="css/principal.css">

    <link rel="preload" as="style" href="css/global.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="css/global.css"></noscript>

    <link rel="preload" as="style" href="css/principal.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="css/principal.css"></noscript>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- jqueryLazy -->
    <!-- jsDeliver -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.lazy/1.7.5/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.lazy/1.7.5/jquery.lazy.plugins.min.js"></script>

    <!-- cdnjs -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.5/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.5/jquery.lazy.plugins.min.js"></script>


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

    <!-- Script Lazy loading jquery-->
    <script>
        $(function() {
            $('.lazy').Lazy();
        });
    </script>
    <title>Compra Llibres | Tenda virtual de llibres i Ebooks</title>
</head>

<body>
    <?php
    $despresQuery = "";

    if (isset($_POST['cerca'])) {
        $ordenar = $_POST['opcionsCercador'];
        $textCerca = $_POST['search'];

        if (empty($_POST['opcionsCercador'])) {
            $despresQuery = "WHERE titol like '" . $textCerca . "%'";
        } else if (empty($_POST['search'])) {
            if ($ordenar == 1) {
                $despresQuery = "ORDER BY titol";
            } else if ($ordenar == 2) {
                $despresQuery = "ORDER BY titol DESC";
            } else {
                $despresQuery = "ORDER BY data_afegit";
            }
        } else {
            if ($ordenar == 1) {
                $despresQuery = "WHERE titol like '" . $textCerca . "%' ORDER BY titol";
            } else if ($ordenar == 2) {
                $despresQuery = "WHERE titol like '" . $textCerca . "%' ORDER BY titol DESC";
            } else {
                $despresQuery = "WHERE titol like '" . $textCerca . "%' ORDER BY data_afegit";
            }
        }
    }
    ?>

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
        <a class="dir" href="#abaix">Ves al footer</a>
        <section id="cercador">
            <form method="POST">
                <label for="inputSelectCercador">Selecciona una opció per filtrar</label>
                <select id="inputSelectCercador" name="opcionsCercador">
                    <option value="0">Selecciona una opció per filtrar</option>
                    <?php
                    $arrayOpcions = array(1 => "Ordenat per A-Z", "Ordenat per Z-A", "Ordenat per data");

                    foreach ($arrayOpcions as $key => $value) {
                        if ($_POST['opcionsCercador'] == $key) {
                            echo "<option value='" . $key . "' selected>" . $value . "</option>";
                        } else {
                            echo "<option value='" . $key . "'>" . $value . "</option>";
                        }
                    }
                    ?>
                </select>
                <label for="inputCercar">Cerca</label>
                <input type="search" id="inputCercar" name="search">
                <input type="submit" name="cerca" value="Cerca">
            </form>
        </section>
        <!-- CARREGAR LLISTA DINAMICA -->
        <section id="llistat">
            <h2>Llibres:</h2>
            <ul>
                <?php
                $queryDefault = "SELECT * FROM llibres $despresQuery";
                $resultatDefault = mysqli_query($connexio, $queryDefault);
                while ($row = mysqli_fetch_array($resultatDefault)) { ?>
                    <li>
                        <a href="<?php echo 'llibre.php?id_llibre=' . $row['id_llibre'] ?>"><img data-src="<?php echo $row['uri'] ?>" class="lazy" alt="Aquest llibre que no es visualitza correctament és <?php echo $row['titol']; ?> "></a>
                        <div class="under">
                            <?php echo '<a href="formModificar.php?id_llibre=' . $row['id_llibre'] . '">Modifica ' . $row['titol'] . '</a>'; ?>
                            <?php echo '<a href="checkout.php?id_llibre=' . $row['id_llibre'] . '">Compra el llibre!</a>'; ?>
                        </div>
                    </li>
                <?php }
                mysqli_close($connexio);
                ?>
            </ul>
        </section>
    </main>
    <a class="dir" href="#principi" onclick="ga('send', 'event', 'adaltPrincipal', 'clic', 'adalt-click');">Ves al principi</a>
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