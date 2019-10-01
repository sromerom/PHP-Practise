<?php include("conexion.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
</head>
<body>
<h1>Hola buenas tardes</h1>

<?php
$queryy = "SELECT * FROM llibres";
$resultatt = mysqli_query($connexio, $queryy);

while($row = mysqli_fetch_array($resultatt)) { ?>
    <ul>
        <li><?php echo $row['descripcio'] ?>></li>
    </ul>

<?php } ?>
</body>
</html>