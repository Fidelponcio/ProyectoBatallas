<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if (isset($_SESSION["usuario"])) {
            header("Location: perfil.php");
            exit();
        }
    ?>
    <title>Login</title>
</head>
<body>
    <?php
        require_once './php/funciones.php';
        require_once './php/logica_index.php';
    ?>
    <form action="" method="post" class="containerForm pre" enctype="multipart/form-data">
        <div>
            <label for="usuario" class="nonClickable">Nombre de usuario</label>
            <input type="text" name="usuario">
        </div>

        <div>
            <label for="password" class="nonClickable">Contraseña</label>
            <input type="password" name="password">
        </div>
        
        <a href="registro.php">¿Aún no tienes cuenta?</a><br>
        <input type="submit" name="ENTRAR" value="ACCEDER" class="loginButton btn">
    </form>
</body>
</html>