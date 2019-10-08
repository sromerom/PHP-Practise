<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/css.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Compra Llibres</title>
</head>

<body>
    <header>
        <section id="menu">
            <h1><img src="../src/logo.png" alt="Logo de la pàgina" id="logo"></h1>
            <ul>
                <li><a href="principal.php" class="btn btn-info btn-lg">Inici</a></li>
                <li><a href="formulari.php" class="btn btn-info btn-lg">Gestiona</a></li>
                <li><a href="endLogin.php" class="btn btn-info btn-lg">Surt</a></li>
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
    </header>F
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