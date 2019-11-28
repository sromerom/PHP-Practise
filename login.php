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
    <link rel="stylesheet" href="css/login.css">

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

    <title>Compra Llibres | Tenda virtual de llibres i Ebooks</title>
</head>

<body>
    <main class="inicisessio">
        <h1>Compra Llibres</h1>
        <img src="src/logo.png" class="avatar" alt="Aquesta es la imatge del logo de la pàgina.">
        <h2>Inicia sessió:</h2>
        <form action="index.php" method="post">
            <label for="NomUsuari" id="NomUsuariLabel">Nom Usuari</label>
            <input id="NomUsuari" name="usuari" type="text" aria-labelledby="NomUsuariLabel" title="Inserta el usuari. Aquest es un camp obligatori">
            <label for="Contrasenya" id="ContrasenyaLabel">Contrasenya</label>
            <input id="Contrasenya" name="contrasenya" type="password" aria-labelledby="ContrasenyaLabel" title="Inserta la contrasenya. Aquest es un camp obligatori">
            <input class="button" type="submit" name="sendLogin">
        </form>
    </main>
</body>

</html>
