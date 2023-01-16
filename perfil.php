<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="https://www.pngmart.com/files/21/Account-User-PNG-Picture.png"/>
    <link rel="stylesheet" href="css/perfil.css">
    <?php
        // Incluimos el archivo funciones.php
        require ('./php/funciones.php');
        // Incluimos el archivo visual.php para poder cambiar entre modo oscuro y claro, y lenguaje
        require ('./php/visual.php');

        session_start();
        // Si el usuario no tiene sesion iniciada se le redirige a login
        if (!isset($_SESSION["usuario"])) {
            header("Location: index.php");
            exit();
        }
        /* REGISTRO SESIONES*/
        // tiempo de inactividad de la sesión para cerrarla
        $inactivoSegundos = 600;
        // establezco un tiempo de vida de una sesion
        if(isset($_SESSION["timeout"])){
            // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
            $sessionTTL = time() - $_SESSION["timeout"];
        // si la sesion dura mas de 600 segundos, cierro la sesión
            if($sessionTTL > $inactivoSegundos){
                session_destroy();
                header("Location: logout.php");
            }
        }

        // Si el usuario no tiene sesion iniciada se le redirige a login
        if (isset($_SESSION["usuario"])) {
            cargarPreferencias($_SESSION["usuario"]);
        }
        
        // Incluimos el archivo theme.php para poder cambiar entre modo oscuro y claro
        //require ('./php/visual.php');
        // Incluimos el archivo language.php para poder cambiar el idioma
        //require ('./php/lenguaje.php');

        eliminarTroll();

    ?>
    <title><?php echo $lang['perfilTitle']?></title>
</head>
<body>
    <header>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selectLang']; ?></button>
                <ul>
                    <li><a href="perfil.php?lang=en"><div class="flag en"></div><?php echo $lang['lang_en'] ?></a></li>
                    <li><a href="perfil.php?lang=es"><div class="flag es"></div><?php echo $lang['lang_es'] ?></a></li>
                </ul>
            </div>
            <form action="" method="POST" class="theme-form">
                <button name="tema" value="dark" class="<?php echo $dark_class;?> dark"><ion-icon name="moon-outline"></ion-icon></button>
                <button name="tema" value="light" class="<?php echo $light_class;?> light"><ion-icon name="sunny-outline"></ion-icon></button>
            </form>
        </div>
    </header>
    <main>
        <input type="radio" name="slider" id="perfil" checked>
        <input type="radio" name="slider" id="stats">
        <input type="radio" name="slider" id="batallas">
        <input type="radio" name="slider" id="logros" >
        <input type="radio" name="slider" id="ajustes">
        <input type="radio" name="slider" id="ayuda">
        <nav>
            <div class="toggle">
                <ion-icon name="arrow-forward-outline" class="open"></ion-icon>
                <ion-icon name="arrow-back-outline" class="close"></ion-icon>
            </div>
            <label for="perfil" class="perfil active">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class="title">Perfil</span>
            </label>
            <label for="batallas" class="batallas">
                <span class="icon" onclick="window.location.href='index.php'"><ion-icon name="shield-half-outline"></ion-icon></span>
                <span class="title" onclick="window.location.href='index.php'">Batallas</span>
            </label>
            <label for="stats" class="stats">
                <span class="icon"><ion-icon name="podium-outline"></ion-icon></span>
                <span class="title">Estadisticas</span>
            </label>
            <label for="logros" class="logros">
                <span class="icon"><ion-icon name="ribbon-outline"></ion-icon></span>
                <span class="title">Logros</span>
            </label>
            <label for="ajustes" class="ajustes">
                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                <span class="title">Ajustes</span>
            </label>
            <label for="ayuda" class="ayuda">
                <span class="icon"><ion-icon name="help-circle-outline"></ion-icon></span>
                <span class="title">FAQ</span>
            </label>
            <div class="expand"></div>
            <label class="out">
                <span class="icon" onclick="window.location.href='logout.php'"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title" onclick="window.location.href='logout.php'"><?php echo $lang['perfilClose']?></span>
            </label>
        </nav>
        <section>
            <div class="content content-1"><?php require_once ('./tabs/perfil.php') ?></div>
            <div class="content content-2"><?php require_once ('./tabs/stats.php') ?></div>
            <div class="content content-3"><?php require_once ('./tabs/batallas.php') ?></div>
            <div class="content content-4"><?php require_once ('./tabs/logros.php') ?></div>
            <div class="content content-5"><?php require_once ('./tabs/ajustes.php') ?></div>
            <div class="content content-6"><?php require_once ('./tabs/ayuda.php') ?></div>
        </section>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        let menuToggle = document.querySelector('.toggle');
        let navigation = document.querySelector('nav');
        menuToggle.onclick = function() {
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }

        let list = document.querySelectorAll('label');
        for (let i = 0; i < list.length; i++) {
            list[i].onclick = function() {
                let j = 0;
                while (j < list.length) {
                    list[j++].className = 'list';
                }
                list[i].className = 'list active';
                if (navigation.classList.contains('active')) {
                    navigation.classList.toggle('active');
                    menuToggle.classList.toggle('active');
                }
            }
        }
    </script>
</body>
</html>