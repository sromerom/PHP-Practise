<?php include("conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/css.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <section id="menu">
            <h1><img src="../src/logo.png" alt="Logo de la pàgina" id="logo"></h1>
            <ul>
                <li><a href="../html/inicial.php" class="btn btn-info btn-lg">Inici</a></li>
                <li><a href="../html/formulari.php" class="btn btn-info btn-lg">Gestiona</a></li>
                <li><a href="#">########</a></li>
            </ul>
        </section>
    </header>
    <main>
        <section id="llistat">
            
        <?php
        $queryy = "SELECT * FROM llibres";
        $resultatt = mysqli_query($connexio, $queryy);

        while($row = mysqli_fetch_array($resultatt)) { ?>
            <ul>
                <li><img src="<?php echo $row['uri'] ?>" alt="No funsiona"></li>
            </ul>

        <?php } ?>

        <!-- 
            <ul>
                <li><img src="http://www.esliceu.com/wp-content/uploads/2017/01/logo43434.gif" alt=""></li>
                <li><img src="http://www.esliceu.com/wp-content/uploads/2017/01/logo43434.gif" alt=""></li>
                <li><img src="http://www.esliceu.com/wp-content/uploads/2017/01/logo43434.gif" alt=""></li>
                <li><img src="http://www.esliceu.com/wp-content/uploads/2017/01/logo43434.gif" alt=""></li>
                <li><img src="http://www.esliceu.com/wp-content/uploads/2017/01/logo43434.gif" alt=""></li>
                <li><img src="http://www.esliceu.com/wp-content/uploads/2017/01/logo43434.gif" alt=""></li>
            </ul>
        -->
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
                    <li><a href="http://www.esliceu.com/feed/"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://www.facebook.com/esliceu.escola.cooperativa"><i
                                class="fas fa-rss-square"></i></a>
                    </li>
                    <li><a href="https://twitter.com/EsLiceu"><i class="fab fa-twitter-square"></i></a></li>
                </ul>
            </section>
        </section>
    </footer>
</body>

</html>