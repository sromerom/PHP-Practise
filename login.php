<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h2>Inicia sessió:</h2>
    <form action="index.php" method="POST">
        <?php
        if(isset($loginError)) {
            echo $loginError;
            echo "<br>";
        }
        ?>
        <label for="">Nom usuari:</label><br>
        <input type="text" name="usuari"><br>
        <label for="">Contrasenya:</label><br>
        <input type="password" name="contrasenya">
        <input type="submit" name="sendLogin">
    </form>
</body>
</html>