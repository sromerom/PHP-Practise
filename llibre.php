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
    <title>Compra Llibres | Dades del Llibre</title>
</head>

<body>
    <?php
    include("conexion.php");
        session_start();
        $varSession = $_SESSION['usuarip'];
        if ($varSession == null || $varSession = '') {
            /*
            echo '<h1>Voste no te cap autoritzacio per accedir a aquest pagina</h1>';
            echo '<a href="#torna"><a id="torna" href="login.php" class="btn btn-light btn-lg">Ves al login</a></a>';
            echo "<p>Per poder anar al login presiona el botó de baix.</p>";
            echo "</body>";
            */
            include("denied.php");

            header("location: denied.php");
            die();
        }
    ?>
    <header>
        <section id="menu">
            <h1><img src="../src/logo.png" alt="Logo de la pàgina" id="logo"></h1>
            <ul>
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
    <main>
        <h2>Dades del llibre:</h2>
        <?php
        include("conexion.php");
        if (isset($_GET['id_llibre'])) {
            $id_llibre = $_GET['id_llibre'];
            $consulta = "SELECT * FROM llibres WHERE id_llibre=" . $id_llibre;

            $resCon = mysqli_query($connexio, $consulta);


            if ($resCon) {

                $fila = $resCon->fetch_assoc();
                echo '<img src="' . $fila['uri'] . '"><br>';

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
    <footer>
        <section class="container">
            <section class="name">
                <p>Samuel Romero Marín
                    <span><i class="far fa-copyright"></i></span>
                </p>
            </section>
            <section class="socialMedia">
                <ul>
                    <li><a href="http://www.esliceu.com/feed/"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://www.facebook.com/esliceu.escola.cooperativa"><i class="fas fa-rss-square"></i></a>
                    </li>
                    <li><a href="https://twitter.com/EsLiceu"><i class="fab fa-twitter-square"></i></a></li>
                </ul>
            </section>
        </section>
    </footer>
</body>

</html>