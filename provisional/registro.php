<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>
    <form action="" method="post" class="containerForm pre" enctype="multipart/form-data">
        <div>
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" value="">
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="password" value="">
        </div>

        <div>
            <label for="password2">Repita su contraseña</label>
            <input type="password" name="password2" value="">
        </div>
        
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" value="">
        </div>
        
        <div>
            <label for="fecha">Fecha de nacimiento</label>
            <input type="date" name="fecha" value="">
        </div>
        
        <div>
            <label for="avatar">Foto de perfil</label>
            <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" value="">
        </div>
        
        <input type="button" value="VOLVER" class="registroButton btn" onclick="window.location.href='index.php'">
        
        <input type="submit" name="REGISTRARSE" value="REGISTRARSE" class="registroButton btn" />
    </form>
</body>
</html>