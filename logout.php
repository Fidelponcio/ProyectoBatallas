<?php
    require ('./php/funciones.php');
    session_start();
    // Si el usuario NO tiene sesion iniciada se le redirige a index.php
    if (!isset($_SESSION["usuario"])) {
        header("Location: index.php");
    }
    // Variable para insertar en tabla sesiones
    $valores = array( $usuario = $_SESSION["usuario"],$fechainicio = $_SESSION["fInicio"] , $fechafinal = date('Y-m-d H:i:s'));
    // Funcion para insertarlo en la tabla
    registrarsesion($valores);

    session_destroy();
    unset($_COOKIE["PHPSESSID"]);
    setcookie("PHPSESSID", null, -1, '/');
    header("Location: index.php");
?>