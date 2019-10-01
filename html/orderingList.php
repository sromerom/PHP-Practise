<?php
$option = isset($_POST['opcionsCercador']);
if ($option) {
    echo "<h1>".$_POST['opcionsCercador']."</h1>";

} else {
    echo "task option is required";
    exit;
}
?>
