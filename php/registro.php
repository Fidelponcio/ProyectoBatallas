<?php
    // Variables para almacenar datos
    $_usuario = $_password = $_email = $_fecha = $_avatar =   NULL;

    // Variable para control de errores
    $_usuario_err = $_password_err = $_password2_err = $_email_err = $_fecha_err = $_avatar_err = NULL;
    $_registro = NULL;

    if (isset($_POST['REGISTRARSE'])) {
        // Variables obtenidas del formulario
        $v1 = htmlspecialchars($_POST["usuario"]);
        $v2 = htmlspecialchars($_POST["password"]);
        $v3 = htmlspecialchars($_POST["password2"]);
        $v4 = htmlspecialchars($_POST["email"]);
        $v5 = htmlspecialchars($_POST["fecha"]);
        $avatar = $_FILES['avatar']['name'];

        // VALIDACION DE CAMPOS
        // Usuario
        if (empty(trim($v1))) {
            // Error si el campo de usuario esta vacio
            $_usuario_err = $lang['userErr1'];
        } else {
            if (!validar($v1, VALID_USER)) {
                // Error si el campo de contraseña no es valido
                $_usuario_err = $lang['userErr2'];
            } else {
                $_usuario = $v1;
            }
        }

        // Contraseña
        if (empty(($v2))) {
            // Error si el campo de contraseña esta vacio
            $_password_err = $lang['passwdErr1'];
        } else {
            if (!validar($v2, VALID_PASSWORD)) {
                // Error si el campo de contraseña no es valido
                $_password_err = $lang['passwdErr2'];
            } else {
                // Contraseña 2
                if (empty(($v3))) {
                    // Error si el campo de repetir contraseña esta vacio
                    $_password2_err = $lang['passwdErr1'];
                } else {
                    if ($v3 === $v2) {
                        // Guardamos una contraseña válida
                        $_password = $v2;
                    } else {
                        // Error si los campos campos de contraseñas no coinciden
                        // Mostramos error en ambos campos
                        $_password2_err = $lang['passwdMatchErr'];
                        $_password_err = $lang['passwdMatchErr'];
                    }
                }
            }
        }

        // Email
        if (empty(trim($v4))) {
            // Error si el campo de email esta vacío
            $_email_err = $lang['emailErr1'];
        } else {
            if (!validar($v4, VALID_EMAIL)) {
                // Error si el campo de email esta no es valido
                $_email_err = $lang['emailErr2'];
            } else {
                // Guardamos una dirección email correcta
                $_email = $v4;
            }
        }

        // Fecha
        if (empty(trim($v5))) {
            // Error si el campo de fecha de nacimiento esta vacío
            $_fecha_err = $lang['dateErr1'];
        } else {
            if (!validar($v5, VALID_DATE)) {
                // Error si el campo de email esta no es valido
                $_fecha_err = $lang['dateErr2'];
            } else {
                if (!validar_edad($v5)) {
                    // Error si la edad es superio a 150 años o inferior a 0
                    $_fecha_err = $lang['dateErr3'];
                } else {
                    // Guardamos una fecha de nacimiento correcta
                    $_fecha = $v5;
                }
            }
        }

        //Avatar
        $nombre = $_FILES['avatar']['name'];
        $size = $_FILES['avatar']['size'];
        $tipo = $_FILES['avatar']['type'];
        $rutaTemporal = $_FILES['avatar']['tmp_name'];

        //Si el archivo es jpg jpeg o png lo guarda en la ruta solicitada
        if (isset($nombre) && $nombre != "") {
            if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png") {
                move_uploaded_file($rutaTemporal, "tabs/IMG/".$nombre);
                if ($size > SIZE_MB) {
                    $_avatar_err = $lang['sizeErr'];
                } else {
                    $_avatar = "tabs/IMG/".$nombre;
                }
            } else {
                $_avatar_err = $lang['fileErr'];
            }
        } else {
            $_avatar_err = $lang['fileErr2'];
        }

        $_rol = 'usuario';
        $USER = array($_fecha, $_avatar, $_email, $_COOKIE['tema'], $_COOKIE['lang'], $_rol, $_usuario, $_password);

        if (!is_null($_usuario) && !is_null($_password) && !is_null($_email) && !is_null($_fecha) && !is_null($_avatar)) {
            $return = registrarUsuarioBD($USER);
            if ($return == 'usuario') {
                $_usuario_err = $lang['userErr3'];
            } else if ($return == 'email') {
                $_email_err = $lang['emailErr3'];
            } else {
                $_registro = '<p class="anuncio">'.$lang['userRegistered'].'</p><br>
                                <img src="'.$_avatar.'" class="registro-avatar">
                                <p class="texto">'.$_usuario.'<br>'.$_email.'<br>'.$_fecha.'</p>';
                ?><style>.post {display: block;}.pre {display: none;}</style><?php
            }
        }

        // Si las variables de error no son NULL, las muestra en pantalla
        if ($_usuario_err != null) {?><style>.usuario-alert {opacity: 1;}</style><?php }
        if ($_password_err != null) {?><style>.password_alert {opacity: 1;}</style><?php }
        if ($_password2_err != null) {?><style>.password2-alert {opacity: 1;}</style><?php }
        if ($_email_err != null) {?><style>.email-alert {opacity: 1}</style><?php }
        if ($_fecha_err != null) {?><style>.fecha-alert {opacity: 1;}</style><?php }
        if ($_avatar_err != null) {?><style>.avatar-alert {opacity: 1;}</style><?php }
    }
?>