<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/perfil.css">
    <title>Document</title>
</head>

<body>
    <?php

    require_once('./php/funciones.php');
    require_once('./php/config.php');
    require_once('./php/config.php');
    session_start();

    
  
    if (isset($_POST['elemento1'])) {
        $_SESSION['elemento1'] = htmlspecialchars($_POST['elemento1']);
    }
    if (isset($_POST['elemento2'])) {
        $_SESSION['elemento2'] = htmlspecialchars($_POST['elemento2']);
    }
    if (isset($_POST['CREAR_BATALLA'])) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
       $e1 = idElemento($_SESSION['elemento1']);
       $e2 = idElemento($_SESSION['elemento2']);    
       insertBD('batalla_elemento', array('id_elemento1', 'id_elemento2'), array($e1[0],$e2[0]), $conexion);
       
    }

    $_nombreElemento =  $_foto =   NULL;
    $_nombreElemento_err = $_foto_err  = NULL;

    if (isset($_POST['CREAR_ELEMENTO'])) {

        $nombre = htmlspecialchars($_POST["nombre"]);
        $foto = $_FILES['foto']['name'];

 
        if (empty(trim($nombre))) {
            $_nombreElemento_err = $lang['elementNameErr'];
        } else {
            if (!validar($nombre, VALID_USER)) {
                
                $_nombreElemento_err = $lang['elementNameErr2'];
            } else {
                $_nombreElemento = $nombre;
            }
        }


        //Foto
        $nombreFoto = $_FILES['foto']['name'];
        $size = $_FILES['foto']['size'];
        $tipo = $_FILES['foto']['type'];
        $rutaTemporal = $_FILES['foto']['tmp_name'];

        //Si el archivo es jpg jpeg o png lo guarda en la ruta solicitada
        if (isset($nombreFoto) && $nombreFoto != "") {
            if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png") {
                move_uploaded_file($rutaTemporal, "tabs/IMG/elementos/" . $nombreFoto);
                if ($size > SIZE_MB) {
                    $_avatar_err = $lang['sizeErr'];
                } else {
                    $_foto = "tabs/IMG/elementos/" . $nombreFoto;
                }
            } else {
                $_foto_err = $lang['fileErr'];
            }
        } else {
            $_foto_err = $lang['fileErr2'];
        }



        if (!is_null($_nombreElemento) && !is_null($_foto)) {
            if (!comprobarElemento($_nombreElemento)) {
                crearElemento($_nombreElemento, $_foto);
                echo 'elemento creado';
            }
        }
    }


    ?>
    <form method='post'>
        Elemento1:
        <select name="elemento1" onchange="this.form.submit()">
            <?php
            try {
                $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
            } catch (PDOException $p) {
                echo "Error conectando";
            }

            $sql = "SELECT `nombre` FROM `elemento`";
            $listaElementos = $conexion->query($sql);
            if ($listaElementos) {
                echo "<option";
                if (!isset($_SESSION['elemento1'])) {
                    echo " selected";
                }
                echo ">Selecciona el elemento 1</option>";

                foreach ($listaElementos as $elemento) {
                    echo "<option";
                    if (isset($_SESSION['elemento1'])) {
                        if ($_SESSION['elemento1'] == $elemento['nombre']) {
                            echo " selected";
                        }
                    }
                    echo ">{$elemento['nombre']}</option>";
                }
            }
            ?>
        </select>

        <?php

        ?>
    </form>

    <?php
    if (isset($_SESSION['elemento1'])) {
        $idElemento1 = idElemento($_SESSION['elemento1']);
    ?>
        <form method='post'>
            Elemento 2:
            <select name="elemento2" onchange="this.form.submit()">
                <?php

                $sql = "SELECT `nombre` 
                        FROM `elemento` 
                        WHERE `id` NOT IN (
                            SELECT `id_elemento2` 
                            FROM `batalla_elemento` 
                            WHERE `id_elemento1` =  '$idElemento1[0]'    
                            UNION ALL   
                                SELECT `id_elemento1` 
                                FROM `batalla_elemento` 
                                WHERE `id_elemento2` =  '$idElemento1[0]') 
                                AND `id` != '$idElemento1[0]'";

                $resultado = $conexion->query($sql);
                if ($resultado) {
                    echo "<option";
                    if (!isset($_SESSION['elemento2'])) {
                        echo " selected";
                    }
                    echo ">Selecciona elemento 2</option>";

                    while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option";
                        if (isset($_SESSION['elemento2'])) {
                            if ($_SESSION['elemento2'] == $registro['nombre']) {
                                echo " selected";
                            }
                        }
                        echo ">{$registro['nombre']}</option>";
                    }
                ?>
            </select>
            <?php
                    if (isset($_SESSION['elemento1']) && isset($_SESSION['elemento2'])) {
                        echo "<input type='submit' name='CREAR_BATALLA' value='Crear' />";
                    }
            ?>
        </form>
<?php
                }
            }
?>




<h1>Creacion de elemento</h1>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post" enctype="multipart/form-data">
    Nombre:
    <input type="text" name="nombre">
    <p><?php echo $_nombreElemento_err?></p>
    <br>
    <label for="foto">Subir foto</label>
    <input type="file" name="foto" >
    <p><?php echo $_foto_err?></p>
    <br>
    <input type="submit" name="CREAR_ELEMENTO" value="Crear Elemento">
</form>
</body>

</html>