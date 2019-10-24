<?php
session_start();
$varSession = $_SESSION['usuarip'];

if ($varSession == null || $varSession = '') {
    /*
        echo '<h1>Voste no te cap autoritzacio per accedir a aquest pagina</h1>';
        echo '<a href="#torna"><a id="torna" href="login.php" class="btn btn-light btn-lg">Ves al login</a></a>';
        echo "<p>Per poder anar al login presiona el botó de baix.</p>";
        echo "</body>";
        */
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
    <link rel="stylesheet" href="css/formulari.css">

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
    <title>Compra Llibres | Gestió dels llibres</title>
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
        <section id="formularis">
            <section id="form1">
                <h2>Insereix un nou llibre: </h2>
                <form action="afegir.php" method="POST" class="disFormulari">
                    <div class="row requiredRow">
                        <label for="txt_Insereixtitoldelllibre" id="Insereixtitoldelllibre-ariaLabel">Insereix titol del llibre:</label>
                        <input id="txt_Insereixtitoldelllibre" name="titol" type="text" aria-labelledby="Insereixtitoldelllibre-ariaLabel" class="required" title="Insereix titol del llibre:. Aquest es un camp obligatori">
                    </div>
                    <div class="row requiredRow">
                        <label for="txt_Insereixautordelllibre" id="Insereixautordelllibre-ariaLabel">Insereix autor del llibre:</label>
                        <input id="txt_Insereixautordelllibre" name="autor" type="text" aria-labelledby="Insereixautordelllibre-ariaLabel" class="required" title="Insereix autor del llibre:. Aquest es un camp obligatori">
                    </div>
                    <div class="row requiredRow">
                        <label for="txtarea_Insertaunadescripciódelproducte" id="Insertaunadescripciódelproducte-ariaLabel">Inserta una descripció del producte:</label>
                        <textarea id="txtarea_Insertaunadescripciódelproducte" name="descripcio" cols="40" rows="10" aria-labelledby="Insertaunadescripciódelproducte-ariaLabel" class="required" title="Inserta una descripció del producte:. Aquest es un camp obligatori"></textarea>
                    </div>
                    <div class="row requiredRow">
                        <label for="txt_Insertalaurlo" id="Insertalaurlo-ariaLabel">Inserta la url o </label>
                        <input id="txt_Insertalaurlo" name="uri" type="text" aria-labelledby="Insertalaurlo-ariaLabel" class="required" title="Inserta la url o . Aquest es un camp obligatori">
                    </div>
                    <div class="row">
                        <button type="submit" name="formulari" class="btn btn-success">Afegeix</button>
                    </div>
                </form>

                <!--

                <form class="disFormulari" action="afegir.php" method="POST">

                    <label for="titol">Insereix titol del llibre: </label><br>
                    <input type="text" name="titol"><br>

                    <label for="autor">Insereix autor del llibre: </label><br>
                    <input type="text" name="autor"><br>

                    <label for="descripcio">Inserta una descripció pel producte:</label><br>
                    <textarea name="descripcio" id="descripcio" cols="40" rows="10"></textarea><br>

                    <label for="uri">Inserta la uri o "link" de la imatge:</label><br>
                    <input type="text" name="uri"><br>

                    <button type="submit" name="formulari" class="btn btn-success">Afegeix</button>
                </form>
                -->
            </section>
            <br>
            <hr><br>

            <section id="form2">
                <h2>Elimina un llibre: </h2>
                <form action="eliminar.php" method="POST">
                    <div class="row requiredRow">
                        <label for="txt_Insertaiddelproducteaeliminar" id="Insertaiddelproducteaeliminar-ariaLabel">Inserta id del producte a eliminar:</label>
                        <input id="txt_Insertaiddelproducteaeliminar" name="id_llibre" type="text" aria-labelledby="Insertaiddelproducteaeliminar-ariaLabel" class="required" title="Inserta id del producte a eliminar:. Aquest es un camp obligatori">
                    </div>
                    <div class="row">
                    <button type="submit" name="formulari2" class="btn btn-danger">Elimina</button>
                    </div>
                </form>


                <!--
                <h2>Elimina un llibre: </h2>
                <form class="disFormulari" action="eliminar.php" method="POST">
                    <label for="id_llibre">Inserta id del producte a eliminar:</label><br>
                    <input type="number" name="id_llibre"><br>
                    <button type="submit" name="formulari2" class="btn btn-danger">Elimina</button>
                </form>
                -->
            </section>
        </section>
    </main>
    <a href="#principi">Ves al principi</a>
    <footer id="abaix">
        <section class="container">
            <section class="name">
                <p>Samuel Romero Marín
                    <span><i class="far fa-copyright"></i></span>
                </p>
            </section>
            <section class="socialMedia">
                <ul>
                    <li><a href="fhttps://www.facebook.com/esliceu.escola.cooperativa" alt="Logo facebook que et redirecciona cap al facebook del liceu">a<i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="fhttp://www.esliceu.com/feed/" alt="Logo rss que et redirecciona cap al rss del liceu"><i class="fas fa-rss-square">b</i></a></li>
                    <li><a href="fhttps://twitter.com/EsLiceu" alt="Logo twitter que et redirecciona cap al twitter del liceu"><i class="fab fa-twitter-square">c</i></a></li>
                </ul>
            </section>
    </footer>
</body>

</html>