<div>
    <?php
        include_once ('./php/funciones.php');
        
        $datos = datosUsuario($_SESSION['usuario']);

        eliminarTroll();
    ?>
    <div class="info">
        <div class="foto"
            style="background: url(./tabs/<?php echo $datos[2]; ?>);
                    background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat;">
        </div>
        <div class="datos">
            <span><?php echo $_SESSION['usuario']; ?></span><br>
            <span><?php echo $datos[1]; ?></span><br>
            <span><?php echo $datos[3]; ?></span>
            <span><?php echo $datos[0]; ?></span>
        </div>
    </div>
    <?php
        $batallas = obtenerBatallas(true);
        echo "<div class='contentBatallas'>".formatoBatallas($batallas)."</div>";
    ?>
</div>