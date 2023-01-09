<?php
session_start();
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
    <title>CUENTA ELIMINADA</title>
</head>

<body>
    <h1>
        <?php $usuarioEliminado = $_SESSION['usuario']; echo $usuarioEliminado ?> tu cuenta ha sido eliminada.
    </h1>
    <?php

    // Incluimos el archivo funciones.php
    require('./php/funciones.php');
    // Incluimos el archivo visual.php para poder cambiar entre modo oscuro y claro, y lenguaje
    require('./php/visual.php');
   

    // Registro su sesión y le añado al registro en el campo usuario LAST SESSION
    $valores = array($usuario = ($_SESSION["usuario"] . " USER DELETED"), $fechainicio = $_SESSION["fInicio"], $fechafinal = date('Y-m-d H:i:s'));
    registrarsesion($valores);

    // Cierro su sesión

    session_destroy();
    unset($_COOKIE["PHPSESSID"]);
    setcookie("PHPSESSID", null, -1, '/');

    ?>
</body>

</html>