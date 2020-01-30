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
        <a class="dir" href="#abaix">Ves al footer</a>
        <section id="formularis">
            <section id="form1">
                <h2>Insereix un nou llibre: </h2>
                <form id="formId" action="afegir.php" method="POST" onsubmit="ga('send', 'event', 'form', 'submit', 'form-formulari.php');">
                    <label for="txt_Insereixtitoldelllibre" id="Insereixtitoldelllibre-ariaLabel">Insereix titol del llibre: (Obligatori)</label>
                    <input id="txt_Insereixtitoldelllibre" name="titol" type="text" aria-labelledby="Insereixtitoldelllibre-ariaLabel" title="Insereix titol del llibre: Aquest es un camp obligatori">

                    <label for="txt_Insereixautordelllibre" id="Insereixautordelllibre-ariaLabel">Insereix autor del llibre: (Obligatori)</label>
                    <input id="txt_Insereixautordelllibre" name="autor" type="text" aria-labelledby="Insereixautordelllibre-ariaLabel" title="Insereix autor del llibre: Aquest es un camp obligatori">

                    <label for="txtarea_Insertaunadescripciódelproducte" id="Insertaunadescripciódelproducte-ariaLabel">Inserta una descripció del producte: (Obligatori)</label>
                    <textarea id="txtarea_Insertaunadescripciódelproducte" name="descripcio" cols="40" rows="10" aria-labelledby="Insertaunadescripciódelproducte-ariaLabel" title="Inserta una descripció del producte: Aquest es un camp obligatori"></textarea>

                    <label for="txt_Insertalaurlo" id="Insertalaurlo-ariaLabel">Inserta la url: (Obligatori)</label>
                    <input id="txt_Insertalaurlo" name="uri" type="text" aria-labelledby="Insertalaurlo-ariaLabel" title="Inserta la url. Aquest es un camp obligatori">


                    <button id="contact-submit" type="submit" name="formulari" class="btn btn-success" type="submit" onClick="ga('send', 'event', { eventCategory: 'form', eventAction: 'submit', eventLabel: 'form-formulari.php', eventValue: 0});">Afegeix</button>
                </form>
            </section>
            <section id="form2">
                <h2>Elimina un llibre: </h2>
                <form action="eliminar.php" method="POST">
                    <label for="txt_Insertaiddelproducteaeliminar" id="Insertaiddelproducteaeliminar-ariaLabel">Inserta id del producte a eliminar: (Obligatori)</label>
                    <input id="txt_Insertaiddelproducteaeliminar" name="id_llibre" type="text" aria-labelledby="Insertaiddelproducteaeliminar-ariaLabel" title="Inserta id del producte a eliminar:. Aquest es un camp obligatori">

                    <button type="submit" name="formulari2" class="btn btn-danger">Elimina</button>
                </form>
            </section>
        </section>
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