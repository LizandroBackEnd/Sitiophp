<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width">
 <title>Registrarse</title>
 <link rel="stylesheet" href="./css/index.css">
</head>
<body>
 <?php require "header.php" ?>

 <main class="login-wrap">
    <div class="login-card">
        <h1>Crear Usuario Nuevo</h1>
        <p class="lead">Regístrate para acceder al sistema.</p>

        <form action="procesaRegistro.php" method="post">
            <input type="text" name="cue" placeholder="Cuenta" required>
            <input type="password" name="matc" placeholder="Contraseña" required>
            <button type="submit">Registrarme</button>
        </form>

        <p class="register-link"><a href="index.php">Volver al inicio</a></p>
    </div>
 </main>

 <?php require "footer.php" ?>
</body>
</html>