<?php
// Si el usuario NO tiene sesion iniciada se le redirige a perfil
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="https://www.pngmart.com/files/21/Account-User-PNG-Picture.png" />
    <link rel="stylesheet" href="css/perfil.css">
</head>

<body>

    <?php

    require('./php/visual.php');

    include_once('./php/funciones.php');

    $datos = obtenerBatallas(false);
    echo "<div class='contentBatallas'>" . formatoBatallas($datos) . "</div>";
    votar(2, 2, 3);

    ?>

</body>

</html>