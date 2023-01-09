<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="https://www.pngmart.com/files/21/Account-User-PNG-Picture.png"/>
    <link rel="stylesheet" href="CSS/login.css">
    <?php
        // Incluimos el archivo visual.php para poder cambiar entre modo oscuro y claro, y lenguaje
        require ('./php/visual.php');
        //Si el usuario tiene la cookie de sesión se le redirigira a su perfil
        session_start();
        if (isset($_SESSION["usuario"])) {
            header("Location: perfil.php");
            exit();
    }
    ?>
    <title><?php echo $lang['loginTitle'] ?></title>
</head>
<body>
    <?php
        // Incluimos el archivo funciones.php
        require ('./php/funciones.php');
        // Incluimos la logica para login.php
        require ('./php/login.php');
    ?>
    <header>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selectLang']; ?></button>
                <ul>
                    <li><a href="login.php?lang=en"><div class="flag en"></div><?php echo $lang['lang_en'] ?></a></li>
                    <li><a href="login.php?lang=es"><div class="flag es"></div><?php echo $lang['lang_es'] ?></a></li>
                </ul>
            </div>
            <form action="" method="POST" class="theme-form">
                <button name="tema" value="dark" class="dark"><ion-icon name="moon-outline"></ion-icon></button>
                <button name="tema" value="light" class="light"><ion-icon name="sunny-outline"></ion-icon></button>
            </form>
        </div>
    </header>
    <main>
        <div class="border-animation">
            <div class="loginContainer">
                <h1 class="pre nonClickable"><?php echo $lang['tituloLogin'] ?></h1>
                <form action="" method="post" class="containerForm pre" enctype="multipart/form-data">
                    <label for="usuario" class="nonClickable"><?php echo $lang['nombreLogin'] ?></label>
                    <input type="text" name="usuario">
                    <span class="alert usuario-alert">
                        <p class="error usuario-err"><?php echo $_usuario_err; ?></p>
                        <ion-icon name="alert-circle-outline"></ion-icon>
                    </span>

                    <label for="password" class="nonClickable"><?php echo $lang['passwordLogin'] ?></label>
                    <input type="password" name="password">
                    <span class="alert password_alert">
                        <p class="error password-err"><?php echo $_password_err; ?></p>
                        <ion-icon name="alert-circle-outline"></ion-icon>
                    </span>

                    <div class="botones">
                        <input type="button" value="<?php echo $lang['btnVolverLogin'] ?>" class="loginButton btn" onclick="window.location.href='index.php'">
                    </div>
                    <div class="botones">
                        <input type="submit" name="ENTRAR" value="<?php echo $lang['btnEntrarLogin'] ?>" class="loginButton btn">
                    </div>
                </form>
               
            </div>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

