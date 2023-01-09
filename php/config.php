<?php
    // Definición de constantes relacionadas con la base de datos
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DBNAME', 'dbbatallas');
    // Definición de driver para PDO
    define('DRIVER', 'mysql');
    define('DSN', DRIVER.':host='.HOST.';dbname='.DBNAME);
    define('OPTIONS', array(PDO::FETCH_BOUND));

    // Expresiones regulares para validar en registro.php
    define("VALID_USER", "/([A-Za-z0-9_]{1,15})/");
    define("VALID_PASSWORD", "/(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/");
    define("VALID_EMAIL", "/[^@]+@[^@]+\.[a-zA-Z]{2,}$/");
    define("VALID_DATE", "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/");

    // Limites de tamaño para $_avatar
    define('SIZE_KB', 1024);
    define('SIZE_MB', 1048576);
    define('SIZE_GB', 1073741824);
    define('SIZE_TB', 1099511627776);

    // Ruta fichero txt
    define('RUTA_FICHERO', "Usuarios/nombres.txt");
?>