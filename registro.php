<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="https://www.pngmart.com/files/21/Account-User-PNG-Picture.png" />
    <link rel="stylesheet" href="CSS/registro.css">
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
    <title><?php echo $lang['registroTitle'] ?></title>
</head>
<body>
    <?php
        // Incluimos el archivo funciones.php
        require ('./php/funciones.php');
        // Incluimos la logica para login.php
        require ('./php/registro.php');
    ?>
    <header>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selectLang']; ?></button>
                <ul>
                    <li><a href="registro.php?lang=en"><div class="flag en"></div><?php echo $lang['lang_en'] ?></a></li>
                    <li><a href="registro.php?lang=es"><div class="flag es"></div><?php echo $lang['lang_es'] ?></a></li>
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
            <div class="registroContainer">
                <h1 class="pre"><?php echo $lang['registroTitulo'] ?></h1>
                <p class="aviso pre"><?php echo $lang['registroAdvertencia'] ?></p>
                <form action="" method="post" class="containerForm pre" enctype="multipart/form-data">

                    <div class="campos">
                        <div class="campo">
                            <label for="usuario"><?php echo $lang['registroNombre'] ?></label>
                            <input type="text" name="usuario" value="<?php echo $_usuario; ?>">
                            <span class="alert usuario-alert">
                                <p class="error usuario-err"><?php echo $_usuario_err; ?></p>
                                <ion-icon name="alert-circle-outline"></ion-icon>
                            </span>
                        </div>

                        <div class="campo">
                            <label for="password"><?php echo $lang['registroPassword'] ?></label>
                            <input type="password" name="password" value="<?php echo $_password; ?>">
                            <span class="alert password-alert">
                                <p class="error password-err"><?php echo $_password_err; ?></p>
                                <ion-icon name="alert-circle-outline"></ion-icon>
                            </span>
                        </div>

                        <div class="campo">
                            <label for="password2"><?php echo $lang['registroPasswordR'] ?></label>
                            <input type="password" name="password2" value="<?php echo $_password; ?>">
                            <span class="alert password2-alert">
                                <p class="error password2-err"><?php echo $_password2_err; ?></p>
                                <ion-icon name="alert-circle-outline"></ion-icon>
                            </span>
                        </div>

                        <div class="campo">
                            <label for="email"><?php echo $lang['registroEmail'] ?></label>
                            <input type="email" name="email" value="<?php echo $_email; ?>">
                            <span class="alert email-alert">
                                <p class="error email-err"><?php echo $_email_err; ?></p>
                                <ion-icon name="alert-circle-outline"></ion-icon>
                            </span>
                        </div>

                        <div class="campo">
                            <label for="fecha"><?php echo $lang['registroFecha'] ?></label>
                            <input type="date" name="fecha" value="<?php echo $_fecha; ?>">
                            <span class="alert fecha-alert">
                                <p class="error fecha-err"><?php echo $_fecha_err; ?></p>
                                <ion-icon name="alert-circle-outline"></ion-icon>
                            </span>
                        </div>

                        <div class="campo">
                            <label for="avatar"><?php echo $lang['registroAvatar'] ?></label>
                            <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" value="<?php echo $_avatar; ?>">
                            <span class="alert avatar-alert">
                            <p class="error avatar-err"><?php echo $_avatar_err; ?></p>
                                <ion-icon name="alert-circle-outline"></ion-icon>
                            </span>
                        </div>
                    </div>

                    <div class="botones">
                        <input type="button" value="<?php echo $lang['btnVolverRegistro'] ?>" class="registroButton btn" onclick="window.location.href='index.php'">
                    </div>
                    <div class="botones">
                        <input type="submit" name="REGISTRARSE" value="<?php echo $lang['btnRegistrarseRegistro'] ?>" class="registroButton btn" />
                    </div>
                </form>
                <div class="post">
                    <?php  echo $_registro; ?>
                    <input type="button" value="<?php echo $lang['btnLogear'] ?>" class="btn post-button" onclick="window.location.href='login.php'">
                </div>
            </div>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>