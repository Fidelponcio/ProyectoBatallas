<?php
    include_once 'config.php';

    /**
     * Función para loguear usuarios
     * @param string:usuario Nombre del usuario a loguear
     * @param string:password Contraseña de usuario a loguear
     * 
     * @return true las credenciales del usuario coniciden con la base de datos
     * @return false las credenciales del usuario no se han encontrado o son incorrectas
     */
    function loguear($usuario, $password) {
        // Buscar el usuario con el nombre introducido
        $stmt = selectBD(array('password'), 'credencial', 'nombreusuario', $usuario);
        var_dump($stmt);

        if ($stmt['password'] === $password) {
            echo $stmt['password'];
            session_start();
            // Creamos sesión con el nombre del usuario
            $_SESSION["usuario"] = $usuario;
            // Cogemos la fecha y hora de inicio para registrarla en sesionews
            $_SESSION["fInicio"] = date('Y-m-d H:i:s');

            return true;
        } else {
            return false;
        }
    }
?>