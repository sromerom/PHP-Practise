<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/css.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Gestiona Llibres</title>
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
        session_start();
        $varSession = $_SESSION['usuarip'];
        if ($varSession == null || $varSession = '') {
            echo 'Voste no te cap autoritzacio per accedir a aquest pagina';
            //header("location: login.php");
            die();
        }
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