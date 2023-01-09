<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
</head>

<body>
    <?php
    echo '<h1>TABLA DE ESTADÍSTICAS</h1>';

    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

    // Consigo el ID del usuario
    $usuario = $_SESSION['usuario'];
    $sqlID = "SELECT `id_usuario` FROM `usuario_credencial` WHERE `nombreusuario` = '{$usuario}' ";
    $resultID = $conexion->query($sqlID);
    $id_usuario = $resultID->fetchColumn();

    // Con el ID hago consulta a la tabla "usuario" donde aparecen sus logros

    // num_elementos_creados
    $sqlElementos = "SELECT `num_elementos_creados` FROM `usuario` WHERE `id` = '{$id_usuario}' ";
    $resultElementos = $conexion->query($sqlElementos);
    $elementosCreados = $resultElementos->fetchColumn();

    // num_batallas_creadas
    $sqlCreadas = "SELECT `num_elementos_creados` FROM `usuario` WHERE `id` = '{$id_usuario}' ";
    $resultCreadas = $conexion->query($sqlCreadas);
    $batallasCreadas = $resultCreadas->fetchColumn();
    // $batallasCreadas

    //num_batallas_votadas
    $sqlVotadas = "SELECT `num_batallas_votadas` FROM `usuario` WHERE `id` = '{$id_usuario}' ";
    $resultVotadas = $conexion->query($sqlVotadas);
    $batallasVotadas = $resultVotadas->fetchColumn();
    // $batallasVotadas

    // num_batallas_ignoradas
    $sqlIgnoradas = "SELECT `num_batallas_ignoradas` FROM `usuario` WHERE `id` = '{$id_usuario}' ";
    $resultIgnoradas = $conexion->query($sqlIgnoradas);
    $batallasIgnoradas = $resultIgnoradas->fetchColumn();
    //$batallasIgnoradas

    //num_batallas_denunciadas
    $sqlDenunciadas = "SELECT `num_batallas_denunciadas` FROM `usuario` WHERE `id` = '{$id_usuario}' ";
    $resultDenunciadas = $conexion->query($sqlDenunciadas);
    $batallasDenunciadas = $resultDenunciadas->fetchColumn();
    // $batallasDenunciadas

    // puntos_troll
    $sqlTroll = "SELECT `puntos_troll` FROM `usuario` WHERE `id` = '{$id_usuario}' ";
    $resultTroll = $conexion->query($sqlTroll);
    $puntosTroll = $resultTroll->fetchColumn();
    // $puntosTroll


    ?>

    <h2>Hola <?php echo $_SESSION['usuario']; ?>, estos son todas tus estadísticas: </h2>

    <p>Has creado <?php echo $elementosCreados; ?> elementos.</p>
    <p>Has creado <?php echo $batallasCreadas; ?> batallas.</p>
    <p>Has votado <?php echo $batallasVotadas; ?> batallas.</p>
    <p>Has ignorado <?php echo $batallasIgnoradas; ?> batallas.</p>
    <p>Has denunciado <?php echo $batallasDenunciadas; ?> elementos.</p>
    <br>
    <p>Estos son tus puntos de troll, ¡ten cuidado! si tiene mas de 10 puntos de troll tu cuenta sera eliminada.</p>
    <p>Puntos de troll: <?php echo $puntosTroll; ?> </p>

</body>

</html>