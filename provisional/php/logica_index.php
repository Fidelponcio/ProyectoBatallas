<?php
    require_once 'funciones.php';
    if (isset($_POST['ENTRAR'])) {
        // Variables de control de errores
        $_usuario_err = $_password_err = null;
        $_login = NULL; // ¿para que se utiliza esto? ~brandon

        // Variables obtenidas del formulario
        $_usuario = htmlspecialchars($_POST["usuario"]);
        $_password = htmlspecialchars($_POST["password"]);

        // VALIDACION DE CAMPOS
        // Usuario
        if (empty(trim($_usuario))) {
            // Error si el campo de usuario esta vacio
            $_usuario_err = $lang['userErr1'];
        }
        
        // Contraseña
        if (empty(($_password))) {
            // Error si el campo de contraseña esta vacio
            $_password_err = $lang['passwdErr1'];
        }

        // Si los campos no estan vacíos se comprueban en la base de datos
        // No hace falta que pasen la validación ya que esta validación fue realizada al registrarse
        if ($_usuario_err != null || $_password_err != null) {
            // Si la contraseña o usuario no coinciden, o no se encuentran en la BBDD no se loguea
            // Siempre se mostrará los errores userErr2 y passwdErr2 a la vez
            $_usuario_err = $lang['userErr2'];
            $_password_err = $lang['passwdErr2'];
            // PD: cambiar mensaje de errores de "... no válido" a "... incorrect@"
        } else if (loguear($_usuario, $_password)) {
            // Si la contraseña y usuario se encuentran en la BBDD y coinciden,
            // se redigire a perfil.php con los datos del usuario de la BBDD
            header("Location: inicio.php");
            exit();
            // Además, se cargarán las cookies necesarias (tema, idioma)


            // PD: en logout.php guardar las cookies de tema e idioma, ya que es posible que se hayan modificado
        }

        // Si las variables de error tienen algun contenido, las muestra en pantalla
        if($_usuario_err != null){?><style>.usuario-alert {opacity: 1;}</style><?php }
        if($_password_err != null){?><style>.password_alert {opacity: 1;}</style><?php }
    }
?>