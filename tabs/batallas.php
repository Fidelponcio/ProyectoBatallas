<?php

    require('./php/visual.php');

    include_once('./php/funciones.php');

    $datos = obtenerBatallas(false);
    echo "<div class='contentBatallas'>" . formatoBatallas($datos) . "</div>";
    votar(2, 2, 3);

?>