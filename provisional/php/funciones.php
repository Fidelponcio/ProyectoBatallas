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

        if ($stmt['password'] === $password) {
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
        
    /**
     * Función genérica para obtener información de la base de datos dbbatallas
     * @param array:campos nombre de los campos a seleccionar en una tabla especifica
     * @param string:tabla nombre de la tabla a la que pertenecen los datos que se solicitan
     * @param string:condición nombre de campo con el cual se filtrará la selección
     * @param string:valor valor de la condición para el filtrado de información
     * 
     * @return array:datos conjunto de datos obtenidos de del select a la base de datos
     */
    function selectBD($campos, $tabla, $condicion, $valor)
    {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        $c = "";
        if (count($campos) > 1) {
            foreach ($campos as $campo) {
                $c .= "'" . $campos . "',";
            }
            $c = substr($c, 0, -1);
        } else {
            $c = $campos[0];
        }
        $sql = "SELECT " . $c . " FROM " . $tabla . " WHERE " . $condicion . " = '" . $valor . "'";

        $result = $conexion->query($sql);
        $datos = $result->fetch();
        return $datos;
    }
?>