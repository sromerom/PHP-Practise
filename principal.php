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
    <link rel="stylesheet" href="css/principal.css">

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
    <title>Compra Llibres | Tenda virtual de llibres i Ebooks</title>
</head>

<body>
    <?php



    include("conexion.php");
    session_start();
    $varSession = $_SESSION['usuarip'];
    if ($varSession == null || $varSession = '') {
        echo 'Voste no te cap autoritzacio per accedir a aquest pagina';
        //header("location: login.php");
        die();
    }

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
    <main>
        <section id="cercador">
            <form method="POST">
                <select name="opcionsCercador">
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
                <input type="search" name="search">
                <input type="submit" name="cerca" value="Cerca">
            </form>
        </section>
        <!-- CARREGAR LLISTA DINAMICA -->
        <section id="llistat">
            <ul>
                <?php
                $queryDefault = "SELECT * FROM llibres $despresQuery";
                $resultatDefault = mysqli_query($connexio, $queryDefault);
                while ($row = mysqli_fetch_array($resultatDefault)) { ?>
                    <li>
                        <a href="<?php echo 'llibre.php?id_llibre=' . $row['id_llibre'] ?>"><img src="<?php echo $row['uri'] ?>" alt="Aquest llibre que no es visualitza correctament és <?php echo $row['titol']; ?> "></a>
                        <div class="under">
                            <?php echo '<a href="formModificar.php?id_llibre=' . $row['id_llibre'] . '">Modifica Llibre</a>'; ?>
                        </div>
                    </li>
                <?php }
                mysqli_close($connexio);
                ?>
            </ul>
        </section>
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
                    <li><a href="https://www.facebook.com/esliceu.escola.cooperativa"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="http://www.esliceu.com/feed/"><i class="fas fa-rss-square"></i></a></li>
                    <li><a href="https://twitter.com/EsLiceu"><i class="fab fa-twitter-square"></i></a></li>
                </ul>
            </section>
        </section>
    </footer>
</body>

</html>