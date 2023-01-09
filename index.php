<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="https://www.pngmart.com/files/21/Account-User-PNG-Picture.png"/>
    <link rel="stylesheet" href="CSS/index.css">
    <?php
        
        // Incluimos el archivo visual.php para poder cambiar entre modo oscuro y claro, y lenguaje
        require ('./php/visual.php');
        session_start();
        // Si el usuario SI tiene sesión iniciada
        if (isset ($_SESSION["usuario"])) {
            require_once ('batallasaleatorias.php');
        }
        // Si el usuario NO tiene sesion iniciada se le redirige a perfil
        if (!isset($_SESSION["usuario"])) {
            require_once ('indexNoUsuario.php');
        }
    ?>
